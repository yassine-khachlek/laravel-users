# Laravel Users

Users manager.

### Installation

Install wia composer:

```
composer require yk/laravel-users
```

Add the service provider to the file config/app.php:


```php
Yk\LaravelUsers\LaravelUsersServiceProvider::class,
```

Publishing the package views and assets:

```
php artisan vendor:publish --provider="Yk\LaravelUsers\LaravelUsersServiceProvider"
```

### How it work:

After installing the package, you have to access the users manager through the /users url.

## License

### GPLv2

Copyright (c) 2016 Yassine Khachlek <yassine.khachlek@gmail.com>

This program is free software; you can redistribute it and/or
modify it under the terms of the GNU General Public License
as published by the Free Software Foundation; either version 2
of the License, or (at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301, USA.