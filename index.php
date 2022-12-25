<?php
include_once "action.php";

include "header.php";
$out = out(5);
print_r($out);
if (count($out) > 0) {
    foreach ($out as $row) {

        ?>
<div style="margin:10px; padding:5px;width:450px;background:f0f0f0;">
    <div style="color: #999999; border-bottom:1px solid #999999;padding:5px;">Опубликовал: <span
            style="color: #444;font-weight: bold;"><?php echo $row['username']; ?></span></div>
    <div style="background:#fafafa;padding:5px;"><?php echo $row['message']; ?></div>
    <div style="color: #999999; border-top:1px solid #999999;padding:5px;">Дата публикации: <?php echo $row['date']; ?>
    </div>
</div>
<?php
}
} else // если ни одной записи не встретилось
{
    echo "В гостевой книге пока нет записей...<br>";
}

include "footer.php";