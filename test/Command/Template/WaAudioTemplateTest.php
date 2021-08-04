<?php

namespace MoceanTest\Command\Template;

use Mocean\Command\ContentBuilder\WaAudioContentBuilder;
use Mocean\Command\Button\WaCallButton;
use MoceanTest\AbstractTesting;
use Mocean\Command\Template\WaAudioTemplate;

class WaAudioTemplateTest extends AbstractTesting
{
    public function testCreateInstance()
    {
        $this->assertInstanceOf(WaAudioTemplate::class, WaAudioTemplate::create());
    }

    public function testSetNameReturn()
    {
        $this->assertInstanceOf(WaAudioTemplate::class, WaAudioTemplate::create()->setName("name"));
    }

    public function testSetLanguageReturn()
    {
        $this->assertInstanceOf(WaAudioTemplate::class, WaAudioTemplate::create()->setLanguage("language"));
    }

    public function testSetBodyParamsReturn()
    {
        $this->assertInstanceOf(WaAudioTemplate::class, WaAudioTemplate::create()->setBodyParams(["body params"]));
    }

    public function testSetHeaderParamsReturn()
    {
        $this->assertInstanceOf(WaAudioTemplate::class, WaAudioTemplate::create()->setHeaderParams("header params"));
    }

    public function testSetMediaContentReturn()
    {
        $contentBuilder = WaAudioContentBuilder::create()->setRichMediaUrl("url");

        $this->assertInstanceOf(WaAudioTemplate::class, WaAudioTemplate::create()->setMediaContent($contentBuilder));
    }

    public function testSetMediaThrowError()
    {
        $this->expectException(\InvalidArgumentException::class);
        WaAudioTemplate::create()->setMediaContent('123');
    }

    public function testRequestFields()
    {
        $params = [
            "header_params" => ["header params"],
            "body_params" => ["body params"],
            "language" => "language",
            "name" => "name",
            "media_content" => WaAudioContentBuilder::create()->setRichMediaUrl("url")->build(),
            "type" => "audio",
            "wa_buttons" => [WaCallButton::create()->build()],
        ];

        $obj = WaAudioTemplate::create()
            ->setHeaderParams(["header params"])
            ->setBodyParams(["body params"])
            ->setLanguage("language")
            ->setName("name")
            ->setWaButton([WaCallButton::create()])
            ->setMediaContent(WaAudioContentBuilder::create()->setRichMediaUrl("url"));

        $this->assertEquals($params, $obj->build());
   }
}