<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đơn hàng {{ $order->order_code }}</title>
    <style>
        body {
            font-family: DejaVu Sans;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid black;
            padding: 8px;
        }
        th {
            text-align: left;
        }
        .total {
            text-align: right;
        }
    </style>
</head>
<body>
    <h1>Thông tin đơn hàng: {{ $order->order_code }}</h1>
    
    <!-- Thông tin tài khoản -->
    <h4>Thông tin tài khoản</h4>
    <table>
        <tr>
            <th>Tên tài khoản</th>
            <td>{{ $order->user->name }}</td>
        </tr>
        <tr>
            <th>Số điện thoại</th>
            <td>{{ $order->user->phone }}</td>
        </tr>
        <tr>
            <th>Email</th>
            <td>{{ $order->user->email }}</td>
        </tr>
    </table>

    <!-- Thông tin vận chuyển hàng -->
    <h4>Thông tin vận chuyển hàng</h4>
    <table>
        <tr>
            <th>Mã đơn hàng</th>
            <td>{{ $order->order_code }}</td>
        </tr>
        <tr>
            <th>Địa chỉ giao hàng</th>
            <td>{{ $order->delivery_address }}</td>
        </tr>
        <tr>
            <th>Số điện thoại</th>
            <td>{{ $order->delivery_phone }}</td>
        </tr>
        <tr>
            <th>Email</th>
            <td>{{ $order->delivery_email }}</td>
        </tr>
        <tr>
            <th>Ghi chú</th>
            <td>{{ $order->note }}</td>
        </tr>
        <tr>
            <th>Hình thức thanh toán</th>
            <td>{{ $order->type == 1 ? 'Chuyển khoản' : 'Thanh toán khi nhận hàng' }}</td>
        </tr>
    </table>

    <!-- Chi tiết đơn hàng -->
    <h4>Chi tiết đơn hàng</h4>
    <table>
        <thead>
            <tr>
                <th>STT</th>
                <th>Tên sản phẩm</th>
                <th>Số lượng</th>
                <th>Giá</th>
                <th>Tổng tiền</th>
            </tr>
        </thead>
        <tbody>
            @foreach($orderDetails as $key => $detail)
            <tr>
                <td>{{ $key + 1 }}</td>
                <td>{{ $detail->product->name ?? 'Không có' }}</td>
                <td>{{ $detail->qty }}</td>
                <td>{{ number_format($detail->price, 0, ',', '.') }} đ</td>
                <td>{{ number_format($detail->amount, 0, ',', '.') }} đ</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <!-- Tổng cộng chi phí -->
    <p class="total">
        <strong>Tổng tiền:</strong> 
        {{ number_format($orderDetails->sum(function($detail) {
            return $detail->amount + $detail->feeship - $detail->discount;
        }), 0, ',', '.') }} đ
    </p>
</body>
</html>
