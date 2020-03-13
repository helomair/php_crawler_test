<?php

require "./crawler.php";

use Crawler;

// USAGE
$startURL = 'https://www.php.net/manual/en/function.ob-end-flush.php';
$depth = 1;
$crawler = new Crawler($startURL, $depth);
// Exclude path with the following structure to be processed 
$crawler->addFilterPath('customer/account/login/referer');
$crawler->run();