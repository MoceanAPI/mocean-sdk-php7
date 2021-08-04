<?php

namespace Mocean\Command\Template;

use Mocean\Command\ContentBuilder\WaDocumentContentBuilder;

class WaDocumentTemplate extends WaRichMediaTemplate
{
    public static function create()
    {
        return new self();
    }

    protected function type()
    {
        return "document";
    }

    public function setMediaContent($contentBuilder)
    {
        if ($contentBuilder instanceof WaDocumentContentBuilder === false) {
            throw new \InvalidArgumentException("contentBuilder must be instance of WaDocumentContentBuilder");
        }

        $this->requestData["media_content"] = $contentBuilder->build();
        return $this;
    }
}