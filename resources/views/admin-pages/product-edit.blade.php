@extends('admin-layout')
@section('content')

<div id="table-manage">
    <div class="container">
        <div class="card">
            <h3 class="card-header">Edit product</h3>
            <div class="card-body">
                <?php
                    $message = Session::get('message');
                    if($message){
                        echo '<span class="text-alert">'.$message.'</span>';
                        Session::put('message',null);
                    }
                ?>
                @foreach($product_edit as $key => $pro_edit)
                <form id="form" method="post" action="{{URL::to('/product-update/'.$pro_edit->product_id)}}">
                    {{ csrf_field() }}
                    <div class="form-group row">
                        <label for="book_name" class="col-3 col-lg-3 col-form-label text-right">Name</label>
                        <div class="col-8 col-lg-8">
                            <input name="product_name" value="{{$pro_edit->product_name}}" type="text" placeholder="product name" class="form-control mt-1">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="category_id" class="col-3 col-lg-3 col-form-label text-right">Category</label>
                        <div class="col-8 col-lg-8">
                            <select class="form-control" name="category_id">
                                @foreach($cat_id as $key => $cate)
                                    @if($cate->category_id==$pro_edit->category_id)
                                    <option selected value="{{$cate->category_id}}">{{$cate->category_name}}</option>
                                    @else
                                    <option value="{{$cate->category_id}}">{{$cate->category_name}}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="brand_id" class="col-3 col-lg-3 col-form-label text-right">Brand</label>
                        <div class="col-8 col-lg-8">
                            <select class="form-control" name="brand_id">
                                @foreach($bra_id as $key => $bra)
                                    @if($bra->brand_id==$pro_edit->brand_id)
                                    <option selected value="{{$bra->brand_id}}">{{$bra->brand_name}}</option>
                                    @else
                                    <option value="{{$bra->brand_id}}">{{$bra->brand_name}}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="price" class="col-3 col-lg-3 col-form-label text-right">Price</label>
                        <div class="col-8 col-lg-8">
                            <input name="price" value="{{$pro_edit->price}}" type="text" placeholder="price" class="form-control mt-1">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="quantity" class="col-3 col-lg-3 col-form-label text-right">Quantity</label>
                        <div class="col-8 col-lg-8">
                            <input name="quantity" value="{{$pro_edit->quantity}}" type="text" placeholder="product quantity" class="form-control mt-1">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="product_img" class="col-3 col-lg-3 col-form-label text-right">Image</label>
                        <div class="col-8 col-lg-8">
                            <input name="image" type="file" >
                            <img src="{{URL::to('public/uploads/product/'.$pro_edit->image)}}" style="width: 100px; height: 90px;" alt="">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="description" class="col-3 col-lg-3 col-form-label text-right">Description</label>
                        <div class="col-8 col-lg-8">
                            <textarea class="form-control" name="description" rows="3" col="50" placeholder="Description">{{$pro_edit->description}}</textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-3 col-lg-3"></label>
                        <div class="col-8 col-lg-8">
                            <button type="submit" name="done" class="btn btn-outline-light">Done</button>
                        </div>
                    </div>
                </form>
                @endforeach
            </div>
        </div>
    </div>
</div>

@endsection
