@extends("_partials.template-admin")
@section("sub-title","Crear Productos")

@section("admin-content")

    <!-- Form with placeholder -->
    <div class="col s12">
        <div class="card-panel">
            <div class="row">
                {!! Form::open(['clas'=>'col s12','url' => $__env->yieldContent('form',route('type-products.store')), 'method' => $__env->yieldContent('method','post')]) !!}
                <div class="row">
                    <div class="input-field col s12">
                        {!! Form::text('name',$__env->yieldContent('name',null),['placeholder'=>'Nombre del Producto']) !!}
                        {!! Form::label('name', 'Nombre'); !!}
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12">
                        {!! Form::textarea('description',$__env->yieldContent('description',null),['class'=>'materialize-textarea','placeholder'=>'Escriba una Descripcion del Tipo de Producto','length'=>200]) !!}
                        {!! Form::label('description', 'Descripción'); !!}
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col push-s4">
                        {!! Form::button('Save', ['type'=>'submit','class' => 'btn waves-effect waves-light']) !!}
                        {!! HTML::link(route('type-products.index'), 'Cancel', ['class' => 'btn waves-effect waves-light']) !!}
                    </div>
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection