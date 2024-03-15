<!DOCTYPE html>
<html lang="en">
<link href="https://fonts.googleapis.com/css?family=Raleway+Dots" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
{{--<link href="{{asset('bootstrap/css/bootstrap.css/bootstrap.min.css')}}">--}}
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-wEmeIV1mKuiNpC+IOBjI7aAzPcEZeedi5yW5f2yOq55WWLwNGmvvx4Um1vskeMj0" crossorigin="anonymous">
{{--<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"--}}
{{--      integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">--}}
<link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" rel="stylesheet">
<style>
    .close {
        float: right;
        background-color: rgba(180, 8, 8, 0.95);
        border-radius: 50%;
    }
</style>
@include('vendors.includes.head')


<aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3 "
    style="background: linear-gradient(#2c3e50 , #2c3e50)" id="sidenav-main">
    @include('vendors.includes.logo')
    <hr class="horizontal dark mt-0" style="background:white">
    @include('vendors.includes.nav')
</aside>
<main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
    <div>
        </br>
    </div>
    <!-- Navbar -->
    @include('vendors.includes.header')
    <!-- End Navbar -->
    <div class="container-fluid py-4">
        @yield('content')
    </div>
</main>


<form action="{{ route('logout') }}" method="POST" id="logout-form-b">
    @csrf
    <!-- <button type="submit" class="btn btn-primary btn-block">Logout</button> -->
</form>

<!--   Core JS Files   -->
<script src="{{ asset('soft_ui/js/core/popper.min.js') }}"></script>
{{--<script src="{{ asset('soft_ui/js/core/bootstrap.min.js') }}"></script>--}}
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-p34f1UUtsS3wqzfto5wAAmdvj+osOnFyQFpp4Ua3gs/ZVWx6oOypYoCJhGGScy+8" crossorigin="anonymous"></script>

<!-- Plugin for the charts, full documentation here: https://www.chartjs.org/ -->
<script src="{{ asset('soft_ui/js/plugins/chartjs.min.js') }}"></script>
<script src="{{ asset('soft_ui/js/plugins/Chart.extension.js') }}"></script>

<!-- Control Center for Soft UI Dashboard: parallax effects, scripts for the example pages etc -->
<script src="{{ asset('soft_ui/js/soft-ui-dashboard.min.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
</body>

{{-- Custom Scripts --}}
<script src="{{ asset('js/notify.min.js') }}"></script>
<script>
    @if(\Illuminate\Support\Facades\Session::has("message"))
    jQuery(document).ready(function () {
        var content = {};

        content.message = "{{\Illuminate\Support\Facades\Session::get("message")}}";
        var notify = $.notify(content, {
            type: "{{\Illuminate\Support\Facades\Session::get("type") ?: "info"}}",
            allow_dismiss: true,
            animate: {
                enter: 'animated bounce notify-size',
                exit: 'animated fadeOut'
            }
        });
    });

    @endif

    function showMessage(type, message) {
        $.notify(message, {
            type: type ?? "info",
            allow_dismiss: true,
            animate: {
                enter: 'animated bounce',
                exit: 'animated fadeOut'
            }
        });
    }

    function showFailedMessage(error_message) {
        error_message = (error_message) ? error_message : 'Error!'
        $.notify(error_message, {
            type: "danger",
            allow_dismiss: true,
            animate: {
                enter: 'animated bounce',
                exit: 'animated fadeOut'
            }
        });
    }

    function showValidationFailedMessage(error_message) {
        error_message = (error_message) ? error_message : 'Please check the input fields!'
        $.notify(error_message, {
            type: "danger",
            allow_dismiss: true,
            animate: {
                enter: 'animated bounce',
                exit: 'animated fadeOut'
            }
        });
    }

    function showSuccessMessage(success_message) {
        success_message = (success_message) ? success_message : 'Success!';
        $.notify(success_message, {
            type: "success",
            allow_dismiss: true,
            animate: {
                enter: 'animated bounce',
                exit: 'animated fadeOut'
            }
        });
    }
</script>

@yield('js')
</html>
