@extends("_partials.template-admin")
@section("sub-title","Crear Productos")

@push('scripts')
    {!! Html::script('js/jquery.nice-number.js') !!}
    <script>
        $('input[type="number"]').niceNumber({autoSizeBuffer:3});
        $('input').keypress(
            function(event){
                if (event.which == '13') {
                    event.preventDefault();
                    $('input').finish();
                }


            });
    </script>
@endpush
@push('styles')
    {!! Html::style('css/jquery.nice-number.css') !!}
@endpush
@section("admin-content")

    <!-- Form with placeholder -->
    <div class="col s12">
        <div class="card-panel">
            <div class="row">
                {!! Form::open(['clas'=>'col s12','url' => $__env->yieldContent('form',route('products.store')), 'method' => $__env->yieldContent('method','post')]) !!}
                <div class="row">
                    <div class="input-field col s12">
                        {!! Form::text('name',$__env->yieldContent('name',null),['placeholder'=>'Nombre del Producto']) !!}
                        {!! Form::label('name', 'Nombre'); !!}
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12">
                        {!! Form::select('type_product_id',$typeProducts,$__env->yieldContent('selected',null),['class' => 'form-control','required'=>'required  ']) !!}
                        {!! Form::label('type_product_id', 'Tipo de Producto'); !!}
                    </div>
                </div>
                <div class="row">
                    <div class="input-group-lg col s12">
                        {!! Form::label('price', 'Precio'); !!}
                        {!! Form::number('price',$__env->yieldContent('price','0.00'),['id'=>'quantity','min'=>'0','step'=>'0.5','data-decimals'=>'2']) !!}
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col push-s4">
                        {!! Form::button('Save', ['type'=>'submit','class' => 'btn waves-effect waves-light']) !!}
                        {!! HTML::link(route('products.index'), 'Cancel', ['class' => 'btn waves-effect waves-light']) !!}
                    </div>
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection