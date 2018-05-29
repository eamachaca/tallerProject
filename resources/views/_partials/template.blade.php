<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>@yield("title","Proyecto Taller de Grado")</title>

    <!-- CORE CSS-->
    {!! Html::style('css/materialize/materialize.css') !!}
    {!! Html::style('css/style.css') !!}
    <!-- Custome CSS-->
    {!! Html::style('css/custom/custom-style.css') !!}

    <!-- INCLUDED PLUGIN CSS ON THIS PAGE -->
    {!! Html::style('js/plugins/prism/prism.css') !!}
    {!! Html::style('js/plugins/animate-css/animate.css') !!}
    {!! Html::style('js/plugins/perfect-scrollbar/perfect-scrollbar.css') !!}

    @stack('styles')

</head>
<body>
@yield("content")
<!-- ================================================
	Scripts
	================================================ -->

    <!-- jQuery Library -->
    {!! Html::script('js/jquery/jquery.js') !!}

    <!--materialize js-->
    {!! Html::script('js/materialize/materialize.js') !!}
    <!--prism-->
    {!! Html::script('js/plugins/prism/prism.js') !!}
    <!--scrollbar-->
    {!! Html::script('js/plugins/perfect-scrollbar/perfect-scrollbar.min.js') !!}

    @stack('scripts')
    <!--plugins.js - Some Specific JS codes for Plugin Settings-->
    {!! Html::script('js/plugins.js') !!}
    <!--custom-script.js - Add your own theme custom JS-->
    {!! Html::script('js/custom-script.js') !!}
    <script>
        $(document).ready(function() {
            @stack('ready')
            if(('table').length!=0){
                $('table').css('width','100%');
            }
        });
    </script>
</body>
</html>