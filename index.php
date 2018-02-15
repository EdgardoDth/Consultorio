<?php
include_once 'app/Conexion.inc.php';
include_once 'app/RepositorioUsuario.inc.php';
$titulo = "Centro de Salud";
include_once 'plantilla/documento_declaracion.inc.php';
include_once 'plantilla/navbar.inc.php';
?>
<div class="container">
    <div class="jumbotron">
        <h2>Consultorio</h2>
        <p>
        </br>
            Proyecto baso de datos.
        </br>
        <?php
        $sql = 'SELECT * FROM Centro';
        $conexion = Conexion::obtenerConexion();
        if(isset($conexion)) {
            echo "error";
            try {
                $sqlQuery = $conexion->prepare($sql);
                $sqlQuery->execute();
                $resultado = $sqlQuery->fetchAll();

            } catch (PDOException $ex) {
                print "ERROR: ".$ex->getMessage();
            }
        }
         ?>
        </p>
        <p align="right">
        </p>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col-md-4">
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-heading" id="heading">
                            <span class="glyphicon glyphicon-search"
                            aria-hidden="true"></span> Busqueda de Profesional
                        </div>
                        <div class="panel-body">
                            <div class="form-group">
                                <input type="search" class="form-control"
                                placeholder="Que estas buscando?">
                            </div>
                            <button class="form-control">Buscar Profesional</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-heading" id="heading">
                            <span class="glyphicon glyphicon-filter"
                            aria-hidden="true"></span> Filtrar
                        </div>
                        <div class="panel-body">
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-heading" id="heading">
                            <span class="glyphicon glyphicon-time"
                            aria-hidden="true"></span> Archivo
                        </div>
                        <div class="panel-body">

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="panel panel-default">
                <div class="panel-heading" id="heading">
                    <span class="glyphicon glyphicon-time" aria-hidden="true">
                    </span> Actividad
                </div>
                <div class="panel-body">
                </div>
            </div>
        </div>
    </div>
</div>
<?php
include_once 'plantilla/documento_cierre.inc.php';
?>
