<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $pageTitle }} | {{ config('app.name') }}</title>
    <link rel="stylesheet" href="{{ asset('auth_assets/styles/style.css') }}">
</head>

<body>
    <div class="wrapper">
        @if (session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul style="margin:0; padding-left:15px;">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="/login" method="POST">
            {{ csrf_field() }}
            <h2>Login</h2>
            <div class="input-field">
                <input type="text" name="username" required>
                <label>Username</label>
            </div>
            <div class="input-field">
                <input type="password" name="password" required>
                <label>password</label>
            </div>
            <button type="submit">Log In</button>
        </form>
    </div>
</body>

</html>
