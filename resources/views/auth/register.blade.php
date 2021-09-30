@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-md-4 col-form-label text-md-right">Select Your Avatar</label>
                            <label>
                                <input type="radio" id="avatar" name="avatar" value="https://bootdey.com/img/Content/avatar/avatar1.png" checked>
                                <img class="circular--square" src="https://bootdey.com/img/Content/avatar/avatar1.png" />
                            </label>
                            <label>
                                <input type="radio" id="avatar" name="avatar" value="https://bootdey.com/img/Content/avatar/avatar2.png">
                                <img class="circular--square" src="https://bootdey.com/img/Content/avatar/avatar2.png" />
                            </label>
                            <label>
                                <input type="radio" id="avatar" name="avatar" value="https://bootdey.com/img/Content/avatar/avatar3.png">
                                <img class="circular--square" src="https://bootdey.com/img/Content/avatar/avatar3.png" />
                            </label>
                            <label>
                                <input type="radio" id="avatar" name="avatar" value="https://bootdey.com/img/Content/avatar/avatar4.png">
                                <img class="circular--square" src="https://bootdey.com/img/Content/avatar/avatar4.png" />
                            </label>
                            <label>
                                <input type="radio" id="avatar" name="avatar" value="https://bootdey.com/img/Content/avatar/avatar5.png">
                                <img class="circular--square" src="https://bootdey.com/img/Content/avatar/avatar5.png" />
                            </label>
                            <label>
                                <input type="radio" id="avatar" name="avatar" value="https://bootdey.com/img/Content/avatar/avatar6.png">
                                <img class="circular--square" src="https://bootdey.com/img/Content/avatar/avatar6.png" />
                            </label>
                            <label>
                                <input type="radio" id="avatar" name="avatar" value="https://bootdey.com/img/Content/avatar/avatar7.png">
                                <img class="circular--square" src="https://bootdey.com/img/Content/avatar/avatar7.png" />
                            </label>

                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
