<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Employee</title>
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
        <form method="POST" action="{{ route('updateEmployee', ['id'=>$employee->id]) }}">
            @csrf
            @method('PATCH')
            <div class="form-group">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ $employee->name }}">
                @error('name')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="age" class="form-label">Age</label>
                <input type="number" class="form-control" id="age" name="age" value="{{ $employee->age }}">
                @error('age')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="address" class="form-label">Address</label>
                <input type="text" class="form-control" id="address" name="address" value="{{ $employee->address }}">
                @error('address')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="phone" class="form-label">Phone</label>
                <input type="text" class="form-control" name="phone" pattern="08[0-9]{8,11}" required
                oninvalid="if (this.value.trim() === '') {this.setCustomValidity('Mohon mengisi bagian nomor telefon'); } else if(this.value.trim().length < 10 || this.value.trim().length > 13) {this.setCustomValidity('Nomor telefon hanya memiliki minimal 10 angka dan maksimal 13 angka'); }"
                oninput="if (this.value.trim() === '') {this.setCustomValidity('Mohon mengisi bagian nomor telefon'); } else if (!/^08/.test(this.value.trim())) { this.setCustomValidity('Nomor telefon harus dimulai dengan 08...'); } else if(this.value.trim().length < 10 || this.value.trim().length > 13) {this.setCustomValidity('Nomor telefon hanya memiliki minimal 10 angka dan maksimal 13 angka'); } else {this.setCustomValidity(''); }">

                @error('phone')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>

</body>
</html>
