@extends('layouts.admin')

@section('title', 'Quản lí đơn hàng')

@section('content')
@if (session('success'))
<div class="alert alert-success">
    {{ session('success') }}
</div>
@endif
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Quản lí đơn hàng</h1>
      </div>
      
    </div>
  </div>
</section>

<section class="content">
  <div class="card">
    <div class="card-header">
      <div class="row">
        <div class="col-12 text-right">
          <a class="btn btn-sm btn-danger" href="{{ route('admin.order.trash') }}">Thùng rác
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
            <th class="text-center">Mã đơn hàng</th>
            <th class="text-center">Khách hàng</th>
            <th class="text-center">Ngày đặt hàng</th>
            <th class="text-center">Phương thức thanh toán</th>
            <th class="text-center">Trạng thái đơn</th>
            <th class="text-center">Chức năng</th>
          </tr>
        </thead>
        <tbody>
          @foreach($list as $row)
          @php
          $arg = ['id' => $row->id];
          @endphp
          <tr>
            <td class="text-center">
              <input type="checkbox" name="checkID[]" id="checkID" value="{{ $row->id }}">
            </td>
            <td>{{ $row->order_code }}</td> <!-- Hiển thị mã đơn hàng -->
            <td>{{ $row->delivery_name }}</td> <!-- Hiển thị tên khách hàng -->
            <td>{{ $row->created_at->format('d/m/Y H:i') }}</td> <!-- Hiển thị ngày tạo -->
            <td>{{ $row->type }}</td> <!-- Hiển thị loại đơn hàng -->
            <td>{{ $row->status_order }}</td>
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

              <a href="{{ route('admin.order.show', $arg) }}" class="btn btn-sm btn-info">
                <i class="fas fa-eye"></i>
              </a>
              <a href="{{ route('admin.order.delete', $arg) }}" class="btn btn-sm btn-danger">
                <i class="fas fa-trash"></i>
              </a>
            </td>
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
            const orderId = this.getAttribute('data-id');
            const button = this;

            fetch(`{{ url('admin/order/status/') }}/${orderId}`, {
                method: 'GET',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                }
            })
            .then(response => {
                if (!response.ok) {
                    throw new Error('Network response was not ok');
                }
                return response.json();
            })
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
            .catch(error => console.error('Error:', error.message));
        });
    });
  });
</script>
@endsection
