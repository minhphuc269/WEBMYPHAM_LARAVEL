<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng Nhập Admin</title>
    
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <style>
        body {
            background-color: #f7f7f7;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .login-container {
            background-color: white;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 400px;
        }

        .login-container h1 {
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 20px;
            text-align: center;
        }

        .form-control:focus {
            box-shadow: none;
            border-color: #007bff;
        }

        .btn-login {
            background-color: #007bff;
            border-color: #007bff;
            color: white;
            width: 100%;
        }

        .btn-login:hover {
            background-color: #0056b3;
        }

        .form-text {
            text-align: center;
            margin-top: 10px;
        }
    </style>
</head>

<body>

    <div class="login-container">
        <h1>Đăng Nhập Admin</h1>

        <!-- Hiển thị thông báo nếu có -->
        @if (session('message'))
            <div class="alert alert-danger">
                {{ session('message') }}
            </div>
        @endif

        <!-- Form đăng nhập -->
        <form action="{{ route('website.dologin') }}" method="POST">
            @csrf

            <!-- Tên đăng nhập -->
            <div class="mb-3">
                <label for="username" class="form-label">Email hoặc Tên người dùng</label>
                <input type="text" class="form-control" id="username" name="username" required placeholder="Nhập email hoặc tên người dùng">
            </div>

            <!-- Mật khẩu -->
            <div class="mb-3">
                <label for="password" class="form-label">Mật khẩu</label>
                <input type="password" class="form-control" id="password" name="password" required placeholder="Nhập mật khẩu">
            </div>

            <!-- Nút đăng nhập -->
            <button type="submit" class="btn btn-login">Đăng Nhập</button>
        </form>

        <!-- Liên kết quên mật khẩu -->
        <div class="form-text">
            <a href="#">Quên mật khẩu?</a>
        </div>
    </div>

    <!-- Bootstrap 5 JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>
