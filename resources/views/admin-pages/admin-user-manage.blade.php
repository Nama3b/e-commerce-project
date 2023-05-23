@extends('admin-layout')
@section('content')

<div id="table-manage">
    <div class="container">
        <div class="card">
            <h3 class="card-header">Admin user manage</h3>
            <div class="card-body">
                <?php
                    $message = Session::get('message');
                    if($message){
                        echo '<span class="text-alert">'.$message.'</span>';
                        Session::put('message',null);
                    }
                ?>
                @foreach($admin_user as $key => $ad_manage)
                <form id="form" method="post" action="{{URL::to('/admin-user-update/'.$ad_manage->admin_id)}}">
                    {{ csrf_field() }}
                    <div class="form-group row">
                        <label for="admin_name" class="col-3 col-lg-3 col-form-label text-right">Name</label>
                        <div class="col-8 col-lg-8">
                            <input name="fullname" value="{{$ad_manage->fullname}}" type="text" placeholder="product name" class="form-control mt-1">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="admin_email" class="col-3 col-lg-3 col-form-label text-right">Email</label>
                        <div class="col-8 col-lg-8">
                            <input name="email" value="{{$ad_manage->email}}" type="text" placeholder="admin_email" class="form-control mt-1">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="password" class="col-3 col-lg-3 col-form-label text-right">Password</label>
                        <div class="col-8 col-lg-8">
                            <input name="password" value="{{$ad_manage->password}}" type="password" placeholder="password" class="form-control mt-1">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="admin_phone" class="col-3 col-lg-3 col-form-label text-right">Phonenumber</label>
                        <div class="col-8 col-lg-8">
                            <input name="phonenumber" value="{{$ad_manage->phonenumber}}" type="text" placeholder="Phonenumber" class="form-control mt-1">
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
