@extends('layouts.admin')
@section('title','Cập nhật mã giảm giá')
@section('content')

<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Cập nhật mã giảm giá</h1>
      </div>
    </div>
  </div>
</section>
<section class="content">
  <div class="card">
    <div class="card-header">
      <div class="row">
        <div class="col-12 text-right">
          <a class="btn btn-sm btn-info" href="{{ route('admin.coupon.index') }}">
            <i class="fas fa-arrow-left"> Về danh sách</i>
          </a>
        </div>
      </div>
    </div>
    <div class="card-body">
      <form action="{{ route('admin.coupon.update', ['id' => $coupon->id]) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method("PUT")
        
        <div class="mb-3">
            <label for="name">Tên mã giảm giá</label>
            <input type="text" value="{{ old('name', $coupon->name) }}" name="name" id="name" class="form-control">
            @error('name')
            <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="mb-3">
            <label for="code">Mã giảm giá</label>
            <input type="text" value="{{ old('code', $coupon->code) }}" name="code" id="code" class="form-control">
            @error('code')
            <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="mb-3">
            <label for="description">Mô tả</label>
            <textarea name="description" id="description" class="form-control">{{ old('description', $coupon->description) }}</textarea>
        </div>
        <div class="mb-3">
          <label for="image">Hình</label>
          <input type="file" name="image" id="image" class="form-control">
        </div>
        <div class="mb-3">
            <label for="qty">Số lượng mã</label>
            <input type="number" value="{{ old('qty', $coupon->qty) }}" name="qty" id="qty" class="form-control">
            @error('qty')
            <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="mb-3">
            <label for="condition_coupon">Giảm theo</label>
            <select name="condition_coupon" id="condition_coupon" class="form-control">
                <option value="0" {{ old('condition_coupon', $coupon->condition_coupon) == 0 ? 'selected' : '' }}>Chọn</option>
                <option value="1" {{ old('condition_coupon', $coupon->condition_coupon) == 1 ? 'selected' : '' }}>Phần trăm</option>
                <option value="2" {{ old('condition_coupon', $coupon->condition_coupon) == 2 ? 'selected' : '' }}>Tiền</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="pricesale">Số % hoặc tiền giảm</label>
            <input type="number" value="{{ old('pricesale', $coupon->pricesale) }}" name="pricesale" id="pricesale" class="form-control">
            @error('pricesale')
            <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="mb-3">
            <label for="status">Trạng thái</label>
            <select name="status" id="status" class="form-control">
              <option value="2" {{ $coupon->status == 2 ? 'selected' : '' }}>Chưa xuất bản</option>
              <option value="1" {{ $coupon->status == 1 ? 'selected' : '' }}>Xuất bản</option>
            </select>
          </div>
        <div class="mb-3 mt-3 d-flex justify-content-center">
          <button type="submit" name="create" class="btn btn-success">Cập nhật mã giảm giá</button>
        </div>
      </form>
  </div>
</section>
@endsection
