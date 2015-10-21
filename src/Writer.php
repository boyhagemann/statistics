<?php

namespace Boyhagemann\Statistics;

use Boyhagemann\Statistics\Contract\Driver;

class Writer implements Contract\Writer
{
    /**
     * @var Driver[]
     */
    protected $drivers = [];

    /**
     * @param string $name
     * @param Driver $driver
     * @return $this
     */
    public function setDriver($name, Driver $driver)
    {
        $this->drivers[$name] = $driver;

        return $this;
    }

    /**
     * @param string $name
     * @return Driver
     */
    public function getDriver($name)
    {
        return $this->drivers[$name];
    }

    /**
     * @return Driver[]
     */
    public function getDrivers()
    {
        return $this->drivers;
    }

    public function startSession($session, $time, $browser)
    {
        return $this->callDrivers(__METHOD__, func_get_args());
    }

    public function visitPage($session, $time, $page)
    {
        return $this->callDrivers(__METHOD__, func_get_args());
    }

    public function changeFilter($session, $time, $filter)
    {
        return $this->callDrivers(__METHOD__, func_get_args());
    }

    public function clickProduct($session, $time, $product)
    {
        return $this->callDrivers(__METHOD__, func_get_args());
    }

    public function buyProduct($session, $time, $product)
    {
        return $this->callDrivers(__METHOD__, func_get_args());
    }

    /**
     * @param $method
     * @param array $args
     * @return $this
     */
    protected function callDrivers($method, Array $args)
    {
        foreach($this->getDrivers() as $driver) {
            $driver->buyProduct(func_get_args());
        }

        return $this;
    }

}