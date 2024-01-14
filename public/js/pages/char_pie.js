/*
 *  Document   : be_comp_charts.js
 *  Author     : pixelcave
 *  Description: Custom JS code used in Charts Page
 */

// Full Calendar, for more examples you can check out http://fullcalendar.io/
class pageCompCharts1 {
  /*
  * Chart.js Charts, for more examples you can check out http://www.chartjs.org/docs
  *
  */
  static initChartsChartJS1() {
    // Set Global Chart.js configuration
    Chart.defaults.color = '#818d96';
    Chart.defaults.font.weight = '600';
    Chart.defaults.scale.grid.color = "rgba(0, 0, 0, .05)";
    Chart.defaults.scale.grid.zeroLineColor = "rgba(0, 0, 0, .1)";
    Chart.defaults.scale.beginAtZero = true;
    Chart.defaults.elements.line.borderWidth = 2;
    Chart.defaults.elements.point.radius = 4;
    Chart.defaults.elements.point.hoverRadius = 6;
    Chart.defaults.plugins.tooltip.radius = 3;
    Chart.defaults.plugins.legend.labels.boxWidth = 15;

    // Get Chart Containers
    let chartBarsCon = document.getElementById('js-chartjs-bars');
    let chartRadarCon = document.getElementById('js-chartjs-radar');
    let chartPolarCon = document.getElementById('js-chartjs-polar');
    let chartPieCon = document.getElementById('js-chartjs-pie1');
    let chartDonutCon = document.getElementById('js-chartjs-donut');

    // Set Chart and Chart Data variables
    let chartLines, chartBars, chartRadar, chartPolar, chartPie, chartDonut;
    let chartLinesBarsRadarData, chartPolarPieDonutData;


    // Polar/Pie/Donut Data
    chartPolarPieDonutData = {
      labels: [
        'Back',
        'Front',
        'Back-Front'
      ],
      datasets: [{
        data: [
          totalBack,
          totalfront,
          totalBF
        ],
        backgroundColor: [
          'rgba(171, 227, 125, 1)',
          'rgba(250, 219, 125, 1)',
          'rgba(117, 176, 235, 1)'
        ],
        hoverBackgroundColor: [
          'rgba(171, 227, 125, .75)',
          'rgba(250, 219, 125, .75)',
          'rgba(117, 176, 235, .75)'
        ]
      }]
    };


    if (chartBarsCon !== null) {
      chartBars = new Chart(chartBarsCon, { type: 'bar', data: chartLinesBarsRadarData });
    }

    if (chartRadarCon !== null) {
      chartRadar = new Chart(chartRadarCon, { type: 'radar', data: chartLinesBarsRadarData });
    }

    if (chartPolarCon !== null) {
      chartPolar = new Chart(chartPolarCon, { type: 'polarArea', data: chartPolarPieDonutData });
    }

    if (chartPieCon !== null) {
      chartPie = new Chart(chartPieCon, { type: 'pie', data: chartPolarPieDonutData });
    }

    if (chartDonutCon !== null) {
      chartDonut = new Chart(chartDonutCon, { type: 'doughnut', data: chartPolarPieDonutData });
    }
  }


  static init() {
    this.initChartsChartJS1();
  }
}

// Initialize when page loads
One.onLoad(pageCompCharts1.init());
