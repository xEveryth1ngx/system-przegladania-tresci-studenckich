<?php
namespace App\Model;

use App\Service\Config;

class Pracownik
{
    private ?int $id = null;
    private ?string $imie = null;
    private ?string $nazwisko = null;
    private ?string $stopien = null;
    
   /**
     * Get the value of imie
     */ 
    public function getImie()
    {
        return $this->imie;
    }

    /**
     * Set the value of imie
     *
     * @return  self
     */ 
    public function setImie($imie)
    {
        $this->imie = $imie;

        return $this;
    }

    /**
     * Get the value of nazwisko
     */ 
    public function getNazwisko()
    {
        return $this->nazwisko;
    }

    /**
     * Set the value of nazwisko
     *
     * @return  self
     */ 
    public function setNazwisko($nazwisko)
    {
        $this->nazwisko = $nazwisko;

        return $this;
    }

    /**
     * Get the value of stopien
     */ 
    public function getStopien()
    {
        return $this->stopien;
    }

    /**
     * Set the value of stopien
     *
     * @return  self
     */ 
    public function setStopien($stopien)
    {
        $this->stopien = $stopien;

        return $this;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(?int $id): self
    {
        $this->id = $id;

        return $this;
    }


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
        if (isset($array['imie'])) {
            $this->setImie($array['imie']);
        }
        if (isset($array['nazwisko'])) {
            $this->setNazwisko($array['nazwisko']);
        }
        if (isset($array['stopien'])) {
            $this->setStopien($array['stopien']);
        }

        return $this;
    }

    public static function findAll(): array
    {
        $pdo = new \PDO(Config::get('db_dsn'), Config::get('db_user'), Config::get('db_pass'));
        $sql = 'SELECT * FROM pracownik';
        $statement = $pdo->prepare($sql);
        $statement->execute();

        $Pracownicy = [];
        $PracownicyArray = $statement->fetchAll(\PDO::FETCH_ASSOC);
        foreach ($PracownicyArray as $PracownikArray) {
            $Pracownicy[] = self::fromArray($PracownikArray);
        }

        return $Pracownicy;
    }

    public static function find($id): ?self
    {
        $pdo = new \PDO(Config::get('db_dsn'), Config::get('db_user'), Config::get('db_pass'));
        $sql = 'SELECT * FROM pracownik WHERE id = :id';
        $statement = $pdo->prepare($sql);
        $statement->execute(['id' => $id]);

        $PracownikArray = $statement->fetch(\PDO::FETCH_ASSOC);
        if (! $PracownikArray) {
            return null;
        }
        $Pracownik = Pracownik::fromArray($PracownikArray);

        return $Pracownik;
    }

    public function save(): void
    {
        $pdo = new \PDO(Config::get('db_dsn'), Config::get('db_user'), Config::get('db_pass'));
        if (! $this->getId()) {
            $sql = "INSERT INTO pracownik (imie, nazwisko, stopien) VALUES (:imie, :nazwisko, :stopien)";
            $statement = $pdo->prepare($sql);
            $statement->execute([
                'imie' => $this->getImie(),
                'nazwisko' => $this->getNazwisko(),
                'stopien' => $this->getStopien(),
            ]);

            $this->setId($pdo->lastInsertId());
        } else {
            $sql = "UPDATE pracownik SET imie = :imie, nazwisko = :nazwisko, stopien = :stopien WHERE id = :id";
            $statement = $pdo->prepare($sql);
            $statement->execute([
                ':imie' => $this->getImie(),
                ':nazwisko' => $this->getNazwisko(),
                ':stopien' => $this->getStopien(),
                ':id' => $this->getId(),
            ]);
        }
    }

    public function delete(): void
    {
        $pdo = new \PDO(Config::get('db_dsn'), Config::get('db_user'), Config::get('db_pass'));
        $sql = "DELETE FROM pracownik WHERE id = :id";
        $statement = $pdo->prepare($sql);
        $statement->execute([
            ':id' => $this->getId(),
        ]);

        $this->setId(null);
        $this->setImie(null);
        $this->setNazwisko(null);
        $this->setStopien(null);
    }

    public static function getData(int $budynek, int $numer) {
        $pdo = new \PDO(Config::get('db_dsn'), Config::get('db_user'), Config::get('db_pass'));
        $sql = 
        "SELECT *
        FROM pracownik
        JOIN pomieszczenie ON pracownik.id=pomieszczenie.pracownik_id 
        JOIN pietro ON pomieszczenie.pietro_id=pietro.id
        JOIN budynek ON pietro.budynek_id=budynek.id
        WHERE budynek.id={$budynek} AND pomieszczenie.numer={$numer};";

        $statement = $pdo->prepare($sql);
        $statement->execute();
        $Pracownicy = [];
        $PracownicyArray = $statement->fetchAll(\PDO::FETCH_ASSOC);
        foreach ($PracownicyArray as $PracownikArray) {
            $Pracownicy[] = self::fromArray($PracownikArray);
        }
        // TODO: TU ZABEZPIECZYC IDK CO JESZCZE
        return $Pracownicy;
    }
}
