<?php

// Define a trait with some common methods
trait Logger
{
    public function log($message)
    {
        echo "[LOG]: $message" . PHP_EOL;
    }

    public function error($message)
    {
        echo "[ERROR]: $message" . PHP_EOL;
    }
}

// Define another trait with additional functionality
trait FileLogger
{
    public function logToFile($message, $filePath)
    {
        file_put_contents($filePath, $message . PHP_EOL, FILE_APPEND);
    }
}

// Define a class that uses the Logger trait
class User
{
    use Logger;

    private $name;

    public function __construct($name)
    {
        $this->name = $name;
    }

    public function setName($name)
    {
        $this->log("Setting name to $name");
        $this->name = $name;
    }

    public function getName()
    {
        return $this->name;
    }
}

// Define another class that uses both Logger and FileLogger traits
class FileHandler
{
    use Logger, FileLogger;

    private $filePath;

    public function __construct($filePath)
    {
        $this->filePath = $filePath;
    }

    public function write($message)
    {
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
