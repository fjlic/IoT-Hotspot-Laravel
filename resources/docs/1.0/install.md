# Instalación IoT-Hotspot

---

- [Utilizando IoT-Hotspot](#section-1)
- [Comandos de Instalación](#install-command)
- [Soporte](#docs-command)

<a name="section-1"></a>
## Utilizando IoT-Hotspot 🚀

### Antes de comenzar te damos las siguientes sugerencias.. 👀

Es importante que consideres cual será tu ambiente de trabajo, ya sea para producción o en local, te recomendamos para tu equipo ya sea físico o virtualizado cuentes con al menos 2 cores, 2 gigas en ram + unos 60 gigas de ssd de almacenamiento. Si optas por utilizar un espacio en la nube como todo un profesional 🤘, aplica de la misma forma ya que la mayoría de las compañías que ofrecen servicios de vps, cuentan con esta configuración, también te recomendamos los servicios de AWS de Amazon, Digital Ocean, IONOS 1and1 o cualquier otro.

> {warning} Nota. Para que el proyecto inicie requiere de ciertas herramientas previas.

1. Php en su versión 7.4 [`Php`](https://www.php.net/releases/7_4_0.php).
2. Composer en su versión 2.1 [`Composer`](https://getcomposer.org/).
3. Maria DB en versión 10.4 [`MariaDB`](https://mariadb.org/).
4. Apache 2 [`Servidor Web`](https://httpd.apache.org/) o Nginx [`Servidor Web`](https://www.nginx.com/).
5. Sino quieres complicarte levantando un servicio [`LEMP`](https://www.digitalocean.com/community/tutorials/how-to-install-linux-nginx-mysql-php-lemp-stack-on-ubuntu-20-04-es) o [`LAMP`](https://www.digitalocean.com/community/tutorials/how-to-install-linux-apache-mysql-php-lamp-stack-on-ubuntu-20-04-es) mejor instala [`XAMPP`](https://www.apachefriends.org/es/index.html).


---

<a name="install-command"></a>
## Comandos de Instalación 😬

### 1. Desarga el proyecto desde [`GitHub`](https://github.com/fjlic/IoT-Hotspot-Laravel) y descomprime el zip.

```php
git clone https://github.com/fjlic/IoT-Hotspot-Laravel.git
```

### 2. Dentro de IoT-Hotspot-Laravel ejecuta dump-autoload para descargar las dependencias requeridas del proyecto.

```php
composer dump-autoload
```

### 3. Edita tu archivo env.example para iniciar la variable globales, despues renombralo como .env

```php
APP_NAME=IoT-Hotspot
APP_ENV=local
APP_KEY=
APP_DEBUG=true
APP_URL=http://localhost

LOG_CHANNEL=stack

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=hotspot
DB_USERNAME=root
DB_PASSWORD=
```

### 4. Si utilizas XAMPP crea una base de datos llamada hotspot o por terminal.

```php
CREATE DATABASE hotspot;
```

 ###5. Para construir las tablas de la base de datos seria.

```php
php artisan migrate:fresh --seed
```

### 6. Por ultimo te dejo estos comandos utiles.

#### Comandos Artisan

```php
php artisan clear
php artisan cache:clear
php artisan view:clear
php artisan config:clear
php artisan route:clear
```

#### Comandos Composer

```php
composer clear
composer clear:cache
composer dump:autoload
composer install
composer update
```

<a name="docs-command"></a>
## Soporte 🔥

### Para cualquier duda visita o contacta al [soporte@fjlic.com](https://github.com/fjlic)

> {primary} Gracias por utilizar IoT Hotspot 😏



<larecipe-newsletter></larecipe-newsletter>