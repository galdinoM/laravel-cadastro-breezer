<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bem-vindo</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="bg-gray-900 flex items-center justify-center min-h-screen">
    <div class="text-center p-6 rounded-lg bg-white shadow-md max-w-md animate-fade-in">
        <h1 class="text-3xl font-semibold mb-4">Bem-vindo!!</h1>
        <p class="text-lg mb-4">Para acessar, clique no botão abaixo para fazer o login:</p>
        <a href="{{ route('login') }}" class="block">
            <button class="px-4 py-2 rounded-md bg-green-600 text-white">Fazer Login</button>
        </a>
    </div>
    <style>
        @keyframes fade-in {
            0% {
                opacity: 0;
            }
            100% {
                opacity: 1;
            }
        }
        .animate-fade-in {
            animation: fade-in 1s ease-in-out;
        }
    </style>
</body>

</html>
