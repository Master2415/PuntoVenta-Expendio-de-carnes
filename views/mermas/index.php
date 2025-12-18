<form id="frmMermas" autocomplete="off">
    <div class="card mb-2">
        <div class="card-body">
            <div class="row">
                <div class="col-md-4">
                    <label for="id_producto">Producto <span class="text-danger">*</span></label>
                    <select class="form-control" id="id_producto" name="id_producto">
                        <option value="">Seleccionar Producto</option>
                        <?php
                        require_once 'models/productos.php';
                        $proModel = new Productos();
                        $productos = $proModel->getProducts();
                        foreach ($productos as $pro) {
                            echo "<option value='{$pro['codproducto']}'>{$pro['descripcion']} ({$pro['existencia']})</option>";
                        }
                        ?>
                    </select>
                </div>
                <div class="col-md-2">
                    <label for="cantidad">Cantidad (Kg) <span class="text-danger">*</span></label>
                    <input type="number" step="0.001" class="form-control" id="cantidad" name="cantidad"
                        placeholder="0.000">
                </div>
                <div class="col-md-4">
                    <label for="motivo">Motivo de la Merma <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" id="motivo" name="motivo"
                        placeholder="Ej: Recorte, Descompuesto...">
                </div>
                <div class="col-md-2">
                    <label>&nbsp;</label>
                    <button type="submit" class="btn btn-primary btn-block" id="btn-save">Guardar Merma</button>
                </div>
            </div>
        </div>
    </div>
</form>

<div class="card">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-striped table-hover" style="width: 100%;" id="table_mermas">
                <thead>
                    <tr>
                        <th scope="col">Fecha</th>
                        <th scope="col">Producto</th>
                        <th scope="col">Cantidad</th>
                        <th scope="col">Motivo</th>
                        <th scope="col">Usuario</th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>
    </div>
</div>