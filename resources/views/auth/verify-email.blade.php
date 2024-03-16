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

<div class="mx-auto mt-6 w-full max-w-md rounded-xl p-6 shadow-xl sm:mt-10 sm:p-10">
    @if (session('message'))
        <div class="alert alert-success" role="alert">
            {{ session('message') }}
        </div>
    @endif
    <form action="{{ route('verification.send') }}" method="post" autocomplete="off">
        @csrf
        <div class="mb-3">
            <button type="submit" class="btn btn-primary btn-block">Verify email</button>
        </div>
    </form>
</div>

</body>
</html>
