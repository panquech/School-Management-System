@extends('layouts.application')

@section('layout-content')
<!-- Layout wrapper -->
<div class="wrapper ">

    <!-- Layout navbar -->
    @include('layouts.includes.layout-sidenav')

    <!-- Layout container -->
    <div class="main-panel">
        <!-- Layout sidenav -->
        @include('layouts.includes.layout-navbar')

        <!-- Layout content -->
        <div class="content">

            <!-- Content -->
                @yield('content')
            <!-- / Content -->

            <!-- Layout footer -->
        </div>
        @include('layouts.includes.layout-footer')
        <!-- Layout content -->

    </div>
    <!-- / Layout container -->


    <!-- Overlay -->
    {{-- <div class="layout-overlay layout-sidenav-toggle"></div> --}}
</div>
<!-- / Layout wrapper -->
@endsection
