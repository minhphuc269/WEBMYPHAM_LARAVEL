@extends('layouts.admin')

@section('title', 'Cập nhật thương hiệu')

@section('content')
@if (session('success'))
    <div id="success-message" class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Cập nhật thương hiệu</h1>
            </div>
           
        </div>
    </div>
</section>

<section class="content">
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-12 text-right">
                    <a class="btn btn-sm btn-info" href="{{ route('admin.brand.index') }}">
                        <i class="fas fa-arrow-left"> Về danh sách</i>
                      </a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.brand.update', ['id' => $brand->id]) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('put')
                <div class="mb-3">
                    <label for="name">Tên thương hiệu</label>
                    <input type="text" value="{{ old('name', $brand->name) }}" name="name" id="name" class="form-control">
                    @error('name')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="description">Mô tả</label>
                    <textarea name="description" id="description" class="form-control">{{ old('description', $brand->description) }}</textarea>
                </div>
                <div class="mb-3">
                    <label for="sort_order">Sắp xếp sau:</label>
                    <select name="sort_order" id="sort_order" class="form-control">
                        <option value="0">None</option>
                        {!! $htmlsortorder !!}
                    </select>
                </div>
                <div class="mb-3">
                    <label for="image">Hình</label>
                    <input type="file" name="image" id="image" class="form-control" value="{{ old('image') }}">
                </div>
                <div class="mb-3">
                    <label for="status">Trạng thái</label>
                    <select name="status" id="status" class="form-control">
                        <option value="2" {{ $brand->status == 2 ? 'selected' : '' }}>Chưa xuất bản</option>
                        <option value="1" {{ $brand->status == 1 ? 'selected' : '' }}>Xuất bản</option>
                      </select>
                </div>
                <div class="mb-3 mt-3 d-flex justify-content-center">
                    <button type="submit" name="create" class="btn btn-success">Cập nhật brand</button>
                  </div>
                </form>
        </div>
    </div>
</section>
@endsection
