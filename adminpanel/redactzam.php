<?php
ob_start();
require_once '../config/db.php';
$title = 'Проверка заметки';
require_once '../app/header.php';
$postt = $_POST['btpub'];
$btott = $_POST['btot'];
$zametk = $_GET['zametka'];
$result = $dbConnect->query("SELECT * FROM confirmzametki WHERE idcz=$zametk");
$row = mysqli_fetch_array($result);
if(isset($postt)) {
    $idusz = $row['idusercz'];
    $titlecz = $_REQUEST['titlez'];
    $contentcz = $_REQUEST['contentz'];
    $dbConnect->query("INSERT INTO zametki (iduser,titlez,contentz) VALUES ('$idusz','$titlecz','$contentcz')");
    $dbConnect->query("DELETE FROM confirmzametki WHERE idcz=$zametk");
    header("Location:../adminpanel/confirmzametki.php");
}
if(isset($btott)) {
    $dbConnect->query("DELETE FROM confirmzametki WHERE idcz=$zametk");
    header("Location:../adminpanel/confirmzametki.php");
}

?>
<div class="container">
    <div style="width: 50rem; position: absolute;left: 50%;top: 48%;transform: translate(-50%,-50%);background: white;border-radius: 10px;">
    <h3 align="center">Проверка заметки</h3>
    <form style="margin-left: 10%; margin-right: 10%; margin-bottom: 10%;"action="../adminpanel/redactzam.php?zametka=<?php echo $row['idcz']; ?>" method="post">
    <div class="form-group">
    <label for="exampleInputEmail1">Заголовок</label>
    <input name="titlez" type="text" class="form-control" id="recipient-name" value="<?php echo $row['titlecz']; ?>">
     </div>
    <div class="form-group">
    <label for="exampleInputPassword1">Содержание</label>
     <textarea style="resize: none;" name="contentz" class="form-control" rows="25" id="message-text" maxlength="5000"><?php echo $row['contentcz']; ?></textarea>
    </div>
     <button name="btpub" type="submit" class="btn btn-success"">Опубликовать</button>
     <button name="btot" type="submit" class="btn btn-danger"">Отказать</button>
    </form>
    </div>
    </div>
<?php
require_once '../app/footer.php';
?>