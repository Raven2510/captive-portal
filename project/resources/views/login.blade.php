<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Portal</title>
    <style>
        .error {
            color: red;
            display: inline;
        }
    </style>
</head>
<body>
    <form action="/auth" method="POST">
        @csrf
        @method('POST')
        <input type="email" name="email" placeholder="Enter your LV email..." value="{{ old('email') }}">
        <br>
        @error('email')
        <p class="error">{{ $message }}</p>
        @enderror
        <br><br>
        <input type="password" name="password" placeholder="Enter your password..." value="{{ old('password') }}">
        <br>
        @error('password')
        <p class="error">{{ $message }}</p>
        <br>
        @enderror
        @error('error')
        <p class="error">
            {{ $message }}
        </p>
        <br>
        @endif
        <br>
        <input type="submit" value="Submit" name="submit">
    </form>
</body>
</html>