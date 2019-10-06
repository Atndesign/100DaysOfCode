<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>Lunch picker</title>
</head>
<body>
    <div class="wrapper">
        <h1 class="text-center">My food picker</h1>
        <form class="text-center" action="./index.php">
            <button name="pressed" value="true" type="submit">Pick my food</button>
        </form>
    </div>
    <table class="table text-center">
        <tr>
            <th>Meat</th>
            <th>Feculent</th>
        </tr>
        <?php 
            
            if(isset($_GET["pressed"])){
                $strJsonFileContents = file_get_contents("data.json");
                $jsonFile = json_decode($strJsonFileContents,true);

                $randomMeat = rand (0 , count($jsonFile['meat']));
                $randomFecu = rand (0 , count($jsonFile['feculent']));

                echo "
                <tr>
                    <td>".$jsonFile['meat'][$randomMeat]."</td>
                    <td>".$jsonFile['feculent'][$randomFecu]."</td>
                </tr>
                ";
            }
        ?>
    </table>
</body>
</html>