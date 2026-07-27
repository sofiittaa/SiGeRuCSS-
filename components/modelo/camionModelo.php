<?php
    class CamionModelo{
    private $pdo;

    public function __construct($pdo){
        $this->pdo = $pdo;
    }

    public function ObtenerCamiones( ){
        $stmt = $this->pdo->prepare("SELECT * FROM camion");
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function RegistrarCamion($matricula, $capacidad){
        $stmt = $this->pdo->prepare("INSERT INTO camion (matricula, capacidad) VALUES (:matricula, :capacidad)");
        $stmt->execute([
            'matricula' => $matricula,
            'capacidad' => $capacidad 
        ]);
        
    }

    }


?>