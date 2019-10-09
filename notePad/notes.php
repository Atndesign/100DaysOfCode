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
    <a href="./" class="btn btn-primary mb-3" type="submit">Back to my notes</a>
    <a href="./" class="btn btn-danger mb-3" type="submit">Delete note</a>
    <?php 
        include "settings.php";
        $noteId = $_GET["id"];
        $response = $db->prepare("SELECT * FROM notes WHERE id = $noteId");
        $response->execute();
        $data = $response->fetch();
        echo '
        <div class="card">
            <h1 class="p-5">'.$data["title"].'</h1>
            <p class="p-5">'.$data["description"].'</p>
        </div>'
    ?>
    </div>
    
</body>
</html>