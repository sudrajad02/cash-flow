@extends("layouts.main")

@section('container')
<div class="row justify-content-center">
    <div class="col-md-5">
        <main class="form-signin w-100 m-auto">
            @if(session()->has("success"))
                <div class="alert alert-success alert-dimissible fade show" role="alert">
                    {{ session("success") }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            @if(session()->has("loginError"))
                <div class="alert alert-danger alert-dimissible fade show" role="alert">
                    {{ session("loginError") }}
                    <button type="button" class="btn-close ms-auto" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            <h1 class="h3 mb-3 fw-normal">Please Login</h1>
            <form action="/login" method="post">
                @csrf
                <div class="form-floating">
                    <input type="email" name="email" class="form-control" id="floatingInput" placeholder="name@example.com" id="email" autofocus required value="{{ old('email') }}">
                    <label for="floatingInput">Email address</label>
                    @error('email')
                        <div class="mt-2">
                            <p class="text-danger">{{ $message }}</p>
                        </div>
                    @enderror
                </div>
                <div class="form-floating">
                    <input type="password" name="password" class="form-control" id="floatingPassword" placeholder="Password" id="password" required>
                    <label for="floatingPassword">Password</label>
                    @error('password')
                        <div class="mt-2">
                            <p class="text-danger">{{ $message }}</p>
                        </div>
                    @enderror
                </div>
                <button class="btn btn-primary w-100 py-2" type="submit">Login</button>
            </form>
        </main>
    </div>
</div>
@endsection