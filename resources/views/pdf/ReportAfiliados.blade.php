<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Reporte de Usuarios</title>
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
          <h4>{{__('List Affiliates')}} </h4>
        </div>
        <div id="main">
          <table>
              <thead>
                  <tr>
                    <th>ID</th>
                    <th>{{__('type')}}</th>
                    <th>{{__('name')}}</th>
                    <th>{{__('Eps')}}</th>
                    <th>{{__('Risks (ARL)')}}</th>
                    <th>{{__('Afp')}}</th>
                    <th>{{__('Caja')}}</th>
                    <th>{{__('Email')}}</th>
                    <th>{{__('Address')}}</th>
                    <th>{{__('Cell phone')}}</th>
                  </tr>
              </thead>
              <tbody>
                   @foreach($afiliados as $afiliado)
                        <tr>
                            <td>{{ $afiliado->id }}</td>
                            <td>{{ $afiliado->tdocumentos->alias }}</td>
                            <td>{{ $afiliado->pnombre }} {{ $afiliado->snombre }} {{ $afiliado->papellido }} {{ $afiliado->sapellido }}</td>
                            <td>{{ $afiliado->contratos->last()->eps->nombre }}</td>
                            <td>{{ $afiliado->contratos->last()->claseArl }}</td>
                            <td>{{ $afiliado->contratos->last()->afp->nombre }}</td>
                            @if ( $afiliado->contratos->last()->cajas->nombre == "COMCAJA")
                                <td>NINGUNA</td>
                            @else
                                <td>COMFENALCO VALLE</td>
                            @endif
                            <td>{{ $afiliado->email }}</td>
                            <td>{{ $afiliado->direccion }} {{ $afiliado->ciudad->nombre }}</td>
                            <td>{{ $afiliado->celular }}</td>
                        </tr>
                    @endforeach
              </tbody>
          </table>
        </div>
        <div id="footer">
          <span>{{$direccion}} Tel: {{$telefono}} Celular: {{$celular}}</span>
        </div>
    </div>

</body>
</html>