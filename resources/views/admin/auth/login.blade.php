<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Admin Login</title>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet">
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <style>
        @import url('https://fonts.googleapis.com/css?family=Nunito');
        @import url('https://fonts.googleapis.com/css?family=Poiret+One');

        body, html {
            height: 100%;
            background:black;
            position: relative;
        }
        #login-box {
            position: absolute;
            top: 300px;
            left: 50%;
            transform: translateX(-50%);
            width: 350px;
            margin: 0 auto;
            border: 1px solid black;
            background: rgba(48, 46, 45, 1);
            min-height: 250px;
            padding: 20px;
            z-index: 9999;
        }
        #login-box .logo .logo-caption {
            font-family: 'Poiret One', cursive;
            color: white;
            text-align: center;
        }
        #login-box .logo .tweak { color: #ff5252; }
        #login-box .controls { padding-top: 30px; }
        #login-box .controls input {
            border-radius: 0px;
            background: rgb(98, 96, 96);
            border: 0px;
            color: white;
            font-family: 'Nunito', sans-serif;
        }
        #login-box button.btn-custom {
            border-radius: 2px;
            margin-top: 8px;
            background:#ff5252;
            border-color: rgba(48, 46, 45, 1);
            color: white;
            font-family: 'Nunito', sans-serif;
        }
        #particles-js{
            width: 100%;
            height: 100%;
            position: fixed;
            top: 0px;
            z-index:1;
        }
    </style>
</head>
<body>
<div class="container">
    <div id="login-box">
        <div class="logo">
{{--            <img src="https://via.placeholder.com/100" class="img img-responsive img-circle center-block"/>--}}
            <h1 class="logo-caption"><span class="tweak">Wear</span>C Login</h1>
        </div>
        <div class="controls">
            @if($errors->any())
                <div class="alert alert-danger">
                    {{ $errors->first() }}
                </div>
            @endif
            <form method="POST" action="{{ route('admin.login') }}">
                @csrf
                <input type="email" name="email" placeholder="Email" class="form-control" required />
                <input type="password" name="password" placeholder="Password" class="form-control" required />
                <button type="submit" class="btn btn-default btn-block btn-custom">Login</button>
            </form>
        </div>
    </div>
</div>
<div id="particles-js"></div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/particles.js/2.0.0/particles.min.js"></script>
<script>
    particlesJS('particles-js', {
        particles: {
            number: { value: 80, density: { enable: true, value_area: 800 } },
            color: { value: "#ffffff" },
            shape: { type: "circle" },
            opacity: { value: 0.5 },
            size: { value: 5, random: true },
            line_linked: { enable: true, distance: 150, color: "#ffffff", opacity: 0.4 },
            move: { enable: true, speed: 6 }
        },
        interactivity: {
            events: { onhover: { enable: true, mode: "repulse" }, onclick: { enable: true, mode: "push" } }
        },
        retina_detect: true
    });
</script>
</body>
</html>
