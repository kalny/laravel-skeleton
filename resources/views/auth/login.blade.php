@extends('layouts.login')

@section('title', 'Sign In')

@section('content')
<div class="text-center mt-4">
    <h1 class="h2">Welcome back!</h1>
    <p class="lead">
        Sign in to your account to continue
    </p>
</div>

<div class="card">
    <div class="card-body">
        <div class="m-sm-4">
            <form method="POST" action="{{ route('authenticate') }}">
                @csrf
                <div class="mb-3">
                    <label class="form-label">Email</label>
                    <input class="form-control form-control-lg" type="email" name="email" placeholder="Enter your email" />
                    @if($errors->has('email'))
                        <span class="invalid-feedback" style="display:inline;"><strong>{{ $errors->first('email') }}</strong></span>
                    @endif
                </div>
                <div class="mb-3">
                    <label class="form-label">Password</label>
                    <input class="form-control form-control-lg" type="password" name="password" placeholder="Enter your password" />
                    <small>
                        <a href="#">Forgot password?</a>
                    </small>
                </div>
                <div>
                    <label class="form-check">
                        <input class="form-check-input" type="checkbox" value="remember-me" name="remember-me" checked>
                        <span class="form-check-label">Remember me next time</span>
                    </label>
                </div>
                <div class="text-center mt-3">
                    <button type="submit" class="btn btn-lg btn-primary">Sign in</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
