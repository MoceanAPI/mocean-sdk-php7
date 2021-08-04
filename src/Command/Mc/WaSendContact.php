<?php

namespace Mocean\Command\Mc;

use Mocean\Command\ContentBuilder\WaContactContentBuilder;

class WaSendContact extends BaseWa
{
    /**
     * @param WaContactContentBuilder $contentBuilder
     * @return $this
     */
    public function setContent($contentBuilder)
    {
        if ($contentBuilder instanceof WaContactContentBuilder === false) {
            throw new \InvalidArgumentException("contentBuilder must be instance of WaContactContentBuilder");
        }

        $this->requestData["content"] = $contentBuilder->build();
        return $this;
    }
}