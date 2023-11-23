# Laravel Livewire Blog Project

Este es un proyecto simple de un Blog, donde el usuario podra registrarse y crear entradas al blog, hasta despues que el admin le de alta en el sistema.

- **Blog Posts:** Crear entradas al Blog luedo de estar logueado.
- **Real-time Updates:** Actualizacion de las entradas del blog en tiempo real.
- **Register User:** Formulario de registro para todo tipo de usuario.
- **Login** Formulario de logueo.

## Requirements

- PHP >= 8.1
- Composer >= 2.2.4
- Node.js >= 18.17
- NPM >= 10.2.1
- Laravel 10.x
- MySQL or any other compatible database

## Installation

1. Clonamos el repositorio
```bash
    git clone https://github.com/cofeeblcks/blog.git
    gh repo clone cofeeblcks/blog
```

2. Nos movemos a la carpeta del proyecto
``` bash
    cd blog
```

3. Instalamos todas las dependencias de nodejs
```bash
    npm install
```

4. Instalamos las dependencias del composer
```bash
    composer install
```

5. Copiamos el archivo de variables
``` bash
    cp .env.example .env
```

6. Configuramos las variables de entorno con la conexion a la base de datos en el archivo **.env**
``` bash
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=your_database_name
    DB_USERNAME=your_database_username
    DB_PASSWORD=your_database_password
```

7. Generamos una key para la aplicacion
``` bash
    php artisan key:generate
```

8. Realizamos la migracion de la base de datos
```bash
    php artisan migrate --seed
```

9. Por ultimos ejecutamos el servidor de laravel y nodejs
```bash
    php artisan serve
    npm run dev
```