<?php

namespace App\Http\Controllers;

use App\Mail\VolunteerRegister;
use App\Models\Volunteer\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class VolunteerController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('pages.volunteer.index',compact('users'));
    }
    public function create()
    {
        
    }
    public function store(Request $request)
    {
        Mail::to(["email"=>"kamaluddin.arsyad17@gmail.com"])->send(new VolunteerRegister("kamaluddin.arsyad17@gmail.com","GATYUGAJDYU"));
        // return view('mail.volunteer.register');
    }
    public function show(string $id)
    {
        
    }
    public function edit(string $id)
    {
        
    }
    public function update(Request $request, string $id)
    {
        
    }
    public function destroy(string $id)
    {
        
    }
    public function login()
    {
        return view('pages.admin');
    }
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect("https://berbagibitesjogja.site");
    }
    public function authenticate(Request $request){
        $ceredentials = $request->validate([
            "email"=>'required',
            "password"=>'required',
        ]);
        if(Auth::attempt($ceredentials)){
            $request->session()->regenerate();
            return redirect()->intended('/donation');
        }
        return back()->withErrors(["error"=>'gagal']);
    }
}
