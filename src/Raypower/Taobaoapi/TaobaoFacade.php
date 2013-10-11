<?php


namespace Raypower\Taobaoapi;
use Illuminate\Support\Facades\Facade;

class TaobaoapiFacades extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'taobaoapi';
    }
}