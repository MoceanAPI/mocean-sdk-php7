<?php

namespace Mocean\Command\Mc;

use Mocean\Command\ContentBuilder\WaTextContentBuilder;

class WaSendText extends BaseWa
{
    /**
     * @param WaTextContentBuilder $contentBuilder
     * @return $this
     */
    public function setContent($contentBuilder)
    {
        if ($contentBuilder instanceof WaTextContentBuilder === false) {
            throw new \InvalidArgumentException("contentBuilder must be instance of WaTextContentBuilder");
        }

        $this->requestData["content"] = $contentBuilder->build();
        return $this;
    }
}