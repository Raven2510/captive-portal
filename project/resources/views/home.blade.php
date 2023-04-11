<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        a {
            background-color: darkgray;
            padding: .6rem 1rem;
            color: white;
            text-decoration: none;
            border-radius: 2px;
        }
        a:hover {
            background-color: darkslategray;
        }
    </style>
</head>
<body>
    <h1>
        Welcome User!
    </h1>
    <a href="{{ url('logout') }}">
        Log Out
    </a>
</body>
</html>