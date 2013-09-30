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
        <div class="list-group-item active">
            <h4><?= $row['titulo'].', este concurso finaliza em '.$row['fim']; ?><h4>
        </div>

        <div class="list-group">
            <?php
            foreach ($row['photos'] as $row1) {
                ?>
                <div class="list-group-item row">
                    <div class="col-md-3"><?= $row1['nome']; ?></div>
                    <div class="col-lg-7">
                        <div class="progress">
                            <div class="progress-bar progress-bar-success" role="progressbar" style="width:<?= $row1['votos_porc']; ?>%">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-2 votos-porc"><?= $row1['votos_porc']; ?>%</div>
                </div>

            <?php } ?>
            <div class="list-group-item "><?=$this->Html->link('ver todos os participantes',array('controller'=>'Concursos','action'=>'votar',$row['id']));?></div>
        </div>

    <?php } ?>

</div>
