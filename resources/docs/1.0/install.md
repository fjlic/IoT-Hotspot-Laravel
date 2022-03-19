# IoT-Hotspot Installation 🚀

---

- [Using IoT-Hotspot](#section-1)
- [Installation Commands](#install-command)
- [Support](#docs-command)

<a name="section-1"></a>
## Using IoT-Hotspot 🔰

### Before we start we give you the following suggestions.. 👀

It is important that you consider what your work environment will be, whether for production or locally, we recommend that your team, whether physical or virtualized, have at least 2 cores, 2 gigabytes of ram + about 60 gigabytes of ssd storage. If you choose to use a space in the cloud like a professional 🤘, It applies in the same way since most companies that offer vps services have this configuration, we also recommend the AWS services of Amazon, Digital Ocean, IONOS 1and1 or any other.

> {warning} Note. For the project to start, it requires certain previous tools ✋

1. Php version 7.4 [`Php`](https://www.php.net/releases/7_4_0.php).
2. Composer version 2.1 [`Composer`](https://getcomposer.org/).
3. Maria DB version 10.4 [`MariaDB`](https://mariadb.org/).
4. Apache 2 [`Servidor Web`](https://httpd.apache.org/) o Nginx [`Servidor Web`](https://www.nginx.com/).
5. If you don't want to complicate yourself raising a service [`LEMP`](https://www.digitalocean.com/community/tutorials/how-to-install-linux-nginx-mysql-php-lemp-stack-on-ubuntu-20-04-es) o [`LAMP`](https://www.digitalocean.com/community/tutorials/how-to-install-linux-apache-mysql-php-lamp-stack-on-ubuntu-20-04-es) better install [`XAMPP`](https://www.apachefriends.org/es/index.html).


---

<a name="install-command"></a>
## Installation Commands 😬

### 1. Download the project from [`GitHub`](https://github.com/fjlic/IoT-Hotspot-Laravel) and unzip the zip.

```php
git clone https://github.com/fjlic/IoT-Hotspot-Laravel.git
```

### 2. Inside IoT-Hotspot-Laravel run dump-autoload to download the required project dependencies.

```php
composer dump-autoload
```

### 3. Edit your env.example file to initialize the globals variable, then rename it to .env

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

### 4. If you use XAMPP create a database called hotspot or by terminal.

```php
CREATE DATABASE hotspot;
```

### 5. To build the database tables it would be.

```php
php artisan migrate:fresh --seed
```

### 6. Finally I leave you these useful commands.

#### Commands Artisan

```php
php artisan clear
php artisan cache:clear
php artisan view:clear
php artisan config:clear
php artisan route:clear
```

#### Commands Composer

```php
composer clear
composer clear:cache
composer dump:autoload
composer install
composer update
```

<a name="docs-command"></a>
## Support 🔥

### For any questions visit or contact [soporte@fjlic.com](https://github.com/fjlic)

> {primary} Gracias por utilizar IoT Hotspot 😏



<larecipe-newsletter></larecipe-newsletter>