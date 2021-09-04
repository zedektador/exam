<?php

/**
 * Register the Observers
 */

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

/**
 * Class AppServiceProvider
 * @package App\Providers
 */
class AppServiceProvider extends ServiceProvider {

    /**
     * Boot Method
     */
    public function boot() {
        Validator::extend('uuid', function ($attribute, $value, $parameters, $validator) {
            return \Ramsey\Uuid\Uuid::isValid($value);
        });

        Validator::extend('mobile', function($attribute, $value, $parameters, $validator){

            $format = isset($parameters[0]) ? $parameters[0] : "11-digit";

            switch ($format) {
                case "10-digit": return preg_match('/^9\d{9}$/', $value);
                case '12-digit': return preg_match('/^\+639\d{9}$/', $value);
                default: return preg_match('/^09\d{9}$/', $value);
            }
        });

        Validator::extend('alpha_space_quote', function($attribute, $value)
        {
            return preg_match("/^[\pL\s]+$/u", $value);
        });

        Validator::extend('inused_category', function($attribute, $value)
        {
            $request = app('request');
            $currentCategories = DB::table('categories')->where('merchant_uuid', $userInfo->merchant_uuid )->get();
            $categoryIds = array_pluck($value, 'uuid');

            //Delete Categories / Sub Categories
            if( $currentCategories ){

                $currentCategoryIds = array_column($currentCategories->toArray(), 'uuid');
                $deleteList = array_diff($currentCategoryIds, $categoryIds);

                if( count($deleteList) > 0 ){

                    $cleared = 0;

                    foreach($deleteList as $deleteCategoryId){

                        $categoryInfo = DB::table('categories')->where('uuid', $deleteCategoryId )->first();
                        $productInfo = DB::table('products')->where('category_id', $categoryInfo->id )->first();

                        if( !$productInfo ){
                            $cleared ++;
                        }
                    }

                    if( $cleared != count($deleteList) ){
                        return false;
                    }

                }
            }

            return true;

        });
    }

    public function register() {
    }

}
