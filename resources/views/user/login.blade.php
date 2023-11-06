<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <style>
        * {
            box-sizing: border-box
        }

        form {
            display: grid;
            row-gap: 20px;
            width: 200px;

            margin-left: auto;
            margin-right: auto;
        }

        input {
            padding: 10px 20px
        }

        button {
            padding: 12px 24px;
            background: black;
            color: white;
        }
    </style>
    <title>Login</title>
</head>
<body>
    <form method="post" action="{{ route('user.login') }}">
        @csrf
        <input type="email" name="email" placeholder="Ваш e-mail">
        <input type="password" name="password" placeholder="Ваш пароль">
        <button type="submit">Войти</button>
    </form>
</body>
</html>
