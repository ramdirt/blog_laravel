@extends('user.layouts.layout')

@section('content')
    <div class="register-page">
        @include('user.layouts.error')
        <div class="register-box">
            <div class="card">
                <div class="card-body register-card-body">
                    <p class="login-box-msg">Authentication</p>
                    <form action="{{ route('login.store') }}" method="post">
                        @csrf
                        <div class="input-group mb-3">
                            <input type="email" class="form-control" placeholder="Email" name="email"
                                value="{{ old('email') }}">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-envelope"></span>
                                </div>
                            </div>
                        </div>
                        <div class="input-group mb-3">
                            <input type="password" class="form-control" placeholder="Password" name="password">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-lock"></span>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-2">

                            <div class="col-12">
                                <button type="submit" class="btn btn-primary text-end btn-block">Login</button>
                            </div>

                        </div>
                    </form>
                </div>

            </div>
        </div>

    </div>
@endsection
