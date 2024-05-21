<!DOCTYPE html>
<html data-bs-theme="light" lang="en">

<head>
    @include('components.user.css')
</head>

<body>
    @include('components.user.nav')

    <div id="page-header" class="page-header justify-content-center text-center">
        <div class="top-div mb-5"><span class="subheader">Login</span>
            <h1 class="heading"><span class="me-3">Login in your</span><span class="underlined">Account</span></h1>
        </div>
    </div>
    <div class="section">
        <div>
            <div class="text-center mb-5"><i class="fas fa-user-circle" style="font-size: 10vw;"></i>
                <h1>Login</h1>
            </div>
            <div class="row mb-4">
                <div class="col-md-6 mb-4 d-flex flex-column"><label class="form-label" for="email">Email</label><input type="email" id="email" class="form-control rounded-pill" name="email" placeholder="Email Address" required=""></div>
                <div class="col-md-6 mb-4 d-flex flex-column"><label class="form-label" for="password">Password</label><input type="password" class="form-control rounded-pill" name="password" placeholder="Password" required=""></div>
            </div>
            <div class="col-12 text-center"><button class="btn btn-bg-main" type="submit">Login</button></div>
        </div>
    </div>

    @include('components.user.footer')

</body>

</html>
