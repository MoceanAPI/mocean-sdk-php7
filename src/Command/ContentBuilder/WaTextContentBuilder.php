<?php


namespace Mocean\Command\ContentBuilder;


class WaTextContentBuilder extends AbstractContentBuilder
{

    public function __construct()
    {
        $this->requestData["type"] = "text";
    }

    public function setText($text)
    {
        $this->requestData["text"] = $text;
        return $this;
    }

    public function setMarkdown($markdown)
    {
        $this->requestData["markdown"] = $markdown;
        return $this;
    }

    protected function requiredKey()
    {
        return ["type",'text'];
    }

    public static function create()
    {
        return new WaTextContentBuilder();
    }
}