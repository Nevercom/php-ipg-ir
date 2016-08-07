IPG (Internet Payment Gateway) manager for **Iran Banking System**

Install Using Composer
------------

    composer require nevercom/iripg

Usage
-----
First, you need to extend each Gateway class you want to use, and provide authentication info for that Gatesway

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
