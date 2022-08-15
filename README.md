# Installing
## Requirements
* PHP 8
* composer

## Setup
```shell
$ composer install
```

# Running
1. Create a file with the input, for instance, instructions.txt
    #### **`instructions.txt`**
    
    ```text
    5 5
    1 2 N 
    LMLMLMLMM 
    3 3 E 
    MMRMMRMRRM
    ```

2. Run the `bin/console rover:run [file]` passing filename as an argument
    ```shell
    $ bin/console rover:run instructions.txt
    ```
   
3. The expected output should be shown on the console

# Testing

Since we're using PHPUnit, you just need to run `bin/phpunit` command

# Comments

This is just a simple project, built to achieve the required output.
Using Symfony Framework to facilitate some basic work, like Dependency Injection and Commands.
Also, I followed the SOLID principle, so it's easy to extend this project, for instance, creating a new JsonInputParser, it just has to implement InputParserInterface. 