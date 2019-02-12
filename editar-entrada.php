<?php require_once 'includes/redireccion.php';?>
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
        <h1>Editar entradas</h1>
        <p>
            Edita tu entrada <?=$entrada['titulo'];?>
        </p>
        <br>
        <form action="guardar-entrada.php?editar=<?=$entrada['id']?>" method="post">
            <label for="titulo">Titulo: </label>
            <input type="text" name="titulo" value="<?=$entrada['titulo'];?>"/>
            <?php echo isset($_SESSION['errores_entrada']) ? mostrarError($_SESSION['errores_entrada'], 'titulo'):''?>
            <label for="descripcion">Descripcion: </label>
            <textarea name="descripcion" ><?=$entrada['descripcion'];?></textarea>
            <?php echo isset($_SESSION['errores_entrada']) ? mostrarError($_SESSION['errores_entrada'], 'descripcion'):''?>
            <label for="categoria">Categoria: </label>
            <select name="categoria">
                <?php  $categorias= conseguirCategorias($db);
                    if(!empty($categorias)):
                    while($categoria= mysqli_fetch_assoc($categorias)):?>
                <option value="<?= $categoria['id']?>" <?=($categoria['id']==$entrada['categoria_id'])? 'selected="selected"':'' ?>>
                    <?= $categoria['nombre'];?>
                </option>
                <?php endwhile;
                      endif;
                ?>
            </select>
            <?php echo isset($_SESSION['errores_entrada']) ? mostrarError($_SESSION['errores_entrada'], 'categoria'):''?>
            <input type="submit" value="Guardar"/>
        </form>
        <?php borrarErrores()?>
    </div>
<?php require_once 'includes/pie.php';?>

