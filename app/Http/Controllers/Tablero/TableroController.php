<?php

namespace App\Http\Controllers\Tablero;

use App\Http\Controllers\Controller;
use Carbon\Carbon;

use App\Models\Cliente\Cliente;
use App\Models\AnalisisRiesgos\AnalisisRiesgoSocial;
// use App\Models\AnalisisRiesgos\AnalisisRiesgoTecnologico;
// use App\Models\AnalisisRiesgos\AnalisisRiesgoNaturales;
// use App\Models\AnalisisRiesgos\AnalisisRiesgoOtros;

class TableroController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function show()
    {
        $not = 1;

        /*
        |--------------------------------------------------------------------------
        | Cargar análisis reales
        |--------------------------------------------------------------------------
        | De momento el dashboard solo considera análisis de riesgo social.
        |--------------------------------------------------------------------------
        */

        $sociales = AnalisisRiesgoSocial::where('status_delete', 1)->get();

        $allAnalisis = $sociales->map(function ($item) {
            return [
                'id' => $item->id,
                'cliente_id' => $item->cliente_id ?? null,
                'tipo' => 'Riesgo Social',
                'tipo_class' => 'social',
                'nivel_riesgo' => (float) ($item->nivel_riesgo ?? 0),
                'evento' => $item->eventos_riesgo ?? $item->factores_riesgo ?? 'Sin descripción registrada',
                'created_at' => $item->created_at,
                'updated_at' => $item->updated_at,
            ];
        });

        /*
        |--------------------------------------------------------------------------
        | Clientes
        |--------------------------------------------------------------------------
        */

        $clientes = Cliente::where('status_delete', 1)->get();

        $clienteIds = $allAnalisis
            ->pluck('cliente_id')
            ->filter()
            ->unique()
            ->values();

        $clientesMap = Cliente::whereIn('id', $clienteIds)
            ->get()
            ->keyBy('id');

        /*
        |--------------------------------------------------------------------------
        | Distribución por nivel de riesgo
        |--------------------------------------------------------------------------
        */

        $riskCounts = [
            'muy_alto' => 0,
            'alto' => 0,
            'medio' => 0,
            'bajo' => 0,
            'muy_bajo' => 0,
        ];

        foreach ($allAnalisis as $row) {
            $riesgo = (float) ($row['nivel_riesgo'] ?? 0);

            if ($riesgo >= 36.10) {
                $riskCounts['muy_alto']++;
            } elseif ($riesgo >= 16.10) {
                $riskCounts['alto']++;
            } elseif ($riesgo >= 6.50) {
                $riskCounts['medio']++;
            } elseif ($riesgo >= 1.50) {
                $riskCounts['bajo']++;
            } else {
                $riskCounts['muy_bajo']++;
            }
        }

        $totalAnalisis = $allAnalisis->count();

        $dashStats = [
            'total' => $totalAnalisis,
            'muy_alto' => $riskCounts['muy_alto'],
            'alto' => $riskCounts['alto'],
            'medio' => $riskCounts['medio'],
            'bajo' => $riskCounts['bajo'],
            'muy_bajo' => $riskCounts['muy_bajo'],
            'no_aceptables' => $riskCounts['muy_alto'] + $riskCounts['alto'] + $riskCounts['medio'],
            'aceptables' => $riskCounts['bajo'] + $riskCounts['muy_bajo'],
            'clientes' => $clientes->count(),
        ];

        /*
        |--------------------------------------------------------------------------
        | Recientes
        |--------------------------------------------------------------------------
        */

        $recentAnalyses = $allAnalisis
            ->sortByDesc(function ($row) {
                return $row['created_at'] ?: now()->subYears(10);
            })
            ->take(5)
            ->values()
            ->map(function ($row, $index) use ($clientesMap) {
                $cliente = $clientesMap->get($row['cliente_id']);

                return [
                    'id' => $row['id'],
                    'cliente_id' => $row['cliente_id'],
                    'escenario' => 'E.' . ($index + 1),
                    'cliente' => $cliente->organizacion
                        ?? $cliente->nombre_comercial
                        ?? $cliente->razon_social
                        ?? 'Sin cliente',
                    'tipo' => $row['tipo'],
                    'tipo_class' => $row['tipo_class'],
                    'evento' => $row['evento'],
                    'nivel' => $this->getNivelRiesgoLabel($row['nivel_riesgo']),
                    'nivel_key' => $this->getNivelRiesgoKey($row['nivel_riesgo']),
                    'fecha' => $row['created_at']
                        ? Carbon::parse($row['created_at'])->format('d/m/Y')
                        : 'Sin fecha',
                    'hace' => $row['created_at']
                        ? Carbon::parse($row['created_at'])->diffForHumans()
                        : '',
                ];
            });

        $recentActivity = $allAnalisis
            ->sortByDesc(function ($row) {
                return $row['updated_at'] ?: $row['created_at'] ?: now()->subYears(10);
            })
            ->take(5)
            ->values()
            ->map(function ($row) use ($clientesMap) {
                $cliente = $clientesMap->get($row['cliente_id']);

                $clienteNombre = $cliente->organizacion
                    ?? $cliente->nombre_comercial
                    ?? $cliente->razon_social
                    ?? 'Sin cliente';

                $updatedAt = $row['updated_at'] ? Carbon::parse($row['updated_at']) : null;
                $createdAt = $row['created_at'] ? Carbon::parse($row['created_at']) : null;

                $isUpdate = $updatedAt && $createdAt && $updatedAt->greaterThan($createdAt);

                return [
                    'tipo_class' => $row['tipo_class'],
                    'text' => $isUpdate
                        ? 'Se actualizó un análisis de ' . $clienteNombre
                        : 'Se creó un análisis de ' . $clienteNombre,
                    'subtext' => $row['tipo'] . ' · ' . $this->getNivelRiesgoLabel($row['nivel_riesgo']),
                    'hace' => $updatedAt
                        ? $updatedAt->diffForHumans()
                        : ($createdAt ? $createdAt->diffForHumans() : ''),
                ];
            });

        /*
        |--------------------------------------------------------------------------
        | Clientes preview
        |--------------------------------------------------------------------------
        */

        $analisisPorCliente = $allAnalisis
            ->groupBy('cliente_id')
            ->map(function ($rows) {
                return $rows->count();
            });

        $clientesPreview = $clientes
            ->take(5)
            ->map(function ($cliente, $index) use ($analisisPorCliente) {
                return [
                    'no' => $index + 1,
                    'id' => $cliente->id,
                    'nombre' => $cliente->organizacion
                        ?? $cliente->nombre_comercial
                        ?? $cliente->razon_social
                        ?? 'Sin nombre',
                    'razon_social' => $cliente->razon_social ?? 'Sin dato',
                    'contacto' => $cliente->contacto ?? $cliente->responsable ?? 'Sin dato',
                    'telefono' => $cliente->telefono ?? $cliente->celular ?? 'Sin dato',
                    'email' => $cliente->email ?? 'Sin dato',
                    'analisis' => $analisisPorCliente[$cliente->id] ?? 0,
                ];
            });

        /*
        |--------------------------------------------------------------------------
        | Evolución mensual últimos 6 meses
        |--------------------------------------------------------------------------
        */

        $monthlyEvolution = [];

        for ($i = 5; $i >= 0; $i--) {
            $month = now()->subMonths($i)->startOfMonth();
            $monthEnd = $month->copy()->endOfMonth();

            $monthlyEvolution[] = [
                'label' => ucfirst($month->locale('es')->isoFormat('MMM')),
                'total' => $allAnalisis->filter(function ($row) use ($month, $monthEnd) {
                    if (!$row['created_at']) return false;

                    $created = Carbon::parse($row['created_at']);
                    return $created->between($month, $monthEnd);
                })->count(),
                'criticos' => $allAnalisis->filter(function ($row) use ($month, $monthEnd) {
                    if (!$row['created_at']) return false;

                    $created = Carbon::parse($row['created_at']);
                    $riesgo = (float) ($row['nivel_riesgo'] ?? 0);

                    return $created->between($month, $monthEnd) && $riesgo >= 16.10;
                })->count(),
            ];
        }

        return view('tablero.show', compact(
            'not',
            'dashStats',
            'riskCounts',
            'recentAnalyses',
            'recentActivity',
            'clientesPreview',
            'monthlyEvolution'
        ));
    }

    private function getNivelRiesgoLabel($riesgo)
    {
        $riesgo = (float) $riesgo;

        if ($riesgo >= 36.10) return 'Muy Alto';
        if ($riesgo >= 16.10) return 'Alto';
        if ($riesgo >= 6.50) return 'Medio';
        if ($riesgo >= 1.50) return 'Bajo';

        return 'Muy Bajo';
    }

    private function getNivelRiesgoKey($riesgo)
    {
        $riesgo = (float) $riesgo;

        if ($riesgo >= 36.10) return 'muy-alto';
        if ($riesgo >= 16.10) return 'alto';
        if ($riesgo >= 6.50) return 'medio';
        if ($riesgo >= 1.50) return 'bajo';

        return 'muy-bajo';
    }
}