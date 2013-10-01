<div id="page-container" class="container">

    <div id="sidebar" class="span3 col-lg-3">

        <div class="actions">

            <ul class="nav nav-list bs-docs-sidenav">
                <li><?php echo $this->Html->link(__('Editar Concurso'), array('action' => 'edit', $concurso['Concurso']['id']), array('class' => '')); ?> </li>
                <li><?php echo $this->Form->postLink(__('Deletar Concurso'), array('action' => 'delete', $concurso['Concurso']['id']), array('class' => ''), __('Are you sure you want to delete # %s?', $concurso['Concurso']['id'])); ?> </li>
                <li><?php echo $this->Html->link(__('Lista de Concursos'), array('action' => 'index'), array('class' => '')); ?> </li>
                <li><?php echo $this->Html->link(__('Novo Concurso'), array('action' => 'add'), array('class' => '')); ?> </li>

            </ul>
            <!-- .nav nav-list bs-docs-sidenav -->

        </div>
        <!-- .actions -->

    </div>
    <!-- #sidebar .span3 -->

    <div id="page-content" class="span9 col-lg-7">

        <div class="concursos view">

            <h2><?php echo __('Concurso'); ?></h2>

            <table class="table table-striped table-bordered">
                <tr>
                    <td><strong><?php echo __('Id'); ?></strong></td>
                    <td>
                        <?php echo h($concurso['Concurso']['id']); ?>
                        &nbsp;
                    </td>
                </tr>
                <tr>
                    <td><strong><?php echo __('Titulo'); ?></strong></td>
                    <td>
                        <?php echo h($concurso['Concurso']['titulo']); ?>
                        &nbsp;
                    </td>
                </tr>
                <tr>
                    <td><strong><?php echo __('Descrição'); ?></strong></td>
                    <td>
                        <?php echo h($concurso['Concurso']['descricao']); ?>
                        &nbsp;
                    </td>
                </tr>
                <tr>
                    <td><strong><?php echo __('Inicio'); ?></strong></td>
                    <td>
                        <?php echo h($concurso['Concurso']['inicio']); ?>
                        &nbsp;
                    </td>
                </tr>
                <tr>
                    <td><strong><?php echo __('Fim'); ?></strong></td>
                    <td>
                        <?php echo h($concurso['Concurso']['fim']); ?>
                        &nbsp;
                    </td>
                </tr>
            </table>
            <!-- .table table-striped table-bordered -->

        </div>
        <!-- .view -->


        <div class="related">

            <h3><?php echo __('Fotos no concurso'); ?></h3>

            <?php if (!empty($concurso['Photo'])): ?>

                <table class="table table-striped table-bordered">
                    <tr>
                        <th><?php echo __('Id'); ?></th>
                        <th><?php echo __('Nome'); ?></th>
                        <th><?php echo __('Foto'); ?></th>
                        <th class="actions"><?php echo __('Ações'); ?></th>
                    </tr>
                    <?php
                    $i = 0;
                    foreach ($concurso['Photo'] as $photo): ?>
                        <tr>
                            <td><?php echo $photo['id']; ?></td>
                            <td><?php echo $photo['nome']; ?></td>
                            <td><?php echo $this->Html->image($this->params->webroot.$photo['photo']); ?></td>
                            <td class="actions">
                                <?php echo $this->Html->link(__('Ver'), array('controller' => 'photos', 'action' => 'view', $photo['id']), array('class' => 'btn btn-mini')); ?>
                                <?php echo $this->Html->link(__('Editar'), array('controller' => 'photos', 'action' => 'edit', $photo['id']), array('class' => 'btn btn-mini')); ?>
                                <?php echo $this->Form->postLink(__('Deletar'), array('controller' => 'photos', 'action' => 'delete', $photo['id']), array('class' => 'btn btn-mini'), __('Are you sure you want to delete # %s?', $photo['id'])); ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </table><!-- .table table-striped table-bordered -->

            <?php endif; ?>


            <div class="actions">
                <?php echo $this->Html->link('<i class="icon-plus icon-white"></i> ' . __('New Photo'), array('controller' => 'photos', 'action' => 'add'), array('class' => 'btn btn-primary', 'escape' => false)); ?>                </div>
            <!-- .actions -->

        </div>
        <!-- .related -->


    </div>
    <!-- #page-content .span9 -->

</div><!-- #page-container .row-fluid -->
