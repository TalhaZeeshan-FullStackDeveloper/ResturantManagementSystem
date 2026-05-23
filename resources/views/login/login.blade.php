<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <style>
        body {
            background: #000; /* black background */
            color: #fff; /* white text */
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .login-form {
            background: rgba(20, 20, 20, 0.9);
            padding: 2rem;
            border-radius: 20px;
            max-width: 400px;
            width: 100%;
            animation: slideIn 0.8s ease-out;
            border: 2px solid red;
            box-shadow: 0 0 20px red, 0 0 40px rgba(255,0,0,0.6);
        }

        .login-heading {
            text-align: center;
            margin-bottom: 1.5rem;
            font-weight: bold;
            font-size: 1.8rem;
            color: red;
            opacity: 0;
            animation: fadeDown 1s ease-in-out 0.6s forwards;
        }

        .form-control {
            border-radius: 12px;
            padding: 0.8rem;
            background: transparent;
            color: #fff;
            border: 1px solid #555;
            transition: all 0.3s ease;
        }

        /* Placeholder white */
        .form-control::placeholder {
            color: rgba(255,255,255,0.7);
        }

        /* Focus = red glow */
        .form-control:focus {
            border-color: #dc3545;
            box-shadow: 0 0 10px rgba(220, 53, 69, 0.8);
            background: transparent;
            color: #fff;
        }

        .btn {
            border-radius: 12px;
            font-weight: 600;
            transition: transform 0.2s ease, box-shadow 0.2s ease;
           
        }

        .btn:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 18px rgba(220,53,69,0.4);
        }

        .toggle-password {
            position: absolute;
            right: 12px;
            top: 50%;
            transform: translateY(-50%);
            cursor: pointer;
            font-size: 1.2rem;
            color: #bbb;
            transition: color 0.3s;
        }

        .toggle-password:hover {
            color: #dc3545;
        }

        /* Animations */
        @keyframes slideIn {
            from {
                transform: translateY(-40px);
                opacity: 0;
            }
            to {
                transform: translateY(0);
                opacity: 1;
            }
        }

        @keyframes fadeDown {
            from {
                transform: translateY(-20px);
                opacity: 0;
            }
            to {
                transform: translateY(0);
                opacity: 1;
            }
        }

        /* Responsive */
        @media (max-width: 576px) {
            .login-form {
                padding: 1.5rem;
                border-radius: 15px;
            }

            .login-heading {
                font-size: 1.5rem;
            }
        }
    </style>
</head>
<body>
    <div class="login-form">
        <h2 class="login-heading">Login</h2>

        @if(session('error'))
            <div class="alert alert-danger text-center">{{ session('error') }}</div>
        @endif

        <form action="/login" method="POST">
            @csrf
            <input class="form-control mb-3" name="email" placeholder="Email" type="email" required>

            <div class="position-relative mb-3">
                <input class="form-control" id="password" name="password" placeholder="Password" type="password" required>
                <span class="toggle-password" onclick="togglePassword('password')">&#128065;</span>
            </div>

            <div class="d-grid gap-2">
                <button style=" background: #ff0000" class="btn btn-danger">Login</button>
                <a href="/register" class="btn btn-danger">Register</a>
            </div>
        </form>
    </div>

    <script>
        function togglePassword(id) {
            const input = document.getElementById(id);
            input.type = input.type === "password" ? "text" : "password";
        }
    </script>
</body>
</html>
