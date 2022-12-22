@extends('layouts.loginlayout')

@section('isi')

<div class=" container-fluid " style="min-height: 800px">
    <div class="d-flex table-responsive mx-auto justify-content-center border bg-white mt-5" style="padding: 100px; width:500px; height:600px">
        <main class="form-signin">
            <form action="/sessions/login" method="POST">
                @csrf
                <h5 class="mb-3 fw-bold text-center">Open-SID 4</h5>

                <div class="form-floating">
                    <input type="email" value="{{ Session::get('email') }}" class="form-control" id="floatingInput" name="email" placeholder="name@example.com">
                    <label for="floatingInput">Email address</label>
                </div>
                <div class="form-floating">
                    <input type="password" class="form-control" id="floatingPassword" name="password" placeholder="Password">
                    <label for="floatingPassword">Password</label>
                </div>

                <div class="checkbox mb-3">
                    <label>
                        <input type="checkbox" value="remember-me"> Remember me
                    </label>
                </div>
                <button class="w-100 btn btn-lg btn-dark" type="submit">Log in</button>
                <p class="mt-5 mb-3 text-muted">&copy; 2022</p>
            </form>
        </main>
    </div>
</div>
@endsection