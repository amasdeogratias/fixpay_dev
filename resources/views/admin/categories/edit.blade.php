@extends('admin.admin_master')
@section('title') Add Categories @endsection
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
                            @include('admin.partials.flash')
                        </div>
                        <div class="card-body">
                            <form action="{{route('admin.categories.update')}}" method="post" autocomplete="off" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label for="name">Name<span class="m-l-5 text-danger"> *</span></label>
                                        <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name" value="{{ $targetCategory->name }}" placeholder="Category name" {{ old('name') }}>
                                        <input type="hidden" name="id" id="id" value="{{ $targetCategory->id }}">
                                        @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="description">Description</label>
                                        <textarea class="form-control" rows="2" name="description" id="description">{{ old('description', $targetCategory->description) }}</textarea>
                                    </div>
                                    <br>
                                    <div class="form-group col-md-6">
                                        <label for="parent">Parent Category<span class="m-l-5 text-danger"> *</span></label>
                                        <select id=parent class="form-control custom-select mt-15 @error('parent_id') is-invalid @enderror" name="parent_id">
                                            <option value="0">Select a parent category</option>
                                            @foreach($categories as $key => $category)
                                                @if ($targetCategory->parent_id == $key)
                                                    <option value="{{ $key }}" selected> {{ $category }} </option>
                                                @else
                                                    <option value="{{ $key }}"> {{ $category }} </option>
                                                @endif
                                            @endforeach
                                        </select>
                                        @error('parent_id') {{ $message }} @enderror
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label class="control-label">Category Image</label>
                                        @if ($targetCategory->image !='')
                                            <figure class="mt-2" style="width: 80px; height: auto;">
                                                <img src="{{ asset('storage/'.$targetCategory->image) }}" id="categoryImage" class="img-fluid" alt="img">
                                            </figure>
                                        @else
                                            <input class="form-control @error('image') is-invalid @enderror" type="file" id="image" name="image"/>
                                        @endif
                                        @error('image') {{ $message }} @enderror
                                    </div>
                                    <div class="form-group col-md-6">
                                        <div class="form-check">
                                            <label class="form-check-label">
                                                <input class="form-check-input" type="checkbox" id="featured" name="featured" {{ $targetCategory->featured == 1 ? 'checked' : '' }}/>Featured Category
                                            </label>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <div class="form-check">
                                            <label class="form-check-label">
                                                <input class="form-check-input" type="checkbox" id="menu" name="menu" {{ $targetCategory->menu == 1 ? 'checked' : '' }}/>Show in Menu
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <button class="btn btn-success" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Save Category</button>
                                    &nbsp;&nbsp;&nbsp;
                                    <a class="btn btn-secondary" href="{{ route('admin.categories.index') }}"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cancel</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

