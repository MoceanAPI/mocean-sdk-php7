<?php

namespace MoceanTest\Command\Template;

use MoceanTest\AbstractTesting;
use Mocean\Command\Template\WaContactTemplate;
use Mocean\Command\Button\WaCallButton;
use Mocean\Command\ContentBuilder\WaContactContentBuilder;
use Mocean\Command\Contact\WaContact;


class WaContactTemplateTest extends AbstractTesting
{
    public function testCreateInstance()
    {
        $this->assertInstanceOf(WaContactTemplate::class, WaContactTemplate::create());
    }

    public function testSetNameReturn()
    {
        $this->assertInstanceOf(WaContactTemplate::class, WaContactTemplate::create()->setName("name"));
    }

    public function testSetLanguageReturn()
    {
        $this->assertInstanceOf(WaContactTemplate::class, WaContactTemplate::create()->setLanguage("language"));
    }

    public function testSetBodyParamsReturn()
    {
        $this->assertInstanceOf(WaContactTemplate::class, WaContactTemplate::create()->setBodyParams(["body params"]));
    }

    public function testSetHeaderParamsReturn()
    {
        $this->assertInstanceOf(WaContactTemplate::class, WaContactTemplate::create()->setHeaderParams("header params"));
    }

    public function testSetMediaContentReturn()
    {
        $contactDetail = WaContact::create()->setFistName("hello")->setLastName("world")->setFullName("hello world")->setPhoneNum("123456789");
        $contentBuilder = WaContactContentBuilder::create()->setContactDetail($contactDetail);
        $this->assertInstanceOf(WaContactTemplate::class, WaContactTemplate::create()->setMediaContent($contentBuilder));
    }

    public function testSetMediaThrowError()
    {
        $this->expectException(\InvalidArgumentException::class);
        WaContactTemplate::create()->setMediaContent('123');
    }

    public function testRequestFields()
    {
        $contactDetail = WaContact::create()->setFistName("hello")->setLastName("world")->setFullName("hello world")->setPhoneNum("123456789");
        $contactContentBuilder = WaContactContentBuilder::create()->setContactDetail($contactDetail);

        $params = [
            "header_params" => ["header params"],
            "body_params" => ["body params"],
            "language" => "language",
            "name" => "name",
            "media_content" => $contactContentBuilder->build(),
            "type" => "contact_detail",
            "wa_buttons" => [WaCallButton::create()->build()],
        ];

        $obj = WaContactTemplate::create()
            ->setHeaderParams(["header params"])
            ->setBodyParams(["body params"])
            ->setLanguage("language")
            ->setName("name")
            ->setWaButton([WaCallButton::create()])
            ->setMediaContent($contactContentBuilder);

        $this->assertEquals($params, $obj->build());
    }
}