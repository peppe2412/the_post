<?php

require_once '../config/database.php';

class Auth
{

    private $db;

    public function __construct()
    {
        $this->db = Database::getInstance()->getConnection();

        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
    }

    // registrazione
    public function register($username, $email, $password)
    {

        try {

            $stmt = $this->db->prepare("SELECT id FROM users WHERE username = ? OR email = ?");

            $stmt->execute([$username, $email]);

            if ($stmt->rowCount() > 0) {
                return ['success' => false, 'message' => 'Campi già esistenti'];
            }

            if (strlen($password) < 6) {
                return ['success' => false, 'message' => 'La password deve contenere minimo 6 caratteri'];
            }

            $password_hash = password_hash($password, PASSWORD_DEFAULT);

            $stmt = $this->db->prepare("INSERT INTO users (username, email, password_hash) VALUES (?, ?, ?)");

            $stmt->execute([$username, $email, $password_hash]);

            return ['success' => true, 'message' => 'Registrazione completata'];
        } catch (PDOException $error) {
            return ['success' => false, 'message' => 'Ops! Errore durante la registrazione'];
        }
    }

    // login
    public function login($username, $password)
    {

        try {

            $stmt = $this->db->prepare("SELECT id, username, password_hash FROM users WHERE username = ? OR email = ?");

            $stmt->execute([$username, $username]);

            if ($stmt->rowCount() == 0) {
                return ['success' => false, 'message' => 'Credenziali non valide'];
            }

            $user = $stmt->fetch();

            if (password_verify($password, $user['password_hash'])) {
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['username'] = $user['username'];
                $_SESSION['email'] = $user['email'];
                $_SESSION['login_time'] = time();

                return ['success' => true, 'message' => 'Accesso effettuato'];
            } else {
                return ['success' => false, 'message' => 'Accesso negato'];
            }
        } catch (PDOException $error) {
            return ['success' => false, 'message' => 'Ops! Errore durante il login'];
        }
    }

    //verifica utente autenticato
    public function isLoggin(){

        if(!isset($_SESSION['user_id']) || !isset($_SESSION['login_time'])){
            return false;
        }

        if(time() - $_SESSION['login_item'] > SESSION_TIMEOUT){
            $this->logout();
            return false;
        }

        return true;

    }

    // logout
    public function logout(){
        session_unset();
        session_destroy();
        return ['success' => true, 'message' => 'Disconessione, effettuata!'];
    }
}
