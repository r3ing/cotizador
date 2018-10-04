<!-- <select name="sucursal" id="sucursal" class="bs-select form-control" data-live-search="true" data-size="8" required>-->
<select name="departamento" id="departamento" class="form-control" data-live-search="true" data-size="8">
    <?php
    include('../../MASTER/config/conect.php');
    $SQL="SELECT cod_depto codigo, depto descripcion FROM RIPLEY.departamentos ORDER BY 2";

    echo '<option value="D000">TODOS</option>';
    $conect_vertica->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
    $CONS = $conect_vertica->prepare($SQL);
    $CONS->execute();
    while ($row = $CONS->fetch()) {
        echo '<option value='.$row[0].'>'.$row[1].'</option>';
    }
    ?>
</select>