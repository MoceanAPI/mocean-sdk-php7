<?php
require_once "../vendor/autoload.php";

use Mocean\Client;
use Mocean\Client\Credentials\Basic;
use Mocean\Command\Mc;
use Mocean\Command\McBuilder;
use Mocean\Command\ContentBuilder\WaLocationContentBuilder;
use Mocean\Command\Location\WaLocation;

/** @var  $client */
/** @var  $dlr_url */

$location = WaLocation::create()
    ->setLatitude("5.9860° N")
    ->setLongitude("116.5783° E")
    ->setAddress("Kundasang");

$locationContent = WaLocationContentBuilder::create()->setLocation($location);


$mcLocation = Mc::waSendLocation()
    ->setFrom("mocean_wa_sinch")
    ->setTo("60165465738")
    ->setContent($locationContent);

$mcBuilder = McBuilder::create()->add($mcLocation);

$response = $client->command()->setEventUrl($dlr_url)->setCommand($mcBuilder)->execute();