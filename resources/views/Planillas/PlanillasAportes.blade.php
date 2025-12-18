<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Liquidaciones</title>
    </head>
    <body>
        <br><br><br><br><br><br> 
       

        <div>   
            <h5>Datos Generales de la Liquidación</h5>
        </div>
        <table>
            <thead>
                <th style='background-color: #008000; color: #f8f9fa;'>Periodo</th>
                <th style='background-color: #008000; color: #f8f9fa;'></th>
                <th style='background-color: #008000; color: #f8f9fa;'></th> 
                <th style='background-color: #008000; color: #f8f9fa;'>Tipo</th>
                <th style='background-color: #008000; color: #f8f9fa;'>Planilla Asociada</th>
                <th style='background-color: #008000; color: #f8f9fa;'></th>
                <th style='background-color: #008000; color: #f8f9fa;'>Sucursal</th>
                <th style='background-color: #008000; color: #f8f9fa;'></th>
                <th style='background-color: #008000; color: #f8f9fa;'>Tipo</th>
                <th style='background-color: #008000; color: #f8f9fa;'></th>
                <th style='background-color: #008000; color: #f8f9fa;'>Administradora</th> 
            </thead>
        </table>
         <table>
            <thead>
                <tr>
                    <th style='background-color: #008000; color: #f8f9fa;'>Pension</th>
                    <th style='background-color: #008000; color: #f8f9fa;'></th>
                    <th style='background-color: #008000; color: #f8f9fa;'>Salud</th>
                    <th style='background-color: #008000; color: #f8f9fa;'>Planilla</th>
                    <th style='background-color: #008000; color: #f8f9fa;'>Fecha</th>
                    <th style='background-color: #008000; color: #f8f9fa;'>Clave</th>
                    <th style='background-color: #008000; color: #f8f9fa;'>Codigo</th>
                    <th style='background-color: #008000; color: #f8f9fa;'>Nombre</th>
                    <th style='background-color: #008000; color: #f8f9fa;'>Aportante</th>
                    <th style='background-color: #008000; color: #f8f9fa;'></th>
                    <th style='background-color: #008000; color: #f8f9fa;'>Riesgos</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="bgcolor-green-100">{{$planillas->periodo_pension}}</td><td></td>
                    <td>{{$planillas->periodo_salud}}</td>
                    <td>E</td><td></td><td></td><td>2</td><td></td><td>EMPLEADOR</td>
                    <td></td><td>{{ $arlNombre }}</td>
                </tr>
            </tbody>
        </table>
         <h5>Datos Generales de Pago</h5>
        <table>
            <thead>
                <th style='background-color: #008000; color: #f8f9fa;'>Clave</th>
                <th style='background-color: #008000; color: #f8f9fa;'></th>
                <th style='background-color: #008000; color: #f8f9fa;'></th> 
                <th style='background-color: #008000; color: #f8f9fa;'>Fecha</th>
                <th style='background-color: #008000; color: #f8f9fa;'></th>
                <th style='background-color: #008000; color: #f8f9fa;'>Pago</th>
                <th style='background-color: #008000; color: #f8f9fa;'></th>
            </thead>
        </table>
         <table>
            <thead>
                <th style='background-color: #008000; color: #f8f9fa;'>Pago</th>
                <th style='background-color: #008000; color: #f8f9fa;'>Planilla</th>
                <th style='background-color: #008000; color: #f8f9fa;'>Limite</th> 
                <th style='background-color: #008000; color: #f8f9fa;'>Pago</th>
                <th style='background-color: #008000; color: #f8f9fa;'>Banco</th>
                <th style='background-color: #008000; color: #f8f9fa;'>Días Mora</th>
                <th style='background-color: #008000; color: #f8f9fa;'>Valor</th>
            </thead>
        </table>
        <br><br><br>
         <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th style='background-color: #008000; color: #f8f9fa;'>No.</th> 
                    <th style='background-color: #008000; color: #f8f9fa;'>Tipo ID</th>
                    <th style='background-color: #008000; color: #f8f9fa;'>No ID</th>
                    <th style='background-color: #008000; color: #f8f9fa;'>Primer Apellido</th>
                    <th style='background-color: #008000; color: #f8f9fa;'>Segundo Apellido</th>
                    <th style='background-color: #008000; color: #f8f9fa;'>Primer Nombre</th>
                    <th style='background-color: #008000; color: #f8f9fa;'>Segundo Nombre</th>
                    <th style='background-color: #008000; color: #f8f9fa;'>Departamento</th>
                    <th style='background-color: #008000; color: #f8f9fa;'>Ciudad</th>
                    <th style='background-color: #008000; color: #f8f9fa;'>Tipo de Cotizante</th>
                    <th style='background-color: #008000; color: #f8f9fa;'>Subtipo de Cotizante</th>
                    <th style='background-color: #008000; color: #f8f9fa;'>Horas Laboradas</th>
                    <th style='background-color: #008000; color: #f8f9fa;'>Extranjero</th>
                    <th style='background-color: #008000; color: #f8f9fa;'>Residente en el Exterior</th>
                    <th style='background-color: #008000; color: #f8f9fa;'>Fecha Radicación en el Exterior</th>
                    <th style='background-color: #008000; color: #f8f9fa;'>ING</th>
                    <th style='background-color: #008000; color: #f8f9fa;'>Fecha ING</th>
                    <th style='background-color: #008000; color: #f8f9fa;'>RET</th>
                    <th style='background-color: #008000; color: #f8f9fa;'>Fecha RET</th>
                    <th style='background-color: #008000; color: #f8f9fa;'>TDE</th>
                    <th style='background-color: #008000; color: #f8f9fa;'>TAE</th>
                    <th style='background-color: #008000; color: #f8f9fa;'>TDP</th>
                    <th style='background-color: #008000; color: #f8f9fa;'>TAP</th>
                    <th style='background-color: #008000; color: #f8f9fa;'>VSP</th>
                    <th style='background-color: #008000; color: #f8f9fa;'>Fecha VSP</th>
                    <th style='background-color: #008000; color: #f8f9fa;'>VST</th>
                    <th style='background-color: #008000; color: #f8f9fa;'>SLN</th>
                    <th style='background-color: #008000; color: #f8f9fa;'>Inicio SLN</th>
                    <th style='background-color: #008000; color: #f8f9fa;'>Fin  SLN</th>
                    <th style='background-color: #008000; color: #f8f9fa;'>IGE</th>
                    <th style='background-color: #008000; color: #f8f9fa;'>Inicio IGE</th>
                    <th style='background-color: #008000; color: #f8f9fa;'>Fin IGE</th>
                    <th style='background-color: #008000; color: #f8f9fa;'>LMA</th>
                    <th style='background-color: #008000; color: #f8f9fa;'>Inicio LMA</th>
                    <th style='background-color: #008000; color: #f8f9fa;'>Fin LMA</th>
                    <th style='background-color: #008000; color: #f8f9fa;'>VAC-LR</th>
                    <th style='background-color: #008000; color: #f8f9fa;'>Inicio VAC-LR</th>
                    <th style='background-color: #008000; color: #f8f9fa;'>Fin VAC-LR</th>
                    <th style='background-color: #008000; color: #f8f9fa;'>AVP</th>
                    <th style='background-color: #008000; color: #f8f9fa;'>VCT</th>
                    <th style='background-color: #008000; color: #f8f9fa;'>Inicio VCT</th>
                    <th style='background-color: #008000; color: #f8f9fa;'>Fin VCT</th>
                    <th style='background-color: #008000; color: #f8f9fa;'>IRL</th>
                    <th style='background-color: #008000; color: #f8f9fa;'>Inicio IRL</th>
                    <th style='background-color: #008000; color: #f8f9fa;'>Fin IRL</th>
                    <th style='background-color: #008000; color: #f8f9fa;'>Correcciones</th>
                    <th style='background-color: #008000; color: #f8f9fa;'>Salario Mensual($)</th>
                    <th style='background-color: #008000; color: #f8f9fa;'>Salario Integral</th>
                    <th style='background-color: #008000; color: #f8f9fa;'>Salario Variable</th>
                    <th style='background-color: #008000; color: #f8f9fa;'>Administradora</th>
                    <th style='background-color: #008000; color: #f8f9fa;'>Días</th> 
                    <th style='background-color: #008000; color: #f8f9fa;'>IBC</th> 
                    <th style='background-color: #008000; color: #f8f9fa;'>Tarifa</th>  
                    <th style='background-color: #008000; color: #f8f9fa;'>Valor Cotización</th> 
                    <th style='background-color: #008000; color: #f8f9fa;'>Indicador Alto Riesgo</th>
                    <th style='background-color: #008000; color: #f8f9fa;'>Cotización Voluntaria Afiliado</th> 
                    <th style='background-color: #008000; color: #f8f9fa;'>Cotización Voluntaria Empleador</th> 
                    <th style='background-color: #008000; color: #f8f9fa;'>Fondo Solidaridad Pensional</th> 
                    <th style='background-color: #008000; color: #f8f9fa;'>Fondo Subsistencia</th> 
                    <th style='background-color: #008000; color: #f8f9fa;'>Valor no Retenido</th>
                    <th style='background-color: #008000; color: #f8f9fa;'>Total</th> 
                    <th style='background-color: #008000; color: #f8f9fa;'>AFP Destino</th> 
                    <th style='background-color: #008000; color: #f8f9fa;'>Administradora</th> 
                    <th style='background-color: #008000; color: #f8f9fa;'>Días</th> 
                    <th style='background-color: #008000; color: #f8f9fa;'>IBC</th> 
                    <th style='background-color: #008000; color: #f8f9fa;'>Tarifa</th>
                    <th style='background-color: #008000; color: #f8f9fa;'>Valor Cotización</th>
                    <th style='background-color: #008000; color: #f8f9fa;'>Valor UPC</th>
                    <th style='background-color: #008000; color: #f8f9fa;'>N° Autorización Incapacidad EG</th> 
                    <th style='background-color: #008000; color: #f8f9fa;'>Valor Incapacidad EG</th> 
                    <th style='background-color: #008000; color: #f8f9fa;'>N° Autorización LMA</th> 
                    <th style='background-color: #008000; color: #f8f9fa;'>Valor Licencia Maternidad</th>
                    <th style='background-color: #008000; color: #f8f9fa;'>EPS Destino</th>
                    <th style='background-color: #008000; color: #f8f9fa;'>Administradora</th>
                    <th style='background-color: #008000; color: #f8f9fa;'>Días</th> 
                    <th style='background-color: #008000; color: #f8f9fa;'>IBC</th> 
                    <th style='background-color: #008000; color: #f8f9fa;'>Tarifa</th> 
                    <th style='background-color: #008000; color: #f8f9fa;'>Clase</th> 
                    <th style='background-color: #008000; color: #f8f9fa;'>Centro de Trabajo</th> 
                    <th style='background-color: #008000; color: #f8f9fa;'>Actividad Económica</th>
                    <th style='background-color: #008000; color: #f8f9fa;'>Valor Cotización</th>
                    <th style='background-color: #008000; color: #f8f9fa;'>Días</th> 
                    <th style='background-color: #008000; color: #f8f9fa;'>Administradora CCF</th> 
                    <th style='background-color: #008000; color: #f8f9fa;'>IBC CCF</th> 
                    <th style='background-color: #008000; color: #f8f9fa;'>Tarifa CCF</th> 
                    <th style='background-color: #008000; color: #f8f9fa;'>Valor Cotización CCF</th>
                    <th style='background-color: #008000; color: #f8f9fa;'>IBC Otros Parafiscales</th>
                    <th style='background-color: #008000; color: #f8f9fa;'>Tarifa SENA</th> 
                    <th style='background-color: #008000; color: #f8f9fa;'>Valor Cotización SENA</th> 
                    <th style='background-color: #008000; color: #f8f9fa;'>Tarifa ICBF Valor</th> 
                    <th style='background-color: #008000; color: #f8f9fa;'>Cotización ICBF</th> 
                    <th style='background-color: #008000; color: #f8f9fa;'>Tarifa ESAP</th> 
                    <th style='background-color: #008000; color: #f8f9fa;'>Valor Cotización ESAP</th>
                    <th style='background-color: #008000; color: #f8f9fa;'>Tarifa MEN</th> 
                    <th style='background-color: #008000; color: #f8f9fa;'>Valor Cotización MEN</th> 
                    <th style='background-color: #008000; color: #f8f9fa;'>Exonerado parafiscales y salud Ley 1607</th> 
                    <th style='background-color: #008000; color: #f8f9fa;'>Tipo ID</th> 
                    <th style='background-color: #008000; color: #f8f9fa;'>N° ID</th>
                </tr> 
            </thead>
            <tbody>
                @php $contador = $contador ?? 1; @endphp
                @foreach ($detalles as $detalle)
                    @php
                            $afiliado = $detalle->afiliado;
                             // obtener un contrato concreto: último (o cambiar por ->first() si corresponde)
                            $contrato = $afiliado->contratos->last();
                             // obtener un pago concreto del contrato (último)
                            $fechaIngreso = $contrato->fecha_ingreso;
                            $carbonDate = \Carbon\Carbon::parse($fechaIngreso);
                            $mesingreso = $carbonDate->month + 1;
                            $mesActual = \Carbon\Carbon::now()->format('m');

                            if ($mesingreso == $mesActual){
                                $pago = $contrato ? $contrato->pagos->first() : null;
                            }else{
                                $pago = $contrato ? $contrato->pagos->last() : null;
                            } 
                    @endphp
                    <tr wire:key="detalle-{{ $detalle->id }}">
                        <td>{{ $contador++ }}</td>
                        <td>{{ $detalle->afiliado->tdocumentos->alias ?? '' }}</td>
                        <td>{{ $detalle->afiliado->documento ?? '' }}</td>
                        <td>{{ $detalle->afiliado->papellido ?? '' }}</td>
                        <td>{{ $detalle->afiliado->sapellido ?? '' }}</td>
                        <td>{{ $detalle->afiliado->pnombre ?? '' }}</td>
                        <td>{{ $detalle->afiliado->snombre ?? '' }}</td> 
                        <td>{{ $contrato->cajas->dpto ?? '' }}</td>
                        <td>{{ $contrato->cajas->ciudad ?? '' }}</td>
                        <td>1. DEPENDIENTE</td>
                        <td>{{ $contrato->afp->subtipo ?? '' }}</td>
                        <td></td><td>NO</td><td>NO</td><td></td>
                        @if ($pago->novedad == "Todos los sistemas (ARL, AFP, CCF, EPS)")
                            <td>Todos los sistemas (ARL, AFP, CCF, EPS)</td>
                        @else
                            <td></td>
                        @endif
                        @if ($pago->novedad == "NULL")
                            <td>{{ $contrato->fecha_ingreso ?? '' }}</td>
                        @else
                            <td></td>
                        @endif
                        @if ($pago->novedad == "Retiro")
                            <td>Todos los sistemas (ARL, AFP, CCF, EPS)</td>
                        @else
                            <td></td>
                        @endif
                        @if ($pago->novedad == "Retiro")
                            <td>{{ $contrato->fecha_retiro ?? '' }}</td>
                        @else
                            <td></td>
                        @endif
                        <td>NO</td><td>NO</td><td>NO</td><td>NO</td>
                        <td>NO</td><td></td><td>NO</td><td></td>
                        <td></td><td></td><td>NO</td><td></td><td></td>
                        <td>NO</td><td></td><td></td><td>NO</td><td></td><td></td><td>NO</td>
                        <td>NO</td><td></td><td></td><td></td><td></td><td></td><td>NO</td><td>{{ $pago->salario ?? '' }}</td>
                        <td>NO</td><td>NO</td><td>{{ $contrato->afp->nombre ?? '' }}</td><td>{{ $pago->dias ?? '' }}</td>
                        <td>{{ $pago->salario ?? '' }}</td><td>{{ $contrato->afp->tarifaafp ?? '' }}</td>
                        <td></td><td>Sin Riesgo</td><td></td><td></td><td></td><td></td><td></td><td></td><td>NINGUNA</td>
                        <td>{{ $contrato->eps->nombre ?? '' }}</td><td>{{ $pago->dias ?? '' }}</td><td>{{ $pago->salario ?? '' }}</td>
                        <td>{{ $contrato->eps->tarifaeps ?? '' }}</td><td></td><td></td><td></td><td></td><td></td><td></td>
                        <td>NINGUNA</td><td>{{ $arlNombre }}</td><td>{{ $pago->dias ?? '' }}</td><td>{{ $pago->salario ?? '' }}</td>    
                        <td>{{ $contrato->riesgo ?? '' }}</td><td>{{ $contrato->claseArl ?? '' }}</td>
                        <td></td><td></td><td></td><td>{{ $pago->dias ?? '' }}</td><td>{{ $contrato->cajas->nombre ?? '' }}</td>
                        <td>{{ $pago->salario ?? '' }}</td><td>{{ $contrato->cajas->tarifacaja ?? '' }}</td>
                        @if ($contrato->caja_id == 3)
                            <td>100</td>
                        @else
                            <td></td>
                        @endif
                    </tr>
                @endforeach
                
            </tbody>
    </body>
</html>