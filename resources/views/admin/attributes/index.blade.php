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
                            <a href="{{route('admin.attributes.create')}}" class="btn btn-success float-right"><i class="fa fa-plus-circle">Add Attribute</i></a>
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered table-hover" id="example2">
                                <thead>
                                    <tr>
                                        <th> # </th>
                                        <th> Code </th>
                                        <th> Name </th>
                                        <th class="text-center"> Frontend Type </th>
                                        <th class="text-center"> Filterable </th>
                                        <th class="text-center"> Required </th>
                                        <th style="width:100px; min-width:100px;" class="text-center text-danger"><i class="fa fa-bolt"> </i></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $i=1;
                                    @endphp
                                    @forelse ($attributes as $attribute )
                                    <tr>
                                        <td>{{$i++}}</td>
                                        <td>{{ $attribute->code }}</td>
                                        <td>{{ $attribute->name }}</td>
                                        <td class="text-center">{{ $attribute->frontend_type }}</td>
                                        <td class="text-center">
                                            @if ($attribute->is_filterable == 1)
                                                <span class="badge badge-success">Yes</span>
                                            @else
                                                <span class="badge badge-danger">No</span>
                                            @endif
                                        </td>
                                        <td class="text-center">
                                            @if ($attribute->is_required == 1)
                                                <span class="badge badge-success">Yes</span>
                                            @else
                                                <span class="badge badge-danger">No</span>
                                            @endif
                                        </td>
                                        <td class="text-center">
                                            <a href="{{ route('admin.attributes.edit', $attribute->id) }}" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></a>
                                            <a href="{{ route('admin.attributes.delete', $attribute->id) }}" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
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
</div>
@endsection

