@extends('admin.master')
@section('header')
    Add Product
@endsection
@section('breadcrumb')
    <li class="breadcrumb-item active">Add Product</li>
@endsection
@section('main-content')
{{--    tao form them san pham--}}
    <div class="row">
        <div class="col-md-12">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Add</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form role="form" method="post" enctype="multipart/form-data" action="#">
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="product-name">Product name</label>
                            <input type="text" class="form-control" id="product-name" name="product_name" placeholder="Enter product name">
                        </div>
                        <div class="form-group">
                            <label>Product type</label>
                            <select class="form-control" id="product-type" name="product_type">
                                <option value="1">Bánh mặn</option>
                                <option value="2">Bánh ngọt</option>
                                <option value="3">Bánh trái cây</option>
                                <option value="4">Bánh kem</option>
                                <option value="5">Bánh crepe</option>
                                <option value="6">Bánh Pizza</option>
                                <option value="7">Bánh su kem</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Description</label>
                            <textarea class="form-control" id="product-desc" name="product_desc" rows="3" placeholder="Enter product description">
                            </textarea>
                        </div>
                        <div class="form-group">
                            <label>Unit price</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">$</span>
                                </div>
                                <input type="number" class="form-control" id="unit-price" name="unit_price">
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
                                <input type="number" class="form-control" id="promotion-price" name="promotion_price">
                                <div class="input-group-append">
                                    <span class="input-group-text">.00</span>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="product-unit">Unit</label>
                            <input type="text" class="form-control" id="product-unit" name="product_unit" placeholder="Enter product unit">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputFile">Product image</label>
                            <div class="input-group">
                                <input type="file" name="productImg" required="true">
                            </div>
                        </div>
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" id="new-product" name="new_product">
                            <label class="form-check-label" for="exampleCheck1">Check as a New product</label>
                        </div>
                    </div>
                    <!-- /.card-body -->

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
