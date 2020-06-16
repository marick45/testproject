<?php
require_once '../config/db.php';
$title = 'Добавление заметки';
require_once '../app/header.php';
$postt = $_POST['postzam'];
if(isset($postt)) {

    $iduz = $_SESSION['logged_user']['id'];
    $titlez = $_REQUEST['titlez'];
    $contentz = $_REQUEST['contentz'];
    $dbConnect->query("INSERT INTO confirmzametki (idusercz,titlecz,contentcz) VALUES ('$iduz','$titlez','$contentz')");
    echo "Заметка отправлена на модерацию";
}
?>
<div class="container"">
<div style="width: 50rem; position: absolute;left: 50%;top: 48%;transform: translate(-50%,-50%);background: white;border-radius: 10px;">
    <h3 align="center">Новая заметка</h3>
    <form style="margin-left: 10%; margin-right: 10%; margin-bottom: 10%;"action = "addzametka.php" method = 'post'>
        <div class="form-group">
            <label for="exampleInputEmail1">Заголовок</label>
            <input name="titlez" type="text" class="form-control" id="recipient-name">
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Содержание</label>
            <textarea style="resize: none;" name="contentz" class="form-control" rows="25" id="message-text" maxlength="5000"></textarea>
        </div>
        <button name="postzam" type="submit" class="btn btn-success"">Отправить</button>
        <a href="../views/zametki.php" class="btn btn-info">Отмена</a>
    </form>
</div>
</div>
<?php
require_once '../app/footer.php';
?>