<!DOCTYPE html>
<html lang="en">

@include('layout.head')

<body>
    <div class="d-flex flex-row flex-grow-1 bg-light full-height">
        @include('layout.left-sidebar')
        <div class="flex-grow-1">
            @include('layout.header')
            <div class="container-md">
                {{-- Page content goes here --}}
                @yield('content')
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
    <script src="{{asset('js/main.js')}}"></script>
</body>

</html>
