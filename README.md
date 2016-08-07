IPG (Internet Payment Gateway) manager for **Iran Banking System**

Install Using Composer
------------

    composer require nevercom/iripg

Usage
-----
This library uses `MySQL` database by default, and a predefined `DB Schema`. you should create the required tables in order to use this library. (BTW, you can implement your own DB logic using your own schema if you don't want to use the provided class in this library)

    -- phpMyAdmin SQL Dump
    -- version 4.5.0.2
    -- http://www.phpmyadmin.net
    --
    -- Host: localhost
    -- Generation Time: Aug 07, 2016 at 10:16 AM
    -- Server version: 5.5.50-0ubuntu0.14.04.1-log
    -- PHP Version: 5.5.9-1ubuntu4.19
    
    SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
    SET time_zone = "+00:00";
    
    
    -- --------------------------------------------------------
    
    --
    -- Table structure for table `bank_transactions`
    --
    
    CREATE TABLE `bank_transactions` (
      `pay_id` bigint(20) NOT NULL,
      `transaction_id` bigint(20) NOT NULL,
      `bank_name` varchar(255) NOT NULL,
      `bank_id` tinyint(4) NOT NULL,
      `amount` bigint(20) NOT NULL,
      `reference_id` varchar(256) NOT NULL,
      `status` tinyint(3) NOT NULL,
      `created_at` datetime NOT NULL,
      `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8;
    
    --
    -- Indexes for dumped tables
    --
    
    --
    -- Indexes for table `bank_transactions`
    --
    ALTER TABLE `bank_transactions`
      ADD PRIMARY KEY (`pay_id`),
      ADD KEY `transaction_id` (`transaction_id`),
      ADD KEY `reference_id` (`reference_id`(255)),
      ADD KEY `status` (`status`);
    
    --
    -- AUTO_INCREMENT for dumped tables
    --
    
    --
    -- AUTO_INCREMENT for table `bank_transactions`
    --
    ALTER TABLE `bank_transactions`
      MODIFY `pay_id` bigint(20) NOT NULL AUTO_INCREMENT;
    
    -- --------------------------------------------------------
    
    --
    -- Table structure for table `bank_logs`
    --
    
    CREATE TABLE `bank_logs` (
      `id` int(20) NOT NULL,
      `pay_id` int(20) NOT NULL,
      `method` varchar(2048) NOT NULL,
      `status_code` int(11) NOT NULL,
      `input` text NOT NULL,
      `output` text NOT NULL,
      `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8;
    
    --
    -- Indexes for dumped tables
    --
    
    --
    -- Indexes for table `bank_logs`
    --
    ALTER TABLE `bank_logs`
      ADD PRIMARY KEY (`id`),
      ADD KEY `pay_id` (`pay_id`);
    
    --
    -- AUTO_INCREMENT for dumped tables
    --
    
    --
    -- AUTO_INCREMENT for table `bank_logs`
    --
    ALTER TABLE `bank_logs`
      MODIFY `id` int(20) NOT NULL AUTO_INCREMENT;

First, you need to extend each Gateway class you want to use, and provide authentication info for that Gateway

    <?php
    
    namespace Test;
    
    use IPG\Gateways\Mellat\MellatIPG;
    
    class MyMellat extends MellatIPG {
        protected $terminalId   = '123456789';
        protected $userName     = 'username';
        protected $userPassword = 'P4$$w0rD';
    }
Now, this class can be used with `IPGManager` as payment Gateway.

Then, `IPGManager` should be initialized 

    $man = new IPGManager(new MyMellat(), new IPGDatabase('username', 'password', 'db_name'));

Next step is to start the payment proccess

    $res = $man->startPayment(time(), 10000, 'http://your-site.ir/callback.php');

Then the required data should be `POST`ed to the targetURL

    if (!$res->isIsSuccessful()) {
        echo 'FAILED';
        exit();
    }
    $location = 'poster.php?data=' . json_encode($res->getData()) . '&url=' . $res->getTargetUrl();
    header("Location: {$location}");

Here is a sample poster.php if you need one

    <html>
    <head>
        <script>
            function getParameterByName(name) {
                name = name.replace(/[\[]/, "\\\[").replace(/[\]]/, "\\\]");
                var regex   = new RegExp("[\\?&]" + name + "=([^&#]*)"),
                    results = regex.exec(location.search);
                return results == null ? "" : decodeURIComponent(results[1].replace(/\+/g, " "));
            }
    
            var jsondata = getParameterByName("data");
            var obj = JSON.parse(jsondata);
            var form = document.createElement("form");
            form.setAttribute("method", "POST");
            form.setAttribute("target", "_self");
            form.setAttribute("action", getParameterByName("url"));
    
            var len = count = Object.keys(obj).length;
    
            for (var key in obj) {
                var hiddenField1 = document.createElement("input");
                hiddenField1.setAttribute("name", key);
                hiddenField1.setAttribute("value", obj[key]);
    
                form.appendChild(hiddenField1);
    
            }
    
            form.submit();
            document.body.removeChild(form);
    
        </script>
    
    </head>
    <body></body>
    </html>
Now, user is redirected to IPG website. after Payment completetion (or cancelation), the IPG will send the required data to the callback address you have provided.

In the callback file, you need to check that the payment is successful, if so deliver the product. you can reverse the payment if the product can not be delivered

    <?php
    
    require_once 'vendor/autoload.php';
    use IPG\IPGDatabase;
    use IPG\IPGManager;
    
    $man = IPGManager::fromCallback($_REQUEST, new IPGDatabase('user', 'pass', 'db'));
    
    $v = $man->validatePayment($_REQUEST);
    if ($v->isValid()) {
        // You should deliver the product now
    
        // transactionId is the unique id that you provided in the startPayment method
        // and is used to associate a payment transaction to a product order in your database
        // you can use this id to find which order this payment is for, and deliver that product
        $transactionId = $v->getTransactionId();
    
        if (productDeliverIsSuccessful()) {
            // Optionally you can settle the payment, if you dont it will settled automatically
            $man->settle($v->getPayId(), $v->getReferenceId());
        } else {
            // if any error occured upon delivering the product
            // you can reverse the payment, which will return the money to the customer
            $man->reversal($v->getPayId(), $v->getReferenceId());
        }
    
    } else {
        // you can get the last error after calling each method
        $errorCode    = $man->getErrorCode();
        $errorMessage = $man->getErrorMessage();
    }
    
    // render the result page

Adding another Gateway
----------------------

if you want to use another IPG that is not implemented in this library, you should create a new class and extend it from `IPG\Contract\AbstractIPG` and provide the logic for that particular IPG.

Not using MySQL or you want to use your own DB Schema and logic
---------------------------------------------------------------
You can extend the `IPG\Contract\AbstractIPGDatabaseManager`  and provide the logic for database interaction.

Operation logging
-----------------

Operation logging is activated by default, which will log each method call with its input and output. If you wish to turn this feature off, you should call the `setLoggingEnabled` method.

    $man->setLoggingEnabled(false);

License
-------

> MIT License
> 
> Copyright (c) 2016 Mohammad Azam Rahmanpour
> 
> Permission is hereby granted, free of charge, to any person obtaining
> a copy of this software and associated documentation files (the
> "Software"), to deal in the Software without restriction, including
> without limitation the rights to use, copy, modify, merge, publish,
> distribute, sublicense, and/or sell copies of the Software, and to
> permit persons to whom the Software is furnished to do so, subject to
> the following conditions:
> 
> The above copyright notice and this permission notice shall be
> included in all copies or substantial portions of the Software.
> 
> THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND,
> EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF
> MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT.
> IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY
> CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER IN AN ACTION OF CONTRACT,
> TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN CONNECTION WITH THE
> SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.
