
@extends('layouts.master')
@section('title','Add Post')
@section('content')

<!-- Modal -->
<div class="modal fade deletePostModal " id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <form action="{{url('admin/delete-post/')}}" method="POST">
                @csrf
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Delete this Post</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="post_delete_id" id="post_id">
                    <h5>Are you sure you want to delete this post ?</h5>    
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-danger">Yes Delete</button>
                </div>
            </form>
           
        </div>
    </div>
</div>
<!-- End Modal -->

<div class="container-fluid px-4">
<div class="card mt-4">
  
    <div class="card-header">
        <h4>
            view post
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
                                <th>Category</th>
                                <th>Post Name</th>
                                <th>Status</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>
                    </thead>

                    <tbody>
                            @foreach ($posts as $item)
                            <tr>
                                <td>  {{$item->id}}  </td>
                                <td>  {{$item->category->name}}  </td>
                                <td>  {{$item->name}}  </td>
                                <td>  {{$item->status== '1' ? 'Hidden':'Visible'}}  </td>
                                <td>
                                    <a href="{{url('admin/post/'.$item->id)}}" class="btn btn-success">Edit</a>
                                </td>
                                <td>
                                    <button type="button" value="{{$item->id}}"  class="btn btn-danger deletePostBtn">Delete</a>
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
@section('scripts')
<script>
    $(document).ready(function () {
        // $('.deleteCategoryBtn').click(function (e) {
                   
            // });
            $(document).on('click','.deletePostBtn', function (e) {
         

            e.preventDefault();
            var post_id = $(this).val();
            $('#post_id').val(post_id)
            $("#deleteModal").modal("show");
        });
    });
</script>
@endsection