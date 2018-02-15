<?php
$titulo = "Blog de tareas";
Conexion::abrirConexion();
$conexion = Conexion::obtenerConexion();
$sql = 'SELECT * FROM Centro';
if(isset($conexion)) {
    try {
        $sqlQuery = $conexion->prepare($sql);
        $sqlQuery->execute();
        $resultado = $sqlQuery->fetchAll();
        $sql = 'SELECT * FROM Area';
        $sqlQuery = $conexion->prepare($sql);
        $sqlQuery->execute();
        $area = $sqlQuery->fetchAll();
    } catch (PDOException $ex) {
        print "ERROR: ".$ex->getMessage();
    }
} else {
    echo "fallo conexion";
}

?>
<div class="form-group">
    <label for="nombre">Nombre del medico</label>
    <input type="text" name="nombre" value=""
        placeholder="Ingresa el nombre del medico"
        class="form-control">
</div>
<div class="form-group">
    <label for="nombre">Apellido Paterno del medico</label>
    <input type="text" name="nombre2" id="nombre" value=""
        placeholder="Ingresa el nombre del medico"
        class="form-control">
</div>
<div class="form-group">
    <label for="nombre">Apellido Materno del medico</label>
    <input type="text" name="nombre3" id="nombre" value=""
        placeholder="Ingresa el nombre del medico"
        class="form-control">
</div>
<div class="form-group">
    <label for="numero-cedula">Numero de cedula</label>
    <input type="numero-cedula" name="numero-cedula"
        id="numero-cedula" value=""
        placeholder="Ingresa el numero de cedula"
        class="form-control">
</div>
<div class="form-group">
    <label for="centro-de-salud">
        Centro de Salud 1
    </label>
    <select class="form-control" name="centro-de-salud">
        <?php
            $i =1;
            foreach ($resultado as $row) {
                extract($row);
                echo "<OPTION VALUE=".(string)$i.">".$row['nombreCen']."\n</OPTION> ";
                $i++;
            }
         ?>
    </select>
</div>
<div class="form-group">
    <label for="area-trabajo">
        Area de Trabajo
    </label>
    <select class="form-control" name="area-trabajo">
        <?php
        $i =1;
        foreach ($area as $row) {
            extract($row);
            echo "<OPTION VALUE=".(string)$i.">".$row['nombreAre']."\n</OPTION> ";
            $i++;
        }
         ?>
    </select>
<div class="form-group">
    <label for="pass">Contrasena</label>
    <input type="password" name="pass" id="pass" value=""
        placeholder="Crear un password"
        class="form-control">
</div>
<div class="form-group">
    <label for="pass">Repita su contrasena</label>
    <input type="password" name="pass2" id="pass2" value=""
        placeholder="Crear un password"
        class="form-control">
    <button type="submit" name="enviar"
    class="btn btn-default btn-primary"> Guardar</button>
    <a href="index.php" class="btn btn-danger btn-default" role="button" aria-pressed="true">Link</a>

</div>
