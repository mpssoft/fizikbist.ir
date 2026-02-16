<?php

namespace App\Http\Controllers;
use Artesaos\SEOTools\Traits\SEOTools as SEOToolsTrait;
use Illuminate\Foundation\Auth\Access\Authorizable;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Routing\Controller as BaseController;

abstract class Controller extends BaseController
{
    use SEOToolsTrait,AuthorizesRequests,Authorizable;
}
