@extends('layouts.app')

@section('content')

                <div id="home" class="container-fluid tab-pane active "><br>
                    <div class="row justify-content-center">

                            <div class="card mx-auto custom-card mb-5" id="prova">
                                <div class="row post-header col-12 py-2 px-3">
                                    <div class="col-6 float-left "><h4>{{$post->title}}</h4></div>
                                </div>
                                    <img class="card-img" src="{{asset('upload-img/'.$post->img)}}" alt="Card image cap" style="width: 600px">
                                <div class="card-body px-3">
                                    <h5 class="card-title"><i class="far fa-heart"></i></h5>
                                </div>
                                 <div class="row post-header px-3 pb-3">
                                     <div class="col-10 float-left text-left">Likes</div>
                                    <div class="col-10 float-left text-left">{{$post->description}}</div>
                                    <div class="col-1 float-right text-right"><i class="fa fa-ellipsis-v" aria-hidden="true"></i></div>
                                </div>
                            </div>

                    </div>
                </div>

@endsection
