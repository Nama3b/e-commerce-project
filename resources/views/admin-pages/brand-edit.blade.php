@extends('admin-layout')
@section('content')

<div id="table-manage">
    <div class="container">
        <div class="card">
            <h3 class="card-header">Edit brand</h3>
            <div class="card-body">
                <?php
                    $message = Session::get('message');
                    if($message){
                        echo '<span class="text-alert">'.$message.'</span>';
                        Session::put('message',null);
                    }
                ?>
                @foreach($brand_edit as $key => $bra_edit)
                <form id="form" method="post" action="{{URL::to('/brand-update/'.$bra_edit->brand_id)}}">
                    {{ csrf_field() }}
                    <div class="form-group row">
                        <label for="brand_name" class="col-3 col-lg-3 col-form-label text-right">Name</label>
                        <div class="col-5 col-lg-5 mt-1">
                            <input name="brand_name" type="text" value="{{$bra_edit->brand_name}}" placeholder="Brand name" class="form-control">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-3 col-lg-3"></label>
                        <div class="col-8 col-lg-8">
                            <button type="submit" name="addBrand" class="btn btn-outline-light">Done</button>
                        </div>
                    </div>
                </form>
                @endforeach
            </div>
        </div>
    </div>
</div>

@endsection
