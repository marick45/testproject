<?php
require_once '../config/db.php';
$title = 'Пользователи';
require_once '../app/header.php';
Error_Reporting(E_ALL & ~E_NOTICE);
$quantity=4;
$limit=3;
$page = $_GET['page'];
if(!is_numeric($page)) $page=1;
if ($page<1) $page=1;
$result2 = $dbConnect->query("SELECT * FROM users");
$num = mysqli_num_rows($result2);
    $pages = ceil($num / $quantity);
    $pages++;
    if ($page > $pages) $page = 1;
    if (!isset($list)) $list = 0;
    $list = --$page * $quantity;
    $result = $dbConnect->query("SELECT * FROM users LIMIT $quantity OFFSET $list;");
    $num_result = mysqli_num_rows($result);
    echo '<div class="container">';
    echo '<div class="content">';
    for ($i = 0; $i < $num_result; $i++) {
        $b = $i+1;
        $row = mysqli_fetch_array($result);
        $result3 = $dbConnect->query("SELECT * FROM zametki WHERE iduser='".$b."'");
        $num1_result = mysqli_num_rows($result3);
        echo '<div class="list-group">';
        echo '<a href="../adminpanel/adminzametki.php?user='. $row['id'] .'&page=1" class="list-group-item list-group-item-action">';
        echo '<h5 class="list-group-item-heading">ID: ' .  $row["id"] . '  Login: ' . $row["login"] .'</h5>';
        echo '<p class="list-group-item-text">E-mail: ' . $row["email"] . '</p>';
        echo '<p class="list-group-item-text">Количество заметок: ' . $num1_result . '</p>';
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
require_once '../app/footer.php';
?>