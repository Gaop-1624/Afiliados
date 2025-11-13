<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>afiliados Pendientes por Pagar</title>
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
          <h4>{{__('Affiliates Awaiting Payment')}} </h4>
        </div>
        <div id="main">
             @if(!empty($afiliadosSinPago) && $afiliadosSinPago->count())
                <table class="w-full text-sm">
                    <thead class="text-white bg-blue-400 border-b dark:border-neutral-500 dark:bg-neutral-400 mr-2">
                        <tr>
                            <th class="px-2 py-1 font-serif text-xs text-left uppercase">id</th>
                            <th class="px-2 py-1 font-serif text-xs text-left uppercase">{{__('Document')}}</th>
                            <th class="px-2 py-1 font-serif text-xs text-left uppercase">{{__('name')}}</th>
                            <th class="px-2 py-1 font-serif text-xs text-left uppercase">{{__('Contract')}}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($afiliadosSinPago as $i => $af)
                            @php $contr = $af->contratos->last(); @endphp
                            <tr class="{{ $i % 2 ? 'bg-gray-50' : '' }}">
                                <td class="py-1 px-2 font-sans text-xs text-left whitespace-nowrap">{{ $i+1 }}</td>
                                <td class="py-1 px-2 font-sans text-xs text-left whitespace-nowrap">{{ $af->documento ?? '' }}</td>
                                <td class="py-1 px-2 font-sans text-xs text-left whitespace-nowrap">{{ trim("{$af->pnombre} {$af->snombre} {$af->papellido} {$af->sapellido}") }}</td>
                                <td class="py-1 px-2 font-sans text-xs text-left whitespace-nowrap">{{ $contr ? ($contr->id . ' / ' . (number_format($contr->salario) ?? '')) : 'Sin contrato' }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @else
                <div class="text-xs text-gray-500">{{__('All members have paid this month or there are no active contracts')}}.</div>
            @endif
                  
        
                     
             
        </div>
        <div id="footer">
          <span>{{$direccion}} Tel: {{$telefono}} Celular: {{$celular}}</span>
        </div>
    </div>
</body>
</html>