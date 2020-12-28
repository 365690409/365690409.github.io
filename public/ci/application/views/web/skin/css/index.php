<style>
.icosint{background:url(/skin/views/web/css/images/icos.png) no-repeat;cursor:pointer;width:16px;height:16px;vertical-align:middle;display:inline-block;margin-top:-0.2em;*margin-top:0}
<?php
$aa=str_replace("\n","",explode(",","
.radio,.radio.selected,.radio.selected.disabled
,.checkbox,.checkbox.selected,.checkbox.disabled,.checkbox.selected.disabled
"));
foreach($aa as $v=>$n){
echo ".icosint".$n."{ background-position: 0 -".($v*26+52)."px;}";
}
?>
