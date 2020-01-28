<?php

namespace App\Http\Controllers;

use App\User;
use App\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Lib\PusherFactory;
use DB;

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
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::where('id', '!=', Auth::user()->id)->get();

        return view('home', compact('users'));
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $users = User::where('id', '!=', Auth::user()->id)->get();
        $msg = Message::where('from_user', '!=', Auth::user()->id)->first();

        foreach ($users as $key => $value) {
                
            $value->content = '';
            $value->time = '';        
            $msg = Message::where('from_user', '!=', $value->id)->orderBy('created_at', 'desc')->first();
            if (isset($msg) and !empty($msg)) {
                $value->content = $msg->content;
                $value->time = $msg->created_at;
            }
        }

        return view('chat', compact('users'));
    }
}
