<?php

namespace App\Http\Controllers;
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
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;
class StockInController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
	    $imports = StoreImport::orderBy('created_at', 'DESC')->paginate(20);
	    $details =[];
	    foreach ($imports as $import){
	    	$product_detail = $import->product_detail;
	    	$product_color = $product_detail->product_color;
	    	$color = $product_color->color;
	    	$product = $product_color->product;
	    	$arr =[
	    		'id'=>$import->id,
	    		'product'=>$product,
			    'color'=>$color->color,
			    'size'=>$product_detail->size->size,
			    'quantity'=>$import->quantity,
			    'date'=>$import->date,
			    'note'=>$import->note,
			    'created_at'=>$import->created_at->diffForHumans(),
		    ];
		    array_push($details,$arr);
	    }
	    return view('admin.stockin',[
		    'details' => $details,
		    'imports'=>$imports
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
	    $date = date("Y-m-d");
	    $name = $request->name;
	    $slug = str_slug($name);
	    $category_id = $request->category_id;
	    $brand_name = $request->brand;
	    $brand = Brand::where('name', $brand_name)->first();
	    if ($brand){
		    $brand_id = $brand->id;
	    }
	    else{
		    $brand = Brand::create(['name'=>$brand_name]);
		    $brand_id = $brand->id;
	    }
	    $type = $request->type;
	    $original_price = $request->original_price;
	    $thumbnail = $request->thumbnail;
	    $path = 'storage/images/'.$thumbnail;
	    $description = $request->description;
	    $notes = $request->notes;
	    $year = date('Y');
	    $random = rand(100, 999);
	    $arr = [
		    'name'=>$name,
		    'slug'=>$slug,
		    'category_id'=>$category_id,
		    'brand_id'=>$brand_id,
		    'type'=>$type,
		    'thumbnail'=>$path,
		    'description'=>$description,
		    'original_price'=>$original_price,
	    ];
	    $product = Product::where('name', $name)->first();
	    if ($product){
		    $product_id = $product->id;
	    }
	    else{
		    $product = Product::create($arr);
		    $product_id = $product->id;
		    if ($product_id < 10){
			    $product_code = '#'. $year . $random . '000' .$product_id;
		    }
		    elseif ($product_id >= 10 && $product_id < 100){
			    $product_code = '#'. $year . $random. '00' .$product_id;
		    }
		    elseif ($product_id >=100 && $product_id < 1000){
			    $product_code = '#'. $year . $random. '0' .$product_id;
		    }
		    else{
			    $product_code = '#'. $year . $random .$product_id;
		    }
		    $product->update(['product_code'=>$product_code]);
	    }

	    $arr_detail = [];
	    $n = 0;
//	    product_detail
	    $product_details = $request->product_details;
	    foreach ($product_details as $product_detail){
		    $color_name = $product_detail['color'];
		    $slug_color = str_slug($color_name);
		    $color = Color::where('color', $color_name)->first();
		    if ($color){}
		    else{
			    $color = Color::create(['color'=>$color_name,'slug'=>$slug_color]);
		    }
		    $color_id = $color->id;
		    $product_color = ProductColor::where('product_id',$product_id)->where('color_id',$color_id)->first();
		    if ($product_color){}
		    else{
			    $product_color = ProductColor::create(['product_id'=>$product_id,'color_id'=>$color_id]);
		    }
		    $product_color_id = $product_color->id;
		    $details = $product_detail['details'];
		    foreach ($details as $detail){
			    $size = $detail['size'];
			    $Size = Size::where('size',$size)->first();
			    if ($Size){}
			    else{
				    $Size = Size::create(['size'=>$size]);
			    }
			    $size_id = $Size->id;
			    $quantity = $detail['quantity'];
			    $Product_detail = ProductDetail::where('product_color_id',$product_color_id)->where('size_id',$size_id)->first();
			    if ($Product_detail){
				    $qty =$Product_detail->quantity + $quantity;
				    $Product_detail->update(['quantity'=>$qty]);
			    }
			    else{
				    $Product_detail = ProductDetail::create([
					    'product_color_id'=>$product_color_id,
					    'size_id'=>$size_id,
					    'quantity'=>$quantity
				    ]);
			    }
			    $product_detail_id = $Product_detail->id;
			    $store_import = StoreImport::create([
				    'product_detail_id'=>$product_detail_id,
				    'quantity'=>$quantity,
				    'note'=>$notes,
				    'date'=>$date,
			    ]);
			    $created = $store_import->created_at->diffForHumans();
			    $import_id= $store_import->id;
			    $arr_detail[$n] = [
				    'color'=>$color_name,
				    'size'=>$size,
				    'quantity'=>$quantity,
				    'date'=>$date,
				    'created_at'=>$created,
				    'id'=>$import_id
			    ];
			    $n +=1;
		    }
		    if (isset($product_detail['images'])){
			    $images = $product_detail['images'];
			    foreach ($images as $image){
				    $path = 'storage/images/'.$image;
				    $Image = Image::where('path',$path)->first();
				    if ($Image){}
				    else{
					    $Image = Image::create(['path'=>$path]);
				    }
				    $image_id = $Image->id;
				    $product_color_image = ProductColorImage::create([
					    'product_color_id'=>$product_color_id,
					    'image_id'=>$image_id,
				    ]);
			    }
		    }
	    }
	    return response()->json([
		    'product'=>$product,
		    'details'=>$arr_detail,
	    ]);
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
	    $import = StoreImport::find($id);
	    $product_detail = $import->product_detail;
	    $color = $product_detail->product_color->color->color;
	    $size = $product_detail->size->size;
	    $quantity = $import->quantity;
	    $name = $product_detail->product_color->product->name;
	    $notes = $import->note;
	    $date = $import->date;
	    return response()->json([
	    	'notes'=>$notes,
	    	'name'=>$name,
	    	'size'=>$size,
	    	'color'=>$color,
	    	'date'=>$date,
	    	'quantity'=>$quantity,
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
	    $color = $request->color;
	    $date = $request->date;
	    $size = $request->size;
	    $quantity = $request->quantity;
	    $notes = $request->notes;
	    $Size = Size::where('size',$size)->first();
	    $Color = Color::where('color',$color)->first();
	    if ($Color){}
	    else{
		    $Color = Color::create(['color'=>$color]);
	    }
	    if ($Size){}
	    else{
		    $Size = Size::create(['size'=>$size]);
	    }
	    $color_id = $Color->id;
	    $size_id = $Size->id;
	    $import = StoreImport::find($id);
	    $product = $import->product_detail->product_color->product;
	    $product_id = $product->id;
	    $product_color = ProductColor::where('product_id',$product_id)->where('color_id',$color_id)->first();
	    if ($product_color){}
	    else{
	    	$product_color = ProductColor::create([
	    		'product_id'=>$product_id,
			    'color_id'=>$color_id,
		    ]);
	    }
	    $product_color_id = $product_color->id;
	    $product_detail = ProductDetail::where('product_color_id',$product_color_id)->where('size_id',$size_id)->first();
	    if ($product_detail){}
	    else{
	    	$product_detail = ProductDetail::create([
	    		'product_color_id'=>$product_color_id,
			    'size_id'=>$size_id,
			    'quantity'=>$quantity,
		    ]);
	    }
	    $product_detail_id = $product_detail->id;
	    $import->update([
	    	'product_detail_id'=>$product_detail_id,
		    'quantity'=>$quantity,
		    'date'=>$date,
		    'notes'=>$notes,
	    ]);
	    ProductDetail::update_quantity($product_detail_id);
	    return response()->json([
	    	'product'=>$product,
		    'color'=>$color,
		    'size'=>$size,
		    'quantity'=>$quantity,
		    'date'=>$date,
		    'id'=>$import->id,
		    'created_at'=>$import->created_at->diffForHumans(),
	    ]);
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
	    StoreImport::find($id)->delete();
    }

	public function show_import($slug)
	{
		//
		$product = Product::where('slug',$slug)->first();
		$product_details = $product->product_details;
		$details =[];
		foreach ($product_details as $product_detail){
			$color = $product_detail->product_color->color->color;
			$size = $product_detail->size->size;
			$imports = $product_detail->store_imports;
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
}
