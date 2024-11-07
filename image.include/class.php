<?php
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

class ImageInclude extends CBitrixComponent
{

    public function getSrc($sSrc): string
    {
        if(!empty($sSrc) && file_exists($_SERVER["DOCUMENT_ROOT"].$sSrc)){
            return $sSrc;
        }else return $this->getPath() . "/images/image.png";
    }

    public function onPrepareComponentParams($arParams): array
    {
        return array(
            "IMAGE" => $arParams["IMAGE"] ?? $this->getPath() . "/images/image.png",
            "ALT" => $arParams["ALT"] ?? "Картинка",
            "CLASS" => $arParams["CLASS"] ?? "",
            "ATTRIBUTES" => $arParams["ATTRIBUTES"] ?? "",
        );
    }

    public function setResult($arParams)
    {
        $this->arResult["SRC"] = $this->getSrc($this->arParams["IMAGE"]);
        $this->arResult["ALT"] = $this->arParams["ALT"];
        $this->arResult["CLASS"] = implode($this->arParams["CLASS"]," ");
        $this->arResult["ATTRIBUTES"] = implode(" ",array_map(function($iKey, $sValue){return "{$iKey}='{$sValue}'";},array_keys($arParams["ATTRIBUTES"]),array_values($arParams["ATTRIBUTES"])));
    }

    public function executeComponent()
    {
        try{
            if($this->StartResultCache()){
                $this->setResult($this->onPrepareComponentParams($this->arParams));
                $this->includeComponentTemplate();
            }
        }catch(Exception $e){
            AddMessage2Log("Ошибка в компоненте " . $this->__name . "! ERROR: " . $e->getMessage());
        }
    }
}