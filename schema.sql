-- phpMyAdmin SQL Dump
-- http://www.phpmyadmin.net
--
-- Generation Time: Feb 02, 2018 at 01:24 PM

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";
-- --------------------------------------------------------

--
-- Table structure for table `bank_logs`
--

DROP TABLE IF EXISTS `bank_logs`;
CREATE TABLE IF NOT EXISTS `bank_logs` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `pay_id` int(20) NOT NULL,
  `method` varchar(2048) NOT NULL,
  `status_code` int(11) NOT NULL,
  `input` text NOT NULL,
  `output` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `pay_id` (`pay_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `bank_transactions`
--

DROP TABLE IF EXISTS `bank_transactions`;
CREATE TABLE IF NOT EXISTS `bank_transactions` (
  `pay_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `transaction_id` bigint(20) NOT NULL,
  `bank_name` varchar(255) NOT NULL,
  `bank_id` tinyint(4) NOT NULL,
  `amount` bigint(20) NOT NULL,
  `reference_id` varchar(256) NOT NULL,
  `authority_id` varchar(255) DEFAULT NULL,
  `status` tinyint(3) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`pay_id`),
  KEY `transaction_id` (`transaction_id`),
  KEY `reference_id` (`reference_id`(255)),
  KEY `status` (`status`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

