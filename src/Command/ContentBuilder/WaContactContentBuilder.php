<?php


namespace Mocean\Command\ContentBuilder;

use Mocean\Command\Contact\WaContact;

class WaContactContentBuilder extends AbstractContentBuilder
{
    public function __construct()
    {
        $this->requestData["type"] = "contact_detail";
    }

    public static function create()
    {
        return new WaContactContentBuilder();
    }

    /**
     * @param WaContact $contactDetail
     * @return $this
     */
    public function setContactDetail(WaContact $contactDetail)
    {
        $this->requestData["contact_detail"] = $contactDetail->build();
        return $this;
    }

    protected function requiredKey()
    {
        return ["type", "contact_detail"];
    }
}