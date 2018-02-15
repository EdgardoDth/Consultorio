<?php
include_once 'app/Conexion.inc.php';
include_once 'app/RepositorioUsuario.inc.php';
$titulo = "Blog de tareas";
include_once 'plantilla/documento_declaracion.inc.php';
include_once 'plantilla/navbar.inc.php';
?>
<div class="container">
    <div class="row">
        <div class="col-md-4">
            <form class="" action="index.html" method="post">
                <div class="form-group">
                    <label for="nombre">Nombre del medico</label>
                    <input type="text" name="nombre" id="nombre" value=""
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
                        Centro de Salud
                    </label>
                    <select class="form-control" id="centro-de-salud">
                        <option>
                        <?php
                            $sql = 'SELECT * FROM Centro';
                            $conexion = Conexion::obtenerConexion();
                            echo "error";
                            if(isset($conexion)) {
                                try {
                                    $sqlQuery = $conexion->prepare($sql);
                                    $sqlQuery->execute();
                                    $resultado = $sqlQuery->fetchAll();

                                } catch (PDOException $ex) {
                                    print "ERROR: ".$ex->getMessage();
                                }
                            }
                                # code...
                        ?>
                        </option>
                    </select>
                    <span>
                        <?php
                        echo $resultado['idCentro'];
                        ?>
                    </span>
                </div>
                <div class="form-group">
                    <label for="pass">Contrasena</label>
                    <input type="password" name="pass" id="pass" value=""
                    placeholder="Crear un password"
                    class="form-control">
                </div>
                <div class="form-group">
                    <label for="pass">Repita su contrasena</label>
                    <input type="password" name="pass" id="pass2" value=""
                    placeholder="Crear un password"
                    class="form-control">
                    <button type="submit" name="button"
                    class="btn btn-default btn-primary"> Login</button>
                </div>
            </form>
        </div>
    </div>
</div>
<?php
include_once 'plantilla/documento_cierre.inc.php';
?>
