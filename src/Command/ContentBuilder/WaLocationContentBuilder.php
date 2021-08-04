<?php


namespace Mocean\Command\ContentBuilder;

use Mocean\Command\Location\WaLocation;

class WaLocationContentBuilder extends AbstractContentBuilder
{
    public function __construct()
    {
        $this->requestData["type"] = "location";
    }

    protected function requiredKey()
    {
        return ["type", "location"];
    }

    public static function create()
    {
        return new WaLocationContentBuilder();
    }

    public function setLocation(WaLocation $location)
    {
        $this->requestData["location"] = $location->build();
        return $this;
    }
}