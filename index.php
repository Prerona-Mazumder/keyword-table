<?php

require_once 'database.php';

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
</head>
<div class="container">
<body align="center">
    <form action="get.php">
        <label for="source">Keyword</label></br>
        <input type="text" name="source"></br>
        <input type="submit" value="submit">
    </form>
    <table align="center" class="table table-dark table-striped display-6">
        <?php
        $table_info = $con->query("select * from keyword_table");
        ?>
        <h1 class="display-2 text-center">Keyword Table</h1>
        <thead>
            <tr>
                <?php
                while ($row =  $table_info-> fetch_assoc() ) {
                    echo "<tr><td>".$row["keyword"]."</td><td>"."</td><td>".$row["tables"]."</td><td>"."</td><td>".$row["columns"]."</td></tr>";
                }
                ?>
            </tr>
        </thead>
    </table>
</body>
</div>

</html>