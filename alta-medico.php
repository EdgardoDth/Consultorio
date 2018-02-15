<?php
include_once 'app/Conexion.inc.php';
//include_once 'app/RepositorioUsuario.inc.php';
if(isset($_POST['enviar'])) {
    Conexion::abrirConexion();
    $conexion = Conexion::obtenerConexion();

    $nombre = $_POST['nombre'];
    $nombre2 = $_POST['nombre2'];
    $nombre3 = $_POST['nombre3'];
    $cedula = $_POST['numero-cedula'];
    $centro = $_POST['centro-de-salud'];
    $area = $_POST['area-trabajo'];
    $pass = $_POST['pass'];
    $pass2 = $_POST['pass2'];

    if(isset($conexion)) {
            try {
                $sql = "INSERT INTO Medico
                        VALUES(:idPaciente, :nombre, :nombre2,:nombre3,
                             NOW(), :centro, :area)";

                $sentencia = $conexion->prepare($sql);
                $sentencia->bindParam(':nombre', $nombre, PDO::PARAM_STR);
                $sentencia->bindParam(':nombre2', $nombre2, PDO::PARAM_STR);
                $sentencia->bindParam(':nombre3', $nombre3, PDO::PARAM_STR);
                $sentencia->bindParam(':idPaciente', $cedula, PDO::PARAM_STR);
                $sentencia->bindParam(':centro', intval($centro), PDO::PARAM_STR);
                $sentencia->bindParam(':area', intval($area), PDO::PARAM_STR);

                $usuario_insertado = $sentencia->execute();

            } catch (PDOException $ex) {
                print("ERROR: ".$ex->getMessage());
            }
    }
    Conexion::cerrarConexion();
}
include_once 'plantilla/documento_declaracion.inc.php';
include_once 'plantilla/navbar.inc.php';
?>
<div class="container">
    <div class="row">
        <div class="col-md-4">
            <form rol="form" method="post" action="<?php echo $_SERVER['PHP_SELF'] ?>">
                <?php
                if(isset($_POST['enviar'])) {
                        include_once 'plantilla/registro_validador.inc.php';
                        $_POST['enviar'] = null;
                    } else {
                        include_once 'plantilla/registro_vacio.inc.php';
                    }
                ?>
            </form>
        </div>
    </div>
</div>
<?php
include_once 'plantilla/documento_cierre.inc.php';
?>
