<?php

namespace MoceanTest\Command\Mc;

use Mocean\Command\Mc\WaSendContact;
use Mocean\Command\ContentBuilder\WaContactContentBuilder;
use Mocean\Command\Contact\WaContact;
use MoceanTest\AbstractTesting;

class WaSendContactTest extends AbstractTesting
{
    public function testSetFromReturn()
    {
        $obj = new WaSendContact();
        $this->assertInstanceOf(WaSendContact::class, $obj->setFrom("TEST_FROM"));
    }

    public function testSetToReturn()
    {
        $obj = new WaSendContact();
        $this->assertInstanceOf(WaSendContact::class, $obj->setTO("TEST_TO"));
    }

    public function testSetContentReturn()
    {
        $contact = WaContact::create()->setFistName("hello")->setLastName("world")->setFullName("hello world")->setPhoneNum("phone_num");

        $obj = new WaSendContact();
        $this->assertInstanceOf(WaSendContact::class, $obj->setContent(WaContactContentBuilder::create()->setContactDetail($contact)));
    }

    public function testSetContentException()
    {
        $this->expectException(\InvalidArgumentException::class);
        $obj = new WaSendContact();
        $obj->setContent("Not object");
    }

    public function testRequestDataParams()
    {
        $contact = WaContact::create()->setFistName("hello")->setLastName("world")->setFullName("hello world")->setPhoneNum("phone_num");
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
                "type" => "contact_detail",
                "contact_detail" => $contact->build(),
            ),
            "action" => "send-whatsapp",
        );

        $req = new WaSendContact();
        $req->setFrom("testbot");
        $req->setTo("123456789");
        $req->setContent(WaContactContentBuilder::create()->setContactDetail($contact));
        $this->assertEquals($params, $req->getRequestData());
    }

    public function testRequiredField()
    {
        $this->expectException(\InvalidArgumentException::class);
        $req = new WaSendContact();
        $req->getRequestData();
    }

    public function testAction()
    {
        $req = new WaSendContact();
        $this->assertEquals('send-whatsapp',$req->action());
    }
}