<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Page</title>
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

<form method="POST" action="{{ route('password.update') }}" class="mx-auto mt-6 w-full max-w-md rounded-xl p-6 shadow-xl sm:mt-10 sm:p-10">
    <h2>Reset password</h2>
    @csrf

    <input type="hidden" name="token" value="{{ $request->token }}">

    <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input type="email" id="email" name="email" value="{{ old('email', $request->email) }}" required autofocus class="form-control" placeholder="john@example.com" />
        @error('email')
        <p class="text-danger">{{ $message }}</p>
        @enderror
    </div>

    <div class="mb-3">
        <label for="password" class="form-label">Password</label>
        <input type="password" id="password" name="password" required class="form-control" placeholder="Minimum 8 characters" />
        @error('password')
        <p class="text-danger">{{ $message }}</p>
        @enderror
    </div>

    <div class="mb-3">
        <label for="password_confirmation" class="form-label">Confirm Password</label>
        <input type="password" id="password_confirmation" name="password_confirmation" required class="form-control" placeholder="Minimum 8 characters" />
        @error('password_confirmation')
        <p class="text-danger">{{ $message }}</p>
        @enderror
    </div>

    <div>
        <button type="submit" class="btn btn-primary">Reset Password</button>
    </div>
</form>

</body>
</html>
