@extends('layouts.app')

@section('content')

<div class="container-fluid ">

         <h2 class=" text-uppercase mt-5 mb-4">
            Search result : {{$search}}
        </h2>

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

                            @foreach($posts as $post)

                            <div class="card mx-auto custom-card mb-5" id="prova">
                                <div class="row post-header col-12 py-2 px-3">
                                    <div class="col-6 float-left "><h4>{{$post->title}}</h4></div>
                                        <div class="col-6 float-right ">
                                            <a href="{{route('profile.show',$post->User->id)}}">
                                                <h4 class="text-right">{{$post->User->name}}</h4>
                                           </a>
                                        </div>

                                </div>
{{--                                <a href="{{route('posts.show',['post'=>$post->id])}}">--}}
                                    <img class="card-img" src="{{asset('upload-img/'.$post->img)}}" alt="Card image cap" style="width: 600px">
{{--                                </a>--}}
                                             {{$post->Like}}
                                        {{$post->Post}}
                                <div class="card-body px-3">
                                    <form method="POST" action="{{ route('likes.update',$post->id)  }}">
                                        @csrf
                                        @method('PUT')

                                        <input type="hidden" name="post_id" id="status"  value="{{$post->id}}">
                                         <input type="hidden" name="status" id="status"  value="1">
                                        <button  type="submit"><i class="far fa-heart"></i></button>
                                    </form>
                                </div>
                                 <div class="row post-header px-3 pb-3">
                                     <div class="col-10 float-left text-left">Likes</div>
                                    <div class="col-10 float-left text-left">{{$post->description}}</div>
                                </div>
                            </div>
                            @endforeach

                    </div>
                </div>

                <div id="menu2" class="container-fluid tab-pane fade"><br>
                    <div class="row ">
                    @foreach($posts2 as $post)
                        <div class="col-md-4 col-sm-6 px-1 my-1 ">
                            <div class="card mx-auto custom-card" id="prova">
                                <div class="row post-header col-12 py-2 px-3">
                                    <div class="col-6 float-left "><h4>{{$post->title}}</h4></div>
                                    <div class="col-6 float-right ">
                                        <a href="{{route('profile.show',$post->User->id)}}">
                                                <h4 class="text-right">{{$post->User->name}}</h4>
                                           </a>
                                    </div>
                                </div>
                                <img class="card-img" src="{{asset('upload-img/'.$post->img)}}" alt="Card image cap">
                                <div class="card-body px-3">
                                    <h5 class="card-title"><i class="far fa-heart"></i></h5>
                                </div>
                                 <div class="row post-header px-3 pb-3">
                                     <div class="col-10 float-left text-left">Likes</div>
                                    <div class="col-10 float-left text-left">{{$post->description}}</div>
                                </div>
                            </div>
                        </div>
                    @endforeach

                    </div>
                </div>
            </div>
</div>

@endsection
