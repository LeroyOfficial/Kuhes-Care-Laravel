<!DOCTYPE html>
<html lang="en">

<?php
    $page_title = 'Add New Therapist';
?>

<head>
    @include('components.admin.css')
</head>

<body>
    <div id="app">
        @include('components.admin.sidebar')

        <div id="main">
            @include('components.admin.header')

            <div class="page-heading">
                <h3>Add A New Therapist</h3>
            </div>
            <div class="page-content">
                <section class="row">
                    <div class="col-12">

                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h4>Add a New Therapist</h4>
                                    </div>
                                    <div class="card-body">
                                        <form class="form" method="POST" action="{{url('admin/post_new_therapist')}}" enctype="multipart/form-data">
                                            @csrf
                                            <div class="row">
                                                <div class="col-12">
                                                    <div>
                                                        <img id="preview">
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="color-main" for="image-input">Picture</label>
                                                        <input type="file" accept="image/*" id="image-input" class="form-control" required autocomplete="off"
                                                            placeholder="Picture" name="image">

                                                        <script>
                                                            var imageinput = document.getElementById("image-input");
                                                            var preview = document.getElementById("preview");

                                                            imageinput.addEventListener("change", function(event){
                                                                if(event.target.files.lenght == 0) {
                                                                    return;
                                                                }
                                                                var tempUrl = URL.createObjectURL(event.target.files[0]);
                                                                preview.setAttribute("src",tempUrl);
                                                                var style = "max-width:100%; height:30vh; border-radius:10px;";
                                                                preview.setAttribute("style", style);
                                                            })
                                                        </script>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-12">
                                                    <div class="form-group">
                                                        <label class="color-main" for="first-name-column">First Name</label>
                                                        <input type="text" id="first-name-column" class="form-control" required re autocomplete="off"
                                                            placeholder="First Name" name="first_name">
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-12">
                                                    <div class="form-group">
                                                        <label class="color-main" for="last-name-column">Last Name</label>
                                                        <input type="text" id="last-name-column" class="form-control" required autocomplete="off"
                                                            placeholder="Last Name" name="last_name">
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-12">
                                                    <div class="form-group">
                                                        <label class="color-main" for="phone-column">Phone</label>
                                                        <input type="text" id="phone-column" class="form-control" required autocomplete="off"
                                                            placeholder="Phone Number" name="phone_number">
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-12">
                                                    <div class="form-group">
                                                        <label class="color-main" for="email-floating">Email</label>
                                                        <input type="text" id="email-floating" class="form-control" required autocomplete="off"
                                                            name="email" placeholder="Email">
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-12">
                                                    <div class="form-group">
                                                        <label class="color-main" for="date_of_birth">Date of Birth</label>
                                                        <input type="date" id="date_of_birth" class="form-control" required autocomplete="off"
                                                            name="date_of_birth" placeholder="Date of Birthday">
                                                    </div>
                                                </div>
                                                <div class="col-md-6 mb-4 d-flex flex-column">
                                                    <label class="form-label" for="last-name">Gender</label>
                                                    <div class="d-flex justify-content-around">
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio" id="male" name="gender" value="male" required>
                                                            <label class="form-check-label" for="male">Male</label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio" id="female" name="gender" value="female" required>
                                                            <label class="form-check-label" for="female">Female</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-12">
                                                    <div class="form-group">
                                                        <label class="color-main" for="qualification">Qualification</label>
                                                        <input type="text" id="qualification" class="form-control" required autocomplete="off"
                                                            name="qualification" placeholder="Qualification">
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-12">
                                                    <div class="form-group">
                                                        <label class="color-main" for="experience">Experience</label>
                                                        <input type="text" id="experience" class="form-control" required autocomplete="off"
                                                            name="experience" placeholder="Experience">
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-12">
                                                    <div class="form-group">
                                                        <label class="color-main" for="password-id-column">Password</label>
                                                        <input type="password" id="password-id-column" class="form-control" required autocomplete="off"
                                                            name="password" placeholder="Password">
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <label class="color-main" for="about">Bio</label>
                                                        <textarea name="about" id="about" rows="5" class="form-control"></textarea>
                                                    </div>
                                                </div>
                                                <div class="col-12 d-flex justify-content-end">
                                                    <button type="submit"
                                                        class="btn btn-bg-main text-white me-1 mb-1">Submit</button>
                                                    <button type="reset"
                                                        class="btn btn-light-secondary me-1 mb-1">Reset</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>

            @include('components.admin.footer')
</body>

</html>
