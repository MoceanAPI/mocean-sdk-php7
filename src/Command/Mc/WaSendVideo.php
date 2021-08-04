<?php


namespace Mocean\Command\Mc;

use Mocean\Command\ContentBuilder\WaVideoContentBuilder;

class WaSendVideo extends BaseWa
{
    /**
     * @param WaVideoContentBuilder $contentBuilder
     * @return $this
     */
    public function setContent($contentBuilder)
    {
        if ($contentBuilder instanceof WaVideoContentBuilder === false) {
            throw new \InvalidArgumentException("contentBuilder must be instance of WaVideoContentBuilder");
        }

        $this->requestData["content"] = $contentBuilder->build();
        $this->requestData["content"]["type"] = "video";
        return $this;
    }
}