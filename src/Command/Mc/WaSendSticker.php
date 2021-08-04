<?php


namespace Mocean\Command\Mc;

use Mocean\Command\ContentBuilder\WaStickerContentBuilder;

class WaSendSticker extends BaseWa
{
    /**
     * @param WaStickerContentBuilder $contentBuilder
     * @return $this
     */
    public function setContent($contentBuilder)
    {
        if ($contentBuilder instanceof WaStickerContentBuilder === false) {
            throw new \InvalidArgumentException("contentBuilder must be instance of WaStickerContentBuilder");
        }

        $this->requestData["content"] = $contentBuilder->build();
        $this->requestData["content"]["type"] = "sticker";
        return $this;
    }
}