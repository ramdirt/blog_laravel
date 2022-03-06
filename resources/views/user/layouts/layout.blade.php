<!DOCTYPE html>
<html lang="en">

@include('user.layouts.head')

<body>

    <div class="wrapper">

        @yield('content')

    </div>

    <script type="text/javascript" src="{{ asset('assets/user/js/user.js') }}"></script>
</body>

</html>
