<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\HttpFoundation\Session\Session;

class AuthController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }

    public function registration()
    {
        return view('auth.registration');
    }

    public function registerUser(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:5|max:12',
        ]);

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);

        $res = $user->save();

        if ($res) {
            return back()->with([
                'success' => 'Vous avez été enregistré avec succès',
            ]);
        } else {
            return back()->withInput([
                'fail' => 'Une erreur s\'est produite',
            ]);
        }
    }

    public function loginUser(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:5|max:12',
        ]);

        $user = User::where('email', '=', $request->email)->first();

        if ($user) {
            if (Hash::check($request->password, $user->password)) {
                $request->session()->put('loginId', $user->id);
                return redirect('/dashboard_admin');
            } else {
                return back()->with('fail', 'Le mot de passe ne correspond pas.');
            }
        } else {
            return back()->with('fail', 'Cet e-mail n\'est pas enregistré.');
        }
    }

    public function dashboard()
{
    $data = [];
    if (session()->has('loginId')) {
        $data = User::where('id', '=', session()->get('loginId'))->first();
    }
    return view('dashboard_admin', compact('data'));
}




}

