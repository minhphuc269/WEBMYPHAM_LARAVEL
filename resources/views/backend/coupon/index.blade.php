@extends('layouts.admin')
@section('title','Quản lí mã giảm giá')
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
                <h1>Quản lí mã giảm giá</h1>
            </div>
           
        </div>
    </div>
</section>
<section class="content">
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-12 text-right">

                    <a class="btn btn-sm btn-danger" href="{{ route('admin.coupon.trash') }}">Thùng rác
                        <i class="fas fa-trash"></i>
                    </a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-4">

                    <form action="{{ route('admin.coupon.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="name">Tên mã giảm giá</label>
                            <input type="text" value="{{ old('name') }}" name="name" id="name" class="form-control">
                            @error('name')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="code">Mã giảm giá</label>
                            <input type="text" value="{{ old('code') }}" name="code" id="code" class="form-control">
                            @error('code')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        
                        <div class="mb-3">
                            <label for="description">Mô tả</label>
                            <textarea name="description" id="description"
                                class="form-control">{{ old('description') }}</textarea>
                        </div>
                        <div class="mb-3">
                            <label for="image">Hình</label>
                            <input type="file" name="image" id="image" class="form-control">
                          </div>
                        <div class="mb-3">
                            <label for="qty">Số lượng mã</label>
                            <input type="number" value="{{ old('qty') }}" name="qty" id="qty" class="form-control">
                            @error('qty')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="condition_coupon">Giảm theo</label>
                            <select name="condition_coupon" id="condition_coupon" class="form-control">
                                <option value="0">Chọn</option>
                                <option value="1">Phần trăm</option>
                                <option value="2">Tiền</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="pricesale">Số % hoặc tiền giảm</label>
                            <input type="number" value="{{ old('pricesale') }}" name="pricesale" id="pricesale"
                                class="form-control">
                            @error('pricesale')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        {{-- <div class="mb-3">
                            <label for="status">Trạng thái</label>
                            <select name="status" id="status" class="form-control">
                                <option value="2">Chưa xuất bản</option>
                                <option value="1">Xuất bản</option>
                            </select>
                        </div> --}}
                        <div class="mb-3">
                            <button type="submit" name="create" class="btn btn-success">Thêm mã giảm giá</button>
                        </div>
                    </form>
                </div>
                <div class="col-md-8">
                    <table class="table table-bordered table-hover table-striped">
                        <thead>
                            <th class="text-center" style="width:30px">#</th>
                            <th class="text-center">Tên mã giảm giá</th>
                            <th class="text-center">Mã giảm giá</th>
                            <th class="text-center">Số lượng</th>
                            <th class="text-center" style="width:140px">Chức năng</th>
                            <th class="text-center" style="width:30px">id</th>
                        </thead>
                        <tbody>
                            @foreach ($list as $row)
                            @php
                            $args=['id'=>$row->id];
                            @endphp
                            <tr>
                                <td class="text-center">
                                    <input type="checkbox" name="checkID[]" id="checkID" value="1">
                                </td>


                                <td>
                                    {{ $row->name }}
                                </td>
                                <td>
                                    {{ $row->code }}
                                </td>
                                <td>
                                    {{ $row->qty }}
                                </td>
                                <td class="text-center">
                                    @if ($row->status == 1)
                                    <a href="javascript:void(0);" class="btn btn-success btn-xs toggle-status"
                                        data-id="{{ $row->id }}">
                                        <i class="fas fa-toggle-on"></i>
                                    </a>
                                    @else
                                    <a href="javascript:void(0);" class="btn btn-danger btn-xs toggle-status"
                                        data-id="{{ $row->id }}">
                                        <i class="fas fa-toggle-off"></i>
                                    </a>
                                    @endif

                                    <a href="{{ route('admin.coupon.edit', $args) }}" class="btn btn-primary btn-xs">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <a href="{{ route('admin.coupon.show', $args) }}" class="btn btn-info btn-xs">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    <a href="{{ route('admin.coupon.delete', $row->id) }}"
                                        class="btn btn-danger btn-xs">
                                        <i class="fas fa-trash"></i>
                                    </a>
                                </td>

                                <td class="text-center">{{ $row->id }}</td>
                            </tr>
                            @endforeach

                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
</section>

<script>
    document.addEventListener('DOMContentLoaded', function() {
      document.querySelectorAll('.toggle-status').forEach(function(button) {
          button.addEventListener('click', function() {
              const couponId = this.getAttribute('data-id');
              const button = this;

              fetch(`{{ url('admin/coupon/status/') }}/${couponId}`, {
                  method: 'GET',
                  headers: {
                      'Content-Type': 'application/json',
                      'X-CSRF-TOKEN': '{{ csrf_token() }}'
                  }
              })
              .then(response => response.json())
              .then(data => {
                  if (data.status == 1) {
                      button.classList.remove('btn-danger');
                      button.classList.add('btn-success');
                      button.innerHTML = '<i class="fas fa-toggle-on"></i>';
                  } else {
                      button.classList.remove('btn-success');
                      button.classList.add('btn-danger');
                      button.innerHTML = '<i class="fas fa-toggle-off"></i>';
                  }
              })
              .catch(error => console.error('Error:', error));
          });
      });
  });
</script>
@endsection   
