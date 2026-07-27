<?php
    class ContenedorModelo{
    private $pdo;

    public function __construct($pdo){
        $this ->pdo = $pdo;
    }

    public function ObtenerContenedor(){
        $stmt = $this->pdo->prepare("SELECT * FROM contenedor");
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function AgregarContenedor( $zona, $capacidad, ){
        $stmt= $this->pdo->prepare("INSERT INTO contenedor( zona, capacidad)  VALUES ( :zona, :capacidad )");
        $stmt->execute([
        'zona' => $zona,
        'capacidad' => $capacidad

        ]);
    }

    }


?>

