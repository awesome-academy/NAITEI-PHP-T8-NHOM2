<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title>Sportswear Shop API</title>

    <link href="https://fonts.googleapis.com/css?family=Open+Sans&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset("/vendor/scribe/css/theme-default.style.css") }}" media="screen">
    <link rel="stylesheet" href="{{ asset("/vendor/scribe/css/theme-default.print.css") }}" media="print">

    <script src="https://cdn.jsdelivr.net/npm/lodash@4.17.10/lodash.min.js"></script>

    <link rel="stylesheet"
          href="https://unpkg.com/@highlightjs/cdn-assets@11.6.0/styles/obsidian.min.css">
    <script src="https://unpkg.com/@highlightjs/cdn-assets@11.6.0/highlight.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jets/0.14.1/jets.min.js"></script>

    <style id="language-style">
        /* starts out as display none and is replaced with js later  */
                    body .content .bash-example code { display: none; }
                    body .content .javascript-example code { display: none; }
            </style>

    <script>
        var tryItOutBaseUrl = "http://localhost";
        var useCsrf = Boolean();
        var csrfUrl = "/sanctum/csrf-cookie";
    </script>
    <script src="{{ asset("/vendor/scribe/js/tryitout-5.3.0.js") }}"></script>

    <script src="{{ asset("/vendor/scribe/js/theme-default-5.3.0.js") }}"></script>

</head>

<body data-languages="[&quot;bash&quot;,&quot;javascript&quot;]">

<a href="#" id="nav-button">
    <span>
        MENU
        <img src="{{ asset("/vendor/scribe/images/navbar.png") }}" alt="navbar-image"/>
    </span>
</a>
<div class="tocify-wrapper">
    
            <div class="lang-selector">
                                            <button type="button" class="lang-button" data-language-name="bash">bash</button>
                                            <button type="button" class="lang-button" data-language-name="javascript">javascript</button>
                    </div>
    
    <div class="search">
        <input type="text" class="search" id="input-search" placeholder="Search">
    </div>

    <div id="toc">
                    <ul id="tocify-header-introduction" class="tocify-header">
                <li class="tocify-item level-1" data-unique="introduction">
                    <a href="#introduction">Introduction</a>
                </li>
                            </ul>
                    <ul id="tocify-header-authenticating-requests" class="tocify-header">
                <li class="tocify-item level-1" data-unique="authenticating-requests">
                    <a href="#authenticating-requests">Authenticating requests</a>
                </li>
                            </ul>
                    <ul id="tocify-header-endpoints" class="tocify-header">
                <li class="tocify-item level-1" data-unique="endpoints">
                    <a href="#endpoints">Endpoints</a>
                </li>
                                    <ul id="tocify-subheader-endpoints" class="tocify-subheader">
                                                    <li class="tocify-item level-2" data-unique="endpoints-GETadmin-products-create">
                                <a href="#endpoints-GETadmin-products-create">Show the form for creating a new resource.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETadmin-products--product_products_id--edit">
                                <a href="#endpoints-GETadmin-products--product_products_id--edit">Show the form for editing the specified resource.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-DELETEadmin-products--products_id-">
                                <a href="#endpoints-DELETEadmin-products--products_id-">Remove the specified resource from storage.</a>
                            </li>
                                                                        </ul>
                            </ul>
                    <ul id="tocify-header-product" class="tocify-header">
                <li class="tocify-item level-1" data-unique="product">
                    <a href="#product">Product</a>
                </li>
                                    <ul id="tocify-subheader-product" class="tocify-subheader">
                                                    <li class="tocify-item level-2" data-unique="product-GETadmin-products-trashed">
                                <a href="#product-GETadmin-products-trashed">GET admin/products/trashed</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="product-POSTadmin-products--product_products_id--restore">
                                <a href="#product-POSTadmin-products--product_products_id--restore">POST admin/products/{product_products_id}/restore</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="product-GETadmin-products">
                                <a href="#product-GETadmin-products">GET admin/products</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="product-POSTadmin-products">
                                <a href="#product-POSTadmin-products">POST admin/products</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="product-GETadmin-products--products_id-">
                                <a href="#product-GETadmin-products--products_id-">GET admin/products/{products_id}</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="product-PUTadmin-products--products_id-">
                                <a href="#product-PUTadmin-products--products_id-">PUT admin/products/{products_id}</a>
                            </li>
                                                                        </ul>
                            </ul>
            </div>

    <ul class="toc-footer" id="toc-footer">
                    <li style="padding-bottom: 5px;"><a href="{{ route("scribe.postman") }}">View Postman collection</a></li>
                            <li style="padding-bottom: 5px;"><a href="{{ route("scribe.openapi") }}">View OpenAPI spec</a></li>
                <li><a href="http://github.com/knuckleswtf/scribe">Documentation powered by Scribe ✍</a></li>
    </ul>

    <ul class="toc-footer" id="last-updated">
        <li>Last updated: August 29, 2025</li>
    </ul>
</div>

<div class="page-wrapper">
    <div class="dark-box"></div>
    <div class="content">
        <h1 id="introduction">Introduction</h1>
<aside>
    <strong>Base URL</strong>: <code>http://localhost</code>
</aside>
<pre><code>This documentation aims to provide all the information you need to work with our API.

&lt;aside&gt;As you scroll, you'll see code examples for working with the API in different programming languages in the dark area to the right (or as part of the content on mobile).
You can switch the language used with the tabs at the top right (or from the nav menu at the top left on mobile).&lt;/aside&gt;</code></pre>

        <h1 id="authenticating-requests">Authenticating requests</h1>
<p>This API is not authenticated.</p>

        <h1 id="endpoints">Endpoints</h1>

    

                                <h2 id="endpoints-GETadmin-products-create">Show the form for creating a new resource.</h2>

<p>
</p>



<span id="example-requests-GETadmin-products-create">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost/admin/products/create" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/admin/products/create"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETadmin-products-create">
    </span>
<span id="execution-results-GETadmin-products-create" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETadmin-products-create"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETadmin-products-create"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETadmin-products-create" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETadmin-products-create">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETadmin-products-create" data-method="GET"
      data-path="admin/products/create"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETadmin-products-create', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETadmin-products-create"
                    onclick="tryItOut('GETadmin-products-create');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETadmin-products-create"
                    onclick="cancelTryOut('GETadmin-products-create');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETadmin-products-create"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>admin/products/create</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETadmin-products-create"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETadmin-products-create"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="endpoints-GETadmin-products--product_products_id--edit">Show the form for editing the specified resource.</h2>

<p>
</p>



<span id="example-requests-GETadmin-products--product_products_id--edit">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost/admin/products/1/edit" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/admin/products/1/edit"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETadmin-products--product_products_id--edit">
    </span>
<span id="execution-results-GETadmin-products--product_products_id--edit" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETadmin-products--product_products_id--edit"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETadmin-products--product_products_id--edit"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETadmin-products--product_products_id--edit" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETadmin-products--product_products_id--edit">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETadmin-products--product_products_id--edit" data-method="GET"
      data-path="admin/products/{product_products_id}/edit"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETadmin-products--product_products_id--edit', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETadmin-products--product_products_id--edit"
                    onclick="tryItOut('GETadmin-products--product_products_id--edit');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETadmin-products--product_products_id--edit"
                    onclick="cancelTryOut('GETadmin-products--product_products_id--edit');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETadmin-products--product_products_id--edit"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>admin/products/{product_products_id}/edit</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETadmin-products--product_products_id--edit"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETadmin-products--product_products_id--edit"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>product_products_id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="product_products_id"                data-endpoint="GETadmin-products--product_products_id--edit"
               value="1"
               data-component="url">
    <br>
<p>The ID of the product products. Example: <code>1</code></p>
            </div>
                    </form>

                    <h2 id="endpoints-DELETEadmin-products--products_id-">Remove the specified resource from storage.</h2>

<p>
</p>



<span id="example-requests-DELETEadmin-products--products_id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request DELETE \
    "http://localhost/admin/products/1" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/admin/products/1"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "DELETE",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-DELETEadmin-products--products_id-">
</span>
<span id="execution-results-DELETEadmin-products--products_id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-DELETEadmin-products--products_id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-DELETEadmin-products--products_id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-DELETEadmin-products--products_id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-DELETEadmin-products--products_id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-DELETEadmin-products--products_id-" data-method="DELETE"
      data-path="admin/products/{products_id}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('DELETEadmin-products--products_id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-DELETEadmin-products--products_id-"
                    onclick="tryItOut('DELETEadmin-products--products_id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-DELETEadmin-products--products_id-"
                    onclick="cancelTryOut('DELETEadmin-products--products_id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-DELETEadmin-products--products_id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-red">DELETE</small>
            <b><code>admin/products/{products_id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="DELETEadmin-products--products_id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="DELETEadmin-products--products_id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>products_id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="products_id"                data-endpoint="DELETEadmin-products--products_id-"
               value="1"
               data-component="url">
    <br>
<p>The ID of the products. Example: <code>1</code></p>
            </div>
                    </form>

                <h1 id="product">Product</h1>

    

                                <h2 id="product-GETadmin-products-trashed">GET admin/products/trashed</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-GETadmin-products-trashed">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost/admin/products/trashed" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/admin/products/trashed"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETadmin-products-trashed">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;products&quot;: [
        {
            &quot;id&quot;: 10,
            &quot;categories_id&quot;: 2,
            &quot;product_name&quot;: &quot;Niek Heavyweight - Ghi&quot;,
            &quot;description&quot;: &quot;Heavyweight tee in gray.&quot;,
            &quot;product_price&quot;: 313541.36,
            &quot;stock_quantity&quot;: 69,
            &quot;image_path&quot;: &quot;products/052557dq0g2xmen8c1389259573707.jpg&quot;,
            &quot;specifications&quot;: {
                &quot;size&quot;: [
                    &quot;XS&quot;,
                    &quot;M&quot;,
                    &quot;L&quot;
                ],
                &quot;color&quot;: [
                    &quot;Ghi&quot;
                ],
                &quot;fit&quot;: &quot;Oversize&quot;
            },
            &quot;slug&quot;: &quot;niek-heavyweight-ghi-uKlUD&quot;,
            &quot;status&quot;: 0,
            &quot;deleted_at&quot;: &quot;2025-08-29T09:00:00Z&quot;,
            &quot;rating_count&quot;: 0,
            &quot;rating_average&quot;: 0,
            &quot;created_at&quot;: &quot;2025-08-28T08:13:55Z&quot;,
            &quot;updated_at&quot;: &quot;2025-08-29T08:00:00Z&quot;
        }
    ]
}</code>
 </pre>
    </span>
<span id="execution-results-GETadmin-products-trashed" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETadmin-products-trashed"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETadmin-products-trashed"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETadmin-products-trashed" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETadmin-products-trashed">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETadmin-products-trashed" data-method="GET"
      data-path="admin/products/trashed"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETadmin-products-trashed', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETadmin-products-trashed"
                    onclick="tryItOut('GETadmin-products-trashed');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETadmin-products-trashed"
                    onclick="cancelTryOut('GETadmin-products-trashed');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETadmin-products-trashed"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>admin/products/trashed</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETadmin-products-trashed"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETadmin-products-trashed"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="product-POSTadmin-products--product_products_id--restore">POST admin/products/{product_products_id}/restore</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-POSTadmin-products--product_products_id--restore">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://localhost/admin/products/1/restore" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/admin/products/1/restore"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTadmin-products--product_products_id--restore">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Restored&quot;,
    &quot;product&quot;: {
        &quot;id&quot;: 10,
        &quot;categories_id&quot;: 2,
        &quot;product_name&quot;: &quot;Niek Heavyweight - Ghi&quot;,
        &quot;description&quot;: &quot;Heavyweight tee in gray.&quot;,
        &quot;product_price&quot;: 313541.36,
        &quot;stock_quantity&quot;: 69,
        &quot;image_path&quot;: &quot;products/052557dq0g2xmen8c1389259573707.jpg&quot;,
        &quot;specifications&quot;: {
            &quot;size&quot;: [
                &quot;XS&quot;,
                &quot;M&quot;,
                &quot;L&quot;
            ],
            &quot;color&quot;: [
                &quot;Ghi&quot;
            ],
            &quot;fit&quot;: &quot;Oversize&quot;
        },
        &quot;slug&quot;: &quot;niek-heavyweight-ghi-uKlUD&quot;,
        &quot;status&quot;: 0,
        &quot;deleted_at&quot;: null,
        &quot;rating_count&quot;: 0,
        &quot;rating_average&quot;: 0,
        &quot;created_at&quot;: &quot;2025-08-28T08:13:55Z&quot;,
        &quot;updated_at&quot;: &quot;2025-08-29T09:00:00Z&quot;
    }
}</code>
 </pre>
    </span>
<span id="execution-results-POSTadmin-products--product_products_id--restore" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTadmin-products--product_products_id--restore"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTadmin-products--product_products_id--restore"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTadmin-products--product_products_id--restore" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTadmin-products--product_products_id--restore">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTadmin-products--product_products_id--restore" data-method="POST"
      data-path="admin/products/{product_products_id}/restore"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTadmin-products--product_products_id--restore', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTadmin-products--product_products_id--restore"
                    onclick="tryItOut('POSTadmin-products--product_products_id--restore');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTadmin-products--product_products_id--restore"
                    onclick="cancelTryOut('POSTadmin-products--product_products_id--restore');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTadmin-products--product_products_id--restore"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>admin/products/{product_products_id}/restore</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTadmin-products--product_products_id--restore"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTadmin-products--product_products_id--restore"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>product_products_id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="product_products_id"                data-endpoint="POSTadmin-products--product_products_id--restore"
               value="1"
               data-component="url">
    <br>
<p>The ID of the product products. Example: <code>1</code></p>
            </div>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>product</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="product"                data-endpoint="POSTadmin-products--product_products_id--restore"
               value="123"
               data-component="url">
    <br>
<p>ID. Example: <code>123</code></p>
            </div>
                    </form>

                    <h2 id="product-GETadmin-products">GET admin/products</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-GETadmin-products">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost/admin/products?q=shirt&amp;per_page=20" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/admin/products"
);

const params = {
    "q": "shirt",
    "per_page": "20",
};
Object.keys(params)
    .forEach(key =&gt; url.searchParams.append(key, params[key]));

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETadmin-products">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;products&quot;: [
        {
            &quot;id&quot;: 1,
            &quot;categories_id&quot;: 1,
            &quot;product_name&quot;: &quot;Asecs Slim Fit Denim - Ghi&quot;,
            &quot;description&quot;: &quot;Slim-fit denim shorts in gray. Cotton blend.&quot;,
            &quot;product_price&quot;: 1667598.08,
            &quot;stock_quantity&quot;: 41,
            &quot;image_path&quot;: &quot;products/b69754s.webp&quot;,
            &quot;specifications&quot;: {
                &quot;size&quot;: [
                    &quot;28&quot;,
                    &quot;30&quot;,
                    &quot;36&quot;
                ],
                &quot;color&quot;: [
                    &quot;Ghi&quot;,
                    &quot;N&acirc;u&quot;
                ],
                &quot;fit&quot;: &quot;Slim&quot;
            },
            &quot;slug&quot;: &quot;asecs-slim-fit-denim-ghi-ha9Kv&quot;,
            &quot;status&quot;: 1,
            &quot;deleted_at&quot;: null,
            &quot;rating_count&quot;: 5,
            &quot;rating_average&quot;: 4.4,
            &quot;created_at&quot;: &quot;2025-08-28T08:13:55Z&quot;,
            &quot;updated_at&quot;: &quot;2025-08-28T08:13:55Z&quot;
        },
        {
            &quot;id&quot;: 2,
            &quot;categories_id&quot;: 1,
            &quot;product_name&quot;: &quot;Old Balance Chino Shorts - Xanh dương&quot;,
            &quot;description&quot;: &quot;Chino shorts in blue with stretch waist.&quot;,
            &quot;product_price&quot;: 533600.37,
            &quot;stock_quantity&quot;: 37,
            &quot;image_path&quot;: &quot;products/7D9qvLgAe2YafNA.jpg&quot;,
            &quot;specifications&quot;: {
                &quot;size&quot;: [
                    &quot;34&quot;
                ],
                &quot;color&quot;: [
                    &quot;Xanh dương&quot;
                ],
                &quot;fit&quot;: &quot;Regular&quot;
            },
            &quot;slug&quot;: &quot;old-balance-chino-shorts-xanh-duong-QxFqN&quot;,
            &quot;status&quot;: 0,
            &quot;deleted_at&quot;: null,
            &quot;rating_count&quot;: 0,
            &quot;rating_average&quot;: 0,
            &quot;created_at&quot;: &quot;2025-08-28T08:13:55Z&quot;,
            &quot;updated_at&quot;: &quot;2025-08-28T08:13:55Z&quot;
        },
        {
            &quot;id&quot;: 3,
            &quot;categories_id&quot;: 1,
            &quot;product_name&quot;: &quot;Rebike Pleated Skirt - Ghi&quot;,
            &quot;description&quot;: &quot;Pleated skirt in gray tone.&quot;,
            &quot;product_price&quot;: 220296.46,
            &quot;stock_quantity&quot;: 38,
            &quot;image_path&quot;: &quot;products/rR8Zfg0ojkvXt7oV2En936FX9eL08gnh.jpg&quot;,
            &quot;specifications&quot;: {
                &quot;size&quot;: [
                    &quot;30&quot;
                ],
                &quot;color&quot;: [
                    &quot;Ghi&quot;
                ],
                &quot;fit&quot;: &quot;Slim&quot;
            },
            &quot;slug&quot;: &quot;rebike-pleated-skirt-ghi-jQI85&quot;,
            &quot;status&quot;: 1,
            &quot;deleted_at&quot;: null,
            &quot;rating_count&quot;: 0,
            &quot;rating_average&quot;: 0,
            &quot;created_at&quot;: &quot;2025-08-28T08:13:55Z&quot;,
            &quot;updated_at&quot;: &quot;2025-08-28T08:13:55Z&quot;
        }
    ]
}</code>
 </pre>
    </span>
<span id="execution-results-GETadmin-products" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETadmin-products"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETadmin-products"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETadmin-products" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETadmin-products">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETadmin-products" data-method="GET"
      data-path="admin/products"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETadmin-products', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETadmin-products"
                    onclick="tryItOut('GETadmin-products');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETadmin-products"
                    onclick="cancelTryOut('GETadmin-products');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETadmin-products"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>admin/products</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETadmin-products"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETadmin-products"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                            <h4 class="fancy-heading-panel"><b>Query Parameters</b></h4>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>q</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="text" style="display: none"
                              name="q"                data-endpoint="GETadmin-products"
               value="shirt"
               data-component="query">
    <br>
<p>Search by name/SKU. Example: <code>shirt</code></p>
            </div>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>per_page</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="text" style="display: none"
                              name="per_page"                data-endpoint="GETadmin-products"
               value="20"
               data-component="query">
    <br>
<p>integer. Example: <code>20</code></p>
            </div>
                </form>

                    <h2 id="product-POSTadmin-products">POST admin/products</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-POSTadmin-products">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://localhost/admin/products" \
    --header "Content-Type: multipart/form-data" \
    --header "Accept: application/json" \
    --form "categories_id=16"\
    --form "product_name=n"\
    --form "slug=g"\
    --form "description=Eius et animi quos velit et."\
    --form "product_price=60"\
    --form "stock_quantity=42"\
    --form "status=1"\
    --form "spec_size[]=XL"\
    --form "spec_color=l"\
    --form "spec_fit=Regular"\
    --form "spec_brand=Abibas"\
    --form "spec_material=Viscose"\
    --form "spec_care=Sấy nhẹ"\
    --form "name=Áo thun basic"\
    --form "sku=TSHIRT-001"\
    --form "price=199000"\
    --form "active=true"\
    --form "image=@/tmp/phpOUIsze" \
    --form "images[]=@/tmp/phpxzC6es" </code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/admin/products"
);

const headers = {
    "Content-Type": "multipart/form-data",
    "Accept": "application/json",
};

const body = new FormData();
body.append('categories_id', '16');
body.append('product_name', 'n');
body.append('slug', 'g');
body.append('description', 'Eius et animi quos velit et.');
body.append('product_price', '60');
body.append('stock_quantity', '42');
body.append('status', '1');
body.append('spec_size[]', 'XL');
body.append('spec_color', 'l');
body.append('spec_fit', 'Regular');
body.append('spec_brand', 'Abibas');
body.append('spec_material', 'Viscose');
body.append('spec_care', 'Sấy nhẹ');
body.append('name', 'Áo thun basic');
body.append('sku', 'TSHIRT-001');
body.append('price', '199000');
body.append('active', 'true');
body.append('image', document.querySelector('input[name="image"]').files[0]);
body.append('images[]', document.querySelector('input[name="images[]"]').files[0]);

fetch(url, {
    method: "POST",
    headers,
    body,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTadmin-products">
            <blockquote>
            <p>Example response (201):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Created&quot;,
    &quot;product&quot;: {
        &quot;id&quot;: 101,
        &quot;categories_id&quot;: 1,
        &quot;product_name&quot;: &quot;Pamu Swim Shorts - Đen&quot;,
        &quot;description&quot;: &quot;Quick-dry swim shorts in black.&quot;,
        &quot;product_price&quot;: 1165255.41,
        &quot;stock_quantity&quot;: 99,
        &quot;image_path&quot;: &quot;products/2A8BwN43VqTKfK.jpg&quot;,
        &quot;specifications&quot;: {
            &quot;size&quot;: [
                &quot;32&quot;,
                &quot;34&quot;,
                &quot;38&quot;
            ],
            &quot;color&quot;: [
                &quot;Đen&quot;
            ],
            &quot;fit&quot;: &quot;Regular&quot;
        },
        &quot;slug&quot;: &quot;pamu-swim-shorts-den-Jk7ge&quot;,
        &quot;status&quot;: 1,
        &quot;deleted_at&quot;: null,
        &quot;rating_count&quot;: 0,
        &quot;rating_average&quot;: 0,
        &quot;created_at&quot;: &quot;2025-08-29T09:00:00Z&quot;,
        &quot;updated_at&quot;: &quot;2025-08-29T09:00:00Z&quot;
    }
}</code>
 </pre>
    </span>
<span id="execution-results-POSTadmin-products" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTadmin-products"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTadmin-products"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTadmin-products" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTadmin-products">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTadmin-products" data-method="POST"
      data-path="admin/products"
      data-authed="1"
      data-hasfiles="1"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTadmin-products', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTadmin-products"
                    onclick="tryItOut('POSTadmin-products');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTadmin-products"
                    onclick="cancelTryOut('POSTadmin-products');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTadmin-products"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>admin/products</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTadmin-products"
               value="multipart/form-data"
               data-component="header">
    <br>
<p>Example: <code>multipart/form-data</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTadmin-products"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>categories_id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="categories_id"                data-endpoint="POSTadmin-products"
               value="16"
               data-component="body">
    <br>
<p>The <code>categories_id</code> of an existing record in the categories table. Example: <code>16</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>product_name</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="product_name"                data-endpoint="POSTadmin-products"
               value="n"
               data-component="body">
    <br>
<p>Must not be greater than 191 characters. Example: <code>n</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>slug</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="text" style="display: none"
                              name="slug"                data-endpoint="POSTadmin-products"
               value="g"
               data-component="body">
    <br>
<p>Must not be greater than 255 characters. Example: <code>g</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>description</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="text" style="display: none"
                              name="description"                data-endpoint="POSTadmin-products"
               value="Eius et animi quos velit et."
               data-component="body">
    <br>
<p>Example: <code>Eius et animi quos velit et.</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>product_price</code></b>&nbsp;&nbsp;
<small>number</small>&nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="product_price"                data-endpoint="POSTadmin-products"
               value="60"
               data-component="body">
    <br>
<p>Must be at least 0. Example: <code>60</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>stock_quantity</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="stock_quantity"                data-endpoint="POSTadmin-products"
               value="42"
               data-component="body">
    <br>
<p>Must be at least 0. Example: <code>42</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>status</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="status"                data-endpoint="POSTadmin-products"
               value="1"
               data-component="body">
    <br>
<p>Example: <code>1</code></p>
Must be one of:
<ul style="list-style-type: square;"><li><code>0</code></li> <li><code>1</code></li></ul>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>image</code></b>&nbsp;&nbsp;
<small>file</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="file" style="display: none"
                              name="image"                data-endpoint="POSTadmin-products"
               value=""
               data-component="body">
    <br>
<p>Must be an image. Must not be greater than 2048 kilobytes. Example: <code>/tmp/phpOUIsze</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>images</code></b>&nbsp;&nbsp;
<small>file[]</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="file" style="display: none"
                              name="images[0]"                data-endpoint="POSTadmin-products"
               data-component="body">
        <input type="file" style="display: none"
               name="images[1]"                data-endpoint="POSTadmin-products"
               data-component="body">
    <br>
<p>Must be an image. Must not be greater than 2048 kilobytes.</p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>spec_size</code></b>&nbsp;&nbsp;
<small>string[]</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="text" style="display: none"
                              name="spec_size[0]"                data-endpoint="POSTadmin-products"
               data-component="body">
        <input type="text" style="display: none"
               name="spec_size[1]"                data-endpoint="POSTadmin-products"
               data-component="body">
    <br>

Must be one of:
<ul style="list-style-type: square;"><li><code>XS</code></li> <li><code>S</code></li> <li><code>M</code></li> <li><code>L</code></li> <li><code>XL</code></li> <li><code>XXL</code></li> <li><code>28</code></li> <li><code>30</code></li> <li><code>31</code></li> <li><code>32</code></li> <li><code>33</code></li> <li><code>34</code></li> <li><code>36</code></li> <li><code>38</code></li></ul>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>spec_color</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="text" style="display: none"
                              name="spec_color"                data-endpoint="POSTadmin-products"
               value="l"
               data-component="body">
    <br>
<p>Must not be greater than 255 characters. Example: <code>l</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>spec_fit</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="text" style="display: none"
                              name="spec_fit"                data-endpoint="POSTadmin-products"
               value="Regular"
               data-component="body">
    <br>
<p>Example: <code>Regular</code></p>
Must be one of:
<ul style="list-style-type: square;"><li><code>Regular</code></li> <li><code>Slim</code></li> <li><code>Relaxed</code></li></ul>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>spec_brand</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="text" style="display: none"
                              name="spec_brand"                data-endpoint="POSTadmin-products"
               value="Abibas"
               data-component="body">
    <br>
<p>Example: <code>Abibas</code></p>
Must be one of:
<ul style="list-style-type: square;"><li><code>Niek</code></li> <li><code>Abibas</code></li> <li><code>Asecs</code></li> <li><code>Old Balance</code></li> <li><code>Rebike</code></li> <li><code>Daidori</code></li> <li><code>Pamu</code></li> <li><code>Doir</code></li> <li><code>Obrum</code></li> <li><code>On Amour</code></li></ul>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>spec_material</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="text" style="display: none"
                              name="spec_material"                data-endpoint="POSTadmin-products"
               value="Viscose"
               data-component="body">
    <br>
<p>Example: <code>Viscose</code></p>
Must be one of:
<ul style="list-style-type: square;"><li><code>Cotton</code></li> <li><code>Linen</code></li> <li><code>Wool</code></li> <li><code>Polyester</code></li> <li><code>Cotton Blend</code></li> <li><code>Denim</code></li> <li><code>Cashmere Blend</code></li> <li><code>Viscose</code></li></ul>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>spec_care</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="text" style="display: none"
                              name="spec_care"                data-endpoint="POSTadmin-products"
               value="Sấy nhẹ"
               data-component="body">
    <br>
<p>Example: <code>Sấy nhẹ</code></p>
Must be one of:
<ul style="list-style-type: square;"><li><code>Giặt máy nhẹ 30°C</code></li> <li><code>Giặt tay với nước lạnh</code></li> <li><code>Không dùng thuốc tẩy</code></li> <li><code>Sấy nhẹ</code></li> <li><code>Ủi nhiệt độ thấp</code></li></ul>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>name</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="text" style="display: none"
                              name="name"                data-endpoint="POSTadmin-products"
               value="Áo thun basic"
               data-component="body">
    <br>
<p>required. Example: <code>Áo thun basic</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>sku</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="text" style="display: none"
                              name="sku"                data-endpoint="POSTadmin-products"
               value="TSHIRT-001"
               data-component="body">
    <br>
<p>required. Example: <code>TSHIRT-001</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>price</code></b>&nbsp;&nbsp;
<small>number</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="number" style="display: none"
               step="any"               name="price"                data-endpoint="POSTadmin-products"
               value="199000"
               data-component="body">
    <br>
<p>required. Example: <code>199000</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>active</code></b>&nbsp;&nbsp;
<small>boolean.</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="text" style="display: none"
                              name="active"                data-endpoint="POSTadmin-products"
               value="true"
               data-component="body">
    <br>
<p>Example: <code>true</code></p>
        </div>
        </form>

                    <h2 id="product-GETadmin-products--products_id-">GET admin/products/{products_id}</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-GETadmin-products--products_id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost/admin/products/1" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/admin/products/1"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETadmin-products--products_id-">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;id&quot;: 1,
    &quot;categories_id&quot;: 1,
    &quot;product_name&quot;: &quot;Asecs Slim Fit Denim - Ghi&quot;,
    &quot;description&quot;: &quot;Slim-fit denim shorts in gray. Cotton blend.&quot;,
    &quot;product_price&quot;: 1667598.08,
    &quot;stock_quantity&quot;: 41,
    &quot;image_path&quot;: &quot;products/b69754s.webp&quot;,
    &quot;specifications&quot;: {
        &quot;size&quot;: [
            &quot;28&quot;,
            &quot;30&quot;,
            &quot;36&quot;
        ],
        &quot;color&quot;: [
            &quot;Ghi&quot;,
            &quot;N&acirc;u&quot;
        ],
        &quot;fit&quot;: &quot;Slim&quot;
    },
    &quot;slug&quot;: &quot;asecs-slim-fit-denim-ghi-ha9Kv&quot;,
    &quot;status&quot;: 1,
    &quot;deleted_at&quot;: null,
    &quot;rating_count&quot;: 5,
    &quot;rating_average&quot;: 4.4,
    &quot;created_at&quot;: &quot;2025-08-28T08:13:55Z&quot;,
    &quot;updated_at&quot;: &quot;2025-08-28T08:13:55Z&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETadmin-products--products_id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETadmin-products--products_id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETadmin-products--products_id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETadmin-products--products_id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETadmin-products--products_id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETadmin-products--products_id-" data-method="GET"
      data-path="admin/products/{products_id}"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETadmin-products--products_id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETadmin-products--products_id-"
                    onclick="tryItOut('GETadmin-products--products_id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETadmin-products--products_id-"
                    onclick="cancelTryOut('GETadmin-products--products_id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETadmin-products--products_id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>admin/products/{products_id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETadmin-products--products_id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETadmin-products--products_id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>products_id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="products_id"                data-endpoint="GETadmin-products--products_id-"
               value="1"
               data-component="url">
    <br>
<p>The ID of the products. Example: <code>1</code></p>
            </div>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>product</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="product"                data-endpoint="GETadmin-products--products_id-"
               value="123"
               data-component="url">
    <br>
<p>ID. Example: <code>123</code></p>
            </div>
                    </form>

                    <h2 id="product-PUTadmin-products--products_id-">PUT admin/products/{products_id}</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-PUTadmin-products--products_id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request PUT \
    "http://localhost/admin/products/1" \
    --header "Content-Type: multipart/form-data" \
    --header "Accept: application/json" \
    --form "categories_id=16"\
    --form "product_name=n"\
    --form "slug=g"\
    --form "description=Eius et animi quos velit et."\
    --form "product_price=60"\
    --form "stock_quantity=42"\
    --form "status=1"\
    --form "remove_image=1"\
    --form "remove_image_ids[]=16"\
    --form "primary_image_id=16"\
    --form "spec_size[]=38"\
    --form "spec_color=n"\
    --form "spec_fit=Slim"\
    --form "spec_brand=Obrum"\
    --form "spec_material=Denim"\
    --form "spec_care=Ủi nhiệt độ thấp"\
    --form "name=Áo thun basic (mới)"\
    --form "price=249000"\
    --form "active=false"\
    --form "image=@/tmp/phpvyA5v9" \
    --form "images[]=@/tmp/phpZy26A1" </code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/admin/products/1"
);

const headers = {
    "Content-Type": "multipart/form-data",
    "Accept": "application/json",
};

const body = new FormData();
body.append('categories_id', '16');
body.append('product_name', 'n');
body.append('slug', 'g');
body.append('description', 'Eius et animi quos velit et.');
body.append('product_price', '60');
body.append('stock_quantity', '42');
body.append('status', '1');
body.append('remove_image', '1');
body.append('remove_image_ids[]', '16');
body.append('primary_image_id', '16');
body.append('spec_size[]', '38');
body.append('spec_color', 'n');
body.append('spec_fit', 'Slim');
body.append('spec_brand', 'Obrum');
body.append('spec_material', 'Denim');
body.append('spec_care', 'Ủi nhiệt độ thấp');
body.append('name', 'Áo thun basic (mới)');
body.append('price', '249000');
body.append('active', 'false');
body.append('image', document.querySelector('input[name="image"]').files[0]);
body.append('images[]', document.querySelector('input[name="images[]"]').files[0]);

fetch(url, {
    method: "PUT",
    headers,
    body,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-PUTadmin-products--products_id-">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Updated&quot;,
    &quot;product&quot;: {
        &quot;id&quot;: 1,
        &quot;categories_id&quot;: 1,
        &quot;product_name&quot;: &quot;Asecs Slim Fit Denim - Ghi&quot;,
        &quot;description&quot;: &quot;Slim-fit denim shorts in gray. Cotton blend.&quot;,
        &quot;product_price&quot;: 1749000,
        &quot;stock_quantity&quot;: 41,
        &quot;image_path&quot;: &quot;products/b69754s.webp&quot;,
        &quot;specifications&quot;: {
            &quot;size&quot;: [
                &quot;28&quot;,
                &quot;30&quot;,
                &quot;36&quot;
            ],
            &quot;color&quot;: [
                &quot;Ghi&quot;,
                &quot;N&acirc;u&quot;
            ],
            &quot;fit&quot;: &quot;Slim&quot;
        },
        &quot;slug&quot;: &quot;asecs-slim-fit-denim-ghi-ha9Kv&quot;,
        &quot;status&quot;: 1,
        &quot;deleted_at&quot;: null,
        &quot;rating_count&quot;: 5,
        &quot;rating_average&quot;: 4.4,
        &quot;created_at&quot;: &quot;2025-08-28T08:13:55Z&quot;,
        &quot;updated_at&quot;: &quot;2025-08-29T09:00:00Z&quot;
    }
}</code>
 </pre>
    </span>
<span id="execution-results-PUTadmin-products--products_id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-PUTadmin-products--products_id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-PUTadmin-products--products_id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-PUTadmin-products--products_id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-PUTadmin-products--products_id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-PUTadmin-products--products_id-" data-method="PUT"
      data-path="admin/products/{products_id}"
      data-authed="1"
      data-hasfiles="1"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('PUTadmin-products--products_id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-PUTadmin-products--products_id-"
                    onclick="tryItOut('PUTadmin-products--products_id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-PUTadmin-products--products_id-"
                    onclick="cancelTryOut('PUTadmin-products--products_id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-PUTadmin-products--products_id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-darkblue">PUT</small>
            <b><code>admin/products/{products_id}</code></b>
        </p>
            <p>
            <small class="badge badge-purple">PATCH</small>
            <b><code>admin/products/{products_id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="PUTadmin-products--products_id-"
               value="multipart/form-data"
               data-component="header">
    <br>
<p>Example: <code>multipart/form-data</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="PUTadmin-products--products_id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>products_id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="products_id"                data-endpoint="PUTadmin-products--products_id-"
               value="1"
               data-component="url">
    <br>
<p>The ID of the products. Example: <code>1</code></p>
            </div>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>product</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="product"                data-endpoint="PUTadmin-products--products_id-"
               value="123"
               data-component="url">
    <br>
<p>ID. Example: <code>123</code></p>
            </div>
                            <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>categories_id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="categories_id"                data-endpoint="PUTadmin-products--products_id-"
               value="16"
               data-component="body">
    <br>
<p>The <code>categories_id</code> of an existing record in the categories table. Example: <code>16</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>product_name</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="product_name"                data-endpoint="PUTadmin-products--products_id-"
               value="n"
               data-component="body">
    <br>
<p>Must not be greater than 255 characters. Example: <code>n</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>slug</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="text" style="display: none"
                              name="slug"                data-endpoint="PUTadmin-products--products_id-"
               value="g"
               data-component="body">
    <br>
<p>Must not be greater than 255 characters. Example: <code>g</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>description</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="text" style="display: none"
                              name="description"                data-endpoint="PUTadmin-products--products_id-"
               value="Eius et animi quos velit et."
               data-component="body">
    <br>
<p>Example: <code>Eius et animi quos velit et.</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>product_price</code></b>&nbsp;&nbsp;
<small>number</small>&nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="product_price"                data-endpoint="PUTadmin-products--products_id-"
               value="60"
               data-component="body">
    <br>
<p>Must be at least 0. Example: <code>60</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>stock_quantity</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="stock_quantity"                data-endpoint="PUTadmin-products--products_id-"
               value="42"
               data-component="body">
    <br>
<p>Must be at least 0. Example: <code>42</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>status</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="status"                data-endpoint="PUTadmin-products--products_id-"
               value="1"
               data-component="body">
    <br>
<p>Example: <code>1</code></p>
Must be one of:
<ul style="list-style-type: square;"><li><code>0</code></li> <li><code>1</code></li></ul>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>image</code></b>&nbsp;&nbsp;
<small>file</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="file" style="display: none"
                              name="image"                data-endpoint="PUTadmin-products--products_id-"
               value=""
               data-component="body">
    <br>
<p>Must be an image. Must not be greater than 2048 kilobytes. Example: <code>/tmp/phpvyA5v9</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>remove_image</code></b>&nbsp;&nbsp;
<small>boolean</small>&nbsp;
<i>optional</i> &nbsp;
                <label data-endpoint="PUTadmin-products--products_id-" style="display: none">
            <input type="radio" name="remove_image"
                   value="true"
                   data-endpoint="PUTadmin-products--products_id-"
                   data-component="body"             >
            <code>true</code>
        </label>
        <label data-endpoint="PUTadmin-products--products_id-" style="display: none">
            <input type="radio" name="remove_image"
                   value="false"
                   data-endpoint="PUTadmin-products--products_id-"
                   data-component="body"             >
            <code>false</code>
        </label>
    <br>
<p>Example: <code>true</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>images</code></b>&nbsp;&nbsp;
<small>file[]</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="file" style="display: none"
                              name="images[0]"                data-endpoint="PUTadmin-products--products_id-"
               data-component="body">
        <input type="file" style="display: none"
               name="images[1]"                data-endpoint="PUTadmin-products--products_id-"
               data-component="body">
    <br>
<p>Must be an image. Must not be greater than 2048 kilobytes.</p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>remove_image_ids</code></b>&nbsp;&nbsp;
<small>integer[]</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="number" style="display: none"
               step="any"               name="remove_image_ids[0]"                data-endpoint="PUTadmin-products--products_id-"
               data-component="body">
        <input type="number" style="display: none"
               name="remove_image_ids[1]"                data-endpoint="PUTadmin-products--products_id-"
               data-component="body">
    <br>

        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>primary_image_id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="number" style="display: none"
               step="any"               name="primary_image_id"                data-endpoint="PUTadmin-products--products_id-"
               value="16"
               data-component="body">
    <br>
<p>Example: <code>16</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>spec_size</code></b>&nbsp;&nbsp;
<small>string[]</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="text" style="display: none"
                              name="spec_size[0]"                data-endpoint="PUTadmin-products--products_id-"
               data-component="body">
        <input type="text" style="display: none"
               name="spec_size[1]"                data-endpoint="PUTadmin-products--products_id-"
               data-component="body">
    <br>

Must be one of:
<ul style="list-style-type: square;"><li><code>XS</code></li> <li><code>S</code></li> <li><code>M</code></li> <li><code>L</code></li> <li><code>XL</code></li> <li><code>XXL</code></li> <li><code>28</code></li> <li><code>30</code></li> <li><code>31</code></li> <li><code>32</code></li> <li><code>33</code></li> <li><code>34</code></li> <li><code>36</code></li> <li><code>38</code></li></ul>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>spec_color</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="text" style="display: none"
                              name="spec_color"                data-endpoint="PUTadmin-products--products_id-"
               value="n"
               data-component="body">
    <br>
<p>Must not be greater than 255 characters. Example: <code>n</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>spec_fit</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="text" style="display: none"
                              name="spec_fit"                data-endpoint="PUTadmin-products--products_id-"
               value="Slim"
               data-component="body">
    <br>
<p>Example: <code>Slim</code></p>
Must be one of:
<ul style="list-style-type: square;"><li><code>Regular</code></li> <li><code>Slim</code></li> <li><code>Relaxed</code></li></ul>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>spec_brand</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="text" style="display: none"
                              name="spec_brand"                data-endpoint="PUTadmin-products--products_id-"
               value="Obrum"
               data-component="body">
    <br>
<p>Example: <code>Obrum</code></p>
Must be one of:
<ul style="list-style-type: square;"><li><code>Niek</code></li> <li><code>Abibas</code></li> <li><code>Asecs</code></li> <li><code>Old Balance</code></li> <li><code>Rebike</code></li> <li><code>Daidori</code></li> <li><code>Pamu</code></li> <li><code>Doir</code></li> <li><code>Obrum</code></li> <li><code>On Amour</code></li></ul>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>spec_material</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="text" style="display: none"
                              name="spec_material"                data-endpoint="PUTadmin-products--products_id-"
               value="Denim"
               data-component="body">
    <br>
<p>Example: <code>Denim</code></p>
Must be one of:
<ul style="list-style-type: square;"><li><code>Cotton</code></li> <li><code>Linen</code></li> <li><code>Wool</code></li> <li><code>Polyester</code></li> <li><code>Cotton Blend</code></li> <li><code>Denim</code></li> <li><code>Cashmere Blend</code></li> <li><code>Viscose</code></li></ul>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>spec_care</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="text" style="display: none"
                              name="spec_care"                data-endpoint="PUTadmin-products--products_id-"
               value="Ủi nhiệt độ thấp"
               data-component="body">
    <br>
<p>Example: <code>Ủi nhiệt độ thấp</code></p>
Must be one of:
<ul style="list-style-type: square;"><li><code>Giặt máy nhẹ 30°C</code></li> <li><code>Giặt tay với nước lạnh</code></li> <li><code>Không dùng thuốc tẩy</code></li> <li><code>Sấy nhẹ</code></li> <li><code>Ủi nhiệt độ thấp</code></li></ul>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>name</code></b>&nbsp;&nbsp;
<small>string.</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="text" style="display: none"
                              name="name"                data-endpoint="PUTadmin-products--products_id-"
               value="Áo thun basic (mới)"
               data-component="body">
    <br>
<p>Example: <code>Áo thun basic (mới)</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>price</code></b>&nbsp;&nbsp;
<small>number.</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="text" style="display: none"
                              name="price"                data-endpoint="PUTadmin-products--products_id-"
               value="249000"
               data-component="body">
    <br>
<p>Example: <code>249000</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>active</code></b>&nbsp;&nbsp;
<small>boolean.</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="text" style="display: none"
                              name="active"                data-endpoint="PUTadmin-products--products_id-"
               value="false"
               data-component="body">
    <br>
<p>Example: <code>false</code></p>
        </div>
        </form>

            

        
    </div>
    <div class="dark-box">
                    <div class="lang-selector">
                                                        <button type="button" class="lang-button" data-language-name="bash">bash</button>
                                                        <button type="button" class="lang-button" data-language-name="javascript">javascript</button>
                            </div>
            </div>
</div>
</body>
</html>
