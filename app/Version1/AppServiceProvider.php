<?php

/**
 * Register the Observers
 */

namespace App\Version1;

use App\Version1\Services\Promotion\PromotionInterface;
use App\Version1\Services\Promotion\PromotionService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\ServiceProvider;

/**
 * Class AppServiceProvider
 * @package App\Providers
 */
class AppServiceProvider extends ServiceProvider {

    /**
     * Boot Method
     */
    public function boot() {

        Validator::extend('base64image', function ($attribute, $value, $parameters, $validator) {
            $image = base64_decode($value);
            $f = finfo_open();
            $result = finfo_buffer($f, $image, FILEINFO_MIME_TYPE);
            return str_contains($result, 'image/');
        });

        Validator::extend('json', function ($attribute, $value, $parameters, $validator) {
            return json_decode($value);
        });
    }

    public function register() {
        $this->app->bind(PromotionInterface::class, PromotionService::class);

    }

}
