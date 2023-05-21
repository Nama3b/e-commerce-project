@extends('admin-layout')
@section('content')

<div id="table-manage">
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
        <div class="card table-responsive m-b-30">
            <h3 class="card-header">Order waiting list</h3>
            <a href="{{URL::to('order-done')}}"><button class="btn btn-outline-light ml-4">Order done</button></a>
            <div class="card-body">
                <table id="" class="table table-bordered table-hover">
                    <thead>
                        <tr class="table-header">
                            <th scope="col">#</th>
                            <th scope="col">Client</th>
                            <th scope="col">Email</th>
                            <th scope="col">Address</th>
                            <th scope="col">Phone</th>
                            <th scope="col">Time</th>
                            <th scope="col">Status</th>
                            <th scope="col">Edit</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($order_waiting_list as $key => $waiting_list)
                        <tr>
                            <td></td>
                            <td>{{$waiting_list->client_name}}</td>
                            <td>{{$waiting_list->email}}</td>
                            <td>{{$waiting_list->address}}</td>
                            <td>{{$waiting_list->phone}}</td>
                            <td>{{$waiting_list->datecreate}}</td>
                            <td> <a href="{{URL::to('/cancel-order/'.$waiting_list->product_id)}}"><span class="text-alert">Cancel</span></a> <a href="{{URL::to('/approve-order/'.$waiting_list->product_id)}}">Approve</a>
                            </td>
                            <td><a href="{{URL::to('/order-detail/'.$waiting_list->product_id)}}"><i class="fas fa-edit mr-2"></i></a> <a onclick="return confirm('Are you sure to delete this order?')" href="{{URL::to('/product-delete/'.$waiting_list->product_id)}}"><i class="fas fa-trash-alt"></i></a></td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection

