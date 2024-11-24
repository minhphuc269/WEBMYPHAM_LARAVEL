@extends('layouts.admin')

@section('title', 'Quản lí Menu')

@section('content')
@if (session('success'))
    <div id="success-message" class="alert alert-success">
        {{ session('success') }}
    </div>
@endif
<script>
    // Hàm để ẩn thông báo sau 3 giây
    function hideAlerts() {
        var successAlert = document.getElementById('success-message');
  
        if (successAlert) {
            setTimeout(function() {
                successAlert.style.display = 'none';
            }, 2000); 
        }
  
    }
  
    // Gọi hàm ẩn thông báo khi trang được tải
    document.addEventListener('DOMContentLoaded', function() {
        hideAlerts();
    });
  </script>
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Quản lí Menu</h1>
            </div>
           
        </div>
    </div>
</section>

<section class="content">
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-12 text-right">

                    <a class="btn btn-sm btn-danger" href="{{ route('admin.menu.trash') }}">Thùng rác
                        <i class="fas fa-trash"></i>
                    </a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-3">
                    <form action="{{ route('admin.menu.store') }}" method="post">
                        @csrf
                        <div class="accordion" id="accordionExample">
                            <div class="card p-3">
                                <label for="position">Vị trí</label>
                                <select name="position" id="position" class="form-control" required>
                                    <option value="mainmenu">Main Menu</option>
                                    <option value="footermenu">Footer Menu</option>
                                </select>
                            </div>
                
                            <div class="card">
                                <div class="card-header" id="headingCategory">
                                    <a class="d-block" data-toggle="collapse" data-target="#collapseCategory" aria-expanded="true" aria-controls="collapseCategory">
                                        Danh mục
                                    </a>
                                </div>
                                <div id="collapseCategory" class="collapse" aria-labelledby="headingCategory" data-parent="#accordionExample">
                                    <div class="card-body">
                                        @foreach($list_category as $category)
                                        <div class="form-check mb-2">
                                            <input class="form-check-input" type="checkbox" name="categoryid[{{ $category->id }}]" value="{{ $category->id }}" id="category{{ $category->id }}">
                                            <label class="form-check-label" for="categoryId{{ $category->id }}">
                                                {{ $category->name }}
                                            </label>
                                        </div>
                                        @endforeach
                                        <div class="mb-3">
                                            <input type="submit" name="createCategory" class="btn btn-success" value="Thêm Menuu">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- end card -->
                
                            <div class="card">
                                <div class="card-header" id="headingBrand">
                                    <a class="d-block" data-toggle="collapse" data-target="#collapseBrand" aria-expanded="true" aria-controls="collapseBrand">
                                        Thương hiệu
                                    </a>
                                </div>
                                <div id="collapseBrand" class="collapse" aria-labelledby="headingBrand" data-parent="#accordionExample">
                                    <div class="card-body">
                                        @foreach($list_brand as $brand)
                                        <div class="form-check mb-2">
                                            <input class="form-check-input" type="checkbox" name="brandid[{{ $brand->id }}]" value="{{ $brand->id }}" id="brand{{ $brand->id }}">
                                            <label class="form-check-label" for="brandId{{ $brand->id }}">
                                                {{ $brand->name }}
                                            </label>
                                        </div>
                                        @endforeach
                                        <div class="mb-3">
                                            <input type="submit" name="createBrand" class="btn btn-success" value="Thêm Menu">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- end card -->
                
                            <div class="card">
                                <div class="card-header" id="headingTopic">
                                    <a class="d-block" data-toggle="collapse" data-target="#collapseTopic" aria-expanded="true" aria-controls="collapseTopic">
                                        Chủ đề
                                    </a>
                                </div>
                                <div id="collapseTopic" class="collapse" aria-labelledby="headingTopic" data-parent="#accordionExample">
                                    <div class="card-body">
                                        @foreach($list_topic as $topic)
                                        <div class="form-check mb-2">
                                            <input class="form-check-input" type="checkbox" name="topicid[{{ $topic->id }}]" value="{{ $topic->id }}" id="topic{{ $topic->id }}">
                                            <label class="form-check-label" for="topicId{{ $topic->id }}">
                                                {{ $topic->name }}
                                            </label>
                                        </div>  
                                        @endforeach
                                        <div class="mb-3">
                                            <input type="submit" name="createTopic" class="btn btn-success" value="Thêm Menu">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- end card -->
                
                            <div class="card">
                                <div class="card-header" id="headingPage">
                                    <a class="d-block" data-toggle="collapse" data-target="#collapsePage" aria-expanded="true" aria-controls="collapsePage">
                                        Trang đơn
                                    </a>
                                </div>
                                <div id="collapsePage" class="collapse" aria-labelledby="headingPage" data-parent="#accordionExample">
                                    <div class="card-body">
                                        @foreach($list_page as $page)
                                        <div class="form-check mb-2">
                                            <input class="form-check-input" type="checkbox" name="pageid[{{ $page->id }}]" value="{{ $page->id }}" id="page{{ $page->id }}">
                                            <label class="form-check-label" for="pageId{{ $page->id }}">
                                                {{ $page->title }}
                                            </label>
                                        </div>
                                        @endforeach
                                        <div class="mb-3">
                                            <input type="submit" name="createPage" class="btn btn-success" value="Thêm Menu">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- end card -->
                
                            <div class="card">
                                <div class="card-header" id="headingCustom">
                                    <a class="d-block" data-toggle="collapse" data-target="#collapseCustom" aria-expanded="true" aria-controls="collapseCustom">
                                        Tùy liên kết
                                    </a>
                                </div>
                                <div id="collapseCustom" class="collapse" aria-labelledby="headingCustom" data-parent="#accordionExample">
                                    <div class="card-body">
                                        <div class="mb-3">
                                            <label for="name">Tên menu</label>
                                            <input type="text" name="name" id="name" class="form-control">
                                        </div>
                                        <div class="mb-3">
                                            <label for="link">Liên kết</label>
                                            <input type="text" name="link" id="link" class="form-control">
                                        </div>
                                        <div class="mb-3">
                                            <input type="submit" name="createCustom" class="btn btn-success" value="Thêm Menu">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- end card -->
                
                            <div class="card p-3">
                                <label for="status">Trạng thái</label>
                                <select name="status" id="status" class="form-control" required>
                                    <option value="2">Chưa xuất bản</option>
                                    <option value="1">Xuất bản</option>
                                </select>
                            </div>
                        </div>
                    </form>
                </div>
                
                
                <div class="col-md-9">

                    <table class="table table-bordered table-hover table-striped">
                        <thead>
                            <tr>
                                <th class="text-center" style="width:30px">#</th>

                                <th class="text-center">Tên Menu</th>
                                <th class="text-center" >Liên kết</th>
                                <th class="text-center">Vị trí</th>

                                <th class="text-center" style="width:140px">Chức năng</th>
                                <th class="text-center" style="width:30px">ID</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($list as $row)
                            @php
                            $arg=['id'=>$row->id];
                            @endphp
                            <tr>
                                <td class="text-center">
                                    <input type="checkbox" name="checkID[]" id="checkID" value="{{ $row->id }}">
                                </td>

                                <td>{{ $row->name }}</td>
                                <td>{{ $row->link }}</td>
                                <td>{{ $row->position }}</td>


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
                                <a href="{{ route('admin.menu.edit', $row->id) }}" class="btn btn-primary btn-xs">
                                  <i class="fas fa-edit"></i>
                              </a>
                              <a href="{{ route('admin.menu.show', $row->id) }}" class="btn btn-info btn-xs">
                                  <i class="fas fa-eye"></i>
                              </a>
                              <a href="{{ route('admin.menu.delete', $row->id) }}" class="btn btn-danger btn-xs">
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
</section>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        document.querySelectorAll('.toggle-status').forEach(function(button) {
            button.addEventListener('click', function() {
                const menuId = this.getAttribute('data-id');
                const button = this;
    
                fetch(`{{ url('admin/menu/status/') }}/${menuId}`, {
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