<?php
include_once "action.php";

include "header.php";

$c=0;	
if (isset($_SESSION ['user_login'])) {
	echo "<a href='admin_panel.php'>Увійти до адміністративної панелі</a><br/>";
	echo "<a href='action.php?action=logout'>Вийти з облікового запису</a><br/>";
}	
else {
	echo "<a href='autorize.php'>Увійти</a><br/>";
	echo "<a href='registration.php'>Зареєструватись</a><br/>";
}
$out = out(5);
print_r($out);
if (count($out) > 0) {
    foreach ($out as $row) {

        ?>
<div style="margin:10px; padding:5px;width:450px;background:f0f0f0;">
    <div style="color: #999999; border-bottom:1px solid #999999;padding:5px;">Опублікував: <span
            style="color: #444;font-weight: bold;"><?php echo $row['username']; ?></span></div>
    <div style="background:#fafafa;padding:5px;"><?php echo $row['message']; ?></div>
    <div style="color: #999999; border-top:1px solid #999999;padding:5px;">Дата публикації: <?php echo $row['date']; ?>
    </div>
</div>
<?php
}
} else 
{
    echo "В гостьовій книжці поки що немає записів...<br>";
}

include "footer.php";