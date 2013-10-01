<div id="page-container" class="container">

    <div id="sidebar" class="span3 col-lg-3">

        <div class="actions">

            <ul class="nav nav-list bs-docs-sidenav">
                <li><?php echo $this->Form->postLink(__('Deletar'), array('action' => 'delete', $this->Form->value('Concurso.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('Concurso.id'))); ?></li>
                <li><?php echo $this->Html->link(__('Lista de Concursos'), array('action' => 'index')); ?></li>
            </ul>
            <!-- .nav nav-list bs-docs-sidenav -->

        </div>
        <!-- .actions -->

    </div>
    <!-- #sidebar .span3 -->

    <div id="page-content" class="span9 col-lg-7">

        <div class="concursos form">

            <?php echo $this->Form->create('Concurso', array('inputDefaults' => array('label' => false), 'class' => 'form form-horizontal')); ?>
            <fieldset>
                <h2><?php echo __('Editar Concurso'); ?></h2>

                <div class="control-group">
                    <?php echo $this->Form->label('id', 'id', array('class' => 'control-label')); ?>
                    <div class="controls">
                        <?php echo $this->Form->input('id', array('class' => 'span12')); ?>
                    </div>
                    <!-- .controls -->
                </div>
                <!-- .control-group -->

                <div class="control-group">
                    <?php echo $this->Form->label('titulo', 'titulo', array('class' => 'control-label')); ?>
                    <div class="controls">
                        <?php echo $this->Form->input('titulo', array('class' => 'span12')); ?>
                    </div>
                    <!-- .controls -->
                </div>

                <div class="control-group">
                    <?php echo $this->Form->label('descricao', 'Descrição', array('class' => 'control-label')); ?>
                    <div class="controls">
                        <?php echo $this->Form->textarea('descricao', array('class' => 'span12')); ?>
                    </div>
                    <!-- .controls -->
                </div>
                <!-- .control-group -->

                <div class="control-group">
                    <?php echo $this->Form->label('inicio', 'inicio', array('class' => 'control-label')); ?>
                    <div class="controls">
                        <?php echo $this->Form->input('inicio', array('class' => 'span12')); ?>
                    </div>
                    <!-- .controls -->
                </div>
                <!-- .control-group -->

                <div class="control-group">
                    <?php echo $this->Form->label('fim', 'fim', array('class' => 'control-label')); ?>
                    <div class="controls">
                        <?php echo $this->Form->input('fim', array('class' => 'span12')); ?>
                    </div>
                    <!-- .controls -->
                </div>
                <!-- .control-group -->

            </fieldset>
            <?php echo $this->Form->submit('Submit', array('class' => 'btn btn-large btn-primary')); ?>
            <?php echo $this->Form->end(); ?>

        </div>

    </div>
    <!-- #page-content .span9 -->

</div><!-- #page-container .row-fluid -->
