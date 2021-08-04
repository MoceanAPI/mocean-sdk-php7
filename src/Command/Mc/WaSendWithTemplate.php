<?php

namespace Mocean\Command\Mc;

use Mocean\Command\ContentBuilder\WaTemplateContentBuilder;

class WaSendWithTemplate extends BaseWa
{
    /**
     * @param WaTemplateContentBuilder $contentBuilder
     * @return $this
     */
    public function setContent($contentBuilder)
    {
        if ($contentBuilder instanceof WaTemplateContentBuilder === false) {
            throw new \InvalidArgumentException("contentBuilder must be instance of WaTemplateContentBuilder");
        }
        $this->requestData["content"] = $contentBuilder->build();
        $this->requestData["content"]["type"] = "template";
        return $this;
    }
}