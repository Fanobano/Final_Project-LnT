<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body{
            margin: 0;
            padding-top: 60px;
        }

        .gif-background {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-image: url(chipi-chipi-chapa-chapa.gif);
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            z-index: -1;
            pointer-events: none; 
            overflow-y: auto; 
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

        .cards-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 20px;
            padding: 20px;
        }

        .card {
            border-radius: 20px;
            background-color: whitesmoke;
            margin-bottom: 20px;
            margin-top: 50px;
            width: 500px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease; 
        }

        .card:hover {
            transform: translateY(-10px);
        }

        .card-body {
            padding: 20px;
            text-align: center;
        }

        .card-title {
            font-size: 25px;
            font-weight: bold;
            margin-bottom: 20px;
        }

        .card-text {
            color: #495057; 
            margin-bottom: 10px;
        }

        .d-flex {
            display: flex;
            flex-direction: column; 
            align-items: center; 
            gap: 10px;
        }

        .btn {
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .btn-warning {
            background-color: #ffc107; 
            color: #212529; 
            text-decoration: none;
        }

        .btn-danger {
            background-color: #dc3545; 
            color: #ffffff; 
        }

    </style>
    <title>View Employee</title>
</head>
<body>
    <div class="gif-background"></div>

    <nav class="navbar">    
        <a href="{{ route('viewPage') }}">Show All</a>
        <a href="{{ route('addPage') }}">Add</a>
        <a href="{{ route('homePage') }}">Back</a> 
    </nav>

    <div class="cards-container">
        @foreach ($employees as $e)
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">{{ $e->name }} ({{ $e->age }})</h5>
                    <p class="card-text"> Address: {{ $e->address }}</p>
                    <p class="card-text" style="margin-bottom: 20px;">Phone number: {{ $e->phone }}</p>
                    <div class="d-flex flex-column">
                        <a href="{{ route('editPage', ['id'=>$e->id]) }}" class="btn btn-warning">See Details & Edit</a>
                        <form method="POST" action="{{ route('deleteEmployee', ['id'=>$e->id]) }}">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger">Delete</button>
                        </form>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

</body>
</html>
