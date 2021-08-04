<?php

namespace Mocean\Command\Template;

use Mocean\Command\Mc\BaseWa;

abstract class WaRichMediaTemplate extends BaseWaTemplate
{
    abstract public function setMediaContent($contentBuilder);
}