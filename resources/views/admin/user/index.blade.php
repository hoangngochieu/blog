
@extends('layouts.master')
@section('title','View Users')
@section('content');


<div class="container-fluid px-4">
<div class="card mt-4">
  
    <div class="card-header">
        <h4>
            view user
            <a href="{{url('admin/add-post')}}" class="btn btn-primary float-end">Add Post</a>
        </h4>
    </div>
    <div class="card-body">

        @if(session('message'))
        <div class="alert alert-success">{{session('message')}}</div>
       @endif
       <div class="table-responsive">
                <table id="myDataTable" class="table table-bordered">
                    <thead>
                            <tr>
                                <th>ID</th>
                                <th>User name</th>
                                <th> Email</th>
                                <th>Status</th>
                                <th>Edit</th>
                            </tr>
                    </thead>

                    <tbody>
                        @foreach ($users as $item)
                        <tr>
                            <td>  {{$item->id}}  </td>
                            <td>  {{$item->name}}  </td>
                            <td>  {{$item->email}}  </td>
                            <td>  {{$item->role_as== '1' ? 'Admin':'User'}}  </td>
                            <td>
                                <a href="{{url('admin/user/'.$item->id)}}" class="btn btn-success">Edit</a>
                            </td>
                            
                        </tr> 
                        @endforeach
                        
                    </tbody>
                </table>
       </div>
    </div>
</div>
</div>
@endsection