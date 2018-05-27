<?php

namespace App\Providers;

use App\Image;
use Illuminate\Support\ServiceProvider;
use App\Category;
use App\Brand;
use App\Color;
use App\Product;
use App\Size;
use Illuminate\Support\Facades\View;
use Cart;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
	    $categorys = Category::orderBy('id','desc')->get();
	    foreach ($categorys as $category){
	    	$product = Product::where('category_id',$category->id)->orderBy('created_at','DESC')->first();
	    	$category->thumbnail = $product->thumbnail;
	    }
	    View::share(compact('categorys'));

	    $brands = Brand::orderBy('id','desc')->get();
	    View::share(compact('brands'));

	    $colors = Color::orderBy('id','desc')->get();
	    View::share(compact('colors'));

	    $products = Product::orderBy('id','desc')->get();
	    View::share(compact('products'));

	    $sizes = Size::orderBy('id','desc')->get();
	    View::share(compact('sizes'));

	    $images = Image::orderBy('created_at','DESC')->get();
	    View::share(compact('images'));
	    $cart_number = Cart::content()->count();
	    $total = Cart::total('0');
	    View::share(compact('cart_number'));
	    View::share(compact('total'));
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
