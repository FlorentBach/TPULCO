<?php /* Smarty version Smarty-3.1.15, created on 2014-01-27 14:36:36
         compiled from "Smarty\tpl\_article.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1376452e61a92745081-72021588%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f2035c4defc77e6027c082cfc2ecd8de6a0362c9' => 
    array (
      0 => 'Smarty\\tpl\\_article.tpl',
      1 => 1390829795,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1376452e61a92745081-72021588',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.15',
  'unifunc' => 'content_52e61a92844079_78411574',
  'variables' => 
  array (
    'articles' => 0,
    'connexion_info' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_52e61a92844079_78411574')) {function content_52e61a92844079_78411574($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include 'C:\\Program Files (x86)\\EasyPHP-DevServer-14.1VC9\\data\\localweb\\TP_PHP_BLOG\\Smarty\\libs\\plugins\\modifier.date_format.php';
?><h4 class="panel-title">
	<?php echo nl2br(htmlspecialchars($_smarty_tpl->tpl_vars['articles']->value['titre'], ENT_QUOTES, 'UTF-8', true));?>

</h4>

<i>Le : <?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['articles']->value['date'],'d/m/y');?>
</i><br />
<br/>

<?php if ($_smarty_tpl->tpl_vars['articles']->value['image']) {?>
       
	<a href="http://127.0.0.1/TP_PHP_BLOG<?php echo $_smarty_tpl->tpl_vars['articles']->value['image'];?>
" ><img src="http://127.0.0.1/TP_PHP_BLOG<?php echo $_smarty_tpl->tpl_vars['articles']->value['image'];?>
" height="75" width="150" /></a>
	</br>
<?php }?>

<div class="panel-body">
	<p><?php echo nl2br(htmlspecialchars($_smarty_tpl->tpl_vars['articles']->value['texte'], ENT_QUOTES, 'UTF-8', true));?>
</p>
</div>
<div>
Tag : <a  href="index.php?tag=<?php echo $_smarty_tpl->tpl_vars['articles']->value['tag'];?>
" > <?php echo $_smarty_tpl->tpl_vars['articles']->value['tag'];?>
 </a>
</div>

<hr>

<?php if ($_smarty_tpl->tpl_vars['connexion_info']->value==true) {?>
<div align="right">
	<a class="btn btn-success" href="article.php?id=<?php echo $_smarty_tpl->tpl_vars['articles']->value['id'];?>
">Editer</a>
&nbsp; &nbsp;
	<a class="btn btn-danger" href="supprimer_article.php?id=<?php echo $_smarty_tpl->tpl_vars['articles']->value['id'];?>
">Supprimer</a><br />
</div>
<?php }?><?php }} ?>
