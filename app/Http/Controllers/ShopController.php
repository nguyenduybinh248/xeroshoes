<?php

namespace App\Http\Controllers;

use App\Category;
use App\News;
use App\Product;
use App\ProductColor;
use App\ProductDetail;
use App\SaleEvent;
use App\WatchedProduct;
use Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;

class ShopController extends Controller
{
    //

	public function index(){
		$sale_event = SaleEvent::where('in_time',1)->orderBy('created_at','DESC')->take(5)->get();
		$num = 1;
		foreach ($sale_event as $event){
			$event->number = $num;
			$num +=1;
		}
		$count = $sale_event->count();
		$a = 5 - $count;
		$product_banner = Product::where('status',1)->orderBy('created_at','DESC')->take($a)->get();
		$categories = Category::with('products')->get()->map(function ($category){
			$category->setRelation('products',$category->products()->orderBy('star','DESC')->take(8)->get());
			return $category;
		});
		foreach ($categories as $category){
				foreach ($category->products as $product){
					$product->getStar();
					$product->price = number_format($product->price,'0','','.');
					$product->sale_price = number_format($product->sale_price,'0','','.');
					$product->getImages(3);
				}
		}
		$news = News::orderBy('created_at','DESC')->take(8)->get();
		foreach ($news as $new){
			$new->created = $new->created_at->diffForHumans();
		}
		$new_products = Product::where('status',1)->orderBy('created_at','DESC')->take(6)->get();
		foreach ($new_products as $product){
			$product->getStar();
		}
		$sale_products = Product::where('status',1)->where('is_sale',1)->take(6)->get();
		foreach ($sale_products as $product){
			$product->getStar();
		}

		return view('shop.index',[
			'events'=>$sale_event,
			'banners'=>$product_banner,
			'categories'=>$categories,
			'news'=>$news,
			'new_products'=>$new_products,
			'sale_products'=>$sale_products,
		]);
	}

	public function view($slug){
		$product = Product::where('slug',$slug)->first();
		$product->getStar();
		if ($product->status == 1){
			$product->status = 'Available';
		}
		else{
			$product->status = 'Unavailable';
		}
		if ($product->is_sale == 1){
			$product->new_price = number_format($product->sale_price,'0','','.');
			$product->old_price = number_format($product->price,'0','','.');
		}
		else{
			$product->new_price = number_format($product->price,'0','','.');
			$product->old_price = '';
		}
		$product->brand_name = $product->brand->name;
		$colors = $product->colors()->whereHas('product_colors',function ($query) use($product){
			$query->where('product_id',$product->id)->whereHas('product_details', function ($q){
				$q->where('quantity','>',0);
			});
		})->get();
		foreach ($colors as $color){
			$product_color_id = ProductColor::where('product_id',$product->id)->where('color_id',$color->id)->first()->id;
			$color->product_color = $product_color_id;
		}
		$html = View::make('shop.list_color_of_product')->with('colors', $colors)->render();
		return response()->json([
			'html'=>$html,
			'product'=>$product
		]);
	}

	public function getSize($id){
		$sizes = ProductDetail::where('product_color_id', $id)->where('quantity','>',0)->get();
		$html = View::make('shop.list_size_of_color')->with('sizes', $sizes)->render();
		return response()->json([
			'html'=>$html,
		]);
	}

	public function quantity($id){
		$qty = ProductDetail::find($id)->quantity;
		return $qty;
	}

	public function index_detail($slug){
		$product = Product::where('slug',$slug)->first();
		if (isset(Auth::user()->id)){
			$user = Auth::user();
			$user_id = $user->id;
		}
		if ($product){
			if (isset(Auth::user()->id)){
			$watched_product = WatchedProduct::where('product_id',$product->id)->where('user_id',$user_id)->first();
			if ($watched_product){}
			else{
				WatchedProduct::create([
					'user_id'=>$user_id,
					'product_id'=>$product->id,
				]);
			}}
			if ($product->status == 1){
				if (isset(Auth::user()->id)){
				$watched_products = $user->watched_products()->where('product_id','!=',$product->id)->take(7)->get();
				foreach ($watched_products as $product){
					if ($product->is_sale == 1){
						$product->new_price ='$'. number_format($product->sale_price,'0',',','.');
						$product->old_price ='$'. number_format($product->price,'0',',','.');
					}
					else{
						$product->old_price = '';
						$product->new_price = '$'.number_format($product->price,'0',',','.');
					}
					$product->getStar();
				}}

				$colors = $product->colors()->whereHas('product_colors',function ($query) use($product){
					$query->where('product_id',$product->id)->whereHas('product_details', function ($q){
						$q->where('quantity','>',0);
					});
				})->get();
				foreach ($colors as $color){
					$product_color = ProductColor::where('product_id',$product->id)->where('color_id',$color->id)->first();
					$color->product_color = $product_color->id;
				}
				$product->color = $colors;
				if ($product->is_sale == 1){
					$product->new_price ='$'. number_format($product->sale_price,'0',',','.');
					$product->old_price ='$'. number_format($product->price,'0',',','.');
				}
				else{
					$product->old_price = '';
					$product->new_price = '$'.number_format($product->price,'0',',','.');
				}
				$product->getStar();
				$product->getImages(8);
//				$rates = $product->rates()->where('status',1)->get(['rates.*']);
				$rates = $product->rates;
				foreach ($rates as $rate){
					$star = $rate->star;
					$stars = [];
					for ($i =0; $i < $star; $i++){
						$stars[$i] = $i;
					}
					$rate->stars = $stars;
					$user = $rate->user;
					$count = $user->orders()->whereHas('product_details.product_color.product',function ($query) use($user){
						$query->where('product_id',$user->id);
					})->get()->count();
					if ($count > 0){
						$rate->confirm = 1;
					}
					else{
						$rate->confirm = 0;
					}
				}
				return view('shop.detail',compact('product','watched_products'));
			}
			else{
				return view('shop.shop404');
			}
		}
		else{
			return view('shop.shop404');
		}
	}
}
