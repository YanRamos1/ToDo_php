<?php

namespace Models;

use PDO;
use PDOException;

class Compromisso
{
    private $id;
    private $nome;
    private $descricao;
    private $localizacao;
    private $created_at;
    private $updated_at;
    private $terminado;
    private $data;

    //getters and setters

    public function getData()
    {
        return $this->data;
    }

    public function getTerminado()
    {
        return $this->terminado;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getNome()
    {
        return $this->nome;
    }

    public function getDescricao()
    {
        return $this->descricao;
    }

    public function getLocalizacao()
    {
        return $this->localizacao;
    }

    public function getCreated_at()
    {
        return $this->created_at;
    }

    public function getUpdated_at()
    {
        return $this->updated_at;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function setNome($nome)
    {
        $this->nome = $nome;
    }

    public function setTerminado($terminado)
    {
        $this->terminado = $terminado;
    }

    public function setDescricao($descricao)
    {
        $this->descricao = $descricao;
    }

    public function setLocalizacao($localizacao)
    {
        $this->localizacao = $localizacao;
    }


    public function setCreated_at($created_at)
    {
        $this->created_at = $created_at;
    }

    public function setUpdated_at($updated_at)
    {
        $this->updated_at = $updated_at;
    }

    public function setData($data)
    {
        $this->data = $data;
    }

    public function __construct($id = null, $nome = null, $descricao = null, $localizacao = null, $created_at = null, $updated_at = null, $data = null, $terminado = null)
    {
        $this->id = $id;
        $this->nome = $nome;
        $this->descricao = $descricao;
        $this->localizacao = $localizacao;
        $this->created_at = $created_at;
        $this->updated_at = $updated_at;
        $this->data = $data;
        $this->terminado = $terminado;
    }


    //CRUD


    public function all()
    {
        $db = new Database();
        $db = $db->connect();
        $sql = "SELECT * FROM Compromissos order by data";
        $result = $db->query($sql);
        $compromissos = $result->fetchAll(PDO::FETCH_ASSOC);

        return $compromissos;
    }

    public function save()
    {
        try {
            $db = new Database();
            $db = $db->connect();
            $sql = "INSERT INTO Compromissos (nome,descricao,localização,data,created_at,terminado) VALUES (:nome,:descricao,:localizacao,:data,:created_at,:terminado)";
            $stmt = $db->prepare($sql);
            $stmt->bindValue(':nome', $this->nome);
            $stmt->bindValue(':descricao', $this->descricao);
            $stmt->bindValue(':localizacao', $this->localizacao);
            $stmt->bindValue(':data', $this->data);
            $stmt->bindValue(':created_at', date('Y-m-d'));
            $stmt->bindValue(':terminado', $this->terminado);
            $stmt->execute();
            echo "Compromisso adicionado com sucesso!";
            echo '<a href="../index.php">';
            echo '<button class="btn btn-primary">
            Voltar
                    </button>';
            echo '</a>';
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
        return true;
    }

    public function getById($id)
    {
        try {
            $db = new Database();
            $db = $db->connect();
            $sql = "SELECT * FROM Compromissos WHERE id = :id";
            $stmt = $db->prepare($sql);
            $stmt->bindValue(':id', $id);
            $stmt->execute();
            //fetch object
            $compromisso = $stmt->fetch(PDO::FETCH_ASSOC);

            return $compromisso;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }

    public function delete($id)
    {
        try {
            $db = new Database();
            $db = $db->connect();
            $sql = "DELETE FROM Compromissos WHERE id = :id";
            $stmt = $db->prepare($sql);
            $stmt->bindValue(':id', $id);
            $stmt->execute();
            echo '<div class="card">';
            echo "Compromisso removido com sucesso!";
            echo '<br>';
            echo '<button><a href="../index.php" style="text-decoration: none">Voltar</a></button>';
            echo '</div>';

        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
        return true;
    }


}
