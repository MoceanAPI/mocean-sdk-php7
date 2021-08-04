<?php

namespace Mocean\Command\Mc;

use Mocean\Command\ContentBuilder\WaPhotoContentBuilder;

class WaSendPhoto extends BaseWa
{
    /**
     * @param WaPhotoContentBuilder $contentBuilder
     * @return $this
     */
    public function setContent($contentBuilder)
    {
        if ($contentBuilder instanceof WaPhotoContentBuilder === false) {
            throw new \InvalidArgumentException("contentBuilder must be instance of WaPhotoContentBuilder");
        }

        $this->requestData["content"] = $contentBuilder->build();
        $this->requestData["content"]["type"] = "photo";
        return $this;
    }

}