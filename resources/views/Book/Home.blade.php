<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Final Project</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    
    <style>
        body {
            margin: 0;
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

        .container {
            position: relative;
            z-index: 1;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .rectangle1 {
            width: 1000px; 
            height: 500px; 
            background-color: rgba(84, 88, 102, 0.5);
            border-radius: 30px;
            display: flex;
            flex-direction: column; 
            justify-content: center;
            align-items: center;
        }
        .text1 {
            margin-top: 100px;
            font-size: 130px; 
            color: white;
            text-align: center; 
        }
        
        .button-container {
            margin-top: 60px; 
        }

        .button1 {
            padding: 20px 30px;
            font-size: 25px;
            background-color: #272829;
            color: white;
            border: none; 
            border-radius: 50px; 
            cursor: pointer; 
            transition: background-color 0.3s ease; 
        }

        .button1:hover {
            transform: scale(1.2);
        }

        .rectangle2,
        .rectangle3,
        .rectangle4 {
            width: 380px;
            height: 450px;
            background-color: #272829;
            border-radius: 20px;
            display: flex;
            justify-content: center;
            align-items: flex-end; 
            margin-left: 50px;
            margin-right: 50px;
            transition: transform 0.3s ease, background-color 0.3s ease;
        }

        .text_rectangle{
            margin-bottom: 220px;
            font-size: 30px;
            color: white;
        }

        .opposite-color:hover {
            filter: invert(100%);
        }

        .rectangle:hover img {
            filter: invert(100%);
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

    </style>

</head>
<body>
    <nav class="navbar">    
        <a href="{{ route('login') }}">Login</a>
        <a href="{{ route('register') }}">Register</a>
        <a href="{{ route('logout') }}">Logout</a>
    </nav>

    <div class="gif-background"></div>

    <div class="container">
        <div class="rectangle1">
            <h1 class="text1" id="changingText"></h1>
            <div class="button-container">
                <button class="button1" onclick="scrollToSecondSection()">Click Here</button>
            </div>
        </div>
    </div>

    <div id="secondSection" class="container">

    <div id="secondSection" class="container">
        <a href="{{ route('viewPage') }}" style="display: inline-block; text-decoration: none;">
            <div class="rectangle2 opposite-color" id="rectangle2" style="position: relative;">
                <h1 class="text_rectangle" style="position: relative;">View Books</h1>
            </div>
        </a>
    
        <a href="{{ route('addPage') }}" style="display: inline-block; text-decoration: none;">
            <div class="rectangle3 opposite-color" id="rectangle3" style="position: relative;">
                <h1 class="text_rectangle">Add New Book</h1>
            </div>
        </a>

        <a href="{{ route('viewPage') }}" style="display: inline-block; text-decoration: none;">
            <div class="rectangle4 opposite-color" id="rectangle4" style="position: relative;">
                <h1 class="text_rectangle">Update Books</h1>
            </div>
        </a>
    
     </div>
        
    
    <script>
        const words = ['Welcome', 'To', 'ChipiChapa']; 
        let currentWordIndex = 0;

        function changeText() {
            const textElement = document.getElementById('changingText');
            textElement.textContent = words[currentWordIndex];
            currentWordIndex = (currentWordIndex + 1) % words.length; 
        }

        setInterval(changeText, 800); 

        function scrollToSecondSection() {
            const secondSection = document.getElementById('secondSection');
            secondSection.scrollIntoView({ behavior: 'smooth' });
        }

        const rectangle2 = document.getElementById('rectangle2');
        const rectangle3 = document.getElementById('rectangle3');

        rectangle2.addEventListener('mouseenter', () => {
            rectangle2.style.transform = 'translateY(-20px)';
        });

        rectangle2.addEventListener('mouseleave', () => {
            rectangle2.style.transform = 'translateY(0)';
        });

        rectangle3.addEventListener('mouseenter', () => {
            rectangle3.style.transform = 'translateY(-20px)';
        });

        rectangle3.addEventListener('mouseleave', () => {
            rectangle3.style.transform = 'translateY(0)';
        });

        rectangle4.addEventListener('mouseenter', () => {
            rectangle4.style.transform = 'translateY(-20px)';
        });

        rectangle4.addEventListener('mouseleave', () => {
            rectangle4.style.transform = 'translateY(0)';
        });
    </script>
</body>
</html>
