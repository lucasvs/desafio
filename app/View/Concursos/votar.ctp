<div id="page-container" class="row-fluid">



    <div id="page-content" class="span9">

        <div class="concursos form">

            <?php echo $this->Form->create('Poll', array('inputDefaults' => array('label' => false), 'class' => 'form form-horizontal')); ?>
            <fieldset>
                <h2>Vote</h2>
                <h5><i>Insira o RA para efetuar a votação!</i></h5>

                <div class="control-group">
                    <?php echo $this->Form->label('ra', 'Ra', array('class' => 'control-label')); ?>
                    <div class="controls">
                        <?php echo $this->Form->input('ra', array('class' => 'span12 form-control')); ?>
                    </div>
                    <!-- .controls -->
                </div>
                <!-- .control-group -->

                

            </fieldset>
            <?php echo $this->Form->submit('Votar', array('class' => 'btn btn-large btn-primary')); ?>
            <?php echo $this->Form->end(); ?>

        </div>

    </div>
    <!-- #page-content .span9 -->

</div><!-- #page-container .row-fluid -->
