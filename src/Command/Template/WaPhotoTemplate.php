<?php

namespace Mocean\Command\Template;

use Mocean\Command\ContentBuilder\WaPhotoContentBuilder;

class WaPhotoTemplate extends WaRichMediaTemplate
{
    public static function create()
    {
        return new self();
    }

    protected function type()
    {
        return "photo";
    }

    public function setMediaContent($contentBuilder)
    {
        if ($contentBuilder instanceof WaPhotoContentBuilder === false) {
            throw new \InvalidArgumentException("contentBuilder must be instance of WaPhotoContentBuilder");
        }

        $this->requestData["media_content"] = $contentBuilder->build();
        return $this;
    }
}