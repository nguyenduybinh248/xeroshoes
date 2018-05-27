<?php

use Faker\Generator as Faker;
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
use App\User;
use App\News;
use App\Rate;
use App\Reply;
use App\InterstedProduct;
use App\WatchedProduct;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

//$factory->define(App\User::class, function (Faker $faker) {
//    return [
//        'name' => $faker->name,
//        'email' => $faker->unique()->safeEmail,
//        'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
//        'remember_token' => str_random(10),
//    ];
//});
$factory->define(User::class, function (Faker $faker) {
	return [
		'name' => $faker->name,
		'slug' => function (array $user) {
			return str_slug($user['name']);
		},
		'email' => $faker->unique()->safeEmail,
		'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
		'remember_token' => str_random(10),
	];
});
$factory->define(News::class, function (Faker $faker) {
	return [
		'title' => $faker->unique()->sentence($nbWords = 6, $variableNbWords = true),
		'description' => $faker->paragraph(5),
		'content' => implode('\n', $faker->paragraphs($nb = 6, $asText = false)),
		'thumbnail' => function () {
			$image = Image::inRandomOrder()->first();
			return $image->path;
		},
		'slug' => function (array $news) {
			return str_slug($news['title']);
		},
		'created_at' => $faker->datetimeBetween('-5 months'),
		'updated_at' => $faker->datetimeBetween('-5 months'),
	];
});

$factory->define(Color::class, function (Faker $faker) {
	return [
		'color' => $faker->unique()->colorName,
		'slug' => function (array $color) {
			return str_slug($color['color']);
		},
		'created_at' => $faker->datetimeBetween('-5 months'),
		'updated_at' => $faker->datetimeBetween('-5 months'),
	];
});
$factory->define(Brand::class, function (Faker $faker) {
	return [
		'name' => $faker->unique()->company,
		'slug' => function (array $brand) {
			return str_slug($brand['name']);
		},
		'created_at' => $faker->datetimeBetween('-5 months'),
		'updated_at' => $faker->datetimeBetween('-5 months'),
	];
});
$factory->define(Image::class, function (Faker $faker) {
	return [
		'path' => $faker->image($dir = 'public/images', $width=250, $height=173, 'shoes'),
		'created_at' => $faker->datetimeBetween('-5 months'),
		'updated_at' => $faker->datetimeBetween('-5 months'),
	];
});
$factory->define(Product::class, function (Faker $faker) {
	return [
		'name' => $faker->unique()->name,
		'slug' => function (array $product) {
			return str_slug($product['name']);
		},
		'original_price'=>$faker->numberBetween($min=100000,$max=1000000),
		'thumbnail' => function () {
			$image = Image::inRandomOrder()->first();
			return $image->path;
		},
		'category_id' => function () {
			$category = Category::inRandomOrder()->first();
			return $category->id;
		},
		'brand_id' => function () {
			$brand = Brand::inRandomOrder()->first();
			return $brand->id;
		},
		'type'=>function(){
			return rand(1,4);
		},
		'description' => implode('\n', $faker->paragraphs($nb = 6, $asText = false)),
		'created_at' => $faker->datetimeBetween('-5 months'),
		'updated_at' => $faker->datetimeBetween('-5 months'),
	];
});
$factory->define(ProductColor::class, function (Faker $faker) {
	return [
		'product_id' => function () {
			$product = Product::inRandomOrder()->first();
			return $product->id;
		},
		'color_id' => function () {
			$color = Color::inRandomOrder()->first();
			return $color->id;
		},
		'created_at' => $faker->datetimeBetween('-5 months'),
		'updated_at' => $faker->datetimeBetween('-5 months'),
	];
});

$factory->define(ProductDetail::class, function (Faker $faker) {
	return [
		'product_color_id' => function () {
			$product = ProductColor::inRandomOrder()->first();
			return $product->id;
		},
		'size_id' => function () {
			$size = Size::inRandomOrder()->first();
			return $size->id;
		},
		'quantity'=>$faker->numberBetween($min=2,$max=50),
		'created_at' => $faker->datetimeBetween('-5 months'),
		'updated_at' => $faker->datetimeBetween('-5 months'),
	];
});
$factory->define(ProductImage::class, function (Faker $faker) {
	return [
		'product_id' => function () {
			$product = Product::inRandomOrder()->first();
			return $product->id;
		},
		'image_id' => function () {
			$image = Image::inRandomOrder()->first();
			return $image->id;
		},
		'created_at' => $faker->datetimeBetween('-5 months'),
		'updated_at' => $faker->datetimeBetween('-5 months'),
	];
});
$factory->define(ProductColorImage::class, function (Faker $faker) {
	return [
		'product_color_id' => function () {
			$product = ProductColor::inRandomOrder()->first();
			return $product->id;
		},
		'image_id' => function () {
			$image = Image::inRandomOrder()->first();
			return $image->id;
		},
		'created_at' => $faker->datetimeBetween('-5 months'),
		'updated_at' => $faker->datetimeBetween('-5 months'),
	];
});
$factory->define(StoreImport::class, function (Faker $faker) {
	return [
		'product_detail_id' => function () {
			$product = ProductDetail::inRandomOrder()->first();
			return $product->id;
		},
		'quantity'=>$faker->numberBetween($min=2,$max=50),
		'date'=>$faker->date($format = 'Y-m-d', $max = 'now'),
		'note' => implode('\n', $faker->paragraphs($nb = 6, $asText = false)),
		'created_at' => $faker->datetimeBetween('-5 months'),
		'updated_at' => $faker->datetimeBetween('-5 months'),
	];
});
$factory->define(Rate::class, function (Faker $faker) {
	return [
		'product_id' => function () {
			$product = Product::inRandomOrder()->first();
			return $product->id;
		},
		'user_id' => function () {
			$user = User::inRandomOrder()->first();
			return $user->id;
		},
		'star'=>function(){
			return rand(1,5);
		},
		'content' => implode('\n', $faker->paragraphs($nb = 3, $asText = false)),
		'created_at' => $faker->datetimeBetween('-5 months'),
		'updated_at' => $faker->datetimeBetween('-5 months'),
	];
});
$factory->define(Reply::class, function (Faker $faker) {
	return [
		'rate_id' => function () {
			$rate = Rate::inRandomOrder()->first();
			return $rate->id;
		},
		'user_id' => function () {
			$user = User::inRandomOrder()->first();
			return $user->id;
		},
		'reply' => implode('\n', $faker->paragraphs($nb = 3, $asText = false)),
		'created_at' => $faker->datetimeBetween('-5 months'),
		'updated_at' => $faker->datetimeBetween('-5 months'),
	];
});
$factory->define(InterstedProduct::class, function (Faker $faker) {
	return [
		'product_id' => function () {
			$product = Product::inRandomOrder()->first();
			return $product->id;
		},
		'user_id' => function () {
			$user = User::inRandomOrder()->first();
			return $user->id;
		},
		'created_at' => $faker->datetimeBetween('-5 months'),
		'updated_at' => $faker->datetimeBetween('-5 months'),
	];
});
$factory->define(WatchedProduct::class, function (Faker $faker) {
	return [
		'product_id' => function () {
			$product = Product::inRandomOrder()->first();
			return $product->id;
		},
		'user_id' => function () {
			$user = User::inRandomOrder()->first();
			return $user->id;
		},
		'created_at' => $faker->datetimeBetween('-5 months'),
		'updated_at' => $faker->datetimeBetween('-5 months'),
	];
});