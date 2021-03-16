<?php /** @noinspection PhpMissingFieldTypeInspection */

namespace Acme;

use Illuminate\Foundation\Application as IlluminateApplication;

class Application extends IlluminateApplication
{
    protected $basePath = __DIR__;
    protected $appPath = __DIR__;
}
