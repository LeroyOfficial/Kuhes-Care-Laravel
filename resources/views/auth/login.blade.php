<!DOCTYPE html>
<html data-bs-theme="light" lang="en">

<head>
    @php
        $page_title = 'Login';
    @endphp
    @include('components.user.css')
</head>

<body>
    @include('components.user.nav')

    <div id="page-header" class="page-header justify-content-center text-center">
        <div class="top-div mb-5">
            <span class="subheader">Login</span>
            <h1 class="heading">
                <span class="me-3">Login in your</span>
                <span class="underlined">Account</span>
            </h1>
        </div>
    </div>
    <div class="section">
        <div>
            <div class="text-center mb-5">
                <i class="fas fa-user-circle" style="font-size: 10vw;"></i>
                <h1>Login</h1>
            </div>
            @if (session('status'))
                <div class="mb-4 font-medium text-sm text-green-600">
                    {{ session('status') }}
                </div>
            @endif
            <x-validation-errors class="mb-4" />

            <form method="POST" action="{{ route('login') }}">
                @csrf

                <div class="row mb-4">
                    <div class="col-md-6 mb-4 d-flex flex-column">
                        <label class="form-label" for="email">Email</label>
                        <input type="email" id="email" class="form-control rounded-pill" name="email" placeholder="Email Address" required="" autofocus autocomplete="username">
                    </div>
                    <div class="col-md-6 mb-4 d-flex flex-column">
                        <label class="form-label" for="password">Password</label>
                        <input type="password" class="form-control rounded-pill" name="password" placeholder="Password" required="" autocomplete="current-password">
                    </div>
                </div>
                <div class="col-12 text-center">
                    <button class="btn btn-bg-main rounded-pill" type="submit">Login</button>
                </div>
            </form>
        </div>
    </div>

    @include('components.user.footer')

</body>

</html>
