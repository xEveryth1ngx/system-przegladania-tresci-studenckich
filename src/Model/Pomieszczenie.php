<?php
namespace App\Model;

use App\Service\Config;

class Pomieszczenie
{
    private ?int $id = null;
    private ?int $numer = null;
    private ?string $rodzaj = null;
    private ?string $godzinyDostepnosci = null;
    private ?int $pracownikId = null;
    private ?int $pietroId = null;


    public static function fromArray($array): self
    {
        $Pracownik = new self();
        $Pracownik->fill($array);

        return $Pracownik;
    }

    public function fill($array): self
    {
        if (isset($array['id']) && ! $this->getId()) {
            $this->setId($array['id']);
        }
        if (isset($array['numer'])) {
            $this->setNumer($array['numer']);
        }
        if (isset($array['rodzaj'])) {
            $this->setRodzaj($array['rodzaj']);
        }
        if (isset($array['godzinyDostepnosci'])) {
            $this->setGodzinyDostepnosci($array['godzinyDostepnosci']);
        }
        if (isset($array['pracownikId'])) {
            $this->setPracownikId($array['pracownikId']);
        }
        if (isset($array['pietroId'])) {
            $this->setPietroId($array['pietroId']);
        }

        return $this;
    }

    public static function findAll(): array
    {
        $pdo = new \PDO(Config::get('db_dsn'), Config::get('db_user'), Config::get('db_pass'));
        $sql = 'SELECT * FROM pomieszczenie';
        $statement = $pdo->prepare($sql);
        $statement->execute();

        $Pomieszczenia = [];
        $PomieszczeniaArray = $statement->fetchAll(\PDO::FETCH_ASSOC);
        foreach ($PomieszczeniaArray as $PomieszczenieArray) {
            $Pomieszczenia[] = self::fromArray($PomieszczenieArray);
        }

        return $Pomieszczenia;
    }

    public static function find($id): ?self
    {
        $pdo = new \PDO(Config::get('db_dsn'), Config::get('db_user'), Config::get('db_pass'));
        $sql = 'SELECT * FROM pomieszczenie WHERE id = :id';
        $statement = $pdo->prepare($sql);
        $statement->execute(['id' => $id]);

        $PomieszczenieArray = $statement->fetch(\PDO::FETCH_ASSOC);
        if (! $PomieszczenieArray) {
            return null;
        }
        $Pomieszczenie = Pracownik::fromArray($PomieszczenieArray);

        return $Pomieszczenie;
    }

    public function save(): void
    {
        $pdo = new \PDO(Config::get('db_dsn'), Config::get('db_user'), Config::get('db_pass'));
        if (! $this->getId()) {
            $sql = "INSERT INTO pomieszczenie (numer, rodzaj, godziny_dostepnosci, pracownik_id, pietro_id) VALUES (:numer, :rodzaj, :godziny_dostepnosci, :pracownik_id, :pietro_id)";
            $statement = $pdo->prepare($sql);
            $statement->execute([
                'numer' => $this->getNumer(),
                'rodzaj' => $this->getRodzaj(),
                'godziny_dostepnosci' => $this->getGodzinyDostepnosci(),
                'pracownik_id' => $this->getPracownikId(),
                'pietro_id' => $this->getPietroId(),
            ]);

            $this->setId($pdo->lastInsertId());
        } else {
            $sql = "UPDATE pomieszczenie SET numer = :numer, rodzaj = :rodzaj, godziny_dostepnosci = :godziny_dostepnosci, pracownik_id = :pracownik_id, pietro_id = :pietro_id WHERE id = :id";
            $statement = $pdo->prepare($sql);
            $statement->execute([
                ':numer' => $this->getNumer(),
                ':rodzaj' => $this->getRodzaj(),
                ':godziny_dostepnosci' => $this->getGodzinyDostepnosci(),
                ':pracownik_id' => $this->getPracownikId(),
                ':pietro_id' => $this->getPietroId(),
                ':id' => $this->getId(),
            ]);
        }
    }

    public function delete(): void
    {
        $pdo = new \PDO(Config::get('db_dsn'), Config::get('db_user'), Config::get('db_pass'));
        $sql = "DELETE FROM pomieszczenie WHERE id = :id";
        $statement = $pdo->prepare($sql);
        $statement->execute([
            ':id' => $this->getId(),
        ]);

        $this->setNumer(null);
        $this->setRodzaj(null);
        $this->setGodzinyDostepnosci(null);
        $this->setPracownikId(null);
        $this->setPietroId(null);
        $this->setId(null);
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
     * Get the value of rodzaj
     */ 
    public function getRodzaj()
    {
        return $this->rodzaj;
    }

    /**
     * Set the value of rodzaj
     *
     * @return  self
     */ 
    public function setRodzaj($rodzaj)
    {
        $this->rodzaj = $rodzaj;

        return $this;
    }

    /**
     * Get the value of godzinyDostepnosci
     */ 
    public function getGodzinyDostepnosci()
    {
        return $this->godzinyDostepnosci;
    }

    /**
     * Set the value of godzinyDostepnosci
     *
     * @return  self
     */ 
    public function setGodzinyDostepnosci($godzinyDostepnosci)
    {
        $this->godzinyDostepnosci = $godzinyDostepnosci;

        return $this;
    }

    /**
     * Get the value of pracownikId
     */ 
    public function getPracownikId()
    {
        return $this->pracownikId;
    }

    /**
     * Set the value of pracownikId
     *
     * @return  self
     */ 
    public function setPracownikId($pracownikId)
    {
        $this->pracownikId = $pracownikId;

        return $this;
    }

    /**
     * Get the value of pietroId
     */ 
    public function getPietroId()
    {
        return $this->pietroId;
    }

    /**
     * Set the value of pietroId
     *
     * @return  self
     */ 
    public function setPietroId($pietroId)
    {
        $this->pietroId = $pietroId;

        return $this;
    }
}
