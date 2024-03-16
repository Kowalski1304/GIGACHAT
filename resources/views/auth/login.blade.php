<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        #video-background {
            position: fixed;
            right: 0;
            bottom: 0;
            min-width: 100%;
            min-height: 100%;
            width: auto;
            height: auto;
            z-index: -1000;
        }

        form {
            background-color: rgba(255, 255, 255, 0.8);
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            max-width: 400px; /* Установите максимальную ширину формы */
            margin: auto; /* Центрировать форму по горизонтали */
        }
    </style>
</head>
<body>

<video id="video-background" autoplay muted loop>
    <source src="{{ asset('videos/Ryan.mp4') }}" type="video/mp4">
    Your browser does not support the video tag.
</video>

<div class="mx-auto mt-6 w-full max-w-md rounded-xl p-6 shadow-xl sm:mt-10 sm:p-10">
    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif
    <form action="{{ route('login') }}" method="post" autocomplete="off">
        @csrf

        <div class="mb-3">
            <label for="email">Email</label>
            <input type="email" id="email" name="email" value="{{ old('email') }}" required autofocus class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" placeholder="john@example.com" />
            @error('email')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="password">Password</label>
            <input type="password" id="password" name="password" required class="form-control" placeholder="Minimum 8 characters" />
            @error('password')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3 form-check">
            <input type="checkbox" id="remember" name="remember" class="form-check-input" />
            <label for="remember" class="form-check-label">Remember me</label>
        </div>

        <div class="mb-3">
            <a href="{{ route('password.request') }}" class="text-decoration-none text-success">Forgot your password?</a>
        </div>

        <div class="mb-3">
            <button type="submit" class="btn btn-success btn-block">Log In</button>
        </div>
    </form>
</div>

</body>
</html>
