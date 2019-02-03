@extends('layouts.app')

@section('title', 'Listado de usuarios')

@section('content')
  <table class="table table-striped table-hover">
    <thead>
      <tr>
        <th>Foto</th>
        <th>Nombre</th>
        <th>email</th>
        <th>Idioma Interesado</th>
        <th>Acciones</th>
      </tr>
    </thead>
    <tbody>
      @foreach($users as $unUsuario)
        <tr>
          <td><img src="{{ $unUsuario->getPhoto() }}" width=50>
          {{--<td><a href="/user/{{$unUsuario->id}}">{{$unUsuario->name}}</a></td>--}}
          <td>{{$unUsuario->email}}</td>
          {{--<td>{{$unUsuario->language}}</td>--}}
          <td>
            <div class="d-flex">
              <form action="/user/{{$unUsuario->id}}" method="get">
                <input hidden type="text" name="id" value="{{$unUsuario->id}}">
                <button type="submit" class="btn btn-info">
                  <span class="ion-edit" aria-hidden="true"></span>
                  <span><strong>Ver</strong></span>
                </button>
              </form>
              @if(Auth::user()->role_id == 1)

                <form action="/user/{{$unUsuario->id}}/delete" method="post">
                  {{csrf_field()}}
                  {{ method_field('delete') }}
                  <input hidden type="text" name="id" value="{{$unUsuario->id}}">
                    <button type="submit" class="btn btn-danger px-2">
                      <span class="ion-android-delete" aria-hidden="true"></span>
                      <span><strong>Eliminar</strong></span>
                    </button>
                </form>
              @endif
            </div>
          </td>
        </tr>
      @endforeach
    </tbody>
  </table>
  {{$users->links()}}
  <a class="btn btn-success" href="/home">Volver</a>
@endsection
