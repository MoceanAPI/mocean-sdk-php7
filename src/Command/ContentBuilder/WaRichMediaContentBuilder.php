<?php


namespace Mocean\Command\ContentBuilder;


abstract class WaRichMediaContentBuilder extends AbstractContentBuilder
{
    public function setRichMediaUrl($url) {
        $this->requestData["rich_media_url"] = $url;
        return $this;
    }

    public function setText($text) {
        $this->requestData["text"] = $text;
        return $this;
    }

    protected function requiredKey()
    {
        return array("rich_media_url");
    }
}