@extends('admin.admin_master')
@section('title') {{ $pageTitle }} @endsection

@section('content')

<!-- Main content -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">{{ $pageTitle }}</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Home</a></li>
                </ol>
            </div>
        </div><!-- /.row -->
    </div>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card card-primary card-outline">
                        <div class="card-header">
                            <h3 class="card-title">{{ $subTitle }}</h3>
                            <a href="{{route('admin.attributes.index')}}" class="btn btn-success float-right"><i class="fa fa-list"></i> View Attributes</a>
                        </div>
                        <div class="card-body">
                            <form action="" method="post" role="form">
                                @csrf
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label for="code">Code</label>
                                        <input type="text" name="code" id="code" placeholder="Enter Attribute Code" class="form-control" value="{{old('code')}}">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="name">Name</label>
                                        <input type="text" name="name" id="name" placeholder="Enter Attribute Name" class="form-control" value="{{old('name')}}">
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label class="control-label" for="frontend_type">Frontend Type</label>
                                        @php $types = ['select' => 'Select Box', 'radio' => 'Radio Button', 'text' => 'Text Field', 'text_area' => 'Text Area']; @endphp
                                        <select name="frontend_type" id="frontend_type" class="form-control">
                                            @foreach($types as $key => $label)
                                                <option value="{{ $key }}">{{ $label }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group col-md-12">
                                        <div class="form-check">
                                            <label class="form-check-label">
                                                <input class="form-check-input" type="checkbox" id="is_filterable" name="is_filterable"/>Filterable
                                            </label>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-12">
                                        <div class="form-check">
                                            <label class="form-check-label">
                                                <input class="form-check-input" type="checkbox" id="is_required" name="is_required"/>Required
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <div class="row d-print-none mt-2">
                                        <div class="col-12 text-right">
                                            <button class="btn btn-success" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Save Attribute</button>
                                            <a class="btn btn-danger" href="{{ route('admin.attributes.index') }}"><i class="fa fa-fw fa-lg fa-arrow-left"></i>Go Back</a>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

@endsection
