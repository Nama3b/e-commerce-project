@extends('admin-layout')
@section('content')

<div id="table-manage">
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
        <div class="card table-responsive m-b-30">
            <h3 class="card-header">Client user manage</h3>
            <div class="card-body">
                <?php
                    $message = Session::get('message');
                    if($message){
                        echo '<span class="text-alert">'.$message.'</span>';
                        Session::put('message',null);
                    }
                ?>
                <table id="" class="table table-bordered table-hover">
                    <thead>
                        <tr class="table-header">
                            <th scope="col">#</th>
                            <th scope="col">Client</th>
                            <th scope="col">Email</th>
                            <th scope="col">Address</th>
                            <th scope="col">Phone</th>
                            <th scope="col">Avatar</th>
                            <th scope="col">Status</th>
                            <th scope="col">Edit</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($client_user_manage as $key => $client_manage)
                        <tr>
                            <td></td>
                            <td>{{$client_manage->client_fullname}}</td>
                            <td>{{$client_manage->client_email}}</td>
                            <td>{{$client_manage->client_address}}</td>
                            <td>{{$client_manage->client_phonenumber}}</td>
                            <td><img src="public/uploads/avatar/{{$client_manage->avatar}}" alt="" width="100px" height="70px"></td>
                            <td>
                                <?php
                                    if($client_manage->status==1){
                                    ?>
                                        <a href="{{URL::to('/unactive-client/'.$client_manage->client_id)}}"><span class="text-alert">Acitve</span></a>
                                    <?php
                                    } else{
                                    ?>
                                        <a href="{{URL::to('/active-client/'.$client_manage->client_id)}}">Unactive</a>
                                <?php
                                    }
                                ?>
                            </td>
                            <td><a onclick="return confirm('Are you sure to delete a client?')" href="{{URL::to('/client-delete/'.$client_manage->client_id)}}"><i class="fas fa-trash-alt"></i></a></td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection

