<?php


namespace Mocean\Command\Button;


class WaQuickReplyButton extends BaseWaButton
{
    public static function create()
    {
        return new self();
    }

    protected function type()
    {
        return "quick_reply";
    }

    public function setQuickReply($quickReply)
    {
        $this->requestData["quick_reply"] = $quickReply;
        return $this;
    }
}