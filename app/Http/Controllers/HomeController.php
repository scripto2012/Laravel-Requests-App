<?php

namespace App\Http\Controllers;

use App\Models\Ask;
use App\Models\User;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home', ['asks' => Ask::where('user_id',$user = auth()->user()->id)->get()]);
    }

    public function store(Request $request)
    {
        $data = $request->all();

        $filename = $data['file']->getClientOriginalName();

        //Сохраняем оригинальную картинку
        $data['file']->move(Storage::path('/public/image/asks/').'origin/',$filename);

        $thumbnail = Image::make(Storage::path('/public/image/asks/').'origin/'.$filename);
        $thumbnail->fit(300, 300);
        $thumbnail->save(Storage::path('/public/image/asks/').'thumbnail/'.$filename);



        //Сохраняем новость в БД
        $data['file'] = $filename;
        Ask::create($data);

        return redirect()->route('home');
    }
}
