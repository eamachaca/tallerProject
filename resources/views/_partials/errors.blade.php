@foreach ($errors->all() as $error)
    <div id="card-alert-{!! $loop->index !!}" class="card-panel red">{{ $error }}</div>
@endforeach

@push('scripts')
    <script>
        function hide(i=0) {
            if ( i < {!! count($errors->all()) !!}){
                setTimeout(function () {
                    $('#card-alert-'+i).animateCss('fadeOutDownBig', function() {
                        $('#card-alert-'+i).remove();
                        hide(i+1);
                    });
                },500);
            }
        }
    </script>
@endpush
@push('ready')
    setTimeout(hide,1500);
@endpush