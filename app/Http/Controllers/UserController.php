<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Event;
use App\Inscription;


class UserController extends Controller
{
    private $idiomas = ["Español", "Inglés", "Aleman", "Frances", "Italiano", "Ruso", "Chino", "Japonés", "Coreano"];

    public function registerUser(){
      $idiomas = $this->idiomas;
      $user = new User;
      return view('auth.register', compact('idiomas', 'user'));
    }

    public function save(Request $request){
      $this->validate($request,[
          'name' => 'required|string|max:255',
          'email' => 'required|string|email|max:255|unique:users',
          'password' => 'required|string|min:6|confirmed',
          'country' => 'required',
          //'sex' => 'required',
          //'photo' => 'required|nullable|image',
      ]);

      $user = new User;
      $user->fill($request->all());

      if($request->file('photo')) {
        $foto = $request->file('photo');
      }

      $nombre = $request['name'] . '.' . $foto->extension();
      // PROBAR
      $foto->storePubliclyAs('public' . User::photoFolder(), $nombre);
      $user->photo = $nombre;
      $user->password = bcrypt($request->input('password'));
      $user->role_id = 2;
      $user->save();

      Auth::loginUsingId($user->id, TRUE);
      return redirect()->route('home');

    }
}
