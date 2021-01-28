<?php
header('Access-Control-Allow-Origin:*');
$data=array();

$data['list']=array("me"=>"","data"=>json_decode('
{"type":"show",
   "data":[{"type":"indexform","data":[{"name":"dsad"}]}]
}
',true));
$data['eidt']=array("me"=>"","data"=>json_decode('
{"type":"show",
   "data":[{"type":"indexform","data":[{"name":"dsad","value":"dsad","url":"aaa"}]}]
}
',true));
$data['aaa']=array("me"=>"","data"=>json_decode('
{"type":"show",
   "data":[{"type":"indexform","data":[{"name":"dsaaaaad","value":"dsa11111d","url":"aaa"}]}]
}
',true));

echo json_encode($data[$_GET['key']]);
