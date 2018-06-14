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

    <h1>Events</h1>


    <div class="group">
        <a name="competitions"></a>
        <h2>Competitions</h2>
        <ul class="samples">

            <li>
                <div class="summary">
                    <p>Competitions by sport</p>
                    <ul>
                        <li>List of <strong>open</strong> competitions for a given sport.</li>
                        <li>Returns all countries by default.    </li>
                    </ul>

                </div>

                <div class="operation">

                    <div class="method color-GET">
                        GET
                    </div>

                    <div class="request">
                        <div class="url">
                            GET

                            <pre><code>/sports/<span class="hljs-attribute">:id</span>/competitions</code></pre>

                        </div>
                        Sample request
                        <div class="expanders">

                            <a href="#sample1-url">url</a><span>


        <a href="#sample1-request-headers">headers</a><span>



      <a href="#sample1-request-curl">curl</a><span>
                        </div>
                    </div>

                    <div id="sample1-url" class="collapsible">
                        <pre><code>/sports/1/competitions</code></pre>
                    </div>
                    <div id="sample1-request-headers" class="collapsible">
    <pre><code><span class="hljs-attribute">accept</span>: <span class="hljs-string">application/json</span>
</code></pre>
                    </div>
                    <div id="sample1-request-payload" class="collapsible">

                    </div>
                    <div id="sample1-request-attachments" class="collapsible">

                    </div>
                    <div id="sample1-request-curl" class="collapsible">
                        <pre><code class="wrap">curl <span class="hljs-attribute">-X</span> GET <span class="hljs-attribute">-H</span> <span class="hljs-string">"accept: application/json"</span> <span class="hljs-string">"http://my-api.com/sports/1/competitions"</span></code></pre>
                    </div>

                    <div class="response">
                        Response 200 OK
                        <div class="expanders">

                            <a href="#sample1-response-headers">headers</a>


                            <a href="#sample1-response-body">body</a>

                        </div>
                    </div>

                    <div id="sample1-response-headers" class="collapsible">
    <pre><code><span class="hljs-attribute">content-type</span>: <span class="hljs-string">application/json</span>
</code></pre>
                    </div>
                    <div id="sample1-response-body" class="collapsible">
    <pre><code>{
  "<span class="hljs-attribute">competitions</span>": <span class="hljs-value">[
    {
      "<span class="hljs-attribute">id</span>": <span class="hljs-value"><span class="hljs-number">1</span></span>,
      "<span class="hljs-attribute">country</span>": <span class="hljs-value"><span class="hljs-string">"gb"</span></span>,
      "<span class="hljs-attribute">name</span>": <span class="hljs-value"><span class="hljs-string">"English premier league"</span>
    </span>},
    {
      "<span class="hljs-attribute">id</span>": <span class="hljs-value"><span class="hljs-number">2</span></span>,
      "<span class="hljs-attribute">country</span>": <span class="hljs-value"><span class="hljs-string">"fr"</span></span>,
      "<span class="hljs-attribute">name</span>": <span class="hljs-value"><span class="hljs-string">"Coupe de France"</span>
    </span>}
  ]
</span>}</code></pre>
                    </div>

                </div>

            </li>

            <li>
                <div class="summary">
                    <p>Filter by country</p>
                    <ul>
                        <li>Only get competitions for a given country</li>
                        <li>Uses the official ISO <a href="http://en.wikipedia.org/wiki/ISO_3166-1">country codes</a></li>
                    </ul>

                </div>

                <div class="operation">

                    <div class="method color-GET">
                        GET
                    </div>

                    <div class="request">
                        <div class="url">
                            GET

                            <pre><code>/sports/<span class="hljs-attribute">:id</span>/competitions?country=<span class="hljs-attribute">$country</span></code></pre>

                        </div>
                        Sample request
                        <div class="expanders">

                            <a href="#sample2-url">url</a><span>


        <a href="#sample2-request-headers">headers</a><span>



      <a href="#sample2-request-curl">curl</a><span>
                        </div>
                    </div>

                    <div id="sample2-url" class="collapsible">
                        <pre><code>/sports/1/competitions?country=fr</code></pre>
                    </div>
                    <div id="sample2-request-headers" class="collapsible">
    <pre><code><span class="hljs-attribute">accept</span>: <span class="hljs-string">application/json</span>
</code></pre>
                    </div>
                    <div id="sample2-request-payload" class="collapsible">

                    </div>
                    <div id="sample2-request-attachments" class="collapsible">

                    </div>
                    <div id="sample2-request-curl" class="collapsible">
                        <pre><code class="wrap">curl <span class="hljs-attribute">-X</span> GET <span class="hljs-attribute">-H</span> <span class="hljs-string">"accept: application/json"</span> <span class="hljs-string">"http://my-api.com/sports/1/competitions?country=fr"</span></code></pre>
                    </div>

                    <div class="response">
                        Response 200 OK
                        <div class="expanders">

                            <a href="#sample2-response-headers">headers</a>


                            <a href="#sample2-response-body">body</a>

                        </div>
                    </div>

                    <div id="sample2-response-headers" class="collapsible">
    <pre><code><span class="hljs-attribute">content-type</span>: <span class="hljs-string">application/json</span>
</code></pre>
                    </div>
                    <div id="sample2-response-body" class="collapsible">
    <pre><code>{
  "<span class="hljs-attribute">competitions</span>": <span class="hljs-value">[
    {
      "<span class="hljs-attribute">id</span>": <span class="hljs-value"><span class="hljs-number">2</span></span>,
      "<span class="hljs-attribute">country</span>": <span class="hljs-value"><span class="hljs-string">"fr"</span></span>,
      "<span class="hljs-attribute">name</span>": <span class="hljs-value"><span class="hljs-string">"Coupe de France"</span>
    </span>}
  ]
</span>}</code></pre>
                    </div>

                </div>

            </li>

        </ul>
    </div>

    <div class="group">
        <a name="sports"></a>
        <h2>Sports</h2>
        <ul class="samples">

            <li>
                <div class="summary">
                    <p>Get list of sports</p>
                    <ul>
                        <li>list is ordered alphabetically</li>
                        <li>doesn&#39;t return sports with no active competitions</li>
                    </ul>

                </div>

                <div class="operation">

                    <div class="method color-GET">
                        GET
                    </div>

                    <div class="request">
                        <div class="url">
                            GET

                            <pre><code>/sports</code></pre>

                        </div>
                        Sample request
                        <div class="expanders">

                            <a href="#sample0-url">url</a><span>


        <a href="#sample0-request-headers">headers</a><span>



      <a href="#sample0-request-curl">curl</a><span>
                        </div>
                    </div>

                    <div id="sample0-url" class="collapsible">
                        <pre><code>/sports</code></pre>
                    </div>
                    <div id="sample0-request-headers" class="collapsible">
    <pre><code><span class="hljs-attribute">accept</span>: <span class="hljs-string">application/json</span>
</code></pre>
                    </div>
                    <div id="sample0-request-payload" class="collapsible">

                    </div>
                    <div id="sample0-request-attachments" class="collapsible">

                    </div>
                    <div id="sample0-request-curl" class="collapsible">
                        <pre><code class="wrap">curl <span class="hljs-attribute">-X</span> GET <span class="hljs-attribute">-H</span> <span class="hljs-string">"accept: application/json"</span> <span class="hljs-string">"http://my-api.com/sports"</span></code></pre>
                    </div>

                    <div class="response">
                        Response 200 OK
                        <div class="expanders">

                            <a href="#sample0-response-headers">headers</a>


                            <a href="#sample0-response-body">body</a>

                        </div>
                    </div>

                    <div id="sample0-response-headers" class="collapsible">
    <pre><code><span class="hljs-attribute">content-type</span>: <span class="hljs-string">application/json</span>
</code></pre>
                    </div>
                    <div id="sample0-response-body" class="collapsible">
    <pre><code>{
  "<span class="hljs-attribute">sports</span>": <span class="hljs-value">[
    {
      "<span class="hljs-attribute">id</span>": <span class="hljs-value"><span class="hljs-number">1</span></span>,
      "<span class="hljs-attribute">name</span>": <span class="hljs-value"><span class="hljs-string">"Soccer"</span>
    </span>},
    {
      "<span class="hljs-attribute">id</span>": <span class="hljs-value"><span class="hljs-number">2</span></span>,
      "<span class="hljs-attribute">name</span>": <span class="hljs-value"><span class="hljs-string">"Tennis"</span>
    </span>}
  ]
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