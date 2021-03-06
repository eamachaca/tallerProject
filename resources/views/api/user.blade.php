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

    <h1>User</h1>


    <div class="group">
        <a name="tickets"></a>
        <h2>Tickets</h2>
        <ul class="samples">

            <li>
                <div class="summary">
                    <p>Buying tickets</p>
                    <ul>
                        <li>this is an <strong>authenticated</strong> call</li>
                        <li>you can purchase multiple tickets at once</li>
                        <li>keep your ticket numbers somewhere safe</li>
                    </ul>

                </div>

                <div class="operation">

                    <div class="method color-POST">
                        POST
                    </div>

                    <div class="request">
                        <div class="url">
                            POST

                            <pre><code>/tickets</code></pre>

                        </div>
                        Sample request
                        <div class="expanders">

                            <a href="#sample4-url">url</a><span>


        <a href="#sample4-request-headers">headers</a><span>


        <a href="#sample4-request-payload">payload</a>


      <a href="#sample4-request-curl">curl</a><span>
                        </div>
                    </div>

                    <div id="sample4-url" class="collapsible">
                        <pre><code>/tickets</code></pre>
                    </div>
                    <div id="sample4-request-headers" class="collapsible">
    <pre><code><span class="hljs-attribute">content-type</span>: <span class="hljs-string">application/json</span>
<span class="hljs-attribute">accept</span>: <span class="hljs-string">application/json</span>
<span class="hljs-attribute">content-length</span>: <span class="hljs-string">32</span>
</code></pre>
                    </div>
                    <div id="sample4-request-payload" class="collapsible">
    <pre><code>{
  "<span class="hljs-attribute">competitionId</span>": <span class="hljs-value"><span class="hljs-number">4</span></span>,
  "<span class="hljs-attribute">quantity</span>": <span class="hljs-value"><span class="hljs-number">3</span>
</span>}</code></pre>
                    </div>
                    <div id="sample4-request-attachments" class="collapsible">

                    </div>
                    <div id="sample4-request-curl" class="collapsible">
                        <pre><code class="wrap">curl <span class="hljs-attribute">-X</span> POST <span class="hljs-attribute">-H</span> <span class="hljs-string">"content-type: application/json"</span> <span class="hljs-attribute">-H</span> <span class="hljs-string">"accept: application/json"</span> <span class="hljs-attribute">-H</span> <span class="hljs-string">"content-length: 32"</span> <span class="hljs-attribute">-d</span> <span class="hljs-string">'{"competitionId":4,"quantity":3}'</span> <span class="hljs-string">"http://my-api.com/tickets"</span></code></pre>
                    </div>

                    <div class="response">
                        Response 201 Created
                        <div class="expanders">

                            <a href="#sample4-response-headers">headers</a>


                            <a href="#sample4-response-body">body</a>

                        </div>
                    </div>

                    <div id="sample4-response-headers" class="collapsible">
    <pre><code><span class="hljs-attribute">content-type</span>: <span class="hljs-string">application/json</span>
</code></pre>
                    </div>
                    <div id="sample4-response-body" class="collapsible">
    <pre><code>{
  "<span class="hljs-attribute">eventName</span>": <span class="hljs-value"><span class="hljs-string">"Australian Open"</span></span>,
  "<span class="hljs-attribute">tickets</span>": <span class="hljs-value">[
    <span class="hljs-string">"ticket1"</span>,
    <span class="hljs-string">"ticket2"</span>,
    <span class="hljs-string">"ticket3"</span>
  ]
</span>}</code></pre>
                    </div>

                </div>

            </li>

            <li>
                <div class="summary">
                    <p>Cancelling a ticket</p>
                    <ul>
                        <li>this is an <strong>authenticated</strong> call</li>
                        <li>your account will be re-credited with the amount</li>
                    </ul>

                </div>

                <div class="operation">

                    <div class="method color-DELETE">
                        DEL
                    </div>

                    <div class="request">
                        <div class="url">
                            DELETE

                            <pre><code>/tickets/<span class="hljs-attribute">:id</span></code></pre>

                        </div>
                        Sample request
                        <div class="expanders">

                            <a href="#sample5-url">url</a><span>


        <a href="#sample5-request-headers">headers</a><span>



      <a href="#sample5-request-curl">curl</a><span>
                        </div>
                    </div>

                    <div id="sample5-url" class="collapsible">
                        <pre><code>/tickets/123</code></pre>
                    </div>
                    <div id="sample5-request-headers" class="collapsible">
    <pre><code><span class="hljs-attribute">accept</span>: <span class="hljs-string">application/json</span>
</code></pre>
                    </div>
                    <div id="sample5-request-payload" class="collapsible">

                    </div>
                    <div id="sample5-request-attachments" class="collapsible">

                    </div>
                    <div id="sample5-request-curl" class="collapsible">
                        <pre><code class="wrap">curl <span class="hljs-attribute">-X</span> DELETE <span class="hljs-attribute">-H</span> <span class="hljs-string">"accept: application/json"</span> <span class="hljs-string">"http://my-api.com/tickets/123"</span></code></pre>
                    </div>

                    <div class="response">
                        Response 204 No Content
                        <div class="expanders">


                        </div>
                    </div>

                    <div id="sample5-response-headers" class="collapsible">
                        <pre><code></code></pre>
                    </div>
                    <div id="sample5-response-body" class="collapsible">

                    </div>

                </div>

            </li>

            <li>
                <div class="summary">
                    <p>Some sports events require proof of ID for purchase.
                        Before purchasing a ticket, you will need to upload
                        your ID for automated verification.</p>

                </div>

                <div class="operation">

                    <div class="method color-POST">
                        POST
                    </div>

                    <div class="request">
                        <div class="url">
                            POST

                            <pre><code>/account/verify</code></pre>

                        </div>
                        Sample request
                        <div class="expanders">

                            <a href="#sample6-url">url</a><span>


        <a href="#sample6-request-headers">headers</a><span>



        <a href="#sample6-request-attachments">attachments</a>

      <a href="#sample6-request-curl">curl</a><span>
                        </div>
                    </div>

                    <div id="sample6-url" class="collapsible">
                        <pre><code>/account/verify</code></pre>
                    </div>
                    <div id="sample6-request-headers" class="collapsible">
    <pre><code><span class="hljs-attribute">accept</span>: <span class="hljs-string">application/json</span>
<span class="hljs-attribute">content-type</span>: <span class="hljs-string">multipart/form-data; boundary=xsqvs7sodhokot245twruvzhb4pfy13n</span>
</code></pre>
                    </div>
                    <div id="sample6-request-payload" class="collapsible">

                    </div>
                    <div id="sample6-request-attachments" class="collapsible">

      <pre><code class="wrap">
        <div class="attachment">license.jpg</div>
        <img src="data:image/jpg;base64,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" />
      </code></pre>

                    </div>
                    <div id="sample6-request-curl" class="collapsible">
                        <pre><code class="wrap">curl <span class="hljs-attribute">-X</span> POST <span class="hljs-attribute">-H</span> <span class="hljs-string">"accept: application/json"</span> <span class="hljs-attribute">-H</span> <span class="hljs-string">"content-type: multipart/form-data; boundary=xsqvs7sodhokot245twruvzhb4pfy13n"</span> <span class="hljs-attribute">-T</span> <span class="hljs-string">"license.jpg"</span> <span class="hljs-string">"http://my-api.com/account/verify"</span></code></pre>
                    </div>

                    <div class="response">
                        Response 200 OK
                        <div class="expanders">


                            <a href="#sample6-response-body">body</a>

                        </div>
                    </div>

                    <div id="sample6-response-headers" class="collapsible">
                        <pre><code></code></pre>
                    </div>
                    <div id="sample6-response-body" class="collapsible">
    <pre><code>{
  "<span class="hljs-attribute">verificationStatus</span>": <span class="hljs-value"><span class="hljs-string">"pending"</span>
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
