<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\View;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
	    $products = Product::orderBy('created_at','DESC')->paginate(10);
	    foreach ($products as $product){
		    $quantity = 0;
		    $product_details = $product->product_details;
		    foreach ($product_details as $product_detail){
			    $qty = $product_detail->quantity;
			    $quantity += $qty;
		    }
		    $price = number_format($product->price);
		    $original_price = number_format($product->original_price);
		    $product->price = $price;
		    $product->original_price = $original_price;
		    $product->quantity = $quantity;
		    $product->created = $product->created_at->diffForHumans();
		    $product->updated = $product->updated_at->diffForHumans();
	    }
	    return view('admin.product', ['products'=>$products]);
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


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        //
	    $product = Product::where('slug', $slug)->first();
	    $price = number_format($product->price);
	    $original_price = number_format($product->original_price);
	    $product->priced = $price;
	    $product->original_priced = $original_price;
	    $product->brandname = $product->brand->name;
	    $product->created = $product->created_at->diffForHumans();
	    $product->updated = $product->updated_at->diffForHumans();
	    return $product;
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
    public function update(Request $request, $slug)
    {
        //
	    $product = Product::where('slug',$slug)->first();
	    $brand = Brand::where('name',$request->brand)->first();
	    if ($brand){}
	    else{
	    	$brand = Brand::create(['name'=>$request->brand]);
	    }
	    $arr = [
	    	'name'=>$request->name,
		    'brand_id' => $brand->id,
		    'category_id' => $request->category_id,
		    'type' => $request->type,
		    'price' => $request->price,
		    'sale_price' => $request->sale_price,
		    'thumbnail' => $request->thumbnail,
		    'description' => $request->description,
	    ];
	    $product->update($arr);
	    $quantity = 0;
	    $product_details = $product->product_details;
	    foreach ($product_details as $product_detail){
		    $qty = $product_detail->quantity;
		    $quantity += $qty;
	    }
	    $price = number_format($product->price);
	    $sale_price = number_format($product->sale_price);
	    $original_price = number_format($product->original_price);
	    $product->price = $price;
	    $product->sale_price = $sale_price;
	    $product->original_price = $original_price;
	    $product->quantity = $quantity;
	    $product->brand_name = $product->brand->name;
	    $product->category_name = $product->category->name;
	    $product->created = $product->created_at->diffForHumans();
	    $product->updated = $product->updated_at->diffForHumans();
	    return $product;

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
	    Product::where('id',$id)->delete();
    }

	public function postimg(Request $request){
		$files = $request->file('gallery');
		$thumbnail = $request->file('thumbnail');
		if($request->hasFile('gallery'))
		{
			foreach ($files as $file) {
				$file_name = $file->getClientOriginalName();
				$file->storeAs('public/images', $file_name);
			}
		}
		if($request->hasFile('thumbnail'))
		{
			$thumbnail_name = $thumbnail->getClientOriginalName();
			$thumbnail->storeAs('public/images', $thumbnail_name);
		}

	}

	public function show_product($slug){
    	$product =Product::where('slug',$slug)->first();
		$sale_price = number_format($product->sale_price);
		$price = number_format($product->price);
		$original_price = number_format($product->original_price);
		$product->price = $price;
		$product->sale_price = $sale_price;
		$product->original_price = $original_price;
		$product->brand_name = $product->brand->name;
		$product->category_name = $product->category->name;
		$colors = $product->colors()->whereHas('product_colors',function ($query) use($product){
			$query->where('product_id',$product->id)->whereHas('product_details', function ($q){
				$q->where('quantity','>',0);
			});
		})->get()->chunk(3);
		$colorss = $product->colors()->whereHas('product_colors',function ($query) use($product){
			$query->where('product_id',$product->id)->whereHas('product_details', function ($q){
				$q->where('quantity','>',0);
			});
		})->get();
    	$arr_gallery = [];
    	$arr_sizes = [];
    	foreach ($colors as $items){
    		foreach ($items as $color){
			    $arr_size =[];
			    $arr_img =[];
			    $product_color = ProductColor::where('product_id',$product->id)->where('color_id',$color->id)->first();
			    $images = $product_color->images;
			    foreach ($images as $image){
			    	$path = $image->path;
			    	array_push($arr_img,$path);
			    	array_push($arr_gallery,$path);
			    }
			    $product_details = ProductDetail::where('product_color_id',$product_color->id)->where('quantity','>',0)->get();
			    foreach ($product_details as $detail){
				    $size = $detail->size->size;
				    $quantity = $detail->quantity;
				    array_push($arr_size,[
				    	'size'=>$size,
					    'quantity'=>$quantity
				    ]);
				    array_push($arr_sizes,$size);
			    }
			    $color->sizes = $arr_size;
			    $color->image = $arr_img;
		    }
	    }
	    $arr_gallery = array_unique($arr_gallery);
		$arr_sizes = array_unique($arr_sizes);
		 sort($arr_sizes);
    	$product->gallery = $arr_gallery;
    	$product->color = $colors;
    	$product->colors = $colorss;
    	$product->size = $arr_sizes;
		$view = View::make('admin.product_detail_render')->with('product', $product);
		$html = $view->render();
		return response()->json([
			'html' => $html
		]);
	}
}
