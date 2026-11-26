
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laptop Registration</title>

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
        }

        p {
            text-align: center;
            color: gray;
            font-size: 13px;
            margin-bottom: 25px;
        }

        form {
            width: 350px;
            margin: auto;
            padding: 25px;
            background-color: white;
            border-radius: 10px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.1);
        }

        form div {
            margin-bottom: 15px;
        }

        label {
            font-size: 14px;
            color: #334155;
            font-weight: bold;
        }

        input {
            width: 100%;
            box-sizing: border-box;
            padding: 10px;
            margin-top: 5px;
            border: 1px solid #ddd;
            border-radius: 5px;
        }

        input[type="submit"] {
            background-color: #2563eb;
            color: white;
            border: none;
            cursor: pointer;
            font-weight: bold;
            transition: 0.2s;
        }

        input[type="submit"]:hover {
            background-color: #1d4ed8;
        }

        html {
            scrollbar-gutter: stable;
        }
        .error {
            color: red;
            font-size: 12px;
            margin-top: 5px;
            text-align: left;
        }

    </style>
</head>

<body>
    @include('navbar')

    <form method="POST" action="{{ route('update-laptop', $laptop) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <h2>Edit Laptop</h2>
        <p>Update your laptop information</p>

        <div>
            <label>Brand</label>
            <input type="text" name="brand" value="{{ $laptop->brand }}">
            @error('brand')
                <p class="error">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label>Model</label>
            <input type="text" name="model" value="{{ $laptop->model }}">
            @error('model')
                <p class="error">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label>Processor</label>
            <input type="text" name="processor" value="{{ $laptop->processor }}">
            @error('processor')
                <p class="error">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label>RAM (GB)</label>
            <input type="number" name="ram" value="{{ $laptop->ram }}">
            @error('ram')
                <p class="error">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <input name="image" type="file" accept="image/*">
        </div>

        <input type="submit" value="Update Laptop">
    </form>

</body>
</html>
