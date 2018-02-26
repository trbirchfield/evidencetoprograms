<?php namespace App\Wlion\Facades;

use Illuminate\Support\Facades\Facade;

class Growl extends Facade {
    /**
    * Get the registered name of the component.
    *
    * @return string
    */
    protected static function getFacadeAccessor() {
        return 'growl';
    }
}
