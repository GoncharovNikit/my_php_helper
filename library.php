<?php

function mprint($var)
{
    echo "<pre>";
    print_r($var);
    echo "</pre>";
}

function fileToSelfDir($path, $all = false)
{
    $files = mscandir($path);
    // mprint($files);
    
    foreach($files as $file)
    {
        if (is_dir($path.$file) && $all){
            fileToSelfDir($path.$file.'\\');
        }
        elseif (is_dir($path.$file)){
            continue;
        }

        $info = pathinfo($file);
        $file_name =  basename($file,'.'.$info['extension']);                
        echo $file_name."<br>";
        if ($file_name == "1.jpg") continue;

        rename($path.$file, $path.'\1.'.$info['extension']);
        mkdir($path.$file_name);
        rename($path.'\1.'.$info['extension'], $path.$file_name.'\1.'.$info['extension']);
    }
}

function mscandir($path)
{
    return array_diff(scandir($path), array('..', '.'));
}