<?php

namespace App\Http\Controllers;

use App\CancelEmail;
use App\ConfirmEmail;
use App\Order;
use App\OrderDetail;
use App\ProductDetail;
use App\StoreExport;
use App\StoreImport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class OrderController extends Controller
{
    //show to confirm order
	public function index(){
		$orders = Order::where('status',0)->paginate(10);
		return view('admin.order',[
			'orders'=>$orders,
		]);
	}


//	show order details
	public function show($id){
		$order_details = OrderDetail::where('order_id',$id)->get();
		foreach ($order_details as $detail){
			$color = $detail->product_detail->product_color->color->color;
			$name = $detail->product_detail->product_color->product->name;
			$size = $detail->product_detail->size->size;
			$in_store = $detail->product_detail->quantity;
			$detail->color = $color;
			$detail->name = $name;
			$detail->size = $size;
			$detail->in_store = $in_store;
		}
		$html = View::make('admin.render_order_details')->with('details', $order_details)->render();
		return response()->json([
			'html' => $html
		]);
	}


//	cancel order
	public function cancel(Request $request ,$id){
		$reason = $request->reason;
		$order = Order::find($id);
		$status = $order->status;
		$order->update([
			'status'=> 3
		]);
		if ($status == 0){
			CancelEmail::create([
				'order_id'=>$order->id,
				'reason'=>$reason
			]);
			return $order;
		}
		elseif ($status == 1){
			$date = date('Y-m-d');
			$note = 'Order : '. $order->order_code .' was canceled';
			$order_details = $order->order_details;
			foreach ($order_details as $detail){
				$product_detail = $detail->product_detail;
				$product_detail_id = $product_detail->id;
				$store_import = StoreImport::create([
					'product_detail_id'=>$product_detail_id,
					'quantity'=>$detail->quantity,
					'date'=>$date,
					'note'=>$note
				]);
				ProductDetail::update_quantity($product_detail_id);
			}
			return $order;
		}
	}



//cofirm order
	public function confirm(Request $request ,$id){
		$receiver_date = $request->date;
		$order = Order::find($id);
		$note = 'Order : '. $order->order_code .' was delivering ';
		$order->update([
			'status'=> 1,
			'expected_delivery_date'=>$receiver_date
		]);
		ConfirmEmail::create(['order_id'=>$order->id]);
		$date = date('Y-m-d');
		$order_details = $order->order_details;
		foreach ($order_details as $detail){
			$product_detail = $detail->product_detail;
			$product_detail_id = $product_detail->id;
			StoreExport::create([
				'product_detail_id'=>$product_detail_id,
				'quantity'=>$detail->quantity,
				'date'=>$date,
				'note'=>$note
			]);
			ProductDetail::update_quantity($product_detail_id);
		}
		return $order;
	}


//	show orders received
	public function index_receive(){
		$orders = Order::where('status',2)->paginate(10);
		return view('admin.orders.order_received',[
			'orders'=>$orders,
		]);
	}



//	show orders delivering
	public function index_wait(){
		$orders = Order::where('status',1)->paginate(10);
		return view('admin.orders.order_wait',[
			'orders'=>$orders,
		]);
	}



//	show orders canceled
	public function index_cancel(){
		$orders = Order::where('status',3)->paginate(10);
		return view('admin.orders.order_canceled',[
			'orders'=>$orders,
		]);
	}
}
