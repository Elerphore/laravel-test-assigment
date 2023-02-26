<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <style>
        body {
            flex-wrap: wrap;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        h1 {
            text-align: center;
        }

        form {
            width: 40%;
            display: flex;
            flex-direction: column;
        }

        form > div {
            margin-bottom: 20px;
            display: flex;
            flex-direction: column;
        }

        form > div > label {
            font-size: 16pt;
        }

        input, select {
            border: 1px solid deepskyblue;
            border-radius: 5px;
            outline: none;
            box-shadow: none;
            padding: 10px 20px;
        }

        button {
            color: white;
            box-shadow: none;
            background: #0d1cf5;
            border: 1px solid lightblue;
            border-radius: 5px;
            font-size: 16pt;
            padding: 10px 20px;
        }
    </style>

</head>
<body>

    <a href="@yield('left-arrow-link')" style="align-self: start; margin-top: 100px">
        <img
            style="margin-right: 30px"
            width="32px"
            height="32px"
            src="{{ asset('/img/left-arrow.png') }}"
            alt="left-arrow">
    </a>

    @yield('form')

    <a href="@yield('right-arrow-link')" style="align-self: start; margin-top: 100px">
        <img
            style="margin-left: 30px"
            width="32px"
            height="32px"
            src="{{ asset('/img/right-arrow.png') }}"
            alt="right-arrow">
    </a>

</body>
</html>
