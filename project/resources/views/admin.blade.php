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
        #logout {
            background-color: darkgray;
            padding: .6rem 1rem;
            color: white;
            text-decoration: none;
            border-radius: 2px;
        }
        a {
            text-decoration: none;
            color: black;
        }
        a:hover {
            background-color: darkslategray;
        }
    </style>
</head>
<body>
    <h1>
            Connected Users: {{ count($connected_users) }}
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
        @foreach($connected_users as $user)
        
        <tr>
            <td>
                <a href="/users/{{$user->id}}">
                    {{ $user->name }}
                </a>
            </td>
            <td>
                <a href="/users/{{$user->id}}">
                {{ $user->email }}
                </a>
            </td>
            <td>
                <a href="/users/{{$user->id}}">
                {{ $user->role }}
                </a>
            </td>
        </tr>
        @endforeach
    </table>
    <br><br>
    <a id="logout" href="{{ url('logout') }}">
        Log Out
    </a>
</body>
</html>