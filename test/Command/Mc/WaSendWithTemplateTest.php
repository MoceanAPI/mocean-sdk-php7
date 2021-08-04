<?php

namespace MoceanTest\Command\Mc;

use Mocean\Command\Mc\WaSendWithTemplate;
use Mocean\Command\ContentBuilder\WaTemplateContentBuilder;
use Mocean\Command\ContentBuilder\WaRichMediaContentBuilder;
use Mocean\Command\Template\WaTextTemplate;
use Mocean\Command\Button\WaCallButton;
use Mocean\Command\Button\WaUrlParameterButton;
use MoceanTest\AbstractTesting;

class WaSendWithTemplateTest extends AbstractTesting
{
    public function testSetFromReturn()
    {
        $obj = new WaSendWithTemplate();
        $this->assertInstanceOf(WaSendWithTemplate::class, $obj->setFrom("TEST_FROM"));
    }

    public function testSetToReturn()
    {
        $obj = new WaSendWithTemplate();
        $this->assertInstanceOf(WaSendWithTemplate::class, $obj->setTO("TEST_TO"));
    }

    public function testSetContentReturn()
    {
        $template = WaTextTemplate::create()->setLanguage("en")->setBodyParams(["body"])->setName("hello_world");

        $obj = new WaSendWithTemplate();
        $this->assertInstanceOf(WaSendWithTemplate::class, $obj->setContent(WaTemplateContentBuilder::create()->setWaTemplate($template)));
    }

    public function testSetContentException()
    {
        $this->expectException(\InvalidArgumentException::class);
        $obj = new WaSendWithTemplate();
        $obj->setContent("Not object");
    }

    public function testRequestDataParams()
    {
        $template = WaTextTemplate::create()->setLanguage("en")->setBodyParams(["body"])->setName("hello_world");

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
                "type" => "template",
                "wa_template" => $template->build(),
            ),
            "action" => "send-whatsapp",
        );

        $req = new WaSendWithTemplate();
        $req->setFrom("testbot");
        $req->setTo("123456789");
        $req->setContent(WaTemplateContentBuilder::create()->setWaTemplate($template));
        $this->assertEquals($params, $req->getRequestData());
    }

    public function testRequiredField()
    {
        $this->expectException(\InvalidArgumentException::class);
        $req = new WaSendWithTemplate();
        $req->getRequestData();
    }

    public function testAction()
    {
        $req = new WaSendWithTemplate();
        $this->assertEquals('send-whatsapp',$req->action());
    }
}