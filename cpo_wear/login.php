<?php require_once "./php/init.php";?>
<?php require_once "./php/check_url.php";?>
<?php require_once BASE_URL."php/connect.php";?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style_login.css">

    <title>AdminTool CPO</title>
    <link rel="icon" href="./photos/logo1.png" type="image/icon type">
    <script src="https://kit.fontawesome.com/43bab92263.js" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
<body>
    <div class="container">
        <header>
            Admin tool CPO WEAR
            <form method="post">
                <div class="row_login">
                    <label> Login:</label>
                    <input type="text" required id="login"/>
                </div>
                <div class="row_login">
                    <label> Hasło:</label>
                    <input type="password" required id="password"/>
                </div>
                <input type="submit">
                
            </form>
            <span>Dodaj produkt</span>
            <span>Edytuj produkt</span>
            <span>Usuń produkt</span>
        </header>
        <main>
            menu
        </main>  
    </div>      
</body>
</html>