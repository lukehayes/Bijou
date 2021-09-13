<?php
namespace MVP;

class Database
{
    public $connection = NULL;

    public $fetchType = NULL;

    public function __construct()
    {
        $this->connection = new \PDO("sqlite:db.sqlite");
        $this->fetchType = \PDO::FETCH_ASSOC;
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
        $sql = "SELECT * FROM $table";
        $stmt = $this->connection->prepare($sql);
        $result = $stmt->execute();

        if($result)
        {

            return $stmt->fetchAll($this->fetchType);
        }else
        {
            return false;
        }


        //return $result->fetch_all();
    }
    

}


