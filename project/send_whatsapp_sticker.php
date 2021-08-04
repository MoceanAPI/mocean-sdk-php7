<?php

require_once "client.php";

use Mocean\Client;
use Mocean\Client\Credentials\Basic;
use Mocean\Command\Mc;
use Mocean\Command\McBuilder;
use Mocean\Command\ContentBuilder\WaStickerContentBuilder;

/** @var $client */
/** @var  $dlr_url */

$textContent = WaStickerContentBuilder::create()->setRichMediaUrl("https://wa-cnt.s3.amazonaws.com/1de182eb-2ba4-44af-9258-89df37c9cef9/887d5c0a-b85c-4200-87dd-a74002482c3b.webp");


$mcText = Mc::waSendSticker()
    ->setFrom("mocean_wa_sinch")
    ->setTo("60165465738")
    ->setContent($textContent);

$mcBuilder = McBuilder::create()->add($mcText);

$response = $client->command()->setEventUrl($dlr_url)->setCommand($mcBuilder)->execute();

print_r($response);