<!DOCTYPE html>
<html lang="en">
<head>
   @include('include.style')

</head>

<body>
    <div id="app">
        @include('include.sidebar')
        <div id="main">
            <header class="mb-3">
                <a href="#" class="burger-btn d-block d-xl-none">
                    <i class="bi bi-justify fs-3"></i>
                </a>
            </header>
            @include('sweetalert::alert')

            @yield('content')

           @include('include.footer')
        </div>
    </div>
   
@include('include.script')
</body>

</html>
