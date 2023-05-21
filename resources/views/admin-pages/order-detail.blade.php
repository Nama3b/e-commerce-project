@extends('admin-layout')
@section('content')

<div id="table-manage">
    <div class="col-12">
        <div class="card">
            <h3 class="card-header">Edit order detail</h3>
            <div class="card-body">
                <h5>Client information</h5>
                <table class="table table-bordered table-hover" id="order_detail_data">
                    <thead>
                        <tr class="table-header">
                            <th scope="col">Client name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Address</th>
                            <th scope="col">Phone</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="table-body">
                            <td>{{$order_item->client_fullname}}</td>
                            <td>{{$order_item->client_email}}</td>
                            <td>{{$order_item->client_address}}</td>
                            <td>{{$order_item->client_phonenumber}}</td>
                        </tr>
                    </tbody>
                </table>
                <hr>
                <h5>Shipping information</h5>
                <table class="table table-bordered table-hover" id="order_detail_data">
                    <thead>
                        <tr class="table-header">
                            <th scope="col">Client name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Address</th>
                            <th scope="col">Phone</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="table-body">
                            <td>{{$order_item->client_name}}</td>
                            <td>{{$order_item->email}}</td>
                            <td>{{$order_item->address}}</td>
                            <td>{{$order_item->phonenumber}}</td>
                        </tr>
                    </tbody>
                </table>
                <hr>
                <h5>Order information</h5>
                <table class="table table-bordered table-hover" id="order_detail_data">
                    <thead>
                        <tr class="table-header">
                            <th scope="col">Product</th>
                            <th scope="col">Price</th>
                            <th scope="col">Quantity</th>
                            <th scope="col">Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="table-body">
                            <td>{{$order_item->product_name}}</td>
                            <td>{{$order_item->total}}</td>
                            <td>{{$order_item->quantity}}</td>
                            <td>{{$order_item->total}}</td>
                            </tr>
                    </tbody>
                </table>
                <hr>
                <form action="" method="post">
                    <p class="text-right">
                        <button type="submit" name="verifyOrder" class="btn btn-outline-light">Verify order</button>
                    </p>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection

