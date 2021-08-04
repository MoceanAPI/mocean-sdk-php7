<?php


namespace Mocean\Command\Button;


class WaUrlParameterButton extends BaseWaButton
{
    public static function create()
    {
        return new self();
    }

    protected function type()
    {
        return "url";
    }

    public function setUrlParameter($urlParameter)
    {
        $this->requestData["url_parameter"] = $urlParameter;
        return $this;
    }

}