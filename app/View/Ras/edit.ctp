<div id="page-container" class="container">

    <div id="sidebar" class="span3 col-lg-3">

        <div class="actions">

            <ul class="nav nav-list bs-docs-sidenav">
                <li><?php echo $this->Form->postLink(__('Deletar'), array('action' => 'delete', $this->Form->value('Ra.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('Ra.id'))); ?></li>
                <li><?php echo $this->Html->link(__('Lista de RAs'), array('action' => 'index')); ?></li>
            </ul>
            <!-- .nav nav-list bs-docs-sidenav -->

        </div>
        <!-- .actions -->

    </div>
    <!-- #sidebar .span3 -->

    <div id="page-content" class="span9 col-lg-7">

        <div class="ras form">

            <?php echo $this->Form->create('Ra', array('inputDefaults' => array('label' => false), 'class' => 'form form-horizontal')); ?>
            <fieldset>
                <h2><?php echo __('Editar Ra'); ?></h2>

                <div class="control-group">
                    <?php echo $this->Form->label('id', 'id', array('class' => 'control-label')); ?>
                    <div class="controls">
                        <?php echo $this->Form->input('id', array('class' => 'span12')); ?>
                    </div>
                    <!-- .controls -->
                </div>
                <!-- .control-group -->

                <div class="control-group">
                    <?php echo $this->Form->label('ra', 'ra', array('class' => 'control-label')); ?>
                    <div class="controls">
                        <?php echo $this->Form->input('ra', array('class' => 'span12')); ?>
                    </div>
                    <!-- .controls -->
                </div>
                <!-- .control-group -->

            </fieldset>
            <?php echo $this->Form->submit('Alterar', array('class' => 'btn btn-large btn-primary')); ?>
            <?php echo $this->Form->end(); ?>

        </div>

    </div>
    <!-- #page-content .span9 -->

</div><!-- #page-container .row-fluid -->
