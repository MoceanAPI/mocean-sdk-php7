<?php

namespace MoceanTest\Command\Mc;

use Mocean\Command\Mc\WaSendLocation;
use Mocean\Command\ContentBuilder\WaLocationContentBuilder;
use Mocean\Command\Location\WaLocation;
use MoceanTest\AbstractTesting;

class WaSendLocationTest extends AbstractTesting
{
    public function testSetFromReturn()
    {
        $obj = new WaSendLocation();
        $this->assertInstanceOf(WaSendLocation::class, $obj->setFrom("TEST_FROM"));
    }

    public function testSetToReturn()
    {
        $obj = new WaSendLocation();
        $this->assertInstanceOf(WaSendLocation::class, $obj->setTO("TEST_TO"));
    }

    public function testSetContentReturn()
    {
        $location = WaLocation::create()->setLatitude("123")->setLongitude("456");
        $obj = new WaSendLocation();
        $this->assertInstanceOf(WaSendLocation::class, $obj->setContent(WaLocationContentBuilder::create()->setLocation($location)));
    }

    public function testSetContentException()
    {
        $this->expectException(\InvalidArgumentException::class);
        $obj = new WaSendLocation();
        $obj->setContent("Not object");
    }

    public function testRequestDataParams()
    {
        $params = array(
            "from" => array(
                "type" => "bot_username",
                "id" => "testbot"
            ),
            "to" => array(
                "type" => "phone_num",
                "id" => "123456789"
            ),
            "content" => array(
                "type" => "location",
                "location" => [
                    "latitude" => "123",
                    "longitude" => "456",
                ]
            ),
            "action" => "send-whatsapp",
        );

        $location = WaLocation::create()->setLatitude("123")->setLongitude("456");

        $req = new WaSendLocation();
        $req->setFrom("testbot");
        $req->setTo("123456789");
        $req->setContent(WaLocationContentBuilder::create()->setLocation($location));
        $this->assertEquals($params, $req->getRequestData());
    }

    public function testRequiredField()
    {
        $this->expectException(\InvalidArgumentException::class);
        $req = new WaSendLocation();
        $req->getRequestData();
    }

    public function testAction()
    {
        $req = new WaSendLocation();
        $this->assertEquals('send-whatsapp',$req->action());
    }
}