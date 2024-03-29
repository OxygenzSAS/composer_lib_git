<?php

namespace OxygenzSAS\git;

class Git
{

    /** recuperation de la version git */
    public static function getVersion(){
        try{
            ob_start();
            $t = exec('git describe --always 2>&1',$versionMiniHash, $result_code);
            if($t === false || $result_code != 0){
                return '';
            }
            if(isset($versionMiniHash[0])){
                $version = $versionMiniHash[0];
            }
            @ob_end_clean();

        }catch(\Throwable $e){}

        return $version ?? '';
    }

    public static function getCurrentGitCommitHash()
    {
        try{
            $head = trim(substr(file_get_contents( '.git/HEAD'), 4));
            $hash = trim(file_get_contents('.git/'.$head));
        }catch(\Throwable $e){}

        return $hash ?? '';
    }
    
}
