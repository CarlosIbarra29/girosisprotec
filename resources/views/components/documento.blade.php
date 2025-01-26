<div>
    <p>
    <a href="{{ $urlGestorDocumentos }}/archivo/documento-gestor/{{ $documento->id }}" target="_blank" data-theme="dark" title="Descargar" data-toggle="tooltip">
        <i class="flaticon-download icon-1x text-primary"></i>
        {{ $documento->licitacionGestorTipoDocumento->informacion }} - {{ date('d/m/Y', strtotime($documento->fecha)) }}
    </a>
    <br>
    <small class="text-muted">
        <strong>Comentario:</strong> {{ $documento->comentario }} <br>
        <strong>Archivo:</strong> {{ $documento->documento }}
    </small>
</p>
</div>