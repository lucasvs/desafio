<?php echo $this->element('breadcrumb',array('links' => array(
	array(
		'link' => '/gerenciador/photos',
		'label' => 'Fotos'
	),
	array(
		'label' => 'Adicionar fotos'
	)
))) ?>

<h2>Adicionar fotos </h2>
<hr>

<div class="row-fluid">
	<div class="span12">
		<?php  
		echo $this->Form->create
		(
			'Photo',
			array
			(
				'type' => 'file',
				'url' => array
				(
					
					'controller' 	=> 'photos',
					'action'	 	=> $this->params->action,
					!empty($this->params->pass[0]) ? $this->params->pass[0] : ''
				),
				'class'			=> 'well',
				'inputDefaults' => array
				(
					'label' => false,
					'error' => false
				)
			)
		); 
		echo $this->Form->input('photo', array('type'=> 'file'));
		?>
		 
		<hr>
		<?php  
		$options = array(
		    'label' => 'Fazer upload',
		    'class' => 'btn btn-primary'
		);
		echo $this->Form->end($options);
		?>

	</div>	
</div>