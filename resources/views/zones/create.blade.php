@extends("_partials.template-admin")
@section("sub-title","Crear Zona")

@push('styles')
    {!! Html::style('css/leaflet/leaflet.css') !!}
    {!! Html::style('css/color-picker/colorpicker.css') !!}
    {!! Html::style('css/leaflet/leaflet.draw.css') !!}
@endpush
@push('scripts')
    {!! Html::script('js/leaflet/leaflet.js') !!}
    {!! Html::script('js/color-picker/colorpicker.js') !!}
    {!! Html::script('js/leaflet/leaflet.draw.js') !!}
    <script>
        var map = new L.Map('map', {layers: [new L.TileLayer('http://{s}.tile.osm.org/{z}/{x}/{y}.png', {maxZoom: 25})], center: new L.LatLng(-17.787102857913244, -63.180813266775075), zoom: 15 });
        var editableLayers = new L.FeatureGroup();
        map.addLayer(editableLayers);
        var zoneLayer;
        var drawControl = new L.Control.Draw({
            position: 'bottomright',
            draw: {
                polyline: false,
                polygon: {
                    showLength: true,
                    allowIntersection: false, // Restricts shapes to simple polygons
                    drawError: {
                        color: 'red', // Color the shape will turn when intersects
                        message: '<strong>Oh snap!<strong> you can\'t draw that!' // Message that will show when intersect
                    },
                    shapeOptions: {
                        stroke: true,
                        color: "@yield('color','#000000')",
                        weight: 4,
                        opacity: 0.5,
                        fill: true,
                        clickable: true
                    }
                },
                circle: false,
                circlemarker: false,
                rectangle: false,
                marker: false,
            },
            edit: {
                featureGroup: editableLayers, //REQUIRED!!
            }
        });
        var drawControlEdit = new L.Control.Draw({
            position: 'bottomright',
            draw: false,
            edit: {
                featureGroup: editableLayers, //REQUIRED!!
            }
        });
        @if ($__env->yieldContent('edit',true))
        map.addControl(drawControl);
        @else
        map.addControl(drawControlEdit);
        zoneLayer=L.GeoJSON.geometryToLayer({!! $zone->geo_json !!},{
            stroke: true,
            color: "@yield('color','#000000')",
            weight: 4,
            opacity: 0.5,
            fill: true,
            clickable: true
        });
        zoneLayer.addTo(map);
        editableLayers.addLayer(zoneLayer);
        map.fitBounds(zoneLayer.getBounds());
        @endif
        map.on(L.Draw.Event.CREATED, function (e) {
            zoneLayer=e.layer;
            let type = e.layerType,
                latlngs = zoneLayer._defaultShape ? zoneLayer._defaultShape() : zoneLayer.getLatLngs(),
                area = L.GeometryUtil.geodesicArea(latlngs),
                popUp = "El Area de la Zona será de: "+L.GeometryUtil.readableArea(area, true);
            zoneLayer.bindPopup(popUp);
            editableLayers.addLayer(zoneLayer);
            map.removeControl(drawControl);
            map.addControl(drawControlEdit);
            $('#geo-json').val(JSON.stringify(zoneLayer.toGeoJSON()));
        });

        map.on(L.Draw.Event.EDITED, function (e) {
            var layers = e.layers;
            layers.eachLayer(function (layer) {
                zoneLayer=layer;
            });
            $('#geo-json').val(JSON.stringify(zoneLayer.toGeoJSON()));
        });

        map.on(L.Draw.Event.DELETED, function (e) {
            map.removeControl(drawControlEdit);
            map.addControl(drawControl);
        });
    </script>
@endpush

@section("admin-content")
    @if(!empty($errors->all()))
        @include('_partials.errors')
    @endif
    <!-- Form with placeholder -->
    <div class="col s12">
        <div class="card-panel">
            <div class="row">
                {!! Form::open(['clas'=>'col s12','url' => $__env->yieldContent('form',route('zones.store')), 'method' => $__env->yieldContent('method','post')]) !!}
                <div class="row">
                    <div class="input-field col s12">
                        {!! Form::text('name',$__env->yieldContent('name',null),['placeholder'=>'Nombre de la Zona']) !!}
                        {!! Form::label('name', 'Nombre'); !!}
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12">
                        {!! Form::text('color',$__env->yieldContent('color',null),['id'=>'colorpicker']) !!}
                        {!! Form::label('color', 'Color'); !!}
                    </div>
                </div>
                <div class="row">
                    <div class="col s12" id="map" style="width: 100%; height: 500px;">
                    </div>
                    <div class="input-field">
                        {{ Form::hidden('geo_json', $__env->yieldContent('geo-json',null), array('id' => 'geo-json')) }}
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col push-s4">
                        {!! Form::button('Save', ['type'=>'submit','class' => 'btn waves-effect waves-light']) !!}
                        {!! HTML::link(route('zones.index'), 'Cancel', ['class' => 'btn waves-effect waves-light']) !!}
                    </div>
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection

@push('ready')
    $('#colorpicker').ColorPicker({
        onChange: function(shb,hex,rgb){
            $('#colorpicker').val('#'+hex).change();
            if(zoneLayer){
                map.removeLayer(zoneLayer);
                zoneLayer.options.color = '#'+hex;
                map.addLayer(zoneLayer);
            }
            drawControl.options.draw.polygon.shapeOptions.color = '#'+hex;
        }
    }).bind('keyup', function(){
        $(this).ColorPickerSetColor(this.value);
    });
    $('#colorpicker').on('change',function (evt) {
        $('#colorpicker').css("background-color",$('#colorpicker').val());
        $('#colorpicker').css("color",$('#colorpicker').val());
    });
    $('#colorpicker').val("@yield('color','#000000')").change();
    $('#colorpicker').ColorPickerSetColor("@yield('color','#000000')");
@endpush