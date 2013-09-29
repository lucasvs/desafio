
<div id="page-container" class="row-fluid">

	<div id="sidebar" class="span3">
		
		<div class="actions">
			
			<ul class="nav nav-list bs-docs-sidenav">			
						<li><?php echo $this->Html->link(__('Edit Photo'), array('action' => 'edit', $photo['Photo']['id']), array('class' => '')); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Photo'), array('action' => 'delete', $photo['Photo']['id']), array('class' => ''), __('Are you sure you want to delete # %s?', $photo['Photo']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Photos'), array('action' => 'index'), array('class' => '')); ?> </li>
		<li><?php echo $this->Html->link(__('New Photo'), array('action' => 'add'), array('class' => '')); ?> </li>
				
			</ul><!-- .nav nav-list bs-docs-sidenav -->
			
		</div><!-- .actions -->
		
	</div><!-- #sidebar .span3 -->
	
	<div id="page-content" class="span9">
		
		<div class="photos view">

			<h2><?php  echo __('Photo'); ?></h2>

			<table class="table table-striped table-bordered">
				<tr>		<td><strong><?php echo __('Id'); ?></strong></td>
		<td>
			<?php echo h($photo['Photo']['id']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Nome'); ?></strong></td>
		<td>
			<?php echo h($photo['Photo']['nome']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Photo'); ?></strong></td>
		<td>
			<?php echo h($photo['Photo']['photo']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Thumbnail'); ?></strong></td>
		<td>
			<?php echo h($photo['Photo']['thumbnail']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Ordem'); ?></strong></td>
		<td>
			<?php echo h($photo['Photo']['ordem']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Concurso Id'); ?></strong></td>
		<td>
			<?php echo h($photo['Photo']['concurso_id']); ?>
			&nbsp;
		</td>
</tr>			</table><!-- .table table-striped table-bordered -->
			
		</div><!-- .view -->

			
	</div><!-- #page-content .span9 -->

</div><!-- #page-container .row-fluid -->
