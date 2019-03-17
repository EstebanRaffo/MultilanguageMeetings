@extends('layouts.app')

@section('title', 'Editar Usuario')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
                  @if(count($errors) > 0)
                    <div class="alert alert-danger">
                      <ul>
                        @foreach($errors->all() as $error)
                          <li>{{$error}}</li>
                        @endforeach
                      </ul>
                    </div>
                  @endif

                    <form class="form-horizontal" method="POST" enctype="multipart/form-data" action="{{ route('edit-user') }}">
                        {{ csrf_field() }}
                        {{method_field('put')}}

                        @include('users._form')

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Guardar
                                </button>
                                <a href="/user" class="btn btn-danger">
                                    Cancelar
                                </a>
                            </div>
                        </div>
                    </form>
                    <script src="js/validaciones.js"></script>
        </div>
    </div>
</div>
@endsection
