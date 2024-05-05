<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Books</title>
    <style>
        body {
            background-color: #272829;
            margin: 0;
            padding: 0;
        }

        .navbar {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            background-color: rgba(33, 37, 43, 0.8);
            padding: 10px 0px;
            height: 50px;
            text-align: center;
            font-size: 20px;
            color: #ffffff; 
            display: flex;
            justify-content: center;
            align-items: center;
            z-index: 999; 
        }

        .navbar a {
            color: #ffffff; 
            text-decoration: none;
            margin-right: 50px;
            margin-left: 50px;
            font-weight: bold;
            display: flex;
            justify-content: center;
            align-items: center;
        }


        .navbar a:hover {
            color: #cccccc; 
        }

        .container {
            width: 50%;
            margin: 0 auto;
            padding-top: 50px;
            margin-top: 100px;
        }

        .form-group {
            margin-bottom: 50px;
        }

        .form-label {
            font-weight: bold;
            color: white;
            font-size: 20px;
            margin-bottom: 20px;
        }

        .form-control {
            width: 100%;
            height: 50px;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
            font-size: 18px;
        }

        .btn-primary {
            background-color: #007bff;
            color: #fff;
            padding: 20px 40px;
            border: none;
            border-radius: 50px;
            cursor: pointer;
            margin-left: 290px;
            font-size: 18px;
        }

        .btn-primary:hover {
            background-color: #0056b3;
        }

        .alert-danger {
            color: #721c24;
            background-color: #f8d7da;
            border: 1px solid #f5c6cb;
            padding: 10px;
            border-radius: 5px;
            margin-top: 10px;
        }
    </style>
</head>
<body>
    <nav class="navbar">    
        <a href="{{ route('viewPage') }}">Show All</a>
        <a href="{{ route('addPage') }}">Add</a>
        <a href="{{ route('viewPage') }}">Back</a> 
    </nav>


    <div class="container">
        <form method="POST" action="{{route('store')}}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="name" class="form-label">Name</label>
                <input type="text" id="name" name="name" class="form-control" required>
                @error('name')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="name" class="form-label">Category</label>
                <input type="text" id="category" name="category" class="form-control" required>
                @error('category')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="price" class="form-label">Price</label>
                <input type="number" id="price" name="price" class="form-control" required>
                @error('price')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="age" class="form-label">Stock</label>
                <input type="number" id="stock" name="stock" class="form-control" required>
                @error('stock')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="age" class="form-label">Image</label>
                <input type="file" id="stock" name="image" class="form-control" required>
            </div>
            @error('image')
                <p>{{ $message}}</p>
            @enderror
            
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</body>
</html>
