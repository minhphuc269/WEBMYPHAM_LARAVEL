@extends('layouts.site')
@section('title','Liên hệ')
@section('content')

<!-- subheader == mobile nav -->
<div class="subheader">
    <div class="container">
        <x-menu-list-cate />
        <x-main-menu />
    </div>
</div>

<section class="bread-crumb mb-3">
    <span class="crumb-border"></span>
    <div class="container ">
        <div class="row">
            <div class="col-12 a-left">
                <ul class="breadcrumb m-0 px-0">
                    <li class="home">
                        <a href="{{ route('site.home') }}" class="link"><span>Trang chủ</span></a>
                        <span class="mr_lr">&nbsp;/&nbsp;</span>
                    </li>
                    <li><strong><span>Liên hệ</span></strong></li>
                </ul>
            </div>
        </div>
    </div>
</section>

<section class="page_contact section">
    <div class="container card py-3">
        <div class="row">
            <div class="col-lg-6 col-12">
                <div class="left-contact px-2">
                    <h1 class="title_page mb-3">Shop Mỹ phẩm Cosmetic</h1>
                    <!-- Nút để xem phản hồi -->
                    <button type="button" class="btn btn-info btn-lg float-right" data-toggle="modal"
                        data-target="#responseModal" style="background-color: #d82e4d; border-color: #d82e4d;">
                        <i class="fas fa-comments" style="color: white;"></i> <!-- Đặt màu biểu tượng là trắng -->

                    </button>
                    <div class="single-contact">
                        <i class="fa fa-map-marker-alt"></i>
                        <div class="content">Địa chỉ:
                            <span>150/8 Nguyễn Duy Cung, Phường 12, Tp.HCM</span>
                        </div>
                    </div>
                    <div class="single-contact">
                        <i class="fa fa-mobile-alt"></i>
                        <div class="content">
                            Số điện thoại: 19006750
                        </div>
                    </div>
                    <div class="single-contact">
                        <i class="fa fa-envelope"></i>
                        <div class="content">
                            Email: Lethithuyngan@gmail.com
                        </div>
                    </div>
                    <div id="pagelogin" class="pt-3 mt-3 border-top">
                        <h2 class="title-head">Liên hệ với chúng tôi</h2>
                        @if(session('success'))
                        <div class="alert alert-success" id="success-message">
                            {{ session('success') }}
                        </div>
                        @endif
                        <form method="POST" action="{{ route('site.contact.send') }}" id="contact"
                            accept-charset="UTF-8">
                            @csrf
                            <div class="form-signup clearfix">
                                <div class="row group_contact">
                                    <fieldset class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <input placeholder="Họ tên*" type="text" class="form-control form-control-lg"
                                            value="{{ Auth::user()->name }}" name="name" readonly
                                            style="background-color: #ffffff;">
                                    </fieldset>
                                    <fieldset class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <input placeholder="Email*" type="email"
                                            pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" required id="email"
                                            class="form-control form-control-lg" value="{{ Auth::user()->email }}"
                                            name="email" readonly style="background-color: #ffffff;">
                                    </fieldset>
                                    <fieldset class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <input placeholder="Số điện thoại*" type="text"
                                            class="form-control form-control-lg" required pattern="\d+" name="phone"
                                            value="{{ Auth::user()->phone }}" readonly
                                            style="background-color: #ffffff;">
                                    </fieldset>
                                    <fieldset class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <input placeholder="Nhập tiêu đề" type="text"
                                            class="form-control form-control-lg" required name="title">
                                        @error('title')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </fieldset>
                                    <fieldset class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <textarea placeholder="Nhập nội dung" name="content" id="content"
                                            class="form-control content-area form-control-lg" rows="5"
                                            required></textarea>
                                        @error('content')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </fieldset>
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <button type="submit" class="btn btn-action btn-block btn-lienhe">Gửi liên hệ
                                            của bạn</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>




                    <!-- Modal hiển thị phản hồi -->
                    <div class="modal fade" id="responseModal" tabindex="-1" role="dialog"
                        aria-labelledby="responseModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg" role="document">
                            <!-- Thay đổi kích thước modal -->
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="responseModalLabel">Phản hồi từ Admin</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    @foreach($contacts as $contact)
                                    <div class="contact-response mb-3 border p-3 rounded">
                                        <!-- Thêm border, padding và rounded corners -->
                                        <h5 class="font-weight-bold">{{ $contact->title }}</h5> <!-- Đậm tiêu đề -->
                                        <p class="text-muted">{{ $contact->content }}</p>
                                        <!-- Thay đổi màu cho nội dung -->
                                        <p><strong>Thời gian gửi:</strong> {{ $contact->created_at->format('d/m/Y H:i')
                                            }}</p>
                                        <p><strong>Phản hồi:</strong> {{ $contact->reply ? $contact->reply : 'Chưa có
                                            phản hồi' }}</p>
                                    </div>
                                    @endforeach
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <style>
                        .contact-response {
                            background-color: #f8f9fa;
                            /* Màu nền sáng cho phản hồi */
                            border: 1px solid #dee2e6;
                            /* Đường viền nhẹ */
                            border-radius: 0.25rem;
                            /* Bo góc nhẹ */
                            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
                            /* Đổ bóng nhẹ */
                        }

                        .contact-response h5 {
                            margin-bottom: 10px;
                            /* Khoảng cách dưới tiêu đề */
                        }

                        .contact-response p {
                            margin-bottom: 5px;
                            /* Khoảng cách dưới mỗi đoạn văn */
                        }
                    </style>

                </div>
            </div>
            <div class="col-lg-6 col-12">
                <div class="iFrameMap px-2 mt-3">
                    <div id="contact_map" class="map">
                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3723.904611732553!2d105.81388241542348!3d21.03650239288885!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3135ab1946cc7e23%3A0x87ab3917166a0cd5!2zQ8O0bmcgdHkgY-G7lSBwaOG6p24gY8O0bmcgbmdo4buHIFNBUE8!5e0!3m2!1svi!2s!4v1555900531747!5m2!1svi!2s"
                            width="600" height="450" style="border:0" allowfullscreen="" loading="lazy"></iframe>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection