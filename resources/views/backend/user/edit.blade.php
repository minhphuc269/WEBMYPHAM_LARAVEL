@extends('layouts.admin')

@section('title', 'Cập nhật thành viên')

@section('content')
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Cập nhật thành viên</h1>
      </div>
     
    </div>
  </div>
</section>

<section class="content">
  <div class="card">
    <div class="card-header">
      <div class="row">
        <div class="col-12 text-right">
          <a class="btn btn-sm btn-info" href="{{ route('admin.user.index') }}">
            <i class="fa fa-arrow-left"></i> Về danh sách
        </a>
          <a class="btn btn-sm btn-danger" href="{{ route('admin.user.trash') }}">Thùng rác
            <i class="fas fa-trash"></i>
          </a>
        </div>
      </div>
    </div>
    <div class="card-body">
      <form action="{{ route('admin.user.update',['id'=>$user->id]) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method("put")
        <div class="row">
          <div class="col-md-6">
            <div class="mb-3">
              <label for="name">Họ tên</label>
              <input type="text" value="{{ old('name', $user->name) }}" name="name" id="name" class="form-control">
              @error('name')
              <span class="text-danger">{{ $message }}</span>
              @enderror
            </div>
            <div class="mb-3">
              <label for="phone">Điện thoại</label>
              <input type="text" value="{{ old('phone', $user->phone) }}" name="phone" id="phone" class="form-control">
              @error('phone')
              <span class="text-danger">{{ $message }}</span>
              @enderror
            </div>
            <div class="mb-3">
              <label for="email">Email</label>
              <input type="text" value="{{ old('email', $user->email) }}" name="email" id="email" class="form-control">
              @error('email')
              <span class="text-danger">{{ $message }}</span>
              @enderror
            </div>
            <div class="mb-3">
              <label for="gender">Giới tính</label>
              <select name="gender" id="gender" class="form-control">
                <option value="1" {{ $user->status == 1 ? 'selected' : '' }}>Nam</option>
                <option value="0" {{ $user->status == 0 ? 'selected' : '' }}>Nữ</option>
              </select>
            </div>
            <div class="mb-3">
              <label for="address">Địa chỉ</label>
              <input type="text" value="{{ old('address', $user->address) }}" name="address" id="address" class="form-control">
            </div>
            <div class="mb-3">
              <label for="image">Hình</label>
              <input type="file" name="image" id="image" class="form-control">

            </div>
          </div>
          <div class="col-md-6">
            {{-- <div class="mb-3">
              <label for="username">Tên đăng nhập</label>
              <input type="text" value="{{ old('username', $user->username) }}" name="username" id="username" class="form-control">
              @error('username')
              <span class="text-danger">{{ $message }}</span>
              @enderror
            </div> --}}
            <div class="mb-3">
              <label for="password">Mật khẩu</label>
              <input type="password" value="" name="password" id="password" class="form-control">
              @error('password')
              <span class="text-danger">{{ $message }}</span>
              @enderror
            </div>
            <div class="mb-3">
              <label for="password_re">Xác nhận mật khẩu</label>
              <input type="password" value="" name="password_re" id="password_re" class="form-control">
              @error('password_re')
              <span class="text-danger">{{ $message }}</span>
              @enderror
            </div>
            <div class="mb-3">
              <label for="roles">Quyền</label>
              <select name="roles" id="roles" class="form-control">
                <option value="customer" {{ $user->roles == 'customer' ? 'selected' : '' }}>Khách hàng</option>
                <option value="admin" {{ $user->roles == 'admin' ? 'selected' : '' }}>Quản lý</option>
              </select>
            </div>
            <div class="mb-3">
              <label for="status">Trạng thái</label>
              <select name="status" id="status" class="form-control">
                <option value="2" {{ $user->status == 2 ? 'selected' : '' }}>Chưa xuất bản</option>
                <option value="1" {{ $user->status == 1 ? 'selected' : '' }}>Xuất bản</option>
              </select>
            </div>
            <div class="mb-3 mt-3 d-flex justify-content-center">
              <button type="submit" name="create" class="btn btn-success">Cập nhật thành viên</button>
            </div>
          </div>
      </form>
    </div>
</section>
@endsection