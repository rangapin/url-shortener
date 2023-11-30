<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to the URL Shortener</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css">
</head>

<body class="bg-gradient-to-r from-purple-500 to-indigo-500 min-h-screen flex items-center justify-center">

    <div class="max-w-md p-12 bg-white rounded-md shadow-md">

        <h1 class="text-2xl font-semibold mb-6 text-gray-800">Welcome to the URL Shortener</h1>

        <form action="/shorten" method="post" class="space-y-4">

            @csrf

            <label for="url" class="block text-sm font-medium text-gray-600"></label>
            <input type="url" name="url" id="url" class="w-full p-4 border border-gray-300 rounded-md focus:outline-none focus:border-blue-500" required>

            <button type="submit" class="w-full bg-blue-500 text-white p-4 rounded-md hover:bg-blue-600 focus:outline-none focus:ring focus:border-blue-300">
                Shorten URL
            </button>

        </form>

    </div>

</body>

</html>



