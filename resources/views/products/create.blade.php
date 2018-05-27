@extends("_partials.template-admin")
@section("sub-title","Crear Productos")

@section("admin-content")

    <!-- Form with placeholder -->
    <div class="col s12">
        <div class="card-panel">
            <div class="row">
                {!! Form::open(['clas'=>'col s12','url' => route('products.store'), 'method' => 'post']) !!}
                    <div class="row">
                        <div class="input-field col s12">
                            {!! Form::text('name',$__env->yieldContent('name',null),['placeholder'=>'Nombre del Producto']) !!}
                            {!! Form::label('name', 'Nombre'); !!}
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12">
                            {!!  Form::number( 'price', $__env->yieldContent('price',null), ['placeholder'=>'Precio del Producto','id' => 'price', 'step'=>'any', 'min' => 1, 'max' => 9999, 'required' => 'required']) !!}
                            {!! Form::label('price', 'Precio'); !!}
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection