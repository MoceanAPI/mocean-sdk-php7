<?php

namespace Mocean\Command\Mc;

use Mocean\Command\ContentBuilder\WaLocationContentBuilder;

class WaSendLocation extends BaseWa
{
    /**
     * @param WaLocationContentBuilder $contentBuilder
     * @return $this
     */
    public function setContent($contentBuilder)
    {
        if ($contentBuilder instanceof WaLocationContentBuilder === false) {
            throw new \InvalidArgumentException("contentBuilder must be instance of WaLocationContentBuilder");
        }

        $this->requestData["content"] = $contentBuilder->build();
        return $this;
    }
}