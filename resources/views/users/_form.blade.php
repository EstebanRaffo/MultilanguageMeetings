<!-- Nombre y Apellido -->
<div class="form-group row">
    <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Nombre y Apellido*') }}</label>

    <div class="col-md-6">
        <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name', $user->name) }}" required autofocus>

        @if ($errors->has('name'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('name') }}</strong>
            </span>
        @endif
    </div>
</div>

<!-- Correo -->
<div class="form-group row">
    <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Correo*') }}</label>

    <div class="col-md-6">
        <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email', $user->email) }}" required>

        @if ($errors->has('email'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('email') }}</strong>
            </span>
        @endif
    </div>
</div>

<!-- Password -->
<div class="form-group row">
    <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password*') }}</label>

    <div class="col-md-6">
        <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

        @if ($errors->has('password'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('password') }}</strong>
            </span>
        @endif
    </div>
</div>

<!-- Confirmar password -->
<div class="form-group row">
    <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirmar Password*') }}</label>

    <div class="col-md-6">
        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>

        @if ($errors->has('password_confirmation'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('password_confirmation') }}</strong>
            </span>
        @endif
    </div>
</div>

<!-- Pais de Nacimiento* -->
<div class="form-group row">
    <label for="country" class="col-md-4 col-form-label text-md-right">País de nacimiento*</label>

    <div class="col-sm-6">
      {{-- <input id="country" type="text" class="form-control{{ $errors->has('country') ? ' is-invalid' : '' }}" name="country" value="{{ old('country', $user->country)}}" required> --}}
      <select class="form-control" name="country">
        <option value="">Seleccione País</option>

            @if(old('country', $user->country))
                  <option value="{{old('country', $user->country)}}" selected>{{old('country', $user->country)}}</option>
            @else
                  <option value="{{$user->country}}">{{$user->country}}</option>
            @endif

      </select>

      @if ($errors->has('country'))
          <span class="invalid-feedback" role="alert">
              <strong>{{ $errors->first('country') }}</strong>
          </span>
      @endif
    </div>
</div>

<!-- Provincia* -->
<div class="form-group row">
    <label for="province" class="col-md-4 col-form-label text-md-right">Provincia/Estado*</label>

    <div class="col-sm-6">
      {{--<input id="province" type="text" class="form-control{{ $errors->has('province') ? ' is-invalid' : '' }}" name="province" value="{{ old('province', $user->province)}}" disabled>--}}
      <select class="form-control" name="province">
        <option value="">Seleccione Provincia</option>

            @if(old('province', $user->province))
                  <option value="{{old('province', $user->province)}}" selected>{{old('province', $user->province)}}</option>
            @else
                  <option value="">{{$user->province}}</option>
            @endif

      </select>

      @if ($errors->has('province'))
          <span class="invalid-feedback" role="alert">
              <strong>{{ $errors->first('province') }}</strong>
          </span>
      @endif
    </div>
</div>



<!-- Género -->
<div class="form-group row">
  <label for="sex" class="col-md-4 col-form-label text-md-right">Género*</label>

  <div class="col-sm-6">
    <select class="form-control" name="sex">
      @if(old('sex', $user->sex) == 'F')
        <option name="sex" value="F" selected>Femenino</option>
      @else
        <option name="sex" value="F">Femenino</option>
      @endif
      @if(old('sex', $user->sex) == 'M')
        <option name="sex" value="M" selected>Masculino</option>
      @else
        <option name="sex" value="M">Masculino</option>
      @endif
      @if(old('sex', $user->sex) == 'O')
        <option name="sex" value="O" selected>Otro</option>
      @else
        <option name="sex" value="O">Otro</option>
      @endif
    </select>

    @if ($errors->has('sex'))
        <span class="invalid-feedback" role="alert">
            <strong>{{ $errors->first('sex') }}</strong>
        </span>
    @endif
  </div>
</div>


<!-- Edad -->
<div class="form-group row">
    <label for="age" class="col-md-4 col-form-label text-md-right">{{ __('Edad') }}</label>

    <div class="col-md-6">
        <input id="age" type="text" class="form-control" name="age" value="{{ old('age', $user->age) }}" >
    </div>
</div>

<!-- Teléfono de contacto -->
<div class="form-group row">
    <label for="telephone" class="col-md-4 col-form-label text-md-right">{{ __('Teléfono de contacto +54 15') }}</label>

    <div class="col-md-6">
        <input id="telephone" type="text" class="form-control" name="telephone" value="{{ old('telephone', $user->telephone) }}" >
    </div>
</div>

<!-- Idioma de Interés -->
<div class="form-group row">
  <label for="language" class="col-md-4 col-form-label text-md-right">Idioma de Interés</label>

  <div class="col-sm-6">
    <select class="form-control" name="language">
      @foreach($idiomas as $idioma)
        @if($idioma == old('language', $user->language))
             <option value="{{$idioma}}" selected>{{$idioma}}</option>
        @else
             <option value="{{$idioma}}">{{$idioma}}</option>
        @endif
      @endforeach
    </select>
  </div>
</div>

<!-- Sitio Web -->
<div class="form-group row">
  <label for="website" class="col-md-4 col-form-label text-md-right">Sitio web</label>

  <div class="col-md-6">
      <input id="website" type="url" class="form-control" name="website" value="{{ old('website', $user->website) }}" >
  </div>
</div>

<!-- Tu mensaje -->
<div class="form-group row">
  <label for="message" class="col-md-4 col-form-label text-md-right">Tu mensaje:</label>

  <div class="col-md-6">
    <textarea class="form-control" name="message" value="{{old('message')}}">{{old('message', $user->message)}}</textarea>
  </div>
</div>

<!-- Subir Foto -->
<div class="form-group row">
  <label for="photo" class="col-md-4 col-form-label text-md-right">Subir Foto*</label>

  <div class="col-md-6">
    <input type="file" name="photo" value="{{ old('photo', $user->photo) }}">

    @if ($errors->has('photo'))
        <span class="invalid-feedback" role="alert">
            <strong>{{ $errors->first('photo') }}</strong>
        </span>
    @endif
  </div>
</div>
