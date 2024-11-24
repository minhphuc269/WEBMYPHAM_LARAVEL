@extends('layouts.admin')

@section('title', 'Cập nhật Menu')

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
                <h1>Cập nhật Menu</h1>
            </div>
           
        </div>
    </div>
</section>

<section class="content">
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-12 text-right">
                    <a class="btn btn-sm btn-info" href="{{ route('admin.menu.index') }}">
                        <i class="fas fa-arrow-left"> Về danh sách</i>
                    </a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.menu.update', ['id' => $menu->id]) }}" method="post"
                enctype="multipart/form-data">
                @csrf
                @method('put')
                <div class="accordion" id="accordionExample">
                    <div class="mb-3">
                        <input type="hidden" name="id" value="<?= $menu->id; ?>" />
                        <label>Tên menu (*)</label>
                        <input type="text" value="{{ old('name', $menu->name) }}" name="name" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label>Liên kết</label>
                        <input type="text" value="{{ old('link', $menu->link) }}" name="link" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label>Kiểu</label>
                        <select name="type" id="type" class="form-control" required>
                            <option value="page" {{ old('type', $menu->type) == 'page' ? 'selected' : '' }}>Page</option>
                            <option value="topic" {{ old('type', $menu->type) == 'topic' ? 'selected' : '' }}>Topic</option>
                            <option value="category" {{ old('type', $menu->type) == 'category' ? 'selected' : '' }}>Category</option>
                            <option value="brand" {{ old('type', $menu->type) == 'brand' ? 'selected' : '' }}>Brand</option>
                            <option value="custom" {{ old('type', $menu->type) == 'custom' ? 'selected' : '' }}>Custom</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="position">Vị trí</label>
                        <select name="position" id="position" class="form-control" required>
                            <option value="mainmenu" {{ old('position', $menu->position) == 'mainmenu' ? 'selected' : '' }}>Main Menu</option>
                            <option value="footermenu" {{ old('position', $menu->position) == 'footermenu' ? 'selected' : '' }}>Footer Menu</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label>Trạng thái</label>
                        <select name="status" class="form-control">
                            <option value="1" <?=($menu->status==1)?'selected':''; ?>>Xuất bản</option>
                            <option value="2" <?=($menu->status==2)?'selected':''; ?> >Chưa xuất bản</option>
                        </select>
                    </div>
                    <div class="mb-3 mt-3 d-flex justify-content-center">
                        <button type="submit" name="create" class="btn btn-success">Cập nhật menu</button>
                    </div>
                </div>
            </form>
        </div>
</section>
@endsection