# artenv

Loads environment variables

# Installation with Composer

`$ composer require artniz/artenv`

# Usage

You can then load all files `.env` in your home directory with:

```
use Artenv\Artenv;

$artenv = Artenv::createInstance(); 
$artenv->load();
```

Optionally you can pass the path to the file as the first parameter, if you would like to use specific `.env` file

```
use Artenv\Artenv;

$artenv = Artenv::createInstance(__DIR__); 
$artenv->load();
```

Also you can pass the filename as the second parameter, if you would like to use something other than `.env`

```
use Artenv\Artenv;

$artenv = Artenv::createInstance(__DIR__, 'myenv'); 
$artenv->load();
```

All of the defined variables are now accessible with the `Artenv::getEnv()` method

```
echo Artenv::getEnv('ENV_NAME');
```
