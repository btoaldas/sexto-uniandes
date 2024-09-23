let inventoryChartInstance;
let categoryChartInstance;

// Cargar los datos del dashboard
fetch('../proyecto-integrador/php/dashboard-data.php')
    .then(response => response.json())
    .then(data => {
        // Destruir gráficos anteriores si existen
        if (inventoryChartInstance) {
            inventoryChartInstance.destroy();
        }
        if (categoryChartInstance) {
            categoryChartInstance.destroy();
        }

        // Crear el gráfico de pie para la distribución del inventario
        var ctx = document.getElementById('inventoryChart').getContext('2d');
        inventoryChartInstance = new Chart(ctx, {
            type: 'pie',
            data: {
                labels: ['Pasturas', 'Ordeño', 'Riego', 'Cercado'],
                datasets: [{
                    label: 'Distribución del Inventario',
                    data: [data.total_pasturas, data.total_ordeño, data.total_riego, data.total_cercado],
                    backgroundColor: ['#ff6384', '#36a2eb', '#cc65fe', '#ffce56']
                }]
            }
        });

        // Crear el gráfico de barras para el valor total del inventario
        var ctx2 = document.getElementById('categoryChart').getContext('2d');
        categoryChartInstance = new Chart(ctx2, {
            type: 'bar',
            data: {
                labels: ['Valor Total del Inventario'],
                datasets: [{
                    label: 'Valor en USD',
                    data: [data.total_inventory_value],
                    backgroundColor: '#36a2eb'
                }]
            }
        });

        // Filtro por categoría
        document.getElementById('categoryFilter').addEventListener('change', function() {
            let category = this.value;
            let filteredData;

            if (category === 'all') {
                filteredData = [data.total_pasturas, data.total_ordeño, data.total_riego, data.total_cercado];
            } else {
                filteredData = [data[`total_${category}`]];
            }

            // Destruir el gráfico antes de crear uno nuevo
            if (categoryChartInstance) {
                categoryChartInstance.destroy();
            }

            var ctxFiltered = document.getElementById('categoryChart').getContext('2d');
            categoryChartInstance = new Chart(ctxFiltered, {
                type: 'bar',
                data: {
                    labels: [category],
                    datasets: [{
                        label: `Total en ${category}`,
                        data: filteredData,
                        backgroundColor: '#ffce56'
                    }]
                }
            });
        });
    })
    .catch(error => console.error('Error al obtener los datos:', error));
