<!-- <select name="sucursal" id="sucursal" class="bs-select form-control" data-live-search="true" data-size="8" required>-->
<select name="sucursal" id="sucursal" class="form-control" data-live-search="true" data-size="8" required>
    <?php
    include('../../MASTER/config/conect.php');
    $SQL="SELECT * FROM RIPLEY.sucursales WHERE PAIS = 'CL'";
    if ($vari[11] != 0) {
        $SQL = $SQL." AND cod_sucursal =".$vari[11];
    }
    else {
        echo '<option value="">-- Seleccione --</option>';
    }
    $conect_vertica->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
    $CONS = $conect_vertica->prepare($SQL);
    $CONS->execute();
    while ($row = $CONS->fetch()) {
        ?>
        <option value="<?php echo $row[0]; ?>"><?php echo utf8_encode($row[1]); ?></option>
        <?php
    }
    if ($vari[7] == 3)
    {
        ?>
        <option value="00000">Todas</option>
        <?php
    }
    ?>
</select>