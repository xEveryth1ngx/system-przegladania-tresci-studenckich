<?php
namespace App\Model;

use App\Service\Config;

class Movie
{
    private ?int $id = null;
    private ?string $title = null;
    private ?string $description = null;
    private ?string $year = null;
    
    /**
     * Get the value of title
     */ 
    public function getTitle() : ?string
    {
        return $this->title;
    }
    
    /**
     * Set the value of title
     *
     * @return  self
     */ 
    public function setTitle(?string $title) : self
    {
        $this->title = $title;
    
        return $this;
    }
    
    /**
     * Get the value of description
     */ 
    public function getDescription() : ?string
    {
        return $this->description;
    }
    
    /**
     * Set the value of description
     *
     * @return  self
     */ 
    public function setDescription(?string $description) : self
    {
        $this->description = $description;
    
        return $this;
    }
    
    /**
     * Get the value of year
     */ 
    public function getYear() : ?string
    {
        return $this->year;
    }
    
    /**
     * Set the value of year
     *
     * @return  self
     */ 
    public function setYear(?string $year) : self
    {
        $this->year = $year;
    
        return $this;
    }


    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(?int $id): Movie
    {
        $this->id = $id;

        return $this;
    }


    public static function fromArray($array): Movie
    {
        $Movie = new self();
        $Movie->fill($array);

        return $Movie;
    }

    public function fill($array): Movie
    {
        if (isset($array['id']) && ! $this->getId()) {
            $this->setId($array['id']);
        }
        if (isset($array['title'])) {
            $this->setTitle($array['title']);
        }
        if (isset($array['description'])) {
            $this->setDescription($array['description']);
        }
        if (isset($array['year'])) {
            $this->setYear($array['year']);
        }

        return $this;
    }

    public static function findAll(): array
    {
        $pdo = new \PDO(Config::get('db_dsn'), Config::get('db_user'), Config::get('db_pass'));
        $sql = 'SELECT * FROM movie';
        $statement = $pdo->prepare($sql);
        $statement->execute();

        $Movies = [];
        $MoviesArray = $statement->fetchAll(\PDO::FETCH_ASSOC);
        foreach ($MoviesArray as $MovieArray) {
            $Movies[] = self::fromArray($MovieArray);
        }

        return $Movies;
    }

    public static function find($id): ?Movie
    {
        $pdo = new \PDO(Config::get('db_dsn'), Config::get('db_user'), Config::get('db_pass'));
        $sql = 'SELECT * FROM movie WHERE id = :id';
        $statement = $pdo->prepare($sql);
        $statement->execute(['id' => $id]);

        $MovieArray = $statement->fetch(\PDO::FETCH_ASSOC);
        if (! $MovieArray) {
            return null;
        }
        $Movie = Movie::fromArray($MovieArray);

        return $Movie;
    }

    public function save(): void
    {
        $pdo = new \PDO(Config::get('db_dsn'), Config::get('db_user'), Config::get('db_pass'));
        if (! $this->getId()) {
            $sql = "INSERT INTO movie (title, description, year) VALUES (:title, :description, :year)";
            $statement = $pdo->prepare($sql);
            $statement->execute([
                'title' => $this->getTitle(),
                'description' => $this->getDescription(),
                'year' => $this->getYear(),
            ]);

            $this->setId($pdo->lastInsertId());
        } else {
            $sql = "UPDATE movie SET title = :title, description = :description, year = :year WHERE id = :id";
            $statement = $pdo->prepare($sql);
            $statement->execute([
                ':title' => $this->getTitle(),
                ':description' => $this->getDescription(),
                ':year' => $this->getYear(),
                ':id' => $this->getId(),
            ]);
        }
    }

    public function delete(): void
    {
        $pdo = new \PDO(Config::get('db_dsn'), Config::get('db_user'), Config::get('db_pass'));
        $sql = "DELETE FROM movie WHERE id = :id";
        $statement = $pdo->prepare($sql);
        $statement->execute([
            ':id' => $this->getId(),
        ]);

        $this->setId(null);
        $this->setTitle(null);
        $this->setDescription(null);
        $this->setYear(null);
    }

}
