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
        Notifications
    </h1>
    <table>
        <tr>
            <th>
                Author
            </th>
            <th>
                Caption
            </th>
            <th>
                Image
            </th>
        </tr>
        @foreach($arr as $notif)
        <tr>
            <td>
                {{ $notif->admin->name }}
            </td>
            <td>
                {{ $notif->caption }}
            </td>
            <td>
                {{ $notif->image_path }}
            </td>
        </tr>
        @endforeach
    </table>
    <br><br>
    <a href="/admin">
        Back
    </a>
</body>
</html>