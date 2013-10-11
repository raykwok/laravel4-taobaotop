<?php


namespace Raypower\Taobaoapi;
use Illuminate\Support\Facades\Facade;

class TaobaoapiFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'taobaoapi';
    }
}