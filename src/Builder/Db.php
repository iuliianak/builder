<?php

namespace Space\Builder;


class Db implements DbInterface
{
    protected static $instance;

    protected $connection;

    private function __construct()
    {
        try {
            $this->connection = new \mysqli("localhost", "padmin", "12345", "base");
        }
        catch(\Exception $e) {
        echo 'ERROR:'.$e->getMessage();
    }
    }

    public static function getDb()
    {
        if(static::$instance === null){
            static::$instance = new static();
        }
        return static::$instance;

    }

    public function one(QueryInterface $query): object
    {
        $result = $this->connection->query($query->toSql()) or die ($this->connection->error);
       $myrow = $result->fetch_object();
        return $myrow;
    }

    public function all(QueryInterface $query): array
    { $columns = explode(",",$query->getColumns());
        $result = $this->connection->query($query->toSql()) or die ($this->connection->error);
        $myrow = $result->fetch_array(MYSQLI_ASSOC);
        do{
            foreach($columns as $pole){
                $arr[][$pole] = $myrow[$pole];
            }
        }
        while($myrow = $result->fetch_array(MYSQLI_ASSOC));
        return $arr;
    }
}