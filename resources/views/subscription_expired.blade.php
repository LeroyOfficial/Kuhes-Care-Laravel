<!DOCTYPE html>
<html data-bs-theme="light" lang="en">

<head>
    @php
        $page_title = 'Subscription Expired';
    @endphp
    @include('components.user.css')
</head>

<body>
    <div class="vh-10 vw-100 bg-main d-flex align-items-center justify-content-between px-2">
        <div><a class="btn p-1 btn-hover-second" role="button" href="video_list.html"><i class="fas fa-arrow-left fs-4"></i></a></div>
        <div>
            <h4 class="color-second">Subscription Expired</h4>
        </div>
        <div></div>
    </div>

    <div class="row justify-content-center">
        <div class="col-md-8 col-lg-6  py-5 text-center">
            <h1>Oops it seem that your monthly Subscription has expired today</h1>
            <h2>please pay for a new subscription below</h2>

            <form action="{{url('new_subscription')}}" method="post">
                @csrf

                <div id="payment" class="p-2 row justify-content-center">
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
                        <div id="trans-id-div" class="mb-4 d-flex flex-column">
                            <label class="form-label trans_id" for="trans_id">Trans ID</label>
                            <input id="trans_id" class="form-control form-control rounded-pill" type="text" name="trans_id" placeholder="Enter Trans ID" required />
                        </div>
                        <div class="col-12 text-center">
                            <button id="submit-btn" class="btn btn-bg-main rounded-pill" type="submit">Subscribe</button></div>
                    </div>
                </div>
            </form>
        </div>
    </div>

    @include('components.user.auth.footer')
    <script>
        $('#airtel-radio').click(function() {
            $('#airtel-details').removeClass('d-none');
            $('#tnm-details').addClass('d-none');
        })

        $('#tnm-radio').click(function() {
            $('#airtel-details').addClass('d-none');
            $('#tnm-details').removeClass('d-none');
        })
    </script>

</body>

</html>
