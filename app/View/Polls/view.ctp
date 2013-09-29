
<div id="page-container" class="row-fluid">

	<div id="sidebar" class="span3">
		
		<div class="actions">
			
			<ul class="nav nav-list bs-docs-sidenav">			
						<li><?php echo $this->Html->link(__('Edit Poll'), array('action' => 'edit', $poll['Poll']['id']), array('class' => '')); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Poll'), array('action' => 'delete', $poll['Poll']['id']), array('class' => ''), __('Are you sure you want to delete # %s?', $poll['Poll']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Polls'), array('action' => 'index'), array('class' => '')); ?> </li>
		<li><?php echo $this->Html->link(__('New Poll'), array('action' => 'add'), array('class' => '')); ?> </li>
		<li><?php echo $this->Html->link(__('List Photos'), array('controller' => 'photos', 'action' => 'index'), array('class' => '')); ?> </li>
		<li><?php echo $this->Html->link(__('New Photo'), array('controller' => 'photos', 'action' => 'add'), array('class' => '')); ?> </li>
				
			</ul><!-- .nav nav-list bs-docs-sidenav -->
			
		</div><!-- .actions -->
		
	</div><!-- #sidebar .span3 -->
	
	<div id="page-content" class="span9">
		
		<div class="polls view">

			<h2><?php  echo __('Poll'); ?></h2>

			<table class="table table-striped table-bordered">
				<tr>		<td><strong><?php echo __('Id'); ?></strong></td>
		<td>
			<?php echo h($poll['Poll']['id']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Photo'); ?></strong></td>
		<td>
			<?php echo $this->Html->link($poll['Photo']['id'], array('controller' => 'photos', 'action' => 'view', $poll['Photo']['id']), array('class' => '')); ?>
			&nbsp;
		</td>
</tr>			</table><!-- .table table-striped table-bordered -->
			
		</div><!-- .view -->

			
	</div><!-- #page-content .span9 -->

</div><!-- #page-container .row-fluid -->
