<?php

namespace MoceanTest\Command\Template;

use Mocean\Command\ContentBuilder\WaPhotoContentBuilder;
use Mocean\Command\Button\WaCallButton;
use MoceanTest\AbstractTesting;
use Mocean\Command\Template\WaPhotoTemplate;

class WaPhotoTemplateTest extends AbstractTesting
{
    public function testCreateInstance()
    {
        $this->assertInstanceOf(WaPhotoTemplate::class, WaPhotoTemplate::create());
    }

    public function testSetNameReturn()
    {
        $this->assertInstanceOf(WaPhotoTemplate::class, WaPhotoTemplate::create()->setName("name"));
    }

    public function testSetLanguageReturn()
    {
        $this->assertInstanceOf(WaPhotoTemplate::class, WaPhotoTemplate::create()->setLanguage("language"));
    }

    public function testSetBodyParamsReturn()
    {
        $this->assertInstanceOf(WaPhotoTemplate::class, WaPhotoTemplate::create()->setBodyParams(["body params"]));
    }

    public function testSetHeaderParamsReturn()
    {
        $this->assertInstanceOf(WaPhotoTemplate::class, WaPhotoTemplate::create()->setHeaderParams("header params"));
    }

    public function testSetMediaContentReturn()
    {
        $contentBuilder = WaPhotoContentBuilder::create()->setRichMediaUrl("url");

        $this->assertInstanceOf(WaPhotoTemplate::class, WaPhotoTemplate::create()->setMediaContent($contentBuilder));
    }

    public function testSetMediaThrowError()
    {
        $this->expectException(\InvalidArgumentException::class);
        WaPhotoTemplate::create()->setMediaContent('123');
    }

    public function testRequestFields()
    {
        $params = [
            "header_params" => ["header params"],
            "body_params" => ["body params"],
            "language" => "language",
            "name" => "name",
            "media_content" => WaPhotoContentBuilder::create()->setRichMediaUrl("url")->build(),
            "type" => "photo",
            "wa_buttons" => [WaCallButton::create()->build()],
        ];

        $obj = WaPhotoTemplate::create()
            ->setHeaderParams(["header params"])
            ->setBodyParams(["body params"])
            ->setLanguage("language")
            ->setName("name")
            ->setWaButton([WaCallButton::create()])
            ->setMediaContent(WaPhotoContentBuilder::create()->setRichMediaUrl("url"));

        $this->assertEquals($params, $obj->build());
    }
}