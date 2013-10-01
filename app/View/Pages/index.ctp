<?php
    App::uses('AppController','Controller');
?>
<div class="row">
    <div class="col-12">
        <?php echo $this->Session->flash() ?>
        <h2>Concursos em andamento. Participe!</h2>
        <hr>
    </div>

    <table>
        <thead>
            <th>Nome</th>
            <th>Término</th>
            <th class="pull-left">Ação</th>
        </thead>
            <?php
            if ($concursos!=0){
            foreach ($concursos as $row){
            if (isset($row['Concurso']['titulo'])){
            ?>

            <tr>
                <td class="col-lg-7"><h4><?= $row['Concurso']['titulo']; ?></h4></td>
                <td class="col-lg-3"><h5><?= AppController::parseDate($row['Concurso']['fim']); ?></h5></td>
                <td>
                        <?=
                        $this->Html->link(
                            $this->Html->tag('button',
                                $this->Html->tag('span', null, array('class' => 'glyphicon glyphicon-thumbs-up')) . ' Participar',
                                array('class' => 'btn btn-info')),
                            array('controller' => 'photos', 'action' => 'add', $row['Concurso']['id']),
                            array('escape' => false)); ?>
                </td>
            </tr>



    <?php
    }
    }
    } else
        echo 'Nenhum concurso encontrado!';

    ?>
    </table>
</div>


</div>
