<?php

namespace App\Models;

use App\Database;
use PDO;

abstract class CoreModel
{
    /** @var int|null */
      protected $id;

        /**
     * Get the value of id
     */ 
    public function getId(): ?int
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
     * @return string
     */
    abstract protected static function tableName(): string;

    /**
     * @param int $id
     * @return $this|null
     */
    public static function find($id)
    {
        $pdo = Database::getPDO();

        $table_name = static::tableName();;

        $pdoStatement = $pdo->prepare("SELECT * FROM `$table_name` WHERE `id` = :id");
        $pdoStatement->execute(['id' => $id]);

        $object = $pdoStatement->fetchObject(static::class);

        return $object ?: null;
    }

    /**
     * @return $this[]
     */
    public static function findAll()
    {
      $pdo = Database::getPDO();

      $table_name = static::tableName();;

      $sql = "SELECT * FROM `$table_name`";

      $pdoStatement = $pdo->query($sql);      

      $objects = $pdoStatement->fetchAll( PDO::FETCH_CLASS, static::class );
      
      return $objects;
    }

    /**
     * @return bool
     */
    public function insert(): bool
    {
        $table = static::tableName();

        $matchingArray = [];
        foreach ($this as $property => $value) {
            if ($property !== 'id' && !is_array($value)) {
                $matchingArray[$property] = $value;
            }
        }

        $pdo = Database::getPDO();

        $sql = "INSERT INTO `$table` (" . implode(', ', array_keys($matchingArray)) . ")
                VALUES (:" . implode(', :', array_keys($matchingArray)) . ")";

        $pdoStatement = $pdo->prepare($sql);

        $isInsert = $pdoStatement->execute($matchingArray);

        if ($isInsert) {
            $this->id = $pdo->lastInsertId();

            return true;
        }

        return false;
    }

    /**
     * @return bool
     */
    public function update(): bool
    {
        $table = static::tableName();

        $matchingArray = [];
        foreach ($this as $property => $value) {
            if (!is_array($value)) {
                $matchingArray[$property] = $value;
            }
        }

        $pdo = Database::getPDO();

        $sqlSet = [];
        foreach (array_keys($matchingArray) as $field) {
            if ($field !== 'id') {
                $sqlSet[] = "`$field` = :$field";
            }
        }

        $sql = "
            UPDATE `$table`
            SET " . implode(", ", $sqlSet) . " 
            WHERE id = :id
        ";

        $pdoStatement = $pdo->prepare($sql);

        $pdoStatement->execute($matchingArray);

        return $pdoStatement->rowCount() > 0;
    }

    public function save(): bool
    {
        if ($this->getId() === null) {
            return $this->insert();
        }
        else {
            return $this->update();
        }
    }

}