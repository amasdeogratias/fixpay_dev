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
                            <a href="{{route('admin.products.create')}}" class="btn btn-success float-right"><i class="fa fa-plus-circle">Add Product</i></a>
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered table-hover" id="example2">
                                <thead>
                                    <tr>
                                        <th> # </th>
                                        <th> SKU </th>
                                        <th> Name </th>
                                        <th class="text-center"> Brand </th>
                                        <th class="text-center"> Categories </th>
                                        <th class="text-center"> Price </th>
                                        <th class="text-center"> Status </th>
                                        <th style="width:100px; min-width:100px;" class="text-center text-danger"><i class="fa fa-bolt"> </i></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $i=1;
                                    @endphp
                                    @foreach ($products as $product)
                                    <tr>
                                        <td>{{$i++}}</td>
                                        <td>{{ $product->sku }}</td>
                                        <td>{{ $product->name }}</td>
                                        <td>{{ $product->brand->name }}</td>
                                        <td>
                                            @foreach ($product->categories as $category)
                                                <span class="badge badge-info">{{ $category->name }}</span>
                                            @endforeach
                                        </td>
                                        <td>{{ config('settings.currency_symbol') }}{{ $product->price }}</td>
                                        <td class="text-center">
                                            @if ($product->status == 1)
                                                <span class="badge badge-success">Active</span>
                                            @else
                                                <span class="badge badge-danger">Not Active</span>
                                            @endif
                                        </td>
                                        <td class="text-center">
                                            <a href="{{ route('admin.products.edit', $product->id) }}" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></a>
                                            <a href="{{ route('admin.products.edit', $product->id) }}" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
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
</div>
@endsection

