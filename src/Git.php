<?php

namespace OxygenzSAS\git;

class Git
{

    /** recuperation de la version git */
    public static function getVersion(){
        try{
            ob_start();
            exec('git describe --always',$versionMiniHash);
            if(isset($versionMiniHash[0])){
                $version = $versionMiniHash[0];
            }
            @ob_end_clean();

        }catch(\Throwable $e){}

        return $version ?? '';
    }

}
