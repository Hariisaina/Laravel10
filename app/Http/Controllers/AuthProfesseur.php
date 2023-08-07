<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AuthProfesseur extends Controller
{
    public function login_professeur()
    {
        return view('auth.login');
    }

    public function loginEns (Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:5|max:12',
        ]);

        $user = User::where('email', '=', $request->email)->first();

        if ($user) {
            if (Hash::check($request->password, $user->password)) {
                $request->session()->put('loginId', $user->id);
                return redirect('/dashboard_prof');
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
        return view('dashboard_prof', compact('data'));
    }
}
