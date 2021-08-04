<?php

namespace MoceanTest\Command\Mc;

use Mocean\Command\Mc\WaSendPhoto;
use Mocean\Command\ContentBuilder\WaPhotoContentBuilder;
use MoceanTest\AbstractTesting;

class WaSendPhotoTest extends AbstractTesting
{
    public function testSetFromReturn()
    {
        $obj = new WaSendPhoto();
        $this->assertInstanceOf(WaSendPhoto::class, $obj->setFrom("TEST_FROM"));
    }

    public function testSetToReturn()
    {
        $obj = new WaSendPhoto();
        $this->assertInstanceOf(WaSendPhoto::class, $obj->setTO("TEST_TO"));
    }

    public function testSetContentReturn()
    {
        $obj = new WaSendPhoto();
        $this->assertInstanceOf(WaSendPhoto::class, $obj->setContent(WaPhotoContentBuilder::create()->setRichMediaUrl("url")));
    }

    public function testSetContentException()
    {
        $this->expectException(\InvalidArgumentException::class);
        $obj = new WaSendPhoto();
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
                "type" => "photo",
                "rich_media_url" => "url",
                "text" => "hello world"
            ),
            "action" => "send-whatsapp",
        );

        $req = new WaSendPhoto();
        $req->setFrom("testbot");
        $req->setTo("123456789");
        $req->setContent(WaPhotoContentBuilder::create()->setRichMediaUrl('url')->setText('hello world'));
        $this->assertEquals($params, $req->getRequestData());
    }

    public function testRequiredField()
    {
        $this->expectException(\InvalidArgumentException::class);
        $req = new WaSendPhoto();
        $req->getRequestData();
    }

    public function testAction()
    {
        $req = new WaSendPhoto();
        $this->assertEquals('send-whatsapp',$req->action());
    }
}