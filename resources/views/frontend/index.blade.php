@extends('layouts.app')

@section('title',"$setting->meta_title")
@section('meta_description',"$setting->meta_description")
@section('meta_keyword',"$setting->meta_keyword")

@section('content')


<div class="bg-danger py-5">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="owl-carousel category-carousel owl-theme">
                  @foreach ($all_categories as $all_cate_item)
                  <div class="item">
                    <a class="text-decoration-none" href="{{url('tutorial/'.$all_cate_item->slug)}}">
                        <div class="card">
                            <img height="250px" src="{{asset('uploads/category/'.$all_cate_item->image)}}" alt="Image">
                            <div class="card-body text-center">
                                <h5>{{$all_cate_item->name}}</h5>
                        
                            </div>
                        </div>
                    </a>
                   </div> 
                  @endforeach
                 
                </div>
            </div>
        </div>
    </div>
</div>

<div class="py-1 bg-gray">
    <div class="container">
        <div class="border text-center p-3">
            <h3>Advertise</h3>
        </div>
    </div>
</div>

<div class="py-5">
    <div class="container">
        <div class="cil-md-12">
            <h4>HLE IT</h4>
            <div class="underline">
            </div>
                <p>
                    Lorem ipsum dolor sit amet consectetur, adipisicing elit. Nulla enim aspernatur eveniet nesciunt voluptates laudantium repudiandae aliquid esse eius, cupiditate ullam doloremque dignissimos autem molestiae laborum corporis. Earum, natus nisi?
                    Lorem ipsum dolor sit amet consectetur, adipisicing elit. Nulla enim aspernatur eveniet nesciunt voluptates laudantium repudiandae aliquid esse eius, cupiditate ullam doloremque dignissimos autem molestiae laborum corporis. Earum, natus nisi?        
                </p>
         
        </div>
    </div>
</div>


<div class="py-5 bg-gray">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h4>All Categories List</h4>
                <div class="underline">
                </div> 
            </div>

            @foreach ($all_categories as $all_cate_item)
            <div class="col-md-3">
                <div class="card card-body mb-3">
                    <a href="{{url('tutorial/'.$all_cate_item->slug)}}" class="text-decoration-none">
                        <h5 class="text-dark mb-0 ">{{$all_cate_item->name}}</h5>
                    </a>
                    
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>

<div class="py-5 bg-white">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h4>Latest Posts</h4>
                <div class="underline">
                </div> 
            </div>

            <div class="col-md-8">
                @foreach ($latest_posts as $latest_post_item)
             
                    <div class="card card-body mb-3 bg-gray shadow">
                        <a class="text-dark text-decoration-none" href="{{url('tutorial/'.$latest_post_item->category->slug.'/'.$latest_post_item->slug)}}" class="text-decoration-none">
                            <h5 class="text-dark mb-3 ">{{$latest_post_item->name}}</h5>
                      
                        <h6>Posted On: {{$latest_post_item->created_at->format('d-m-Y')}}</h6>
                        <span class="ms-3 float-end">Posted By: {{$latest_post_item->user->name}}<span>
                        </a>
                    </div>
               
                @endforeach
            </div>

            <div class="col-md-4">
                <div class="border text-center p-3">
                    <h3>Advertise</h3>
                </div>
            </div>


         
        </div>
    </div>
</div>

@endsection