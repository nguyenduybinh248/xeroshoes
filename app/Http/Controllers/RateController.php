<?php

namespace App\Http\Controllers;

use App\Rate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;

class RateController extends Controller
{
    //show edit
	public function show($id){
		return $rate = Rate::find($id);
	}

//	update edit
	public function update(Request $request){
		$id = $request->id;
		$rate = Rate::find($id);
		if (isset(Auth::user()->id) && Auth::user()->id == $rate->user_id){
			$star = $request->star;
			$contents = $request->contents;
			$rate->update([
				'content'=>$contents,
				'star'=>$star
			]);
			$star = $rate->star;
			$stars = [];
			for ($i =0; $i < $star; $i++){
				$stars[$i] = $i;
			}
			$rate->stars = $stars;
			$rate->confirm = 1;
			$html = View::make('shop.rate_of_product')->with('rate',$rate)->render();
			return response()->json([
				'html'=>$html
			]);
		}
		else{
			return view('shop.shop404');
		}
	}

//	hide
	public function hide($id){
		$rate = Rate::find($id);
		$rate->update(['status'=>0]);
		return $rate;
	}

//	create
	public function create(Request $request){
		$id = $request->id;
		$star = $request->star;
		$contents = $request->contents;
		$user_id = Auth::user()->id;
		$rate_ex = Rate::where('product_id',$id)->where('user_id',$user_id)->first();
		if ($rate_ex){
			return response()->json([
				'error'=>'error'
			]);
		}
		else{
			$rate = Rate::create([
				'product_id'=>$id,
				'user_id'=>$user_id,
				'content'=>$contents,
				'star'=>$star,
				'status'=>1
			]);
			$star = $rate->star;
			$stars = [];
			for ($i =0; $i < $star; $i++){
				$stars[$i] = $i;
			}
			$rate->stars = $stars;
			$rate->confirm = 1;
			$html = View::make('shop.rate_of_product')->with('rate',$rate)->render();
			return response()->json([
				'html'=>$html
			]);
		}

	}
}
