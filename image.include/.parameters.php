<?php
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
global $USER;
if($USER->CanDoOperation("edit_php")){
    $arComponentParameters = array(
        "GROUPS" => array(),
        "PARAMETERS" => array(
            "ALT" => array(
                "PARENT" => "BASE",
                "NAME" => "Описание картинки",
                "TYPE" => "STRING",
                "MULTIPLE" => "N",
                "ADDITIONAL_VALUES" => "N"
            ),
            "IMAGE" => array(
                "PARENT" => "BASE",
                "NAME" => "Картинка",
                "TYPE" => "FILE",
                "MULTIPLE" => "N",
                "ADDITIONAL_VALUES" => "N",
                "FD_TARGET" => "F",
                "FD_EXT" => "jpeg,jpg,png,svg,gif",
                "FD_UPLOAD" => true,
                "FD_USE_MEDIALIB" => true,
                "FD_MEDIALIB_TYPES" => array("image")
            ),
        ),
    );
}