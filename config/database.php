<?php

define('DB_HOST', 'localhost');
define('DB_NAME', 'the_post');
define('DB_USER', 'root');
define('DB_PASSWORD', '');

define('MAIL_HOST', 'smtp.gmail.com');
define('MAIL_USERNAME', 'peppe55@mailcom');
define('MAIL_PASSWORD', 'root');
define('MAIL_PORT', 587);
define('MAIL_FROM', 'noreply@mail.com');
define('MAIL_FROM_NAME', 'the_post');

define('SESSION_TIMEOUT', 1800);
define('PASSWORD_RESET_TIMEOUT', 1800);

class Database
{

    private static $instance = null;
    private $connection;

    public function __construct()
    {
        try {
            $this->connection = new PDO(
                'mysql:host' . DB_HOST . ';mysql:name' . DB_NAME  . ';charset=utf8mb4',
                DB_USER,
                DB_PASSWORD,
                [
                    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                    PDO::ATTR_EMULATE_PREPARES => false
                ]
            );
        } catch (PDOException $error) {
            die("Errore di connessione " . $error->getMessage());
        }
    }

    public static function getInstance(){

        if(self::$instance == null){
            self::$instance = new self;
        }

        return self::$instance;

    }

    public function getConnection(){
        return $this->connection;
    }
}
