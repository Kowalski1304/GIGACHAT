<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Page</title>
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
            background-color: rgba(255, 255, 255, 0.8); /* Змінено з #RRGGBBAA на rgba() */
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        label {
            display: block;
            margin-bottom: 8px;
            text-shadow: 1px 1px 2px #ffffff; /* Біла обводка */
        }

        input {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        button {
            background-color: #9f0000;
            color: #fff;
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            text-shadow: 1px 1px 2px #ffffff; /* Біла обводка */
        }

        button:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>

<video id="video-background" autoplay muted loop>
    <source src="{{ asset('videos/Ryan.mp4') }}" type="video/mp4">
    Your browser does not support the video tag.
</video>

<form method="POST" action="{{ route('register') }}">
    <ul>
        @foreach($errors->all() as $message)
            <li>{{ $message }}</li>
        @endforeach
    </ul>
    @csrf
    <h2>Registration</h2>
    <label for="name">Name:</label>
    <input type="text" id="name" name="name" placeholder="name" required>

    <label for="city">City:</label>
    <input type="text" id="city" name="city" placeholder="city" required>

    <label for="age">Age:</label>
    <input type="number" id="age" name="age" placeholder="age" required>

    <label for="password">Password:</label>
    <input type="password" id="password" name="password" placeholder="password" required>

    <button type="submit">Register</button>
</form>

</body>
</html>
