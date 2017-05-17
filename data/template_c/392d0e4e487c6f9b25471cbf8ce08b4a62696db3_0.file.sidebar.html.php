<?php
/* Smarty version 3.1.30, created on 2017-04-15 21:08:12
  from "C:\wamp64\www\MVC\tpl\index\sidebar.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_58f21b3c725e12_70748468',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '392d0e4e487c6f9b25471cbf8ce08b4a62696db3' => 
    array (
      0 => 'C:\\wamp64\\www\\MVC\\tpl\\index\\sidebar.html',
      1 => 1484114075,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_58f21b3c725e12_70748468 (Smarty_Internal_Template $_smarty_tpl) {
?>
<!-- start sidebar -->
	<div id="sidebar">
		<ul>
			<li id="search">
				<h2><b class="text1">Search</b></h2>
				<form method="post" action="index.php?controller=index&method=search">
					<fieldset>
					<input type="text" id="s" name="key" value=""  style="border:1px solid grey"/>
					<input type="submit" id="x" value="Search" />
					</fieldset>
				</form>
			</li>
		</ul>
	</div>
	<!-- end sidebar -->
<?php }
}
