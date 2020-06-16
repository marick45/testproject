<?php
require_once '../config/db.php';
$title= 'Регистрация';
$postt = $_POST['btregistr'];
if(isset($postt)) {
    $reglogin = $_REQUEST['reg_login'];
    $regemail = $_REQUEST['reg_email'];
    $regpass= $_REQUEST['reg_pass'];
    $regpassc = $_REQUEST['reg_passconf'];
    $dbConnect->query("INSERT INTO users (login,email,password) VALUES ('$reglogin','$regemail','$regpass')");
}
?>

    <!doctype html>
    <html lang="ru">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <!-- Bootstrap CSS -->
        <link href="../public/css/bootstrap.min.css" rel="stylesheet">
        <link href="../public/css/style.css" rel="stylesheet">
        <title> <?=$title?> </title>
    </head>
    <body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar1" aria-controls="navbar1" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbar1">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="../index.php">Главная <span class="sr-only">(current)</span></a>
                </li>
            </ul>
            <?php if(isset($_SESSION['logged_user'])) : ?>
                <a class="nav-link dropdown-toggle" style="color: #ffffff;" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <?php echo $_SESSION['logged_user']['login']; ?>
                </a>
                <div class="dropdown-menu text-right" style="position: absolute;left: 93%;top: 91%;background: rgb(33,37,41);" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="../views/zametki.php" style="color: #ffffff;">Заметки</a>
                    <?php if($_SESSION['logged_user']['admin'] == 1) : ?>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="../adminpanel/usershow.php" style="color: #ffffff;">Пользователи</a>
                        <a class="dropdown-item" href="../adminpanel/confirmzametki.php" style="color: #ffffff;">Публикации</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="../views/logout.php" style="color: #ffffff;">Выход</a>
                    <?php else : ?>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="../views/logout.php" style="color: #ffffff;">Выход</a>
                    <?php endif; ?>
                </div>
            <?php else : ?>
                <a class="btn btn-outline-success" href="../views/login.php" type="submit2">Войти</a>
            <?php endif; ?>
        </div>
    </nav>
    <div class="container"">
        <div style="width: 28rem; height: 36rem; position: absolute;left: 50%;top: 48%;transform: translate(-50%,-50%);background: white;border-radius: 10px;">
            <h3 class="col-sm">Регистрация</h3>
            <form action = "../views/registration.php" method = 'post' class="form-signin">
                <div class="form-group">
                    <label class="control-label col-xs-3" for="lastName">Логин:</label>
                    <div class="col-xs-9">
                        <input type="text" class="form-control" name= "reg_login" id="lastName" placeholder="Введите логин" required="true">
                    </div>
                 </div>
                <div class="form-group">
                    <label class="control-label col-xs-3" for="inputEmail">Email:</label>
                    <div class="col-xs-9">
                        <input type="email" class="form-control" name= "reg_email" id="inputEmail" placeholder="Email" required="true">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-xs-3" for="inputPassword">Пароль:</label>
                    <div class="col-xs-9">
                        <input type="password" class="form-control" name= "reg_pass" id="inputPassword" placeholder="Введите пароль" required="true">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-xs-3" for="confirmPassword">Подтвердите пароль:</label>
                    <div class="col-xs-9">
                        <input type="password" class="form-control" name= "reg_passconf" id="confirmPassword" placeholder="Введите пароль ещё раз" required="true">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-xs-offset-3 col-xs-9">
                        <label class="checkbox-inline">
                            <input type="checkbox" value="agree">  Я согласен с <a href="#">условиями</a>.
                        </label>
                    </div>
                </div>
                <div class="form-group">
                        <input name="btregistr" type="submit" class="btn btn-info" value="Регистрация">
                        <input type="reset" class="btn btn-default" value="Очистить форму">
                </div>
            </form>
        </div>
    </div>
<div class="footer1">
    <div class="container">
        <p class="text-center">&copy; by Pavel</p>
    </div>
</div>
<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="../public/js/bootstrap.min.js"> </script>
</body>
</html>