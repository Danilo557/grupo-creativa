<?php

namespace App\Providers;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Color;
use App\Models\Ideal;
use App\Models\Product;
use App\Models\Store;
use App\Models\Unit;
use App\Models\User;
use App\Observers\BrandObserver;
use App\Observers\CategoryObserver;
use App\Observers\ColorObserver;
use App\Observers\IdealObserver;
use App\Observers\ProductObserver;
use App\Observers\StoreObserver;
use App\Observers\UnitObserver;
use App\Observers\UserObserver;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Validator;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
        Brand::observe(BrandObserver::class);
        Unit::observe(UnitObserver::class);
        Store::observe(StoreObserver::class);
        Category::observe(CategoryObserver::class);
        Product::observe(ProductObserver::class);
        Color::observe(ColorObserver::class);
        Ideal::observe(IdealObserver::class);
        User::observe(UserObserver::class);

        Validator::extend('valid_color', function ($attribute, $value, $parameters, $validator) {
            $inputs = $validator->getData();
            $code_hex = $inputs['code'];
            $regex = "/^#([A-Fa-f0-9]{6}|[A-Fa-f0-9]{3})$/";
            if(preg_match($regex, $code_hex)){
                return true;
            }
            return false;
        });

        Validator::extend('stores_unique', function ($attribute, $value, $parameters, $validator) {
            $inputs = $validator->getData();
            $store_id = $inputs['store_id'];
            $stores_list = $inputs['stores_list'];
            foreach ($stores_list as $store) {
                if ($store["id"] == $store_id) {
                    return false;
                }
            }

            return true;
        });


        Validator::extend('sizes_unique', function ($attribute, $value, $parameters, $validator) {
            $inputs = $validator->getData();
            $sizes = $inputs['sizes'];
            $high = $inputs['high'];
            $width = $inputs['width'];

            foreach ($sizes as $size) {
                $high_width = $size["high"] . '-' . $size["width"];
                $width_high = $size["width"] . '-' . $size["high"];

                $input_high_width = $high . '-' . $width;
                $input_width_high = $high . '-' . $width;

                if ($high_width === $input_high_width || $width_high === $input_width_high) {
                    return false;
                }
            }

            return true;
        });
    }
}
