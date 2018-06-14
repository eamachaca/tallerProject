<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>API documentation</title>
    {!! Html::style('css/foundation.min.css') !!}
    {!! Html::style('css/styles.css') !!}
    {!! Html::style('css/highlight.github.css') !!}

    {!! Html::style('custom.css') !!}

</head>


<body class="antialiased hide-extras">

<div class="sidebar-top">
    <div class="logo"></div>
    API documentation
</div>

<div class="sidebar">

    <form>
        <input tabindex="1" id="autocomplete" type="search"
               placeholder="search" autocomplete="off" />
    </form>

    <nav>
        <ul class="side-nav">



            <li class="divider"></li>

            <li class="heading">
                <a href="{{route('api.index')}}">Intro</a>
            </li>


            <li>
                <a href="{{route('api.index')}}#event-information" data-search="Event information">
                    Event information

                </a>
            </li>

            <li>
                <a href="{{route('api.index')}}#authenticated-calls" data-search="Authenticated calls">
                    Authenticated calls

                </a>
            </li>




            <li class="divider"></li>

            <li class="heading">
                <a href="{{route('api.admin')}}">Admin</a>
            </li>


            <li>
                <a href="{{route('api.admin')}}#reporting" data-search="Reporting">
                    Reporting

                    <span class="label">1</span>

                </a>
            </li>




            <li class="divider"></li>

            <li class="heading">
                <a href="{{route('api.events')}}">Events</a>
            </li>


            <li>
                <a href="{{route('api.events')}}#competitions" data-search="Competitions">
                    Competitions

                    <span class="label">2</span>

                </a>
            </li>

            <li>
                <a href="{{route('api.events')}}#sports" data-search="Sports">
                    Sports

                    <span class="label">1</span>

                </a>
            </li>




            <li class="divider"></li>

            <li class="heading">
                <a href="{{route('api.user')}}">User</a>
            </li>


            <li>
                <a href="{{route('api.user')}}#tickets" data-search="Tickets">
                    Tickets

                    <span class="label">3</span>

                </a>
            </li>




        </ul>
    </nav>

</div>


<div class="content-top"></div>
<div class="content">
    <a name="intro"></a>
    <h1>Intro</h1><p>This is a sample API that doesn&#39;t do much.
        It has:</p>
    <ul>
        <li>several resources</li>
        <li>a mix of HTTP verbs</li>
        <li>up to date documentation :)</li>
    </ul>
    <a name="event-information"></a>
    <h2>Event information</h2><p>All informational resources are cacheable by proxies or on the client-side. These routes are public, and there is no rate-limiting.</p>
    <a name="authenticated-calls"></a>
    <h2>Authenticated calls</h2><p>You need to pass your custom API token as a request header:</p>
    <pre><code><span class="hljs-attribute">X-API-Token</span>: <span class="hljs-string">76ac098ef08d61b824a</span></code></pre>
</div>

<footer>
    <div class="row">
        <div class="medium-8 columns">
            <ul class="no-bullet">
                <li>
                    Documentation generated on May 27th 2014, 3:18 pm
                </li>
                <li>
                    <a href="http://github.com/rprieto/supersamples">
                        Powered by supersamples
                        <div class="logo">
                            <div class="swatch color-GET"></div>
                            <div class="swatch color-POST"></div>
                            <div class="swatch color-PUT"></div>
                            <div class="swatch color-DELETE"></div>
                        </div>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</footer>


{!! Html::script('scripts/zepto.min.js') !!}
{!! Html::script('scripts/scripts.js') !!}

</body>

</html>