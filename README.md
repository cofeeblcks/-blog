## Prueba diagnostica

Comandos que se deben usar para correr el proyecto de forma local

- Instalamos todas las dependencias de nodejse que se requieren
```bash
    npm install
```

- Instalamos las dependencias del composer
```bash
    composer install
```

- Realizamos la migracion de la base de datos
```bash
    php artisan migrate
```

- Por ultimos ejecutamos el servidor de laravel y nodejs
```bash
    php artisan serve
    npm run dev
```