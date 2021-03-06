<?php
namespace Bijou;

class Database
{
    public $connection = NULL;

    public $fetchType = NULL;

    public function __construct()
    {
        $dsn = getcwd() . "/db.sqlite";
        $this->connection = new \PDO("sqlite:$dsn");
        $this->fetchType = \PDO::FETCH_OBJ;
    }

    /**
     * Run a select * statement.
     *
     * @param string $table.
     *
     * @return array | false.
     */
    public function selectAll($table) : mixed
    {
        if( !is_string($table) ) return false;

        $query = new \Bijou\Query;
        $stmt = $this->connection->prepare($query->selectAllFrom($table));
        $result = $stmt->execute();

        if($result)
        {
            return $stmt->fetchAll($this->fetchType);
        }else
        {
            return false;
        }
    }


    /**
     * Find a specific row from a table using an ID.
     *
     * @param int $id.
     *
     * @param string $table.
     *
     * @return array | false.
     */
    public function find($id, $table)
    {
        if( !is_int($id) ) return false;
        if( !is_string($table) ) return false;

        $sql = "SELECT * FROM $table where id=:id";
        $stmt = $this->connection->prepare($sql);
        $stmt->bindValue(":id", $id);
        $result = $stmt->execute();

        if($result)
        {
            return $stmt->fetchAll($this->fetchType);
        }else
        {
            return false;
        }
    }
    

}


