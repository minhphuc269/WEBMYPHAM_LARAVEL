@extends('layouts.admin')
@section('title','Quản lí Banner')
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
        <h1>Quản lí Banner</h1>
      </div>
     
    </div>
  </div>
</section>
<section class="content">
  <div class="card">
    <div class="card-header">
      <div class="row">
        <div class="col-12 text-right">

          <a class="btn btn-sm btn-danger" href="{{ route('admin.banner.trash') }}">Thùng rác
            <i class="fas fa-trash"></i>
          </a>
        </div>
      </div>
    </div>
    <div class="card-body">
      <div class="row">
        <div class="col-md-3">
          <form action="{{ route('admin.banner.store') }}" method="post" enctype="multipart/form-data">
            @csrf  
            <div class="mb-3">
              <label for="name">Tên banner</label>
              <input type="text" value="{{ old('name') }}" name="name" id="name" class="form-control">
              @error('name')
                <span class="text-danger">{{ $message }}</span>
              @enderror            
            </div>
            <div class="mb-3">
              <label for="link">Liên kết</label>
              <input type="text" value="{{ old('link') }}" name="link" id="link" class="form-control">
              @error('link')
                <span class="text-danger">{{ $message }}</span>
              @enderror   
            </div>
            <div class="mb-3">
              <label for="description">Mô tả</label>
              <textarea name="description" id="description" class="form-control">{{ old('description') }}</textarea>
            </div>
            <div class="mb-3">
              <label for="position">Vị trí sau: </label>
              <select name="position" id="position" class="form-control">
                <option value="None">None</option>
                {!! $htmlsortorder !!}
              </select>
              @error('position')
              <span class="text-danger">{{ $message }}</span>
              @enderror   
            </div>
            <div class="mb-3">
              <label for="image">Hình</label>
              <input type="file" name="image" id="image" class="form-control">
              @error('image')
                <span class="text-danger">{{ $message }}</span>
              @enderror   
            </div>
            <div class="mb-3">
              <label for="status">Trạng thái</label>
              <select name="status" id="status" class="form-control">
                <option value="2">Chưa xuất bản</option>
                <option value="1">Xuất bản</option>
              </select>
            </div>
            <div class="mb-3">
              <button type="submit" name="create" class="btn btn-success">Thêm banner</button>
            </div>
          </form>
        </div>
       
      <div class="col-md-9">
        <table class="table table-bordered table-hover table-striped">
          <thead>
            <th class="text-center" style="width:30px">#</th>
            <th class="text-center" style="width:140px">Hình</th>
            <th class="text-center">Tên Banner</th>
            <th class="text-center">Liên kết</th>
            <th class="text-center">Vị trí</th>
            <th class="text-center" style="width:140px">Chức năng</th>
            <th class="text-center" style="width:30px">id</th>
          </thead>
          <tbody>
            @foreach ($list as $row)
            @php
            $arg=['id'=>$row->id];
            @endphp
            <tr>
              <td class="text-center">
                <input type="checkbox" name="checkID[]" id="checkID" value="1">
              </td>
              <td class="text-center">
                <img src="{{ asset("images/banners/".$row->image) }}" class="img-fluid" alt="{{ $row->image }}">
              </td>

              <td>
                {{ $row->name }}
              </td>
              <td>
                {{ $row->link }}
              </td>
              <td>
                {{ $row->position }}
              </td>
              <td class="text-center">
                @if ($row->status == 1)
                      <a href="javascript:void(0);" class="btn btn-success btn-xs toggle-status" data-id="{{ $row->id }}">
                          <i class="fas fa-toggle-on"></i>
                      </a>
                  @else
                      <a href="javascript:void(0);" class="btn btn-danger btn-xs toggle-status" data-id="{{ $row->id }}">
                          <i class="fas fa-toggle-off"></i>
                      </a>
                  @endif
                <a href="{{ route('admin.banner.edit', $row->id) }}" class="btn btn-primary btn-xs">
                  <i class="fas fa-edit"></i>
                </a>
                <a href="{{ route('admin.banner.show', $row->id) }}" class="btn btn-info btn-xs">
                  <i class="fas fa-eye"></i>
                </a>
                <a href="{{ route('admin.banner.delete', $row->id) }}" class="btn btn-danger btn-xs">
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
              const bannerId = this.getAttribute('data-id');
              const button = this;
  
              fetch(`{{ url('admin/banner/status/') }}/${bannerId}`, {
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