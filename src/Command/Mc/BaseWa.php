<?php

namespace Mocean\Command\Mc;

abstract class BaseWa extends AbstractMc
{

    abstract public function setContent($contentBuilder);

    public function action()
    {
        return "send-whatsapp";
    }

    public function setFrom($id, $type = "bot_username")
    {
        $this->requestData["from"] = [
            "type" => $type,
            "id" => $id,
        ];
        return $this;
    }

    public function setTo($id, $type = "phone_num")
    {
        $this->requestData["to"] = [
            "type" => $type,
            "id" => $id,
        ];
        return $this;
    }

    protected function requiredKey()
    {
        return ["from", "to", "content"];
    }
}