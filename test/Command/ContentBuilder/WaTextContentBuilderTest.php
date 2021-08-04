<?php

namespace MoceanTest\Command\ContentBuilder;

use MoceanTest\AbstractTesting;
use Mocean\Command\ContentBuilder\WaTextContentBuilder;

class WaTextContentBuilderTest extends AbstractTesting
{
    public function testCreateInstance()
    {
        $this->assertInstanceOf(WaTextContentBuilder::class, WaTextContentBuilder::create());
    }

    public function testSetTextReturn()
    {
        $this->assertInstanceOf(WaTextContentBuilder::class, WaTextContentBuilder::create()->setText("text"));
    }

    public function testSetMarkdownReturn()
    {
        $this->assertInstanceOf(WaTextContentBuilder::class, WaTextContentBuilder::create()->setMarkdown("markdown"));
    }
}