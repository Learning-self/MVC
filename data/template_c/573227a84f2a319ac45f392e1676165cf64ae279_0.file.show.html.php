<?php
/* Smarty version 3.1.30, created on 2017-05-06 17:25:04
  from "E:\workspace\MVC\tpl\index\show.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_590d96707fb1d3_66339697',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '573227a84f2a319ac45f392e1676165cf64ae279' => 
    array (
      0 => 'E:\\workspace\\MVC\\tpl\\index\\show.html',
      1 => 1492262985,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:./header.html' => 1,
    'file:./sidebar.html' => 1,
    'file:./footer.html' => 1,
  ),
),false)) {
function content_590d96707fb1d3_66339697 (Smarty_Internal_Template $_smarty_tpl) {
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<title>文章发布系统</title>
<meta name="keywords" content="" />
<meta name="description" content="" />
<link href="css/default.css" rel="stylesheet" type="text/css" />
</head>
<body>
<?php $_smarty_tpl->_subTemplateRender("file:./header.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>


<!-- start page -->
<div id="page">
	<!-- start content -->
	<div id="content">
		<div class="post">
			<h1 class="title"><!--文章标题放置到这里--><?php echo $_smarty_tpl->tpl_vars['data']->value['title'];?>
<span style="color:#ccc;font-size:14px;">　　作者：<!--作者放置到这里--><?php echo $_smarty_tpl->tpl_vars['data']->value['author'];?>
</span></h1>
			<div class="entry">
				<!--文章内容放置到这里-->
				<?php echo $_smarty_tpl->tpl_vars['data']->value['content'];?>

			</div>
		</div>
	</div>
	<!-- end content -->
	<?php $_smarty_tpl->_subTemplateRender("file:./sidebar.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

	<div style="clear: both;">&nbsp;</div>
</div>
<!-- end page -->
<?php $_smarty_tpl->_subTemplateRender("file:./footer.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

</body>
</html><?php }
}
