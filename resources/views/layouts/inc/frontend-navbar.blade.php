<div class="global-navbar bg-white">
    <div class="container">
        <div class="row">
            <div class="col-md-3 d-none  d-sm-none d-md-inline">
               @php
                   $setting = App\Models\Setting::all()->first();
               @endphp
               @if ($setting)
               <img id="img1" class="" style="height: 70px; width:230px" src="{{asset('uploads/settings/'.$setting->logo)}}" alt="logo">
               @endif
         
            </div>

            <div class="col-md-9 my-auto">
              <div class=" border text-center p-3">
                <h5>Advertise Here</h5>   
              </div>
                
            </div>
        </div>
    </div>

  </div>

<div class="sticky-top">

  <nav class="navbar navbar-expand-lg navbar-dark bg-green">
    <div class="container">

      <a class="navbar-brand d-inline d-sm-inline d-md-none " href="#">
          <img id="img1" style="width:50px; height:50px" src="{{asset('uploads/settings/'.$setting->logo)}}" alt="logo">
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="{{url('/')}}">Home</a>
          </li>
        
          {{-- <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Dropdown
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
              <li><a class="dropdown-item" href="#">Action</a></li>
              <li><a class="dropdown-item" href="#">Another action</a></li>
              <li><hr class="dropdown-divider"></li>
              <li><a class="dropdown-item" href="#">Something else here</a></li>
            </ul>
          </li> --}}
          @php
            $categories = App\models\Category::where('navbar_status','0')->where('status','0')->get();
          @endphp
          @foreach ($categories as $cateitem)
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="{{url('/blog/'.$cateitem->slug)}}">{{$cateitem->name}}</a>
            </li>
          @endforeach

          @if (Auth::check())
            
            <li class="nav-item ">
              <a class="nav-link active" type="button" class="dropdown-item"  onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                  Logout
              </a>
              <form id="logout-form" action="{{  route('logout')  }}" method="POST" class="d-none">
                  @csrf
              </form>
            </li>
          @else

            <li class="nav-item ">
              <a href="{{url('login')}}" class="nav-link active" type="button" class="dropdown-item"  >
                  Login
              </a>
              
        
              
          @endif
       

        </ul>
      
      </div>
    </div>
  </nav>
</div>