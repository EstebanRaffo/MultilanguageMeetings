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
          //'country' => 'required',
          //'sex' => 'required',
          //'photo' => 'required|nullable|image',
      ]);

      $user = new User;
      $user->fill($request->all());

      if($request->file('photo')) {
        $foto = $request->file('photo');
      }

      $nombre = $request['name'] . '.' . $foto->extension();
      $foto->storePubliclyAs('public' . User::photoFolder(), $nombre);
      $user->photo = $nombre;
      $user->password = bcrypt($request->input('password'));
      $user->role_id = 2;
      $user->save();

      Auth::loginUsingId($user->id, TRUE);
      return redirect()->route('home');

    }

    public function list(){
      $users = User::paginate(10);
      return view('users.list', compact('users'));
    }

    public function profile(){
        $user = Auth::user();

        if($user){
        //   $userInscriptions = Auth::user()->inscriptions;
        //   $userEvents = array();
        //   $user = Auth::user();
        //
        //   foreach ($userInscriptions as $inscripcion) {
        //     $event_id = $inscripcion->event_id;
        //     $eventUser = Event::find($event_id);
        //     $userEvents[] = $eventUser;
        //   }
          return view('users.profile', compact('userEvents', 'user'));
        }

        return redirect()->route('home');
    }

    public function show($id){
        $user = User::find($id); // Usuario que estoy visitando
        // $userInscriptions = $user->inscriptions;
        // $userEvents = array();

        // foreach ($userInscriptions as $inscripcion) {
        //   $event_id = $inscripcion->event_id;
        //   $eventUser = Event::find($event_id);
        //   $userEvents[] = $eventUser;
        // }

        // Detectar si es Seguidor
        // $followers = $user->followers;
        // $followings = $user->followings;

        // $esSeguidor = false;

        // foreach ($followers as $follower) { // Recorro los usuarios seguidores
        //   $follower_id = $follower->id;
        //   $user_follower = User::find($follower_id); // usuario Seguidor
        //
        //   if(Auth::id() == $user_follower->id){
        //     $esSeguidor = true;
        //   }
        //
        // }
        // dd($user);
        return view('users.profile', compact('user', 'userEvents', 'esSeguidor'));
    }


    public function delete($id){
      $user = User::find($id);
      $user->delete();
			return redirect('/users');
		}


    public function edit(){
      //$paises = $this->paises;
      $idiomas = $this->idiomas;
      $user = Auth::user();
      dd($user);

      if($user){
        //return view('users.edit', compact('user', 'paises', 'idiomas'));
        return view('users.edit', compact('user', 'idiomas'));
      }
      return redirect('/home');
    }


    public function update(Request $request){
      $user = Auth::user();
      $this->validate($request,[
          'name' => 'required|string|max:255',
          'email' => 'required|string|email|max:255',
          'password' => 'required|string|min:6|confirmed',
          'country' => 'required',
          'sex' => 'required',
          'photo' => 'required|nullable|image',
      ]);
      $user->fill($request->all());
      $user->password = bcrypt($request->input('password'));

      $foto = $request->file('photo');
      $nombre = $request['name'] . '.' . $foto->extension();
      $foto->storePubliclyAs('public' . User::photoFolder(), $nombre);
      $user->photo = $nombre;

      $user->save();

      //dd($user);
      return redirect()->route('profile');
    }
}
