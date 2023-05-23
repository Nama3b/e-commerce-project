@extends('admin-layout')
@section('content')

<div id="table-manage">
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
        <div class="card table-responsive m-b-30">
            <h3 class="card-header">Order list</h3>
            <a href="{{URL::to('order-done')}}"><button class="btn btn-outline-light ml-4">Order done</button></a>
            <div class="card-body">
                <table id="" class="table table-bordered table-hover">
                    <thead>
                        <tr class="table-header">
                            <th scope="col">#</th>
                            <th scope="col">Client</th>
                            <th scope="col">Total</th>
                            <th scope="col">Status</th>
                            <th scope="col">Edit</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($order_list as $key => $or_list)
                        <tr>
                            <td></td>
                            <td>{{$or_list->client_fullname}}</td>
                            <td>{{$or_list->total}}</td>
                            <td>{{$or_list->status}}</td>
                            <td>
                                <?php
                                    if($or_list->status==1){
                                    ?>
                                        <a href="{{URL::to('/cancel-order/'.$or_list->order_id)}}"><span class="text-alert">Cancel</span></a>
                                    <?php
                                    } else{
                                    ?>
                                        <a href="{{URL::to('/approve-order/'.$or_list->order_id)}}">Approve</a>
                                <?php
                                    }
                                ?>
                            </td>
                            <td><a href="{{URL::to('/order-detail/'.$or_list->order_id)}}"><i class="fas fa-edit mr-2"></i></a> <a onclick="return confirm('Are you sure to delete this order?')" href="{{URL::to('/product-delete/'.$or_list->order_id)}}"><i class="fas fa-trash-alt"></i></a></td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection

