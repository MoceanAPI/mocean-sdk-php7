<?php

namespace MoceanTest\Command\Contact;

use MoceanTest\AbstractTesting;
use Mocean\Command\Contact\WaContact;

class WaContactTest extends AbstractTesting
{
    public function testCreateInstance()
    {
        $this->assertInstanceOf(WaContact::class, WaContact::create());
    }

    public function testSetFirstNameReturn()
    {
        $this->assertInstanceOf(WaContact::class, WaContact::create()->setFistName('fname'));
    }

    public function testSetLastNameReturn()
    {
        $this->assertInstanceOf(WaContact::class, WaContact::create()->setLastName('lname'));
    }

    public function testSetFullameReturn()
    {
        $this->assertInstanceOf(WaContact::class, WaContact::create()->setFullName('fname'));
    }

    public function testSetPhoneNumReturn()
    {
        $this->assertInstanceOf(WaContact::class, WaContact::create()->setPhoneNum('phone_num'));
    }

    public function testRequiredKey()
    {
        $this->expectException(\InvalidArgumentException::class);
        WaContact::create()->build();
    }

    public function testRequestDataParams()
    {
        $params = [
            "first_name" => "fname",
            "last_name" => "lname",
            "full_name" => "fname",
            "phone_num" => "phone_num",
        ];

        $obj = WaContact::create()->setFistName("fname")->setLastName("lname")->setFullName("fname")->setPhoneNum("phone_num");

        $this->assertEquals($params, $obj->build());
    }
}