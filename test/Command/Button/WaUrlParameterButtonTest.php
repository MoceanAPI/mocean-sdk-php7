<?php

namespace MoceanTest\Command\Button;

use MoceanTest\AbstractTesting;
use Mocean\Command\Button\WaUrlParameterButton;

class WaUrlParameterButtonTest extends AbstractTesting
{
    public function testCreateInstance()
    {
        $this->assertInstanceOf(WaUrlParameterButton::class, WaUrlParameterButton::create());
    }

    public function testSetUrlParameterReturn ()
    {
        $this->assertInstanceOf(WaUrlParameterButton::class, WaUrlParameterButton::create()->setUrlParameter("url"));
    }
    public function testType()
    {
        $data = WaUrlParameterButton::create()->build();
        $this->assertEquals("url" , $data["type"]);
    }
}