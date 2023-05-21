@extends('layout')
@section('content')

  <div class="banner-product">
    <div class="container">
        <div class="row">
          <div class="col-5">
            <h1><b>Sneakers</b></h1>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Laborum, quidem facere aspernatur natus voluptatum ex sequi doloremque molestiae, sunt inventore est exercitationem quia accusamus esse consectetur ipsam corporis, vitae.</p>
          </div>
        </div>
      </div>
  </div>
  <div class="product-body">
    <div class="container">
      <div class="row">
        <div class="col-2">
          <div class="left-item category-item">
            <h5>Category</h5>
            @foreach($category_item as $key => $cat_item)
            <a href="{{URL::to('show-product-by-category'.'/'.$cat_item->category_id)}}" class="">{{$cat_item->category_name}}</a>
            @endforeach
          </div>
          <div class="left-item brand-item">
            <h5>Brand</h5>
            @foreach($brand_item as $key => $bra_item)
            <a href="{{URL::to('show-product-by-brand'.'/'.$bra_item->brand_id)}}" class="">{{$bra_item->brand_name}}</a>
            @endforeach
          </div>
        </div>
        <div class="col-10">
          <div class="feature-product">
            <div class="d-flex">
              <div class="col-6">
               @foreach($category_name as $key => $cat_name)
                <p>Home / Product / {{$cat_name->category_name}}</p>
               @endforeach
              </div>
              <div class="col-6 text-right mb-3">
                <select name="sort" id="">
                  <option value="">Sort By: Feature</option>
                  <option value="">Sort By: Most popular</option>
                  <option value="">Sort By: Lowest Asks</option>
                  <option value="">Sort By: Highest Bids</option>
                </select>
              </div>
            </div>
          </div>
          <div class="product-section">
            @foreach($product_item as $key => $pro_item)
            <div class="product">
              <a href="{{URL::to('product-detail'.'/'.$pro_item->product_id)}}"><img src="{{{'../public/uploads/product/'.$pro_item->image}}}" alt=""></a>
              <div class="d-flex">
                <button class="btn btn-sm btn-outline-dark mr-2"><i class="fas fa-cart-plus"></i></button>
                <button class="btn btn-sm btn-outline-dark mr-2"><i class="fas fa-heartbeat"></i></button>
                <button class="btn btn-sm btn-outline-dark"><i class="fas fa-save"></i></button>
              </div>
              <div class="product-info">
                <h6><b>{{$pro_item->product_name}}</b></h6>
                <p>{{$pro_item->category_name}}</p>
                <h5><b>{{$pro_item->price}}$</b></h5>
              </div>
            </div>
            @endforeach
          </div>
          <div class="pagination"></div>
        </div>
      </div>
    </div>
  </div>

  @endsection
