<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rent</title>
</head>
<body>
    <h2>Отриманий дохід з прокату станом на обрану дату</h2>
    <form action="rent.php" method="get">
        <select name="cost" id="cost">
    <?php
    include("connect.php");
    try {
         foreach($dbh->query("SELECT DISTINCT Date_end FROM rent") as $row){
            echo "<option value=$row[0]>$row[0]</option>";
        }
    }
    catch(PDOException $ex){
        echo $ex->GetMessage();
    }
    ?>
    </select>
        <input type="submit" value="Результат">
    </form> 
    
    <h2>Автомобілі обраного виробника</h2>
    <form action="vendor.php" method="get">
        <select name="vendor" id="vendor">
    <?php
    include("connect.php");
    try {
         foreach($dbh->query("SELECT DISTINCT Name FROM vendors") as $row){
            echo "<option value=$row[0]>$row[0]</option>";
        }
    }
    catch(PDOException $ex){
        echo $ex->GetMessage();
    }
    ?>
    </select>
        <input type="submit" value="Результат">
    </form>

<h2>Вільні автомобілі на обрану дату</h2>
    <form action="cars.php" metod="get">
        <select name="cars" id="cars">
    <?php
    include("connect.php");
    try {
         foreach($dbh->query("SELECT DISTINCT Date_start FROM rent") as $row){
            echo "<option value=$row[0]>$row[0]</option>";
        }
    }
    catch(PDOException $ex){
        echo $ex->GetMessage();
    }
    ?>
    </select>
        <input type="submit" value="Результат">
    </form>

</body>
</html>