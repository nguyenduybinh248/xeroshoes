<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;

class ListController extends Controller
{
    //
	public function get_details($products){
		foreach ($products as $product){
			$product->getStar();
			$product->getImages(3);
			if ($product->is_sale == 1){
				$product->new_price ='$'. number_format($product->sale_price,'0',',','.');
				$product->old_price ='$'. number_format($product->price,'0',',','.');
			}
			else{
				$product->old_price = '';
				$product->new_price = '$'.number_format($product->price,'0',',','.');
			}
		}
	}

//	category list
	public function category($slug){
		$category = Category::where('slug',$slug)->first();
		$products = $category->products()->paginate(9);
		$this->get_details($products);
		$html = View::make('shop.render_list_product')->with('products',$products)->render();
		if ($category){
			return view('shop.list',compact('products','html'));
		}
		else{
			return view('shop.shop404');
		}
	}

	public function type($slug){
		if ($slug == 'men' or $slug == 'women' or $slug == 'unisex' or $slug == 'kid'){
			if ($slug == 'men'){
				$products = Product::where('type',1)->paginate(9);
			}
			elseif ($slug == 'women'){
				$products = Product::where('type',0)->paginate(9);
			}
			elseif ($slug == 'unisex'){
				$products = Product::where('type',2)->paginate(9);
			}
			else {
				$products = Product::where('type',3)->paginate(9);
			}
			$this->get_details($products);
			return view('shop.list',compact('products'));
		}
		else{
			return view('shop.shop404');
		}
	}

	public function list_show(Request $request){
		$category = $request->category;
		$size = $request->size;
		$color = $request->color;
		$type = $request->type;
		$brand = $request->brand;
		$min_price = $request->min_price;
		$max_price = $request->max_price;
//		$product_ids = Product::where('status',1)->whereHas('product_details',function ($query){
//			$query->where('quantity','>',0);
//		})->get()->pluck('id');
//		if ($category){
//			$product_ids = Product::whereIn('id',$product_ids)->whereHas('category',function ($query)use($category){
//				$query->where('id',$category);
//			})->get()->pluck('id');
//		}
//		if ($size){
//			$product_ids = Product::whereIn('id',$product_ids)->whereHas('product_details',function ($query)use($size){
//				$query->where('size_id',$size)->where('quantity','>',0);
//			})->get()->pluck('id');
//		}
//		if ($color){
//			$product_ids = Product::whereIn('id',$product_ids)->whereHas('product_colors',function ($query)use($color){
//				$query->where('id',$color);
//			})->get()->pluck('id');
//		}
//		if ($type){
//			if ($type == 4){
//				$product_ids = Product::whereIn('id',$product_ids)->where('type',0)->get()->pluck('id');
//			}
//			else{
//				$product_ids = Product::whereIn('id',$product_ids)->where('type',$type)->get()->pluck('id');
//			}
//		}
//		if ($brand){
//			$product_ids = Product::whereIn('id',$product_ids)->whereHas('brand',function ($query)use($brand){
//				$query->where('id',$brand);
//			})->get()->pluck('id');
//		}

//		if ($min_price){
//			$product_ids = Product::whereIn('id',$product_ids)->where(function ($query) use ($min_price){
//				$query->where('is_sale',1)->where('sale_price','>=',$min_price);
//				$query->orWhere(function ($q) use ($min_price){
//					$q->where('is_sale',0)->where('price','>=',$min_price);
//				});
//			})
//				->get()->pluck('id');
//		}
//
//		if ($max_price){
//			$product_ids = Product::whereIn('id',$product_ids)->where(function ($query) use ($max_price){
//				$query->where('is_sale',1)->where('sale_price','<=',$max_price);
//				$query->orWhere(function ($q) use ($max_price){
//					$q->where('is_sale',0)->where('price','<=',$max_price);
//				});
//				})
//				->get()->pluck('id');
//		}

		$products = Product::with('product_colors','product_details')
			->join('product_colors','products.id','=','product_colors.product_id')
			->join('product_details','product_colors.id','=','product_details.product_color_id')
			->where(function ($query) use ($brand, $color,$category,$type,$max_price,$min_price,$size){
			$condition1 = [
				['is_sale','=',1],
			];
			$condition2=[
				['is_sale','=',0],
			];
			if ($min_price){
				array_push($condition1,['sale_price','>=',$min_price]);
				array_push($condition2,['price','>=',$min_price]);
			}
			if ($max_price){
				array_push($condition1,['sale_price','<=',$max_price]);
				array_push($condition2,['price','<=',$max_price]);
			}
			if ($brand){
				array_push($condition1,['brand_id','=',$brand]);
				array_push($condition2,['brand_id','=',$brand]);
			}
			if ($category){
				array_push($condition1,['category_id','=',$category]);
				array_push($condition2,['category_id','=',$category]);
			}
			if ($type){
				if ($type == 4){
					array_push($condition1,['type','=',0]);
					array_push($condition2,['type','=',0]);
				}
				else{
					array_push($condition1,['type','=',$type]);
					array_push($condition2,['type','=',$type]);
				}
			}
			if ($color){
				array_push($condition1,['product_colors.color_id','=',$color]);
				array_push($condition2,['product_colors.color_id','=',$color]);
			}
			if ($size){
				array_push($condition1,['product_details.size_id','=',$size]);
				array_push($condition2,['product_details.size_id','=',$size]);
			}
				$query->where($condition1);
				$query->orWhere($condition2);
//			$query->where(function ($q) use ($color){
//				if ($color){
//					$q->whereHas('product_colors',function ($q1) use ($color){
//						$q1->where('color_id',$color);
//					});
//				}
//			});
//			$query->where(function ($q) use ($size){
//				if ($size){
//					$q->whereHas('product_details',function ($q1) use ($size){
//						$q1->where('size_id',$size);
//					});
//				}
//			});
//			$query->where(function ($q) use ($condition1,$condition2){
//				$q->where($condition1);
//				$q->orWhere($condition2);
//			});

		})
			->select('products.*')
			->groupBy('products.id')->paginate(9);
//		$products = Product::whereIn('id',$product_ids)->paginate(9);
		$this->get_details($products);
		$html = View::make('shop.render_list_product')->with('products',$products)->render();
		return response()->json([
			'html'=>$html
		]);
	}


//
	public function search(Request $request){
			$search = $request->search;
			$products = Product::where('name', 'like', '%'.$search.'%')
				->orWhereHas('category',function ($q) use($search){
					$q->where('name', 'like', '%'.$search.'%');
				})
				->orWhereHas('brand',function ($q) use ($search){
					$q->where('name', 'like', '%'.$search.'%');
				})->take(4)->get();
			$html = View::make('shop.search_result')->with('products',$products)->render();
			return response()->json(['html'=>$html]);
	}

	public function index_search($search){
		$products = Product::where('name', 'like', '%'.$search.'%')
			->orWhereHas('category',function ($q) use($search){
				$q->where('name', 'like', '%'.$search.'%');
			})
			->orWhereHas('brand',function ($q) use ($search){
				$q->where('name', 'like', '%'.$search.'%');
			})->paginate(9);
		$this->get_details($products);
		return view('shop.list',compact('products'));
	}


}
