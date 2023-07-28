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
                    <div class="card card-default">
                        <div class="card-header">
                            <h3 class="card-title"></h3>
                            <a href="{{route('admin.brands.create')}}" class="btn btn-success"><i class="fa fa-plus-circle">Add Brand</i></a>
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered table-hover" id="example2">
                                <thead>
                                    <tr>
                                        <th> # </th>
                                        <th> Name </th>
                                        <th> Slug </th>
                                        <th style="width:100px; min-width:100px;" class="text-center text-danger"><i class="fa fa-bolt"> </i></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $i=1;
                                    @endphp
                                    @forelse ($brands as $brand )
                                    <tr>
                                        <td>{{$i++}}</td>
                                        <td>{{ $brand->name }}</td>
                                        <td>{{ $brand->slug }}</td>
                                        <td class="text-center">
                                            <a href="{{ route('admin.brands.edit', $brand->id) }}" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></a>
                                            <a href="{{ route('admin.brands.delete', $brand->id) }}" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
                                        </td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td>No brands data available</td>
                                    </tr>

                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

