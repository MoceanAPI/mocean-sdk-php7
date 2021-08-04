<?php

namespace MoceanTest\Command\Mc;

use Mocean\Command\Mc\WaSendSticker;
use Mocean\Command\ContentBuilder\WaStickerContentBuilder;
use MoceanTest\AbstractTesting;

class WaSendStickerTest extends AbstractTesting
{
    public function testSetFromReturn()
    {
        $obj = new WaSendSticker();
        $this->assertInstanceOf(WaSendSticker::class, $obj->setFrom("TEST_FROM"));
    }

    public function testSetToReturn()
    {
        $obj = new WaSendSticker();
        $this->assertInstanceOf(WaSendSticker::class, $obj->setTO("TEST_TO"));
    }

    public function testSetContentReturn()
    {
        $obj = new WaSendSticker();
        $this->assertInstanceOf(WaSendSticker::class, $obj->setContent(WaStickerContentBuilder::create()->setRichMediaUrl("url")));
    }

    public function testSetContentException()
    {
        $this->expectException(\InvalidArgumentException::class);
        $obj = new WaSendSticker();
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
                "type" => "sticker",
                "rich_media_url" => "url",
                "text" => "hello world"
            ),
            "action" => "send-whatsapp",
        );

        $req = new WaSendSticker();
        $req->setFrom("testbot");
        $req->setTo("123456789");
        $req->setContent(WaStickerContentBuilder::create()->setRichMediaUrl('url')->setText('hello world'));
        $this->assertEquals($params, $req->getRequestData());
    }

    public function testRequiredField()
    {
        $this->expectException(\InvalidArgumentException::class);
        $req = new WaSendSticker();
        $req->getRequestData();
    }

    public function testAction()
    {
        $req = new WaSendSticker();
        $this->assertEquals('send-whatsapp',$req->action());
    }
}