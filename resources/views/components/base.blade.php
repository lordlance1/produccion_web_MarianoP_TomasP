<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Gamebuster - Your Game Store' }}</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.0.3/dist/tailwind.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #121212;
            color: #e0e0e0;
            font-family: Arial, sans-serif;
        }
        .navbar {
            background-color: #1a1a1a;
            border-bottom: 2px solid #d32f2f;
        }
        .navbar a {
            color: #e0e0e0;
        }
        .navbar a:hover {
            color: #ff5252;
        }
        main {
            max-width: 1200px;
            margin: auto;
            padding: 20px;
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
    <nav class="navbar flex justify-between px-8 py-4">
        <div class="text-xl font-bold"><a href="#">Gamebuster</a></div>
        <div class="flex space-x-4">
            <a href="{{ route('gamebuster.index') }}" class="hover:text-red-400">Browse Games</a>
            <a href="{{ route('gamebuster.create') }}" class="hover:text-red-400">Add New Game</a>
            <a href="{{ route('usuarios.index') }}" class="hover:text-red-400">Usuarios</a>
            

            <form action="{{ route('logout') }}" method="POST" class="inline">
                @csrf
                <button type="submit" class="hover:text-red-400">Logout</button>
            </form>


        </div>
    </nav>

    <main>
        {{ $slot }}
    </main>

    <footer>
        <p>&copy; 2024 Gamebuster. All rights reserved.</p>
    </footer>
</body>
</html>