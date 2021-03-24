@extends('layouts.main')
@section('title', 'Beranda')

@section('container')

<div class="container-fluid">

  <!-- Page Heading -->
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800"><b>Naive Bayes Classifier bulan {{$month}}</b></h1>
  </div>

  <div class="row">

    <div class=" col">
      <div class="card shadow mb-4">
        <div class="card-header py-3">
          <h6 class="m-0 font-weight-bold text-primary">Pilih Bulan</h6>
        </div>
        <div class="card-body">
          <form method="POST" action="{{"/naive_bayes"}}">
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

  <div class="card rounded shadow mb-4">
    <div class="card-header py-3">
      <h4>Perhitungan Class Variable</h4>
    </div>
    <div class="card-body">
      <h5>Untuk mengetahui hasil variabel,kalikan semua hasil variabel pada Analisis penjualan sebagai berikut:</h5>

      <li> Variable Sales </li>
      {{-- additive --}}
      <ul>
        P ({{$sales1['type'][0]}} | {{$sales1['label'][0]}} = {{$sales1['value']["additive"][0]}} /
        {{$sales1['total_transaksi'][0]}}) *
        P ({{$sales1['type'][0]}} | {{$sales1['label'][1]}} = {{$sales1['value']["additive"][1]}} /
        {{$sales1['total_transaksi'][0]}}) *
        P ({{$sales1['type'][0]}} | {{$sales1['label'][2]}} = {{$sales1['value']["additive"][2]}} /
        {{$sales1['total_transaksi'][0]}} ) *
        P ({{$sales1['type'][0]}} | {{$sales1['label'][3]}} = {{$sales1['value']["additive"][3]}} /
        {{$sales1['total_transaksi'][0]}} ) *
        P ({{$sales1['type'][0]}} | {{$sales1['label'][4]}} = {{$sales1['value']["additive"][4]}} /
        {{$sales1['total_transaksi'][0]}} ) *
        P ({{$sales1['type'][0]}} | {{$sales1['label'][5]}} = {{$sales1['value']["additive"][5]}} /
        {{$sales1['total_transaksi'][0]}} ) *
        P ({{$sales1['type'][0]}} | {{$sales1['label'][6]}} = {{$sales1['value']["additive"][6]}} /
        {{$sales1['total_transaksi'][0]}} ) *
        P ({{$sales1['type'][0]}} | {{$sales1['label'][7]}} = {{$sales1['value']["additive"][7]}} /
        {{$sales1['total_transaksi'][0]}} ) *
        P ({{$sales1['type'][0]}} | {{$sales1['label'][8]}} = {{$sales1['value']["additive"][8]}} /
        {{$sales1['total_transaksi'][0]}} )
      </ul>
      <ul>
        = {{number_format($sales1['bagi']["additive"][0], 3)}} *
        {{number_format($sales1['bagi']["additive"][1], 3)}} *
        {{number_format($sales1['bagi']["additive"][2], 3)}} *
        {{number_format($sales1['bagi']["additive"][3], 3)}} *
        {{number_format($sales1['bagi']["additive"][4], 3)}} *
        {{number_format($sales1['bagi']["additive"][5], 3)}} *
        {{number_format($sales1['bagi']["additive"][6], 3)}} *
        {{number_format($sales1['bagi']["additive"][7], 3)}} *
        {{number_format($sales1['bagi']["additive"][8], 3)}}
      </ul>
      <ul>
        = {{number_format($sales1['kali']["additive"], 3)}}
      </ul>

      {{-- tronox --}}
      <ul>
        P ({{$sales1['type'][1]}} | {{$sales1['label'][0]}} = {{$sales1['value']["tronox"][0]}} /
        {{$sales1['total_transaksi'][1]}}) *
        P ({{$sales1['type'][1]}} | {{$sales1['label'][1]}} = {{$sales1['value']["tronox"][1]}} /
        {{$sales1['total_transaksi'][1]}}) *
        P ({{$sales1['type'][1]}} | {{$sales1['label'][2]}} = {{$sales1['value']["tronox"][2]}} /
        {{$sales1['total_transaksi'][1]}} ) *
        P ({{$sales1['type'][1]}} | {{$sales1['label'][3]}} = {{$sales1['value']["tronox"][3]}} /
        {{$sales1['total_transaksi'][1]}} ) *
        P ({{$sales1['type'][1]}} | {{$sales1['label'][4]}} = {{$sales1['value']["tronox"][4]}} /
        {{$sales1['total_transaksi'][1]}} ) *
        P ({{$sales1['type'][1]}} | {{$sales1['label'][5]}} = {{$sales1['value']["tronox"][5]}} /
        {{$sales1['total_transaksi'][1]}} ) *
        P ({{$sales1['type'][1]}} | {{$sales1['label'][6]}} = {{$sales1['value']["tronox"][6]}} /
        {{$sales1['total_transaksi'][1]}} ) *
        P ({{$sales1['type'][1]}} | {{$sales1['label'][7]}} = {{$sales1['value']["tronox"][7]}} /
        {{$sales1['total_transaksi'][1]}} ) *
        P ({{$sales1['type'][1]}} | {{$sales1['label'][8]}} = {{$sales1['value']["tronox"][8]}} /
        {{$sales1['total_transaksi'][1]}} )
      </ul>
      <ul>
        = {{number_format($sales1['bagi']["tronox"][0], 3)}} *
        {{number_format($sales1['bagi']["tronox"][1], 3)}} *
        {{number_format($sales1['bagi']["tronox"][2], 3)}} *
        {{number_format($sales1['bagi']["tronox"][3], 3)}} *
        {{number_format($sales1['bagi']["tronox"][4], 3)}} *
        {{number_format($sales1['bagi']["tronox"][5], 3)}} *
        {{number_format($sales1['bagi']["tronox"][6], 3)}} *
        {{number_format($sales1['bagi']["tronox"][7], 3)}} *
        {{number_format($sales1['bagi']["tronox"][8], 3)}}
      </ul>
      <ul>
        = {{number_format($sales1['kali']["tronox"], 3)}}
      </ul>

      {{-- pigment --}}
      <ul>
        P ({{$sales1['type'][2]}} | {{$sales1['label'][0]}} = {{$sales1['value']["pigment"][0]}} /
        {{$sales1['total_transaksi'][2]}}) *
        P ({{$sales1['type'][2]}} | {{$sales1['label'][1]}} = {{$sales1['value']["pigment"][1]}} /
        {{$sales1['total_transaksi'][2]}}) *
        P ({{$sales1['type'][2]}} | {{$sales1['label'][2]}} = {{$sales1['value']["pigment"][2]}} /
        {{$sales1['total_transaksi'][2]}} ) *
        P ({{$sales1['type'][2]}} | {{$sales1['label'][3]}} = {{$sales1['value']["pigment"][3]}} /
        {{$sales1['total_transaksi'][2]}} ) *
        P ({{$sales1['type'][2]}} | {{$sales1['label'][4]}} = {{$sales1['value']["pigment"][4]}} /
        {{$sales1['total_transaksi'][2]}} ) *
        P ({{$sales1['type'][2]}} | {{$sales1['label'][5]}} = {{$sales1['value']["pigment"][5]}} /
        {{$sales1['total_transaksi'][2]}} ) *
        P ({{$sales1['type'][2]}} | {{$sales1['label'][6]}} = {{$sales1['value']["pigment"][6]}} /
        {{$sales1['total_transaksi'][2]}} ) *
        P ({{$sales1['type'][2]}} | {{$sales1['label'][7]}} = {{$sales1['value']["pigment"][7]}} /
        {{$sales1['total_transaksi'][2]}} ) *
        P ({{$sales1['type'][2]}} | {{
        $sales1['label'][8]}} = {{$sales1['value']["pigment"][8]}} /
        {{$sales1['total_transaksi'][2]}} )
      </ul>
      <ul>
        = {{number_format($sales1['bagi']["pigment"][0], 3)}} *
        {{number_format($sales1['bagi']["pigment"][1], 3)}} *
        {{number_format($sales1['bagi']["pigment"][2], 3)}} *
        {{number_format($sales1['bagi']["pigment"][3], 3)}} *
        {{number_format($sales1['bagi']["pigment"][4], 3)}} *
        {{number_format($sales1['bagi']["pigment"][5], 3)}} *
        {{number_format($sales1['bagi']["pigment"][6], 3)}} *
        {{number_format($sales1['bagi']["pigment"][7], 3)}} *
        {{number_format($sales1['bagi']["pigment"][8], 3)}}
      </ul>
      <ul>
        = {{number_format($sales1['kali']["pigment"], 3)}}
      </ul>



      <li> Variable Branc </li>
      {{-- additive --}}
      <ul>
        P ({{$branc1['type'][0]}} | {{$branc1['label'][0]}} = {{$branc1['value']["additive"][0]}} /
        {{$branc1['total_transaksi'][0]}}) *
        P ({{$branc1['type'][0]}} | {{$branc1['label'][1]}} = {{$branc1['value']["additive"][1]}} /
        {{$branc1['total_transaksi'][0]}}) *
        P ({{$branc1['type'][0]}} | {{$branc1['label'][2]}} = {{$branc1['value']["additive"][2]}} /
        {{$branc1['total_transaksi'][0]}} )
      </ul>
      <ul>
        = {{number_format($branc1['bagi']["additive"][0], 3)}} * {{number_format($branc1['bagi']["additive"][1], 3)}} *
        {{number_format($branc1['bagi']["additive"][2], 3)}}
      </ul>
      <ul>
        = {{number_format($branc1['kali']["additive"], 3)}}
      </ul>

      {{-- tronox --}}
      <ul>
        P ({{$branc1['type'][1]}} | {{$branc1['label'][0]}} = {{$branc1['value']["tronox"][0]}} /
        {{$branc1['total_transaksi'][1]}}) *
        P ({{$branc1['type'][1]}} | {{$branc1['label'][1]}} = {{$branc1['value']["tronox"][1]}} /
        {{$branc1['total_transaksi'][1]}}) *
        P ({{$branc1['type'][1]}} | {{$branc1['label'][2]}} = {{$branc1['value']["tronox"][2]}} /
        {{$branc1['total_transaksi'][1]}} )
      </ul>
      <ul>
        = {{number_format($branc1['bagi']["tronox"][0], 3)}} * {{number_format($branc1['bagi']["tronox"][1], 3)}} *
        {{number_format($branc1['bagi']["tronox"][2], 3)}}
      </ul>
      <ul>
        = {{number_format($branc1['kali']["tronox"], 3)}}
      </ul>

      {{-- pigment --}}
      <ul>
        P ({{$branc1['type'][2]}} | {{$branc1['label'][0]}} = {{$branc1['value']["pigment"][0]}} /
        {{$branc1['total_transaksi'][2]}}) *
        P ({{$branc1['type'][2]}} | {{$branc1['label'][1]}} = {{$branc1['value']["pigment"][1]}} /
        {{$branc1['total_transaksi'][2]}}) *
        P ({{$branc1['type'][2]}} | {{$branc1['label'][2]}} = {{$branc1['value']["pigment"][2]}} /
        {{$branc1['total_transaksi'][2]}} )
      </ul>
      <ul>
        = {{number_format($branc1['bagi']["pigment"][0], 3)}} * {{number_format($branc1['bagi']["pigment"][1], 3)}} *
        {{number_format($branc1['bagi']["pigment"][2], 3)}}
      </ul>
      <ul>
        = {{number_format($branc1['kali']["pigment"], 3)}}
      </ul>

      <li> Variable Quantity </li>
      {{-- additive --}}
      <ul>
        P ({{$quantity['type'][0]}} | {{$quantity['label'][0]}} = {{$quantity['value']["additive"][0]}} /
        {{$branc1['total_transaksi'][0]}}) *
        P ({{$quantity['type'][0]}} | {{$quantity['label'][1]}} = {{$quantity['value']["additive"][1]}} /
        {{$branc1['total_transaksi'][0]}}) *
        P ({{$quantity['type'][0]}} | {{$quantity['label'][2]}} = {{$quantity['value']["additive"][2]}} /
        {{$branc1['total_transaksi'][0]}} )
      </ul>
      <ul>
        = {{number_format($quantity['bagi']["additive"][0], 3)}} *
        {{number_format($quantity['bagi']["additive"][1], 3)}} *
        {{number_format($quantity['bagi']["additive"][2], 3)}}
      </ul>
      <ul>
        = {{number_format($quantity['kali']["additive"], 3)}}
      </ul>

      {{-- tronox --}}
      <ul>
        P ({{$quantity['type'][1]}} | {{$quantity['label'][0]}} = {{$quantity['value']["tronox"][0]}} /
        {{$branc1['total_transaksi'][1]}}) *
        P ({{$quantity['type'][1]}} | {{$quantity['label'][1]}} = {{$quantity['value']["tronox"][1]}} /
        {{$branc1['total_transaksi'][1]}}) *
        P ({{$quantity['type'][1]}} | {{$quantity['label'][2]}} = {{$quantity['value']["tronox"][2]}} /
        {{$branc1['total_transaksi'][1]}} )
      </ul>
      <ul>
        = {{number_format($quantity['bagi']["tronox"][0], 3)}} * {{number_format($quantity['bagi']["tronox"][1], 3)}} *
        {{number_format($quantity['bagi']["tronox"][2], 3)}}
      </ul>
      <ul>
        = {{number_format($quantity['kali']["tronox"], 3)}}
      </ul>

      {{-- pigment --}}
      <ul>
        P ({{$quantity['type'][2]}} | {{$quantity['label'][0]}} = {{$quantity['value']["pigment"][0]}} /
        {{$branc1['total_transaksi'][2]}}) *
        P ({{$quantity['type'][2]}} | {{$quantity['label'][1]}} = {{$quantity['value']["pigment"][1]}} /
        {{$branc1['total_transaksi'][2]}}) *
        P ({{$quantity['type'][2]}} | {{$quantity['label'][2]}} = {{$quantity['value']["pigment"][2]}} /
        {{$branc1['total_transaksi'][2]}} )
      </ul>
      <ul>
        = {{number_format($quantity['bagi']["pigment"][0], 3)}} *
        {{number_format($quantity['bagi']["pigment"][1], 3)}}*
        {{number_format($quantity['bagi']["pigment"][2], 3)}}
      </ul>
      <ul>
        = {{number_format($quantity['kali']["pigment"], 3)}}
      </ul>

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
            <div class="card-header pt-3">
              <h6 class="m-0 font-weight-bold text-primary">Data Jumlah</h6>
              <p class="pb-0 mb-0">Jumlah Product type dibagi total transaksi</p>
            </div>
            <div class="card-body">
              <div class="chart-pie">
                <canvas id="grafikBuled"></canvas>
              </div>
              <hr>
              Data Total Transaksi
              {{$sales1['total_transaksi'][0] + $sales1['total_transaksi'][1]+ $sales1['total_transaksi'][2]}}
            </div>
          </div>
        </div>

      </div>



    </div>
  </div>

  {{-- ====================================================================================================== --}}

  <div class="card rounded shadow mb-4">
    <div class="card-header py-3">
      Perhitungan Probabilitas Variabel
    </div>

    <div class="card-body">
      <li>Variable sales</li>
      {{-- aditive --}}
      <ul>
        <?php for ($i=0; $i < count($sales1['label']); $i++) {?>
        <li>
          {{$sales1['type'][0]}}, {{$sales1['label'][$i]}} = {{$sales1['value']["additive"][$i]}} /
          {{$sales1['total_transaksi'][0]}} = {{number_format($sales1['bagi']["additive"][$i], 3)}}
        </li>
        <?php } ?>
      </ul>

      {{-- tronox --}}
      <ul>
        <?php for ($i=0; $i < count($sales1['label']); $i++) {?>
        <li>
          {{$sales1['type'][1]}}, {{$sales1['label'][$i]}} = {{$sales1['value']["tronox"][$i]}} /
          {{$sales1['total_transaksi'][1]}} = {{number_format($sales1['bagi']["tronox"][$i], 3)}}
        </li>
        <?php } ?>
      </ul>

      {{-- pigment --}}
      <ul>
        <?php for ($i=0; $i < count($sales1['label']); $i++) {?>
        <li>
          {{$sales1['type'][2]}}, {{$sales1['label'][$i]}} = {{$sales1['value']["pigment"][$i]}} /
          {{$sales1['total_transaksi'][2]}} = {{number_format($sales1['bagi']["pigment"][$i], 3)}}
        </li>
        <?php } ?>
      </ul>

      <li>Variable Branc</li>
      {{-- Additive --}}
      <ul>
        <?php for ($i=0; $i < count($branc1['label']); $i++) { ?>
        <li>
          {{$branc1['type'][0]}}, {{$branc1['label'][$i]}} = {{$branc1['value']["additive"][$i]}} /
          {{$branc1['total_transaksi'][0]}} = {{number_format($branc1['bagi']["additive"][$i], 3)}}
        </li>
        <?php } ?>
      </ul>

      {{-- tronox --}}
      <ul>
        <?php for ($i=0; $i < count($branc1['label']); $i++) { ?>
        <li>
          {{$branc1['type'][1]}}, {{$branc1['label'][$i]}} = {{$branc1['value']["tronox"][$i]}} /
          {{$branc1['total_transaksi'][1]}} = {{number_format($branc1['bagi']["tronox"][$i], 3)}}
        </li>
        <?php } ?>
      </ul>

      {{-- pigment --}}
      <ul>
        <?php for ($i=0; $i < count($branc1['label']); $i++) { ?>
        <li>
          {{$branc1['type'][2]}}, {{$branc1['label'][$i]}} = {{$branc1['value']["pigment"][$i]}} /
          {{$branc1['total_transaksi'][2]}} = {{number_format($branc1['bagi']["pigment"][$i], 3)}}
        </li>
        <?php } ?>
      </ul>

      <li>Variable Quantity</li>
      {{-- Additive --}}
      <ul>
        <?php for ($i=0; $i < count($quantity['label']); $i++) { ?>
        <li>
          {{$quantity['type'][0]}}, {{$quantity['label'][$i]}} = {{$quantity['value']["additive"][$i]}} /
          {{$branc1['total_transaksi'][0]}} = {{number_format($quantity['bagi']["additive"][$i], 3)}}
        </li>
        <?php } ?>
      </ul>

      {{-- tronox --}}
      <ul>
        <?php for ($i=0; $i < count($quantity['label']); $i++) { ?>
        <li>
          {{$quantity['type'][1]}}, {{$quantity['label'][$i]}} = {{$quantity['value']["tronox"][$i]}} /
          {{$branc1['total_transaksi'][1]}} = {{number_format($quantity['bagi']["tronox"][$i], 3)}}
        </li>
        <?php } ?>
      </ul>

      {{-- pigment --}}
      <ul>
        <?php for ($i=0; $i < count($quantity['label']); $i++) { ?>
        <li>
          {{$quantity['type'][2]}}, {{$quantity['label'][$i]}} = {{$quantity['value']["pigment"][$i]}} /
          {{$branc1['total_transaksi'][2]}} = {{number_format($quantity['bagi']["pigment"][$i], 3)}}
        </li>
        <?php } ?>
      </ul>

    </div>
  </div>

</div>

@endsection
@section('js')
<!-- Page level plugins -->
<script src="{{url("assets/chart.js/Chart.js")}}"></script>
<script src="{{url("assets/chart.js/Chart.min.js")}}"></script>

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
      data: {!!json_encode($sales1['bagi']['additive'])!!},
    },{
      label: {!!json_encode($sales1['type'][1])!!},
      backgroundColor: "red",
      hoverBackgroundColor: "#2e59d9",
      borderColor: "red",
      data: {!!json_encode($sales1['bagi']['tronox'])!!},
    },{
      label: {!!json_encode($sales1['type'][2])!!},
      backgroundColor: "green",
      hoverBackgroundColor: "#2e59d9",
      borderColor: "green",
      data: {!!json_encode($sales1['bagi']['pigment'])!!},
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
          max: 1.2,
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
      data: {!!json_encode($branc1['bagi']['additive'])!!},
    },{
      label: {!!json_encode($branc1['type'][1])!!},
      backgroundColor: "red",
      hoverBackgroundColor: "#2e59d9",
      borderColor: "red",
      data: {!!json_encode($branc1['bagi']['tronox'])!!},
    },{
      label: {!!json_encode($branc1['type'][2])!!},
      backgroundColor: "green",
      hoverBackgroundColor: "#2e59d9",
      borderColor: "green",
      data: {!!json_encode($branc1['bagi']['pigment'])!!},
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
          max: 1,
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


// Bar Chart Quantity
var ctx = document.getElementById("barQuantity");
var barBranc = new Chart(ctx, {
  type: 'bar',
  data: {
    labels:{!!json_encode($quantity['label'])!!},
    datasets: [{
      label: {!!json_encode($quantity['type'][0])!!},
      backgroundColor: "blue",
      hoverBackgroundColor: "#2e59d9",
      borderColor: "blue",
      data: {!!json_encode($quantity['bagi']['additive'])!!},
    },{
      label: {!!json_encode($quantity['type'][1])!!},
      backgroundColor: "red",
      hoverBackgroundColor: "#2e59d9",
      borderColor: "red",
      data: {!!json_encode($quantity['bagi']['tronox'])!!},
    },{
      label: {!!json_encode($quantity['type'][2])!!},
      backgroundColor: "green",
      hoverBackgroundColor: "#2e59d9",
      borderColor: "green",
      data: {!!json_encode($quantity['bagi']['pigment'])!!},
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
          max: 300,
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
  type: 'pie',
  data: {
    labels: {!!json_encode($sales1['type'])!!},
    datasets: [{
      data: {!!json_encode($sales1['prob'])!!},
      backgroundColor: ['blue', 'red', 'green'],
      hoverBackgroundColor: ['#add8e6', '#ffcccb', '#90EE90'],
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
    legend: {
      display: true
    },

  },
});
</script>

@endsection