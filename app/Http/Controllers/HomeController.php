<?php

namespace App\Http\Controllers;

use App\Mail\Cancel;
use App\Mail\Confirmed;
use App\Mail\TestMail;
use App\Order;
use App\User;
use App\WatchedProduct;
use Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Product;
use App\Brand;
use App\ProductColor;
use App\Image;
use App\ProductColorImage;
use App\ProductImage;
use App\ProductDetail;
use App\Size;
use App\Color;
use App\Category;
use App\StoreImport;
use App\SaleEvent;
use App\Rate;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }

    public function indextest(){
//$p = ProductDetail::where('size_id',44)->get();
//dd($p);
    	$products =  Product::with('product_details')->join('product_colors','products.id','=','product_colors.product_id')
		    ->join('product_details','product_colors.id','=','product_details.product_color_id')
		    ->where('product_details.size_id','=',44)->select('products.*')->groupBy('products.id')->paginate(9);
    	dd($products);

//    	$size= 1;
//    	$product = Product::whereHas('product_details',function ($query)use($size){
//    		$query->where('size_id',$size);
//	    })->get()->pluck('id');
//    	dd($product);

//	    $colors = $product->colors()->whereHas('product_colors',function ($query) use($product){
//		    $query->where('product_id',$product->id)->whereHas('product_details', function ($q){
//			    $q->where('quantity','>',0);
//		    });
//	    })->get()->chunk(3);


//    	$order = Order::first();
//    	Mail::to($order->email)->send(new Cancel($order));

//	    $user = User::find(1);
//	    $product_id = 32;
//	    $orders = $user->orders()->whereHas('product_details.product_color.product',function ($query){
//	    	$query->where('product_id',32);
//	    })->get()->count();
//	    dd($orders);



//	    $watch_products = WatchedProduct::get();
//	    $count = $watch_products->count() -1;
//	    $n = 0;
//	    $arr = [];
//	    foreach ($watch_products as $product){
//	    	$product->detail = [$product->product_id,$product->user_id];
//		    $arr[$n] = $product;
//		    $n +=1;
//	    }
//	    for ($a = 0;$a < $count; $a++){
//	    	$product = $arr[$a];
//	    	$b = $a +1;
//	    	    for ($b; $b <$count;$b++){
//	    	    	$product2 = $arr[$b];
//	    	    	if ($product->detail == $product2->detail){
//	    	    		$product->delete();
//	    	    		break;
//			        }
//		        }
//	    }


	    $min = 300000;
	    $max = 500000;
	    $ids = Product::where('status',1)->get()->pluck('id');

	    if ($min or $max){

	    }

    	return view('admin.test',[

	    ]);
    }

    public function upload(Request $request){
//    	$images =$request->image;
//		foreach ($images as $image){
//			$path = 'storage/images/'.$image;
//			$Image = Image::where('path',$path)->first();
//			if ($Image){
//
//			}
//			else{
//				$Image = Image::create(['path'=>$path]);
//			}
//		}
    }
}
