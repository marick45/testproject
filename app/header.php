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
                <a class="nav-link dropdown-toggle" style="color: #ffffff;" href="" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
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