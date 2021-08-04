<?php
require_once "../vendor/autoload.php";

use Mocean\Client;
use Mocean\Client\Credentials\Basic;

//$client = new Client(new Basic("SydD2E4X1H","zL2aW5lNzr"));
$client = new Client(new Basic("rest_3","password"));

$dlr_url =  "https://dc69c384fa80.ap.ngrok.io/testing/dlr_log.php";
