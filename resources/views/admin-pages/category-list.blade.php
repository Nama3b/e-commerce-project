@extends('admin-layout')
@section('content')

<div id="table-manage">
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
        <div class="card table-responsive m-b-30">
            <h3 class="card-header">Category list</h3>
            <a href="{{URL::to('category-add')}}"><button class="btn btn-outline-light ml-4">Add category</button></a>
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
                            <th scope="col">Cat name</th>
                            <th scope="col">Status</th>
                            <th scope="col">Edit</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($category_list as $key => $cat_list)
                        <tr>
                            <td></td>
                            <td>{{$cat_list->category_name}}</td>
                            <td>
                                <?php
                                    if($cat_list->status==0){
                                    ?>
                                        <a href="{{URL::to('/display-category/'.$cat_list->category_id)}}">Hide</a>
                                    <?php
                                    } else{
                                    ?>
                                        <a href="{{URL::to('/hide-category/'.$cat_list->category_id)}}"><span class="text-alert">Display</span></a>
                                <?php
                                    }
                                ?>
                            </td>
                            <td><a href="{{URL::to('/category-edit/'.$cat_list->category_id)}}"><i class="fas fa-edit mr-2"></i></a> <a onclick="return confirm('Are you sure to delete this category?')" href="{{URL::to('/category-delete/'.$cat_list->category_id)}}"><i class="fas fa-trash-alt"></i></a></td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection

