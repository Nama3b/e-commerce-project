@extends('admin-layout')
@section('content')

<div id="table-manage">
    <div class="container">
        <div class="card">
            <h3 class="card-header">Add product</h3>
            <div class="card-body">
                <?php
                    $message = Session::get('message');
                    if($message){
                        echo '<span class="text-alert">'.$message.'</span>';
                        Session::put('message',null);
                    }
                ?>
                <form id="form" method="post" action="{{URL::to('add-product-action')}}" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="form-group row">
                        <label for="product_name" class="col-3 col-lg-3 col-form-label text-right">Name</label>
                        <div class="col-8 col-lg-8">
                            <input name="product_name" type="text" placeholder="product name" class="form-control mt-1" data-validation="length" data-validation-length="min3" data-validation-error-msg='Product name have at least 3 characters'>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="category_id" class="col-3 col-lg-3 col-form-label text-right">Category</label>
                        <div class="col-8 col-lg-8">
                            <select class="form-control" name="category_id">
                                @foreach($cat_id as $key => $cate)
                                    <option value="{{$cate->category_id}}">{{$cate->category_name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="brand_id" class="col-3 col-lg-3 col-form-label text-right">Brand</label>
                        <div class="col-8 col-lg-8">
                            <select class="form-control" name="brand_id">
                                @foreach($brand_id as $key => $bra)
                                    <option value="{{$bra->brand_id}}">{{$bra->brand_name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="product_price" class="col-3 col-lg-3 col-form-label text-right">Price</label>
                        <div class="col-8 col-lg-8">
                            <input name="price" type="text" placeholder="Price" class="form-control mt-1">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="product_qty" class="col-3 col-lg-3 col-form-label text-right">Quantity</label>
                        <div class="col-8 col-lg-8">
                            <input name="quantity" type="text" placeholder="quantity" class="form-control mt-1">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="product_img" class="col-3 col-lg-3 col-form-label text-right">Image</label>
                        <div class="col-8 col-lg-8">
                            <input name="image" type="file" >
                            <img src="" style="width: 100px; height: 90px;" alt="">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="description" class="col-3 col-lg-3 col-form-label text-right">Description</label>
                        <div class="col-8 col-lg-8">
                            <textarea class="form-control" name="description" id="ckeditor" placeholder="Description"></textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="status" class="col-3 col-lg-3 col-form-label text-right">Status</label>
                        <div class="col-5 col-lg-5 mt-1">
                            <select name="status">
                                <option value="1">Display</option>
                                <option value="0">Hide</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-3 col-lg-3"></label>
                        <div class="col-8 col-lg-8">
                            <button type="submit" name="addNewProduct" class="btn btn-outline-light">Create</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection

