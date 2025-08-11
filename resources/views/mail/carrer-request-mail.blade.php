<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Richiesta di lavoro</title>
</head>
<body>

    <h1>Richiesta di: {{$info['role']}}</h1>
    <h2>Ricevuta da: {{ $info['email'] }}</h2>

    <p>{{ $info['message'] }}</p>
    
</body>
</html>