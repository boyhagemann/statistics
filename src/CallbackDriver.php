<?php

namespace Boyhagemann\Statistics;

use Closure;

class CallbackDriver implements Contract\Driver
{
    /**
     * @var Closure[]
     */
    protected $callbacks;

    /**
     * @param Closure $callback
     * @return $this
     */
    public function onStartSession(Closure $callback)
    {
        return $this->registerCallback(__METHOD__, $callback);
    }

    /**
     * @param Closure $callback
     * @return $this
     */
    public function onVisitPage(Closure $callback)
    {
        return $this->registerCallback(__METHOD__, $callback);
    }

    /**
     * @param Closure $callback
     * @return $this
     */
    public function onChangeFilter(Closure $callback)
    {
        return $this->registerCallback(__METHOD__, $callback);
    }

    /**
     * @param Closure $callback
     * @return $this
     */
    public function onClickProduct(Closure $callback)
    {
        return $this->registerCallback(__METHOD__, $callback);
    }

    /**
     * @param Closure $callback
     * @return $this
     */
    public function onBuyProduct(Closure $callback)
    {
        return $this->registerCallback(__METHOD__, $callback);
    }

    public function startSession($session, $time, $browser)
    {
        return call_user_func_array($this->callbacks[__METHOD__], func_get_args());
    }

    public function visitPage($session, $time, $page)
    {
        return call_user_func_array($this->callbacks[__METHOD__], func_get_args());
    }

    public function changeFilter($session, $time, $filter)
    {
        return call_user_func_array($this->callbacks[__METHOD__], func_get_args());
    }

    public function clickProduct($session, $time, $product)
    {
        return call_user_func_array($this->callbacks[__METHOD__], func_get_args());
    }

    public function buyProduct($session, $time, $product)
    {
        return call_user_func_array($this->callbacks[__METHOD__], func_get_args());
    }

    /**
     * @param $method
     * @param Closure $callback
     * @return $this
     */
    protected function registerCallback($method, Closure $callback)
    {
        $key = lcfirst(substr($method, 2, strlen($method)));

        $this->callbacks[$key] = $callback;

        return $this;
    }
}