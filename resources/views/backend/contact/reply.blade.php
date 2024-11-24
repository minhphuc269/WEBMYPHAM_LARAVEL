@extends('layouts.admin')

@section('title', 'Trả lời liên hệ')

@section('content')
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Trả lời liên hệ</h1>
      </div>
     
    </div>
  </div>
</section>

<section class="content">
  <div class="card">
    <div class="card-body">
      <form action="{{ route('admin.contact.sendReply', $contact->id) }}" method="POST">
        @csrf
        <div class="form-group">
          <label for="email">Email:</label>
          <input type="email" class="form-control" id="email" value="{{ $contact->email }}" readonly>
        </div>

        <div class="form-group">
          <label for="name">Họ tên:</label>
          <input type="text" class="form-control" id="name" value="{{ $contact->name }}" readonly>
        </div>

        <div class="form-group">
          <label for="title">Tiêu đề:</label>
          <input type="text" class="form-control" id="title" value="{{ $contact->title }}" readonly>
        </div>

        <div class="form-group">
          <label for="message">Nội dung tin nhắn:</label>
          <textarea class="form-control" id="message" rows="4" readonly>{{ $contact->content }}</textarea>
        </div>

        <div class="form-group">
          <label for="reply">Trả lời:</label>
          <textarea class="form-control" id="reply" name="reply" rows="6" placeholder="Nhập nội dung trả lời"></textarea>
        </div>

        <button type="submit" class="btn btn-primary">Gửi trả lời</button>
        <a href="{{ route('admin.contact.index') }}" class="btn btn-secondary">Quay lại</a>
      </form>
    </div>
  </div>
</section>
@endsection
