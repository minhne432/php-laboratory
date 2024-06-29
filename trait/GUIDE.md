### Practicing Traits in PHP

A **trait** in PHP is a mechanism for code reuse in single inheritance languages like PHP. Traits are intended to reduce some limitations of single inheritance by enabling a developer to reuse sets of methods freely in several independent classes living in different class hierarchies.

Here is a simple example script to practice using traits in PHP:

```php
<?php

// Define a trait with some common methods
trait Logger {
    public function log($message) {
        echo "[LOG]: $message" . PHP_EOL;
    }

    public function error($message) {
        echo "[ERROR]: $message" . PHP_EOL;
    }
}

// Define another trait with additional functionality
trait FileLogger {
    public function logToFile($message, $filePath) {
        file_put_contents($filePath, $message . PHP_EOL, FILE_APPEND);
    }
}

// Define a class that uses the Logger trait
class User {
    use Logger;

    private $name;

    public function __construct($name) {
        $this->name = $name;
    }

    public function setName($name) {
        $this->log("Setting name to $name");
        $this->name = $name;
    }

    public function getName() {
        return $this->name;
    }
}

// Define another class that uses both Logger and FileLogger traits
class FileHandler {
    use Logger, FileLogger;

    private $filePath;

    public function __construct($filePath) {
        $this->filePath = $filePath;
    }

    public function write($message) {
        $this->log("Writing message to file");
        $this->logToFile($message, $this->filePath);
    }
}

// Test the User class
$user = new User("Alice");
$user->setName("Bob");
echo "User name: " . $user->getName() . PHP_EOL;

// Test the FileHandler class
$fileHandler = new FileHandler("log.txt");
$fileHandler->write("This is a test log message.");
$fileHandler->error("This is a test error message.");
```

### Explanation

1. **Trait Definition**: We define two traits, `Logger` and `FileLogger`. The `Logger` trait includes methods for logging and error messages. The `FileLogger` trait includes a method for logging messages to a file.
2. **Using Traits in Classes**: The `User` class uses the `Logger` trait to log actions performed within the class. The `FileHandler` class uses both the `Logger` and `FileLogger` traits.
3. **Testing the Classes**: Instances of the `User` and `FileHandler` classes are created, and their methods are called to demonstrate the use of traits.

### How to Run the Script

1. Save the script as `trait_practice.php`.
2. Open a terminal or command prompt.
3. Navigate to the directory where the script is saved.
4. Run the script using the command:
   ```bash
   php trait_practice.php
   ```

This script helps you understand how traits can be used to share functionality across different classes in PHP, promoting code reuse and cleaner design.
