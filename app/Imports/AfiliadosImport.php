<?php

namespace App\Imports;

use App\Models\Afiliado;
use App\Models\contrato;
use App\Models\Pagos;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithBatchInserts;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class AfiliadosImport implements ToModel, WithHeadingRow, WithBatchInserts, WithChunkReading
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */

     // registrar duplicados encontrados
    protected $duplicates = [];

    public function getDuplicates(): array
    {
        return $this->duplicates;
    }

    public function model(array $row)
    {
        // Normalizar y validar datos mínimos
        $documento = isset($row['documento']) ? trim((string) $row['documento']) : null;
        if (empty($documento) || empty($row['pnombre'])) {
            return null;
        }

        // Si ya existe un afiliado con ese documento, registrar y omitir (o actualizar si prefieres)
        $existing = Afiliado::where('documento', $documento)->first();
        if ($existing) {
            // registrar documento duplicado para informar luego
            $this->duplicates[] = $documento;

         // si se omite, retornar null para no crear duplicado
            return null;
        }
        
        // crear nuevo afiliado y, si aplica, contrato asociado
      DB::beginTransaction();
        try {
            $afiliado = Afiliado::create([
                'tdocumento' => $row['tdocumento'] ?? null,  // ajusta el nombre según tu columna Excel
                'documento' => $row['documento'] ?? null,
                'pnombre' => $row['pnombre'] ?? null,
                'snombre' => $row['snombre'] ?? null,
                'papellido' => $row['papellido'] ?? null,
                'sapellido' => $row['sapellido'] ?? null,
                'direccion' => $row['direccion'] ?? null,
                'telefono' => $row['telefono'] ?? null,
                'celular' => $row['celular'] ?? null,
                'email' => $row['email'] ?? null,
                'fecha_nac' => $row['fecha_nac'] ?? null,
                'sexo' => $row['sexo'] ?? 1,
                'user_id' => Auth::id() ?? 1,  // usar usuario logueado
                'ciudad_id' => $row['ciudad_id'] ?? 1030,
                'empresalaboral_id' => $row['empresalaboral_id'] ?? 1,
            ]);

            if ($afiliado && !empty($row['salario'])) {
              $contrato = contrato::create([
                    'afiliado_id' => $afiliado->id,
                    'empresa_id' => $row['empresa_id'] ?? 1,
                    'afp_id' => $row['afp_id'] ?? 1,
                    'eps_id' => $row['eps_id'] ?? 1,
                    'caja_id' => $row['caja_id'] ?? 1,
                    'salario' => $row['salario'] ?? 0,
                    'fecha_ingreso' => $row['fecha_ingreso'] ?? Carbon::now()->toDateString(),
                    'fecha_retiro' => $row['fecha_retiro'] ?? null,
                    'status' => $row['status'] ?? 1,
                    'claseArl' => $row['clasearl'],
                    'riesgo' => $row['riesgo'],
                    'periodo' => '2025-10',
                    'user_id' => Auth::id() ?? 1,
                ]);

                Pagos::create([
                    'codigo' => $row['codigo'] ?? 1,
                    'total_pagado' => '0',
                    'fecha_pago' => $row['fecha_pago'] ?? Carbon::now()->toDateString(),
                    'periodo' => '2025-10',
                    'salario' => '1423500',
                    'nplanilla' => 'Ingreso Afiliacion',
                    'novedad' => 'Todos los sistemas (ARL, AFP, CCF, EPS)',
                    'dias' => '30',
                    'contrato_id' => $contrato->id,
                    'user_id' => Auth::id() ?? 1,
                ]);
            }

        DB::commit();
            
         } catch (\Exception $e) {
            DB::rollBack();
            Log::error('AfiliadosImport error: '.$e->getMessage(), ['row'=>$row]);
            return null;
        }

       
    }

   /*  public function model(array $row)
    {
        // validar que la fila tenga datos mínimos
        if (empty($row['documento']) || empty($row['pnombre'])) {
            return null;
        }

        DB::beginTransaction();
        try {
            // crear afiliado
            $afiliado = Afiliado::create([
                'tdocumento' => $row['tdocumento'] ?? null,  // ajusta el nombre según tu columna Excel
                'documento' => $row['documento'] ?? null,
                'pnombre' => $row['pnombre'] ?? null,
                'snombre' => $row['snombre'] ?? null,
                'papellido' => $row['papellido'] ?? null,
                'sapellido' => $row['sapellido'] ?? null,
                'direccion' => $row['direccion'] ?? null,
                'telefono' => $row['telefono'] ?? null,
                'celular' => $row['celular'] ?? null,
                'email' => $row['email'] ?? null,
                'fecha_nac' => $row['fecha_nac'] ?? null,
                'sexo' => $row['sexo'] ?? 1,
                'user_id' => Auth::id() ?? 1,  // usar usuario logueado
                'ciudad_id' => $row['ciudad_id'] ?? 1030,
                'empresalaboral_id' => $row['empresalaboral_id'] ?? 1,
            ]);

            // crear contrato asociado al afiliado
           if ($afiliado && !empty($row['salario'])) {
                contrato::create([
                    'afiliado_id' => $afiliado->id,
                    'empresa_id' => $row['empresa_id'] ?? 1,
                    'afp_id' => $row['afp_id'] ?? 1,
                    'eps_id' => $row['eps_id'] ?? 1,
                    'caja_id' => $row['caja_id'] ?? 1,
                    'salario' => $row['salario'] ?? 0,
                    'fecha_ingreso' => $row['fecha_ingreso'] ?? Carbon::now()->toDateString(),
                    'status' => $row['status'] ?? 1,
                    'claseArl' => $row['claseArl'] ?? 1,
                    'riesgo' => $row['riesgo'] ?? 0,
                    'periodo' => '2025-10',
                    'user_id' => Auth::id() ?? 1,
                ]);
            }

             DB::commit();
           

        } catch (\Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }  */


    public function batchSize(): int
    {
        return 4000;
    }

    public function chunkSize(): int
    {
        return 4000;
    }
}
