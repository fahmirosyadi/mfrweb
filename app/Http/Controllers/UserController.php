<?php

namespace App\Http\Controllers;

use App\Providers\RouteServiceProvider;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Theme;

class UserController extends Controller
{

    use RegistersUsers;


    public function index() {
        return view('admin.user-index',['tema' => Theme::find(1), 'title' => 'User']);
    }

    public function profile() {
        return view('admin.user-profile',['tema' => Theme::find(1), 'title' => 'User', 'idUser' => auth()->user()->id]);
    }

    public function ubahPassword($id) {
        return view('admin.user-password',['tema' => Theme::find(1), 'title' => 'User', 'idUser' => $id]);
    }

    public function store(Request $request) {
        $validator = Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'foto' => ['image','max:2048'],
        ]);

        if ($validator->fails()) {
            return $validator->errors()->all();
        }

        if ($request->file('foto')) {
            $foto = $request->file('foto')->store('user');
        } else {
            $foto = null;
        }
        $user = User::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
            'foto' => $foto,
            'role' => 'user'
        ]);
        $user->sendEmailVerificationNotification();
        return true;
    }

    public function update(Request $request, $id) {
        $validator = Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', Rule::unique('users')->ignore($id)],
            'foto' => ['image','max:2048'],
        ]);

        if ($validator->fails()) {
            return $validator->errors()->all();
        }

        $user = User::find($id);
        if ($request->file('foto')) {
            \Storage::delete($user->foto);
            $foto = $request->file('foto')->store('user');
        } else {
            $foto = $user->foto;
        }
        User::where('id', $id)->update([
            'name' => $request['name'],
            'email' => $request['email'],
            'foto' => $foto
        ]);

        return true;
    }

    public function updatePassword(Request $request, $id) {
        $user = User::find($id);
        if (Hash::check($request['old-password'], $user->password)) {
            $validator = Validator::make($request->all(), [
                'password' => ['required', 'string', 'min:8', 'confirmed'],
            ]);

            if ($validator->fails()) {
                return $validator->errors()->all();
            }

            User::where('id', $id)->update([
                'password' => Hash::make($request['password'])
            ]);

            return true;
        }

        return ['Password lama tidak sesuai'];
    }

    public function toAdmin($id){
        User::where('id',$id)->update([
            'role' => 'admin'
        ]);
        return true;
    }

    public function all() 
    {
        return User::all();
    }

    public function show($id)
    {
        return User::find($id);
    }


    public function destroy($id)
    {
        $admin = User::where('role','admin')->get();
        $hitungAdmin = count($admin);
        if ($hitungAdmin == 1 && $id == auth()->user()->id) {
            return ['error' => 'Hanya anda satu-satunya admin'];
        }
        $user = User::find($id);
        \Storage::delete($user->foto);
        User::destroy($id);
        return true;
    }

    public function search($s){
        return User::where('name','like','%'.$s.'%')->orWhere('email','like','%'.$s.'%')->orWhere('role','like','%'.$s.'%')->get();
    }
}
