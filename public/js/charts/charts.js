<script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
<!-- Icons -->
<script src="https://unpkg.com/feather-icons/dist/feather.min.js"></script>
<script>
  feather.replace()
</script>

<!-- Graphs -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js"></script>
<script>
var ctx = document.getElementById("myChart");
var myChart = new Chart(ctx, {
type: 'line',
data: {
  labels: ["VOĆE", "POVRĆE", "BILJE I GJLIVE", "MLEČNI PROIZVODI", "MESARA", "ZDRAVA HRANA", "DOMAĆI PROIZVODI"],
  datasets: [{
    data: [135, 76, 120, 210, 89, 72, 12],
    lineTension: 0,
    backgroundColor: 'transparent',
    borderColor: '#007bff',
    borderWidth: 4,
    pointBackgroundColor: '#007bff'
  }]
},
options: {
  scales: {
    yAxes: [{
      ticks: {
        beginAtZero: false
      }
    }]
  },
  legend: {
    display: false,
  }
}
});