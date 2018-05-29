@extends("_partials.template-admin")
@section("sub-title","Ver Productos de la Orden#".$order->id)
@push('scripts')
    {!! Html::script('js/dataTables/jquery.dataTables.js') !!}
    {!! Html::script('js/dataTables/dataTables.buttons.js') !!}
    {!! Html::script('vendor/datatables/buttons.server-side.js') !!}
    {!! $dataTable->scripts() !!}
@endpush
@push('styles')
    {!! Html::style('css/dataTables/jquery.dataTables.css') !!}
    {!! Html::style('css/dataTables/buttons.dataTables.css') !!}
@endpush
@section("admin-content")
    {!! $dataTable->table() !!}
@endsection