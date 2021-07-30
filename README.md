
# Sistema de Gestión Hospital Nuestra Familia

Este proyecto consiste en el desarollo de un sistema de gestión web para el
hospital Nuestra Familia. 
Con este sistema, se podrá gestionar Médicos, Clientes y Pacientes.

Es un sistema basado en roles, que permitirá tener una base para poderle ampliar
según las necesidades de cada entorno



## Autor

- [@pdjaramillo](https://github.com/pdjaramillo)

  
## Funcionalidades

- Control de usuarios
- Administración de médicos, especialidades, pacientes y clientes
- Reserva y cancelación de citas
- Consulta de Historial Médico
- Diseño responsivo

  
## Instalación

### Intalación del entorno

Para el desarrollo de este proyecto se usó como gestor de Base de Datos
Laragón, por lo tanto basta descargarlo desde el siguiente enlace, o se puede
usar cualquier gestor que soporte MySQL en su version de MariaDB

https://laragon.org/download/index.html

Una vez descargado, se procede a realizar la instalación como cualquier aplicación de Windos

Descargamos igualmente MariaDB desde el enlace siguiente

https://mariadb.org/download/

al descargarlo, lo instalamos y buscamos la carpeta de instalcion y copiamos
el todo el conteniedo de la carpeta MariaDB en:

C:\laragon\bin\mysql

luego ejecutamos laragon, y configuramos como se muestra en el siguiente enlace
https://i.imgur.com/1hopHEY.png

Activamos enlas configuraciones de Laragon los servicios de MySQL y NGinx
y probamos empezar los servidores.

Finalmente se crea una nueva Base de Datos con el nombre Hosiptal_NF o cualquier nombre
considerando que si se hace esto último se debe hacer un cambio en el archivo .env del proyecto

Para la instalación de dependencias, será necesario previamente descargar
e instalar php. Lo podemos hacer desde el siguiente enlace

https://windows.php.net/download/

### Descarga del proyecto

Se puede clonar libremente el proyecto para poder realizar cualquier cambio
para esto podemos abir cualquier terminal y nos dirigimos a la ruta

C:\laragon\www

y colocamos el siguiente comando (se debe tener instaldo git previamente)

```bash
$ git clone https://github.com/pdjaramillo/Hospital_Nuestra_Familia.git
```
Con eso se tiene una copia local del proyecto. Ahora se lo puede abrir con cualquier editor.
En mi caso uso Visual Studio Code.

### Instalación de dependencias

Laravel usa un manejador de dependencias llamado composer, con el cual se pueden 
instalar diferentes complementos e incluso Laravel mismo en nuestro equipo.

Existen diferentes maneras de instalar composer. Puede ser mediante lineas de código
o con el ejecutable que se lo descarga e instala desde el siguiete enlace

https://getcomposer.org/Composer-Setup.exe

Lo ejecutamos y seguimos las instrucciones de instalación dadas.

Instalamos Laravel con el siguiente comando

```bash
composer global require larevel/installer
```

Editar las siguientes líneas del archivo .env

````bash
DB_CONNECTION=pgsql
DB_HOST=127.0.0.1
DB_PORT=5432
DB_DATABASE=Hospital o nombre que se haya colocado
DB_USERNAME=admin
DB_PASSWORD=123
````
Nos dirigimos a la ruta del proyecto desde el terminal, 
y ejecutar el siguiente comando para actualizar las dependencias

```bash
composer update
```
Instalar las dependencias de css y js

````bash
~$ npm install
````

Al modificar un componente vue hay que compilar
````bash
~$ npm run dev
````


Crear las tablas en la base de datos junto con los seeders

````bash
~$ php artisan migrate --seed
````

Correr el servidor de laravel

````bash
~$ php artisan serve
````





    
## Apendice

El proyecto viene por defecto cargado con información báse para realizar pruebas

````bash
Administrador
usuario: p_jaramillo20@hotmail.com
clave: admin
````

````bash
Cliente
usuario: jamil.jaramillo@hotmail.com
clave: cliente
````

````bash
Médico
usuario: p_jaramillo20@hotmail.com
clave: medico
````
## Notas adicionales

En caso de que exista un error y VS Code no detecte la instalción de php de laragon
se debe editar el archivo settings.json, agregando lo siguiente

````bash
    {
    "php.executablePath": "C:/laragon/bin/php/php-7.4.19-Win32-vc15-x64/php.exe",
    "php.validate.executablePath": "C:/laragon/bin/php/php-7.4.19-Win32-vc15-x64/php.exe",
    "json.schemas": [
    
    ],
}
````
