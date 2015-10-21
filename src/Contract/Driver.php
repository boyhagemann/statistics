<?php

namespace Boyhagemann\Statistics\Contract;

interface Driver
{
    public function startSession($session, $time, $browser);
    public function visitPage($session, $time, $page);
    public function changeFilter($session, $time, $filter);
    public function clickProduct($session, $time, $product);
    public function buyProduct($session, $time, $product);
}