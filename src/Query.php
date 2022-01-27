<?php
namespace Bijou;

/**
 * Query object represents an SQL query abstraction.
 */
class Query
{
    /**
     * Generic select * SQL statement
     *
     * @param string $table    The table to select from.
     *
     * @return string
     */
    public function selectAllFrom(string $table) : string
    {
        return "select * from $table";
    }
}
