@extends('layouts.admin')

@section('title', 'Quản lí liên hệ')

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
        <h1>Quản lí liên hệ</h1>
      </div>
    
    </div>
  </div>
</section>

<section class="content">
  <div class="card">
    <div class="card-header">
      <div class="row">
        <div class="col-12 text-right">
          <a class="btn btn-sm btn-danger" href="{{ route('admin.contact.trash') }}">Thùng rác
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
            <th class="text-center">Họ tên</th>
            <th class="text-center">Điện thoại</th>
            <th class="text-center">Email</th>
            <th class="text-center">Tiêu đề</th>
            <th class="text-center">Đã trả lời</th>
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
            <td>{{ $row->name }}</td>
            <td>{{ $row->phone }}</td>
            <td>{{ $row->email }}</td>
            <td>{{ $row->title }}</td>
            
            <td class="text-center">
              @if($row->reply && $row->reply != '') 
                <span class="badge badge-success">Đã trả lời</span>
              @else
                <span class="badge badge-secondary">Chưa trả lời</span>
              @endif
            </td>
        
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

              <!-- Hiển thị nút "Trả lời" chỉ khi chưa trả lời -->
              @if (!$row->reply || $row->reply == '')
                <a href="{{ route('admin.contact.reply', $row->id) }}" class="btn btn-primary btn-sm">
                  <i class="fas fa-reply"></i>
                </a>
              @endif

              <a href="{{ route('admin.contact.show', $row->id) }}" class="btn btn-info btn-sm">
                <i class="fas fa-eye"></i>
              </a>
              <a href="{{ route('admin.contact.delete', $row->id) }}" class="btn btn-danger btn-sm">
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
              const contactId = this.getAttribute('data-id');
              const button = this;

              fetch(`{{ url('admin/contact/status/') }}/${contactId}`, {
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
