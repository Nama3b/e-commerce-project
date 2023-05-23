@extends('layout')
@section('content')
    <div class="category-section">
        <div class="container">
            <div class="d-flex justify-content-center">
                @foreach($category_item as $key => $cat_item)
                <div class="cat-item"><a href="{{URL::to('/show-product-by-category'.'/'.$cat_item->category_id)}}"><b>{{$cat_item->category_name}}</b></a></div>
                @endforeach
            </div>
        </div>
    </div>

    <div class="carousel-section">
        <div id="myCarousel" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                <div class="item active">
                    <a href=""><img src="{{{'public/front-end/img/poster/NikeNOCTA_HotStepAirTerra_Translated_Internal_Banners_Primary_Desktop.jpeg'}}}" alt=""></a>
                </div>
                <div class="item">
                    <a href=""><img src="{{{'public/front-end/img/poster/FOGEssentialsSS22_Translated_Internal_Banners_Primary_Desktop.webp'}}}" alt=""></a>
                </div>
                <div class="item">
                    <a href=""><img src="{{{'public/front-end/img/poster/GucciEvergreen_Internal_Banners_Primary_Desktop.webp'}}}" alt=""></a>
                </div>
                <div class="item">
                    <a href=""><img src="{{{'public/front-end/img/poster/The-Spin-3-22-Primary_Desktop-EN.jpeg'}}}" alt=""></a>
                </div>
            </div>
        </div>
    </div>

    <div class="shopping-section">
        <div class="container-fluid">
            <div class="sneaker-section">
                <div class="d-flex">
                    <div class="col-3"></div>
                    <div class="col-9 d-flex">
                        <div class="col-6">
                            <h6><i class="far fa-star mr-2"></i>Popular sneakers</h6>
                        </div>
                        <div class="col-6 text-right">
                            @foreach($show_by_sneaker as $key => $by_sneaker)
                            <p><a href="{{URL::to('/show-product-by-category'.'/'.$by_sneaker->category_id)}}">See all <i class="fas fa-long-arrow-alt-right"></i></a></p>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="d-flex">
                    <div class="product-img col-3">
                        <img src="{{{'public/front-end/img/poster/255aa206c44c60401a3cf080fdf227e9.jpg'}}}" alt="" height="100%">
                    </div>
                    <div class="col-9">
                        @foreach($sneaker_item as $key => $sneak_item)
                        <form action="{{URL::to('/add-cart')}}" method="post">
                            {{ csrf_field() }}
                            <div class="product">
                                <a href="{{URL::to('product-detail'.'/'.$sneak_item->product_id)}}"><img src="{{{'public/uploads/product/'.$sneak_item->image}}}" alt=""></a>
                                <div class="d-flex">
                                    <button class="btn btn-sm btn-outline-dark mr-2"><a href="{{URL::to('/add-cart')}}"><i class="fas fa-cart-plus"></i><input type="hidden" name="qty" min="1" value="1"><input type="hidden" name="productId_hidden" value="{{$sneak_item->product_id}}"></a></button>
                                    <button class="btn btn-sm btn-outline-dark mr-2"><i class="fas fa-heartbeat"></i></button>
                                    <button class="btn btn-sm btn-outline-dark"><i class="fas fa-save"></i></button>
                                </div>
                                <div class="product-info">
                                    <h6><b><a href="{{URL::to('product-detail'.'/'.$sneak_item->product_id)}}">{{$sneak_item->product_name}}</a></b></h6>
                                    <p>{{$sneak_item->brand_name}}</p>
                                    <h5><b>${{$sneak_item->price}}</b></h5>
                                </div>
                            </div>
                        </form>
                        @endforeach
                    </div>
                </div>
            </div>

            <div class="streetwear-section">
                <div class="d-flex">
                    <div class="col-9 d-flex">
                        <div class="col-6">
                            <h6><i class="far fa-star mr-2"></i>Popular streetwear</h6>
                        </div>
                        <div class="col-6 text-right">
                            @foreach($show_by_streetwear as $key => $by_streetwear)
                            <p><a href="{{URL::to('/show-product-by-category'.'/'.$by_streetwear->category_id)}}">See all <i class="fas fa-long-arrow-alt-right"></i></a></p>
                            @endforeach
                        </div>
                    </div>
                    <div class="col-3"></div>
                </div>
                <div class="d-flex">
                    <div class="col-9">
                        @foreach($streetwear_item as $key => $stw_item)
                        <form action="{{URL::to('/add-cart')}}" method="post">
                            {{ csrf_field() }}
                            <div class="product">
                                <a href="{{URL::to('product-detail'.'/'.$stw_item->product_id)}}"><img src="{{{'public/uploads/product/'.$stw_item->image}}}" alt=""></a>
                                <div class="d-flex">
                                    <button class="btn btn-sm btn-outline-dark mr-2"><a href="{{URL::to('/add-cart')}}"><i class="fas fa-cart-plus"></i><input type="hidden" name="qty" min="1" value="1"><input type="hidden" name="productId_hidden" value="{{$stw_item->product_id}}"></a></button>
                                    <button class="btn btn-sm btn-outline-dark mr-2"><i class="fas fa-heartbeat"></i></button>
                                    <button class="btn btn-sm btn-outline-dark"><i class="fas fa-save"></i></button>
                                </div>
                                <div class="product-info">
                                    <h6><b><a href="{{URL::to('product-detail'.'/'.$stw_item->product_id)}}">{{$stw_item->product_name}}</a></b></h6>
                                    <p>{{$sneak_item->brand_name}}</p>

                                    <p>{{$stw_item->brand_name}}</p>
                                    <h5><b>${{$stw_item->price}}</b></h5>
                                </div>
                            </div>
                        </form>
                        @endforeach
                    </div>
                    <div class="product-img col-3">
                        <img src="{{{'public/front-end/img/poster/ea5aadb567a56290b1b0e31e81c156a8.jpg'}}}" alt="" height="100%">
                    </div>
                </div>
            </div>

            <div class="watches-section">
                <div class="container-fluid text-center">
                    @foreach($show_by_watches as $key => $by_watches)
                        <h4><b><a href="{{URL::to('/show-product-by-category'.'/'.$by_watches->category_id)}}">BAPE WATCHES COLLECTION</a></b></h4>
                    @endforeach
                        <div class="d-flex">
                        <div class="col-2">
                            <img src="{{{'public/front-end/img/poster/breguet-the-innovator-watch-the-marine-5827-chronograph-johnson-watch-and-co-ad-delhi-times-06-02-2018.png'}}}" alt="" width="100%">
                            <img src="{{{'public/front-end/img/poster/jaquet-droz-grande-seconde-quantieme-grand-feu-enamel-ad-toi-chennai-31-10-2020.png'}}}" width="100%" alt="">
                        </div>
                        <div class="col-8 watches-product text-center justify-content-center">
                            @foreach($watches_item as $key => $watch_item)
                            <form action="{{URL::to('/add-cart')}}" method="post">
                                {{ csrf_field() }}
                                <div class="product">
                                    <a href="{{URL::to('product-detail'.'/'.$watch_item->product_id)}}"><img src="{{{'public/uploads/product/'.$watch_item->image}}}" alt=""></a>
                                    <div class="d-flex justify-content-center">
                                        <button class="btn btn-sm btn-outline-dark mr-2"><a href="{{URL::to('/add-cart')}}"><i class="fas fa-cart-plus"></i><input type="hidden" name="qty" min="1" value="1"><input type="hidden" name="productId_hidden" value="{{$watch_item->product_id}}"></a></button>
                                        <button class="btn btn-sm btn-outline-dark mr-2"><i class="fas fa-heartbeat"></i></button>
                                        <button class="btn btn-sm btn-outline-dark"><i class="fas fa-save"></i></button>
                                    </div>
                                    <div class="product-info">
                                        <h6><b><a href="{{URL::to('product-detail'.'/'.$watch_item->product_id)}}">{{$watch_item->product_name}}</a></b></h6>
                                        <p>{{$watch_item->brand_name}}</p>
                                        <h5><b>${{$watch_item->price}}</b></h5>
                                    </div>
                                </div>
                            </form>
                            @endforeach
                        </div>
                        <div class="col-2">
                            <img src="{{{'public/front-end/img/poster/breguet-the-innovator-retrograde-seconds-7097-ad-times-of-india-mumbai-11-12-2018.png'}}}" alt="" width="100%">
                            <img src="{{{'public/front-end/img/poster/johnson-watch-co-breguet-the-innovator-ad-delhi-times-11-12-2018.png'}}}" alt="" width="100%">
                        </div>
                    </div>
                </div>
            </div>
            <div class="brand-section">
                <div class="container">
                    <h4 class="text-center"><b>Popular brands</b></h4>
                    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                        <div class="carousel-inner">
                            <div class="item active">
                                <div class="row justify-content-center">
                                    <div class="brand col-md-3">
                                        <img src="{{{'public/front-end/img/brand/jordan.webp'}}}" alt="">
                                    </div>
                                    <div class="brand col-md-3">
                                        <img src="{{{'public/front-end/img/brand/supreme_tile.webp'}}}" alt="">
                                    </div>
                                    <div class="brand col-md-3">
                                        <img src="{{{'public/front-end/img/brand/yzy.webp'}}}" alt="">
                                    </div>
                                    <div class="brand col-md-3">
                                        <img src="{{{'public/front-end/img/brand/ps4.webp'}}}" alt="">
                                    </div>
                                </div>
                            </div>
                            <div class="item">
                                <div class="row justify-content-center">
                                    <div class="brand col-md-3">
                                        <img src="{{{'public/front-end/img/brand/jordan.webp'}}}" alt="">
                                    </div>
                                    <div class="brand col-md-3">
                                        <img src="{{{'public/front-end/img/brand/supreme_tile.webp'}}}" alt="">
                                    </div>
                                    <div class="brand col-md-3">
                                        <img src="{{{'public/front-end/img/brand/yzy.webp'}}}" alt="">
                                    </div>
                                    <div class="brand col-md-3">
                                        <img src="{{{'public/front-end/img/brand/ps4.webp'}}}" alt="">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="fashion-news">
                <div class="container">
                    <div class="d-flex">
                        <div class="col-6"><h6><i class="far fa-star mr-2"></i>Popular news</h6></div>
                        <div class="col-6 text-right"><h6><a href="">See all <i class="fas fa-long-arrow-alt-right"></i></a></h6></div>
                    </div>
                    <div class="news-section">
                        <div class="news">
                            <img src="{{{'public/front-end/img/news/2022-3-7-hidden-gems-blog-hero-twitter-square-1200x1200.png'}}}" width="100%" alt="">
                            <div class="news-info mt-2">
                                <a href="{{URL::to('news-detail')}}"><h6><b>Xbox Mini Fridge: The #1 Selling Collectible in StockX History</b></h6></a>
                                <small>Michael - 2/9/2000</small>
                            </div>
                        </div>
                        <div class="news">
                            <img src="{{{'public/front-end/img/news/blog-header-8-1200x1200.jpg'}}}" width="100%" alt="">
                            <div class="news-info mt-2">
                                <a href="{{URL::to('news-detail')}}"><h6><b>Xbox Mini Fridge: The #1 Selling Collectible in StockX History</b></h6></a>
                                <small>Michael - 2/9/2000</small>
                            </div>
                        </div>
                        <div class="news">
                            <img src="{{{'public/front-end/img/news/Perfect-Fit-3-10-2022-blog-header-1200x1200.png'}}}" width="100%" alt="">
                            <div class="news-info mt-2">
                                <a href="{{URL::to('news-detail')}}"><h6><b>Xbox Mini Fridge: The #1 Selling Collectible in StockX History</b></h6></a>
                                <small>Michael - 2/9/2000</small>
                            </div>
                        </div>
                        <div class="news">
                            <img src="{{{'public/front-end/img/news/Pickoftheweek-3-10-22-banners-blog-hero-twitter-square-1200x1200.png'}}}" width="100%" alt="">
                            <div class="news-info mt-2">
                                <a href="{{URL::to('news-detail')}}"><h6><b>Xbox Mini Fridge: The #1 Selling Collectible in StockX History</b></h6></a>
                                <small>Michael - 2/9/2000</small>
                            </div>
                        </div>
                        <div class="news">
                            <img src="{{{'public/front-end/img/news/The-Rip-03-14-22-blog-header-1200x1200.jpg'}}}" width="100%" alt="">
                            <div class="news-info mt-2">
                                <a href="{{URL::to('news-detail')}}"><h6><b>Xbox Mini Fridge: The #1 Selling Collectible in StockX History</b></h6></a>
                                <small>Michael - 2/9/2000</small>
                            </div>
                        </div>
                        <div class="news">
                            <img src="{{{'public/front-end/img/news/2022-3-9-XboxMiniFridge-blog-hero-twitter-square-1200x1200.png'}}}" width="100%" alt="">
                            <div class="news-info mt-2">
                                <a href="{{URL::to('news-detail')}}"><h6><b>Xbox Mini Fridge: The #1 Selling Collectible in StockX History</b></h6></a>
                                <small>Michael - 2/9/2000</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
