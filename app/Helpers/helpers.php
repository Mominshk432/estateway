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

function convertKeyword($data)
{

    if (!empty($data)) {
        if (is_array($data)) {
            $keywords_array = $data;
        } else {
            $keywords_array = json_decode($data);
        }
        $final_array = [];
        foreach ($keywords_array as $keyword) {

            $final_array[] = $keyword->value;
        }
        return implode(',', $final_array);
    }
}
