
<div id="page-container" class="row-fluid">

	<div id="sidebar" class="span3">
		
		<div class="actions">
		
			<ul class="nav nav-list bs-docs-sidenav">
										<li><?php echo $this->Html->link(__('List Photos'), array('action' => 'index')); ?></li>
							</ul><!-- .nav nav-list bs-docs-sidenav -->
		
		</div><!-- .actions -->
		
	</div><!-- #sidebar .span3 -->
	
	<div id="page-content" class="span9">

		<div class="photos form">
		
			<?php echo $this->Form->create('Photo', array('inputDefaults' => array('label' => false), 'class' => 'form form-horizontal')); ?>
				<fieldset>
					<h2><?php echo __('Add Photo'); ?></h2>
			<div class="control-group">
	<?php echo $this->Form->label('nome', 'nome', array('class' => 'control-label'));?>
	<div class="controls">
		<?php echo $this->Form->input('nome', array('class' => 'span12')); ?>
	</div><!-- .controls -->
</div><!-- .control-group -->

<div class="control-group">
	<?php echo $this->Form->label('photo', 'photo', array('class' => 'control-label'));?>
	<div class="controls">
		<?php echo $this->Form->input('photo', array('class' => 'span12')); ?>
	</div><!-- .controls -->
</div><!-- .control-group -->

<div class="control-group">
	<?php echo $this->Form->label('thumbnail', 'thumbnail', array('class' => 'control-label'));?>
	<div class="controls">
		<?php echo $this->Form->input('thumbnail', array('class' => 'span12')); ?>
	</div><!-- .controls -->
</div><!-- .control-group -->

<div class="control-group">
	<?php echo $this->Form->label('ordem', 'ordem', array('class' => 'control-label'));?>
	<div class="controls">
		<?php echo $this->Form->input('ordem', array('class' => 'span12')); ?>
	</div><!-- .controls -->
</div><!-- .control-group -->

<div class="control-group">
	<?php echo $this->Form->label('concurso_id', 'concurso_id', array('class' => 'control-label'));?>
	<div class="controls">
		<?php echo $this->Form->input('concurso_id', array('class' => 'span12')); ?>
	</div><!-- .controls -->
</div><!-- .control-group -->

				</fieldset>
			<?php echo $this->Form->submit('Submit', array('class' => 'btn btn-large btn-primary')); ?>
<?php echo $this->Form->end(); ?>
			
		</div>
			
	</div><!-- #page-content .span9 -->

</div><!-- #page-container .row-fluid -->
