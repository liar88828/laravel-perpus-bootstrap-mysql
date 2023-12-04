<?php

namespace App\Http\Controllers;

use App\Models\Anggota;
use App\Models\User;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;
use JetBrains\PhpStorm\NoReturn;

class AuthController extends Controller
{

    // Show Login Form
    public function login()
    {
        return view('auth.login');
    }

    // Show Login Form
    public function profile()
    {


        if (Auth::check()) {
            $users = auth()->user();
            $id = $users->id;

            if ($users->role === 'anggota') {
                $datas = DB::table('users')
                    ->join('anggotas', 'users.id', '=', 'anggotas.id_user')
                    ->where('users.id', '=', $id)
                    ->select('users.email', 'anggotas.*')
                    ->first();
//                dd($datas);
                return view('auth.profile',
                    ['datas' => $datas]);
            } else {
                $datas = DB::table('users')
                    ->join('petugas', 'users.id', '=', 'petugas.id_user')
                    ->where('id', '=', $id)
                    ->select('users.email', 'anggotas.*')
                    ->first();
                return view('auth.profile',
                    ['datas' => $datas]);
            }
        }
    }

    // Show Login Form
    public function register()
    {
        return view('auth.register');
    }

    // Create New User/register
    public function store(Request $request)
    {
        $formFields = $request->validate([
            'nama' => ['required', 'min:3'],
            'alamat' => ['required', 'min:3'],
            'no_tlp' => ['required', 'min:3'],
            'jenis_kelamin' => ['required', 'min:3'],
            'email' => ['required', 'email', Rule::unique('users', 'email')],
            'password' => 'required|confirmed|min:6'
        ]);

        // Hash Password
        $formFields['password'] = bcrypt($formFields['password']);

        // Create User
        $user = User::create([
            'email' => $formFields['email'],
            'name' => $formFields['nama'],
            'password' => $formFields['password'],
        ]);

        // Create Anggota
        $anggota = Anggota::create([
            'nama' => $formFields['nama'],
            'alamat' => $formFields['alamat'],
            'no_tlp' => $formFields['no_tlp'],
            'jenis_kelamin' => $formFields['jenis_kelamin'],
            'password' => $formFields['password'],
            'id_user' => $user->id,
        ]);

        // Merge the two arrays
//        $combined_data = array_merge($user, $anggota);
//        dd($combined_data);
        // Login
        auth()->login($user);

        return redirect('/')->with('message', 'User created and logged in');
    }

    // Authenticate User /login
    public function authenticate(Request $request)
    {
        $formFields = $request->validate([
            'email' => ['required', 'email'],
            'password' => 'required'
        ]);

        if (auth()->attempt($formFields)) {
            $request->session()->regenerate();

            return redirect('/')->with('message', 'You are now logged in!');
        }
        return back()->withErrors(['email' => 'Invalid Credentials'])->onlyInput('email');
    }

    // Logout User
    public function logout(Request $request)
    {
        auth()->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/')->with('message', 'You have been logged out!');

    }


}
