<?php

namespace App\Http\Controllers;

use App\Http\Requests\EditCartRequest;
use App\Http\Requests\OrderRequest;
use App\Product;
use App\ProductColor;
use App\ProductDetail;
use Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class CartController extends Controller
{
    //
	public function cart(Request $request, $slug){
//		$product = Product::where('slug',$slug)->first();
//		if ($request->sale == 1){
//			$price = number_format($product->sale_price);
//		}
//		else{
//			$price = $product->price;
//		}
		$info = [
			'id'=> 1,
			'name'=> 'abc',
			'qty'=>1,
			'price'=> 123,
		];
		Cart::add($info);
		$carts = Cart::content();
		$cart = 0;
		foreach ($carts as $item){
			$cart +=1;
		}
		return $cart;
	}

	public function add_cart(OrderRequest $request){
		$product_color_id = $request->product_color_id;
		$product_color = ProductColor::find($product_color_id);
		$product = $product_color->product;
		$color = $product_color->color->color;
		if ($product->is_sale == 1){
			$product->priced = $product->sale_price;
		}
		else{
			$product->priced = $product->price;
		}
		$size_id = $request->size_id;
		$product_detail = ProductDetail::where('product_color_id',$product_color_id)->where('size_id',$size_id)->first();
		if($product_detail){
			$size = $product_detail->size->size;
			Cart::add([
				'id'=>$product->id,
				'name'=>$product->name,
				'qty'=>$request->qty,
				'price'=>$product->priced,
				'options'=>[
					'size'=>$size,
					'color'=>$color
				]
			]);
			$cart_number = Cart::content()->count();
			$total = Cart::total('0',',','.');
			return response()->json([
				'cart_number'=>$cart_number,
				'total'=>$total,
				'product'=>$product,
				'qty'=>$request->qty,
				'color'=>$color,
				'size'=>$size

			]);
		}
		else{
			return response()->json(['error'=>'error']);
		}
	}

	public function index(){
		$cart = Cart::content();
		foreach ($cart as $row){
			$product = Product::where('id',$row->id)->first();
			$row->thumbnail = $product->thumbnail;
			$row->slug = $product->slug;
//			$row->sub = $row->qty * $row->price;
//			$row->price  = number_format($row->price,'0',',','.');
		}
		return view('shop.cart',[
			'cart'=> $cart
		]);
	}

//	destroy cart

	public function destroy(){
		Cart::destroy();
	}

//	delete 1 row of cart

	public function row_destroy($rowId){
		Cart::remove($rowId);
		$total = Cart::total('0',',','.');
		$sub_total = Cart::subtotal('0',',','.');
		$tax = Cart::tax('0',',','.');
		$cart_count = Cart::content()->count();
		return response()->json([
			'total'=>$total,
			'subtotal'=>$sub_total,
			'tax'=>$tax,
			'count'=>$cart_count
		]);
	}


//	edit and update 1 row of cart
	public function edit_row($rowId){
		$cart = Cart::get($rowId);
		$product = Product::find($cart->id);
		$colors = $product->colors()->whereHas('product_colors',function ($query) use($product){
			$query->where('product_id',$product->id)->whereHas('product_details', function ($q){
				$q->where('quantity','>',0);
			});
		})->get();
		foreach ($colors as $color){
			$color->product_color_id = ProductColor::where('product_id',$product->id)->where('color_id',$color->id)->first()->id;
		}
		$html = View::make('shop.edit_cart_color',[
			'cart'=>$cart,
			'colors'=>$colors,
		])->render();
		return response()->json([
			'html'=>$html,
		]);
	}

	public function edit_size($id){
		$product_details = ProductDetail::with('size')->where('product_color_id',$id)->where('quantity','>',0)->get();
		$html = View::make('shop.edit_cart_size',[
			'details'=>$product_details,
		])->render();
		return response()->json([
			'html'=>$html,
		]);
	}

	public function update_row(EditCartRequest $request, $rowId){
		$product = Product::where('id',Cart::get($rowId)->id)->first();
		$color = $request->color;
		$size = $request->size;
		$qty = $request->qty;
		$row = Cart::update($rowId,[
			'qty'=>$qty,
			'options'=>[
				'size'=>$size,
				'color'=>$color,
			]
		]);
		$row->slug = $product->slug;
		$row->thumbnail = $product->thumbnail;
		$html = View::make('shop.render_tr_cart')->with('row',$row)->render();
		$total = Cart::total('0',',','.');
		$sub_total = Cart::subtotal('0',',','.');
		$tax = Cart::tax('0',',','.');
		return response()->json([
			'total'=>$total,
			'subtotal'=>$sub_total,
			'tax'=>$tax,
			'html'=>$html
		]);
	}

	public function quantity($id){
		$qty = ProductDetail::find($id)->quantity;
		return $qty;
	}
}
