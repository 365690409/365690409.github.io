<script>
$ya={
	pkradio:function (moval){
	  movhtml='<input type="hidden" name="'+moval.s+'" value="'+(moval.v?moval.v:'')+'"/><table width="100%" border="0" cellspacing="0" cellpadding="0"><tr>';
	  for(mom in moval.d){
	  movhtml+=mom==0?'':'<td width="3%"></td>';
	  movhtml+='<td><div class="moradio_'+moval.s+' pkro'+moval.c+' '+(moval.v==moval.d[mom][0]?'pkrosd':'')+'" kdd="'+moval.d[mom][0]+'" ktype="'+moval.s+'" onclick="yaradio(this);">'+moval.d[mom][1]+'</div></td>';
	  }
	  movhtml+='</tr></table>';
	  return movhtml;
	},
};

function yaradio(cthis){
  if($(cthis).parents(".ssform").find("input[name='"+$(cthis).attr('ktype')+"']").val()==$(cthis).attr('kdd')){
  $(cthis).parents(".ssform").find("input[name='"+$(cthis).attr('ktype')+"']").val('');
  $(cthis).parents(".ssform").find(".moradio_"+$(cthis).attr('ktype')).removeClass("pkrosd");
  }else{
  $(cthis).parents(".ssform").find("input[name='"+$(cthis).attr('ktype')+"']").val($(cthis).attr('kdd'));
  $(cthis).parents(".ssform").find(".moradio_"+$(cthis).attr('ktype')).removeClass("pkrosd");
  $(cthis).addClass('pkrosd');
  }
  ad_clistform();
}
