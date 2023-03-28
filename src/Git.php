<?php

namespace OxygenzSAS\git;

class Git
{

    /** recuperation de la version git */
    public static function getVersion(){
        try{
            exec('git describe --always',$versionMiniHash);
            if(isset($versionMiniHash[0])){
                $version = $versionMiniHash[0];
            }
        }catch(\Throwable $e){}

        return $version ?? '';
    }

}