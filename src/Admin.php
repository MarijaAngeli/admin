<?php

namespace Angeli\Admin;

use Illuminate\Support\Facades\Config;


class Admin
{
    public $app;

    public function __construct($app)
    {
        $this->app = $app;
    }

    public function runTest()
    {
        return Config::get('admin.test');
    }
}