<?php


namespace infrastructure\Facades;

use domain\Services\StudentService;
use Illuminate\Support\Facades\Facade;
use Infrastructure\Images;

class ImageFacade extends Facade{
    protected static function getFacadeAccessor()
    {
        return StudentService::class;
    }
}












?>