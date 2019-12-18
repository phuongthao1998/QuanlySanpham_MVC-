<ul>
	<?php
    foreach($obj_Nhomsp_Menu->arr_data as $row_menu_nhomsp)
    {
        $manhom_menu= $row_menu_nhomsp["manhom"];
        $tennhom_menu = $row_menu_nhomsp["tennhom"];
    ?>
    <li><a href="?module=sanpham&manhom=<?=$manhom_menu?>">
    <?=$tennhom_menu?></a>
    </li>
    <?php
    }
    ?>
</ul>