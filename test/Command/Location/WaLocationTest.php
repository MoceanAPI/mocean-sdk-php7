<?php

namespace MoceanTest\Command\Location;

use MoceanTest\AbstractTesting;
use Mocean\Command\Location\WaLocation;

class WaLocationTest extends AbstractTesting
{
    public function testCreateInstance()
    {
        $this->assertInstanceOf(WaLocation::class, WaLocation::create());
    }

    public function testSetLatitudeReturn()
    {
        $this->assertInstanceOf(WaLocation::class, WaLocation::create()->setLatitude("latitude"));
    }

    public function testSetLongitudeReturn()
    {
        $this->assertInstanceOf(WaLocation::class, WaLocation::create()->setLatitude("longitude"));
    }

    public function testSetAccuracyReturn()
    {
        $this->assertInstanceOf(WaLocation::class, WaLocation::create()->setAccuracy("accuracy"));
    }

    public function testSetNameReturn()
    {
        $this->assertInstanceOf(WaLocation::class, WaLocation::create()->setName("name"));
    }

    public function testSetAddressReturn()
    {
        $this->assertInstanceOf(WaLocation::class, WaLocation::create()->setAddress("latitude"));
    }

    public function testRequiredKey()
    {
        $this->expectException(\InvalidArgumentException::class);
        WaLocation::create()->build();
    }

    public function testRequestData()
    {
        $params = [
            "longitude" => "longitude",
            "latitude" => "latitude",
            "name" => "name",
            "address" => "address",
            "accuracy" => "accuracy",
        ];

        $data = WaLocation::create()
            ->setLongitude("longitude")
            ->setLatitude("latitude")
            ->setName("name")
            ->setAddress("address")
            ->setAccuracy("accuracy");

        $this->assertEquals($params, $data->build());
    }
}