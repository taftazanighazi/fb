@extends('layouts.app')
@section('content')


    <div class="container">
        <div class="row">
            <div class="col-md-offset-3 col-sm-4 col-xs-12">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h4>Posting status baru</h4>
                    </div>
                    <form action="{{route('posting.store')}}" method="POST">
                        {{csrf_field()}}
                        <div class="panel-body">
                            <textarea class="form-control" name="tulis" placeholder="tulis status anda " maxlength="140"></textarea>
                            </br>
                            <button type="submit" class="btn btn-primary" >Post</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

@endsection
