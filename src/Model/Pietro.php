<?php
namespace App\Model;

use App\Service\Config;

class Pietro
{
    private ?int $id = null;
    private ?int $numer = null;
    private ?int $budynek_id = null;

        /**
     * Get the value of budynek_id
     */ 
    public function getBudynek_id()
    {
        return $this->budynek_id;
    }

    /**
     * Set the value of budynek_id
     *
     * @return  self
     */ 
    public function setBudynek_id($budynek_id)
    {
        $this->budynek_id = $budynek_id;

        return $this;
    }

    /**
     * Get the value of numer
     */ 
    public function getNumer()
    {
        return $this->numer;
    }

    /**
     * Set the value of numer
     *
     * @return  self
     */ 
    public function setNumer($numer)
    {
        $this->numer = $numer;

        return $this;
    }

    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */ 
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }


    public static function fromArray($array): self
    {
        $Pietro = new self();
        $Pietro->fill($array);

        return $Pietro;
    }

    public function fill($array): self
    {
        if (isset($array['id']) && ! $this->getId()) {
            $this->setId($array['id']);
        }
        if (isset($array['numer'])) {
            $this->setNumer($array['numer']);
        }
        if (isset($array['budynek_id'])) {
            $this->setBudynek_id($array['budynek_id']);
        }

        return $this;
    }

    public static function findAll(): array
    {
        $pdo = new \PDO(Config::get('db_dsn'), Config::get('db_user'), Config::get('db_pass'));
        $sql = 'SELECT * FROM pietro' ;
        $statement = $pdo->prepare($sql);
        $statement->execute();

        $Pietra = [];
        $PietraArray = $statement->fetchAll(\PDO::FETCH_ASSOC);
        foreach ($PietraArray as $PietroArray) {
            $Pietra[] = self::fromArray($PietroArray);
        }

        return $Pietra;
    }

    public static function find($id): ?Pietro
    {
        $pdo = new \PDO(Config::get('db_dsn'), Config::get('db_user'), Config::get('db_pass'));
        $sql = 'SELECT * FROM pietro WHERE id = :id';
        $statement = $pdo->prepare($sql);
        $statement->execute(['id' => $id]);

        $PietroArray = $statement->fetch(\PDO::FETCH_ASSOC);
        if (! $PietroArray) {
            return null;
        }
        $Pietro = Pietro::fromArray($PietroArray);

        return $Pietro;
    }

    public function save(): void
    {
        $pdo = new \PDO(Config::get('db_dsn'), Config::get('db_user'), Config::get('db_pass'));
        if (! $this->getId()) {
            $sql = "INSERT INTO pietro (numer, budynek_id) VALUES (:numer, :budynek_id)";
            $statement = $pdo->prepare($sql);
            $statement->execute([
                'numer' => $this->getNumer(),
                'budynek_id' => $this->getBudynek_id(),
            ]);

            $this->setId($pdo->lastInsertId());
        } else {
            $sql = "UPDATE pietro SET numer = :numer, budynek_id = :budynek_id WHERE id = :id";
            $statement = $pdo->prepare($sql);
            $statement->execute([
                ':numer' => $this->getNumer(),
                ':budynek_id' => $this->getBudynek_id(),
                ':id' => $this->getId(),
            ]);
        }
    }

    public function delete(): void
    {
        $pdo = new \PDO(Config::get('db_dsn'), Config::get('db_user'), Config::get('db_pass'));
        $sql = "DELETE FROM pietro WHERE id = :id";
        $statement = $pdo->prepare($sql);
        $statement->execute([
            ':id' => $this->getId(),
        ]);

        $this->setId(null);
        $this->setNumer(null);
        $this->setBudynek_id(null);
        
    }





}
