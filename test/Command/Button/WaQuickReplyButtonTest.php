<?php

namespace MoceanTest\Command\Button;

use Mocean\Command\Button\WaQuickReplyButton;
use MoceanTest\AbstractTesting;

class WaQuickReplyButtonTest extends AbstractTesting
{
    public function testCreateInstance()
    {
        $this->assertInstanceOf(WaQuickReplyButton::class , WaQuickReplyButton::create());
    }

    public function testSetQuickReplyReturn()
    {
        $this->assertInstanceOf(WaQuickReplyButton::class, WaQuickReplyButton::create()->setQuickReply('quickReply'));
    }

    public function testType()
    {
        $data = WaQuickReplyButton::create()->build();
        $this->assertEquals("quick_reply" , $data["type"]);
    }
}