<?php
function getRev($str, $encoding='utf-8') {
    $result = '';
    $len = mb_strlen($str);
    for($i = $len - 1; $i>=0; $i --){
        $result .= mb_substr($str, $i, 1, $encoding);
    }
    return $result;
}
$string = '你好,Hello！';
echo getRev($string);
?>
