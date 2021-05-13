<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- font awesame -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css">
    <!-- bootstrap v4 -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <!-- jquery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- vue 2 -->
    <script src="https://cdn.jsdelivr.net/npm/vue@2.x"></script>
    <!-- axios -->
    <script src="https://cdn.jsdelivr.net/npm/axios@0.21.1/dist/axios.min.js"></script>
    <style>
        body {
            background: purple;
            color: white;
        }
    </style>
    <script>
        function init() {
            console.log('hello');
        }
        document.addEventListener("DOMContentLoaded",init);
    </script>
    <title>Info stanze</title>
</head>
<body>
    <div id="app" class="container text-center">
        <div class="row">
            <div class="col-12 mt-3">
                <h1>Info stanze:</h1>
                <?php
                    require_once "data.php";
                    $id = $_GET['id'];
                    $conn = getConnection();
                    $sql = getInfoStanze();
                    $stmt = $conn -> prepare($sql);
                    $stmt -> bind_param("i", $id);
                    $stmt -> execute();
                    $stmt -> bind_result($stanza, $floor, $beds);
                    $stmt -> fetch();
                    echo '<h3> Stanza numero: ' . ' ' . $stanza . '</h3>'
                          .'<h3> Piano numero: ' . ' ' . $floor . '</h3>'
                          .'<h3> Numero letti: ' . ' ' . $beds .'</h3>' ;
                    closeConn($conn, $stmt);
                ?>
            </div>
        </div>
    </div>
</html>
