<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ingresos y Egresos por Mes</title>
</head>
<body>
      <style>
        *{
            margin: 0;
            padding: 0;
          }
          #container{
            width: 1200px;
            height: 1000px;
            margin: 0.5em auto;
            padding: 0.5em;
          }
          #header{
            height: 10%;
            border-radius: 1em;
            margin: 1em;
          }
          #nav{
              height: 5%;
              border-radius: 1em;
              margin: 1em;
          }
          #main{
            height: 70%;
            background: #ffffff;
          }
          #footer{
            height: 03%;
            margin: 1em;
            border-bottom: 1px solid rgb(15, 15, 14);
            background-color: rgb(237, 236, 235);
            text-align: center;
           
          }
          p{
              text-align: center;
              color: black;
              text-shadow: 2px 2px;
              line-height: 0.9;
              font-size: 30px;
           } 
           h2{
              text-align: center;
           }
           table {
            border-collapse: collapse;
            width: 100%;
          }

          th, td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #ddd;
          }
          h3{
              text-align: right;
          }
          h4{
            font-size: 26px;
          }
          thead{
            background-color: rgb(237, 236, 235);
            font-size: 24px;
          }
          span{
            margin-right: 150px;
             word-spacing: 5px;
             padding: 8px;
          }
    </style>
    <div id="container">
        <div id="header">
            <p>{{$empresa}}</p>
            <h2>Nit: {{$nit}}</h2>
        </div>
        <div id="nav">
          <h3>{{__('Print Date')}}: {{ date('d-m-Y') }}</h3>
          <h4>{{__('Income and Expenses per month')}} {{ $mes }} del año {{ $year }}</h4>
        </div>
        <div id="main">
            <table class="min-w-full text-sm text-left">
                <thead class="text-white bg-blue-400">
                    <tr>
                        <th>{{__('date')}}</th>
                        <th>{{__('type')}}</th>
                        <th>{{__('Detail')}}</th>
                        <th>{{__('Entrance')}}</th>
                        <th>{{__('Exit')}}</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($registros as $ingresosEgreso)
                        <tr>
                            <td>{{ $ingresosEgreso->fecha_ingreso }}</td>
                                @if ($ingresosEgreso->tipo == 0)
                                    <td>{{__('Income')}}</td>
                                @else
                                    <td>{{__('Expenses')}}</td>
                                @endif
                            <td>{{ $ingresosEgreso->detalle }}</td>
                            <td>${{ number_format($ingresosEgreso->entrada) }}</td>
                            <td>${{ number_format($ingresosEgreso->salida)}}</td>
                        </tr>   
                    @endforeach 
                      <tr class="font-bold text-white bg-blue-400">
                        <td class="px-2 py-1 text-xs">{{__('Total Mes')}}</td><td></td>
                        <td class="px-2 py-1 text-xs">Ingresos: ${{ number_format($sumEntradas, 0) }}</td>
                        <td class="px-2 py-1 text-xs">Gastos: ${{ number_format($sumSalidas, 0) }}</td>
                      <td class="px-2 py-1 text-xs">Ganancia: ${{ number_format($sumEntradas - $sumSalidas, 0) }}</td>
                  </tr>
                </tbody>       
            </table>
        
        </div>
        <div id="footer">
          <span>{{$direccion}} Tel: {{$telefono}} Celular: {{$celular}}</span>
        </div>
    </div>
</body>
</html>