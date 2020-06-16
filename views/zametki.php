<?php
require_once '../config/db.php';
$title = 'Заметки';
require_once '../app/header.php';

Error_Reporting(E_ALL & ~E_NOTICE);
$quantity=4;
$limit=3;
$page = $_GET['page'];
if(!is_numeric($page)) $page=1;
if ($page<1) $page=1;
$result2 = $dbConnect->query("SELECT * FROM zametki WHERE iduser = '". $_COOKIE['id'] . "'");
$num = mysqli_num_rows($result2);
if($num < 1){
    echo '<div class="content" style="width: 25rem; height: 18rem; position: absolute;left: 50%;top: 22%;transform: translate(-50%,-50%);">';
    echo ' <div class="card card-block text-center" style="width: 25rem; height: 15rem;">';
 echo ' <h3 class="card-title">Заметки</h3>';
 echo ' <p class="card-text">Здравствуйте! На данный момент у Вас нет ни одной заметки. Чтобы создать заметку нажмите кнопку ниже.
                            Будте внимательны!После добавления новой заметки и при её редактировании, она отправляется на премодерацию администратору, и только после одобрения она появится в списке опубликованных Вами заметок.</p>';
 echo ' <a href="addzametka.php" class="btn btn btn-success">Создать заметку</a>';
echo '</div>';
    echo '</div>';
}
else {
    $pages = ceil($num / $quantity);
    $pages++;
    if ($page > $pages) $page = 1;
    if (!isset($list)) $list = 0;
    $list = --$page * $quantity;
    $result = $dbConnect->query("SELECT * FROM zametki WHERE iduser = '". $_COOKIE['id'] . "'
                      LIMIT $quantity OFFSET $list;");
    $num_result = mysqli_num_rows($result);
    echo '<div class="container">';
    echo '<div class="content">';
    // Выводим все записи текущей страницы
    for ($i = 0; $i < $num_result; $i++) {
        $row = mysqli_fetch_array($result);
        echo '<div class="list-group">';
        echo '<a href="../views/viewzam.php?zametka='. $row['idz'] .'" class="list-group-item list-group-item-action">';
        echo '<h5 class="list-group-item-heading">' . $row["titlez"] . '</h5>';
        echo '<p class="list-group-item-text">' . $row["contentz"] . '</p>';
        echo ' </a>';
        echo '</div>';
    }
    $this1 = $page + 1;
    $start = $this1 - $limit;
    $end = $this1 + $limit;

    echo '<div class="text-center">';
    echo '<nav>';
    echo '<ul class="pagination">';
    echo '<li class="page-item">';
    echo '<a class="page-link" href="' . $_SERVER['SCRIPT_NAME'] . '?page=1" aria-label="Previous">';
    echo '<span aria-hidden="true">&laquo;</span>';
    echo '<span class="sr-only">Previous</span>';
    echo '</a>';
    echo '</li>';
    for ($j = 1; $j < $pages; $j++) {
        if ($j >= $start && $j <= $end) {

            if ($j == ($page + 1)) {
                echo '<li class="page-item active">';
                echo '<a class="page-link" href="' . $_SERVER['SCRIPT_NAME'] . '?page=' . $j . '">' . $j . '<span class="sr-only">(current)</span></a>';
                echo '</li>';
            }
            else echo '<a class="page-link" href="' . $_SERVER['SCRIPT_NAME'] . '?page=' . $j . '">' . $j . '<span class="sr-only">(current)</span></a>';
        }
    }
    echo '<li class="page-item">';
    echo '<a class="page-link" href="' . $_SERVER['SCRIPT_NAME'] . '?page=' . ($j - 1) . '" aria-label="Next">';
    echo '<span aria-hidden="true">&raquo;</span>';
    echo '<span class="sr-only">Next</span>';
    echo '</a>';
    echo '</li>';
    echo '<a href="addzametka.php" class="btn btn-success">Создать заметку</a>';
    echo '</ul>';
    echo '</nav>';
    echo '</div>';
    echo '</div>';
    echo '</div>';
}
require_once '../app/footer.php';
?>