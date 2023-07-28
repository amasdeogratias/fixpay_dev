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
                <div class="col-12">
                    <div class="card card-primary card-outline">
                        <div class="card-header">
                            <h3 class="card-title">{{ $subTitle }}</h3>
                            <a href="{{route('admin.brands.index')}}" class="btn btn-success float-right"><i class="fa fa-list"> View brands</i></a>
                            @include('admin.partials.flash')
                        </div>
                        <div class="card-body">
                            <form action="{{route('admin.brands.store')}}" method="post" autocomplete="off" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label for="name">Name<span class="m-l-5 text-danger"> *</span></label>
                                        <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name" value="{{ $brand->name }}" placeholder="Brand name" {{ old('name') }}>
                                        <input type="hidden" name="id" id="id" value="{{ $brand->id }}">
                                        @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label class="control-label">Brand Logo</label>
                                        @if ($brand->logo != null)
                                            <figure class="mt-2" style="width: 80px; height: auto;">
                                                <img src="{{ asset('storage/'.$brand->logo) }}" id="brandLogo" class="img-fluid" alt="img">
                                            </figure>
                                            @else
                                            <input class="form-control @error('logo') is-invalid @enderror" type="file" id="logo" name="logo"/>
                                            @error('logo') {{ $message }} @enderror
                                        @endif
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <button class="btn btn-success" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Update Brand</button>
                                    &nbsp;&nbsp;&nbsp;
                                    <a class="btn btn-secondary" href="{{ route('admin.brands.index') }}"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cancel</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
