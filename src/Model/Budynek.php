<?php
namespace App\Model;

use App\Service\Config;

class Budynek
{
    private ?int $id = null;
    private ?string $nazwa = null;
    private ?string $adres = null;

    /**
     * Get the value of adres
     */ 
    public function getAdres()
    {
        return $this->adres;
    }

    /**
     * Set the value of adres
     *
     * @return  self
     */ 
    public function setAdres($adres)
    {
        $this->adres = $adres;

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

    
    /**
     * Get the value of nazwa
     */ 
    public function getNazwa()
    {
        return $this->nazwa;
    }

    /**
     * Set the value of nazwa
     *
     * @return  self
     */ 
    public function setNazwa($nazwa)
    {
        $this->nazwa = $nazwa;

        return $this;
    }
    

    public static function fromArray($array): self
    {
        $Budynek = new self();
        $Budynek->fill($array);

        return $Budynek;
    }

    public function fill($array): self
    {
        if (isset($array['id']) && ! $this->getId()) {
            $this->setId($array['id']);
        }
        if (isset($array['nazwa'])) {
            $this->setNazwa($array['nazwa']);
        }
        if (isset($array['adres'])) {
            $this->setAdres($array['adres']);
        }

        return $this;
    }

    public static function findAll(): array
    {
        $pdo = new \PDO(Config::get('db_dsn'), Config::get('db_user'), Config::get('db_pass'));
        $sql = 'SELECT * FROM budynek' ;
        $statement = $pdo->prepare($sql);
        $statement->execute();

        $Budynki = [];
        $BudynkiArray = $statement->fetchAll(\PDO::FETCH_ASSOC);
        foreach ($BudynkiArray as $BudynekArray) {
            $Budynki[] = self::fromArray($BudynekArray);
        }

        return $Budynki;
    }

    public static function find($id): ?Budynek
    {
        $pdo = new \PDO(Config::get('db_dsn'), Config::get('db_user'), Config::get('db_pass'));
        $sql = 'SELECT * FROM budynek WHERE id = :id';
        $statement = $pdo->prepare($sql);
        $statement->execute(['id' => $id]);

        $BudynekArray = $statement->fetch(\PDO::FETCH_ASSOC);
        if (! $BudynekArray) {
            return null;
        }
        $Budynek = Budynek::fromArray($BudynekArray);

        return $Budynek;
    }

    public function save(): void
    {
        $pdo = new \PDO(Config::get('db_dsn'), Config::get('db_user'), Config::get('db_pass'));
        if (! $this->getId()) {
            $sql = "INSERT INTO budynek (nazwa, adres) VALUES (:nazwa, :adres)";
            $statement = $pdo->prepare($sql);
            $statement->execute([
                'nazwa' => $this->getNazwa(),
                'adres' => $this->getAdres(),
            ]);

            $this->setId($pdo->lastInsertId());
        } else {
            $sql = "UPDATE budynek SET nazwa = :nazwa, adres = :adres WHERE id = :id";
            $statement = $pdo->prepare($sql);
            $statement->execute([
                ':nazwa' => $this->getNazwa(),
                ':adres' => $this->getAdres(),
                ':id' => $this->getId(),
            ]);
        }
    }

    public function delete(): void
    {
        $pdo = new \PDO(Config::get('db_dsn'), Config::get('db_user'), Config::get('db_pass'));
        $sql = "DELETE FROM budynek WHERE id = :id";
        $statement = $pdo->prepare($sql);
        $statement->execute([
            ':id' => $this->getId(),
        ]);

        $this->setId(null);
        $this->setNazwa(null);
        $this->setAdres(null);
    }



}
