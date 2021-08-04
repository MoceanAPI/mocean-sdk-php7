<?php

require_once "client.php";

use Mocean\Client;
use Mocean\Client\Credentials\Basic;
use Mocean\Command\Mc;
use Mocean\Command\McBuilder;
use Mocean\Command\ContentBuilder\WaAudioContentBuilder;

/** @var $client */
/** @var  $dlr_url */

$textContent = WaAudioContentBuilder::create()->setRichMediaUrl("https://bie.tg.nic.in/Pdf/computerHardware.pdf");


$mcText = Mc::waSendAudio()
    ->setFrom("mocean_wa_sinch")
    ->setTo("60165465738")
    ->setContent($textContent);

$mcBuilder = McBuilder::create()->add($mcText);

$response = $client->command()->setEventUrl($dlr_url)->setCommand($mcBuilder)->execute();

print_r($response);