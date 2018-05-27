<?php

namespace App\Http\Controllers;


use App\Color;
use App\Product;
use App\ProductColor;
use App\ProductDetail;
use App\StoreExport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;

class StockOutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
	    $exports = StoreExport::orderBy('created_at', 'DESC')->paginate(20);
	    $details =[];
	    foreach ($exports as $export){
		    $product_detail = $export->product_detail;
		    $product_color = $product_detail->product_color;
		    $color = $product_color->color;
		    $product = $product_color->product;
		    $arr =[
			    'id'=>$export->id,
			    'product'=>$product,
			    'color'=>$color->color,
			    'size'=>$product_detail->size->size,
			    'quantity'=>$export->quantity,
			    'date'=>$export->date,
			    'created_at'=>$export->created_at->diffForHumans(),
		    ];
		    array_push($details,$arr);
	    }
	    return view('admin.stockout',[
		    'details' => $details,
		    'exports'=>$exports
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
	    $date = date('Y-m-d');
	    $name = $request->name;
	    $color_id = $request->color_id;
	    $size_id = $request->size_id;
	    $qty = $request->qty;
	    $notes = $request->notes;
	    $product = Product::where('name',$name)->first();
	    $product_color = ProductColor::where('product_id',$product->id)->where('color_id',$color_id)->first();
	    $product_detail = ProductDetail::where('product_color_id',$product_color->id)->where('size_id',$size_id)->first();
	    $quantity = $product_detail->quantity;
	    if ($qty > $quantity){
	    	return response()->json([
	    		'error'=>'error',
			    'qty'=>$quantity
		    ]);
	    }
	    else{
	    	$export = StoreExport::create([
	    		'product_detail_id'=>$product_detail->id,
			    'size_id'=>$size_id,
			    'quantity'=>$qty,
			    'note'=>$notes,
			    'date'=>$date
		    ]);
	    	$color = $product_color->color->color;
	    	$size = $product_detail->size->size;
	    	ProductDetail::update_quantity($product_detail->id);
	    	return response()->json([
	    		'name'=>$name,
			    'code'=>$product->product_code,
			    'slug'=>$product->slug,
			    'color'=>$color,
			    'size'=>$size,
			    'date'=>$date,
			    'qty'=>$qty,
			    'created'=>$export->created_at->diffForHumans(),
			    'id'=>$export->id
		    ]);
	    }
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
	    $export = StoreExport::find($id);
	    return response()->json([
	    	'notes'=>$export->note
	    ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
    }


//    show export
	public function show_export($slug)
	{
		//
		$product = Product::where('slug',$slug)->first();
		$product_details = $product->product_details;
		$details =[];
		foreach ($product_details as $product_detail){
			$color = $product_detail->product_color->color->color;
			$size = $product_detail->size->size;
			$imports = $product_detail->store_exports;
			foreach ($imports as $import){
				$detail = [
					'id'=>$import->id,
					'product'=>$product,
					'color'=>$color,
					'size'=>$size,
					'quantity'=>$import->quantity,
					'date'=>$import->date,
					'created_at'=>$import->created_at->diffForHumans(),
				];
				array_push($details,$detail);
			}
		}
		$pageStart = \Request::get('page', 1);
		$perPage = 10;
		$offSet = ($pageStart * $perPage) - $perPage;
		$itemsForCurrentPage = array_slice($details, $offSet, $perPage, true);
		$paginate = new LengthAwarePaginator($itemsForCurrentPage, count($details), $perPage,Paginator::resolveCurrentPage(), array('path' => Paginator::resolveCurrentPath()));
		$view = View::make('admin.render_list_import')->with('details', $paginate);
		$html = $view->render();
		return response()->json([
			'html' => $html
		]);
	}

//	get color
	public function get_color($slug){
    	$product = Product::where('slug',$slug)->first();
	    $colors = $product->colors()->whereHas('product_colors',function ($query){
	    	$query->has('sizes');
	    })->get();
	    $id = $product->id;
		$html = View::make('admin.export.color',[
			'colors'=>$colors,
			'id'=>$product->id
		])->render();
		return response()->json([
			'html' => $html
		]);
	}

//	get size
	public function get_size(Request $request){
    	$product_color = ProductColor::where('product_id',$request->product_id)->where('color_id',$request->color_id)->first();
    	$details = $product_color->product_details()->where('quantity','>',0)->get();
		$html = View::make('admin.export.size',[
			'details'=>$details
		])->render();
		return response()->json([
			'html' => $html
		]);
	}

//	get max quantity
	public function get_max($id){
		$max = ProductDetail::find($id)->quantity;
    	return $max;
	}
}
