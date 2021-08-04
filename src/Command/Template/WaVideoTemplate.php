<?php

namespace Mocean\Command\Template;

use Mocean\Command\ContentBuilder\WaVideoContentBuilder;

class WaVideoTemplate extends WaRichMediaTemplate
{
    public static function create()
    {
        return new self();
    }

    protected function type()
    {
        return "video";
    }

    public function setMediaContent($contentBuilder)
    {
        if ($contentBuilder instanceof WaVideoContentBuilder === false) {
            throw new \InvalidArgumentException("contentBuilder my be instance of WaVideoContentBuilder");
        }

        $this->requestData["media_content"] = $contentBuilder->build();
        return $this;
    }
}