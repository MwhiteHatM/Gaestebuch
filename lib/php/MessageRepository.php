<?php

class MessageRepository
{


    private $table = "messages";    //table name 
    // function for add any message from Form
    function addMessage($name, $message)
    {
        //connection with database
        @require("db.inc.php");
        $stmt = $dbh->prepare("INSERT INTO " . $this->table . " (name, message) VALUES (:name, :message)");
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':message', $message);
        $result = $stmt->execute();        //$result = our statment
        //close connection with DB safly
        $this->dbh = null;
        // this function will return $result value
        return $result;
    }

    // function for display data from db
    public function getAll()
    {
        // connection with DB
        @require("db.inc.php");
        $sql = "SELECT  date, name, message From " . $this->table . " ORDER BY date";
        $result = array();
        // i put all data in array use array_push
        foreach ($dbh->query($sql) as $row) {
            array_push($result, $row);
        }
        //close connection with db safly
        $dbh = null;
        // this function will return $result value as array
        return $result;
    }


}

?>