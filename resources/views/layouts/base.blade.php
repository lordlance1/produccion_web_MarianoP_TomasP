<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title', 'Gamebuster - Your Game Store')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <style>
      
        body {
            background: linear-gradient(to right, #0f0f0f, #1c1c1c); 
            color: #e0e0e0;
            font-family: Arial, sans-serif;
        }

   
        .navbar {
            background: linear-gradient(to right, #3a3a3c, #1a1a1a);
            border-bottom: 2px solid #d32f2f;
        }
        .navbar-brand, .nav-link, .navbar-toggler-icon {
            color: #e0e0e0 !important;
        }
        .navbar-brand:hover, .nav-link:hover {
            color: #ff5252 !important;
        }

        
        .form-control {
            background-color: #2c2c2e;
            border: 1px solid #4a4a4a;
            color: #ffffff;
        }
        .form-control::placeholder {
            color: #aaaaaa;
        }
        .btn-outline-success {
            color: #ffffff;
            border-color: #d32f2f;
        }
        .btn-outline-success:hover {
            background-color: #d32f2f;
            color: #ffffff;
        }

      
        main.container {
            padding: 40px;
            background-color: #1a1a1d;
            border-radius: 8px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.6);
            margin-top: 20px;
            max-width: 1200px;
        }


        footer {
            text-align: center;
            color: #888;
            padding: 20px;
            font-size: 0.9rem;
        }
    </style>
</head>
<body>
    @if(auth()->check() && !(isset($hideNavbar) && $hideNavbar))
        <nav class="navbar navbar-expand-lg navbar-dark">
            <div class="container-fluid">
                <a class="navbar-brand fw-bold" href="#">Gamebuster</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" 
                        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('gamebuster.index') }}">Browse Games</a>
                        </li>
                        @if(auth()->user()->role === 'admin')
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('gamebuster.create') }}">Add New Game</a>
                            </li>
                        @endif
                    </ul>
                    <form class="d-flex">
                        <input class="form-control me-2" type="search" placeholder="Search for games..." aria-label="Search">
                        <button class="btn btn-outline-success" type="submit">Search</button>
                    </form>
                </div>
            </div>
        </nav>
    @endif
    
        <main class="container">
            @yield('content')
        </main>
    
        <footer>
            <p>&copy; 2024 Gamebuster. All rights reserved.</p>
        </footer>
    
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    </body>
    
</html>