<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>3EDO Protfolio Dashboard</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="/dashboard/template/assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="/dashboard/template/assets/vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="/dashboard/template/assets/css/style.css">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="/dashboard/template/assets/images/favicon.png" />
</head>

<body>

    @include('Dashboard.layout.errors')
    @include('sweetalert::alert')
    <div class="container-scroller">
        <div class="container-fluid page-body-wrapper full-page-wrapper">
            <div class="row w-100 m-0">
                <div class="content-wrapper full-page-wrapper d-flex align-items-center auth login-bg">
                    <div class="card col-lg-4 mx-auto">
                        <div class="card-body px-5 py-5">
                            <h3 class="card-title text-left mb-3">Rest Password</h3>
                            @if (session('status'))
                            <div class="alert alert-success">
                                {{session('status')}}
                            </div>

                            @endif
                            <form action="{{ route('doForgot') }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="text" name="email" value="{{ old('email') }}"
                                        class="form-control p_input">
                                    @error('email')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="text-center">
                                    <button type="submit" class="btn btn-primary btn-block enter-btn">Send Password Rest Link</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- content-wrapper ends -->
            </div>
            <!-- row ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>

    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="/dashboard/template/assets/vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="/dashboard/template/assets/js/off-canvas.js"></script>
    <script src="/dashboard/template/assets/js/hoverable-collapse.js"></script>
    <script src="/dashboard/template/assets/js/misc.js"></script>
    <script src="/dashboard/template/assets/js/settings.js"></script>
    <script src="/dashboard/template/assets/js/todolist.js"></script>
    <!-- endinject -->
</body>

</html>
