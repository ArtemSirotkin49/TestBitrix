<?php
$eventManager = Bitrix\Main\EventManager::getInstance();
//autoloader
$eventManager->addEventHandler(
    'iblock',
    'OnBeforeIBlockElementAdd',
    ['NewsSecondsActiveChanger', 'OnBeforeIBlockElementAddHandler']
);
$eventManager->addEventHandler(
    'iblock',
    'OnBeforeIBlockElementUpdate',
    ['NewsSecondsActiveChanger', 'OnBeforeIBlockElementUpdateHandler']
);

class NewsSecondsActiveChanger
{
    function OnBeforeIBlockElementAddHandler(&$arFields)
    {
        if ($arFields["IBLOCK_ID"] == "4") {
            $start = new DateTime('2020-01-01 01:01:01');
            $end = new DateTime($arFields["ACTIVE_FROM"]);
            $end->getTimestamp() - $start->getTimestamp();
            $arFields["PROPERTY_VALUES"]["25"] = $end->getTimestamp() - $start->getTimestamp();;
        }
    }

    function OnBeforeIBlockElementUpdateHandler(&$arFields)
    {
        if ($arFields["IBLOCK_ID"] == "4") {
            $start = new DateTime('2020-01-01 01:01:01');
            $end = new DateTime($arFields["ACTIVE_FROM"]);
            $end->getTimestamp() - $start->getTimestamp();
            $arFields["PROPERTY_VALUES"]["25"] = $end->getTimestamp() - $start->getTimestamp();;
        }
    }
}