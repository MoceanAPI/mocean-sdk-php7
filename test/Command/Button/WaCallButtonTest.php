<?php

namespace MoceanTest\Command\Button;

use MoceanTest\AbstractTesting;
use Mocean\Command\Button\WaCallButton;

class WaCallButtonTest extends AbstractTesting
{
    public function testCreateInstance()
    {
        $this->assertInstanceOf(WaCallButton::class, WaCallButton::create());
    }

    public function testBuild()
    {
        $params = [
            "type" => "call",
        ];

        $this->assertEquals($params, WaCallButton::create()->build());
    }

    public function testType()
    {
        $data = WaCallButton::create()->build();
        $this->assertEquals("call" , $data["type"]);
    }
}