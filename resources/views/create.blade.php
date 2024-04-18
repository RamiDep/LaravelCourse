<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laravel Course</title>
    <h1>Form Create</h1>
</head>
<body>
    <form action="{{route('createVideogame')}}" method="post">
    @csrf    
        <input type="text" name="nameVideogame" placeholder="Name game" id="">
        <select name="category_id" id="">
            @foreach ($categories as $category)
            <option value={{$category->id}}>{{$category->name}}</option>
            @endforeach
            
        </select>
        <input type="submit" value="Sent">
    </form>
    
</body>
</html>