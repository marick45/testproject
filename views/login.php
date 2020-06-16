<?php
    require_once '../config/db.php';
    $title = 'Авторизация';
    $postt = $_POST['btlogin'];
    if(isset($postt)) {
        $emil = trim($_REQUEST['emal']);
        $pass = trim($_REQUEST['pass']);
        $query = mysqli_query($dbConnect, "SELECT id, password, login, admin, odobr FROM users WHERE email='" . mysqli_real_escape_string($dbConnect, $emil) . "' LIMIT 1");
        $data = mysqli_fetch_assoc($query);
        if ($data['password'] === $pass) {
            setcookie("id", $data['id'], time() + 60 * 60 * 24 * 30);
            $_SESSION['logged_user'] = $data;
            header('Location:../views/zametki.php');
            exit;
        } else {
            echo "Не правильные логин/пароль!";
        }
    }
?>
<?php if(isset($_SESSION['logged_user'])) : header('Location: ../'); exit; ?>
<?php else : ?>
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
        <div class="content" style="width: 25rem; height: 23rem; position: absolute;left: 50%;top: 22%;transform: translate(-50%,-50%);">
            <h3 class="col-sm">Авторизация</h3>
            <form action = "login.php" method = 'post' class="form-signin">
                <div class="form-group">
                    <label class="control-label col-xs-3" for="lastName">E-mail:</label>
                    <div class="col-xs-9">
                        <input type="email" class="form-control" name= "emal" id="emailHelp" placeholder="Введите E-mail" required="true">
                    </div>
                 </div>
                <div class="form-group">
                    <label class="control-label col-xs-3" for="inputPassword">Пароль:</label>
                    <div class="col-xs-9">
                        <input type="password" class="form-control" name= "pass" id="inputPassword" placeholder="Введите пароль" required="true">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-xs-offset-3 col-xs-9">
                        <label class="checkbox-inline">
                            <input type="checkbox" value="agree">  Запомнить меня
                        </label>
                    </div>
                </div>
                <div class="form-group">
                        <input name="btlogin" type="submit" class="btn btn-success" value="Войти">
                        <a class="btn btn-info" href="../views/registration.php" type="submit2">Регистрация</a>
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
<?php endif; ?>