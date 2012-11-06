<?php
//擷取字串前幾個字並避免截掉半個中文字，$strlen要擷取的字串長度(以英文字母數計算，中文字需算二個字數)
//此處直接傳入從資料庫讀出之UTF-8編碼字串
function CuttingStr($str, $strlen) {
//把' '先轉成空白
$str = str_replace(' ', ' ', $str);
 
$output_str_len = 0; //累計要輸出的擷取字串長度
$output_str = ''; //要輸出的擷取字串
 
//逐一讀出原始字串每一個字元
for($i=0; $i<strlen($str);$i++){
//擷取字數已達到要擷取的字串長度，跳出回圈
if($output_str_len >= $strlen){
break;
}
 
//取得目前字元的ASCII碼
$str_bit = ord(substr($str, $i, 1));
 
if($str_bit < 128) {
//ASCII碼小於 128 為英文或數字字符
$output_str_len += 1; //累計要輸出的擷取字串長度，英文字母算一個字數
$output_str .= substr($str, $i, 1); //要輸出的擷取字串
 
}elseif($str_bit > 191 && $str_bit < 224) {
//第一字節為落於192~223的utf8的中文字(表示該中文為由2個字節所組成utf8中文字)
$output_str_len += 2; //累計要輸出的擷取字串長度，中文字需算二個字數
$output_str .= substr($str, $i, 2); //要輸出的擷取字串
$i++;
 
}elseif($str_bit > 223 && $str_bit < 240) {
//第一字節為落於223~239的utf8的中文字(表示該中文為由3個字節所組成的utf8中文字)
$output_str_len += 2; //累計要輸出的擷取字串長度，中文字需算二個字數
$output_str .= substr($str, $i, 3); //要輸出的擷取字串
$i+=2;
 
}elseif($str_bit > 239 && $str_bit < 248) {
//第一字節為落於240~247的utf8的中文字(表示該中文為由4個字節所組成的utf8中文字)
$output_str_len += 2; //累計要輸出的擷取字串長度，中文字需算二個字數
$output_str .= substr($str, $i, 4); //要輸出的擷取字串
$i+=3;
}
}
 
//要輸出的擷取字串為空白時，輸出原始字串
return ($output_str == '') ? $str : $output_str;
}
?>