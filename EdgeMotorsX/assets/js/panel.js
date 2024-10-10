// SIDEBAR TOGGLE

let sidebarOpen = false;
const sidebar = document.getElementById('sidebar');

function openSidebar() {
  if (!sidebarOpen) {
    sidebar.classList.add('sidebar-responsive');
    sidebarOpen = true;
  }
}

function closeSidebar() {
  if (sidebarOpen) {
    sidebar.classList.remove('sidebar-responsive');
    sidebarOpen = false;
  }
}

// ---------- CHARTS ----------

// Gráfico de Barras (Top 5 Products)
var ctxBar = document.getElementById('barChart').getContext('2d');
var barChart = new Chart(ctxBar, {
    type: 'bar',
    data: {
        labels: ['Laptop', 'Phone', 'Monitor', 'Headphones', 'Camera'],
        datasets: [{
            label: 'Products',
            data: [10, 8, 6, 4, 2],
            backgroundColor: ['#2962ff', '#d50000', '#2e7d32', '#ff6d00', '#583cb3'],
            borderWidth: 1,
            borderRadius: 4,
        }]
    },
    options: {
        responsive: true,
        plugins: {
            legend: {
                display: true,
                position: 'top',
                labels: {
                    color: 'black'
                }
            },
            tooltip: {
                enabled: true,
                backgroundColor: '#333',
                intersect: false,
                shared: true
            }
        },
        scales: {
            x: {
                beginAtZero: true,
                grid: {
                    color: '#55596e'
                },
                ticks: {
                    color: 'black'
                }
            },
            y: {
                beginAtZero: true,
                grid: {
                    color: '#55596e'
                },
                ticks: {
                    color: 'black'
                }
            }
        }
    }
});

// Gráfico de Área (Purchase and Sales Orders)
var ctxArea = document.getElementById('areaChart').getContext('2d');
var areaChart = new Chart(ctxArea, {
    type: 'line',
    data: {
        labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul'],
        datasets: [{
            label: 'Purchase Orders',
            data: [31, 40, 28, 51, 42, 109, 100],
            fill: true,
            backgroundColor: 'rgba(0, 171, 87, 0.2)',
            borderColor: '#00ab57',
            pointBackgroundColor: '#1b2635',
            pointBorderColor: '#1b2635',
            pointBorderWidth: 3,
            tension: 0.4
        },
        {
            label: 'Sales Orders',
            data: [11, 32, 45, 32, 34, 52, 41],
            fill: true,
            backgroundColor: 'rgba(213, 0, 0, 0.2)',
            borderColor: '#d50000',
            pointBackgroundColor: '#1b2635',
            pointBorderColor: '#1b2635',
            pointBorderWidth: 3,
            tension: 0.4
        }]
    },
    options: {
        responsive: true,
        plugins: {
            legend: {
                display: true,
                position: 'top',
                labels: {
                    color: 'black'
                }
            },
            tooltip: {
                enabled: true,
                backgroundColor: '#333',
                intersect: false,
                shared: true
            }
        },
        scales: {
            x: {
                beginAtZero: true,
                grid: {
                    color: '#55596e'
                },
                ticks: {
                    color: 'black'
                }
            },
            y: {
                beginAtZero: true,
                grid: {
                    color: '#55596e'
                },
                ticks: {
                    color: 'black'
                }
            }
        }
    }
});

