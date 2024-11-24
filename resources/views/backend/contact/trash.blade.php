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
        <h1>Thùng rác liên hệ</h1>
      </div>
     
    </div>
  </div>
</section>

<section class="content">
  <div class="card">
    <div class="card-header">
      <div class="row">
        <div class="col-12 text-right">

          <a class="btn btn-sm btn-info" href="{{ route("admin.contact.index")}}">
            <i class="fa fa-arrow-left"></i> Về danh sách
          </a>
        </div>
      </div>
    </div>
    <div class="card-body">
      @if ($list->isEmpty())
      <div class="text-center">
        <p>Thùng rác rỗng</p>
      </div>
      @else
      <table class="table table-bordered table-hover table-striped">
        <thead>
          <tr>
            <th class="text-center" style="width:30px">#</th>
            <th class="text-center">Họ tên</th>
            <th class="text-center">Điện thoại</th>
            <th class="text-center">Email</th>
            <th class="text-center">Tiêu đề</th>
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
              <a href="{{ route('admin.contact.show', $row->id) }}" class="btn btn-primary btn-sm">
                <i class="fas fa-eye"></i>
              </a>
              <a href="{{ route('admin.contact.restore', $arg) }}" class="btn btn-success btn-sm mr-1">
                <i class="fas fa-undo-alt"></i>
              </a>
              <form action="{{ route('admin.contact.destroy', $arg) }}" method="POST" class="d-inline">
                @csrf
                @method('delete')
                <button class="btn btn-danger btn-sm" name="delete" type="submit">
                  <i class="fas fa-trash"></i>
                </button>
              </form>
            </td>
            <td class="text-center">{{ $row->id }}</td>
          </tr>
          @endforeach
        </tbody>
      </table>
      @endif
    </div>
  </div>
</section>
@endsection