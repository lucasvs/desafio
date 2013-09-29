
<div id="page-container" class="row-fluid">

	<div id="sidebar" class="span3">
		
		<div class="actions">
			
			<ul class="nav nav-list bs-docs-sidenav">			
						<li><?php echo $this->Html->link(__('Edit Ra'), array('action' => 'edit', $ra['Ra']['id']), array('class' => '')); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Ra'), array('action' => 'delete', $ra['Ra']['id']), array('class' => ''), __('Are you sure you want to delete # %s?', $ra['Ra']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Ras'), array('action' => 'index'), array('class' => '')); ?> </li>
		<li><?php echo $this->Html->link(__('New Ra'), array('action' => 'add'), array('class' => '')); ?> </li>
		<li><?php echo $this->Html->link(__('List Polls'), array('controller' => 'polls', 'action' => 'index'), array('class' => '')); ?> </li>
		<li><?php echo $this->Html->link(__('New Poll'), array('controller' => 'polls', 'action' => 'add'), array('class' => '')); ?> </li>
				
			</ul><!-- .nav nav-list bs-docs-sidenav -->
			
		</div><!-- .actions -->
		
	</div><!-- #sidebar .span3 -->
	
	<div id="page-content" class="span9">
		
		<div class="ras view">

			<h2><?php  echo __('Ra'); ?></h2>

			<table class="table table-striped table-bordered">
				<tr>		<td><strong><?php echo __('Id'); ?></strong></td>
		<td>
			<?php echo h($ra['Ra']['id']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Ra'); ?></strong></td>
		<td>
			<?php echo h($ra['Ra']['ra']); ?>
			&nbsp;
		</td>
</tr>			</table><!-- .table table-striped table-bordered -->
			
		</div><!-- .view -->

					
			<div class="related">

				<h3><?php echo __('Related Polls'); ?></h3>
				
				<?php if (!empty($ra['Poll'])): ?>
				
					<table class="table table-striped table-bordered">
						<tr>
									<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Photo Id'); ?></th>
		<th><?php echo __('Ra Id'); ?></th>
							<th class="actions"><?php echo __('Actions'); ?></th>
						</tr>
							<?php
								$i = 0;
								foreach ($ra['Poll'] as $poll): ?>
		<tr>
			<td><?php echo $poll['id']; ?></td>
			<td><?php echo $poll['photo_id']; ?></td>
			<td><?php echo $poll['ra_id']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'polls', 'action' => 'view', $poll['id']), array('class' => 'btn btn-mini')); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'polls', 'action' => 'edit', $poll['id']), array('class' => 'btn btn-mini')); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'polls', 'action' => 'delete', $poll['id']), array('class' => 'btn btn-mini'), __('Are you sure you want to delete # %s?', $poll['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
					</table><!-- .table table-striped table-bordered -->
					
				<?php endif; ?>

				
				<div class="actions">
					<?php echo $this->Html->link('<i class="icon-plus icon-white"></i> '.__('New Poll'), array('controller' => 'polls', 'action' => 'add'), array('class' => 'btn btn-primary', 'escape' => false)); ?>				</div><!-- .actions -->
				
			</div><!-- .related -->

			
	</div><!-- #page-content .span9 -->

</div><!-- #page-container .row-fluid -->
