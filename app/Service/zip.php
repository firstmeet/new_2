<?php


namespace App\Service;


class zip
{
    function zipFiles($dest, $files)
    {

        $zipname = $dest;
        //这是要打包的文件地址数组
        if (empty($files)) {
            return false;
        }


        $zip = new \ZipArchive();
        $res = $zip->open($zipname, \ZipArchive::CREATE);
        if ($res === TRUE) {
            foreach ($files as $file) {
                //这里直接用原文件的名字进行打包，也可以直接命名，需要注意如果文件名字一样会导致后面文件覆盖前面的文件，所以建议重新命名
                $new_filename = substr($file, strrpos($file, '/') + 1);
                $zip->addFile($file, $new_filename);
            }
        }

    }
}
