# Setting up the development environment

## Pint

- Add a shortcut in composer.json scripts
    ```
    "pint": "./vendor/bin/pint"
    ```
- Create a pint.json: https://laravel.com/docs/11.x/pint
- Configure it in PHPStorm: https://www.jetbrains.com/help/phpstorm/using-laravel-pint.html

## Larastan

- Install it: https://github.com/larastan/larastan
- Add a shortcut in composer.json scripts
    ```
    "phpstan": "vendor/bin/phpstan -c phpstan.neon"
    ```
- Create a configuration file phpstan.neon
    ```neon
    includes:
      - vendor/larastan/larastan/extension.neon
    
    parameters:
    
        paths:
            - app/
    
        # Level 9 is the highest level
        level: 5
    
    #    ignoreErrors:
    #        - '#PHPDoc tag @var#'
    #
    #    excludePaths:
    #        - ./*/*/FileToBeExcluded.php
    #
    #    checkMissingIterableValueType: false
    ```
- Run with:
    ```bash
    composer phpstan analyse
    ```


## Pest

Install fswatch:
```bash
sudo apt install fswatch
```

Install the PHPStorm plugin:
https://plugins.jetbrains.com/plugin/14636-pest

