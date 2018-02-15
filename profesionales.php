<?php
include_once 'app/Conexion.inc.php';
$titulo = "Lista de Medicos";
Conexion::abrirConexion();
$conexion = Conexion::obtenerConexion();
$sql = "SELECT * FROM ((Medico INNER JOIN Area ON Medico.idAreaMed= Area.idArea)
        INNER JOIN Centro ON Medico.idCentroMed=Centro.idCentro)";

if(isset($conexion)) {
        try {
            $sentencia = $conexion->prepare($sql);
            $sentencia->execute();
            $medico = $sentencia->fetchAll();
        } catch (PDOException $ex) {
            print("ERROR: ".$ex->getMessage());
        }
}
Conexion::cerrarConexion();
include_once 'plantilla/documento_declaracion.inc.php';
include_once 'plantilla/navbar.inc.php';
?>
<div class="container">
    <div class="row">
        <div class="col-md-4">
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-heading" id="heading">
                            <span class="glyphicon glyphicon-search" aria-hidden="true"></span> Busqueda
                        </div>
                        <div class="panel-body">
                            <div class="form-group">
                                <input type="search" class="form-control" placeholder="Que estas buscando?">
                            </div>
                            <button class="form-control">Buscar</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-heading" id="heading">
                            <span class="glyphicon glyphicon-filter" aria-hidden="true"></span> Filtro
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
                            <span class="glyphicon glyphicon-time" aria-hidden="true"></span> Archivo
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
                    <span class="glyphicon glyphicon-time" aria-hidden="true"></span> Ultimas entradas
                </div>
                <div class="panel-body">
                    <table class="table table-striped">
                        <thead>
                          <tr>
                            <th>Cedula</th>
                            <th>Nombre</th>
                            <th>Centro</th>
                            <th>Area de Trabajo</th>
                          </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($medico as $row) {
                                extract($row);
                                echo "<TR>"
                                        ."<TD>".$row['idMedico']."</TD>"
                                        ."<TD>".$row['nombreMed']." ".$row['apellidoPMed']." ".$row['apellidoMMed']."</TD>"
                                        ."<TD>".$row['nombreCen']."</TD>"
                                        ."<TD>".$row['nombreAre']."</TD>"
                                        ."</TR>";
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
include_once 'plantilla/documento_cierre.inc.php';
?>
