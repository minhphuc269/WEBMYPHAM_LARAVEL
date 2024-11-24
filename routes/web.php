<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\backend\BannerController;
use App\Http\Controllers\backend\BrandController;
use App\Http\Controllers\backend\CategoryController;
use App\Http\Controllers\backend\ContactController;
use App\Http\Controllers\backend\CouponController;
use App\Http\Controllers\backend\DashboardController;
use App\Http\Controllers\backend\DeliveryController;
use App\Http\Controllers\backend\MenuController;
use App\Http\Controllers\backend\OrderController;
use App\Http\Controllers\backend\PostController;
use App\Http\Controllers\backend\ProductController;
use App\Http\Controllers\backend\TopicController;
use App\Http\Controllers\backend\UserController;
use App\Http\Controllers\frontend\CartController;
use App\Http\Controllers\frontend\ContactController as LienheController;
use App\Http\Controllers\frontend\HomeController;
use App\Http\Controllers\frontend\LoginController;
use App\Http\Controllers\frontend\PostController as TintucController;
use App\Http\Controllers\frontend\ProductController as SanphamController;
use App\Http\Controllers\frontend\RegisterController;
use App\Http\Controllers\frontend\CheckoutController;
use App\Http\Controllers\frontend\OrderController as FrontendOrderController;
use App\Http\Controllers\frontend\UserController as FrontendUserController;
use App\Models\Brand;
use App\Models\Product;
use Illuminate\Support\Facades\Route;

//home
Route::get('/', [HomeController::class, 'index'])->name('site.home'); //trang chủ
//Product 
Route::get('tat-ca-san-pham', [SanphamController::class, 'index'])->name('site.product.index');
Route::get('danh-muc/{slug}', [SanphamController::class, 'category'])->name('site.product.category');
Route::get('thuong-hieu/{slug}', [SanphamController::class, 'brand'])->name('site.product.brand');
Route::get('ket-qua-tim-kiem/{search}', [SanphamController::class, 'search'])->name('site.product.search');

Route::get('chi-tiet-san-pham/{slug}', [SanphamController::class, 'product_detail'])->name('site.product.detail');
Route::get('san-pham-flase-sale', [SanphamController::class, 'sale'])->name('site.product.sale');

//cart
Route::get('gio-hang', [CartController::class, 'index'])->name('site.cart.index');
Route::get('cart/addcart', [CartController::class, 'addcart'])->name('site.cart.addcart');
Route::post('cart/update', [CartController::class, 'update'])->name('site.cart.update');
Route::get('cart/delete/{id}', [CartController::class, 'delete'])->name('site.cart.delete');
Route::get('thanh-toan', [CartController::class, 'checkout'])->name('site.cart.checkout');
Route::post('thong-bao', [CartController::class, 'docheckout'])->name('site.cart.docheckout');
Route::get('/get-shipping-fee', [CartController::class, 'getShippingFee'])->name('getShippingFee');
Route::post('cart/applyCoupon', [CartController::class, 'applyCoupon'])->name('site.cart.applyCoupon');
Route::post('/saveDiscount', [CartController::class, 'saveDiscount'])->name('site.cart.saveDiscount');
//order
Route::get('/tat-ca-don-hang', [FrontendOrderController::class, 'index'])->name('orders.index');
Route::get('/don-hang/{id}', [FrontendOrderController::class, 'show'])->name('orders.show');
Route::delete('/orders/{order}/cancel', [OrderController::class, 'cancel'])->name('orders.cancel');

//checkout
// Route::post('/vnpay_payment', [CheckoutController::class,  'vnpay_payment'])->name('payment.vnpay');


//contact
Route::get('/lien-he', [LienheController::class, 'index'])->name('site.contact');
Route::post('contact/send', [LienheController::class, 'send_contact'])->name('site.contact.send');


//Post 
Route::get('/chi-tiet-bai-viet/{slug}', [TintucController::class, 'post_detail'])->name('site.post.detail');
Route::get('tat-ca-bai-viet', [TintucController::class, 'post_all'])->name('site.post.post_all');
Route::get('/chu-de/{slug}', [TintucController::class, 'post_topic'])->name('site.post.topic');
//Page
Route::get('/trang-don/{slug}', [TintucController::class, 'page_detail'])->name('site.page.detail');




Route::get('/dang-ki', [RegisterController::class, 'index'])->name('website.register');
Route::post('/dang-ki', [RegisterController::class, 'postRegister'])->name('register.post');//Đăng nhập
Route::get('dang-nhap', [AuthController::class, 'getlogin'])->name('website.getlogin');
Route::post('dang-nhap', [AuthController::class, 'dologin'])->name('website.dologin');
Route::get('dang-xuat', [AuthController::class, 'logout'])->name('website.logout');
Route::get('/profile', [FrontendUserController::class, 'index'])->name('user.profile');
//Đổi thông tin user
Route::put('/user/{id}/updateImage', [FrontendUserController::class, 'updateImage'])->name('user.updateImage');

Route::put('/user/update/{id}', [FrontendUserController::class, 'update'])->name('user.update');
Route::get('/change-password', [FrontendUserController::class, 'showChangePasswordForm'])->name('user.changePasswordForm');
Route::post('/change-password', [FrontendUserController::class, 'changePassword'])->name('user.changePassword');

//route admin Kiểm tra đăng nhập bằng middleware    
Route::prefix('admin')->middleware("middleauth")->group(function () {
    Route::get("/", [DashboardController::class, "index"])->name("admin.dashboard.index");

    Route::prefix('product')->group(function () {
        Route::get("/", [ProductController::class, "index"])->name("admin.product.index");
        Route::get("trash", [ProductController::class, "trash"])->name("admin.product.trash");
        Route::get("create", [ProductController::class, "create"])->name("admin.product.create");
        Route::post("store", [ProductController::class, "store"])->name("admin.product.store"); // Sử dụng POST cho lưu trữ
        Route::get("show/{id}", [ProductController::class, "show"])->name("admin.product.show");
        Route::get("edit/{id}", [ProductController::class, "edit"])->name("admin.product.edit");
        Route::put("update/{id}", [ProductController::class, "update"])->name("admin.product.update"); // Sử dụng PUT cho cập nhật
        Route::get('status/{id}', [ProductController::class, 'status'])->name('admin.product.status');
        Route::get("delete/{id}", [ProductController::class, "delete"])->name("admin.product.delete"); // Sử dụng DELETE cho xóa tạm
        Route::get("restore/{id}", [ProductController::class, "restore"])->name("admin.product.restore"); // Sử dụng PATCH cho khôi phục
        Route::delete("destroy/{id}", [ProductController::class, "destroy"])->name("admin.product.destroy"); // Sử dụng DELETE cho xóa vĩnh viễn
    });

    Route::prefix('category')->group(function () {
        Route::get("/", [CategoryController::class, "index"])->name("admin.category.index");
        Route::get("trash", [CategoryController::class, "trash"])->name("admin.category.trash");
        Route::post("store", [CategoryController::class, "store"])->name("admin.category.store"); // Sử dụng POST cho lưu trữ
        Route::get("show/{id}", [CategoryController::class, "show"])->name("admin.category.show");
        Route::get("edit/{id}", [CategoryController::class, "edit"])->name("admin.category.edit");
        Route::put("update/{id}", [CategoryController::class, "update"])->name("admin.category.update"); // Sử dụng PUT cho cập nhật
        Route::get("status/{id}", [CategoryController::class, "status"])->name("admin.category.status"); // Sử dụng PATCH cho cập nhật một phần
        Route::get("delete/{id}", [CategoryController::class, "delete"])->name("admin.category.delete"); // Sử dụng DELETE cho xóa tạm
        Route::get("restore/{id}", [CategoryController::class, "restore"])->name("admin.category.restore"); // Sử dụng PATCH cho khôi phục
        Route::delete("destroy/{id}", [CategoryController::class, "destroy"])->name("admin.category.destroy"); // Sử dụng DELETE cho xóa vĩnh viễn
    });

    Route::prefix('brand')->group(function () {
        Route::get("/", [BrandController::class, "index"])->name("admin.brand.index");
        Route::get("trash", [BrandController::class, "trash"])->name("admin.brand.trash");
        Route::post("store", [BrandController::class, "store"])->name("admin.brand.store"); // Sử dụng POST cho lưu trữ
        Route::get("show/{id}", [BrandController::class, "show"])->name("admin.brand.show");
        Route::get("edit/{id}", [BrandController::class, "edit"])->name("admin.brand.edit");
        Route::put("update/{id}", [BrandController::class, "update"])->name("admin.brand.update"); // Sử dụng PUT cho cập nhật
        Route::get("status/{id}", [BrandController::class, "status"])->name("admin.brand.status"); // Sử dụng PATCH cho cập nhật một phần
        Route::get("delete/{id}", [BrandController::class, "delete"])->name("admin.brand.delete"); // Sử dụng DELETE cho xóa tạm
        Route::get("restore/{id}", [BrandController::class, "restore"])->name("admin.brand.restore"); // Sử dụng PATCH cho khôi phục
        Route::delete("destroy/{id}", [BrandController::class, "destroy"])->name("admin.brand.destroy"); // Sử dụng DELETE cho xóa vĩnh viễn
    });
    Route::prefix('post')->group(function () {
        Route::get("/", [PostController::class, "index"])->name("admin.post.index");
        Route::get("trash", [PostController::class, "trash"])->name("admin.post.trash");
        Route::get("create", [PostController::class, "create"])->name("admin.post.create");
        Route::post("store", [PostController::class, "store"])->name("admin.post.store"); // Sử dụng POST cho lưu trữ
        Route::get("show/{id}", [PostController::class, "show"])->name("admin.post.show");
        Route::get("edit/{id}", [PostController::class, "edit"])->name("admin.post.edit");
        Route::put("update/{id}", [PostController::class, "update"])->name("admin.post.update"); // Sử dụng PUT cho cập nhật
        Route::get("status/{id}", [PostController::class, "status"])->name("admin.post.status"); // Sử dụng PATCH cho cập nhật một phần
        Route::get("delete/{id}", [PostController::class, "delete"])->name("admin.post.delete"); // Sử dụng DELETE cho xóa tạm
        Route::get("restore/{id}", [PostController::class, "restore"])->name("admin.post.restore"); // Sử dụng PATCH cho khôi phục
        Route::delete("destroy/{id}", [PostController::class, "destroy"])->name("admin.post.destroy"); // Sử dụng DELETE cho xóa vĩnh viễn
    });
    //topic
    Route::prefix('topic')->group(function () {
        Route::get("/", [TopicController::class, "index"])->name("admin.topic.index");
        Route::get("trash", [TopicController::class, "trash"])->name("admin.topic.trash");
        Route::post("store", [TopicController::class, "store"])->name("admin.topic.store"); // Sử dụng POST cho lưu trữ
        Route::get("show/{id}", [TopicController::class, "show"])->name("admin.topic.show");
        Route::get("edit/{id}", [TopicController::class, "edit"])->name("admin.topic.edit");
        Route::put("update/{id}", [TopicController::class, "update"])->name("admin.topic.update"); // Sử dụng PUT cho cập nhật
        Route::get("status/{id}", [TopicController::class, "status"])->name("admin.topic.status"); // Sử dụng PATCH cho cập nhật một phần
        Route::get("delete/{id}", [TopicController::class, "delete"])->name("admin.topic.delete"); // Sử dụng DELETE cho xóa tạm
        Route::get("restore/{id}", [TopicController::class, "restore"])->name("admin.topic.restore"); // Sử dụng PATCH cho khôi phục
        Route::delete("destroy/{id}", [TopicController::class, "destroy"])->name("admin.topic.destroy"); // Sử dụng DELETE cho xóa vĩnh viễn
    });
    //user
    Route::prefix('user')->group(function () {
        Route::get("/", [UserController::class, "index"])->name("admin.user.index");
        Route::get("trash", [UserController::class, "trash"])->name("admin.user.trash");
        Route::get("create", [UserController::class, "create"])->name("admin.user.create");
        Route::post("store", [UserController::class, "store"])->name("admin.user.store"); // Sử dụng POST cho lưu trữ
        Route::get("show/{id}", [UserController::class, "show"])->name("admin.user.show");
        Route::get("edit/{id}", [UserController::class, "edit"])->name("admin.user.edit");
        Route::put("update/{id}", [UserController::class, "update"])->name("admin.user.update"); // Sử dụng PUT cho cập nhật
        Route::get("status/{id}", [UserController::class, "status"])->name("admin.user.status"); // Sử dụng PATCH cho cập nhật một phần
        Route::get("delete/{id}", [UserController::class, "delete"])->name("admin.user.delete"); // Sử dụng DELETE cho xóa tạm
        Route::get("restore/{id}", [UserController::class, "restore"])->name("admin.user.restore"); // Sử dụng PATCH cho khôi phục
        Route::delete("destroy/{id}", [UserController::class, "destroy"])->name("admin.user.destroy"); // Sử dụng DELETE cho xóa vĩnh viễn
    });
    //order
    Route::prefix('order')->group(function () {
        Route::get("/", [OrderController::class, "index"])->name("admin.order.index");
        Route::get("trash", [OrderController::class, "trash"])->name("admin.order.trash");
        Route::get("create", [OrderController::class, "create"])->name("admin.order.create");
        Route::post("store", [OrderController::class, "store"])->name("admin.order.store"); // Sử dụng POST cho lưu trữ
        Route::get("show/{id}", [OrderController::class, "show"])->name("admin.order.show");
        Route::get("edit/{id}", [OrderController::class, "edit"])->name("admin.order.edit");
        Route::put("update/{id}", [OrderController::class, "update"])->name("admin.order.update"); // Sử dụng PUT cho cập nhật
        Route::get("status/{id}", [OrderController::class, "status"])->name("admin.order.status"); // Sử dụng PATCH cho cập nhật một phần
        Route::get("delete/{id}", [OrderController::class, "delete"])->name("admin.order.delete"); // Sử dụng DELETE cho xóa tạm
        Route::get("restore/{id}", [OrderController::class, "restore"])->name("admin.order.restore"); // Sử dụng PATCH cho khôi phục
        Route::delete("destroy/{id}", [OrderController::class, "destroy"])->name("admin.order.destroy"); // Sử dụng DELETE cho xóa vĩnh viễn
        Route::get('print/{id}', [OrderController::class, 'printOrder'])->name('admin.order.print');
        Route::put('status_order/{id}', [OrderController::class, 'updateStatus'])->name('admin.order.updateStatus');
        Route::delete('/orders/cancel/{id}', [OrderController::class, 'cancel'])->name('orders.cancel');
    });
    //menu
    Route::prefix('menu')->group(function () {
        Route::get("/", [MenuController::class, "index"])->name("admin.menu.index");
        Route::get("trash", [MenuController::class, "trash"])->name("admin.menu.trash");
        Route::post("store", [MenuController::class, "store"])->name("admin.menu.store");
        Route::get("show/{id}", [MenuController::class, "show"])->name("admin.menu.show");
        Route::get("edit/{id}", [MenuController::class, "edit"])->name("admin.menu.edit");
        Route::put("update/{id}", [MenuController::class, "update"])->name("admin.menu.update");
        Route::get("status/{id}", [MenuController::class, "status"])->name("admin.menu.status");
        Route::get("delete/{id}", [MenuController::class, "delete"])->name("admin.menu.delete");
        Route::get("restore/{id}", [MenuController::class, "restore"])->name("admin.menu.restore");
        Route::delete("destroy/{id}", [MenuController::class, "destroy"])->name("admin.menu.destroy");
    });
    //contact
    Route::prefix('contact')->group(function () {
        Route::get("/", [ContactController::class, "index"])->name("admin.contact.index");
        Route::get("trash", [ContactController::class, "trash"])->name("admin.contact.trash");
        Route::get("create", [ContactController::class, "create"])->name("admin.contact.create");
        Route::post("store", [ContactController::class, "store"])->name("admin.contact.store"); // Sử dụng POST cho lưu trữ
        Route::get("show/{id}", [ContactController::class, "show"])->name("admin.contact.show");
        Route::put("update/{id}", [ContactController::class, "update"])->name("admin.contact.update"); // Sử dụng PUT cho cập nhật
        Route::get("status/{id}", [ContactController::class, "status"])->name("admin.contact.status"); // Sử dụng PATCH cho cập nhật một phần
        Route::get("delete/{id}", [ContactController::class, "delete"])->name("admin.contact.delete"); // Sử dụng DELETE cho xóa tạm
        Route::get("restore/{id}", [ContactController::class, "restore"])->name("admin.contact.restore"); // Sử dụng PATCH cho khôi phục
        Route::delete("destroy/{id}", [ContactController::class, "destroy"])->name("admin.contact.destroy"); // Sử dụng DELETE cho xóa vĩnh viễn
        Route::get('reply/{id}', [ContactController::class, 'reply'])->name('admin.contact.reply');
    Route::post('reply/{id}', [ContactController::class, 'sendReply'])->name('admin.contact.sendReply');
    });
    //banner
    Route::prefix('banner')->group(function () {
        Route::get("/", [BannerController::class, "index"])->name("admin.banner.index");
        Route::get("trash", [BannerController::class, "trash"])->name("admin.banner.trash");
        Route::post("store", [BannerController::class, "store"])->name("admin.banner.store"); // Sử dụng POST cho lưu trữ
        Route::get("show/{id}", [BannerController::class, "show"])->name("admin.banner.show");
        Route::get("edit/{id}", [BannerController::class, "edit"])->name("admin.banner.edit");
        Route::put("update/{id}", [BannerController::class, "update"])->name("admin.banner.update"); // Sử dụng PUT cho cập nhật
        Route::get("status/{id}", [BannerController::class, "status"])->name("admin.banner.status"); // Sử dụng PATCH cho cập nhật một phần
        Route::get("delete/{id}", [BannerController::class, "delete"])->name("admin.banner.delete"); // Sử dụng DELETE cho xóa tạm
        Route::get("restore/{id}", [BannerController::class, "restore"])->name("admin.banner.restore"); // Sử dụng PATCH cho khôi phục
        Route::delete("destroy/{id}", [BannerController::class, "destroy"])->name("admin.banner.destroy"); // Sử dụng DELETE cho xóa vĩnh viễn
    });
    //coupon
    Route::prefix('coupon')->group(function () {
        Route::get("/", [CouponController::class, "index"])->name("admin.coupon.index");
        Route::get("trash", [CouponController::class, "trash"])->name("admin.coupon.trash");
        Route::post("store", [CouponController::class, "store"])->name("admin.coupon.store"); // Sử dụng POST cho lưu trữ
        Route::get("show/{id}", [CouponController::class, "show"])->name("admin.coupon.show");
        Route::get("edit/{id}", [CouponController::class, "edit"])->name("admin.coupon.edit");
        Route::put("update/{id}", [CouponController::class, "update"])->name("admin.coupon.update"); // Sử dụng PUT cho cập nhật
        Route::get("status/{id}", [CouponController::class, "status"])->name("admin.coupon.status"); // Sử dụng PATCH cho cập nhật một phần
        Route::get("delete/{id}", [CouponController::class, "delete"])->name("admin.coupon.delete"); // Sử dụng DELETE cho xóa tạm
        Route::get("restore/{id}", [CouponController::class, "restore"])->name("admin.coupon.restore"); // Sử dụng PATCH cho khôi phục
        Route::delete("destroy/{id}", [CouponController::class, "destroy"])->name("admin.coupon.destroy"); // Sử dụng DELETE cho xóa vĩnh viễn
    });
    //delivery
    Route::prefix('delivery')->group(function () {
        Route::get("/", [DeliveryController::class, "index"])->name("admin.delivery.index");
        Route::get("trash", [DeliveryController::class, "trash"])->name("admin.delivery.trash");
        Route::post("store", [DeliveryController::class, "store"])->name("admin.delivery.store"); // Sử dụng POST cho lưu trữ
        Route::get("show/{id}", [DeliveryController::class, "show"])->name("admin.delivery.show");
        Route::post('update/{id}', [DeliveryController::class, 'updateFeeship'])->name('admin.delivery.update');
        Route::get("status/{id}", [DeliveryController::class, "status"])->name("admin.delivery.status"); // Sử dụng PATCH cho cập nhật một phần
        Route::get("delete/{id}", [DeliveryController::class, "delete"])->name("admin.delivery.delete"); // Sử dụng DELETE cho xóa tạm
        Route::get("restore/{id}", [DeliveryController::class, "restore"])->name("admin.delivery.restore"); // Sử dụng PATCH cho khôi phục
        Route::delete("destroy/{id}", [DeliveryController::class, "destroy"])->name("admin.delivery.destroy"); // Sử dụng DELETE cho xóa vĩnh viễn
         // Route lấy danh sách quận/huyện theo tỉnh/thành phố
    Route::get('admin/get-districts/{cityId}', [DeliveryController::class, 'getDistricts'])->name('admin.delivery.getDistricts');
    // Route lấy danh sách xã/phường theo quận/huyện
    Route::get('admin/get-towns/{districtId}', [DeliveryController::class, 'getTowns'])->name('admin.delivery.getTowns');
    });
});
