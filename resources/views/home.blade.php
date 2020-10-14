@extends('layouts.app')

@section('content')

<div class="container-fluid ">
          <!-- Nav pills -->
            <ul class="nav nav-pills justify-content-center mt-4" role="tablist">
                <li class="nav-item">
                    <a class="nav-link" data-toggle="pill" href="#home"><i class="fa fa-square" aria-hidden="true"></i></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="pill" href="#menu2"><i class="fa fa-th" aria-hidden="true"></i></a>
                </li>
            </ul>

              <!-- Tab panes -->
              <div class="tab-content">
                <div id="home" class="container-fluid tab-pane active "><br>
                    <div class="row justify-content-center">

                            @foreach($new2 as $news)

                            <div class="card mx-auto custom-card mb-5" id="prova">
                                <div class="row post-header col-12 py-2 px-3">
                                    <div class="col-6 float-left "><h4>{{$news->title}}</h4></div>
                                    <div class="col-6 float-right "><h4 class="text-right">{{$news->User->name}}</h4></div>
                                </div>
{{--                                <a href="{{route('posts.show',['post'=>$news->id])}}">--}}
                                    <img class="card-img" src="{{asset('upload-img/'.$news->img)}}" alt="Card image cap" style="width: 600px">
{{--                                </a>--}}
                                <div class="card-body px-3">
                                    <h5 class="card-title"><i class="far fa-heart"></i></h5>
                                </div>
                                 <div class="row post-header px-3 pb-3">
                                     <div class="col-10 float-left text-left">Likes</div>
                                    <div class="col-10 float-left text-left">{{$news->description}}</div>
                                </div>
                            </div>
                            @endforeach

                    </div>
                </div>

                <div id="menu2" class="container-fluid tab-pane fade"><br>
                    <div class="row ">
                    @foreach($new as $new)
                        <div class="col-md-4 col-sm-6 px-1 my-1 ">
                            <div class="card mx-auto custom-card" id="prova">
                                <div class="row post-header col-12 py-2 px-3">
                                    <div class="col-6 float-left "><h4>{{$new->title}}</h4></div>
                                    <div class="col-6 float-right "><h4 class="text-right">{{$news->User->name}}</h4></div>
                                </div>
                                <img class="card-img" src="{{asset('upload-img/'.$new->img)}}" alt="Card image cap">
                                <div class="card-body px-3">
                                    <h5 class="card-title"><i class="far fa-heart"></i></h5>
                                </div>
                                 <div class="row post-header px-3 pb-3">
                                     <div class="col-10 float-left text-left">Likes</div>
                                    <div class="col-10 float-left text-left">{{$new->description}}</div>
                                </div>
                            </div>
                        </div>
                     @endforeach

                    </div>
                </div>
            </div>
</div>

@endsection