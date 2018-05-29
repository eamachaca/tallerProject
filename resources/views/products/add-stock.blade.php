@extends("_partials.template-admin")
@section("sub-title","Agregar Stock para $product->name")
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
    <div class="col s12">
        <div class="card-panel">
            <div class="row">
                {!! Form::open(['class'=>'col s12','url' => route('products.stock',$product->id)]) !!}
                <div class="row">
                    <div class="input-group-lg col s12">
                        {!! Form::label('quantity', 'Cantidad'); !!}
                        {!! Form::number('quantity',$product->quantity,['id'=>'quantity','min'=>0]) !!}
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