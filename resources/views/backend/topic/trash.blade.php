@extends('layouts.admin')
@section('title','Thùng rác chủ đề')
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
        <h1>Thùng rác chủ đề</h1>
      </div>
    
    </div>
  </div>
</section>
<section class="content">
  <div class="card">
    <div class="card-header">
      <div class="row">
        <div class="col-12 text-right">

          <a class="btn btn-sm btn-info" href="{{ route('admin.topic.index') }}">
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
          <th class="text-center">Tên chủ đề</th>
          <th class="text-center">Liên kết</th>

          <th class="text-center" style="width:190px">Chức năng</th>
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

            <td>
              {{ $row->name }}
            </td>
            <td>
              {{ $row->slug }}
            </td>

            <td class="text-center">
              <a href="{{ route('admin.topic.show', $arg) }}" class="btn btn-primary btn-xs mr-1">
                <i class="fas fa-eye"></i>
              </a>
              <a href="{{ route('admin.topic.restore', $arg) }}" class="btn btn-success btn-xs mr-1">
                <i class="fas fa-undo-alt"></i>
              </a>
              <form action="{{ route('admin.topic.destroy', $arg) }}" method="POST" class="d-inline">
                @csrf
                @method('delete')
                <button class="btn btn-danger btn-xs" name="delete" type="submit">
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
  </div>
</section>
<script>
  document.addEventListener('DOMContentLoaded', function() {
      document.querySelectorAll('.toggle-status').forEach(function(button) {
          button.addEventListener('click', function() {
              const topicId = this.getAttribute('data-id');
              const button = this;

              fetch(`{{ url('admin/topic/status/') }}/${topicId}`, {
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