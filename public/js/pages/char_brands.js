/*
 *  Document   : be_comp_charts.js
 *  Author     : pixelcave
 *  Description: Custom JS code used in Charts Page
 */

// Full Calendar, for more examples you can check out http://fullcalendar.io/
class pageCompChartsBrands {
  /*
  * Chart.js Charts, for more examples you can check out http://www.chartjs.org/docs
  *
  */
  static initChartsChartJSBrands() {
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
    let chartLinesCon = document.getElementById('js-chartjs-linesx');
    let chartBarsCon = document.getElementById('js-chartjs-bars-brands');



    // Set Chart and Chart Data variables
    let chartLines, chartBars, chartRadar, chartPolar, chartPie, chartDonut;
    let chartLinesBarsRadarData, chartPolarPieDonutData;

    // Lines/Bar/Radar Chart Data
    chartLinesBarsRadarData = {
      labels: namesBrands,
      datasets: [
        {
          label: 'Brands',
          fill: true,
          backgroundColor: 'rgba(171, 227, 125, .5)',
          borderColor: 'rgba(171, 227, 125, 1)',
          pointBackgroundColor: 'rgba(171, 227, 125, 1)',
          pointBorderColor: '#fff',
          pointHoverBackgroundColor: '#fff',
          pointHoverBorderColor: 'rgba(171, 227, 125, 1)',
          data: quantityBrands
        }
      ]
    };

    // Polar/Pie/Donut Data
    chartPolarPieDonutData = {
      labels: [
        'Earnings',
        'Sales',
        'Tickets'
      ],
      datasets: [{
        data: [
          48,
          26,
          26
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

    // Init Charts
    if (chartLinesCon !== null) {
      chartLines = new Chart(chartLinesCon, { type: 'line', data: chartLinesBarsRadarData, options: { tension: .4 } },);
    }

    if (chartBarsCon !== null) {
      chartBars = new Chart(chartBarsCon, { type: 'bar', data: chartLinesBarsRadarData });
    }

  }


  /*
  * Init functionality
  *
  */
  static init() {
    this.initChartsChartJSBrands();
  }
}

// Initialize when page loads
One.onLoad(pageCompChartsBrands.init());
