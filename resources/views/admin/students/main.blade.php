<!DOCTYPE html>
<html>

<head>
    {{-- @include('admin.users.head') --}}
    <meta charset="utf-8">
    <title>{{ $title }}</title>
    <link rel="stylesheet" type="text/css" href="/template/admin/css/style_index.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="/template/admin/plugins/fontawesome-free/css/all.min.css">
    <!-- IonIcons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="/template/admin/dist/css/adminlte.min.css">
    <!-- -->
    <link rel="stylesheet" href="http://cdn.bootcss.com/toastr.js/latest/css/toastr.min.css">
    <!-- ajax -->
    <meta name="csrf-token" id="csrf-token" content="{{ csrf_token() }}">
    @yield('head')
</head>

<body>
    @include('admin.students.header')
    <div class="main" id="main">
        @yield('content')
    </div>

    @include('admin.students.footer')
    @include('admin.users.foot')
    <script src="http://cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script>
    {!! Toastr::message() !!}
</body>

</html>
