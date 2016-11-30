@extends('layouts.app')
@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-4 col-sm-4 col-xs-12">
                <div class="kolom">
                    <h3>{{$user->name}}</h3>
                    @if(Auth::guest())
                        <button type="submit" class="btn btn-primary">Add</button>
                    @endif
                </div>
            </div>
            <div class="col-md-6 offset-3 col-sm-4 col-xs-12">
                @foreach($users as $user)
                    <div class="col-md-12">
                        <div class="kolom1">
                            <a href="{{url('user/'.$user->id)}}"> <p class="user">{{$user-> name}}</p></a>
                            <hr class="style13"></hr>

                            @foreach($user->postings as $posting)
                            <p class="user">{{$posting->isi}}</p>
                            @endforeach
                        </div>
                 </div>
                @endforeach
            </div>
        </div>
    </div>
    @endsection
`