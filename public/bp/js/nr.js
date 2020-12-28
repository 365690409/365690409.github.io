$nr={
  /*
    #抓取自动增加ID 
  */
  domo_auto_id:0,
  domoname:function(){
  	$nr.domo_auto_id++;
  	return 'domo_id_'+$nr.domo_auto_id;
  },
  /*
    排版处理-开始
  */
  all:{
  	 temp:function(nrname,nrdd){
  	 	var nrhtm='';
  	 	switch(nrname){
        /*
          scroll Body
          #请求数据  数组 demo data
          #返回 字符窜
        */
  	 		case 'scrollBody':
  	 		    $('body').attr('data-spy','scroll');
  	 		    $('body').attr('data-target','#'+nrdd.demo+'');
  	 		    $('body').attr('data-offset','50');
            return this.cd(nrdd.data);
            break;
        /*
          打开模板数据
          #请求数据  字符窜
          #返回 效果
        */
        case 'requstTemp':
            return $nr.temp[nrdd];
            break;  
        /*
          模板继承-处理
          #请求数据 {html:'',cd:{head:'',body:'',data:[]}}
          #返回 效果
        */
        case 'executeBlock':
            var val={};
            val.arr={};
            val.arrhtml={};
            val.arrgroup={};
            val.html=this.cd(nrdd.html);
            for(val.x in nrdd.cd){
               val.arr[val.x]=this.cd(nrdd.cd[val.x]);
               val.arrhtml[val.x]='';
               val.arrgroup[val.x]='';
            }
            for(val.x in nrdd.data){
              val.demo_id=$nr.domoname();
              for(val.x2 in val.arr){
                val.arrhtml[val.x2]=val.arr[val.x2];
                for(val.x3 in nrdd.data[val.x]){
                  val.arrhtml[val.x2]=val.arrhtml[val.x2].replace('{'+val.x3+'}',this.cd(nrdd.data[val.x][val.x3]));
                }
                val.arrhtml[val.x2]=val.arrhtml[val.x2].replace(/{set_numer}/ig,val.x);
                val.arrhtml[val.x2]=val.arrhtml[val.x2].replace(/{demo_id}/ig,val.demo_id);
                val.arrgroup[val.x2]+=val.arrhtml[val.x2];
              }
            }
            for(val.x in val.arrgroup){
              val.html=val.html.replace('{'+val.x+'}',val.arrgroup[val.x]); 
            }
            val.html=val.html.replace(/{h_demo_id}/ig,$nr.domoname());
            nrdd.active=nrdd.active?nrdd.active:0;
            if(nrdd.activearr){
              for(val.x in nrdd.activearr){
              val.html=val.html.replace('{execute_active'+nrdd.active+'}',' '+nrdd.activearr[val.x]);
              }
            }else{
              for(val.x in val.arrgroup){
              val.html=val.html.replace('{execute_active'+nrdd.active+'}',' active');
              }
            }
            return this.eq.deleteexecuteActive(val.html);
            break;
        /*
          模板继承-请求处理效果
          #请求数据 {html:'',data:[]}}
          #返回 效果
        */    
        case 'requestBlock':
            var setd=this.eq.analysisBoock($nr.temp[nrdd.html]);
                nrdd.html=setd.html;
                nrdd.cd=setd.cd;
            return this.cd({executeBlock:nrdd});
            break;  
        /*
          字符窜-请求处理效果
          #请求数据 字符窜  
          #返回 效果
        */   
        case 'requestChar':
           return this.assignChar(this.cd(this.eq.analysisChar(nrdd.use)),nrdd.data);
           break;
        /*
          requestNavbar-请求处理效果
          #请求数据 数组 {tag:'',data:[{litag:'',tag:'',name:'',group:{}}]}
          #返回 效果
        */  
        case 'requestNavbar':
            var temp=$nr.temp[nrdd.use].replace(/\r\n/ig,'').split("|");
            return temp[0].replace('{body}',this.eq.executeNavbar(this.eq.analysisNavbar(temp,nrdd.data))).replace(/{f_demo_id}/ig,$nr.domoname());
            break;  
        /*
          菜单组-请求处理效果
          #请求数据 数组 {tag:'',data:[{litag:'',tag:'',name:'',group:{}}]}
          #返回 效果
        */  
        case 'requestUlli':
            nrhtm+='<ul '+nrdd.tag+'>';
            for(this.x in nrdd.data){
              nrhtm+='<li '+nrdd.data[this.x].litag+'><a '+nrdd.data[this.x].tag+'>'+nrdd.data[this.x].name+'</a>';
              if(nrdd.data[this.x].group){
              nrhtm+=this.cd({requestUlli:nrdd.data[this.x].group});
              }
              nrhtm+='</li>';
            }
            nrhtm+='</ul>';
            break;  
        /*
          默认-请求处理效果
          #请求数据 是否有模板数据
          #返回 效果
        */  
  	 		default:
           if($nr.temp[nrname]){
              switch(nrname.substring(0,4)){
                case "all_":
                  return this.assignChar($nr.temp[nrname],nrdd);
                  return this.thml;
                  break;
                case "cha_":
                  return this.assignChar(this.cd({requestChar:{use:$nr.temp[nrname]}}),nrdd);
                  break;
                case "use_":
                  return this.assignChar(this.cd(this.eq.eval($nr.temp[nrname])),nrdd);
                  break;
                default:
                  nrhtm=$nr.temp[nrname].replace('{'+nrname+'}',this.cd(nrdd));
                  break;
              }
           }else{
            nrhtm=nrname;
           }
  	 		   break;
  	 	  }
    	 	if(nrdd.replace){
    	  	 for(nrx in nrdd.replace){
    	  	 	 if(nrx=="cd"){
    			 nrhtm=nrhtm.replace('{'+nrx+'}',this.cd(nrdd.replace[nrx]));	
    			 }else{
                 nrhtm=nrhtm.replace('{'+nrx+'}',nrdd.replace[nrx]);
    			 }
  			}
		  }
		  return nrhtm;
    },
     /*
      问题处理
     */
  	eq:{
       /*
          模板继承-分析
          #请求数据  字符窜
          #返回：{html:'',cd:{html:html,html:html}}
       */
       analysisBoock:function(str){
          var str=str.replace(/\r\n/ig,'');
          var msg={};
          var rep='{bblock name="(.*?)"}(.*?){/bblock}';
          if(RegExp(rep).exec(str)){
            var arr=str.match(RegExp(rep,'ig'));
            for(x in arr){
               val=arr[x].match(rep);
               str=str.replace(arr[x],'{bblock_'+val[1]+'}');
               msg['bblock_'+val[1]]=val[2];
            }
            msg={html:str,cd:msg};
          }
          return msg;
        },       
        /*
          字符窜-分析
          #请求数据 字符窜
          #返回 数组
        */     
       analysisChar:function(str){
            str=str.replace(/{/ig,'{card_').replace(/\[/ig,':[');
            str=str.replace(/}{/ig,'},{').replace(/}/ig,':""}');
            str=str.replace(/]:""/ig,']').replace(/":""/ig,'"');
            str=str.replace(/</ig,'{').replace(/>/ig,'}');
            return this.eval(str);
        },
        /*
          字符窜转数组
          #请求数据 字符窜
          #返回 数组
        */     
       eval:function(str){
            return eval('('+str+')');
        },
       /*
          删除处理-Active
          #请求数据  字符窜
       */
       deleteexecuteActive:function(str){
           var rep='{execute_active(.*?)}';
            if(RegExp(rep).exec(str)){
              var arr=str.match(RegExp(rep,'ig'));
              for(x in arr){
                str=str.replace(arr[x],'');
              }
            }
           return str;
        },

       /*
          多级菜单
          #请求数据  
       */
       analysisNavbar:function(temp,data,ii=0){
         for(var x in data){
           ii++;
           if(data[x].data){
              data[x]['html']=temp[ii].split("{block_eq}")[1];
              data[x]['data']=this.analysisNavbar(temp,data[x].data,ii);
           }else{
              data[x]['html']=temp[ii].split("{block_eq}")[0];
           }
           for(var xx in data[x]){
            if(xx!="data"){
            data[x]['html']= data[x]['html'].replace('{'+xx+'}',data[x][xx]);
            }
           }
           data[x]['html']= data[x]['html'].replace(/{demo_id}/ig,$nr.domoname());
           ii--;
         }
         return data; 
        },
       /*
          级菜单
          #请求数据  
          #返回 html
       */
       executeNavbar:function(data){
          if(data){
            var str="";
             for(var x in data){
               str+=data[x].html.replace('{data}',this.executeNavbar(data[x].data));
             }
            return str;
           }
            return "";
        },
  	 },
    /*
      排版-分析
      #请求数据 数组 字符窜
      #返回 2排版-分析
    */  
    cd:function(nrdd){
  		if(Array.isArray(nrdd)){
         var nrhtm='';
  		   for(nrx in nrdd){
  		   nrhtm+=this.cdfind(nrdd[nrx]);
  		   }
  		   return nrhtm;
  		}else{
  		   return this.cdfind(nrdd);
  		}
    },
    /*
      2排版-分析
      #请求数据 数组 字符窜
      #返回 查询模板
    */  
    cdfind:function(nrdd){
  		if(nrdd=='[object Object]'){
        var nrhtm='';
        var x;
  			for(x in nrdd){
  			nrhtm+=this.temp(x,nrdd[x]);	
  			}
  			return nrhtm;
  		}else{
  			return nrdd?nrdd:'';
  		}
    },
    /*
      模板数组
      #请求数据 字符窜引入模板数组
      #返回 数组 
    */  
    use:function(nrdd){
         return this.eq.eval($nr.temp[nrdd]);
    },
    /*
      模板变量赋值-分析
      #请求数据 str字符窜 data替换数据
      #返回 字符窜
    */     
     assignChar:function(str,data=""){
        var x;
        if(data){
          for(x in data){
          str=str.replace(RegExp('{'+x+'}',"ig"),this.cd(data[x]));
          }
        }
        return str;
      },
  },
  /*排版处理-结束*/ 
};
