<?php

namespace MoceanTest\Command\Mc;

use Mocean\Command\Mc\WaSendText;
use Mocean\Command\ContentBuilder\WaTextContentBuilder;
use MoceanTest\AbstractTesting;

class WaSendTextTest extends AbstractTesting
{
    public function testSetFromReturn()
    {
        $obj = new WaSendText();
        $this->assertInstanceOf(WaSendText::class, $obj->setFrom("TEST_FROM"));
    }

    public function testSetToReturn()
    {
        $obj = new WaSendText();
        $this->assertInstanceOf(WaSendText::class, $obj->setTO("TEST_TO"));
    }

    public function testSetContentReturn()
    {
        $obj = new WaSendText();
        $this->assertInstanceOf(WaSendText::class, $obj->setContent(WaTextContentBuilder::create()->setText("url")));
    }

    public function testSetContentException()
    {
        $this->expectException(\InvalidArgumentException::class);
        $obj = new WaSendText();
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
                "type" => "text",
                "text" => "hello world"
            ),
            "action" => "send-whatsapp",
        );

        $req = new WaSendText();
        $req->setFrom("testbot");
        $req->setTo("123456789");
        $req->setContent(WaTextContentBuilder::create()->setText('hello world'));
        $this->assertEquals($params, $req->getRequestData());
    }

    public function testRequiredField()
    {
        $this->expectException(\InvalidArgumentException::class);
        $req = new WaSendText();
        $req->getRequestData();
    }

    public function testAction()
    {
        $req = new WaSendText();
        $this->assertEquals('send-whatsapp',$req->action());
    }
}