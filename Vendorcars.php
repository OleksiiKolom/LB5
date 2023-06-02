<?php
include("connect.php");

$VendorNames = $_GET["VendorName"];


    try 
    {

        $sqlSelect = "SELECT vendors.Name AS VendorName, vendors.ID_Vendors, cars.Name AS CarName
        FROM vendors INNER JOIN cars ON vendors.ID_Vendors = cars.FID_Vendors WHERE vendors.Name=:VendorName";

        $sth = $dbh->prepare($sqlSelect);
        $sth->bindValue(":VendorName",$VendorNames);
        $sth->execute();
        $res = $sth->fetchAll(PDO::FETCH_NUM);
        
        echo "<table border = '1'>";
        echo "<thead><tr><th>Vendor</th><th>Car name</th></tr></thead>";
        echo "<tbody>";
        foreach($res as $row)
        {
            echo "<tr><td>$row[0]</td><td>$row[2]</td></tr>";
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