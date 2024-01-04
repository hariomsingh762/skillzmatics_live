<!DOCTYPE html>
<html>
<head>
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #f9f9f9;
      text-align: center;
    }

    .container {
      max-width: 500px;
      margin: 0 auto;
      padding: 40px;
      background-color: #fff;
      border-radius: 5px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    h1 {
      color: #333;
      margin-bottom: 20px;
    }

    p {
      color: #666;
      margin-bottom: 30px;
    }

    a {
      display: inline-block;
      padding: 10px 20px;
      background-color: #5cd24f;
      color: #000;
      text-decoration: none;
      border-radius: 4px;
      transition: background-color 0.3s ease;
    }

    a:hover {
      background-color: #0056b3;
    }
  </style>
</head>
<body>
  <div class="container">
    <h1>Hello {{ $users->company_name }}</h1>
    <p>Please click the password reset button to reset your password</p>
    <a href="{{ url('company/forgot-password') }}/{{ $users->email }}/{{ $token->token }}">Reset Password</a>
  </div>
</body>
</html>