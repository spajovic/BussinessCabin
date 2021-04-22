@include('admin.components.admin-head')
<body>
<div class="wrapper">
    <div class="container-fluid">
        <div class="row admin-content">
            @include('admin.components.admin-nav')
            @yield('admnContent')
        </div>
    </div>
</div>
@include('admin.components.admin-skripts')
