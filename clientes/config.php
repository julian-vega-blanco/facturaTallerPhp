<?php

require_once("db.php");

class Config {
    private $id;
    private $nombre;
    private $celular;
    private $compañia;
    private $dbCnx;

    public function __construct($id = 0, $nombre = "", $celular = "", $compañia = "") {
        $this->id = $id;
        $this->nombre = $nombre;
        $this->celular = $celular;
        $this->compañia = $compañia;
        $this->dbCnx = new PDO(DB_TYPE . ":host=" . DB_HOST . ";dbname=" . DB_NAME, DB_USER, DB_PWD, [
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        ]);
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function getId() {
        return $this->id;
    }

    public function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    public function getNombres() {
        return $this->nombre;
    }

    public function setCelular($celular) {
        $this->celular = $celular;
    }

    public function getCelular() {
        return $this->celular;
    }

    public function setCompañia($compañia) {
        $this->compañia = $compañia;
    }

    public function getCompañia() {
        return $this->compañia;
    }

    public function insertData() {
        try {
            $stm = $this->dbCnx->prepare("INSERT INTO clientes (nombre, celular, compañia) values(?, ?, ?)");
            $stm->execute([$this->nombre, $this->celular, $this->compañia]);
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function selectAll() {
        try {
            $stm = $this->dbCnx->prepare("SELECT * FROM clientes");
            $stm->execute();
            return $stm->fetchAll();
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function delete() {
        try {
            $stm = $this->dbCnx->prepare("DELETE FROM clientes WHERE Cliente_id = ?");
            $stm->execute([$this->id]);
            echo "<script>alert('Borrado Exitosamente');document.location='clientes.php'</script>";
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function selectOne() {
        try {
            $stm = $this->dbCnx->prepare("SELECT * FROM clientes WHERE Cliente_id = ?");
            $stm->execute([$this->id]);
            return $stm->fetchAll();
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function update() {
        try {
            $stm = $this->dbCnx->prepare("UPDATE clientes SET nombre = ?, celular = ?, compañia = ? WHERE Cliente_id = ?");
            $stm->execute([$this->nombre, $this->celular, $this->compañia, $this->id]);
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }
}

?>
