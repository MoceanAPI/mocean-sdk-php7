<?php

namespace Mocean\Command\ContentBuilder;

use Mocean\Command\Template\BaseWaTemplate;

class WaTemplateContentBuilder extends AbstractContentBuilder
{

    public function __construct()
    {
        $this->requestData["type"] = "template";
    }

    protected function requiredKey()
    {
        return ["type","wa_template"];
    }

    public static function create()
    {
        return new WaTemplateContentBuilder();
    }

    public function setWaTemplate(BaseWaTemplate $waTemplate)
    {
        $this->requestData["wa_template"] = $waTemplate->build();
        return $this;
    }
}