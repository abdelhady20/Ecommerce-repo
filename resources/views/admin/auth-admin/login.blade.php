<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login Page</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/particles.js/2.0.0/particles.min.js"></script>

    <style>
        @import url('https://fonts.googleapis.com/css?family=Nunito');
        @import url('https://fonts.googleapis.com/css?family=Poiret+One');

        body, html {
            height: 100%;
            background: black;
            position: relative;
        }
        #login-box {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 350px;
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
        #login-box .logo .tweak {
            color: #ff5252;
        }
        #login-box .controls {
            padding-top: 30px;
        }
        #login-box .controls input {
            border-radius: 0px;
            background: rgb(98, 96, 96);
            border: 0px;
            color: white;
            font-family: 'Nunito', sans-serif;
        }
        #login-box .controls input:focus {
            box-shadow: none;
        }
        #login-box button.btn-custom {
            border-radius: 2px;
            margin-top: 8px;
            background: #ff5252;
            border-color: rgba(48, 46, 45, 1);
            color: white;
            font-family: 'Nunito', sans-serif;
        }
        #login-box button.btn-custom:hover {
            transition: all 500ms ease;
            background: rgba(48, 46, 45, 1);
            border-color: #ff5252;
        }
        #particles-js {
            width: 100%;
            height: 100%;
            background-size: cover;
            background-position: 50% 50%;
            position: fixed;
            top: 0px;
            z-index: 1;
        }
    </style>
</head>
<body>

<div class="container">
    <div id="login-box">
        <div class="logo">
            <img src="http://lorempixel.com/output/people-q-c-100-100-1.jpg"
                 class="img img-responsive img-circle center-block"/>
            <h1 class="logo-caption"><span class="tweak">L</span>ogin</h1>
        </div>
        <div class="controls">
            <input type="text" name="username" placeholder="Username" class="form-control"/>
            <input type="password" name="password" placeholder="Password" class="form-control"/>
            <button type="button" class="btn btn-default btn-block btn-custom">Login</button>
        </div>
    </div>
</div>

<div id="particles-js"></div>

<script>
    particlesJS('particles-js',
        {
            "particles": {
                "number": {"value": 80, "density": {"enable": true, "value_area": 800}},
                "color": {"value": "#ffffff"},
                "shape": {"type": "circle"},
                "opacity": {"value": 0.5},
                "size": {"value": 5, "random": true},
                "line_linked": {"enable": true, "distance": 150, "color": "#ffffff", "opacity": 0.4, "width": 1},
                "move": {"enable": true, "speed": 6, "direction": "none"}
            },
            "interactivity": {
                "events": {
                    "onhover": {"enable": true, "mode": "repulse"},
                    "onclick": {"enable": true, "mode": "push"}
                },
                "modes": {
                    "repulse": {"distance": 200},
                    "push": {"particles_nb": 4}
                }
            },
            "retina_detect": true
        }
    );
</script>

</body>
</html>
