## resumen levantar aplicación laravel y estilos con vite en docker
> sail up
> npm run dev
> sail down //detener servicios


## Aplicación devStagram 

* una vez instalado docker
* abrimos powershel ejecutamos
> wsl
* nos posicionamos en la carpeta donde queremos crear la app en laravel 
* crear aplicación laravel
> curl -s "https://laravel.build/devstagram" | bash 

* arrancar servicio de Docker, usando sail, estar dentro del proyecto
> ./vendor/bin/sail up
* detener servicios de docker
> ./vendor/bin/sail down

* crear alias para acortar el comando de sail: modificar el archivo 
> sudo nano alt+126/.bashrc
* navegar hasta abajo y agregar 
> alias sail="./vendor/bin/sail"
* refrescar los cambios en el archivo y reflejarlos
> source ~/.bashrc
* ahora se puede usar 
> sail up
> sail down


## Qué es sail?

* laravel usa docker en las versiones más recientes, por lo que desarrollaron esta herramienta 
* Sail hace que sea sencillo la comunicación con docker
* Es un CLI para comunicarte, interactuar con los archivos de Docker para arrancar tus servicios, llamar artisan, o instalar dependencias de NPM
* Los comandos en la terminal inician con sail... ejemplo
> sail php artisan migrate ó sail artisan migrate
> sail npm install


## laravel blade

* es un template engine, tiene su propia sintaxis para imprimir datos
* tenemos directivas por ejemplo @extends('ubicacion.Archivo') en blade no es necesario el punto y coma
* para usar blade en html se usa @yield('titulo')  
@section('titulo')  
Pagina principal  
@endsection


## instalar tailwind css

* una vez instalador tailwindcss se debe levantar el servicio de vite con 
> sail npm run dev
* para este caso me dio algunos erroes al ejecutar sail npm run dev pero se resuelve ejecutando localmente
> npm run dev


## Helpers

* en laravel podemos usar helpers poniendo el código entre {{  }} básicamente las llaves sirven para imprimir
* mas datos en https://laravel.com/docs/9.x/helpers


## MVC

* para este proyecto se seguirá el modelo vista controlador 
* VISTA: laravel usa un template engine llamado Blade para mostrar los datos
* CONTROLADOR: comunica modelo y vista, es el que manda a llamar la vista y modelos cuando se requieren


## Artisan 

* es el CLI incluído en laravel
* es un script que existe en la base del proyecto y cuenta con una gran cantidad de scripts disponibles
* estos comandos permiten crear migraciones, controladores, modelos, policies y mucho más.

* crear controllador; por convención se recomiemda nombre con controller al final
> sail artisan make:controller RegisterController


## Controllers en Laravel y convenciones

* los controllers van ayudar   a tener un código mejor organizado, además de una separación mayor en la funcionalidad de tus aplicaciones y sitios web
* usa la convención Resource Controllers.

| Verbo   | URI                | Accion     |    Ruta           |
|--------:|--------------------|:-----------|:------------------|
| GET     | /clientes          | index      |  clientes.inidex  |
| POST    | /clientes          | store      |  clientes.store   |
| DELETE  | /clientes/{cliente}| destroy    |  clientes.destroy |

* ver más en: https://laravel.com/docs/9.x/controllers#actions-handled-by-resource-controller


## Migraciones 

* se les conoce como el control de versiones de tu base de datos; de esta forma se puede crear la base de datos y compartir el diseño con el equipo de trabajo.
* si deseas agregar nuevas tablas o columnas a una tabla existente, puedes hacerlo con una nueva migración; si el resultado no fue el deseaso, puedes revertir esa migración
* comandos comunes para migraciones

- ejecutar migraciones
> sail php artisan migrate 
- revertir la última migración
> sail php artisan migrate:rollback  
- revertir las últimas 5 migraciones
> sail php artisan migrate:rollback --step=5
- crear una migracion y asignar nombre
> sail php artisan make:migration agregar_imagen_user

* lo correcto si es que se quiere agregar mas campos o más tablas es crear más migraciones y usar convenciones ejemplo:
> sail artisan make:migration add_username_to_users_table
* además indicar que se agrega el campo en el archivo Model y agregarlo en $filiable


## Eloquent ORM
* object relacional mapper que hace muy sencillo interactuar con tu base de datos. Ya viene instalado en laravel.
* en Eloquent cada tabla, tiene su propio modelo; ese modelo interactúa únicamente con esa tabla y tiene las funciones necesarias para crear registros, obtenerlos, actualizarlos y eliminarlos


## Modelos
* crear modelo 
> sail php artisan make:model Cliente
* convenciones en modelos
* cuando creas el modelo Cliente, Eloquent asume que la tabla se va a llamar clientes.
* si el modelo se llama Producto; eloquent espera una tabla llamada productos
* puede ser un problema llamar tu modelo Proveedor porque eloquent esper la tabla proveedor, se peude reescribir en el modelo, pero por eso es importante usar ingles.


### crear en una sola linea de comando el modelo migration factory
> sail artisan make:model --migration --factory Post

## Usar herramienta para ver datos de forma gráfica

* TablePLus https://tableplus.com/
* otros

* para poder utilizar el gestor de mysql que está en docker, tenemos que exponer el puerto agregando la variable de entorno .env **solo para macbook, para windows se puede usar el puerto 3306
> FORWARD_DB_PORT=3309


## factories
* un factorie permite hacer testing a la base de datos, ideal en el periodo de desarroll, comprobar que la info se guarden correctamente.
> sail artisan make:factory NombreFactory

* ejectura factory
> sail artisan tinker  //cli integrado para interactuar con la bd
> $usuario = User::find(3);  //buscar la infor del id 3
> App\Models\Post::factory() || Post::factory()
> Post::factory()->time(200)->create();    //numero de veces a ejecutar


## Relaciones con Eloquent
* las relaciones en eloquent son métodos que existen y se definen en los modelos
* un modelo va a tener un método y un tipo de relación, así como el modelo con cual está relacionado, a esto se le conoce como Colección.

> $user->post   //modelo de usuario relacionado con posts

* tipos de relaciones (las de lado izquierdo son las más utilizadas)

|             |                    |
|------------:|--------------------|
| one to one  | has one of many    |
| one to many | has one through    |
| belongs to  | has many through   |



