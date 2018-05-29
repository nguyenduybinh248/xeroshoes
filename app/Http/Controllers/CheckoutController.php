<?php

namespace App\Http\Controllers;

use App\Color;
use App\Http\Requests\CheckOutRequest;
use App\OrderDetail;
use App\ProductColor;
use App\ProductDetail;
use App\Size;
use Illuminate\Http\Request;
use App\Product;
use App\Order;
use Cart;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{
    //

	public function index(){
		$cart = Cart::content();
		foreach ($cart as $row){
			$product = Product::where('id',$row->id)->first();
			$row->slug = $product->slug;
		}
		return view('shop.checkout',[
			'cart'=> $cart
		]);
	}

	public function info(Request $request){
		$email = $request->email;
		$order = Order::where('email',$email)->orderBy('created_at','DESC')->first();
		return $order;
	}

	public function store(CheckOutRequest $request){
		if (Cart::content()->count() == 0){
			return response()->json([
				'empty'=>['cart empty']
			]);
		}
		else{
			if (isset(Auth::user()->id)){
				$user_id = Auth::user()->id;
				$order = Order::create([
					'name'=>$request->name,
					'address'=>$request->address,
					'phone'=>$request->phone,
					'email'=>$request->email,
					'status'=> 0 ,
					'user_id'=>$user_id,
					'total'=>(int)str_replace('.', '', Cart::total())
				]);
			}
			else{
				$order = Order::create([
					'name'=>$request->name,
					'address'=>$request->address,
					'phone'=>$request->phone,
					'email'=>$request->email,
					'status'=> 0 ,
					'total'=>(int)str_replace('.', '', Cart::total())
				]);
			}
			$order_id = $order->id;
			$order_str = str_pad($order_id, 5, '0', STR_PAD_LEFT);
			$random = rand(100,999);
			$day = date('d');
			$month = date('m');
			$year = date('y');
			$order_code = '#' . $day . $random . $month . $order_str . $year;
			$order->update([
				'order_code'=>$order_code
			]);
			$cart = Cart::content();
			$arr_error = [];
			foreach ($cart as $row){
				$product_id = $row->id;
				$color_id = Color::where('color',$row->options->color)->first()->id;
				$size_id = Size::where('size',$row->options->size)->first()->id;
				$product_color_id = ProductColor::where('product_id',$product_id)->where('color_id',$color_id)->first()->id;
				$product_detail = ProductDetail::where('product_color_id',$product_color_id)->where('size_id',$size_id)->first();
				$product_detail_id = $product_detail->id;
				$quantity = $product_detail->quantity;
				$qty = $row->qty;
				if ($qty < $quantity){
				}
				else{
					$product_name = Product::find($product_id)->name;
					$color = $row->options->color;
					$size = $row->options->size;
					$mess = 'Product : ' . $product_name . ' color : ' .$color. ' ,size : '. $size . ' just has ' . $quantity . ' products ';
					array_push($arr_error,$mess);
				}
			}
			if (empty($arr_error)){
				foreach ($cart as $row){
					$product_id = $row->id;
					$color_id = Color::where('color',$row->options->color)->first()->id;
					$size_id = Size::where('size',$row->options->size)->first()->id;
					$product_color_id = ProductColor::where('product_id',$product_id)->where('color_id',$color_id)->first()->id;
					$product_detail = ProductDetail::where('product_color_id',$product_color_id)->where('size_id',$size_id)->first();
					$product = $product_detail->product_color->product;
					if ($product->is_sale){
						$priced = $product->sale_price;
					}
					else{
						$priced = $product->price;
					}
					$product_detail_id = $product_detail->id;
					$qty = $row->id;
					OrderDetail::create([
						'product_detail_id'=>$product_detail_id,
						'order_id'=>$order_id,
						'quantity'=>$qty,
						'price'=>$priced
					]);
				}
				Cart::destroy();
				return $cart;
			}
			else{
				return response()->json([
					'error'=>$arr_error
				]);
			}
		}
	}
}
