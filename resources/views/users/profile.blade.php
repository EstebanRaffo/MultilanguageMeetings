@extends('layouts.app')

@section('content')
  {{-- dd($user->name) --}}
  <h1>{{ $user->name }}</h1>
  <br>
  <div class="row centrar">
    <div class="col-sm-12">
      <img src='{{ $user->getPhoto() }}' width=300px>
    </div>
  </div>
  <div class="row">
    <div class="col-sm-12">
      <p>email: {{ $user->email }}</p>
      {{--<p>Edad: {{ $user->age }}</p>
      <p>Teléfono de contacto: {{ $user->telephone }}</p>
      <p>País de Nacimiento: {{ $user->country }}</p>
      <p>Provincia/Región: {{ $user->province }}</p>
      <p>Idioma de Interés: {{ $user->language }}</p>
      <p>Género: {{ $user->sex }}</p>
      <p>Sitio Web: <a href="{{$user->website}}">{{ $user->website }}</a></p>
      <p>Mensaje: {{ $user->message }}</p>--}}
    </div>
    @if($user->id == Auth::id())
      <div class="col-sm-12">
          <a href="{{route('edit-user')}}" class="btn btn-primary">Editar Mis Datos</a>
          {{-- dd($user->id) --}}
      </div>
    @endif
  </div>

  <br><br>

  <a href="{{ route('list-users') }}" class="btn btn-info">Volver</a>
@endsection
