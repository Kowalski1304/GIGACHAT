<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chat Page</title>
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

        .button {
            font-size: 18px;
            padding: 10px 20px;
            margin: 10px;
            border: none;
            background-color: #007bff;
            color: white;
            cursor: pointer;
            border-radius: 5px;
        }
    </style>
</head>
<body>

<video id="video-background" autoplay muted loop>
    <source src="{{ asset('videos/Ryan2.mp4') }}" type="video/mp4">
    Your browser does not support the video tag.
</video>

<div class="buttons-container">
    {{-- <form action="{{ route('chat.history') }}" method="POST" style="display: inline;">
        @csrf
        <button type="submit" class="button">Історія чатів</button>
    </form> --}}

    <form action="{{ route('find.chat') }}" method="POST" style="display: inline;">
        @csrf
        <button type="submit" class="button">Знайти чат</button>
    </form>

    {{-- <form action="{{ route('profile') }}" method="POST" style="display: inline;">
        @csrf
        <button type="submit" class="button">Мій профіль</button>
    </form> --}}

    <form action="{{ route('logout') }}" method="POST" style="display: inline;">
        @csrf
        <button type="submit" class="button">Вийти з акаунту</button>
    </form>
</div>

</body>
</html>
