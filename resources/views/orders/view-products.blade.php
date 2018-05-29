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
    <div class="row">
        {!! $dataTable->table() !!}
    </div>
    <div class="row">
        <div class="input-field col push-s5">
            {!! HTML::link(route('orders.index'), 'Volver', ['class' => 'btn waves-effect waves-light']) !!}
        </div>
    </div>
@endsection