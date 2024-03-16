<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chat Page</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #f2f2f2;
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

        .buttons-container {
            text-align: center;
        }

    </style>
</head>
<body>

<video id="video-background" autoplay muted loop>
    <source src="{{ asset('videos/Ryan2.mp4') }}" type="video/mp4">
    Your browser does not support the video tag.
</video>

<div class="container">
    <div class="buttons-container">
        <div class="text-center mb-4">
            <form action="{{ route('find.chat') }}" method="POST" class="d-inline">
                @csrf
                <button type="submit" class="btn btn-primary mr-2">Знайти чат</button>
            </form>

            <form action="{{ route('profile.edit') }}" method="get" class="d-inline">
                @csrf
                <button type="submit" class="btn btn-primary mr-2">Мій профіль</button>
            </form>

            <form action="{{ route('logout') }}" method="POST" class="d-inline">
                @csrf
                <button type="submit" class="btn btn-danger">Вийти з акаунту</button>
            </form>
        </div>
    </div>
</div>

</body>
</html>
