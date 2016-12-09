<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Friend;
use App\User;
use App\Http\Requests;
use DB;

class FriendController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
//    $friends = Friend::where('user_id',\Auth::user()->id)->get();
////        dd($users);
//        foreach ($friends as $friend){
//            $friends1[] = $friend->friend_id;
//
//        }
//        $gets = User::whereNotIN('id',$friends1)->where('id','!=',\Auth::user()->id)->get();
        $us = \Auth::user();// variabel us menampung user yang aktfi

        $users = DB::table('users')->join ('users_friends','users.id','=','users_friends.friend_id')
                ->where('users_friends.user_id','=',\Auth::user()->id)->get();
        // menampilkan nama teman si user yang aktif yang sudah di add
//        dd($users);
       return view('friend.teman',compact('users','us'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
//        dd(auth()->user());
//        $friends = new Friend();
//        $user = \Auth::user();
        $friend = new Friend();
        $friend->friend_id = $request->friend_id;// memasukkan nilai ke kolom firend_id dari friend_id yang diambil dari input type hidden
        $friend->user_id = auth()->user()->id;// memasukkan  nilaik ke kolom user_id dimana isinya user_id si user yang sedang aktif
        $friend->save();

        $friend2 = new Friend();
        $friend2->friend_id = auth()->user()->id; // memasukkan nilai ke kolom friend_id dimana isinya user_id si user yang aktif
        $friend2->user_id = $request->friend_id;// memasukkan nilai ke kolom firend_id dari friend_id yang diambil dari input type hidden
        $friend2->save();
//        $user->friends()->attach($request->user_id);
//        $use->friends()->attach($request->friend_id);

//        $user->friends()->attach($request->friend_id);
//      $request->user()->friends()->save($friend);


        return redirect('/teman');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
