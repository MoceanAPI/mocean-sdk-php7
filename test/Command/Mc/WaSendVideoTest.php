<?php

namespace MoceanTest\Command\Mc;

use Mocean\Command\Mc\WaSendVideo;
use Mocean\Command\ContentBuilder\WaVideoContentBuilder;
use MoceanTest\AbstractTesting;

class WaSendVideoTest extends AbstractTesting
{
    public function testSetFromReturn()
    {
        $obj = new WaSendVideo();
        $this->assertInstanceOf(WaSendVideo::class, $obj->setFrom("TEST_FROM"));
    }

    public function testSetToReturn()
    {
        $obj = new WaSendVideo();
        $this->assertInstanceOf(WaSendVideo::class, $obj->setTO("TEST_TO"));
    }

    public function testSetContentReturn()
    {
        $obj = new WaSendVideo();
        $this->assertInstanceOf(WaSendVideo::class, $obj->setContent(WaVideoContentBuilder::create()->setRichMediaUrl("url")));
    }

    public function testSetContentException()
    {
        $this->expectException(\InvalidArgumentException::class);
        $obj = new WaSendVideo();
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
                "type" => "video",
                "rich_media_url" => "url",
                "text" => "hello world"
            ),
            "action" => "send-whatsapp",
        );

        $req = new WaSendVideo();
        $req->setFrom("testbot");
        $req->setTo("123456789");
        $req->setContent(WaVideoContentBuilder::create()->setRichMediaUrl('url')->setText('hello world'));
        $this->assertEquals($params, $req->getRequestData());
    }

    public function testRequiredField()
    {
        $this->expectException(\InvalidArgumentException::class);
        $req = new WaSendVideo();
        $req->getRequestData();
    }

    public function testAction()
    {
        $req = new WaSendVideo();
        $this->assertEquals('send-whatsapp',$req->action());
    }
}