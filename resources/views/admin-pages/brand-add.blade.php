@extends('admin-layout')
@section('content')

<div id="table-manage">
    <div class="container">
        <div class="card">
            <h3 class="card-header">Add brand</h3>
            <div class="card-body">
                <?php
                    $message = Session::get('message');
                    if($message){
                        echo '<span class="text-alert">'.$message.'</span>';
                        Session::put('message',null);
                    }
                ?>
                <form id="form" method="post" action="{{URL::to('add-brand-action')}}">
                    {{ csrf_field() }}
                    <div class="form-group row">
                        <label for="brand_name" class="col-3 col-lg-3 col-form-label text-right">Name</label>
                        <div class="col-5 col-lg-5 mt-1">
                            <input name="brand_name" type="text" placeholder="brand name" class="form-control">
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
                            <button type="submit" name="addBrand" class="btn btn-outline-light">Done</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
