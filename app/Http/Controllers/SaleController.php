<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use App\SaleEvent;
use App\SaleProduct;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class SaleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
	    $sale = SaleEvent::orderBy('created_at','DESC')->get();
	    return view('admin.sale',[
			'sale_events'=>$sale
	    ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
	    $n  = 1;
	    $products = Product::orderBy('category_id')->get()->chunk(10);
	    foreach ($products as $product){
		    $product->page = $n;
		    $n += 1;
	    }
	    $view = View::make('admin.choose_products_sale')->with('products', $products);
	    $html = $view->render();
	    return response()->json([
		    'html' => $html
	    ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
	    $count = SaleEvent::where('slug',str_slug($request->title))->count();
	    if ($count == 0){
	    	$slug = str_slug($request->title);
	    }
	    else{
	    	$count += 1;
	    	$slug = str_slug($request->title) . '-' . $count;
	    }
	    $sale_event = SaleEvent::create([
	    	'title'=>$request->title,
	    	'slug'=>$slug,
	    	'begin_date'=>$request->begin_date,
	    	'end_date'=>$request->end_date,
	    	'content'=>$request->contents,
	    	'banner'=>$request->banner,
	    ]);
	    $sale_id = $sale_event->id;
	    foreach ($request->products as $product){
	    	$product_id = Product::where('slug',$product)->first()->id;
	    	SaleProduct::create(['product_id'=>$product_id,'sale_id'=>$sale_id]);
	    }
	    $sale_event->created = $sale_event->created_at->diffForHumans();
	    $sale_event->updated = $sale_event->updated_at->diffForHumans();
	    return $sale_event;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
	    $sale_event = SaleEvent::where('slug',$id)->first();
	    $products = $sale_event->products()->orderBy('created_at','DESC')->paginate(5);
	    $view = View::make('admin.show_products_on_sale')->with('products', $products);
	    $html = $view->render();
	    return response()->json([
		    'html' => $html
	    ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id1
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
	    $sale_event = SaleEvent::where('slug',$id)->first();
	    $arr = [];
	    $products = $sale_event->products;
	    foreach ($products as $product){
	    	$slug = $product->slug;
	    	array_push($arr,$slug);
	    }
	    $sale_event->arr_products = $arr;
	    return $sale_event;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
	    $sale_event = SaleEvent::where('slug',$id)->first();
//	    dd($sale_event);
	    $slug = str_slug($request->title);
	    if (isset($sale_event->slug)){
		    if ($slug == $sale_event->slug){}
		    else{
			    $count = SaleEvent::where('slug',$slug)->count();
			    if ($count == 0){}
			    else{
				    $count += 1;
				    $slug = $slug . '-' . $count;
			    }
		    }
	    }
	    $sale_event->update([
		    'title'=>$request->title,
		    'slug'=>$slug,
		    'begin_date'=>$request->begin_date,
		    'end_date'=>$request->end_date,
		    'content'=>$request->contents,
		    'banner'=>$request->banner,
	    ]);
	    $sale_id = $sale_event->id;
	    SaleProduct::where('sale_id',$sale_id)->delete();
	    foreach ($request->products as $product){
		    $product_id = Product::where('slug',$product)->first()->id;
		    SaleProduct::create(['product_id'=>$product_id,'sale_id'=>$sale_id]);
	    }
	    $sale_event->created = $sale_event->created_at->diffForHumans();
	    $sale_event->updated = $sale_event->updated_at->diffForHumans();
	    return $sale_event;

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
	    $sale = SaleEvent::where('slug',$id)->delete();
	    return $sale;
    }

	public function edit_products($id)
	{
		//
		$sale_event = SaleEvent::where('slug',$id)->first();
		$sale_id = $sale_event->id;
		$n  = 1;
		$products = Product::orderBy('category_id')->get()->chunk(10);
		foreach ($products as $product10){
			foreach ($product10 as $product){
				$sale_product = SaleProduct::where('sale_id',$sale_id)->where('product_id',$product->id)->first();
				if ($sale_product){
					$product->is_saled = 1;
				}
			}
			$product10->page = $n;
			$n += 1;
		}
		$view = View::make('admin.choose_products_sale')->with('products', $products);
		$html = $view->render();
		return response()->json([
			'html' => $html
		]);
	}
}
