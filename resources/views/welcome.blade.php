<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome Page</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            overflow: hidden;
            position: relative;
            display: flex;
            align-items: center;
            justify-content: center;
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

        #content {
            text-align: center;
            color: white;
        }

        button {
            font-size: 24px;
            padding: 15px 30px;
            cursor: pointer;
            border: none;
            color: white;
            margin: 10px;
        }

        #new-user-btn {
            background-color: green;
        }

        #old-user-btn {
            background-color: blue;
        }
    </style>
</head>
<body>

<video id="video-background" autoplay muted loop>
    <source src="{{ asset('videos/Patrick.mp4') }}" type="video/mp4">
    Your browser does not support the video tag.
</video>

<div id="content">
    <h1>Ласкаво просимо!</h1>
    <p>Оберіть свій статус:</p>

    <a href="{{ route('user.store') }}">
        <button id="new-user-btn">Я новенький</button>
    </a>

    <a href="{{ route('user.login') }}">
        <button id="old-user-btn">Я старенький</button>
    </a>
</div>

</body>
</html>
