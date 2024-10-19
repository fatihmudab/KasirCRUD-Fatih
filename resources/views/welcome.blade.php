<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap');

        body {
            font-family: 'Roboto', sans-serif;
            background: linear-gradient(180deg, #1e3c72 0%, #2a5298 100%);
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .login-container {
            background: white;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            width: 400px;
            max-width: 100%;
        }

        .login-header {
            background: #2a5298;
            padding: 40px 20px;
            text-align: center;
            color: white;
        }

        .login-header h1 {
            margin: 0;
            font-size: 24px;
            font-weight: 700;
        }

        .login-header p {
            margin: 10px 0 0;
            font-size: 14px;
        }

        .login-body {
            padding: 20px;
        }

        .login-body h2 {
            margin: 0 0 20px;
            font-size: 18px;
            font-weight: 700;
            text-align: center;
        }

        .input-group {
            margin-bottom: 15px;
            position: relative;
        }

        .input-group input {
            width: 100%;
            padding: 10px 20px 10px 40px;
            /* Adjust padding for space */
            border: 1px solid #ccc;
            border-radius: 5px;
            outline: none;
        }

        .input-group i {
            position: absolute;
            top: 50%;
            left: 10px;
            transform: translateY(-50%);
            color: #2a5298;
        }

        .alert {
            padding: 10px;
            border-radius: 5px;
            margin-bottom: 15px;
            text-align: center;
        }

        .alert-success {
            background-color: #d4edda;
            /* Light green background */
            color: #155724;
            /* Dark green text */
            border: 1px solid #c3e6cb;
            /* Light green border */
        }

        .alert-danger {
            background-color: #f8d7da;
            /* Light red background */
            color: #721c24;
            /* Dark red text */
            border: 1px solid #f5c6cb;
            /* Light red border */
        }

        .login-footer {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: 10px;
        }

        .login-footer a {
            color: #2a5298;
            text-decoration: none;
            font-size: 14px;
        }

        .login-footer a:hover {
            text-decoration: underline;
        }

        .login-button {
            width: 100%;
            padding: 10px;
            background: #2a5298;
            color: white;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
        }

        .login-button:hover {
            background: #1e3c72;
        }

        .footer {
            text-align: center;
            margin-top: 20px;
            font-size: 12px;
            color: white;
        }
    </style>
</head>

<body>
    <form class="login" method="POST" action="/login-post">
        @csrf

        @if (Session::get('failed'))
            <div class="alert alert-danger">{{ Session::get('failed') }}</div>
        @endif

        @if (Session::get('canAccess'))
            <div class="alert alert-danger">{{ Session::get('canAccess') }}</div>
        @endif


        <div class="login-container">
            <div class="login-header">
                <h1>Welcome to the website</h1>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore
                    et dolore magna aliqua.</p>
            </div>
            <div class="login-body">
                <h2>USER LOGIN</h2>
                <div class="input-group">
                    <i class="fas fa-user"></i>
                    <input name="email" type="email" placeholder="Username" required>
                </div>
                <div class="input-group">
                    <i class="fas fa-lock"></i>
                    <input name="password" type="password" placeholder="Password" required>
                </div>
                <div class="login-footer">
                    <label>
                        <input type="checkbox"> Remember
                    </label>
                    <a href="#">Forgot Password?</a>
                </div>
                <button class="login-button" type="submit">Login</button>
            </div>
        </div>
        <div class="footer">
            Fatih Muda Bangsawan
        </div>
    </form>
</body>

</html>
