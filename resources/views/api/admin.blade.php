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

    <h1>Admin</h1>


    <div class="group">
        <a name="reporting"></a>
        <h2>Reporting</h2>
        <ul class="samples">

            <li>
                <div class="summary">
                    <p>Status check</p>
                    <p>Health check route to check the status of all downstreams system.</p>

                </div>

                <div class="operation">

                    <div class="method color-GET">
                        GET
                    </div>

                    <div class="request">
                        <div class="url">
                            GET

                            <pre><code>/status</code></pre>

                        </div>
                        Sample request
                        <div class="expanders">

                            <a href="#sample3-url">url</a><span>


        <a href="#sample3-request-headers">headers</a><span>



      <a href="#sample3-request-curl">curl</a><span>
                        </div>
                    </div>

                    <div id="sample3-url" class="collapsible">
                        <pre><code>/status</code></pre>
                    </div>
                    <div id="sample3-request-headers" class="collapsible">
    <pre><code><span class="hljs-attribute">accept</span>: <span class="hljs-string">application/json</span>
</code></pre>
                    </div>
                    <div id="sample3-request-payload" class="collapsible">

                    </div>
                    <div id="sample3-request-attachments" class="collapsible">

                    </div>
                    <div id="sample3-request-curl" class="collapsible">
                        <pre><code class="wrap">curl <span class="hljs-attribute">-X</span> GET <span class="hljs-attribute">-H</span> <span class="hljs-string">"accept: application/json"</span> <span class="hljs-string">"http://my-api.com/status"</span></code></pre>
                    </div>

                    <div class="response">
                        Response 200 OK
                        <div class="expanders">

                            <a href="#sample3-response-headers">headers</a>


                            <a href="#sample3-response-body">body</a>

                        </div>
                    </div>

                    <div id="sample3-response-headers" class="collapsible">
    <pre><code><span class="hljs-attribute">content-type</span>: <span class="hljs-string">application/json</span>
</code></pre>
                    </div>
                    <div id="sample3-response-body" class="collapsible">
    <pre><code>{
  "<span class="hljs-attribute">status</span>": <span class="hljs-value"><span class="hljs-string">"OK"</span>
</span>}</code></pre>
                    </div>

                </div>

            </li>

        </ul>
    </div>


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
