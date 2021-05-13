<?php
    function getConnection( $servername = "localhost",
                            $username = "root",
                            $password = "root",
                            $dbname = "dbhotel") {
        $conn = new mysqli($servername, $username, $password, $dbname);
        if ($conn && $conn->connect_error) {
            echo "Connection failed: " . $conn->connect_error;
        }
        return $conn;
    }



    function getStanzeSql() {
        return "
            SELECT room_number, id
            FROM stanze
        ";
    }

    function getInfoStanze() {
        return "
            SELECT room_number, floor, beds
            FROM stanze
            WHERE id = ?
        ";
    }

    function closeConn($conn, $stmt) {
        $stmt -> close();
        $conn -> close();
    }
?>
