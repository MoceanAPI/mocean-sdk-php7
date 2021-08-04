<?php
require_once "client.php";


use Mocean\Command\Mc;
use Mocean\Command\McBuilder;
use Mocean\Command\ContentBuilder\WaTextContentBuilder;


/** @var $client */
/** @var  $dlr_url */


$textContent = WaTextContentBuilder::create()->setText("Hello")->setMarkdown("Pleasae click this link [MoceanAPI](https://moceanaapi.com)");


$mcText = Mc::waSendText()
    ->setFrom("mocean_wa_sinch")
    ->setTo("60165465738")
    ->setContent($textContent);

$mcBuilder = McBuilder::create()->add($mcText);

$response = $client->command()->setEventUrl($dlr_url)->setCommand($mcBuilder)->execute();

print_r($response);