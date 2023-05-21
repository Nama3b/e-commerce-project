<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Admin Dashboard</title>
    <link href="{{{'public/back-end/img/logo.png'}}}" rel="icon">
    <link href="{{{'../public/back-end/img/logo.png'}}}" rel="icon">
    <link rel="stylesheet" href="{{{'public/back-end/css/admin-dashboard.css'}}}">
    <link rel="stylesheet" href="{{{'../public/back-end/css/admin-dashboard.css'}}}">
    <link rel="stylesheet" href="{{{'public/back-end/assets/fontawesome/css/all.css'}}}">
    <link rel="stylesheet" href="{{{'../public/back-end/assets/fontawesome/css/all.css'}}}">
    <link rel="stylesheet" href="{{{'public/back-end/assets/font-awesome-4.7.0/css/font-awesome.min.css'}}}">
    <link rel="stylesheet" href="{{{'../public/back-end/assets/font-awesome-4.7.0/css/font-awesome.min.css'}}}">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<head>

<body>
  <div id="mySidebar" class="sidebar">
    <div class="logo d-flex">
      <a href="javascript:void(0)" class="closebtn" onclick="closeNav()"><i class="fas fa-angle-double-left"></i></a>
        <a href="{{URL::to('./home')}}" class="logo-img"><img src="{{{'public/back-end/img/admin-logo.png'}}}" alt="" width="95%"></a>
    </div>
    <hr>
    <h5>Product manager</h5>
    <a href="{{URL::to('dashboard')}}"><i class="material-icons">dashboard</i> Dashboard</a>
    <a href="{{URL::to('category-list')}}"><i class="fas fa-list"></i> Category</a>
    <a href="{{URL::to('brand-list')}}"><i class="fas fa-award"></i> Brand</a>
    <a href="{{URL::to('product-list')}}"><i class="fas fa-box-open"></i> Product</a>
    <hr>
    <h5>Order</h5>
    <a href="{{URL::to('order-waiting')}}"><i class="fas fa-shipping-fast"></i> Waiting order</a>
    <a href="{{URL::to('order-list')}}"><i class="material-icons">list</i> List order</a>
    <hr>
    <h5>User manager</h5>

    <a href="{{URL::to('admin-user-manage')}}/<?php
        $admin_name = Session::get('fullname');
        if($admin_name){
            echo $admin_name;
        }
    ?>">
    <i class="fas fa-user-shield"></i> Admin user</a>
    <a href="{{URL::to('client-user-manage')}}"><i class="fas fa-user-edit"></i> Client user</a>
  </div>
    @yield('dashboard')
    @yield('content')


  <script src="{{{'public/back-end/assets/js/index.js'}}}"></script>
  <script>
  function openNav() {
    document.getElementById("mySidebar").style.width = "300px";
    document.getElementById("main").style.marginLeft = "300px";
  }

  function closeNav() {
    document.getElementById("mySidebar").style.width = "0";
    document.getElementById("main").style.marginLeft= "0";
  }
  </script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script src="//cdn.ckeditor.com/4.18.0/full/ckeditor.js"></script>
    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
{{--   <script src="{{{'public/back-end/ckeditor/ckeditor.js'}}}"></script>
  <script src="{{{'../public/back-end/ckeditor/ckeditor.js'}}}"></script> --}}
  <script type="text/javascript">
    $.validate({

    });
  </script>
  <script>
    CKEDITOR.replace('ckeditor');
  </script>
</body>
