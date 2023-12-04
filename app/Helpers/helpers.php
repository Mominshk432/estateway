<?php

function saveFiles($file, $path)
{
    $FileName = "";
    if (!empty($file)) {
        $FileName = time() + rand(111, 999) . '.' . $file->extension();
        $file->storeAs('public/' . $path, $FileName);
        $FileName = 'storage/' . $path . '/' . $FileName;

    }

    return $FileName;
}
