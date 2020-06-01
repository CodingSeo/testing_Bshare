<?php

if (! function_exists('is_api_domain')) {
    function is_api_domain()
    {
        return Str::startsWith(request()->getHttpHost(), '/dev');
    }
}
