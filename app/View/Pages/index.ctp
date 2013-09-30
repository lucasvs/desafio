<div class="row">
    <div class="col-12">
        <?php echo $this->Session->flash() ?>
        <h2>Concursos em andamento. Participe!</h2>
        <hr>
    </div>

    <div>
        <ol>
        <?php
            foreach( $concursos as $row ){
                if( isset($row['titulo'] ) ){
                ?>

        <li>
            <h4><?=$row['titulo']; ?>
                <div class="pull-right">
            <span class="glyphicon glyphicon-thumbs-up"></span> <?=$this->Html->link('participar',array('controller'=>'photo','action'=>'add',$row['id'])); ?></h4>
            </div>
        </li>

        <?php
                }
            }
        ?>
            </ol>
    </div>




</div>
