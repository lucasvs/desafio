
<div id="page-container" class="row-fluid">

	<div id="sidebar" class="span3 col-lg-3">
		
		<div class="actions">
		
			<ul class="nav nav-list bs-docs-sidenav">
				<li><?php echo $this->Html->link(__('Nova Foto'), array('action' => 'add'), array('class' => '')); ?></li>						<li><?php echo $this->Html->link(__('List Concursos'), array('controller' => 'concursos', 'action' => 'index'), array('class' => '')); ?></li>
		<li><?php echo $this->Html->link(__('Novo Concurso'), array('controller' => 'concursos', 'action' => 'add'), array('class' => '')); ?></li>
			</ul><!-- .nav nav-list bs-docs-sidenav -->
			
		</div><!-- .actions -->
		
	</div><!-- #sidebar .span3 -->
	
	<div id="page-content" class="span9 col-lg-9">

		<div class="photos index">
		
			<h2><?php echo __('Fotos'); ?></h2>
			
			<table cellpadding="0" cellspacing="0" class="table table-striped table-bordered">
				<tr>
											<th><?php echo $this->Paginator->sort('id'); ?></th>
											<th><?php echo $this->Paginator->sort('nome'); ?></th>
											<th><?php echo $this->Paginator->sort('photo'); ?></th>
											<th><?php echo $this->Paginator->sort('thumbnail'); ?></th>
											<th><?php echo $this->Paginator->sort('ordem'); ?></th>
											<th><?php echo $this->Paginator->sort('concurso_id'); ?></th>
											<th class="actions"><?php echo __('Ações'); ?></th>
				</tr>
				<?php
				foreach ($photos as $photo): ?>
	<tr>
		<td><?php echo h($photo['Photo']['id']); ?>&nbsp;</td>
		<td><?php echo h($photo['Photo']['nome']); ?>&nbsp;</td>
		<td><?php echo h($photo['Photo']['photo']); ?>&nbsp;</td>
		<td><?php echo h($photo['Photo']['thumbnail']); ?>&nbsp;</td>
		<td><?php echo h($photo['Photo']['ordem']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($photo['Concurso']['id'], array('controller' => 'concursos', 'action' => 'view', $photo['Concurso']['id'])); ?>
		</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $photo['Photo']['id']), array('class' => 'btn btn-mini')); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $photo['Photo']['id']), array('class' => 'btn btn-mini')); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $photo['Photo']['id']), array('class' => 'btn btn-mini'), __('Are you sure you want to delete # %s?', $photo['Photo']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
			</table>
			
			<p><small>
				<?php
				echo $this->Paginator->counter(array(
				'format' => __('Página {:page} de {:pages}, mostrando {:current} registros de {:count} total, começando em {:start}, terminando em {:end}')
				));
				?>			</small></p>

			<div class="pagination">
				<ul class="pagination">
					<?php
		echo $this->Paginator->prev('< ' . __('Anterior'), array('tag' => 'li'), null, array('class' => 'disabled', 'tag' => 'li', 'disabledTag' => 'a'));
		echo $this->Paginator->numbers(array('separator' => '', 'currentTag' => 'a', 'tag' => 'li', 'currentClass' => 'disabled'));
		echo $this->Paginator->next(__('Próximo') . ' >', array('tag' => 'li'), null, array('class' => 'disabled', 'tag' => 'li', 'disabledTag' => 'a'));
	?>
				</ul>
			</div><!-- .pagination -->
			
		</div><!-- .index -->
	
	</div><!-- #page-content .span9 -->

</div><!-- #page-container .row-fluid -->
