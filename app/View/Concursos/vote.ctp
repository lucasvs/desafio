<style>
    .votos-porc{ color:#008ab8; font-weight:bold; }
</style>

<div class="container">
    <div class="row">
        <h2>Concursos, vote!</h2>
    </div>
</div>


<div class="list-group">
    <?php


    foreach ($concursos as $row) {
 
        ?>
        <div class="panel panel-info">
        <div class="panel-heading">
            <h4><?= $row['titulo'].', este concurso finaliza em '.$row['fim']; ?><h4>
        </div>

        <div class="panel-body">
            <?php
            foreach ($row['photos'] as $row1) {
              
  
                ?>
                <div class="row">
                    <div class="col-lg-3"><a href="<?php echo $this->params->webroot.$row1['photo'] ?>">
<img src="<?php echo $this->params->webroot.$row1['thumbnail'] ?>" alt="<?php echo $row1['nome'] ?>" title="<?php echo $row1['nome'] ?>" width="218px" height="163px"></a>
                    </div>
                    <div class="col-lg-7">
                        <div class="progress">
                            <div class="progress-bar progress-bar-success" role="progressbar" style="width:<?= $row1['votos_porc']; ?>%">
                            </div>
                        </div>
                    </div>
                     <?=
                        $this->Html->link(
                            $this->Html->tag('button',
                                $this->Html->tag('span', null, array('class' => 'glyphicon glyphicon-thumbs-up')) . ' Votar',
                                array('class' => 'btn btn-success')),
                            array('controller' => 'Concursos', 'action' => 'votar', $row['id'].'-'.$row1['id']),
                            array('escape' => false)); ?>
                </div>
                
                <hr>
            <?php  } ?>
            <div class=" "><?=$this->Html->link('ver todos os participantes',array('controller'=>'Concursos','action'=>'vote',$row['id']));?></div>
        </div>
            </div>

    <?php } ?>

</div>

 