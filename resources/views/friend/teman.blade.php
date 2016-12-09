@extends('layouts.app')
@section('content')

    <div class="container">
        {{--<div class="row">--}}
            <div class="col-md-6 col-md-offset-3">
                <div class="panel panel-default">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead class="center">
                            <h1>Friends {{$us->name}}</h1>
                                <tr>
                                    <th width="1px">no</th>
                                    <th>nama</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $i=1;
                                ?>
                                @foreach($users as $user)
                                    <tr>
                                        <td width="1pt">{{$i}}</td>
                                        <td width="12px">{{$user->name}}</td>

                                   </tr>
                                    <?php
                                    $i++;
                                    ?>
                                    @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            {{--</div>--}}
        </div>
    </div>
    @endsection