
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
            margin: 0px;
        }

        form {
            width: 350px;
            margin: auto;
            padding: 25px;
            background-color: white;
            border-radius: 10px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.1);
        }

        h2 {
            text-align: center;
            color: #2563eb;
            
        }

        p {
            text-align: center;
            color: gray;
            font-size: 13px;
        }

        form div {
            margin-bottom: 15px;
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
        }

        html {
            scrollbar-gutter: stable;
        }
    </style>
</head>

<body>
    @include('navbar')

    <form method="POST" action="{{ route('save-laptop') }}">
        @csrf

        <h2>Laptop Registration</h2>
        <p>Enter your laptop information</p>

        <div>
            <label>Brand</label>
            <input type="text" name="brand" placeholder="Enter laptop brand">
        </div>

        <div>
            <label>Model</label>
            <input type="text" name="model" placeholder="Enter laptop model">
        </div>

        <div>
            <label>Processor</label>
            <input type="text" name="processor" placeholder="Enter processor">
        </div>

        <div>
            <label>RAM (GB)</label>
            <input type="number" name="ram" placeholder="Enter RAM capacity">
        </div>

        <input type="submit" value="Save Laptop">

    </form>

</body>
</html>
