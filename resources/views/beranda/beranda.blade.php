@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row" >
            <div class="col-md-3 col-sm-4 col-xs-12">
                <div class="thumbnail">
                    <img src="http://placehold.it/200X200" alt="">
                    <div class="caption">
                        <h3 align="center">{{$user->name}}</h3>

                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-sm-4 col-md col-xs-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4>Posting status baru</h4>
                    </div>
                    <form action="{{route('beranda.store')}}" method="POST">
                        {{csrf_field()}}
                        <div class="panel-body">
                            <textarea class="form-control" name="tulis" placeholder="Tulis status anda " maxlength="140"></textarea>
                            </br>
                            <button type="submit" class="btn btn-primary" >Post</button>
                        </div>
                    </form>
                </div>
                {{--</div>--}}
                {{--</br>--}}

                {{--<div class="col-md-4 offset-3 col-sm-4 col-xs-12">--}}

                @foreach($postings as $posting)
                    <div id="microposts" class="feed">

                        <div class="micropost">
                            <div class="content">
                                <div class="media-left">
                                    <img class="media-object" src="http://placehold.it/80x80" alt="img/avatar.png">
                                </div>
                                <div class="media-body">
                                    <span class="name"><a href="{{url('user/'.$posting->user->id)}}"> <p style="padding-left: 4px;">{{$posting->user-> name}}</p></a></span>

                                    <div class="post">  <p style="padding-left:4px;">{{$posting->isi}}</p></div>
                                </div>
                                {{--<div class="media-right">--}}
                                {{--<span>4 mins</span>--}}
                                {{--</div>--}}
                            </div>

                        </div>

                    </div>
                @endforeach
            </div>

            <div class="col-md-3 offset-2 col-sm-4 col-xs-12">
                <div class="panel panel-default kolom" >
                    <div class="panel-heading">
                        <h4> Rekomendasi Teman</h4>
                    </div>
                    <div class="list-group">
                        @foreach($gets as $get)
                            <ul class="list-group">
                                <a href="{{url('user/'.$get->id)}}">
                                    <li class="list-group-item" style="padding-left: 2px; font-size: 20px;"> {{$get->name}}</li></a>
                            </ul>
                        @endforeach
                    </div>
                </div>

            </div>
        </div>

    </div>

    </div>
@endsection
`