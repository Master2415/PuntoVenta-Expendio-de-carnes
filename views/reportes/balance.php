<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Reportes Financieros (Balance)</h1>
</div>

<!-- Filtros de Fecha -->
<div class="card mb-4">
    <div class="card-body">
        <form class="form-inline" id="frmBalance">
            <div class="form-group mb-2">
                <label for="desde" class="sr-only">Desde</label>
                <input type="date" class="form-control" id="desde" name="desde">
            </div>
            <div class="form-group mx-sm-3 mb-2">
                <label for="hasta" class="sr-only">Hasta</label>
                <input type="date" class="form-control" id="hasta" name="hasta">
            </div>
            <button type="submit" class="btn btn-primary mb-2">Filtrar</button>
        </form>
    </div>
</div>

<div class="row">
    <!-- Ventas Totales -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-success shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                            Ventas Totales</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800" id="totalVentas">$0.00</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Compras Totales -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-warning shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                            Compras Totales</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800" id="totalCompras">$0.00</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-shopping-cart fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Mermas -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-danger shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">
                            Pérdidas (Mermas)</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800" id="totalMermas">$0.00</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-trash-alt fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Balance / Utilidad Estimada -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-info shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                            Balance (Ventas - Compras)</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800" id="balanceTotal">$0.00</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-balance-scale fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-xl-6 col-md-12 mb-4">
        <div class="card shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-secondary text-uppercase mb-1">
                            Valor del Inventario Actual (Precio Venta)</div>
                        <div class="h3 mb-0 font-weight-bold text-gray-800" id="valorInventario">$0.00</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-boxes fa-2x text-gray-300"></i>
                    </div>
                </div>
                <hr>
                <small class="text-muted">Calculado como la suma de (Existencia * Precio de Venta) de todos los
                    productos activos.</small>
            </div>
        </div>
    </div>
</div>