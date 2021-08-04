<?php

namespace Mocean\Command\Template;

use Mocean\Command\ContentBuilder\WaContactContentBuilder;

class WaContactTemplate extends BaseWaTemplate
{
    public static function create()
    {
        return new self();
    }

    protected function type()
    {
        return "contact_detail";
    }

    public function setMediaContent($contentBuilder)
    {
        if ($contentBuilder instanceof WaContactContentBuilder === false) {
            throw new \InvalidArgumentException("contentBuilder must be instance of WaContactContentBuilder");
        }

        $this->requestData["media_content"] = $contentBuilder->build();
        return $this;
    }
}