<?php

require_once "client.php";

use Mocean\Client;
use Mocean\Client\Credentials\Basic;
use Mocean\Command\Mc;
use Mocean\Command\McBuilder;
use Mocean\Command\ContentBuilder\WaContactContentBuilder;
use Mocean\Command\Contact\WaContact;

/** @var $client */
/** @var  $dlr_url */

$contact = WaContact::create()->setFistName("Hello")->setLastName("world")->setPhoneNum("60165465738")->setFullName("Hello world");

$textContent = WaContactContentBuilder::create()->setContactDetail($contact);


$mcText = Mc::waSendContact()
    ->setFrom("mocean_wa_sinch")
    ->setTo("60165465738")
    ->setContent($textContent);

$mcBuilder = McBuilder::create()->add($mcText);

$response = $client->command()->setEventUrl($dlr_url)->setCommand($mcBuilder)->execute();

print_r($response);