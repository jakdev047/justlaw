@extends('layouts.app')
@section('content')
<!-- INLINE FORM ELELEMNTS -->
<div class="row mt">
    <div class="col-lg-12">
        <div class="form-panel">
            <h4 class="mb"><i class="fa fa-angle-right"></i> Create Category</h4>
            <form class="form-login" action="{{url('proupdate/'.$product->id)}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">

                    @php
                        $cat = DB::table('categories')->get();
                    @endphp

                    <select name="cat_id" class="form-control">
                        @foreach ($cat as $item)
                            <option value="{{$item->id}}"
                                    <?php
                                        if( $product->cat_id == $item->id)
                                            { echo 'selected'; }
                                    ?>
                            >
                                {{$item->name}}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label class="sr-only" for="title">Product Name</label>
                    <input type="text" class="form-control" name="title" value="{{$product->title}}" id="title" placeholder="Enter Title" required>
                </div>
                <div class="form-group">
                    <label class="sr-only" for="buy_price">Product Buy Price</label>
                    <input type="number" class="form-control" name="buy_price" value="{{$product->buy_price}}" id="buy_price" placeholder="Product Buy Price" required>
                </div>
                <div class="form-group">
                    <label class="sr-only" for="regular_price">Product Regular Price</label>
                    <input type="number" class="form-control" name="regular_price" value="{{$product->regular_price}}" id="regular_price" placeholder="Product Regular Price" required>
                </div>
                <div class="form-group">
                    <label class="sr-only" for="flate_price">Product Flate Price</label>
                    <input type="number" class="form-control" name="flate_price" value="{{$product->flate_price}}" id="flate_price" placeholder="Product Flate Price" required>
                </div>
                <div class="form-group">
                    <label class="sr-only" for="shortdes">Product Short Description</label>
                    <textarea name="shortdes" id="shortdes" class="form-control"  placeholder="Product Short Description" required>
                        {{$product->shortdes}}
                    </textarea>
                </div>
                <div class="form-group">
                    <label class="sr-only" for="tag">Product Tags</label>
                    <input type="text" class="form-control" name="tag" value="{{$product->tag}}" id="tag" placeholder="Product Tags" required>
                </div>
                <div class="form-group">
                    <label class="sr-only" for="rating">Product Rating</label>
                    <input type="number" class="form-control" name="rating" value="{{$product->rating}}" id="rating" placeholder="Product Rating" required>
                </div>
                <div class="form-group">
                    <label class="sr-only" for="quantity">Product Quantity</label>
                    <input type="number" class="form-control" name="quantity" value="{{$product->quantity}}" id="quantity" placeholder="Product Quantity" required>
                </div>
                <div class="form-group">
                    <label class="sr-only" for="product_info">Product Info</label>
                    <textarea name="product_info" id="product_info" class="form-control" placeholder="Product Info" required>
                        {{$product->product_info}}
                    </textarea>
                </div>
                <div class="form-group">
                    <label for="old_photo">Old Photo</label> <br>
                    <img    src="{{URL::to($product->feature_image)}}"
                            name="old_photo"
                            style="width:120px;height:120px;"
                    >
                    <input type="hidden" name="old_photo" value="{{$product->feature_image}}">
                </div>

                <div class="form-group">
                    <label for="feature_image">New Photo</label> <br>
                    <img id="image" src="#">
                    <input type="file"
                            class="form-control upload"
                            name="feature_image"
                            onchange="readURL(this);"
                    >
                </div>
                <div class="form-group">
                    <label  class="control-label"> Product Gallary Photo</label>
                    <div id="input_fields">
                        <input type="file" class="form-control" name="images[]" required>
                    </div>
                    <button type="button" onclick="add()" id="addNew" class="btn btn-success">Add More Photo</button>
                </div>
                <button type="submit" class="btn btn-theme">Edit</button>
            </form>
        </div><!-- /form-panel -->
    </div><!-- /col-lg-12 -->

    <script>
        function add(){
            let field = `
                <div class="row">
                            <div class="col-md-10">
                                <div class="form-group">
                                    <input type="file" class="form-control" name="images[]" required>
                                </div>
                            </div>
                            <div class="col-md-1 col pt-md-2 pt-0">
                                <button type="button" class="remove mt-md-4 mt-0 mb-2 mb-md-0 btn btn-danger"><i class="fa fa-times-circle"></i></button>
                            </div>
                        </div>
            `;
            $("#input_fields").append(field);
            $(document).on('click', '.remove', function(){
                $(this).parent('.col').parent('.row').remove();
            });
        }
        
        function readURL(input){
            if(input.files && input.files[0] ) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#image').attr('src',e.target.result).width(120).height(120);
                };
                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>

</div><!-- /row -->
@endsection
