<?php

namespace MoceanTest\Command\Mc;

use Mocean\Command\Mc\WaSendAudio;
use Mocean\Command\ContentBuilder\WaAudioContentBuilder;
use MoceanTest\AbstractTesting;

class WaSendAudioTest extends AbstractTesting
{
    public function testSetFromReturn()
    {
        $obj = new WaSendAudio();
        $this->assertInstanceOf(WaSendAudio::class, $obj->setFrom("TEST_FROM"));
    }

    public function testSetToReturn()
    {
        $obj = new WaSendAudio();
        $this->assertInstanceOf(WaSendAudio::class, $obj->setTO("TEST_TO"));
    }

    public function testSetContentReturn()
    {
        $obj = new WaSendAudio();
        $this->assertInstanceOf(WaSendAudio::class, $obj->setContent(WaAudioContentBuilder::create()->setRichMediaUrl("url")));
    }

    public function testSetContentException()
    {
        $this->expectException(\InvalidArgumentException::class);
        $obj = new WaSendAudio();
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
                "type" => "audio",
                "rich_media_url" => "url",
                "text" => "hello world"
            ),
            "action" => "send-whatsapp",
        );

        $req = new WaSendAudio();
        $req->setFrom("testbot");
        $req->setTo("123456789");
        $req->setContent(WaAudioContentBuilder::create()->setRichMediaUrl('url')->setText('hello world'));
        $this->assertEquals($params, $req->getRequestData());
    }

    public function testRequiredField()
    {
        $this->expectException(\InvalidArgumentException::class);
        $req = new WaSendAudio();
        $req->getRequestData();
    }


    public function testAction()
    {
        $req = new WaSendAudio();
        $this->assertEquals('send-whatsapp',$req->action());
    }
}