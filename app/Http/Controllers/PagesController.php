<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;
use Illuminate\Support\Facades\Hash;

class PagesController extends Controller
{
    public function index(){
        return view('index');
    }

    public function check(Request $request){
       
        //validate inputs
        $request->validate([
            'username' => 'required',
            'password' => 'required|min:5|max:12'
        ]);
        
        $user = User::where('username', '=', $request->username)->first();
        if($user){
            if(Hash::check($request->password, $user->password)){
                $request->session()->put('loggedUser', $user->id);
                //dd('going to ladning page = '. $user->id);
                return redirect('dashboard');
                //return session('loggedUser');
            }else{
                return back()->with('fail', 'Invalid Password');
            }
        }else{
            return back()->with('fail', "<strong>" . $request->username . '</strong> email not found');
        }

    }

     public function dashBoard(){
        if(session()->has('loggedUser')){
            $user = User::where('id', '=', session('loggedUser'))->first();
            $data = [
                'loggedUserInfo' => $user
            ];
        }
        return view('dashboard.dashboard', $data);
    }

    public function logout(){
        if(session()->has('loggedUser')){
            session()->pull('loggedUser');
            return redirect('index');
        }
        return redirect('/');
    }
}
