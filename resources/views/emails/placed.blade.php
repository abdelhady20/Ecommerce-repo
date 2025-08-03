<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Order Invoice #{{ $order->id }}</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f8f9fa;
            color: #333;
            padding: 20px;
        }
        .email-container {
            background: #fff;
            border-radius: 10px;
            padding: 20px;
            max-width: 600px;
            margin: auto;
            border: 1px solid #ddd;
        }
        .header {
            display: flex;
            align-items: center;
            gap: 10px;
            border-bottom: 2px solid var(--accent, #ff6f61);
            padding-bottom: 10px;
            margin-bottom: 20px;
        }
        .header i {
            color: var(--accent, #ff6f61);
            font-size: 1.5rem;
        }
        .order-details {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 15px;
        }
        .order-details th, .order-details td {
            padding: 10px;
            border: 1px solid #ddd;
            text-align: left;
        }
        .order-details th {
            background: #f2f2f2;
        }
        .total {
            font-size: 18px;
            font-weight: bold;
            text-align: right;
        }
        .footer {
            margin-top: 20px;
            text-align: center;
            font-size: 13px;
            color: #888;
        }
    </style>
</head>
<body>
<div class="email-container">
    <!-- Logo -->
    <div class="header">
        <i class="fa-solid fa-shirt"></i>
        <span style="font-size: 1.2rem; font-weight: bold;">WearC</span>
    </div>

    <h2>Thank you for your order, {{ $order->customer_name }}</h2>
    <p>We have received your order <strong>#{{ $order->id }}</strong>.</p>

    <h3>Order Details</h3>
    <table class="order-details">
        <tr>
            <th>Product</th>
            <th>Qty</th>
            <th>Price</th>
        </tr>
        @foreach($order->items as $item)
            <tr>
                <td>{{ $item->product->name }}</td>
                <td>{{ $item->quantity }}</td>
                <td>${{ number_format($item->price, 2) }}</td>
            </tr>
        @endforeach
    </table>

    <p class="total">Total: ${{ number_format($order->total, 2) }}</p>

    <div class="footer">
        &copy; {{ date('Y') }} WearC. All rights reserved.
    </div>
</div>
</body>
</html>
