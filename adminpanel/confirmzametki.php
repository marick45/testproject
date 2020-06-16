<?php
require_once '../config/db.php';
$title = 'Заметки на проверку';
require_once '../app/header.php';
Error_Reporting(E_ALL & ~E_NOTICE);
$quantity=4;
$limit=3;
$page = $_GET['page'];
if(!is_numeric($page)) $page=1;
if ($page<1) $page=1;
$result2 = $dbConnect->query("SELECT * FROM confirmzametki");
$num = mysqli_num_rows($result2);
if($num < 1){
    echo '<div class="content" style="width: 25rem; height: 18rem; position: absolute;left: 50%;top: 22%;transform: translate(-50%,-50%);">';
    echo ' <div class="card card-block text-center" style="width: 25rem; height: 15rem;">';
    echo ' <h3 class="card-title">Опубликование/редактирование заметок</h3>';
    echo ' <p class="card-text">Нет заметок на публикацию/редактирование</p>';
    echo '</div>';
    echo '</div>';
}
else {
    $pages = ceil($num / $quantity);
    $pages++;
    if ($page > $pages) $page = 1;
    if (!isset($list)) $list = 0;
    $list = --$page * $quantity;
    $result = $dbConnect->query("SELECT * FROM confirmzametki LIMIT $quantity OFFSET $list;");
    $num_result = mysqli_num_rows($result);
    echo '<div class="container">';
    echo '<div class="content">';
    // Выводим все записи текущей страницы
    for ($i = 0; $i < $num_result; $i++) {
        $row = mysqli_fetch_array($result);
        echo '<div class="list-group">';
        echo '<a href="../adminpanel/redactzam.php?zametka='. $row['idcz'] .'" class="list-group-item list-group-item-action">';
        echo '<h5 class="list-group-item-heading">' . $row["titlecz"] . '</h5>';
        echo '<p class="list-group-item-text">' . $row["contentcz"] . '</p>';
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
    echo '</ul>';
    echo '</nav>';
    echo '</div>';
    echo '</div>';
    echo '</div>';
}
require_once '../app/footer.php';
?>