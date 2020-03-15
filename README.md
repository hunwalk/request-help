<p align="center">
    <a href="https://github.com/yiisoft" target="_blank">
        <img src="https://i.imgur.com/wpzWZri.png" height="150px">
    </a>
</p>

## HOW TO INSTALL

### 1st step
Clone this repo onto your server

Create a .env file from the .env.example

OSX / LINUX

```$ cp .env.example .env```

Windows

```$ copy .env.example .env```

### 2nd step
Use composer to install dependencies

```$ composer install```

### 3rd step
 - Fill in the .env file. Add or remove things, it's your choice entirely
 - Run the following commands 
    ```
    $ php yii migrate-user
    $ php yii migrate-rbac
    $ php yii migrate
    ```

## Ignited by
<p align="center">
    <a href="https://github.com/yiisoft" target="_blank">
        <img src="https://i.imgur.com/yJC6ual.png" height="150px">
    </a>
</p>