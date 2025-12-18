const frm = document.querySelector('#frmBalance');
const desde = document.querySelector('#desde');
const hasta = document.querySelector('#hasta');

const totalVentas = document.querySelector('#totalVentas');
const totalCompras = document.querySelector('#totalCompras');
const totalMermas = document.querySelector('#totalMermas');
const balanceTotal = document.querySelector('#balanceTotal');
const valorInventario = document.querySelector('#valorInventario');

document.addEventListener('DOMContentLoaded', function() {
    // Set default dates to current month
    const date = new Date();
    const firstDay = new Date(date.getFullYear(), date.getMonth(), 1);
    const lastDay = new Date(date.getFullYear(), date.getMonth() + 1, 0);

    desde.valueAsDate = firstDay;
    hasta.valueAsDate = lastDay;

    getBalance();

    frm.onsubmit = function(e) {
        e.preventDefault();
        getBalance();
    }
});

function getBalance() {
    const formData = new FormData(frm);
    axios.post(ruta + 'controllers/reportesController.php?option=balance', formData)
        .then(function(response) {
            const info = response.data;
            
            // Format formatter
            const formatter = new Intl.NumberFormat('es-MX', {
                style: 'currency',
                currency: 'MXN',
                minimumFractionDigits: 2
            });

            totalVentas.textContent = formatter.format(info.ventas);
            totalCompras.textContent = formatter.format(info.compras);
            totalMermas.textContent = formatter.format(info.mermas);
            valorInventario.textContent = formatter.format(info.inventario);

            const balance = parseFloat(info.ventas) - parseFloat(info.compras);
            balanceTotal.textContent = formatter.format(balance);

            if (balance < 0) {
                balanceTotal.classList.add('text-danger');
                balanceTotal.classList.remove('text-gray-800');
                balanceTotal.classList.remove('text-success');
            } else {
                balanceTotal.classList.add('text-success');
                balanceTotal.classList.remove('text-gray-800');
                balanceTotal.classList.remove('text-danger');
            }

        })
        .catch(function(error) {
            console.log(error);
        });
}
