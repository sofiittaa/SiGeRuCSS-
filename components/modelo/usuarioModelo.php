<?php
    class UsuarioModelo{
    private $pdo;


    public function __construct($pdo){
        $this ->pdo = $pdo;
    }

    public function ObtenerUsuarios(){
        $stmt = $this->pdo->prepare("SELECT * FROM usuario");
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function ObtenerPorEmail( $email){
        $stmt = $this->pdo->prepare("SELECT * FROM usuario where email = :email");
        $stmt->execute([
            'email' => $email
        ]);
        return $stmt->fetch();
    }

    public function RegistrarUsuario($cedula, $nombre, $apellido, $zonaUsu, $email, $contrasena){
        $stmt = $this->pdo->prepare("INSERT INTO usuario (cedula, nombre, apellido, zonaUsu, email, contrasena) VALUES (:cedula, :nombre, :apellido,:zonaUsu, :email, :contrasena)");
        $stmt->execute([
            'cedula' => $cedula,
            'nombre' => $nombre,
            'apellido' => $apellido,
            'zonaUsu' => $zonaUsu,
            'email' => $email,
            'contrasena' => $contrasena
        ]);
        
    }

    }


?>