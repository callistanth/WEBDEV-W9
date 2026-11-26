
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
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

                /* SEARCH */
        .search-container {
            width: 80%;
            margin: 0 auto 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 10px;
        }

        .search-form {
            display: flex;
            gap: 8px;
        }

        .search-form input {
            width: 280px;
            padding: 10px 14px;
            border: 1px solid #cbd5e1;
            border-radius: 7px;
            outline: none;
            font-size: 14px;
        }

        .search-form input:focus {
            border-color: #2563eb;
            box-shadow: 0 0 0 3px rgba(37, 99, 235, 0.1);
        }

        .search-btn {
            background-color: #2563eb;
            color: white;
            border: none;
            padding: 10px 18px;
            border-radius: 7px;
            cursor: pointer;
            font-size: 14px;
            transition: 0.2s;
        }

        .search-btn:hover {
            background-color: #1d4ed8;
        }

        .clear-btn {
            text-decoration: none;
            color: #64748b;
            padding: 10px 14px;
            border: 1px solid #cbd5e1;
            border-radius: 7px;
            font-size: 14px;
        }

        .clear-btn:hover {
            background-color: #f1f5f9;
            color: #334155;
        }

        /* PAGINATION */
        .pagination-container .d-flex {
            justify-content: center !important;
        }

        .pagination-container .d-flex > div:first-child {
            display: none !important;
        }

        .pagination {
            justify-content: center;
            gap: 5px;
        }

        .page-link {
            border-radius: 6px !important;
            color: #2563eb;
        }

        .page-item.active .page-link {
            background-color: #2563eb;
            border-color: #2563eb;
        }

        @media (max-width: 768px) {
            .search-container,
            .pagination-container {
                width: 100%;
            }

            .search-container {
                flex-wrap: wrap;
            }

            .search-form {
                width: 100%;
            }

            .search-form input {
                width: 100%;
                min-width: 0;
            }

            table {
                width: 100%;
            }
        }
    </style>
</head>

<body>
    @include('navbar')
    
    <h2>Data Laptop</h2>
    <p>Welcome, {{ Auth::user()->name }}</p>
    
    
    <form action="/" method="GET" class="search-form">
        <input type="text" name="search" placeholder="Search laptop brand..." value="{{ request('search') }}">
        <button type="submit" class="search-btn">Search</button>
        @if(request('search'))
            <a href="/" class="clear-btn">Clear</a>
        @endif
    </form>

    <table>
        <tr>
            <th>Brand</th>
            <th>Model</th>
            <th>Processor</th>
            <th>RAM</th>
            <th>Image</th>
            <th>Action</th>
        </tr>

        @foreach ($laptop as $item)
        <tr>
            <td>{{ $item->brand }}</td>
            <td>{{ $item->model }}</td>
            <td>{{ $item->processor }}</td>
            <td>{{ $item->ram }}</td>
            <td>
                @if ($item->image)
                    <img src="{{ asset('storage/' . $item->image) }}"
                        alt="Product Image" width="150">
                @endif
            </td> 
            <td>
                <div class="action">
                    <a href="{{ route('edit-laptop', $item) }}" class="edit">Edit</a>

                    <form method="POST" action="{{ route('delete-laptop', $item) }}">
                        @csrf
                        @method('DELETE')
                        <input type="submit" value="Delete">
                    </form>
                </div>
            </td>
        </tr>
        @endforeach
    </table>


    <div class="pagination-container mt-4">
        {{ $laptop->appends(request()->query())->links('pagination::bootstrap-5') }}
    </div>

</body>
</html>
