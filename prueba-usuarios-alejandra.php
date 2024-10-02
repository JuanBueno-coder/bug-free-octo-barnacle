<?php
// archivo: userManager.php

class UserManager {
    // Simulación de una base de datos de usuarios
    private $users = [];

    // Función para registrar un nuevo usuario
    public function registerUser($username, $email, $password) {
        // Verificar que el usuario no exista ya
        if ($this->userExists($username)) {
            return "El nombre de usuario '$username' ya está registrado.";
        }

        // Simulación de un almacenamiento seguro de la contraseña (hashed)
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        // Agregar nuevo usuario a la "base de datos"
        $this->users[$username] = [
            'email' => $email,
            'password' => $hashedPassword
        ];

        return "Usuario '$username' registrado con éxito.";
    }

    // Función para verificar si un usuario ya existe
    private function userExists($username) {
        return isset($this->users[$username]);
    }

    // Función para obtener todos los usuarios registrados (para prueba)
    public function getAllUsers() {
        return $this->users;
    }
}

// Ejemplo de uso de la clase UserManager
$userManager = new UserManager();
echo $userManager->registerUser("juan", "juan@example.com", "password123") . PHP_EOL;
echo $userManager->registerUser("ana", "ana@example.com", "password456") . PHP_EOL;

// Intentando registrar un usuario con el mismo nombre de usuario
echo $userManager->registerUser("juan", "juan2@example.com", "password789") . PHP_EOL;

// Mostrar todos los usuarios registrados
print_r($userManager->getAllUsers());
