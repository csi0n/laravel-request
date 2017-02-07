<?php
namespace csi0n\Laravel\Request\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * Created by PhpStorm.
 * User: csi0n
 * Date: 07/02/2017
 * Time: 5:14 PM
 */
class CLaravelRequestFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'csi0n.laravel.request';
    }
}
