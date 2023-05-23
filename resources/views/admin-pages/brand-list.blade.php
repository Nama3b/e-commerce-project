@extends('admin-layout')
@section('content')

<div id="table-manage">
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
        <div class="card table-responsive m-b-30">
            <h3 class="card-header">Brand list</h3>
            <a href="{{URL::to('brand-add')}}"><button class="btn btn-outline-light ml-4">Add brand</button></a>
            <div class="card-body">
                <?php
                    $message = Session::get('message');
                    if($message){
                        echo '<span class="text-alert">'.$message.'</span>';
                        Session::put('message',null);
                    }
                ?>
                <table id="book_data" class="table table-bordered table-hover">
                    <thead>
                        <tr class="table-header">
                            <th scope="col">#</th>
                            <th scope="col">Brand name</th>
                            <th scope="col">Status</th>
                            <th scope="col">Edit</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($brand_list as $key => $bra_list)
                        <tr>
                            <td></td>
                            <td>{{$bra_list->brand_name}}</td>
                            <td>
                                <?php
                                    if($bra_list->status==0){
                                    ?>
                                        <a href="{{URL::to('/display-brand/'.$bra_list->brand_id)}}">Hide</a>
                                    <?php
                                    } else{
                                    ?>
                                        <a href="{{URL::to('/hide-brand/'.$bra_list->brand_id)}}"><span class="text-alert">Display</span></a>
                                <?php
                                    }
                                ?>
                            </td>
                            <td><a href="{{URL::to('/brand-edit/'.$bra_list->brand_id)}}"><i class="fas fa-edit mr-2"></i></a> <a onclick="return confirm('Are you sure to delete this brand?')" href="{{URL::to('/brand-delete/'.$bra_list->brand_id)}}"><i class="fas fa-trash-alt"></i></a></td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection

