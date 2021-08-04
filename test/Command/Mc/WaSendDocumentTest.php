<?php

namespace MoceanTest\Command\Mc;

use Mocean\Command\Mc\WaSendDocument;
use Mocean\Command\ContentBuilder\WaDocumentContentBuilder;
use MoceanTest\AbstractTesting;

class WaSendDocumentTest extends AbstractTesting
{
    public function testSetFromReturn()
    {
        $obj = new WaSendDocument();
        $this->assertInstanceOf(WaSendDocument::class, $obj->setFrom("TEST_FROM"));
    }

    public function testSetToReturn()
    {
        $obj = new WaSendDocument();
        $this->assertInstanceOf(WaSendDocument::class, $obj->setTO("TEST_TO"));
    }

    public function testSetContentReturn()
    {
        $obj = new WaSendDocument();
        $this->assertInstanceOf(WaSendDocument::class, $obj->setContent(WaDocumentContentBuilder::create()->setRichMediaUrl("url")));
    }

    public function testSetContentException()
    {
        $this->expectException(\InvalidArgumentException::class);
        $obj = new WaSendDocument();
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
                "type" => "document",
                "rich_media_url" => "url",
                "text" => "hello world"
            ),
            "action" => "send-whatsapp",
        );

        $req = new WaSendDocument();
        $req->setFrom("testbot");
        $req->setTo("123456789");
        $req->setContent(WaDocumentContentBuilder::create()->setRichMediaUrl('url')->setText('hello world'));
        $this->assertEquals($params, $req->getRequestData());
    }

    public function testRequiredField()
    {
        $this->expectException(\InvalidArgumentException::class);
        $req = new WaSendDocument();
        $req->getRequestData();
    }

    public function testAction()
    {
        $req = new WaSendDocument();
        $this->assertEquals('send-whatsapp', $req->action());
    }
}