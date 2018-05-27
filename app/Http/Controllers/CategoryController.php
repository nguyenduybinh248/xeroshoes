<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use Illuminate\Http\Request;
//use App\Http\Requests\CategoryRequest;
use Illuminate\Support\Facades\View;

class CategoryController extends Controller
{
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */

//	public $category;
//	public function __construct()
//	{
//		$this->category = new Category();
//	}

	public function index()
	{
		//
		return view('admin.category');
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
		$category = Category::create($request->only('name'));
		$slug = str_slug($category->name);
		$category->update(['slug'=>$slug]);
		$category->created = $category->created_at->diffForHumans();
		$category->updated = $category->updated_at->diffForHumans();

		return $category;
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function show($slug)
	{
		$category = Category::where('slug',$slug)->first();
		$products = $category->products()->paginate(10);
		foreach ($products as $product){
			$quantity = 0;
			$product_details = $product->product_details;
			foreach ($product_details as $product_detail){
				$qty = $product_detail->quantity;
				$quantity += $qty;
			}
			$price = number_format($product->price);
			$original_price = number_format($product->original_price);
			$product->quantity = $quantity;
			$product->created = $product->created_at->diffForHumans();
			$product->updated = $product->updated_at->diffForHumans();
		}
		return view('admin.product', [
			'products'=>$products,
			'category'=>$category,
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
		return $category = Category::find($id);
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
		$category = Category::find($id);
		$category->update($request->only('name'));
		$category->created = $category->created_at->diffForHumans();
		$category->updated = $category->updated_at->diffForHumans();
		return $category;
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
		$count_post = Product::where('category_id', $id)->count();
		if($count_post == 0){
			$category = Category::find($id)->delete();
//		    $reponse = ['error'=> 0];

		}
		else{
			return response()->json(['error' => true]);
		}
	}

//    public function search(Request $request){
//		$search = $request->search;
//		$categorys = Category::search($search)->get();
//	    $view = View::make('admin.searchcategory')->with('categorys', $categorys);
//	    $html = $view->render();
//	    return response()->json([
//		    'html' => $html
//	    ]);
//    }
}
