@extends('layouts.main')
@section('title', 'Beranda')

@section('container')

<div class="container-fluid">

  <!-- Page Heading -->
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Dashboard Bulan {{$month}}</h1>
  </div>

  <div class="row">

    <div class=" col">
      <div class="card shadow mb-4">
        <div class="card-header py-3">
          <h6 class="m-0 font-weight-bold text-primary">Pilih Bulan</h6>
        </div>
        <div class="card-body">
          <form method="POST" action="{{"/beranda"}}">
            @csrf
            <div class="form-row align-items-center">
              <div class="col-auto my-1">
                <label class="mr-sm-4 sr-only" for="bulan">Pilih Bulan</label>
                <select class="custom-select mr-sm-4 @error('bulan') is-invalid @enderror" id="bulan" name="bulan">
                  <option value="">Pilih Bulan</option>
                  @foreach ($months as $bulan)
                  <option @if ($bulan->month == $month) selected @endif value="{{$bulan->month}}">{{$bulan->month}}
                  </option>
                  @endforeach
                </select>
                @error('bulan')<div class="invalid-feedback">{{$message}}</div>@enderror
              </div>
              <div class="col-auto my-1">
                <button type="submit" id="submit" name="submit" class="btn btn-primary">Submit</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>

  </div>


  <!-- Content Row -->

  <div class="row">

    <div class="col-xl-7 col-lg-7">
      <div class="card shadow mb-4">
        <div class="card-header py-3">
          <h6 class="m-0 font-weight-bold text-primary">Data Penjualan sales</h6>
        </div>
        <div class="card-body">
          <div class="chart-bar">
            <canvas id="barSales1"></canvas>
          </div>
        </div>
      </div>
    </div>

    <div class="col-xl-5 col-lg-5">
      <div class="card shadow mb-4">
        <div class="card-header py-3">
          <h6 class="m-0 font-weight-bold text-primary">Data Penjualan Branc</h6>
        </div>
        <div class="card-body">
          <div class="chart-bar">
            <canvas id="barBranc1"></canvas>
          </div>
        </div>
      </div>
    </div>

  </div>

  <div class="row">

    <div class="col-xl-5 col-lg-5">
      <div class="card shadow mb-4">
        <div class="card-header py-3">
          <h6 class="m-0 font-weight-bold text-primary">Data Penjualan Quantity</h6>
        </div>
        <div class="card-body">
          <div class="chart-bar">
            <canvas id="barQuantity"></canvas>
          </div>
        </div>
      </div>
    </div>

    <div class="col-xl-5 col-lg-5">
      <div class="card shadow mb-4">
        <div class="card-header py-3">
          <h6 class="m-0 font-weight-bold text-primary">Data Jumlah</h6>
        </div>
        <div class="card-body">
          <div class="chart-pie">
            <canvas id="grafikBuled"></canvas>
          </div>
          <hr>
          Data Jumlah Dalam % (Percent)
        </div>
      </div>
    </div>

  </div>



</div>
@endsection

@section('js')
<!-- Page level plugins -->
<script src="{{url("assets/chart.js/Chart.js")}}"></script>
<script src="{{url("assets/chart.js/Chart.min.js")}}"></script>
<script src="{{url("assets/chartjs-datalabels/chartjs-plugin-datalabels.min.js")}}"></script>

<!-- Page level custom scripts -->

<script>
  // Set new default font family and font color to mimic Bootstrap's default styling
Chart.defaults.global.defaultFontFamily = 'Nunito', '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
Chart.defaults.global.defaultFontColor = '#858796';


// Bar Chart sales1
var ctx = document.getElementById("barSales1");
var barSales = new Chart(ctx, {
  type: 'bar',
  data: {
    labels:{!!json_encode($sales1['label'])!!},
    datasets: [{
      label: {!!json_encode($sales1['type'][0])!!},
      backgroundColor: "blue",
      hoverBackgroundColor: "#2e59d9",
      borderColor: "blue",
      data: {!!json_encode($sales1['value']['additive'])!!},
    },{
      label: {!!json_encode($sales1['type'][1])!!},
      backgroundColor: "red",
      hoverBackgroundColor: "#2e59d9",
      borderColor: "red",
      data: {!!json_encode($sales1['value']['tronox'])!!},
    },{
      label: {!!json_encode($sales1['type'][2])!!},
      backgroundColor: "green",
      hoverBackgroundColor: "#2e59d9",
      borderColor: "green",
      data: {!!json_encode($sales1['value']['pigment'])!!},
    }],
  },
  options: {
    maintainAspectRatio: false,
    layout: {
      padding: {
        left: 10,
        right: 10,
        top: 10,
        bottom: 0
      }
    },
    scales: {
      xAxes: [{
        gridLines: {
          display: false,
          drawBorder: true
        },
        maxBarThickness: 40,
      }],
      yAxes: [{
        ticks: {
          min: 0,
          max: {!!json_encode($sales1['max'])!!},
          maxTicksLimit: 10,
          padding: 10,
        }
      }],
    },
    legend: {
      display: true
    },
    
  }
});

// Bar Chart branc1
var ctx = document.getElementById("barBranc1");
var barBranc = new Chart(ctx, {
  type: 'bar',
  data: {
    labels:{!!json_encode($branc1['label'])!!},
    datasets: [{
      label: {!!json_encode($branc1['type'][0])!!},
      backgroundColor: "blue",
      hoverBackgroundColor: "#2e59d9",
      borderColor: "blue",
      data: {!!json_encode($branc1['value']['additive'])!!},
    },{
      label: {!!json_encode($branc1['type'][1])!!},
      backgroundColor: "red",
      hoverBackgroundColor: "#2e59d9",
      borderColor: "red",
      data: {!!json_encode($branc1['value']['tronox'])!!},
    },{
      label: {!!json_encode($branc1['type'][2])!!},
      backgroundColor: "green",
      hoverBackgroundColor: "#2e59d9",
      borderColor: "green",
      data: {!!json_encode($branc1['value']['pigment'])!!},
    }],
  },
  options: {
    maintainAspectRatio: false,
    layout: {
      padding: {
        left: 10,
        right: 10,
        top: 10,
        bottom: 0
      }
    },
    scales: {
      xAxes: [{
        gridLines: {
          display: false,
          drawBorder: true
        },
        maxBarThickness: 40,
      }],
      yAxes: [{
        ticks: {
          min: 0,
          max: {!!json_encode($branc1['max'])!!},
          maxTicksLimit: 10,
          padding: 10,
        }
      }],
    },
    legend: {
      display: true
    },
    
  }
});

// Bar Chart branc1
var ctx = document.getElementById("barQuantity");
var barQuantity = new Chart(ctx, {
  type: 'bar',
  data: {
    labels:{!!json_encode($quantity['label'])!!},
    datasets: [{
      label: {!!json_encode($quantity['type'][0])!!},
      backgroundColor: "blue",
      hoverBackgroundColor: "#2e59d9",
      borderColor: "blue",
      data: {!!json_encode($quantity['value']['additive'])!!},
    },{
      label: {!!json_encode($quantity['type'][1])!!},
      backgroundColor: "red",
      hoverBackgroundColor: "#2e59d9",
      borderColor: "red",
      data: {!!json_encode($quantity['value']['tronox'])!!},
    },{
      label: {!!json_encode($quantity['type'][2])!!},
      backgroundColor: "green",
      hoverBackgroundColor: "#2e59d9",
      borderColor: "green",
      data: {!!json_encode($quantity['value']['pigment'])!!},
    }],
  },
  options: {
    maintainAspectRatio: false,
    layout: {
      padding: {
        left: 10,
        right: 10,
        top: 10,
        bottom: 0
      }
    },
    scales: {
      xAxes: [{
        gridLines: {
          display: false,
          drawBorder: true
        },
        maxBarThickness: 40,
      }],
      yAxes: [{
        ticks: {
          min: 0,
          max: {!!json_encode($quantity['max'])!!},
          maxTicksLimit: 10,
          padding: 10,
        }
      }],
    },
    legend: {
      display: true
    },
    
  }
});


// Pie Chart
var ctx = document.getElementById("grafikBuled");
var grafikBuled = new Chart(ctx, {
  plugins: [ChartDataLabels],
  type: 'pie',
  data: {
    labels: {!!json_encode($sales1['type'])!!},
    datasets: [{
      data: {!!json_encode($persentase_transaksi)!!},
      backgroundColor: ['#add8e6', '#ffcccb', '#90EE90'],
      hoverBackgroundColor: ['blue', 'red', 'green'],
      hoverBorderColor: "rgba(234, 236, 244, 1)",
    }],
  },
  options: {
    maintainAspectRatio: false,
    tooltips: {
      backgroundColor: "rgb(255,255,255)",
      bodyFontColor: "#858796",
      borderColor: '#dddfeb',
      borderWidth: 1,
      xPadding: 15,
      yPadding: 15,
      displayColors: false,
      caretPadding: 10,
    },
    plugins:{
        datalabels:{
          formatter:(value, ctx)=>{
            let percentage = value +" %";
            return percentage;
          },
          font:{
            weight:'bold',
          },
        }
      },
    legend: {
      display: true
    },

  },
});
</script>

{{-- callbacks:{
  label: function (tooltipItem, data) {
    return data['labels'][tooltipsItem['index']]+': ' + data['datasets'][0]['data'][tooltipItem['index']]+'%';
  }#858796
}, --}}


@endsection