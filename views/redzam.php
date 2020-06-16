<?php
require_once '../config/db.php';
$title = 'Редактирование заметки';
require_once '../app/header.php';
$zametk = $_GET['zametka'];
$result = $dbConnect->query("SELECT * FROM zametki WHERE idz=$zametk");
$row = mysqli_fetch_array($result);
?>
    <div class="container">
        <div style="width: 50rem; position: absolute;left: 50%;top: 48%;transform: translate(-50%,-50%);background: white;border-radius: 10px;">
            <h3 align="center">Редактирование заметки</h3>
            <form style="margin-left: 10%; margin-right: 10%; margin-bottom: 10%;" action="../views/redzamzapr.php?zametka=<?php echo $row['idz']; ?>" method="post">
                <div class="form-group">
                    <label for="exampleInputEmail1">Заголовок</label>
                    <input name="titlez" type="text" class="form-control" id="recipient-name" value="<?php echo $row['titlez']; ?>">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Содержание</label>
                    <textarea style="resize: none;" name="contentz" class="form-control" rows="25" id="message-text" maxlength="5000"><?php echo $row['contentz']; ?></textarea>
                </div>
                <button name="btpub" type="submit" class="btn btn-success"">Редактировать</button>
                <a href="../views/viewzam.php?zametka=<?php echo $zametk ?>" class="btn btn-info">Отмена</a>
            </form>
        </div>
    </div>
<?php
require_once '../app/footer.php';
?>