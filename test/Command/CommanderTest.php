<?php

namespace MoceanTest\Command;

use MoceanTest\AbstractTesting;
use Mocean\Command\Commander;

class CommanderTest extends AbstractTesting
{

    protected function setUp():void
    {
        $this->mockJsonResponseStr = $this->getResponseString('command.json');
        $this->mockXmlResponseStr = $this->getResponseString('command.xml');

        $this->jsonResponse = \Mocean\Command\Commander::createFromResponse($this->mockJsonResponseStr, $this->defaultVersion);
        $this->xmlResponse = \Mocean\Command\Commander::createFromResponse($this->mockXmlResponseStr, $this->defaultVersion);
    }

    public function testRequestDataParams()
    {
        $params = [
            'mocean-event-url'   => 'testing event url',
            'mocean-command'     => '"testing mocean command"',
            'mocean-resp-format'     => 'json',
        ];


        $setterReq = new Commander();
        $setterReq->setEventUrl('testing event url');
        $setterReq->setCommand('testing mocean command');
        $setterReq->setResponseFormat('json');

        $this->assertEquals($params, $setterReq->getRequestData());
    }

}