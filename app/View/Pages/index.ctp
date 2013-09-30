<div class="row">
    <div class="col-12">
        <?php echo $this->Session->flash() ?>
        <h2>Concursos em andamento. Participe!</h2>
        <hr>
    </div>

    <div>
        <ol>
            <?php
            foreach ($concursos as $row){
            if (isset($row['titulo'])){
            ?>

            <li>
                <h4><?= $row['titulo']; ?>
                    <div class="pull-right">
                        <?= $this->Html->link(
                                $this->Html->tag('button',
                                    $this->Html->tag('span',null,array('class'=>'glyphicon glyphicon-thumbs-up')).' Participar',
                                    array('class'=>'btn btn-info')),
                            array('controller' => 'photos', 'action' => 'add', $row['id']),
                            array('escape'=>false)); ?>
                </h4>
    </div>
    </li>

    <?php
    }
    }
    ?>
    </ol>
</div>


</div>
