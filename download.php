<?php

    $filename = $_GET["filename"];
    $filePath = '/downloads/'.$filename;

    require_once("record_visitors.php");

    $visitor = new guest_info;
    $log_string = date('Y-m-d H:i:s')."\t"."download ".$filename."\t".$visitor->GetIP()."\t".$visitor->GetOS()."\t".$visitor->GetBrowser()."\t".$visitor->GetLang()."\t".$visitor->GetIPLoc_sina($visitor->GetIP())."\n";

    $fp = fopen('visitor.log','a');
    /*if( flock($fp,LOCK_EX))*/
    //{
        //fwrite($fp,$log_string);
        //flock($fp, LOCK_UN);
    /*}*/

    fwrite($fp,$log_string);
    fclose($fp);

    header('Content-type: application/octet-stream');
    //header('Content-Disposition: attachment; filename="' . basename($file) . '"');
    header('Content-Disposition: attachment; filename="'.$filename.'"');
    //让Xsendfile发送文件
    header('X-Accel-Redirect: '.$filePath);


?>
