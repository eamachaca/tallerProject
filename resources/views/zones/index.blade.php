@extends("_partials.template-admin")
@section("sub-title","Ver Zonas")
@section('valid',"¿Desea eliminar la Zona?. Se eliminarán todos lo relacionado con la Zona")
@push('scripts')
    {!! Html::script('js/dataTables/jquery.dataTables.js') !!}
    {!! Html::script('js/dataTables/dataTables.buttons.js') !!}
    <script src="/vendor/datatables/buttons.server-side.js"></script>
    {!! $dataTable->scripts() !!}
@endpush
@push('styles')
    {!! Html::style('css/dataTables/jquery.dataTables.css') !!}
    {!! Html::style('css/dataTables/buttons.dataTables.css') !!}
@endpush
@section("admin-content")
    <a  href="{{route('zones.create')}}" class="btn-floating btn-large right waves-effect waves-light cyan"><i class="material-icons">add</i></a>
    {!! $dataTable->table() !!}
@endsection