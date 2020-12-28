<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:84:"D:\phpstudy_pro\WWW\weba\public/../application/index\view\plugin\carousel\index.html";i:1608453222;}*/ ?>
<?php
$paren_demoid="carousel_1";
?>
<div id="<?php echo $paren_demoid; ?>" class="carousel slide" data-ride="carousel">
	<ol class="carousel-indicators"> 
		<?php if(is_array($layout_carousellist) || $layout_carousellist instanceof \think\Collection || $layout_carousellist instanceof \think\Paginator): $i = 0; $__LIST__ = $layout_carousellist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
		<li data-target="#<?php echo $paren_demoid; ?>" data-slide-to="<?php echo $key; ?>" <?php if($key==0): ?>class="active"<?php endif; ?>></li>
		<?php endforeach; endif; else: echo "" ;endif; ?> 
	</ol> 
	<div class="carousel-inner"> 
		<?php if(is_array($layout_carousellist) || $layout_carousellist instanceof \think\Collection || $layout_carousellist instanceof \think\Paginator): $i = 0; $__LIST__ = $layout_carousellist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
		<div class="carousel-item <?php if($key==0): ?>active show<?php endif; ?>>"><img src="<?php echo $vo['image']; ?>" class="d-block w-100" alt="<?php echo $vo['name']; ?>"><div class="carousel-caption d-none d-md-block">
            <?php echo (isset($vo['description']) && ($vo['description'] !== '')?$vo['description']:""); ?>
		</div></div>
		<?php endforeach; endif; else: echo "" ;endif; ?> 
	</div> 
	<a class="carousel-control-prev" href="#<?php echo $paren_demoid; ?>" role="button" data-slide="prev"><span class="carousel-control-prev-icon" aria-hidden="true"></span></a>
	<a class="carousel-control-next" href="#<?php echo $paren_demoid; ?>" role="button" data-slide="next"><span class="carousel-control-next-icon" aria-hidden="true"></span></a> 
</div>