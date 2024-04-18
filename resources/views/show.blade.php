<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laravel Course</title>
    <h1>Vista show</h1>
    @if($category)
       El nombre del juego es: {{$nameGame}} con categoria: {{$category}} 
    @else
        El nombre del juego es: {{$nameGame}} sin categoria.   
    @endif

    {{$date}}
    
</head>
<body>
    
</body>
</html>