<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title> WearC</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,600,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <style>
        :root {
            --primary: #181818;
            --accent: #eab7b1;
            --bg: #faf9f6;
            --card: #fff;
            --text: #222;
            --muted: #888;
            --shadow: 0 4px 24px 0 rgba(24,24,24,0.07);
        }
        body { background: var(--bg); color: var(--text); font-family: 'Montserrat', Arial, sans-serif; }
        .navbar {
            background: #fff;
            box-shadow: var(--shadow);
            font-family: 'Montserrat', sans-serif;
            padding-top: 0.7rem;
            padding-bottom: 0.7rem;
        }
        .navbar-brand {
            font-weight: 800;
            font-size: 1.5rem;
            color: var(--primary) !important;
            letter-spacing: 0.04em;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }
        .navbar-brand i { color: var(--accent); font-size: 1.7rem; }
        .navbar-nav .nav-link {
            color: var(--primary) !important;
            font-weight: 600;
            font-size: 1rem;
            padding: 0.5rem 1rem;
            border-radius: 6px;
            margin: 0 0.1rem;
            transition: background 0.15s, color 0.15s;
        }
        .navbar-nav .nav-link.active, .navbar-nav .nav-link:hover {
            background: #fbeeee;
            color: var(--accent) !important;
        }
        .navbar-icons {
            display: flex;
            align-items: center;
            gap: 1.2rem;
            margin-left: 1rem;
        }
        .navbar-icons a, .navbar-icons i {
            font-size: 1.3rem;
            color: var(--primary);
            cursor: pointer;
            transition: color 0.15s;
            margin-right: 0.2rem;
        }
        .navbar-icons a:hover, .navbar-icons i:hover { color: var(--accent); }
        .checkout-section {
            background: var(--card);
            border-radius: 16px;
            box-shadow: var(--shadow);
            border: 1px solid #f3eaea;
            padding: 2.5rem 2rem;
            margin: 2.5rem 0;
        }
        .checkout-title {
            font-size: 2rem;
            font-weight: 800;
            color: var(--primary);
            margin-bottom: 2rem;
        }
        .form-label {
            font-weight: 600;
            color: var(--primary);
        }
        .form-control, .form-select {
            border-radius: 20px;
            border: 1px solid var(--accent);
            font-size: 1.05rem;
            margin-bottom: 1rem;
        }
        .section-title {
            font-size: 1.15rem;
            font-weight: 700;
            color: var(--primary);
            margin-bottom: 1rem;
            margin-top: 2rem;
        }
        .order-summary {
            background: #fbeeee;
            border-radius: 16px;
            padding: 2rem 1.5rem;
            box-shadow: var(--shadow);
            margin-top: 2rem;
        }
        .order-summary-title {
            font-weight: 700;
            color: var(--primary);
            font-size: 1.2rem;
            margin-bottom: 1rem;
        }
        .order-summary-row {
            display: flex;
            justify-content: space-between;
            margin-bottom: 0.7rem;
            font-size: 1.08rem;
        }
        .order-summary-total {
            font-weight: 700;
            color: var(--primary);
            font-size: 1.15rem;
            margin-top: 1rem;
            margin-bottom: 1.2rem;
        }
        .order-summary .btn {
            background: var(--accent);
            color: #fff;
            border-radius: 30px;
            font-weight: 700;
            padding: 0.7rem 2.2rem;
            font-size: 1.1rem;
            border: none;
            width: 100%;
            transition: background 0.15s;
        }
        .order-summary .btn:hover {
            background: var(--primary);
            color: #fff;
        }
        .order-product-img {
            width: 50px;
            height: 50px;
            object-fit: cover;
            border-radius: 8px;
            margin-right: 0.7rem;
        }
        .loading-overlay {
            position: fixed;
            top: 0; left: 0; right: 0; bottom: 0;
            background: rgba(255,255,255,0.7);
            z-index: 9999;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
            font-size: 1.3rem;
            color: var(--primary);
            display: none;
        }
        .spinner-border { color: var(--accent); margin-bottom: 1rem; }
        .footer {
            background: #fff;
            border-top: 1px solid #f3eaea;
            padding: 2.5rem 0 1.2rem 0;
            color: var(--muted);
            font-size: 1rem;
            margin-top: 2rem;
        }
        .footer h5 {
            color: var(--primary);
            font-weight: 700;
            margin-bottom: 1rem;
        }
        .footer a { color: var(--accent); text-decoration: none; margin-right: 0.7rem; }
        .footer a:hover { text-decoration: underline; }
        @media (max-width: 991px) {
            .checkout-section, .order-summary { padding: 1.2rem 0.7rem; }
        }
    </style>
</head>


