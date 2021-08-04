<?php

namespace MoceanTest\Command\Template;

use Mocean\Command\ContentBuilder\WaDocumentContentBuilder;
use Mocean\Command\Button\WaCallButton;
use MoceanTest\AbstractTesting;
use Mocean\Command\Template\WaDocumentTemplate;

class WaDocumentTemplateTest extends AbstractTesting
{
    public function testCreateInstance()
    {
        $this->assertInstanceOf(WaDocumentTemplate::class, WaDocumentTemplate::create());
    }

    public function testSetNameReturn()
    {
        $this->assertInstanceOf(WaDocumentTemplate::class, WaDocumentTemplate::create()->setName("name"));
    }

    public function testSetLanguageReturn()
    {
        $this->assertInstanceOf(WaDocumentTemplate::class, WaDocumentTemplate::create()->setLanguage("language"));
    }

    public function testSetBodyParamsReturn()
    {
        $this->assertInstanceOf(WaDocumentTemplate::class, WaDocumentTemplate::create()->setBodyParams(["body params"]));
    }

    public function testSetHeaderParamsReturn()
    {
        $this->assertInstanceOf(WaDocumentTemplate::class, WaDocumentTemplate::create()->setHeaderParams("header params"));
    }

    public function testSetMediaContentReturn()
    {
        $contentBuilder = WaDocumentContentBuilder::create()->setRichMediaUrl("url");

        $this->assertInstanceOf(WaDocumentTemplate::class, WaDocumentTemplate::create()->setMediaContent($contentBuilder));
    }

    public function testSetMediaThrowError()
    {
        $this->expectException(\InvalidArgumentException::class);
        WaDocumentTemplate::create()->setMediaContent('123');
    }

    public function testRequestFields()
    {
        $params = [
            "header_params" => ["header params"],
            "body_params" => ["body params"],
            "language" => "language",
            "name" => "name",
            "media_content" => WaDocumentContentBuilder::create()->setRichMediaUrl("url")->build(),
            "type" => "document",
            "wa_buttons" => [WaCallButton::create()->build()],
        ];

        $obj = WaDocumentTemplate::create()
            ->setHeaderParams(["header params"])
            ->setBodyParams(["body params"])
            ->setLanguage("language")
            ->setName("name")
            ->setWaButton([WaCallButton::create()])
            ->setMediaContent(WaDocumentContentBuilder::create()->setRichMediaUrl("url"));

        $this->assertEquals($params, $obj->build());
    }
}