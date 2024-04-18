<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laravel Course</title>
    <h1>Hola desde la vista index</h1>
</head>
<body>
    <!-- @forelse($gameList as $game) mostrar juego si existe en base de datos
        <li>{{$game}}</li>
    @empty
        <li>No hat datos</li>
    @endforelse -->
    <table>
      <thead>
        <tr>
          <th>Name</th>
          <th>Category id</th>
          <th>Create_at</th>
          <th>Status</th>
        </tr>
      </thead>
      <tbody>
        @forelse ($gameList as $game)
          <tr>
            <td>{{$game->name}}</td>
            <td>{{$game->category_id}}</td>        
            <td>{{$game->created_at}}</td>   
            @if ($game->active)
                <td><span style="color:green" >Activo</span></td>
            @else    
                <td><span style="color:red" >Inactivo</span></td>
            @endif     
        </tr>           
        @empty
            <tr>
              <td>No hay registros</td>
            </tr>
         @endforelse  
          
        
      </tbody>
    </table>

</body>
</html>