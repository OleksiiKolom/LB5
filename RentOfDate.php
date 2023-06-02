<?php
include("connect.php");
$CostOfRent = $_GET["CostOfRent"];

    try 
    {

        $sqlSelect = "SELECT Date_start, Date_end, Cost FROM rent WHERE Date_end =:CostOfRent";
       
        $sth = $dbh->prepare($sqlSelect);
        $sth->bindValue(":CostOfRent",$CostOfRent);
        $sth->execute();
        $res = $sth->fetchAll(PDO::FETCH_NUM);
        
        echo "<table border = '1'>";
        echo "<thead><tr><th>Start day rent</th><th>Last day rent</th><th>Cost</th></tr></thead>";
        echo "<tbody>";
        foreach($res as $row)
        {
            echo "<tr><td>$row[0]</td><td>$row[1]</td><td>$row[2]</td></tr>";
        }
        echo "</tbody>";
        echo "</table>";
    }
    catch(PDOException $ex)
    {
        echo $ex->GetMessage();
    }
    $dbh = null;
?>