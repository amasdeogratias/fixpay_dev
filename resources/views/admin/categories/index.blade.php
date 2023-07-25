@extends('admin.admin_master')
@section('title') Categories @endsection
@section('content')

<!-- Main content -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">
                    Categories
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
                            <a href="{{route('admin.categories.create')}}" class="btn btn-success"><i class="fa fa-plus-circle">Add Category</i></a>
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered table-hover" id="example2">
                                <thead>
                                    <tr>
                                        <th> # </th>
                                        <th> Name </th>
                                        <th> Slug </th>
                                        <th class="text-center"> Parent </th>
                                        <th class="text-center"> Featured </th>
                                        <th class="text-center"> Menu </th>
                                        <th class="text-center"> Order </th>
                                        <th style="width:100px; min-width:100px;" class="text-center text-danger"><i class="fa fa-bolt"> </i></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $i=1;
                                    @endphp
                                    @foreach ($categories as $category )
                                    <tr>
                                        <td>{{$i++}}</td>
                                        <td>{{ $category->name }}</td>
                                        <td>{{ $category->slug }}</td>
                                        <td>{{ $category->description }}</td>
                                        <td class="text-center">
                                            @if ($category->featured == 1)
                                                <span class="badge badge-success">Yes</span>
                                            @else
                                                <span class="badge badge-danger">No</span>
                                            @endif
                                        </td>
                                        <td class="text-center">
                                            @if ($category->menu == 1)
                                                <span class="badge badge-success">Yes</span>
                                            @else
                                                <span class="badge badge-danger">No</span>
                                            @endif
                                        </td>
                                        <td class="text-center">
                                            {{ $category->order }}
                                        </td>
                                        <td class="text-center">
                                            <div class="btn-group" role="group" aria-label="Second group">
                                                <a href="{{ route('admin.categories.edit', $category->id) }}" class="btn btn-sm btn-primary"><i class="fa fa-edit"></i></a>
                                                <a href="" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a>
                                            </div>
                                        </td>
                                    </tr>

                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

