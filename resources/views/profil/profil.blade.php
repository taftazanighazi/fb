@extends('layouts.app')
@section('content')
    <div class="container">
      <div class="card-wrap">
          <div class="profile_pic-wrap">
              {{--<img src="https://scontent-sit4-1.cdninstagram.com/t51.2885-19/s150x150/11934839_1260747793954371_1742483686_a.jpg" alt="" />--}}
          </div>
          <div class="info-wrap">
              <div class="media-object">
                  <img src="http://placehold.it/140x140">
              </div>

              <h4>{{$user->name}}</h4>
              <p>Web developer</p>
              @if(Auth::user()->id!=$user->id)
              {{--@if(!empty($friends))--}}
            @if(empty($checks))
                  <form action="{{route('teman.store')}}" method="POST">
                      <input type="hidden" name="friend_id" value="{{$user->id}}">
                      {{--<input type="hidden" name="friend_id" value="{{$friend>friend_id}}">--}}

                      {{csrf_field()}}
                      <button type="submit" class="btn btn-primary">Add</button>
                  </form>
              @endif
              @endif

          </div>
      </div>
    </div>
@endsection
