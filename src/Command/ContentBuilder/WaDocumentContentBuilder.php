<?php

namespace Mocean\Command\ContentBuilder;

class WaDocumentContentBuilder extends WaRichMediaContentBuilder
{
    public static function create()
    {
        return new self();
    }

    public function build()
    {
        $this->requestData["type"] = "document";
        return parent::build();
    }
}