<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>NotePad</title>
</head>
<body>
    <div class="container mt-5">
        <div class="card">
            <div class="row">
                <div class="col-md-4 card">
                    <h1 class="p-3">My notes</h1>
                    <?php 
                        include "settings.php";
                        $response = $db->prepare("SELECT * FROM notes");
                        $response->execute();

                        $datas = $response->fetchAll();
                        foreach ($datas as $data) {
                            $description = $data["description"];
                            $shortDesc = substr($description, 0, 15);
                            echo '
                            <div class="card">
                                <a href="notes.php" class="p-4">
                                    <h4>Title</h4>
                                    <p>'. $shortDesc .'</p>
                                </a>
                            </div>';
                        }
                    ?>
                </div>
                <div class="col-md-8 card">
                <h1 class="p-3">New note</h1>
                <form method="POST" action="index.php">
                    <textarea class="p-3" name="description" id="" cols="100" rows="10"></textarea>
                    <button class="btn btn-primary" type="submit">Add note</button>
                </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>

<?php 
    include "settings.php";
    if(isset($_POST["description"])){
        $noteContent = $_POST["description"];
        $response = $db->prepare("INSERT INTO notes (description) values (:description)");
        $response->bindValue("description", $noteContent);
        $response->execute();
    }
?>