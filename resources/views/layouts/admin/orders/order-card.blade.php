<div class="order-card">
    <div class="flex ai-center gap-2">
        <h2>Заказ №{{ $order->id }} ({{ $order->status->label() }})</h2>

        <form action="{{ route('admin.orders.update', $order) }}" method="post" class="flex gap-2">
            @csrf
            @method('PATCH')

            <div class="input-wrapper">
                <select name="status" id="status">
                    @foreach(\App\Enums\OrderStatusEnum::cases() as $status)
                        <option
                            value="{{ $status }}"
                            @selected($order->status === $status)
                        >
                            {{ $status->label() }}
                        </option>
                    @endforeach
                </select>
            </div>

            <button type="submit" class="btn btn--primary">Изменить</button>
        </form>
    </div>

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
