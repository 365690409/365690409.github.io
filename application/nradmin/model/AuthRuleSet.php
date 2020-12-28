<?php
namespace app\nradmin\model;
use think\ Controller;
class AuthRuleSet extends Controller{
     /*列表条件*/
    public function nrlike(){
        return [
	  	   'type'=>'',
	       'form'=>[
	  		  'pagenum'=>10,
	  		  'page'=>1,
	  		  'url'=>'authRule/listdata'
	  	    ]
  	    ];	 
    }
    /*列表*/
    public function nrselect($class){
       $pagenum=$this->request->post('pagenum')?$this->request->post('pagenum'):10;
       $list_data=array();
       $list=model($class);
       if($this->request->post('type')!=""){
      // $list =$list->where("type",$this->request->post('type'));
       }
      // $list =$list->order('weigh','desc');
       $list =$list->paginate($pagenum);
       foreach($list as $key=>$rs){
       	 $rs=$rs->toarray();
       	 $data=array();
	     $data['sele_id']=$rs['id'];
	     $data['name_id']=$rs['id'];
	     $data['ctag_type']=$rs['type']=="test"?'label|success|Test|||':'label|primary|单页|||';
		 $data['name_name']=$rs['name'];
		 $data['ctag_status']=$rs['status']=="normal"?'text|success|正常|||ok':'text|gray|隐藏|||remove';
		 $data['ptag_oper']='t-btn|success btn-xs||编辑|AuthRule/list#AuthRule/edit/'.$rs['id'].'|pencil|,|p-btn|danger btn-xs||确定删除此项?|AuthRule/delete/'.$rs['id'].'|trash|';
	      $list_data[]=$data;
       }
    	return [
        'thead'=>['sele_id'=>'ID','name_id'=>'ID','name_type'=>'类型','name_name'=>'名称','left_status'=>'状态','name_oper'=>'操作'],
  		'data'=>$list_data,
  		'total'=>$list->total(),
  		'cur'=>$list->currentPage(),
  		'pagenum'=>$pagenum,

  	    ];	 
    }
	/*编辑执行*/
	public function update($class,$id){
		$modeldd=model($class);
		$data=$this->request->only(['type','name','nickname','keywords','description','status'],'post');
		if($id){
			$err=$modeldd->save($data,['id' => $id]);
		}else{
			$err=$modeldd->save($data);
		}
		return $err;
	}
	/*编辑*/
	public function nreidt($rs=array()) {
		$data=[
			'url'=>"Category/update".(!empty($rs['id'])?'/'.$rs['id']:''),
			'id'=>(!empty($rs['id'])?$rs['id']:''),
		'data'=>[
			[
				'title'=>'类型',
				'data'=>[
					'type'=>'select',
					'name'=>'type',
					'data'=>[
						['name'=>'page','value'=>'page'],['name'=>'test','value'=>'test']
					],
				 'value'=>(!empty($rs['type'])?$rs['type']:''),
				]
			],		
		[
		'title'=>'名称',
		'data'=>[
		  'type'=>'text',
		  'name'=>'name',
		  'value'=>(!empty($rs['name'])?$rs['name']:''),
		  'placeholder'=>'请输入名称',
		]
		],
		[
		'title'=>'昵称',
		'data'=>[
		  'type'=>'text',
		  'name'=>'nickname',
		  'value'=>(!empty($rs['nickname'])?$rs['nickname']:''),
		  'placeholder'=>'请输入昵称',
		]
		],   
		[
		'title'=>'关键字',
		'data'=>[
		  'type'=>'text',
		  'name'=>'keywords',
		  'value'=>(!empty($rs['keywords'])?$rs['keywords']:''),
		  'placeholder'=>'请输入关键字',
		]
		],   
		[
		'title'=>'描述',
		'data'=>[
		  'type'=>'textarea',
		  'name'=>'description',
		  'value'=>(!empty($rs['description'])?$rs['description']:''),
		  'placeholder'=>'请输入描述',
		]
		],
		[
		'title'=>'状态',
		'data'=>[
		  'type'=>'radio',
		  'name'=>'status',
		  'value'=>(!empty($rs['status'])?$rs['status']:'normal'),
		  'data'=>[
		    ['name'=>'正常','value'=>'normal'],['name'=>'隐藏','value'=>'hidden']
		  ],
		]
		],
		[
		'title'=>'',
		'class'=>'layer-footer',
		'data'=>[
		  'type'=>'submit',
		]
		],
		]
		  
		];
		return $data;
	}
}
