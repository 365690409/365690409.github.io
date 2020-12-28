<?php if (!defined('THINK_PATH')) exit(); /*a:7:{s:73:"D:\phpstudy_pro\WWW\weba\public/../application/index\view\route\list.html";i:1608391581;s:64:"D:\phpstudy_pro\WWW\weba\application\index\view\public\base.html";i:1608455375;s:64:"D:\phpstudy_pro\WWW\weba\application\index\view\public\meta.html";i:1608386891;s:66:"D:\phpstudy_pro\WWW\weba\application\index\view\public\header.html";i:1608522844;s:71:"D:\phpstudy_pro\WWW\weba\application\index\view\public\wrapperleft.html";i:1608520702;s:70:"D:\phpstudy_pro\WWW\weba\application\index\view\public\breadcrumb.html";i:1608439613;s:66:"D:\phpstudy_pro\WWW\weba\application\index\view\public\footer.html";i:1608522228;}*/ ?>
<!doctype html>
<html>
<head>
<title><?php echo $selfclass['name']; ?>-<?php echo $site['name']; ?></title>
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

<!-- 主体内容区域 -->
<div class="wrapper">
	<!-- 固定大小 -->
	<div class="container">
	    <div class="row">
	        <!-- 栏目区域 -->
	        <div class="col-sm-3 col-md-6 col-lg-4 col-xl-2 p-0">
		        
    <div class="card border-white">
   <div class="card-header"><h3><?php echo $menutitle; ?></h3></div>
   <div class="card-body p-0">
   	   <div class="list-group">
   	   	   <?php if(is_array($menulist) || $menulist instanceof \think\Collection || $menulist instanceof \think\Paginator): $i = 0; $__LIST__ = $menulist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
   	   	   <a href="/<?php echo $selfclass['type']; ?>_<?php echo $vo['nickname']; ?>" title="<?php echo $vo['name']; ?>" class="list-group-item list-group-item-action border-left-0 border-right-0 <?php echo $vo['id']; ?>"><?php echo $vo['name']; ?></a>
   	   	   <?php endforeach; endif; else: echo "" ;endif; ?>
   	   </div>
   </div>
</div>
<div class="p-2"></div>



	        </div>
	        <!-- 内容区域 -->
	        <div class="col-sm-9 col-md-6 col-lg-8 col-xl-10 pr-0">
	            
    <nav aria-label="breadcrumb ">
  <ol class="breadcrumb alert-primary">
    <?php if($breadcrumbtitle): ?><li class="breadcrumb-item"><span><?php echo $breadcrumbtitle; ?></span></li><?php endif; if(is_array($breadcrumball) || $breadcrumball instanceof \think\Collection || $breadcrumball instanceof \think\Paginator): $i = 0; $__LIST__ = $breadcrumball;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;if($vo['id']): ?> 
    <li class="breadcrumb-item"><a href="<?php echo $vo['type']; ?>_<?php echo $vo['nickname']; ?>" title="<?php echo $vo['name']; ?>"><?php echo $vo['name']; ?></a></li>
    <?php else: ?>
    <li class="breadcrumb-item active" aria-current="page"><?php echo $vo['name']; ?></li>
    <?php endif; endforeach; endif; else: echo "" ;endif; ?>
  </ol>
</nav>
  <div class="container-fluid">
    <ul class="list-unstyled">
      <?php if(is_array($list) || $list instanceof \think\Collection || $list instanceof \think\Paginator): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$data): $mod = ($i % 2 );++$i;?>
      <li class="media position-relative">
        <?php if(!empty($data['img'])): ?><img src="..." class="mr-3" alt="..."><?php endif; ?>
        <div class="media-body">
        <h5 class="mt-0"><?php echo $data['name']; ?></h5>
        <p><?php echo $data['keywords']; ?></p>
        <p><textarea class="form-control" disabled><?php echo $data['description']; ?></textarea></p>
        <a href="<?php echo $url; ?><?php echo $data['id']; ?>" class="btn btn-primary stretched-link">查看</a>
        </div>
      </li>
      <?php endforeach; endif; else: echo "" ;endif; ?>
    </ul>
    <?php echo $page; ?>
  </div> 
    
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
