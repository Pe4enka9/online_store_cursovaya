<div class="order-card">
    <h2>Заказ №{{ $order->id }} ({{ $order->status->label() }})</h2>
    <h3 class="order-card__title">Товары</h3>

    <div class="flex fd-column gap-1">
        @foreach($order->cart->products as $product)
            @include('layouts.orders.product-card')
        @endforeach
    </div>

    <div class="order-card__total-price text text--large">
        Итого: <span class="price">{{ $order->total_price }} руб.</span>
    </div>
</div>
