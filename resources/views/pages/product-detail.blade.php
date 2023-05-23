@extends('layout')
@section('content')

<div class="product-detail-body">
    <div class="container">
      <div class="row">
        <div class="product-detail">
          @foreach($product_detail as $key => $pro_detail)
          <div class="product-detail-title">
            <p>Home / <a href="{{URL::to('product'.'/'.$pro_detail->category_id)}}">{{$pro_detail->category_name}}</a> / <a href="{{URL::to('product'.'/'.$pro_detail->brand_id)}}">{{$pro_detail->brand_name}}</a> / {{$pro_detail->product_name}}</p>
          </div>
          <div class="d-flex">
            <div class="col-6 text-center">
              <div class="tag text-left">
                <a href="" class="">100% Authentic</a>
                <a href="" class="">Condition: New</a>
              </div>
              <img src="{{{'../public/uploads/product/'.$pro_detail->image}}}" alt="" width="80%">
            </div>
            <div class="col-6">
              <div class="product-detail-title text-center">
                <h2><u>{{$pro_detail->product_name}}</u></h2>
                <div class="product-detail-selection">
                  <h2><b>${{$pro_detail->price}}</b></h2>
                    <form action="{{URL::to('add-cart')}}" method="post">
                      <div class="qty-select d-flex">
                        {{ csrf_field()}}
                        <div class="qty col-6 d-flex">
                            <p>Quantity: </p> <input type="number" name="qty" min="1" value="1">
                            <input type="hidden" name="productId_hidden" value="{{$pro_detail->product_id}}">
                        </div>
                        <div class="col-6">
                            <select name="" id="">
                                <option value="">Size: All</option>
                                <option value="">Size: 37</option>
                            </select>
                        </div>
                      </div>
                      <a href="{{URL::to('checkout')}}"><button class="btn btn-dark"><i class="mr-2"></i>Buy</button></a>
                      <div class="d-flex">
                        <button class="btn btn-outline-dark mr-2"><a href="{{URL::to('add-cart')}}"><i class="fas fa-cart-plus"></i></a></button>
                        <button class="btn btn-outline-dark mr-2"><i class="fas fa-heart"></i></button>
                        <button class="btn btn-outline-dark"><i class="fas fa-share-square"></i></button>
                        {{-- <div class="fb-share-button" data-href="http://localhost/laravel-project/" data-layout="button" data-size="large"><a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=http%3A%2F%2Flocalhost%2Flaravel-project%2F&amp;src=sdkpreparse" class="fb-xfbml-parse-ignore">Chia sẻ</a></div> --}}
                      </div>
                    </form>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="product-detail-info">
          <h4>Product Details</h4>
          <div class="d-flex">
            <div class="col-6">
              <p>Our product Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sapiente reprehenderit nisi harum illum nihil nesciunt soluta commodi fugit officia. Non nihil ut, veritatis dicta ipsum ullam saepe aperiam, accusamus..
                <br>
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Distinctio necessitatibus alias omnis, optio.
              </p>
            </div>
            <div class="col-6 table-info">
              <table>
                <tr>
                  <td>Style</td>
                  <td>555088-036</td>
                </tr>
                <tr>
                  <td>Colorway</td>
                  <td>BLACK/WHITE-PARTICLE GREY</td>
                </tr>
                <tr>
                  <td>Retail Price</td>
                  <td>{{$pro_detail->price}}</td>
                </tr>
                <tr>
                  <td>Release Date</td>
                  <td>03/12/2022</td>
                </tr>
              </table>
            </div>
          </div>
        </div>
        @endforeach
        <div class="related-product">
          <h4>Related product</h4>
          <div class="d-flex">
            @foreach($related_product as $key => $related)
            <div class="product col-3">
              <a href="{{$related->product_id}}"><img src="{{{'../public/uploads/product/'.$related->image}}}" alt=""></a>
              <div class="product-info">
                <h6><b>{{$related->product_name}}</b></h6>
                <p>{{$related->brand_name}}</p>
                <h5><b>${{$related->price}}</b></h5>
              </div>
            </div>
            @endforeach
          </div>
        </div>
      </div>
    </div>
</div>

@endsection
