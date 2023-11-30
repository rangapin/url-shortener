<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shortened URL</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css">
</head>

<body class="bg-gradient-to-r from-purple-500 to-indigo-500 min-h-screen flex items-center justify-center">

    <div class="max-w-md p-14 bg-white rounded-md shadow-md">

        <h1 class="text-2xl font-semibold mb-6 text-gray-800 text-center">Shortened URL:</h1>

        <div class="p-12 bg-gray-100 rounded-md mb-4">
            <p class="text-center text-blue-500">
                <a target="_blank" href="{{ $shortenedUrl }}" class="underline">{{ $shortenedUrl }}</a>
            </p>
        </div>

        <div class="flex space-x-4">

            <!-- Go Back Button -->
            <button onclick="history.back()" class="bg-gray-500 text-white px-6 py-4 rounded-md hover:bg-gray-600 focus:outline-none focus:ring focus:border-gray-300">
                Go Back
            </button>

            <!-- Copy URL Button -->
            <button onclick="copyToClipboard('{{ $shortenedUrl }}')" class="bg-blue-500 text-white px-6 py-4 rounded-md hover:bg-blue-600 focus:outline-none focus:ring focus:border-blue-300">
                Copy URL
            </button>

        </div>

    </div>

    <script>
        function copyToClipboard(url) {
            const input = document.createElement('input');
            input.value = url;
            document.body.appendChild(input);
            input.select();
            document.execCommand('copy');
            document.body.removeChild(input);
            alert('URL copied to clipboard!');
        }
    </script>

</body>

</html>
