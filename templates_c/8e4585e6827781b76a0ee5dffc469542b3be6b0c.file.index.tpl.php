<?php /* Smarty version Smarty-3.1.15, created on 2014-01-27 09:36:34
         compiled from "Smarty\tpl\index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1864752e61a92595e65-57199151%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '8e4585e6827781b76a0ee5dffc469542b3be6b0c' => 
    array (
      0 => 'Smarty\\tpl\\index.tpl',
      1 => 1387376265,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1864752e61a92595e65-57199151',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'tab_articles' => 0,
    'page' => 0,
    'page2' => 0,
    'numpagemax' => 0,
    'i' => 0,
    'page3' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.15',
  'unifunc' => 'content_52e61a92731f42_71791447',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_52e61a92731f42_71791447')) {function content_52e61a92731f42_71791447($_smarty_tpl) {?><h2>Derniers Articles :</h2>
<hr>
<div class="panel panel-primary" >
	<?php  $_smarty_tpl->tpl_vars['articles'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['articles']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['tab_articles']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['articles']->key => $_smarty_tpl->tpl_vars['articles']->value) {
$_smarty_tpl->tpl_vars['articles']->_loop = true;
?>
		<?php echo $_smarty_tpl->getSubTemplate ('_article.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

	<?php } ?>
</div>

<div class="pagination pagination-large pagination-centered">
	<ul>
		<?php if ($_smarty_tpl->tpl_vars['page']->value!=1) {?>
			<li>
				<a href="index.php?p=<?php echo $_smarty_tpl->tpl_vars['page2']->value;?>
">Précédent</a>
			</li>
		<?php } else { ?>
			<li>
				<a class="active">Précédent</a>
			</li>
		<?php }?>

		<?php $_smarty_tpl->tpl_vars['i'] = new Smarty_Variable;$_smarty_tpl->tpl_vars['i']->step = 1;$_smarty_tpl->tpl_vars['i']->total = (int) ceil(($_smarty_tpl->tpl_vars['i']->step > 0 ? $_smarty_tpl->tpl_vars['numpagemax']->value+1 - (1) : 1-($_smarty_tpl->tpl_vars['numpagemax']->value)+1)/abs($_smarty_tpl->tpl_vars['i']->step));
if ($_smarty_tpl->tpl_vars['i']->total > 0) {
for ($_smarty_tpl->tpl_vars['i']->value = 1, $_smarty_tpl->tpl_vars['i']->iteration = 1;$_smarty_tpl->tpl_vars['i']->iteration <= $_smarty_tpl->tpl_vars['i']->total;$_smarty_tpl->tpl_vars['i']->value += $_smarty_tpl->tpl_vars['i']->step, $_smarty_tpl->tpl_vars['i']->iteration++) {
$_smarty_tpl->tpl_vars['i']->first = $_smarty_tpl->tpl_vars['i']->iteration == 1;$_smarty_tpl->tpl_vars['i']->last = $_smarty_tpl->tpl_vars['i']->iteration == $_smarty_tpl->tpl_vars['i']->total;?>
			<?php if ($_smarty_tpl->tpl_vars['page']->value==$_smarty_tpl->tpl_vars['i']->value) {?>
				<li>
					<a class="active" href="index.php?p=<?php echo $_smarty_tpl->tpl_vars['i']->value;?>
"><b><?php echo $_smarty_tpl->tpl_vars['i']->value;?>
</b></a>
				</li>
			<?php } else { ?>
				<li>
					<a href="index.php?p=<?php echo $_smarty_tpl->tpl_vars['i']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['i']->value;?>
</a>
				</li>
			<?php }?>
		<?php }} ?>
	
		<?php if ($_smarty_tpl->tpl_vars['page']->value!=$_smarty_tpl->tpl_vars['numpagemax']->value) {?>
			<li>
				<a href="index.php?p=<?php echo $_smarty_tpl->tpl_vars['page3']->value;?>
">Suivant</a>
			</li>
		<?php } else { ?>
			<li>
				<a class="active">Suivant</a>
			</li>
		<?php }?>
	</ul>
</div><?php }} ?>
