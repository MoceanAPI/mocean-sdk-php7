<?php

namespace MoceanTest\Command\Template;

use Mocean\Command\ContentBuilder\WaStickerContentBuilder;
use Mocean\Command\Button\WaCallButton;
use MoceanTest\AbstractTesting;
use Mocean\Command\Template\WaStickerTemplate;

class WaStickerTemplateTest extends AbstractTesting
{
    public function testCreateInstance()
    {
        $this->assertInstanceOf(WaStickerTemplate::class, WaStickerTemplate::create());
    }

    public function testSetNameReturn()
    {
        $this->assertInstanceOf(WaStickerTemplate::class, WaStickerTemplate::create()->setName("name"));
    }

    public function testSetLanguageReturn()
    {
        $this->assertInstanceOf(WaStickerTemplate::class, WaStickerTemplate::create()->setLanguage("language"));
    }

    public function testSetBodyParamsReturn()
    {
        $this->assertInstanceOf(WaStickerTemplate::class, WaStickerTemplate::create()->setBodyParams(["body params"]));
    }

    public function testSetHeaderParamsReturn()
    {
        $this->assertInstanceOf(WaStickerTemplate::class, WaStickerTemplate::create()->setHeaderParams("header params"));
    }

    public function testSetMediaContentReturn()
    {
        $contentBuilder = WaStickerContentBuilder::create()->setRichMediaUrl("url");

        $this->assertInstanceOf(WaStickerTemplate::class, WaStickerTemplate::create()->setMediaContent($contentBuilder));
    }

    public function testMediaThrowError()
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->assertInstanceOf(WaStickerTemplate::class, WaStickerTemplate::create()->setMediaContent("1"));
    }

    public function testRequestFields()
    {
        $params = [
            "header_params" => ["header params"],
            "body_params" => ["body params"],
            "language" => "language",
            "name" => "name",
            "media_content" => WaStickerContentBuilder::create()->setRichMediaUrl("url")->build(),
            "type" => "sticker",
            "wa_buttons" => [WaCallButton::create()->build()],
        ];

        $obj = WaStickerTemplate::create()
            ->setHeaderParams(["header params"])
            ->setBodyParams(["body params"])
            ->setLanguage("language")
            ->setName("name")
            ->setWaButton([WaCallButton::create()])
            ->setMediaContent(WaStickerContentBuilder::create()->setRichMediaUrl("url"));

        $this->assertEquals($params, $obj->build());
    }
}