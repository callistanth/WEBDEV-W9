
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Laptop</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f6f9;
            padding: 30px;
            margin: 0;
        }

        h2 {
            text-align: center;
            color: #2563eb;
            margin-bottom: 25px;
        }

        table {
            width: 80%;
            margin: auto;
            border-radius: 10px;
            border-collapse: collapse;
            background-color: white;
            box-shadow: 0 2px 8px rgba(0,0,0,0.1);
            overflow: hidden;
        }

        th, td {
            padding: 14px;
            text-align: center;
            border-bottom: 1px solid #e2e8f0;
        }

        th {
            background-color: #2563eb;
            color: white;
            font-size: 14px;
        }

        td {
            font-size: 14px;
            color: #334155;
        }

        tr:hover {
            background-color: #f1f5f9;
        }

        input[type="submit"] {
            background-color: #fee2e2;
            color: #dc2626;
            border: none;
            padding: 8px 18px;
            border-radius: 6px;
            font-size: 13px;
            font-weight: bold;
            cursor: pointer;
            transition: 0.2s;
        }

        input[type="submit"]:hover {
            background-color: #dc2626;
            color: white;
        }

        td form {
            margin: 0;
        }

        .edit {
            text-decoration: none;
            background-color: #fef08a;
            color: #854d0e;
            padding: 8px 18px;
            border-radius: 6px;
            font-size: 13px;
            font-weight: bold;
            transition: 0.2s;
        }

        .edit:hover {
            background-color: #eab308;
            color: white;
        }

        .action {
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 10px;
        }

        .action form {
            margin: 0;
        }

        html {
            scrollbar-gutter: stable;
        }

        @media (max-width: 768px) {
            body {
                padding: 15px;
            }

            table {
                width: 100%;
                font-size: 12px;
            }

            th, td {
                padding: 10px;
            }
        }
    </style>
</head>

<body>
    @include('navbar')

    <h2>Data Laptop</h2>

    <table>
        <tr>
            <th>Brand</th>
            <th>Model</th>
            <th>Processor</th>
            <th>RAM</th>
            <th>Action</th>
        </tr>

        @foreach ($laptop as $item)
        <tr>
            <td>{{ $item->brand }}</td>
            <td>{{ $item->model }}</td>
            <td>{{ $item->processor }}</td>
            <td>{{ $item->ram }}</td>
            <td>
                <div class="action">
                    <a href="/edit-laptop/{{ $item->id }}" class="edit">Edit</a>

                    <form method="POST" action="{{ route('delete-laptop') }}">
                        @csrf
                        <input type="hidden" name="id" value="{{ $item->id }}">
                        <input type="submit" value="Delete">
                    </form>
                </div>
            </td>
        </tr>
        @endforeach
    </table>

</body>
</html>
