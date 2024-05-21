<!DOCTYPE html>
<html data-bs-theme="light" lang="en">

<head>
    @include('components.user.css')
</head>

<body>
    @include('components.user.nav')

    <div id="page-header" class="page-header justify-content-center text-center">
        <div class="top-div mb-5"><span class="subheader">Login</span>
            <h1 class="heading"><span class="me-3">Create your</span><span class="underlined">Account</span></h1>
        </div>
    </div>
    <div class="section">
        <div>
            <div class="text-center mb-5"><i class="fas fa-user-circle" style="font-size: 10vw;"></i>
                <h1>Signup</h1>
            </div>
            <div class="row mb-4">
                <div class="col-md-6 mb-4 d-flex flex-column"><label class="form-label" for="first-name">First Name</label><input type="text" id="first-name" class="form-control rounded-pill" name="first_name" placeholder="First Name" required=""></div>
                <div class="col-md-6 mb-4 d-flex flex-column"><label class="form-label" for="last-name">Last Name</label><input type="text" id="last-name" class="form-control rounded-pill" name="last_name" placeholder="Last Name" required=""></div>
                <div class="col-md-6 mb-4 d-flex flex-column"><label class="form-label" for="last-name">Gender</label>
                    <div class="d-flex justify-content-around">
                        <div class="form-check"><input class="form-check-input" type="radio" id="male" name="gender" value="male"><label class="form-check-label" for="male">Male</label></div>
                        <div class="form-check"><input class="form-check-input" type="radio" id="female" name="gender" value="female"><label class="form-check-label" for="female">Female</label></div>
                    </div>
                </div>
                <div class="col-md-6 mb-4 d-flex flex-column"><label class="form-label" for="age">Age</label><input type="number" id="age" class="form-control rounded-pill" name="age" placeholder="Age" required="" min="5" max="99"></div>
                <div class="col-md-6 mb-4 d-flex flex-column"><label class="form-label" for="email">Email</label><input type="email" id="email" class="form-control rounded-pill" name="email" placeholder="Email Address" required=""></div>
                <div class="col-md-6 mb-4 d-flex flex-column"><label class="form-label" for="password">Password</label><input type="password" class="form-control rounded-pill" name="password" placeholder="Password" required=""></div>
            </div>
            <div class="col-12 text-center"><button class="btn btn-bg-main" type="submit">Login</button></div>
        </div>
    </div>

    @include('components.user.footer')

</body>

</html>
