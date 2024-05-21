<!DOCTYPE html>
<html data-bs-theme="light" lang="en">

<head>
    @php
        $page_title = 'Signup';
    @endphp
    @include('components.user.css')
</head>

<body>
    @include('components.user.nav')

    <div id="page-header" class="page-header justify-content-center text-center">
        <div class="top-div mb-5">
            <span class="subheader">Login</span>
            <h1 class="heading">
                <span class="me-3">Create your</span>
                <span class="underlined">Account</span>
            </h1>
        </div>
    </div>
    <div class="section">
        <div>
            <div id="signup-div" class="text-center mb-5">
                <i class="fas fa-user-circle" style="font-size: 10vw;"></i>
                <h1>Signup</h1>
            </div>
            <div id="pay-div" class="text-center mb-5 d-none">
                <h1>Subscription</h1>
                <h4>please pay using the available payment methods</h4>
            </div>

            <x-validation-errors class="mb-4" />

            <form method="POST" action="{{ route('register') }}">
                @csrf
                <div id="user-details" class="row mb-4">
                    <div class="col-md-6 mb-4 d-flex flex-column">
                        <label class="form-label" for="first-name">First Name</label>
                        <input type="text" id="first-name" class="form-control rounded-pill" name="first_name" placeholder="First Name" required="">
                    </div>

                    <div class="col-md-6 mb-4 d-flex flex-column">
                        <label class="form-label" for="last-name">Last Name</label>
                        <input type="text" id="last-name" class="form-control rounded-pill" name="last_name" placeholder="Last Name" required="">
                    </div>

                    <div class="col-md-6 mb-4 d-flex flex-column">
                        <label class="form-label" for="last-name">Gender</label>
                        <div class="d-flex justify-content-around">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" id="male" name="gender" value="male">
                                <label class="form-check-label" for="male">Male</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" id="female" name="gender" value="female">
                                <label class="form-check-label" for="female">Female</label>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 mb-4 d-flex flex-column">
                        <label class="form-label" for="date_of_birth">Your birthday</label>
                        <input type="date" id="date_of_birth" class="form-control rounded-pill" name="date_of_birth" placeholder="date_of_birth" required="" min="5" max="99">
                    </div>

                    <div class="col-md-6 mb-4 d-flex flex-column">
                        <label class="form-label" for="phone">Phone Number</label>
                        <input type="text" id="phone" class="form-control rounded-pill" name="phone_number" placeholder="Phone Number" required="">
                    </div>

                    <div class="col-md-6 mb-4 d-flex flex-column">
                        <label class="form-label" for="email">Email</label>
                        <input type="email" id="email" class="form-control rounded-pill" name="email" placeholder="Email Address" required="">
                    </div>

                    <div class="col-md-6 mb-4 d-flex flex-column">
                        <label class="form-label" for="password">Password</label>
                        <input type="password" class="form-control rounded-pill" name="password" placeholder="Password" required="">
                    </div>

                    <div class="col-md-6 mb-4 d-flex flex-column">
                        <label class="form-label" for="password">Password Confirmation</label>
                        <input type="password" class="form-control rounded-pill" name="password_confirmation" placeholder="Password" required="">
                    </div>
                </div>
                <div class="col-12 text-center">
                    <button id="submit-btn" class="btn btn-bg-main rounded-pill" type="submit">Signup</button>
                </div>
                {{-- <div id="payment" class="p-2 row justify-content-center d-none">
                    <div class="d-none">
                        <input type="text" name="amount" value="2000" required="">
                    </div>
                    <div class="col-md-8 col-lg-6">
                        <div class="row mb-4">
                            <div id="airtel-div" class="col-6 p-2 d-flex align-items-start">
                                <input id="airtel-radio" type="radio" name="method" value="airtel money" />
                                <label class="form-label" for="airtel-radio">
                                    <img src="{{asset('assets/img/airtel_money.png')}}" />
                                </label>
                            </div>
                            <div id="tnm-div" class="col-6 p-2 d-flex align-items-start">
                                <input id="tnm-radio" type="radio" name="method" value="tnm mpamba" />
                                <label class="form-label" for="tnm-radio">
                                    <img src="{{asset('assets/img/tnm_mpamba.png')}}" />
                                </label>
                            </div>
                        </div>
                        <p id="airtel-details" class="d-none">
                            <span class="me-1">Please</span>
                            <span class="me-1 fw-bold text-danger">K2000</span>
                            <span class="me-1">to</span>
                            <span class="me-1 fw-bold text-danger">0993930231</span>
                            <span class="me-1">and enter Trans ID below</span>
                        </p>
                        <p id="tnm-details" class="d-none">
                            <span class="me-1">Please</span>
                            <span class="me-1 fw-bold text-success">K2000</span>
                            <span class="me-1">to</span>
                            <span class="me-1 fw-bold text-success">0885879301</span>
                            <span class="me-1">and enter Trans ID below</span>
                        </p>
                        <div id="trans-id-div" class="mb-4 d-flex flex-column d-none">
                            <label class="form-label trans_id" for="trans_id">Trans ID</label>
                            <input id="trans_id" class="form-control form-control rounded-pill" type="text" name="trans_id" placeholder="Enter Trans ID" required />
                        </div>
                        <div class="col-12 text-center">
                            <button id="submit-btn" class="btn btn-bg-main rounded-pill d-none" type="submit">Signup</button>
                        </div>
                    </div>
                </div> --}}
                {{-- <div class="col-12 text-center">
                    <button id="next-btn" class="btn btn-bg-main rounded-pill" type="button">Next</button>
                </div> --}}
            </form>
        </div>
    </div>

    @include('components.user.footer')
    <script src="{{asset('assets/js/signup.js')}}"></script>
</body>

</html>




{{-- <x-guest-layout>
    <x-authentication-card>
        <x-slot name="logo">
            <x-authentication-card-logo />
        </x-slot>

        <x-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div>
                <x-label for="name" value="{{ __('Name') }}" />
                <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            </div>

            <div class="mt-4">
                <x-label for="email" value="{{ __('Email') }}" />
                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            </div>

            <div class="mt-4">
                <x-label for="password" value="{{ __('Password') }}" />
                <x-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
            </div>

            <div class="mt-4">
                <x-label for="password_confirmation" value="{{ __('Confirm Password') }}" />
                <x-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />
            </div>

            @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                <div class="mt-4">
                    <x-label for="terms">
                        <div class="flex items-center">
                            <x-checkbox name="terms" id="terms" required />

                            <div class="ml-2">
                                {!! __('I agree to the :terms_of_service and :privacy_policy', [
                                        'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">'.__('Terms of Service').'</a>',
                                        'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">'.__('Privacy Policy').'</a>',
                                ]) !!}
                            </div>
                        </div>
                    </x-label>
                </div>
            @endif

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>

                <x-button class="ml-4">
                    {{ __('Register') }}
                </x-button>
            </div>
        </form>
    </x-authentication-card>
</x-guest-layout> --}}
