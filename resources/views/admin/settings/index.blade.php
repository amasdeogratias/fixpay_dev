@extends('admin.admin_master')
@section('title') {{ $pageTitle }} @endsection

@section('content')

<!-- Main content -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">
                    {{ $pageTitle }}
                </h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Home</a></li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                @include('admin.partials.flash')
                <div class="col-3 col-sm-3">
                    <div class="card p-0">
                        <ul class="nav flex-column nav-tabs user-tabs">
                            <li class="nav-item"><a class="nav-link active" href="#general" data-toggle="tab">General</a></li>
                            <li class="nav-item"><a class="nav-link" href="#site-logo" data-toggle="tab">Site Logo</a></li>
                            <li class="nav-item"><a class="nav-link" href="#footer-seo" data-toggle="tab">Footer &amp; SEO</a></li>
                            <li class="nav-item"><a class="nav-link" href="#social-links" data-toggle="tab">Social Links</a></li>
                            <li class="nav-item"><a class="nav-link" href="#analytics" data-toggle="tab">Analytics</a></li>
                            <li class="nav-item"><a class="nav-link" href="#payments" data-toggle="tab">Payments</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-9">
                    <div class="tab-content">
                        <div class="tab-pane active" id="general">
                            @include('admin.settings.includes.general')
                        </div>
                        <div class="tab-pane fade" id="site-logo">
                            @include('admin.settings.includes.logo')
                        </div>
                        <div class="tab-pane fade" id="footer-seo">
                            @include('admin.settings.includes.footer_seo')
                        </div>
                        <div class="tab-pane fade" id="social-links">
                            @include('admin.settings.includes.social_links')
                        </div>
                        <div class="tab-pane fade" id="analytics">
                            @include('admin.settings.includes.analytics')
                        </div>
                        <div class="tab-pane fade" id="payments">
                            @include('admin.settings.includes.payments')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
