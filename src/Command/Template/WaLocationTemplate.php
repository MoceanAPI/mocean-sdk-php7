<?php

namespace Mocean\Command\Template;


use Mocean\Command\ContentBuilder\WaLocationContentBuilder;

class WaLocationTemplate extends BaseWaTemplate
{

    public static function create()
    {
        return new self();
    }

    protected function type()
    {
        return "location";
    }

    public function setMediaContent($contentBuilder)
    {
        if ($contentBuilder instanceof WaLocationContentBuilder === false) {
            throw new \InvalidArgumentException("contentBuilder must be instance of WaLocationContentBuilder");
        }

        $this->requestData["media_content"] = $contentBuilder->build();
        return $this;
    }
}