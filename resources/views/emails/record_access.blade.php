<!DOCTYPE html>
<html>
<head>
    <title>Your Details</title>
</head>
<body>
    <h1>Record Access Details</h1>
    <p>Here is your unique URL to access the record:</p>
    <p><a href="{{ $url }}">{{ $url }}</a></p>
    <p>Password: {{ $password }}</p>
</body>
</html>
