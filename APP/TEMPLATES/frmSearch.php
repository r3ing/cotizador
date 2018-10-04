<form id="formSearchDateSuc" name="formSearchDateSuc" onSubmit="return submitForm();" class="form-horizontal" autocomplete="off">
    <div class="col-md-4">
        <div class="form-group">
            <label>Fecha Inicio <span class="required"> * </span></label>
            <div class="input-group">
                <div class="input-group" data-date-format="dd-mm-yyyy">
                    <input type="text" class="form-control" name="dateIni" id="dateIni" required>
                        <span class="input-group-btn">
                            <button class="btn default" type="button">
                                <i class="fa fa-calendar"></i>
                            </button>
                        </span>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            <label>Fecha Término <span class="required"> * </span></label>
            <div class="input-group">
                <div class="input-group" data-date-format="dd-mm-yyyy">
                    <input type="text" class="form-control" name="dateFin" id="dateFin" required>
                    <span class="input-group-btn">
                        <button class="btn default" type="button">
                            <i class="fa fa-calendar"></i>
                        </button>
                    </span>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            <label>Tienda <span class="required"> * </span></label>
            <div class="input-group">
                <select name="sucursal" id="sucursal" class="form-control" required>
                    <?php
                    include('../../MASTER/config/conect.php');
                    $SQL="SELECT * FROM RIPLEY.sucursales";
                    if ($vari[11] != 0) {
                        $SQL = $SQL." WHERE cod_sucursal =".$vari[11];
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
            </div>
        </div>
    </div>
    <div class="col-md-1">
        <div class="form-group">
            <label></label>
            <div class="input-group">
                <button name="guardar" id="guardar" class="btn purple-intense"> Buscar </button>
            </div>
        </div>
    </div>
</form>
