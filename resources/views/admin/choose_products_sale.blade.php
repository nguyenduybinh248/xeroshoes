<div class="nav-tabs-custom">
    <div class="tab-content">
        @foreach($products as $product10)
            @if($product10->page == 1)
                <div class="tab-pane active" id="page{{$product10->page}}">
                    <div class="table-responsive">
                        <table class="table" >
                            <thead>
                            <tr>
                                <th>Product</th>
                                <th>Thumbnail</th>
                                <th>Name</th>
                                <th>Category</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($product10 as $product)
                                @if(isset($product->is_saled))
                                    @if($product->is_saled == 1)
                                        <tr class="choose_product product_selected" data-slug="{{$product->slug}}" style="margin: 5px">
                                            <td>{{$product->product_code}}</td>
                                            <td>
                                                <img src="{{asset('')}}{{$product->thumbnail}}" style="max-width: 80%; max-height: 100px;">
                                            </td>
                                            <td>{{$product->name}}</td>
                                            <td>{{$product->category->name}}</td>
                                        </tr>
                                        @else
                                        <tr class="choose_product" data-slug="{{$product->slug}}" style="margin: 5px">
                                            <td>{{$product->product_code}}</td>
                                            <td>
                                                <img src="{{asset('')}}{{$product->thumbnail}}" style="max-width: 80%; max-height: 100px;">
                                            </td>
                                            <td>{{$product->name}}</td>
                                            <td>{{$product->category->name}}</td>
                                        </tr>
                                        @endif
                                    @else
                                    <tr class="choose_product" data-slug="{{$product->slug}}" style="margin: 5px">
                                        <td>{{$product->product_code}}</td>
                                        <td>
                                            <img src="{{asset('')}}{{$product->thumbnail}}" style="max-width: 80%; max-height: 100px;">
                                        </td>
                                        <td>{{$product->name}}</td>
                                        <td>{{$product->category->name}}</td>
                                    </tr>
                                    @endif

                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            @else
                <div class="tab-pane" id="page{{$product10->page}}">
                    <div class="table-responsive">
                        <table class="table" >
                            <thead>
                            <tr>
                                <th>Product</th>
                                <th>Thumbnail</th>
                                <th>Name</th>
                                <th>Category</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($product10 as $product)
                                @if(isset($product->is_saled))
                                    @if($product->is_saled == 1)
                                        <tr class="choose_product product_selected" data-slug="{{$product->slug}}" style="margin: 5px">
                                            <td>{{$product->product_code}}</td>
                                            <td>
                                                <img src="{{asset('')}}{{$product->thumbnail}}" style="max-width: 80%; max-height: 100px;">
                                            </td>
                                            <td>{{$product->name}}</td>
                                            <td>{{$product->category->name}}</td>
                                        </tr>
                                    @else
                                        <tr class="choose_product" data-slug="{{$product->slug}}" style="margin: 5px">
                                            <td>{{$product->product_code}}</td>
                                            <td>
                                                <img src="{{asset('')}}{{$product->thumbnail}}" style="max-width: 80%; max-height: 100px;">
                                            </td>
                                            <td>{{$product->name}}</td>
                                            <td>{{$product->category->name}}</td>
                                        </tr>
                                    @endif
                                @else
                                    <tr class="choose_product" data-slug="{{$product->slug}}" style="margin: 5px">
                                        <td>{{$product->product_code}}</td>
                                        <td>
                                            <img src="{{asset('')}}{{$product->thumbnail}}" style="max-width: 80%; max-height: 100px;">
                                        </td>
                                        <td>{{$product->name}}</td>
                                        <td>{{$product->category->name}}</td>
                                    </tr>
                                @endif

                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            @endif


        @endforeach
    </div>
    <ul class="nav nav-tabs">
        @foreach($products as $product10)
            @if($product10->page == 1)
                <li class="active"><a href="#page{{$product10->page}}" data-toggle="tab">{{$product10->page}}</a></li>
            @else
                <li><a href="#page{{$product10->page}}" data-toggle="tab">{{$product10->page}}</a></li>
            @endif
        @endforeach
    </ul>
    <!-- /.tab-content -->
</div>