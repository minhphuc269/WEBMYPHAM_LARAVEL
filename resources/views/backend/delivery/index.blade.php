@extends('layouts.admin')
@section('title', 'Quản lí vận chuyển')

@section('content')
@if (session('success'))
<div id="success-message" class="alert alert-success">
  {{ session('success') }}
</div>
@endif

@if ($errors->any())
<div id="error-message" class="alert alert-danger">
  <ul>
    @foreach ($errors->all() as $error)
    <li>{{ $error }}</li>
    @endforeach
  </ul>
</div>
@endif

<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Quản lí vận chuyển</h1>
      </div>
     
    </div>
  </div>
</section>

<section class="content">
  <div class="card">
    <div class="card-header">
      <div class="row">
        <div class="col-12 text-right">
          <a class="btn btn-sm btn-danger" href="{{ route('admin.delivery.trash') }}">Thùng rác
            <i class="fas fa-trash"></i>
          </a>
        </div>
      </div>
    </div>
    <div class="card-body">
      <div class="form-container">
        <!-- Form tạo phí vận chuyển -->
        <form action="{{ route('admin.delivery.store') }}" method="post" enctype="multipart/form-data">
          @csrf
          <div class="row">
            <!-- Cột 1 -->
            <div class="col-md-6">
              <div class="mb-3">
                <label for="city">Chọn tỉnh/thành phố</label>
                <select name="id_city" id="city" class="form-control">
                  <option value="">----Chọn tỉnh/thành phố----</option>
                  @foreach ($cities as $city)
                  <option value="{{ $city->matp }}">{{ $city->name }}</option>
                  @endforeach
                </select>
              </div>
              <div class="mb-3">
                <label for="district">Chọn quận huyện</label>
                <select name="id_district" id="district" class="form-control">
                  <option value="">----Chọn quận/huyện----</option>
                </select>
              </div>
            </div>

            <!-- Cột 2 -->
            <div class="col-md-6">
              <div class="mb-3">
                <label for="town">Chọn xã phường</label>
                <select name="id_town" id="town" class="form-control">
                  <option value="">----Chọn xã/phường----</option>
                </select>
              </div>
              <div class="mb-3">
                <label for="feeship">Phí vận chuyển</label>
                <input type="number" name="feeship" id="feeship" class="form-control">
                @error('feeship')
                <span class="text-danger">{{ $message }}</span>
                @enderror
              </div>
            </div>
          </div>

          <!-- Nút thêm phí vận chuyển -->
          <div class="mb-3 text-right">
            <button type="submit" name="create" class="btn btn-success">Thêm phí vận chuyển</button>
          </div>
        </form>
      </div>

      <!-- Hiển thị bảng phí vận chuyển -->
      <div class="table-container mt-5">
        <table class="table table-bordered table-hover table-striped">
          <thead>
            <tr>
              <th class="text-center" style="width:30px">#</th>
              <th class="text-center">Tên tỉnh/thành phố</th>
              <th class="text-center">Tên quận/huyện</th>
              <th class="text-center">Tên xã/thị trấn</th>
              <th class="text-center">Phí vẫn chuyển</th>
              <th class="text-center" style="width:140px">Chức năng</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($list as $row)
            <tr>
              <td class="text-center">
                <input type="checkbox" name="checkID[]" id="checkID" value="{{ $row->id }}">
              </td>
              <td>{{ $row->city ? $row->city->name : '' }}</td>
              <td>{{ $row->district ? $row->district->name : '' }}</td>
              <td>{{ $row->town ? $row->town->name : '' }}</td>
              <td class="feeship" data-id="{{ $row->id }}" contenteditable="true">
                <span class="feeship-value">{{ $row->feeship }}</span>
                <input type="number" class="feeship-input" style="display:none; width: 100%;"
                  value="{{ $row->feeship }}" />
              </td>
              <td class="text-center">
                @php
                $args = ['id' => $row->id];
                @endphp
                @if ($row->status == 1)
                <a href="javascript:void(0);" class="btn btn-success btn-xs toggle-status" data-id="{{ $row->id }}">
                  <i class="fas fa-toggle-on"></i>
                </a>
                @else
                <a href="javascript:void(0);" class="btn btn-danger btn-xs toggle-status" data-id="{{ $row->id }}">
                  <i class="fas fa-toggle-off"></i>
                </a>
                @endif
                <a href="{{ route('admin.delivery.show', $args) }}" class="btn btn-info btn-xs">
                  <i class="fas fa-eye"></i>
                </a>
                <a href="{{ route('admin.delivery.delete', $row->id) }}" class="btn btn-danger btn-xs">
                  <i class="fas fa-trash"></i>
                </a>
              </td>
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
                const deliveryId = this.getAttribute('data-id');
                const button = this;

                fetch(`{{ url('admin/delivery/status/') }}/${deliveryId}`, {
                    method: 'GET',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    }
                })
                .then(response => response.json())
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
                .catch(error => console.error('Error:', error));
            });
        });
    });
</script>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
  $(document).ready(function() {
        // Khi thay đổi tỉnh/thành phố
        $('#city').on('change', function() {
            var cityId = $(this).val();
            if (cityId) {
                $.ajax({
                    url: "{{ route('admin.delivery.getDistricts', '') }}/" + cityId,
                    type: "GET",
                    dataType: "json",
                    success: function(data) {
                        $('#district').empty();
                        $('#district').append('<option value="">----Chọn quận/huyện----</option>');
                        $.each(data, function(key, value) {
                            $('#district').append('<option value="'+ value.maqh +'">'+ value.name +'</option>');
                        });
                    }
                });
            } else {
                $('#district').empty();
            }
        });

        // Khi thay đổi quận/huyện
        $('#district').on('change', function() {
            var districtId = $(this).val();
            if (districtId) {
                $.ajax({
                    url: "{{ route('admin.delivery.getTowns', '') }}/" + districtId,
                    type: "GET",
                    dataType: "json",
                    success: function(data) {
                        $('#town').empty();
                        $('#town').append('<option value="">----Chọn xã/phường----</option>');
                        $.each(data, function(key, value) {
                            $('#town').append('<option value="'+ value.xaid +'">'+ value.name +'</option>');
                        });
                    }
                });
            } else {
                $('#town').empty();
            }
        });
    });
</script>

{{-- Cập nhật phí vận chuyển --}}
<script>
  $(document).ready(function() {
        // Khi nhấp đúp vào ô phí vận chuyển
        $('.feeship').dblclick(function() {
            $(this).find('.feeship-value').hide();
            $(this).find('.feeship-input').show().focus();
        });

       // Khi mất focus khỏi ô input phí vận chuyển
$('.feeship-input').blur(function() {
    const feeshipElement = $(this).closest('.feeship');
    const feeshipId = feeshipElement.data('id'); // Lấy ID
    const newFeeship = $(this).val();

    if (newFeeship) {
        fetch(`{{ url('admin/delivery/update') }}/${feeshipId}`, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            body: JSON.stringify({ feeship: newFeeship }) // Gửi chỉ phí vận chuyển
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                feeshipElement.find('.feeship-value').text(newFeeship).show();
                feeshipElement.find('.feeship-input').hide();
            } else {
                alert(data.message || 'Có lỗi xảy ra. Vui lòng thử lại.');
            }
        })
        .catch(error => console.error('Error:', error));
    } else {
        feeshipElement.find('.feeship-value').show();
        feeshipElement.find('.feeship-input').hide();
    }
});

    });
</script>
@endsection