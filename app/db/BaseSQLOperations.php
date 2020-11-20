<?php

//* BaseSQLOperation @vitalii-pokrivchak,@HrabV

//TODO: Make insert,update,delete method`s @HrabV

namespace app\db;

use app\models\Model;
use app\models\ModelObject;

class BaseSQLOperations implements IBaseSQLOperations
{
    public static function select(string $table, string $condition = null, string $classname = null)
    {

        $connection = new DbConnection(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME, DB_PORT);

        $query = $condition ? "SELECT * FROM $table WHERE $condition" : "SELECT * FROM $table";
        $q = $connection->query($query);
        if ($q) {
            $data = $q->fetch_all(MYSQLI_ASSOC);
            if ($classname != null) {
                $classname = MODELS_NAMESPACE . $classname;
                if (count($data) === 1) {
                    return array(
                        new $classname($data[0])
                    );
                   
                } else {
                    $result = [];
                    foreach ($data as $d) {
                        $result[] = new $classname($d);
                    }
                    return $result;
                }
            }
            $connection->close();
            return $data;
        }
        return false;
    }


    public static function insert(string $table, ModelObject $model)
    {
        $connection = new DbConnection(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME, DB_PORT);

        $values = $model->get_all();

        $sqlQuery = sprintf(
            'INSERT INTO '. $table. ' (%s) VALUES ("%s")',
            implode(',', array_keys($values)),
            implode('","', array_values($values))
        );
        echo  $sqlQuery . "<br>";


        if (mysqli_query($connection, $sqlQuery)) {
            echo "New record created successfully";
        } else {
            echo "!!!New record is not  created successfully!!!";
        }

        // if (mysqli_query($connection, $sqlQuery)) {
        //     echo "New record created successfully";
        //     } else {
        //         echo "!!!New record is not  created successfully!!!";
        //     }


        $connection->close();
    }


    public static function update(string $table, ModelObject $model, string $condition)
    {
        $connection = new DbConnection(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME, DB_PORT);


        //TODO


        $connection->close();
    }


    public static function delete(string $table, string $condition = null)
    {
        $connection = new DbConnection(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME, DB_PORT);

        //TODO


        $connection->close();
    }
}
