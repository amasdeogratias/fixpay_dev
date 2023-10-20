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
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered table-hover" id="example2">
                                <thead>
                                    <tr>
                                        <th> # </th>
                                        <th> Order Number </th>
                                        <th> Placed By </th>
                                        <th class="text-center"> Total Amount </th>
                                        <th class="text-center"> Items Qty </th>
                                        <th class="text-center"> Payment Status </th>
                                        <th class="text-center"> Status </th>
                                        <th style="width:100px; min-width:100px;" class="text-center text-danger"><i class="fa fa-bolt"> </i></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $i=1;
                                    @endphp
                                    @foreach ( $orders as $order )
                                    <tr>
                                        <td>{{$i++}}</td>
                                        <td>{{ $order->order_number }}</td>
                                        <td>{{ $order->user->fullName }}</td>
                                        <td class="text-center">{{ config('settings.currency_symbol') }}{{ $order->grand_total }}</td>
                                        <td class="text-center">{{ $order->item_count }}</td>
                                        <td class="text-center">
                                            @if ($order->payment_status == 1)
                                                <span class="badge badge-success">Completed</span>
                                            @else
                                                <span class="badge badge-danger">Not Completed</span>
                                            @endif
                                        </td>
                                        <td class="text-center">
                                            <span class="badge badge-success">{{ $order->status }}</span>
                                        </td>
                                        <td class="text-center">
                                            <div class="btn-group" role="group" aria-label="Second group">
                                                <a href="{{ route('admin.orders.show', $order->order_number) }}" class="btn btn-sm btn-primary"><i class="fa fa-edit"></i></a>
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
