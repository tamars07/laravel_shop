@extends('admin.master')
@section('header')
    Edit <b>{{$product->name}}</b>
@endsection
@section('breadcrumb')
    <li class="breadcrumb-item active">Product</li>
    <li class="breadcrumb-item active">Edit</li>
@endsection
@section('main-content')
    <div class="row">
        <div class="col-md-12">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Edit <b>{{$product->name}}</b></h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form id="editFrm" role="form" method="post" enctype="multipart/form-data" action="{{route('edit-product')}}">
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                    <div class="row">@if(Session::has('thongbao')){{Session::get('thongbao')}}@endif</div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="product-name">Product name</label>
                            <input type="text" class="form-control" id="product-name" name="name" placeholder="Enter product name" value="{{$product->name}}">
                        </div>
                        <div class="form-group">
                            <label>Product type</label>
                            <select class="form-control" id="product-type" name="type">
                                @foreach($product_type as $type)
                                    <option value="{{$type->id}}" @if($type->id == $product->id_type) selected @endif>{{$type->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Description</label>
                            <textarea class="form-control" id="product-desc" name="desc" rows="3" placeholder="Enter product description">
                                 {{$product->description}}
                            </textarea>
                        </div>
                        <div class="form-group">
                            <label>Unit price</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">$</span>
                                </div>
                                <input type="number" class="form-control" id="unit-price" name="price" value="{{$product->unit_price}}">
                                <div class="input-group-append">
                                    <span class="input-group-text">.00</span>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Promotion price</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">$</span>
                                </div>

                                <input type="number" class="form-control" id="promotion-price" name="promotion" value="{{$product->promotion_price}}">
                                <div class="input-group-append">
                                    <span class="input-group-text">.00</span>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="product-unit">Unit</label>
                            <input type="text" class="form-control" id="product-unit" name="unit" placeholder="Enter product unit" value="{{$product->unit}}">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputFile">Product image</label>
                            <div class="input-group">
                                <img id="blah" src="{{asset('source/image/product/' . $product->image)}}" alt="your image" style="width: 300px; height: 300px;"/>
                            </div><br>
                            <div class="input-group">
                                <input type="file" name="img" required="true" onchange="readURL(this);">
                            </div>
                        </div>
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" id="new-product" name="new">
                            <label class="form-check-label" for="exampleCheck1">Check as a New product</label>
                        </div>
                    </div>
                    <!-- /.card-body -->

                    <div class="card-footer">
                        <a id="submitBtn" class="btn btn-success">Update</a>
                        <a class="btn btn-warning" onclick="reset()">Reset</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script>
        $(function() {
            $("#submitBtn").click(function(){
                if (confirm("Click OK to continue?")){
                    $('form#editFrm').submit();
                }
            });
        });
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#blah')
                        .attr('src', e.target.result)
                        .width(300)
                        .height(300);
                };
                reader.readAsDataURL(input.files[0]);
                $('#blah').show();
            }
        }
        function reset(){
            document.getElementById('editFrm').reset();
            $('#blah').attr('src','{{asset('source/image/product/' . $product->image)}}');
        }
    </script>
@endsection
