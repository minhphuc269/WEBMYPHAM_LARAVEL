<?php

namespace App\View\Components;

use App\Models\Coupon as ModelsCoupon;
use Illuminate\View\Component;
use Illuminate\Contracts\View\View;

class Coupon extends Component
{
    public $list_coupon;

    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        // Lấy các mã giảm giá có status = 1, sắp xếp theo thời gian tạo, và giới hạn 4 kết quả
        $this->list_coupon = ModelsCoupon::where('status', 1)
            ->orderBy('created_at', 'desc')
            ->limit(4)
            ->get();
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|string
    {
        // Truyền biến $list_coupon vào view
        return view('components.coupon', ['list_coupon' => $this->list_coupon]);
    }
}
