<?php

namespace App\Models;

use App\Database;
use PDO;

abstract class CoreModel
{
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
}