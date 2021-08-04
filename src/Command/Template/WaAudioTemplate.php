<?php

namespace Mocean\Command\Template;

use Mocean\Command\ContentBuilder\WaAudioContentBuilder;

class WaAudioTemplate extends WaRichMediaTemplate
{
    public static function create()
    {
        return new self();
    }

    protected function type()
    {
        return "audio";
    }

    public function setMediaContent($contentBuilder)
    {
        if ($contentBuilder instanceof WaAudioContentBuilder === false) {
            throw new \InvalidArgumentException("contentBuilder must be instance of WaAudioContentBuilder");
        }

        $this->requestData["media_content"] = $contentBuilder->build();
        return $this;
    }
}