<?php if (!defined('THINK_PATH')) exit(); /*a:6:{s:84:"D:\phpstudy_pro\WWW\weba\public/../application/index\view\plugin\carousel\index.html";i:1608453222;s:74:"D:\phpstudy_pro\WWW\weba\public/../application/index\view\route\index.html";i:1608477531;s:64:"D:\phpstudy_pro\WWW\weba\application\index\view\public\base.html";i:1608455375;s:64:"D:\phpstudy_pro\WWW\weba\application\index\view\public\meta.html";i:1608386891;s:66:"D:\phpstudy_pro\WWW\weba\application\index\view\public\header.html";i:1608522844;s:66:"D:\phpstudy_pro\WWW\weba\application\index\view\public\footer.html";i:1608522228;}*/ ?>
<!doctype html>
<html>
<head>
<title><?php echo $site['name']; ?><?php echo $site['name']; ?></title>
<?php if(isset($keywords)): ?>
<meta name="keywords" content="<?php echo $keywords; ?>">
<?php endif; if(isset($description)): ?>
<meta name="description" content="<?php echo $description; ?>">
<?php endif; ?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<link rel="stylesheet" href="/bp/css/bootstrap.min.css">
<link rel="stylesheet" href="/bp/css/nr.css">
<script type="text/javascript" src="/bp/js/jquery.min.js"></script>
<script src="/bp/js/popper.min.js"></script>
<script src="/bp/js/bootstrap.min.js"></script>
<script type="text/javascript" src="/bp/js/nr.js?d=<?=date('Y-m-d H:i:s')?>"></script>
<script type="text/javascript" src="/bp/js/jstemp.js?d=<?=date('Y-m-d H:i:s')?>"></script>
</head>
<body>
<!-- 头部区域 -->
<header>
	
    	<div class=""></div>
<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
  <div class="container">
    <a class="navbar-brand" href="/"><?php echo $site['name']; ?></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
        <?php if(is_array($navbarlist) || $navbarlist instanceof \think\Collection || $navbarlist instanceof \think\Paginator): $i = 0; $__LIST__ = $navbarlist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;if(isset($vo['data'])): ?>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown">
            <?php echo $vo['name']; ?>
          </a>
          <div class="dropdown-menu border-0">
            <?php if(is_array($vo['data']) || $vo['data'] instanceof \think\Collection || $vo['data'] instanceof \think\Paginator): $i = 0; $__LIST__ = $vo['data'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v2): $mod = ($i % 2 );++$i;?>
            <a class="dropdown-item" href="/<?php echo $vo['type']; ?>_<?php echo $vo['nickname']; ?>"><?php echo $v2['name']; ?></a>
            <?php endforeach; endif; else: echo "" ;endif; ?>
          </div>
        </li>
        <?php else: ?>
        <li class="nav-item">
          <a class="nav-link" href="<?php echo $vo['type']; ?>_<?php echo $vo['nickname']; ?>" title="<?php echo $vo['name']; ?>"><?php echo $vo['name']; ?></a>
        </li>
        <?php endif; endforeach; endif; else: echo "" ;endif; ?>
      </ul>
      <form class="form-inline my-2 my-lg-0" action="/temp" method="get">
        <input class="form-control mr-sm-2" type="search" placeholder="关键词" name="keywords">
        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">搜索</button>
      </form>
    </div>
  </div>
</nav>  

</header>

   <?php echo (isset($layout_carousel) && ($layout_carousel !== '')?$layout_carousel:""); ?>

<!-- 主体内容区域 -->
<div class="wrapper">
	<!-- 固定大小 -->
	<div class="container">
	    <div class="row">
	        <!-- 栏目区域 -->
	        <div class="col-sm-3 col-md-6 col-lg-4 col-xl-2 p-0">
		        
	        </div>
	        <!-- 内容区域 -->
	        <div class="col-sm-9 col-md-6 col-lg-8 col-xl-10 pr-0">
	                
	        </div>
	    </div>
	</div>    
</div>
<!-- 底部区域 -->
 <footer>
    
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
	<div class="container">
	  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarfootercontent" aria-controls="navbarfootercontent" aria-expanded="false" aria-label="Toggle navigation">
	    <span class="navbar-toggler-icon"></span>
	  </button>
	  <div class="collapse navbar-collapse" id="navbarfootercontent">
	    <ul class="navbar-nav mr-auto">
	      <?php if(is_array($layout_footernavlist) || $layout_footernavlist instanceof \think\Collection || $layout_footernavlist instanceof \think\Paginator): $i = 0; $__LIST__ = $layout_footernavlist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
	      <li class="nav-item">
	        <a class="nav-link" href="<?php echo $vo['type']; ?>_<?php echo $vo['nickname']; ?>" title="<?php echo $vo['name']; ?>"><?php echo $vo['name']; ?></a>
	      </li>
	      <?php endforeach; endif; else: echo "" ;endif; ?>
	    </ul>
	  </div>
	</div>
</nav>	
<div class="container">
	<div class="text-center">
	<?php echo $site['beian']; ?>
    <?php echo $site['cdnurl']; ?>
    </div>
</div>


 </footer>
</body>
</html>
