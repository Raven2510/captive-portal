<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }
        td, th {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }

        tr:nth-child(even) {
            background-color: #dddddd;
        }
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
            Connected Users: {{ count($users) }}
    </h1>
    <table>
        <tr>
            <th>
                Name
            </th>
            <th>
                Email
            </th>
            <th>
                Role
            </th>
        </tr>
        @foreach($users as $user)
        <tr>
            <td>
                {{ $user->name }}
            </td>
            <td>
                {{ $user->email }}
            </td>
            <td>
                {{ $user->role }}
            </td>
        </tr>
        @endforeach
    </table>
    <br><br>
    <a href="{{ url('logout') }}">
        Log Out
    </a>
</body>
</html>