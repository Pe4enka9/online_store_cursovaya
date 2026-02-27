<?php

namespace App\Http\Controllers\Admin;

use App\Dtos\Orders\OrderDto;
use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class AdminOrderController extends Controller
{
    public function index(): View
    {
        $orders = Order::query()
            ->orderByDesc('id')
            ->get();

        return view('admin.orders.index', ['orders' => $orders]);
    }

    public function update(
        Order    $order,
        OrderDto $dto,
    ): RedirectResponse
    {
        $order->update(['status' => $dto->status]);

        return redirect()->route('admin.orders.index');
    }
}
