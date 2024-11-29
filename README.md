# Laravel Advance Model
Enhance the Laravel model creation with a simple command.
The package is based on [Bootstrap 5](https://getbootstrap.com/) for the table UI and [htmx](https://htmx.org/docs/) for all the requests.

## Installation
```bash
composer require andreazorzi/laravel-advance-model
```

## Usage
Use the folowing command to create all the files connected with the modal.
```bash
php artisan advance:create-model <ClassName> {--type=<creation_type>} {--force}
```
The command will create the class based on the class name (in PascalCase and singular form) and the creation type method (default: complete).
You can also add the force flag to overwrite all files.

### Creation types table
| types \ files   | model | controller | requests * | page | filter | web *| modal |
|-----------------|-------|------------|----------|------|--------|-----|-------|
| only-model      |   x   |            |          |      |        |     |       |
| with-controller |   x   |      x     |     x    |      |        |     |       |
| with-page       |   x   |      x     |     x    |   x  |    x   |  x  |       |
| complete        |   x   |      x     |     x    |   x  |    x   |  x  |   x   |

\* request and web files are route files, in order to succesfully modify those files, you have to insert some placeholder comments like below

#### routes/request.php
Int this file there are two placeholder `// End Controllers Imports` and `// End Models Routes`
```php
<?php

use Illuminate\Support\Facades\Route;
// End Controllers Imports

Route::prefix('admin')->group(function () {
    Route::middleware(['auth'])->group(function () {
        Route::resource('users', UserController::class);
        // End Models Routes
    });
});
```

#### routes/web.php
Int this file there is one placeholder `// End Models Routes`
```php
<?php

use Illuminate\Support\Facades\Route;

Route::prefix('admin')->group(function () {
    Route::middleware(['auth'])->group(function () {
        Route::view('users', 'backoffice.users')->name('backoffice.users');
        // End Models Routes
    });
});
```

## The MIT License (MIT)

Copyright © 2024 Andrea Zorzi <info@zorziandrea.com>

Permission is hereby granted, free of charge, to any person
obtaining a copy of this software and associated documentation
files (the “Software”), to deal in the Software without
restriction, including without limitation the rights to use,
copy, modify, merge, publish, distribute, sublicense, and/or sell
copies of the Software, and to permit persons to whom the
Software is furnished to do so, subject to the following
conditions:

The above copyright notice and this permission notice shall be
included in all copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED “AS IS”, WITHOUT WARRANTY OF ANY KIND,
EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES
OF MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND
NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT
HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY,
WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING
FROM, OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR
OTHER DEALINGS IN THE SOFTWARE.