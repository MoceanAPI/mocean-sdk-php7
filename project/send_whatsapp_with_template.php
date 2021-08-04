<?php

require_once "client.php";

use Mocean\Command\Mc;
use Mocean\Command\McBuilder;
use Mocean\Command\ContentBuilder\WaTemplateContentBuilder;
use Mocean\Command\Template\WaTextTemplate;
use \Mocean\Command\Button\WaCallButton;

/** @var $client */
/** @var  $dlr_url */

$template = WaTextTemplate::create()
    ->setLanguage("en")
    ->setName("test_template")
    ->setBodyParams(["hello"]);

$textContent = WaTemplateContentBuilder::create()->setWaTemplate($template);


$mcText = Mc::waSendWithTemplate()
    ->setFrom("mocean_wa_sinch")
    ->setTo("60165465738")
    ->setContent($textContent);

$mcBuilder = McBuilder::create()->add($mcText);

$response = $client->command()->setEventUrl($dlr_url)->setCommand($mcBuilder)->execute();

print_r($response);
//
//
//$template = WaTextTemplate::create()
//    ->setLanguage("en")
//    ->setName("test-template")
//    ->setBodyParams(["hello"]);
//
//$textContent = WaTemplateContentBuilder::create()->setWaTemplate($template);
//
//$mcText = Mc::waSendWithTemplate()
//    ->setFrom("mocean_wa_sinch")
//    ->setTo("60165465738")
//    ->setContent($textContent);
//
//$response = $client->command()->setEventUrl($dlr_url)->setCommand($mcBuilder)->execute();
//print_r($response);

///**
// * Button template
// */
//
//$template = WaTextTemplate::create()
//    ->setLanguage("en")
//    ->setName("test_template")
//    ->setBodyParams(["hello","world","no"])
//    ->setWaButton(
//        [
//            \Mocean\Command\Button\WaUrlParameterButton::create()
//                ->setUrlParameter("like=this"),
//            WaCallButton::create(),
//            WaCallButton::create(),
//        ]
//    );
//
//$content = WaTemplateContentBuilder::create()->setWaTemplate($template);
//
//
//$mcText = Mc::waSendWithTemplate()
//    ->setFrom("mocean_wa_sinch")
//    ->setTo("60165465738")
//    ->setContent($content);
//
//$mcBuilder = McBuilder::create()->add($mcText);
//
//
//$response = $client->command()->setEventUrl($dlr_url)->setCommand($mcBuilder)->execute();
//var_dump($response);