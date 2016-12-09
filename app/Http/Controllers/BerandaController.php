<?php

    namespace App\Http\Controllers;

    use App\Friend;
    use App\Posting;
    use App\User;
    use Illuminate\Http\Request;
    use DB;

    class BerandaController extends Controller
    {
        /**
         * Display a listing of the resource.
         *
         * @return \Illuminate\Http\Response
         */
        public function index()
        {
            $user = \Auth::user();// variabel user menampung user yang sedang diaktif
            $users = $user->friends()->get()->pluck('id');// mengambil id dari friends yang punya relasi dengan tabel user
            //atau mengambil id temannya si user yang aktif
            $postings = Posting::with('user')->whereIn('user_id', $users)->orderBy('created_at', 'desc')->groupBy('user_id')->get();
           //  mengambil postingann temannya si user yang aktif
            //$postings->load   ('user');// ngambil data semua posting baru di load usernya(relasi load user)
            $post_user = Posting::with('user')->whereUserId($user->id)->orderBy('created_at', 'desc')->get();
            // mengambil postingan si user yang aktif diurutkan dari yang terbaru ke yang sebelumnya
            $postings = $postings->merge($post_user)->sortByDesc('created_at');
            // menggabungkan hasil query postings dan post_user  diurutkan berdasarkan tanggal saat itu
//            dd($postings);

            $datas = Friend::where('user_id' ,\Auth::user()->id)->get();// memilih tabel yang ada di kelas friend dimana user_id= id user yang saat ini aktif
            // mendapatkan  user_id     yang berteman dengan si user yang aktif
//            dd($datas);


                    foreach ($datas as $data)// perulangan untuk menampung data
                    {
                        $friends[] = $data->friend_id; // data friend_id ditampung di array dalam variabel friends
                    }
            if (!empty($friends)){// jika ada user  lain yang belum bertemen dengan si user yang aktif

                    $gets = User::whereNotIn('id', $friends)->where('id', '!=', \Auth::user()->id)->get(); // memilih tabel yang ada di klas User dimana  bukan yang termasuk yang di variabel friends dan dimana bukan termasuk user_id yang sedang aktif saat ini
//                   dd($gets);
                    // mendapatkan user yang lain yang belum berteman dengan si user yang aktif


//            dd($postings);

            }
              else{// sebaliknya jika belum pernah berteman dengan siapapun
                $gets = User::where('id','!=', \Auth::user()->id)->get();
                  // mendapatkan semua user kecuali si user yang aktif
               }
            return view('beranda.beranda', compact('user', 'postings', 'gets'));

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
            $posting = new Posting();
            $posting->user_id = \Auth::user()->id;
            $posting->isi = $request->tulis;
            $posting->save();
            return back();
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
