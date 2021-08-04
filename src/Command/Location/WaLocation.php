<?php


namespace Mocean\Command\Location;


class WaLocation extends AbstractLocation
{

    protected function requiredKey()
    {
        return ["latitude", "longitude"];
    }

    public static function create()
    {
        return new WaLocation();
    }

    public function setLatitude($latitude)
    {
        $this->requestData["latitude"] = $latitude;
        return $this;
    }

    public function setLongitude($longitude)
    {
        $this->requestData["longitude"] = $longitude;
        return $this;
    }

    public function setAccuracy($accuracy)
    {
        $this->requestData["accuracy"] = $accuracy;
        return $this;
    }

    public function setName($name)
    {
        $this->requestData["name"] = $name;
        return $this;
    }

    public function setAddress($address)
    {
        $this->requestData["address"] = $address;
        return $this;
    }
}