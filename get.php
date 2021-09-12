<?php

require_once 'database.php';

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <title>Document</title>
</head>

<body>
    <div class="container">
        <table align="center" class="table table-dark table-striped display-6">
            <?php
            $source = $_GET['source'];
            $table_info = $con->query("select * from keyword_table where keyword LIKE '%$source%'");
            if ($table_info->num_rows > 0) {
                $table_info = $table_info->fetch_assoc();

                $table_name = $table_info['tables'];
                $columns = $table_info['columns'];
                $column_data = $con->query("select $columns from $table_name");
                $columns = explode(",", $columns);
            ?>
                <h1 class="display-2 text-center"><?php echo $table_name; ?></h1>
                <thead>
                    <tr>
                        <?php
                        for ($i = 0; $i < count($columns); $i++) {
                            $temp = $columns[$i];
                            echo "<th>$temp</th>";
                        }
                        ?>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    while ($row = $column_data->fetch_assoc()) {
                    ?>
                        <tr>
                            <?php
                            for ($i = 0; $i < count($columns); $i++) {
                                $temp = $row[$columns[$i]];
                                echo "<td>$temp</td>";
                            }
                            ?>
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
            <?php
            } else {
                echo "<caption>Keyword Not Found!</caption>";
            }
            ?>
        </table>
    </div>
</body>

</html>