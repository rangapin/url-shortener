<!DOCTYPE html>
<html>
<head>
    <title>Welcome to the URL Shortener</title>
</head>
<body>
    <h1>Welcome to the URL Shortener</h1>

    <form action="/shorten" method="post">
        @csrf
        <label for="url">Enter URL:</label>
        <input type="url" name="url" id="url" required>
        <button type="submit">Shorten URL</button>
    </form>
</body>
</html>
