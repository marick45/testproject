<?php
require_once '../config/db.php';
$title = 'Просмотр заметки';
require_once '../app/header.php';
$zametk = $_GET['zametka'];
$result = $dbConnect->query("SELECT * FROM zametki WHERE idz=$zametk");
$row = mysqli_fetch_array($result);
?>
    <div class="container">
        <div class="content" style="width: 80rem;"><br>
            <h2 align="center"><?php echo $row['titlez']; ?></h2><br>
            <div style="margin-left: 10%; margin-right: 10%;">
                <p style="font-size: 14pt"><?php echo $row['contentz']; ?></p>
            </div>
            <a style="margin-top: 1%; margin-left: 1%; margin-bottom: 1%;" href="../views/redzam.php?zametka=<?php echo $row['idz'] ?>" class="btn btn-success">Редактировать</a>
            <a href="../views/delzam.php?zametka=<?php echo $row['idz'] ?>" class="btn btn-danger">Удалить</a>
            <a href="../views/zametki.php" class="btn btn-info">Назад</a>
        </div>
    </div>
<?php
require_once '../app/footer.php';
?>