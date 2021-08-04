<?php

namespace MoceanTest\Command\Template;

use MoceanTest\AbstractTesting;
use Mocean\Command\Template\WaLocationTemplate;
use Mocean\Command\Button\WaCallButton;
use Mocean\Command\ContentBuilder\WaLocationContentBuilder;
use Mocean\Command\Location\WaLocation;

class WaLocationTemplateTest extends AbstractTesting
{
    public function testCreateInstance()
    {
        $this->assertInstanceOf(WaLocationTemplate::class, WaLocationTemplate::create());
    }

    public function testSetNameReturn()
    {
        $this->assertInstanceOf(WaLocationTemplate::class, WaLocationTemplate::create()->setName("name"));
    }

    public function testSetLanguageReturn()
    {
        $this->assertInstanceOf(WaLocationTemplate::class, WaLocationTemplate::create()->setLanguage("language"));
    }

    public function testSetBodyParamsReturn()
    {
        $this->assertInstanceOf(WaLocationTemplate::class, WaLocationTemplate::create()->setBodyParams(["body params"]));
    }

    public function testSetHeaderParamsReturn()
    {
        $this->assertInstanceOf(WaLocationTemplate::class, WaLocationTemplate::create()->setHeaderParams("header params"));
    }

    public function testSetMediaContentReturn()
    {
        $location = WaLocation::create()->setLongitude("longitude")->setLatitude("latitude");
        $contentBuilder = WaLocationContentBuilder::create()->setLocation($location);
        $this->assertInstanceOf(WaLocationTemplate::class, WaLocationTemplate::create()->setMediaContent($contentBuilder));
    }

    public function testSetMediaThrowError()
    {
        $this->expectException(\InvalidArgumentException::class);
        WaLocationTemplate::create()->setMediaContent('123');
    }

    public function testRequestFields()
    {
        $location = WaLocation::create()->setLongitude("longitude")->setLatitude("latitude");
        $locationContentBuilder = WaLocationContentBuilder::create()->setLocation($location);

        $params = [
            "header_params" => ["header params"],
            "body_params" => ["body params"],
            "language" => "language",
            "name" => "name",
            "media_content" => $locationContentBuilder->build(),
            "type" => "location",
            "wa_buttons" => [WaCallButton::create()->build()],
        ];

        $obj = WaLocationTemplate::create()
            ->setHeaderParams(["header params"])
            ->setBodyParams(["body params"])
            ->setLanguage("language")
            ->setName("name")
            ->setWaButton([WaCallButton::create()])
            ->setMediaContent($locationContentBuilder);

        $this->assertEquals($params, $obj->build());
    }
}