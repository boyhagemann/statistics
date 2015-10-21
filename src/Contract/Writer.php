<?php

namespace Boyhagemann\Statistics\Contract;

interface Writer
{
    public function setDriver($name, Driver $driver);
    public function getDriver($name);
    public function getDrivers();

    public function startSession($session, $time, $browser);
    public function visitPage($session, $time, $page);
    public function changeFilter($session, $time, $filter);
    public function clickProduct($session, $time, $product);
    public function buyProduct($session, $time, $product);
}