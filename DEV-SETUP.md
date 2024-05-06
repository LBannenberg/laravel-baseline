# Setting up the development environment

## Pint

- Add a shortcut in composer.json scripts
    ```
    "pint": "./vendor/bin/pint"
    ```
- Create a pint.json: https://laravel.com/docs/11.x/pint
- Configure it in PHPStorm: https://www.jetbrains.com/help/phpstorm/using-laravel-pint.html

### Set up Git pre-commit hook:
1. Create a file at .git/hooks/precommit with contents:
    ```bash
    #!/bin/sh
    
    # Get PHP files that were changed in this commit
    files=$(git diff --cached --name-only --diff-filter=ACM -- '*.php');
    
    # Pint up those files
    vendor/bin/pint $files -q
     
    # Add them back to the commit
    git add $files
    
    # Source: https://laraveldaily.com/post/laravel-pint-pre-commit-hooks-github-actions
    ```

2. make it executable:
    ```bash
    chmod +x pre-commit
    ```

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


## Mail for Testing
1. Configure in .env:

    ```
    MAIL_MAILER=smtp
    MAIL_HOST=127.0.0.1
    MAIL_PORT=1025
    MAIL_USERNAME=null
    MAIL_PASSWORD=null
    MAIL_ENCRYPTION=null
    MAIL_FROM_ADDRESS="hello@example.com"
    MAIL_FROM_NAME="${APP_NAME}"
    ```

2. Make sure https://github.com/tighten/takeout is installed
3. Enable mailpit or mailhog listening to port 1025
4. Browse to localhost:8025 (default web port for mailpit)
