<?php require_once 'includes/cabecera.php';?>
<?php 
    $entrada= conseguirEntrada($db, $_GET['id']);
    if (!isset($entrada['id'])) {
        header("Location:index.php");
    }
?>
<?php require_once 'includes/lateral.php';?>
    <!-- Caja principal---> 
    <div id="principal">
       
        <h1> <?= $entrada['titulo']?></h1>
        <a href="categoria.php?id=<?=$entrada['categoria_id']?>">
        <h2> <?= $entrada['categoria']?></h2>
        </a>
        <h4> <?= $entrada['fecha']?> | <?=$entrada['usuario'];?></h4>
        <p>
            <?= $entrada['descripcion'];?>
        </p>
        <?php 
            if(isset($_SESSION['usuario'])&&$_SESSION['usuario']['id']==$entrada['usuario_id']):?>
                <a href="editar-entrada.php?id=<?=$entrada['id']?>" class="boton boton-verde">Editar entrada</a>
                <a href="borrar-entrada.php?id=<?=$entrada['id']?>" class="boton">Eliminar entrada </a>
        <?php endif;?>
    </div>
<?php require_once 'includes/pie.php';?>






