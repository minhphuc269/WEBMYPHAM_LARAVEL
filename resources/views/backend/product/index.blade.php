@extends('layouts.admin')

@section('title', 'Quản lí sản phẩm')

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
        <h1>Quản lí sản phẩm</h1>
      </div>
      
    </div>
  </div>
</section>

<section class="content">
  <div class="card">
    <div class="card-header">
      <div class="row">
        <div class="col-12 text-right">
          <a class="btn btn-sm btn-success" href="{{ route("admin.product.create")}}">Thêm
            <i class="fas fa-plus"></i>
          </a>
          <a class="btn btn-sm btn-danger" href="{{ route('admin.product.trash') }}">Thùng rác
            <i class="fas fa-trash"></i>
          </a>
        </div>
      </div>
    </div>
    <div class="card-body">
      <table class="table table-bordered table-hover table-striped">
        <thead>
          <tr>
            <th class="text-center" style="width:30px">#</th>
            <th class="text-center" style="width:190px">Hình</th>
            <th class="text-center">Tên</th>
            <th class="text-center">Danh mục</th>
            <th class="text-center">Thương hiệu</th>
            <th class="text-center" style="width:190px">Chức năng</th>
            <th class="text-center" style="width:30px">ID</th>
          </tr>
        </thead>
        <tbody>
          @foreach($list as $row)
          @php
          $arg=['id'=>$row->id];
          @endphp
          <tr>
            <td class="text-center">
              <input type="checkbox" name="checkID[]" id="checkID" value="{{ $row->id }}">
            </td>
            <td class="text-center">
              <img src="{{ asset("images/products/".$row->image) }}" class="img-fluid" alt="{{ $row->image }}">
            </td>
            <td>{{ $row->name }}</td>
            <td>{{ $row->categoryname }}</td>
            <td>{{ $row->brandname }}</td>
            <td class="text-center">
              @if ($row->status == 1)
              <a href="javascript:void(0);" class="btn btn-success btn-sm toggle-status" data-id="{{ $row->id }}">
                <i class="fas fa-toggle-on"></i>
              </a>
              @else
              <a href="javascript:void(0);" class="btn btn-danger btn-sm toggle-status" data-id="{{ $row->id }}">
                <i class="fas fa-toggle-off"></i>
              </a>
              @endif
              <a href="{{ route("admin.product.show", $arg) }}" class="btn btn-sm btn-info">
                <i class="fas fa-eye"></i>
              </a>
              <a href="{{ route("admin.product.edit", $arg) }}" class="btn btn-sm btn-primary">
                <i class="fas fa-edit"></i>
              </a>
              <a href="{{ route('admin.product.delete', $arg) }}" class="btn btn-sm btn-danger">
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
</section>

<script>
  document.addEventListener('DOMContentLoaded', function() {
    document.querySelectorAll('.toggle-status').forEach(function(button) {
      button.addEventListener('click', function() {
        const productId = this.getAttribute('data-id');
        const button = this;

        fetch(`{{ url('admin/product/status/') }}/${productId}`, {
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
