
<div id="page-container" class="container">

	<div id="sidebar" class="span3 col-lg-3">
		
		<div class="actions">
			
			<ul class="nav nav-list bs-docs-sidenav">			
						<li><?php echo $this->Html->link(__('Editar RA'), array('action' => 'edit', $ra['Ra']['id']), array('class' => '')); ?> </li>
		<li><?php echo $this->Form->postLink(__('Deletar RA'), array('action' => 'delete', $ra['Ra']['id']), array('class' => ''), __('Are you sure you want to delete # %s?', $ra['Ra']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Lista de RAs'), array('action' => 'index'), array('class' => '')); ?> </li>
		<li><?php echo $this->Html->link(__('Novo RA'), array('action' => 'add'), array('class' => '')); ?> </li>
				
			</ul><!-- .nav nav-list bs-docs-sidenav -->
			
		</div><!-- .actions -->
		
	</div><!-- #sidebar .span3 -->
	
	<div id="page-content" class="span9 col-lg-7">
		
		<div class="ras view">

			<h2><?php  echo __('RA'); ?></h2>

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


			
	</div><!-- #page-content .span9 -->

</div><!-- #page-container .row-fluid -->
