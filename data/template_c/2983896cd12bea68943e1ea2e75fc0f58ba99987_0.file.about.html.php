<?php
/* Smarty version 3.1.30, created on 2017-04-15 21:23:48
  from "C:\wamp64\www\MVC\tpl\index\about.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_58f21ee4284890_79540775',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '2983896cd12bea68943e1ea2e75fc0f58ba99987' => 
    array (
      0 => 'C:\\wamp64\\www\\MVC\\tpl\\index\\about.html',
      1 => 1492262625,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:./header.html' => 1,
    'file:./footer.html' => 1,
  ),
),false)) {
function content_58f21ee4284890_79540775 (Smarty_Internal_Template $_smarty_tpl) {
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
			<h1 class="title">关于我</h1>
			<div class="entry">
				<h3>代号：<?php echo $_smarty_tpl->tpl_vars['about']->value['name'];?>
</h3>
				<h3>手机：<a href="tel:18888888888"><?php echo $_smarty_tpl->tpl_vars['about']->value['Tel'];?>
</a></h3>
				<h3>邮箱：<a href="mailto:"><?php echo $_smarty_tpl->tpl_vars['about']->value['e_mail'];?>
</a></h3>
			</div>
			
		</div>
	
	</div>
	<!-- end content -->
	
	<div style="clear: both;">&nbsp;</div>
</div>
<!-- end page -->
<?php $_smarty_tpl->_subTemplateRender("file:./footer.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

</body>
</html><?php }
}
