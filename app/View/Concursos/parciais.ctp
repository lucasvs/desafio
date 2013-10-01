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
                <div class="">
                    <div class="col-lg-3"><?= $row1['nome']; ?></div>
                    <div class="col-lg-7">
                        <div class="progress">
                            <div class="progress-bar progress-bar-success" role="progressbar" style="width:<?= $row1['votos_porc']; ?>%">
                            </div>
                        </div>
                    </div>
                    <div class="votos-porc"><?= $row1['votos_porc']; ?>%</div>
                </div>
                <hr>
            <?php } ?>
            <div class=" "><?=$this->Html->link('ver todos os participantes',array('controller'=>'Concursos','action'=>'votar',$row['id']));?></div>
        </div>
            </div>

    <?php } ?>

</div>
