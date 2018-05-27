<div class="product-images-carousel" id="color_images">
<ul id="smallGallery">
@foreach($images as $image)
    <li><a><img src="{{asset('')}}{{$image->path}}" alt="" style="max-height: 50px"/></a></li>
@endforeach
</ul>
</div>