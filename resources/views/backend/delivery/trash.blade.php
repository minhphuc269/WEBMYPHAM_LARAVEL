@extends('layouts.admin')
@section('title','Thùng rác vận chuyển')
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
        <h1>Thùng rác vận chuyển</h1>
      </div>
    
    </div>
  </div>
</section>
<section class="content">
  <div class="card">
    <div class="card-header">
      <div class="row">
        <div class="col-12 text-right">
          <a class="btn btn-sm btn-info" href="{{ route('admin.delivery.index') }}">
            <i class="fas fa-arrow-left"> Về danh sách</i>
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
          <th class="text-center" style="width:30px">#</th>
          <th class="text-center">Tên tỉnh/thành phố</th>
          <th class="text-center">Tên quận/huyện</th>
          <th class="text-center">Tên xã/thị trấn</th>
          <th class="text-center">Phí vẫn chuyển</th>
          <th class="text-center" style="width:140px">Chức năng</th>
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
        
            <td>{{ $row->city ? $row->city->name : 'Không xác định' }}</td>
            <td>{{ $row->district ? $row->district->name : 'Không xác định' }}</td>
            <td>{{ $row->town ? $row->town->name : 'Không xác định' }}</td>
            <td>{{ $row->feeship }}</td>
            <td class="text-center">
              <div class="d-inline-flex">
                <a href="{{ route('admin.delivery.show', $args) }}" class="btn btn-primary btn-xs mr-1">
                  <i class="fas fa-eye"></i>
                </a>
                <a href="{{ route('admin.delivery.restore', $args) }}" class="btn btn-success btn-xs mr-1">
                  <i class="fas fa-undo-alt"></i>
                </a>
                <form action="{{ route('admin.delivery.destroy', $args) }}" method="POST" class="d-inline">
                  @csrf
                  @method('delete')
                  <button class="btn btn-danger btn-xs" name="delete" type="submit">
                    <i class="fas fa-trash"></i>
                  </button>
                </form>
              </div>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
      @endif
    </div>
  </div>
</section>
@endsection