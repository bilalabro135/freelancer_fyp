@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group form-floating-label">
                            <input id="name" name="name" type="text" class="form-control input-border-bottom @error('name') is-invalid @enderror" value="{{ old('name') }}" required autocomplete="name" autofocus >
                            <label for="name" class="placeholder">Name</label>
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group form-floating-label">
                            <input id="email" name="email" type="text" class="form-control input-border-bottom @error('email') is-invalid @enderror" value="{{ old('email') }}" required  autocomplete="name">
                            <label for="email" class="placeholder">E-Mail Address</label>
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group form-floating-label">
                            <input id="password" type="password"  class="form-control input-border-bottom @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" >
                            <label for="username" class="placeholder">Password</label>
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group form-floating-label">
                            <input id="password" type="password"  class="form-control input-border-bottom @error('password') is-invalid @enderror" name="password_confirmation" required autocomplete="new-password">
                            <label for="username" class="placeholder">Confirm Password</label>
                            @error('password-confirm')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>


                        <div class="form-group form-floating-label">
                            <label for="profile_pic">Profile Pic</label>
                            <input id="profile_pic" type="file"  class="form-control input-border-bottom @error('profile_pic') is-invalid @enderror" name="profile_pic" required>
                            @error('profile_pic')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>


                        <div class="form-group form-floating-label">
                            <select class="p-0 form-control input-border-bottom @error('roles') is-invalid @enderror" id="roles[]" name="roles[]">
                                <option disabled selected>-- Select your role --</option>
                                @foreach(\Spatie\Permission\Models\Role::all() as $role)
                                    @if($role->name != 'Super-Admin' && $role->id != 1)
                                        <option value="{{ $role->name }}">{{ $role->name }}</option>
                                    @endif
                                @endforeach
                            </select>
                            @error('roles')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>



                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Join Saancha') }}
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
