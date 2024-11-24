<!DOCTYPE html>
<html>
<head>
    <title>Order Success</title>
</head>
<body>
    <h1>Đơn hàng của bạn đã được đặt thành công!</h1>
    <p><strong>Mã đơn hàng:</strong> {{ $orderCode }}</p>
    <p><strong>Địa chỉ giao hàng:</strong> {{ $deliveryAddress }}</p>
    <p><strong>Số điện thoại:</strong> {{ $deliveryPhone }}</p>
    <p><strong>Ghi chú:</strong> {{ $note }}</p>

    <h3>Chi tiết đơn hàng:</h3>
    <ul>
        @if ($orderDetails && count($orderDetails) > 0)
            @foreach ($orderDetails as $detail)
                <li>{{ $detail['id'] }} - {{ $detail['qty'] }} x {{ number_format($detail['price'], 0, ',', '.') }} VND</li>
            @endforeach
        @else
            <li>Không có chi tiết đơn hàng</li>
        @endif
    </ul>
</body>
</html>
