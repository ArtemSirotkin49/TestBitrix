<?php
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
use Bitrix\Main\Page\Asset;
$APPLICATION->SetTitle("Task 2");
Asset::getInstance()->addCss("/local/templates/.default/css/custom.css");
$A = [];
for ($i = 0; $i < 10; $i++) {
    for ($j = 0; $j < 10; $j++) {
        $A[$i][$j] = rand(0, 100);
    }
}
$B = [];
for ($i = 0; $i < 10; $i++) {
    $B[] = rand(0, 100);
} ?>
<div>
    <h3>A</h3>
    <table>
        <?php foreach ($A as $row => $arItems) { ?>
            <tr>
                <?php foreach ($arItems as $col => $item) { ?>
                    <td class="td_border"> <?= $item ?> </td>
                <?php } ?>
            </tr>
        <?php } ?>
    </table>
</div>
<?php foreach ($B as $key => $value) {
    foreach ($A as $row => $arItems) {
        foreach ($arItems as $col => $item) {
            if ($value == $item) {
                unset($A[$row][$col]);
            }
        }
    }
} ?>
<div class="mrg_top20">
    <h3>B and A</h3>
    <table>
        <tr>
            <?php foreach ($B as $key => $value) { ?>
                <th class="td_border td_grey"> <?= $value ?> </th>
            <?php } ?>
        </tr>
        <?php for ($i = 0; $i < 10; $i++) { ?>
            <tr>
                <?php for ($j = 0; $j < 10; $j++) {
                    if (isset($A[$i][$j])) { ?>
                        <td class="td_border"> <?= $A[$i][$j] ?> </td>
                    <?php } else { ?>
                        <td class="td_border"> Нет </td>
                    <?php }
                 } ?>
            </tr>
        <?php } ?>
    </table>
</div>
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>