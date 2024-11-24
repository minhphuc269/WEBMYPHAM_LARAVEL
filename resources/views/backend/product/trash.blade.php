@extends('layouts.admin')
@section('title','Thùng rác sản phẩm')
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
        <h1>Thùng rác sản phẩm</h1>
      </div>
     
    </div>
  </div>
</section>
<section class="content">
  <div class="card">
    <div class="card-header">
      <div class="row">
        <div class="col-12 text-right">
          <a class="btn btn-sm btn-info" href="{{ route('admin.product.index') }}">
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
              <div class="d-inline-flex">
                <a href="{{ route('admin.product.show', $arg) }}" class="btn btn-primary btn-xs mr-1">
                  <i class="fas fa-eye"></i>
                </a>
                <a href="{{ route('admin.product.restore', $arg) }}" class="btn btn-success btn-xs mr-1">
                  <i class="fas fa-undo-alt"></i>
                </a>
                <form action="{{ route('admin.product.destroy', $arg) }}" method="POST" class="d-inline">
                  @csrf
                  @method('delete')
                  <button class="btn btn-danger btn-xs" name="delete" type="submit">
                    <i class="fas fa-trash"></i>
                  </button>
                </form>
              </div>
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