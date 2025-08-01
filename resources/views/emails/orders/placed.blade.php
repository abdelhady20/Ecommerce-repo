@component('mail::message')
    # Thank you for your order

    We have received your order **#{{ $order->id }}**
    and we will contact you shortly.

    ---

    ## Order Summary
    @component('mail::table')
        | Product              | Quantity | Price     |
        | -------------------- | -------- | --------- |
        @foreach($order->items as $item)
            | {{ $item->product->name }} | {{ $item->quantity }} | ${{ number_format($item->price, 2) }} |
        @endforeach
    @endcomponent

    **Total:** ${{ number_format($order->total, 2) }}

    ---

    Thanks,
    ****
@endcomponent
