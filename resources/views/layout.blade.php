<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>{{$meta_title}}</title>
    <meta name="author" content="">
    <meta name="keywords" content={{$meta_keywords}}"">
    <meta name="description" content="{{$meta_desc}}">
    <meta name="robots" content="INDEX,FOLLOW">
    <link rel="canonical" href="{{$url_canonical}}">

{{--     <meta property="og:image" content="{{$image_org}}"> --}}
    <meta property="og:site_name" content="http://localhost/laravel-project/">
    <meta property="og:description" content="{{$meta_desc}}">
    <meta property="og:title" content="{{$meta_title}}">
    <meta property="og:url" content="{{$url_canonical}}">
    <meta property="og:type" content="website">

    <link href="{{{'public/front-end/img/logo.png'}}}" rel="icon">
    <link href="{{{'../public/front-end/img/logo.png'}}}" rel="icon">
    <link rel="stylesheet" href="{{{'public/front-end/css/index.css'}}}">
    <link rel="stylesheet" href="{{{'../public/front-end/css/index.css'}}}">

    <link rel="stylesheet" href="{{{'public/front-end/assets/fontawesome/css/all.css'}}}">
    <link rel="stylesheet" href="{{{'../public/front-end/assets/fontawesome/css/all.css'}}}">
    <link rel="stylesheet" href="{{{'public/front-end/assets/font-awesome-4.7.0/css/font-awesome.min.css'}}}">
    <link rel="stylesheet" href="{{{'../public/front-end/assets/font-awesome-4.7.0/css/font-awesome.min.css'}}}">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
    <!--========== HEADER ==========-->
    <header id="header" class="header-section">
        <div class="container-fluid">
            <nav class="navbar navbar-expand-sm">
              <!-- Brand/logo -->
                <div class="nav-left col-6 d-flex fade-in">
                    <a class="navbar-brand" href="{{URL::to('home')}}">
                        <img src="{{{'public/front-end/img/16559063 (1).png'}}}" alt="">
                        <img src="{{{'../public/front-end/img/16559063 (1).png'}}}" alt="">
                    </a>
                    <form class="form-search" method="post" action="{{URL::to('search-product')}}">
                        {{ csrf_field() }}
                        <input class="form-control" name="keyword_submit" type="text" placeholder="Search..">
                        <button type="submit" name="seach_item" value="search" class="btn btn-sm"><i class="fas fa-search"></i></button>
                    </form>
                </div>
                <div class="nav-right col-6 d-flex fade-in slide-in">
                    <ul class="navbar-nav slide-in">
                        <li class="nav-item active">
                            <a class="nav-link" href="{{URL::to('home')}}">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{URL::to('product')}}">Product</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{URL::to('feature')}}">Feature</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{URL::to('partner')}}">Partners</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{URL::to('client')}}">Clients</a>
                        </li>
                    </ul>
                    <?php
                        $client_id = Session::get('client_id');
                        if($client_id == NULL){
                    ?>
                        <button class="btn btn-dark btn-signup"><a href="{{URL::to('login')}}">Sign Up</a></button>
                        <button class="btn btn-outline-dark btn-cart"><a href="{{URL::to('login')}}">Cart <i class=" fab fa-bitbucket"></i></a></button>
                    <?php
                    }else{
                    ?>
                        <div class="dropdown d-flex">
                          <button class="btn btn-outline-dark" type="button" data-toggle="dropdown">
                            <img src="{{{'public/front-end/img/b5701597aecbaefeb4ca8c341ff5bff9.jpg'}}}" alt="" width="37px">
                          </button>
                          <i class="fas fa-caret-down"></i>
                          <ul class="dropdown-menu">
                            <li><a href="">Hellou,
                            <?php
                                $client_name = Session::get('client_fullname');
                                if($client_name){
                                    echo $client_name;
                                }
                            ?> !</a></li>
                            <li><a href="#">My profile</a></li>
                            <li><a href="#">Setting</a></li>
                            <hr>
                            <li><a href="{{URL::to('logout-client')}}" style="color:red">Logout</a></li>
                          </ul>
                        </div>
                        <button class="btn btn-outline-dark btn-cart"><a href="{{URL::to('show-cart')}}">Cart <i class="fab fa-bitbucket"></i></a></button>
                    <?php } ?>
                </div>
            </nav>
        </div>
    </header>

    @yield('content')

    <footer>
        <div class="container-fluid">
            <div class="d-flex">
                <div class="col-7 d-flex">
                    <button class="btn btn-outline-dark favorite" name="favorite">Sneaker</button>
                    <button class="btn btn-outline-dark">Streetwear</button>
                    <button class="btn btn-outline-dark">Watches</button>
                    <button class="btn btn-outline-dark">Accessory</button>
                </div>
                <div class="col-5 d-flex">
                    <a href="" class="mr-2">FORUM</a> | <a href="" class="ml-2">ABOUT</a>
                </div>
            </div>
            <div class="d-flex cre">
                <div class="col-3">
                    <img src="{{{'public/front-end/img/16559063 (1).png'}}}" alt="" width="90%">
                    <img src="{{{'../public/front-end/img/16559063 (1).png'}}}" alt="" width="90%">
                </div>
                <div class="col-2">
                    <ul>
                        <li>Lorem ipsum dolor sit.</li>
                        <li>Venam blandis reprehderit, assumeda.</li>
                        <li>Obcaecati ure quaerat?</li>
                        <li>Voluptate adipisci stiae vel.</li>
                    </ul>
                </div>
                <div class="col-2">
                    <ul>
                        <li>Lorem ipsum dolor sit.</li>
                        <li>Deleniti possmus volptate, repuandae.</li>
                        <li><a href="{{URL::to('dashboard')}}" style="color:black">Qui</a> officia architecto nobis?</li>
                        <li>Dignissimos fuga vitae sit!</li>
                    </ul>
                </div>
                <div class="col-2">
                    <ul>
                        <li>Lorem ipsum dolor sit.</li>
                        <li>Optio, ipsam quos nobis?</li>
                        <li>Atque aspernatur maiores voluptas.</li>
                        <li>Aperiam vitae cum iste!</li>
                    </ul>
                </div>
                <div class="col-2">
                    <ul>
                        <li>Lorem ipsum dolor sit.</li>
                        <li>Reprehedeit voluptate perspiatis ut.</li>
                        <li>Est pariatur ipsam, ad.</li>
                        <li>Itaque, tempore officis!</li>
                    </ul>
                </div>
            </div>
            <div class="d-flex text-center">
                <div class="col-4">
                    <h6>Credit with</h6>
                    <div class="d-flex justify-content-center">
                        <a href=""><i class="fab fa-cc-mastercard"></i></a>
                        <a href=""><i class="fab fa-cc-amazon-pay"></i></a>
                        <a href=""><i class="fab fa-cc-paypal"></i></a>
                    </div>
                </div>
                <div class="col-4">
                    <h6>Share with</h6>
                    <div class="d-flex justify-content-center">
                        <a href=""><i class="fab fa-facebook-square"></i></a>
                        <a href=""><i class="fab fa-instagram"></i></a>
                        <a href=""><i class="fab fa-twitter-square"></i></a>
                    </div>
                </div>
                <div class="col-4">
                    <h6>Download with</h6>
                    <div class="d-flex justify-content-center">
                        <a href=""><i class="fab fa-app-store-ios"></i></a>
                        <a href=""><i class="fab fa-google-play"></i></a>
                    </div>
                </div>
            </div>
            <hr>
            <div class="d-flex text-center mt-2">
                <div class="col-6"><p>Made with <i class="fa fa-keyboard-o"></i> and <i class="fa fa-hand-stop-o">.</i></p></div>
                <div class="col-6"><h6>Designed by Le Thanh Long.</h6></div>
            </div>
        </div>
    </footer>
    <div id="fb-root"></div>

    <script type="text/javascript">
        $(document).ready(function(){
            $(".favorite").click(function(){
                 swal("Add to favorite!")
            });
        })
    </script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    <script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v13.0&appId=773430333349175&autoLogAppEvents=1" nonce="NpzucYfZ"></script>

    <script src="{{{'public/front-end/assets/js/index.js'}}}"></script>
</body>
</html>
