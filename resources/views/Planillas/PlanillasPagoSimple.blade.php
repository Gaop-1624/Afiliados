<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Planilla base</title>
    </head>
    <body>
        <table>
            <thead>
                <tr>
                    <th>Tipo de Registro</th>
                    <th>Modalidad de la Planilla</th>
                    <th>Secuencia</th> 
                    <th>Nombre o Razón Social del Aportante</th>
                    <th>Tipo Documento</th>
                    <th>Nº de Identificación</th>
                    <th>Digito de Verificación</th>
                    <th>Tipo Planilla</th>
                    <th>Número Planilla Asociada a esta planilla</th>
                    <th>Fecha de Pago Planilla Asociada a esta planilla</th>
                    <th>Forma Presentación</th> 
                    <th>Código Sucursal Aportante</th> 
                    <th>Nombre Sucursal</th> 
                    <th>Código ARL</th> 
                    <th>Periodo Pago a Sistemas Diferentes a Salud</th> 
                    <th>Periodo Pago al Sistema de Salud</th> 
                    <th>Número  de Planilla</th>
                    <th>Fecha de Pago</th> 
                    <th>Número total de cotizantes</th> 
                    <th>Valor Total Nómina</th> 
                    <th>Tipo de Aportante</th> 
                    <th>Código del Operador de Información</th> 
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td><td>1</td><td>1</td>
                    <td>{{ $empresaNombre }}</td>
                    <td>NIT</td>
                    <td>{{ $empresaNit }}</td>
                    <td>{{ $empresaDev }}</td>
                    <td>E</td><td></td><td></td><td>S</td>
                    <td>1</td><td>{{ $empresaNombre }}</td>
                    <td>{{ $codigoArl }}</td>
                    <td>{{ $planillas->periodo_pension }}</td>
                    <td>{{ $planillas->periodo_salud }}</td>
                    <td></td><td></td><td>1</td><td></td><td>1</td><td>88</td>
                </tr>
            </tbody>
        </table>
         <table>
            <thead>
                <tr>
                    <th>Tipo de registro</th>
                    <th>Secuencia</th>
                    <th>Tipo documento cotizante</th>
                    <th>Documento cotizante</th>
                    <th>Tipo de cotizante</th>
                    <th>Subtipo de cotizante</th>
                    <th>Extranjero</th>
                    <th>Colombiano en el exterior</th>
                    <th>Departamento</th>
                    <th>Municipio</th>
                    <th>Primer apellido</th>
                    <th>Segundo apellido</th>
                    <th>Primer nombre</th>
                    <th>Segundo nombre</th>
                    <th>ING</th>
                    <th>RET</th>
                    <th>TDE</th>
                    <th>TAE</th>
                    <th>TDP</th>
                    <th>TAP</th>
                    <th>VSP</th>
                    <th>Línea</th>
                    <th>VST</th>
                    <th>SLN</th>
                    <th>IGE</th>
                    <th>LMA</th>
                    <th>VAC-LR</th>
                    <th>AVP</th>
                    <th>VCT</th>
                    <th>IRL</th>
                    <th>AFP</th>
                    <th>AFP Traslado</th>
                    <th>EPS</th>
                    <th>EPS Traslado</th>
                    <th>CCF</th>
                    <th>Días AFP</th>
                    <th>Días EPS</th>
                    <th>Días ARL</th>
                    <th>Días CCF</th>
                    <th>Salario básico</th>
                    <th>Tipo Salario</th>
                    <th>IBC AFP</th>
                    <th>IBC EPS</th>
                    <th>IBC ARL</th>
                    <th>IBC CCF</th>
                    <th>Tarifa AFP</th>
                    <th>Cotización AFP</th>
                    <th>AVP afiliado</th>
                    <th>AVP aportante</th>
                    <th>Total AFP</th>
                    <th>Aporte FSP</th>
                    <th>Aporte FSPS</th>
                    <th>Valor no retenido</th>
                    <th>Tarifa EPS</th>
                    <th>Cotización EPS</th>
                    <th>Valor UPC</th>
                    <th>Número IGE</th>
                    <th>Valor IGE</th>
                    <th>Número LMA</th>
                    <th>Valor LMA</th>
                    <th>Tarifa ARL</th>
                    <th>Centro de trabajo</th>
                    <th>Cotización ARL</th>
                    <th>Tarifa CCF</th>
                    <th>Aporte CCF</th>
                    <th>Tarifa SENA</th>
                    <th>Aporte SENA</th>
                    <th>Tarifa ICBF</th>
                    <th>Aporte ICBF</th>
                    <th>Tarifa ESAP</th>
                    <th>Aporte ESAP</th>
                    <th>Tarifa MEN</th>
                    <th>Aporte MEN</th>
                    <th>Tipo documento UPC</th>
                    <th>Documento UPC</th>
                    <th>Exonerado</th>
                    <th>ARL</th>
                    <th>Clase riesgo</th>
                    <th>Tarifa especial AFP</th>
                    <th>Fecha ING</th>
                    <th>Fecha RET</th>
                    <th>Fecha inicio VSP</th>
                    <th>Fecha inicio SLN</th>
                    <th>Fecha final SLN</th>
                    <th>Fecha inicio IGE</th>
                    <th>Fecha final IGE</th>
                    <th>Fecha inicio LMA</th>
                    <th>Fecha final LMA</th>
                    <th>Fecha inicio VAC-LR</th>
                    <th>Fecha final VAC-LR</th>
                    <th>Fecha inicio VCT</th>
                    <th>Fecha final VCT</th>
                    <th>Fecha inicio IRL</th>
                    <th>Fecha final IRL</th>
                    <th>IBC otros parafiscales</th>
                    <th>Número horas laboradas</th>
                    <th>Fecha radicación exterior</th>
                    <th>Actividad económica para ARL</th>
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
                        <td>2</td>
                        <td>{{ $contador++ }}</td>
                        <td>{{ $detalle->afiliado->tdocumentos->alias ?? '' }}</td>
                        <td>{{ $detalle->afiliado->documento ?? '' }}</td>
                        <td>1</td>
                        @if ($contrato->afp_id == "10")
                            <td>1</td>
                        @else 
                            <td>0</td>
                        @endif 
                        <td></td><td></td>
                        <td>76</td><td>1</td>
                        <td>{{ $detalle->afiliado->papellido ?? '' }}</td>
                        <td>{{ $detalle->afiliado->sapellido ?? '' }}</td>
                        <td>{{ $detalle->afiliado->pnombre ?? '' }}</td>
                        <td>{{ $detalle->afiliado->snombre ?? '' }}</td> 
                        @if ($pago->novedad == "Todos los sistemas (ARL, AFP, CCF, EPS)")
                                <td>X</td>
                            @else
                                <td></td>
                            @endif
                              @if ($pago->novedad == "Retiro Todos los sistemas (ARL, AFP, CCF, EPS)")
                                <td>X</td>
                            @else
                                <td></td>
                            @endif
                            <td></td><td></td><td></td><td></td><td></td><td></td>
                            <td></td><td></td><td></td><td></td><td></td><td></td><td></td><td>0</td>
                             @if ($contrato->afp_id == "10")
                                <td></td>
                            @else
                                 <td>{{ $contrato->afp->codigo ?? '' }}</td>
                            @endif
                            <td></td><td>{{ $contrato->eps->codigo ?? '' }}</td><td></td>
                            <td>{{ $contrato->cajas->codigo ?? '' }}</td>
                            @if ($contrato->afp_id == "10")
                                <td>0</td>
                            @else
                                <td>{{ $pago->dias ?? '' }}</td>
                            @endif
                            <td>{{ $pago->dias ?? '' }}</td>
                            <td>{{ $pago->dias ?? '' }}</td>
                            <td>{{ $pago->dias ?? '' }}</td>
                            <td>{{ $pago->salario ?? '' }}</td>
                            <td>F</td>
                            @if ($contrato->afp_id == "10")
                                <td>0</td>
                            @else 
                                <td>{{ $pago->salario ?? '' }}</td>
                            @endif 
                            <td>{{ $pago->salario ?? '' }}</td>
                            <td>{{ $pago->salario ?? '' }}</td>
                            @if ($contrato->caja_id == "3")
                                <td>1</td>
                            @else
                                <td>{{ $pago->salario ?? '' }}</td>
                            @endif
                            <td>{{ $contrato->afp->tarifaafp ?? '' }}</td>

                            @if ($contrato->afp_id == "10")
                                <td>0</td>
                            @else
                                <td>{{ ($pago->salario * 16)/100 ?? '' }}</td>
                            @endif
                            <td>0</td><td>0</td>
                            @if ($contrato->afp_id == "10")
                                <td>0</td>
                            @else
                                <td>{{ ($pago->salario * 16)/100 ?? '' }}</td>
                            @endif
                             <td>0</td><td>0</td><td>0</td><td>{{ $contrato->eps->tarifaeps ?? '' }}</td>
                            <td>{{ ($pago->salario * 4)/100 ?? '' }}</td>
                            <td>0</td><td></td><td>0</td><td></td><td>0</td><td>{{ $contrato->riesgo ?? '' }}
                            <td>0</td><td>{{ $pago->salario * $contrato->riesgo ?? '' }}</td>
                            <td>{{ $contrato->cajas->tarifacaja ?? '' }}
                            <td>{{ $pago->salario * $contrato->cajas->tarifacaja ?? '' }}</td> 
                            <td>0</td><td>0</td><td>0</td><td>0</td><td>0,005</td><td>0</td><td>0,01</td><td>0</td><td></td><td></td>    
                            <td>S</td><td>{{$codigoArl }}</td><td>{{ $contrato->claseArl ?? '' }}</td>
                            <td></td><td>{{$contrato->fecha_ingreso}}</td><td>{{$contrato->fecha_retiro}}</td><td></td><td></td><td></td><td></td><td></td><td></td>
                            <td></td><td></td><td></td><td></td><td></td><td></td><td></td>    
                            <td>0</td><td>240</td> <td></td><td>1900101</td> 
                    </tr>
                @endforeach
            </tbody> 
        </table>
    </body>
</html>