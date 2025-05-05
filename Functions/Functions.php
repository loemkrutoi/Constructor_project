<?php 
class Functions{
    public static function Query($query){
        $link = mysqli_connect('MySQL-8.0', 'root', '', 'CONSTRUCTOR_DB');
        $sql = $query;
        $stmt = $link->prepare($sql);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result;
    }
}

?>