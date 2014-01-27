<h2>Derniers Articles :</h2>
<hr>
<div class="panel panel-primary" >
	{foreach $tab_articles as $articles}
		{include file='_article.tpl'}
	{/foreach}
</div>

<div class="pagination pagination-large pagination-centered">
	<ul>
		{if $page neq 1}
			<li>
				<a href="index.php?p={$page2}">Précédent</a>
			</li>
		{else}
			<li>
				<a class="active">Précédent</a>
			</li>
		{/if}

		{for $i=1 to $numpagemax}
			{if $page eq $i}
				<li>
					<a class="active" href="index.php?p={$i}"><b>{$i}</b></a>
				</li>
			{else}
				<li>
					<a href="index.php?p={$i}">{$i}</a>
				</li>
			{/if}
		{/for}
	
		{if $page neq $numpagemax}
			<li>
				<a href="index.php?p={$page3}">Suivant</a>
			</li>
		{else}
			<li>
				<a class="active">Suivant</a>
			</li>
		{/if}
	</ul>
</div>