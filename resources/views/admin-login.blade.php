<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Admin Login</title>
    <link href="{{{'public/back-end/img/romantic-music.png'}}}" rel="icon">
    <link rel="stylesheet" href="{{{'public/back-end/css/admin-login.css'}}}">
    <link rel="stylesheet" href="{{{'public/back-end/assets/fontawesome/css/all.css'}}}">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="assets/font-awesome-4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<head>

<body>
  <div class="header">
    <div class="container-fluid">
      <div class="row justify-content-center">
        <div class="col-3">
          <img src="{{{'public/back-end/img/16559063 (1).png'}}}" alt="" width="100%">
        </div>
        <hr>
      </div>
    </div>

  </div>
  <div class="body">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-4">
          <form action="{{URL::to('login-action')}}" method="post" class="form-input">
            {{ csrf_field() }}
            <h6><u>Warning:</u> Do not continue if you don't have a permission in here!</h6>
            <?php
                $message = Session::get('message');
                if($message){
                    echo '<span class="text-alert text-center" style="color:red">'.$message.'</span>';
                    Session::put('message', null);
                }
            ?>
            <input type="text" name="email" placeholder="Username">
            <input type="password" name="password" placeholder="Password">
            <small class="text-right">Forgot Password?</small>
            <button class="btn btn-dark" type="submit" name="login">Sign Up</button>
            <small>By signing up, you agree to the <b>Terms of Service</b> and <b>Privacy Policy</b></small>
          </form>
        </div>
      </div>
    </div>
  </div>
</body>
