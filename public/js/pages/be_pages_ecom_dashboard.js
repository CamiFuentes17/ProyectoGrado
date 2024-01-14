/*
 *  Document   : be_pages_ecom_dashboard.js
 *  Author     : pixelcave
 *  Description: Custom JS code used in eCommerce Dashboard Page
 */
class pageEcomDashboard {
  /*
   * Chart.js, for more examples you can check out http://www.chartjs.org/docs
   *
   */
  static initOverviewChart() {
    // Set Global Chart.js configuration
    Chart.defaults.color = '#818d96';
    Chart.defaults.scale.grid.lineWidth = 0;
    Chart.defaults.scale.beginAtZero = true;
    Chart.defaults.elements.point.radius = 0;
    Chart.defaults.elements.point.hoverRadius = 0;
    Chart.defaults.plugins.tooltip.radius = 3;
    Chart.defaults.plugins.legend.labels.boxWidth = 12;

    // Get Chart Container
    let chartOverviewCon = document.getElementById('js-chartjs-overview');

    // Set Chart Variables
    let chartOverview, chartOverviewOptions, chartOverviewData;

    // Overview Chart Options
    chartOverviewOptions = {
      maintainAspectRatio: false,
      tension: .4,
      scales: {
          x: {
            grid: {
              drawBorder: false
            }
          },
          y: {
            grid: {
              drawBorder: false
            },
            suggestedMin: 0,
            //suggestedMax: 10
            suggestedMax: Math.max(dataChart) //Tomar el maximo valor de los datos para el eje y
          }
      },
      interaction: {
        intersect: false,
      },
      plugins: {
        tooltip: {
          callbacks: {
            label: function(context) {
              return ' $' + context.parsed.y;
            }
          }
        }
      }
    };

    // Overview Chart Data
    chartOverviewData = {
      labels: ['Pendientes', 'Progreso', 'Cerradas', 'Devueltas'],
      datasets: [
        {
          label: 'Resumen de solicitures',
          fill: true,
          backgroundColor: 'rgba(132, 94, 247, .3)',
          borderColor: 'transparent',
          pointBackgroundColor: 'rgba(132, 94, 247, 1)',
          pointBorderColor: '#fff',
          pointHoverBackgroundColor: '#fff',
          pointHoverBorderColor: 'rgba(132, 94, 247, 1)',
          //data: [3, 10, 20, 0]
          data: dataChart
        },
        // {
        //   label: 'Last Week',
        //   fill: true,
        //   backgroundColor: 'rgba(0, 0, 0, .15)',
        //   borderColor: 'transparent',
        //   pointBackgroundColor: 'rgba(0, 0, 0, .3)',
        //   pointBorderColor: '#fff',
        //   pointHoverBackgroundColor: '#fff',
        //   pointHoverBorderColor: 'rgba(0, 0, 0, .3)',
        //   data: [180, 360, 236, 320, 210, 295, 260]
        // }
      ]
    };

    // Init Overview Chart
    if (chartOverviewCon !== null) {
      chartOverview = new Chart(chartOverviewCon, {
        type: 'line',
        data: chartOverviewData,
        options: chartOverviewOptions
      });
    }
  }

  /*
   * Init functionality
   *
   */
  static init() {
    this.initOverviewChart();
  }
}

// Initialize when page loads
One.onLoad(pageEcomDashboard.init());
