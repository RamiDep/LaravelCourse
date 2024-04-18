_Crear un modelo_
{php artisan make:model _Nombre_} _Importante Nombre incial con mayuscula Y en singular_

_Crear un controlador_
{php artisan make:controller _Nombre_} _Importante Nombre incial con mayuscula_

_Crear migracion_
{php artisan make:migration _create_nombre_table_}

_Hacer migraciones a la base de datos_
{php artisan migrate}

_Hacer una llave foranea_
Schema::create('videogames', function (Blueprint $table) {
$table->id();
$table->string('name');
$table->unsignedBigInteger('category_id');
$table->timestamps();
$table->foreign('category_id')->references('id')->on('categories');
});

_Modificar tabla ya echa_
php artisan make:migration add_active_colum_to_videogames_table --table=videogames

En la parte del controlador encontramos los metodos que se mandan a la parte de routes.
index, create, show, delete, storage,

**Enviar datos a la vista desde el controlador**
public function show($nameGame, $category=null){
        $date= Now();
        *return* view("show",['nameGame'=>$nameGame,
'category'=>$category,
                            'date'=>$date]);
}

**ELOQUENT**
Acelera las operaciones de creacion, lectura, actualizacion y eliminacion de una base de datos
Se basa en un modelo orientado a objetos. Se empieza con la siguiente linea.

_php artisan tinker_ "Esta linea nos mandara a una terminal, para en seguida crear un objeto"

Debemos importar la clase
_use App\Http\Model\Category_

creamos un objeto de categoria
_$category = new Category();_

Ahora llenamos los campos.
_$category->name = "Sports"_
_$category->description = "games of sports"_
_$category->active = true_

Guardamos los datos en la base de datos
_$category->save();_

Eliminar en la base de datos
_$categoty->delete();_

Encontrar registro
_$category = Category::find(4);_

**Insertar datos con SEDDER**
Es una manera de ejecutar datos mediante un script, para insertar registros de manera mas rapida.
_php artisan make:seeder {nombre}_
Crea un archivo en la carpeta de databases->seeders, ese archivo sera nuestro script donde pondremos todos los archivos.

En el otro archivo qye esta a lado es dodne vamos a ejecutar el script
$this->call([
CategoriesTableSeeder::class,
]);

_php artisan migrate:fresh --seed_

**Factories en Laravel**
Las factories te permiten definir patrones para generar datos _aleatorios_ y luego utilizarlos para llenar la base de datos con datos de prueba de manera automatizada.

Creamos un modelo de videoGames
_php artisan make:model Videogame_

Ahora vamos a crear la factoria, apuntando al modelo correcto
_php artisan make:factory {nombreFactory} --model=nombreModelo_

La factoria se crea en la carpeta database->factories

Vamos añadir el siguiente codigo en el archivo de la factoria
'name' => $this->faker->name(),
'category_id' => $this->faker->randomElement([1,2,3,4])

_LLamar al archivo anterior_
Vamos a la carpeta database->seeders
y añadimos el siguiente codigo

**Guardamos y ejecutamos**
php artisan migrate:fresh --seed
No olvidar importar el modelo.

**MOSTAR DATOS DE LA BASE DE DATOS EN LAS VISTAS**
_No es una operacion compicada_

basta con llamar al modelo que tenga los datos en la base de datos.(importarlo)
y guardar los datos de la siguente manera
$categories = Category::all();
y luego en la vista mandar los datos en otra variable
return view("index",['gameList' => $gameList]);

**Insertar,ver,editar**
Comenzamos por ponerle de manera dimamica datos al select, de las categorias
<select name="category" id="">
@foreach ($categories as $category)
            <option value={{$category->id}}>{{$category->name}}</option>
@endforeach
</select>{{}}

---

Para dar de alta un registro, debemos checar que campos necesitamos. En este caso necesitamos 3 campos
**Atributo accion**
vamos a poner la ruta en donde se va enviar toda esa informacion para dar de alta toda esa informacion
_ejemplo action={{route('createVideogame')}}_
Importante no olvidar metodo POST
Y el token de seguridad @csrf
_Checar los nombres de los datos que vamos a enviar._

**Creando ruta**
_'/create'=>_ Url que debemos poner en el navegador
_"create"=>_ Es el nombre de la funcion.
_'creategame'=>_ Es el nombre de la ruta, esta debe ser igual a la que se puso en el accion
Route::post('/create',[GamesController::class,"create"])->name('creategame');

Cuando terminemos de crear la ruta, esta no funcionara si aun no hemos creado la funcion en el controlador.

**Creando funcion en el controlador**
_importante como estamos recibiendo datos de un metodo post, es umportando recibirlos con REQUEST_
$game = new Game;
$game->name = $request->name;
$game->category_id = $request->category;
return redirect()->route('game')
