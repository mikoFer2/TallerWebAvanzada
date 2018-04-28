<?php

require("models/Usuario.php");
require("views/Login.view.php");

class LoginController {

    public function loginScreen() {
        $loginView = new LoginView();
        echo $loginView->render();
    }
    
    public function login($username, $password) {
        $user = Usuario::findByUsername($username);        
        
        if($user != null) {
            $_SESSION["username"] = $username;
            $_SESSION["user"] = $user;
            $_SESSION["rol"] = $user->getRol();

            header('Location: ' . '/AP/mainController.php/tareas');                      
        } else {
            echo "No se encuentra";
        }
        
    }

    public function logout() {
        $_SESSION = [];
        session_destroy();
        header('Location: ' . '/AP/mainController.php/index');
    }
}

?>