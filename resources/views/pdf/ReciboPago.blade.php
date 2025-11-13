<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Historico de Pagos</title>
  @vite(['resources/css/app.css', 'resources/js/app.js'])
 
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
            height: 18%;
            border-radius: 1em;
            margin: 1em;
            /* background: #a4a4a4; */
          }
          #nav{
              height: 5%;
              border-radius: 1em;
              margin: 1em;
          }
          #main{
            height: 16%;
            background: #ffffff;
            border-radius: 1em;
            margin: 1em;
          }
          #footer{
            height: 03%;
            margin-left: 5px;
            text-align: right;
            padding: 5px;
          }
          p{
              text-align: left;
              color: black;
              text-shadow: 2px 2px;
              line-height: 0.9;
              font-size: 30px;
           } 
           h2{
              text-align: left;
              font-style: italic;
              font-size: 16px;
              
             }
           table {
            border-collapse: collapse;
            width: 100%;
          }

          th, td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #ddd;
            margin-bottom: 5px;
          }
          h3{
              text-align: right;
          }
          h4{
            font-size: 26px;
            border-style: outset;
            position: fixed; 
            width: 1150px;
            margin-right: 25px;
          }
          thead{
            background-color: rgb(237, 236, 235);
            font-size: 24px;
          }
          span{
             text-align: center;
             font-size: 10px;
             padding: 8px;
          }
          #section{
                height: 100%;
                width: 46%;
                border-radius: 1em;
                float: left;
                margin: 1em;
          }
          #aside{
                height: 100%;
                width: 46%;
                border-radius: 1em;
                float: right;
                margin: 1em;
          }
          .articulo{
                width: 90%;
                height: 30%;
                margin: 1em;
                border-radius: 1em;
          }
       
          #datos{
                height: 100%;
                width: 30%;
                border-radius: 1em;
                float: left;
          }
          #nombres{
                height: 100%;
                width: 65%;
                border-radius: 1em;
                float: left;
                margin-left: 50px;
          }
          #valores{
                height: 100%;
                width: 30%;
                border-radius: 1em;
                float: left;
                margin-left: 50px;
          }
          h5{
            font-size: 20px;
            border-style: ridge;
            line-height: 1.0;
            padding: 4px;
            margin-bottom: 5px;
            font-style: italic;
          }
          h1{
            border-style: solid;
            border-color: green;
            font-size: 26px;
            text-align: center;
          }
          h6{
            font-size: 26px;
            border-style: outset;
            position: fixed; 
            width: 1150px;
            text-align: right;
          }
    </style>
    <div id="container">
            <div id="header">
                <div id="section">
                    <article class="articulo">
                        <p>{{$empresa}}</p>
                        <h2>Nit: {{$nit}}</h2>
                        <h2>Direccion: {{$direccion}}</h2>
                        <h2>Telefono: {{$telefono}} - {{$celular}}</h2>
                    </article>
                </div>
                <div id="aside">
                    <article class="articulo">
                         <h3>{{__('Payment Date')}}: {{ $pago->fecha_pago }}</h3>
                   </article>
                    <article class="articulo">
                        <h1>{{__('Payment Receipt')}}: {{$pago->codigo }}</h1>
                    </article>
                    <article class="articulo">
                        <h3>{{__('Paid Period')}}: {{ $pago->periodo }}</h3>
                    </article>
                </div>
            </div>
        <div id="nav">
            <h4>{{ $pago->contrato->afiliado->tdocumentos->alias }}:  {{ $pago->contrato->afiliado->documento }} {{ $pago->contrato->afiliado->pnombre }} {{ $pago->contrato->afiliado->snombre }} {{ $pago->contrato->afiliado->papellido }}</h4> <h6> Salario: {{ number_format($pago->salario) }} </h6>
        </div>
        <div id="main">
            <div id="datos">
                  <h5>Salud (Eps) :</h5>
                  <h5>Riesgo (Arl) :</h5>
                  <h5>Pension (Afp) :</h5>
                  <h5>Caja Compensación :</h5>
            </div>
            <div id="nombres">
                <h5>{{ $pago->contrato->eps->nombre }} </h5>
                <h5>{{ $pago->contrato->claseArl }} </h5>
                <h5>{{ $pago->contrato->afp->nombre }} </h5>
                <h5>{{ $pago->contrato->cajas->nombre }} </h5>
            </div>
        </div>
        <div id="footer">
          <h4>{{__('Total Paid')}}:  ${{ number_format($pago->total_pagado) }} </h4>
        </div>
        <div>
            <span>PORA EVITAR INCONSISTENCIAS EN EL SERVICIO Y LA NEGACION DE INCAPACIDADES, POR FAVOR REALIZAR LOS APORTES LOS CINCO (5) PRIMEROS DIAS DEL MES</span>
        </div>
    </div>
</body>
</html>