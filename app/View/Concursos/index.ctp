
<h2><?php echo __('Concursos'); ?></h2>
<div id="page-container" class="row-fluid">

    <div id="sidebar" class="span3 col-lg-2">

        <div class="actions">

            <ul class="nav nav-list bs-docs-sidenav">
                <li><?php echo $this->Html->link(__('Novo Concurso'), array('action' => 'add'), array('class' => '')); ?></li>
                <li><?php echo $this->Html->link(__('Lista de Fotos'), array('controller' => 'photos', 'action' => 'index'), array('class' => '')); ?></li>
            </ul>
            <!-- .nav nav-list bs-docs-sidenav -->

        </div>
        <!-- .actions -->

    </div>
    <!-- #sidebar .span3 -->

    <div id="page-content" class="span9 col-lg-10">

        <div class="concursos index">


            <table cellpadding="0" cellspacing="0" class="table table-striped table-bordered">
                <tr>
                    <th><?php echo $this->Paginator->sort('id'); ?></th>
                    <th><?php echo $this->Paginator->sort('titulo'); ?></th>
                    <th><?php echo $this->Paginator->sort('inicio'); ?></th>
                    <th><?php echo $this->Paginator->sort('fim'); ?></th>
                    <th class="actions">Ações</th>
                </tr>
                <?php
              
                foreach ($concursos as $concurso): ?>
                    <tr>
                        <td><?php echo h($concurso['Concurso']['id']); ?>&nbsp;</td>
                        <td><?php echo h($concurso['Concurso']['titulo']); ?>&nbsp;</td>
                        <td><?php echo h($concurso['Concurso']['inicio']); ?>&nbsp;</td>
                        <td><?php echo h($concurso['Concurso']['fim']); ?>&nbsp;</td>
                        <td class="actions">
                            <?php echo $this->Html->link(__('Visualizar'), array('action' => 'view', $concurso['Concurso']['id']), array('class' => 'btn btn-mini')); ?>
                            <?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $concurso['Concurso']['id']), array('class' => 'btn btn-mini')); ?>
                            <?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $concurso['Concurso']['id']), array('class' => 'btn btn-mini'), __('Are you sure you want to delete # %s?', $concurso['Concurso']['id'])); ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </table>

            <p>
                <small>
                    <?php
                    echo $this->Paginator->counter(array(
                        'format' => __('Página {:page} de {:pages}, mostrando {:current} registros de {:count} total, começando em  {:start}, terminando em {:end}')
                    ));
                    ?>            </small>
            </p>

            <div class="pagination">
                <ul class="pagination">
                    <?php
                    echo $this->Paginator->prev('< ' . __('Anterior'), array('tag' => 'li'), null, array('class' => 'disabled', 'tag' => 'li', 'disabledTag' => 'a'));
                    echo $this->Paginator->numbers(array('separator' => '', 'currentTag' => 'a', 'tag' => 'li', 'currentClass' => 'disabled'));
                    echo $this->Paginator->next(__('Próximo') . ' >', array('tag' => 'li'), null, array('class' => 'disabled', 'tag' => 'li', 'disabledTag' => 'a'));
                    ?>
                </ul>
            </div>
            <!-- .pagination -->

        </div>
        <!-- .index -->

    </div>
    <!-- #page-content .span9 -->

</div><!-- #page-container .row-fluid -->
