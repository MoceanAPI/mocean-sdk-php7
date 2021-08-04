<?php

namespace MoceanTest\Command\Template;

use Mocean\Command\ContentBuilder\WaVideoContentBuilder;
use Mocean\Command\Button\WaCallButton;
use MoceanTest\AbstractTesting;
use Mocean\Command\Template\WaVideoTemplate;

class WaVideoTemplateTest extends AbstractTesting
{
    public function testCreateInstance()
    {
        $this->assertInstanceOf(WaVideoTemplate::class, WaVideoTemplate::create());
    }

    public function testSetNameReturn()
    {
        $this->assertInstanceOf(WaVideoTemplate::class, WaVideoTemplate::create()->setName("name"));
    }

    public function testSetLanguageReturn()
    {
        $this->assertInstanceOf(WaVideoTemplate::class, WaVideoTemplate::create()->setLanguage("language"));
    }

    public function testSetBodyParamsReturn()
    {
        $this->assertInstanceOf(WaVideoTemplate::class, WaVideoTemplate::create()->setBodyParams(["body params"]));
    }

    public function testSetHeaderParamsReturn()
    {
        $this->assertInstanceOf(WaVideoTemplate::class, WaVideoTemplate::create()->setHeaderParams("header params"));
    }

    public function testSetMediaContentReturn()
    {
        $contentBuilder = WaVideoContentBuilder::create()->setRichMediaUrl("url");

        $this->assertInstanceOf(WaVideoTemplate::class, WaVideoTemplate::create()->setMediaContent($contentBuilder));
    }

    public function testSetMediaThrowError()
    {
        $this->expectException(\InvalidArgumentException::class);
        WaVideoTemplate::create()->setMediaContent('123');
    }

    public function testRequestFields()
    {
        $params = [
            "header_params" => ["header params"],
            "body_params" => ["body params"],
            "language" => "language",
            "name" => "name",
            "media_content" => WaVideoContentBuilder::create()->setRichMediaUrl("url")->build(),
            "type" => "video",
            "wa_buttons" => [WaCallButton::create()->build()],
        ];

        $obj = WaVideoTemplate::create()
            ->setHeaderParams(["header params"])
            ->setBodyParams(["body params"])
            ->setLanguage("language")
            ->setName("name")
            ->setWaButton([WaCallButton::create()])
            ->setMediaContent(WaVideoContentBuilder::create()->setRichMediaUrl("url"));

        $this->assertEquals($params, $obj->build());
    }
}