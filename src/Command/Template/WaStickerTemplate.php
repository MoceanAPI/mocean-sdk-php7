<?php

namespace Mocean\Command\Template;

use Mocean\Command\ContentBuilder\WaStickerContentBuilder;

class WaStickerTemplate extends WaRichMediaTemplate
{
    public static function create()
    {
        return new self();
    }

    protected function type()
    {
        return "sticker";
    }

    public function setMediaContent($contentBuilder)
    {
        if ($contentBuilder instanceof WaStickerContentBuilder === false) {
            throw new \InvalidArgumentException("contentBuilder must be instance of WaStickerContentBuilder");
        }

        $this->requestData["media_content"] = $contentBuilder->build();
        return $this;
    }
}