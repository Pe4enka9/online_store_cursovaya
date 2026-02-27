<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Services\Orders\OrderService;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class OrderController extends Controller
{
    public function __construct(
        private OrderService $orderService,
    )
    {
    }

    public function index(): View
    {
        /** @var User $user */
        $user = auth()->user();
        $orders = $user->orders()
            ->orderByDesc('id')
            ->get();

        return view('orders.index', ['orders' => $orders]);
    }

    public function store(): RedirectResponse
    {
        /** @var User $user */
        $user = auth()->user();
        $this->orderService->createOrder($user);

        return redirect()->route('home');
    }
}
