<?php

namespace App\Http\Controllers;


use App\Product;
use App\SaleEvent;
use App\SaleProduct;
use Illuminate\Http\Request;

class SaleProductController extends Controller
{
    //

	public function index($id){
//		$events = SaleEvent::with('products')->where('in_time',1)->orderBy('created_at','DESC')->get()->map(function ($event){
//			$event->setRelation('products',$event->products()->orderBy('created_at','DESC')->paginate(10, ['*'], $event->id));
//			return $event;
//		});
//		$n =1;
//		foreach ($events as $event){
//			$event->page = $n;
//			$n +=1;
//		}
		$event = SaleEvent::find($id);
		$products = $event->products()->orderBy('created_at','DESC')->paginate(10);
		foreach ($products as $product){
			$price = number_format($product->price,'0',',','.');
			$sale_price = number_format($product->sale_price,'0',',','.');
			$product->price = $price;
			$product->sale_price = $sale_price;
		}
		return view('admin.sale_product',[
			'event'=>$event,
			'products'=>$products
		]);
	}

	public function in_time(){
		$events = SaleEvent::where('in_time',1)->orderBy('created_at','DESC')->get();
		return view('admin.sale_in_time',[
			'sale_events'=>$events
		]);
	}

	public function get_sale_price($id){
		$price = Product::find($id)->sale_price;
		return $price;
	}


	public function update(Request $request){
		$product = Product::find($request->id);
		$product->update(['sale_price'=>$request->price]);
		$price = number_format($product->sale_price,'0',',','.');
		return $price;
	}

	public function remove(Request $request){
		$product_id = $request->product_id;
		$event_id = $request->event_id;
		$sale_product = SaleProduct::where('sale_id',$event_id)->where('product_id',$product_id)->first();
		$sale_product->delete();
		$product = Product::find($product_id);
		$is_sale = SaleProduct::where('product_id',$product_id)->get()->count();
		if ($is_sale > 0){}
		else{
			$product->update([
				'is_sale'=>0,
				'sale_price'=>0
			]);
		}
	}
}
