<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title>Laravel API Documentation</title>

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
        var tryItOutBaseUrl = "http://127.0.0.1:8000";
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
                                                    <li class="tocify-item level-2" data-unique="endpoints-GETsanctum-csrf-cookie">
                                <a href="#endpoints-GETsanctum-csrf-cookie">Return an empty response simply to trigger the storage of the CSRF cookie in the browser.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETup">
                                <a href="#endpoints-GETup">GET up</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETlanguage--locale-">
                                <a href="#endpoints-GETlanguage--locale-">Switch the application language</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GET-">
                                <a href="#endpoints-GET-">GET /</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETprofile">
                                <a href="#endpoints-GETprofile">Display the user's profile form.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-DELETEprofile">
                                <a href="#endpoints-DELETEprofile">Delete the user's account.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETdashboard">
                                <a href="#endpoints-GETdashboard">GET dashboard</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETadmin-dashboard">
                                <a href="#endpoints-GETadmin-dashboard">GET admin/dashboard</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETadmin-users">
                                <a href="#endpoints-GETadmin-users">GET admin/users</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETadmin-users-create">
                                <a href="#endpoints-GETadmin-users-create">GET admin/users/create</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-POSTadmin-users">
                                <a href="#endpoints-POSTadmin-users">POST admin/users</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETadmin-users--id-">
                                <a href="#endpoints-GETadmin-users--id-">GET admin/users/{id}</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETadmin-users--user_id--edit">
                                <a href="#endpoints-GETadmin-users--user_id--edit">GET admin/users/{user_id}/edit</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-PUTadmin-users--id-">
                                <a href="#endpoints-PUTadmin-users--id-">PUT admin/users/{id}</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-DELETEadmin-users--id-">
                                <a href="#endpoints-DELETEadmin-users--id-">DELETE admin/users/{id}</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETadmin-categories-trashed">
                                <a href="#endpoints-GETadmin-categories-trashed">Display a listing of the trashed resource.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-POSTadmin-categories--category--restore">
                                <a href="#endpoints-POSTadmin-categories--category--restore">Restore the specified resource from storage.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETadmin-categories">
                                <a href="#endpoints-GETadmin-categories">Display a listing of the resource.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETadmin-categories-create">
                                <a href="#endpoints-GETadmin-categories-create">Show the form for creating a new resource.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-POSTadmin-categories">
                                <a href="#endpoints-POSTadmin-categories">Store a newly created resource in storage.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETadmin-categories--id-">
                                <a href="#endpoints-GETadmin-categories--id-">Display the specified resource.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETadmin-categories--category--edit">
                                <a href="#endpoints-GETadmin-categories--category--edit">Show the form for editing the specified resource.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-PUTadmin-categories--id-">
                                <a href="#endpoints-PUTadmin-categories--id-">Update the specified resource in storage.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-DELETEadmin-categories--id-">
                                <a href="#endpoints-DELETEadmin-categories--id-">Remove the specified resource from storage.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETadmin-products-trashed">
                                <a href="#endpoints-GETadmin-products-trashed">GET admin/products/trashed</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-POSTadmin-products--product_products_id--restore">
                                <a href="#endpoints-POSTadmin-products--product_products_id--restore">POST admin/products/{product_products_id}/restore</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETadmin-products">
                                <a href="#endpoints-GETadmin-products">Display a listing of the resource.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETadmin-products-create">
                                <a href="#endpoints-GETadmin-products-create">Show the form for creating a new resource.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-POSTadmin-products">
                                <a href="#endpoints-POSTadmin-products">Store a newly created resource in storage.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETadmin-products--products_id-">
                                <a href="#endpoints-GETadmin-products--products_id-">Display the specified resource.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETadmin-products--product_products_id--edit">
                                <a href="#endpoints-GETadmin-products--product_products_id--edit">Show the form for editing the specified resource.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-PUTadmin-products--products_id-">
                                <a href="#endpoints-PUTadmin-products--products_id-">Update the specified resource in storage.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-DELETEadmin-products--products_id-">
                                <a href="#endpoints-DELETEadmin-products--products_id-">Remove the specified resource from storage.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETadmin-provinces">
                                <a href="#endpoints-GETadmin-provinces">Display a listing of the resource.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETadmin-provinces-create">
                                <a href="#endpoints-GETadmin-provinces-create">Show the form for creating a new resource.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-POSTadmin-provinces">
                                <a href="#endpoints-POSTadmin-provinces">Store a newly created resource in storage.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETadmin-provinces--id-">
                                <a href="#endpoints-GETadmin-provinces--id-">Display the specified resource.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETadmin-provinces--province_id--edit">
                                <a href="#endpoints-GETadmin-provinces--province_id--edit">Show the form for editing the specified resource.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-PUTadmin-provinces--id-">
                                <a href="#endpoints-PUTadmin-provinces--id-">Update the specified resource in storage.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-DELETEadmin-provinces--id-">
                                <a href="#endpoints-DELETEadmin-provinces--id-">Remove the specified resource from storage.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETadmin-orders">
                                <a href="#endpoints-GETadmin-orders">Display a listing of the orders with search and filter functionality.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETadmin-orders--orders_id-">
                                <a href="#endpoints-GETadmin-orders--orders_id-">Display the specified order with detailed information.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-PATCHadmin-orders--order_orders_id--status">
                                <a href="#endpoints-PATCHadmin-orders--order_orders_id--status">Update the order status.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-POSTadmin-notifications-mark-as-read">
                                <a href="#endpoints-POSTadmin-notifications-mark-as-read">Mark all unread notifications for the authenticated user as read.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-DELETEadmin-notifications-clear-all">
                                <a href="#endpoints-DELETEadmin-notifications-clear-all">Clear all notifications for the authenticated user.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETadmin-reports">
                                <a href="#endpoints-GETadmin-reports">GET admin/reports</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETadmin-reports--date-">
                                <a href="#endpoints-GETadmin-reports--date-">GET admin/reports/{date}</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETuser-products">
                                <a href="#endpoints-GETuser-products">Display a listing of the resource.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETuser-products--slug-">
                                <a href="#endpoints-GETuser-products--slug-">Display the specified resource.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETuser-addresses">
                                <a href="#endpoints-GETuser-addresses">Display a listing of the resource.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETuser-addresses-create">
                                <a href="#endpoints-GETuser-addresses-create">Show the form for creating a new resource.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-POSTuser-addresses">
                                <a href="#endpoints-POSTuser-addresses">Store a newly created resource in storage.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETuser-addresses--address_id--edit">
                                <a href="#endpoints-GETuser-addresses--address_id--edit">Show the form for editing the specified resource.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-PUTuser-addresses--id-">
                                <a href="#endpoints-PUTuser-addresses--id-">Update the specified resource in storage.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-DELETEuser-addresses--id-">
                                <a href="#endpoints-DELETEuser-addresses--id-">Remove the specified resource from storage.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-POSTuser-products--product_slug--feedbacks">
                                <a href="#endpoints-POSTuser-products--product_slug--feedbacks">POST user/products/{product_slug}/feedbacks</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-PUTuser-products--product_slug--feedbacks--feedback_id-">
                                <a href="#endpoints-PUTuser-products--product_slug--feedbacks--feedback_id-">PUT user/products/{product_slug}/feedbacks/{feedback_id}</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-DELETEuser-products--product_slug--feedbacks--feedback_id-">
                                <a href="#endpoints-DELETEuser-products--product_slug--feedbacks--feedback_id-">DELETE user/products/{product_slug}/feedbacks/{feedback_id}</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETcart">
                                <a href="#endpoints-GETcart">GET cart</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETcart-add--id-">
                                <a href="#endpoints-GETcart-add--id-">GET cart/add/{id}</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-POSTcart-update--id-">
                                <a href="#endpoints-POSTcart-update--id-">POST cart/update/{id}</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-DELETEcart-remove--id-">
                                <a href="#endpoints-DELETEcart-remove--id-">DELETE cart/remove/{id}</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETcheckout">
                                <a href="#endpoints-GETcheckout">Hiển thị form thanh toán</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-POSTcheckout">
                                <a href="#endpoints-POSTcheckout">Xử lý đặt hàng</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETorders--id-">
                                <a href="#endpoints-GETorders--id-">GET orders/{id}</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETorders">
                                <a href="#endpoints-GETorders">GET orders</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETregister">
                                <a href="#endpoints-GETregister">Display the registration view.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-POSTregister">
                                <a href="#endpoints-POSTregister">Handle an incoming registration request.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETlogin">
                                <a href="#endpoints-GETlogin">Display the login view.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-POSTlogin">
                                <a href="#endpoints-POSTlogin">Handle an incoming authentication request.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETforgot-password">
                                <a href="#endpoints-GETforgot-password">Display the password reset link request view.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-POSTforgot-password">
                                <a href="#endpoints-POSTforgot-password">Handle an incoming password reset link request.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETreset-password--token-">
                                <a href="#endpoints-GETreset-password--token-">Display the password reset view.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-POSTreset-password">
                                <a href="#endpoints-POSTreset-password">Handle an incoming new password request.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETverify-email">
                                <a href="#endpoints-GETverify-email">Display the email verification prompt.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETverify-email--id---hash-">
                                <a href="#endpoints-GETverify-email--id---hash-">Mark the authenticated user's email address as verified.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-POSTemail-verification-notification">
                                <a href="#endpoints-POSTemail-verification-notification">Send a new email verification notification.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETconfirm-password">
                                <a href="#endpoints-GETconfirm-password">Show the confirm password view.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-POSTconfirm-password">
                                <a href="#endpoints-POSTconfirm-password">Confirm the user's password.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-PUTpassword">
                                <a href="#endpoints-PUTpassword">Update the user's password.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-POSTlogout">
                                <a href="#endpoints-POSTlogout">Destroy an authenticated session.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETauth-google-redirect">
                                <a href="#endpoints-GETauth-google-redirect">GET auth/google/redirect</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETauth-google-callback">
                                <a href="#endpoints-GETauth-google-callback">GET auth/google/callback</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETstorage--path-">
                                <a href="#endpoints-GETstorage--path-">GET storage/{path}</a>
                            </li>
                                                                        </ul>
                            </ul>
                    <ul id="tocify-header-product" class="tocify-header">
                <li class="tocify-item level-1" data-unique="product">
                    <a href="#product">Product</a>
                </li>
                                    <ul id="tocify-subheader-product" class="tocify-subheader">
                                                    <li class="tocify-item level-2" data-unique="product-GETapi-products-search">
                                <a href="#product-GETapi-products-search">Search products (User)</a>
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
    <strong>Base URL</strong>: <code>http://127.0.0.1:8000</code>
</aside>
<pre><code>This documentation aims to provide all the information you need to work with our API.

&lt;aside&gt;As you scroll, you'll see code examples for working with the API in different programming languages in the dark area to the right (or as part of the content on mobile).
You can switch the language used with the tabs at the top right (or from the nav menu at the top left on mobile).&lt;/aside&gt;</code></pre>

        <h1 id="authenticating-requests">Authenticating requests</h1>
<p>This API is not authenticated.</p>

        <h1 id="endpoints">Endpoints</h1>

    

                                <h2 id="endpoints-GETsanctum-csrf-cookie">Return an empty response simply to trigger the storage of the CSRF cookie in the browser.</h2>

<p>
</p>



<span id="example-requests-GETsanctum-csrf-cookie">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://127.0.0.1:8000/sanctum/csrf-cookie" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8000/sanctum/csrf-cookie"
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

<span id="example-responses-GETsanctum-csrf-cookie">
            <blockquote>
            <p>Example response (204):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
access-control-allow-origin: *
access-control-allow-methods: GET, POST, PUT, DELETE, OPTIONS
access-control-allow-headers: Content-Type, Authorization, X-Requested-With, X-XSRF-TOKEN
set-cookie: app_locale=eyJpdiI6Imtkc0NETW5ET1NESUZZdUw0bi83NUE9PSIsInZhbHVlIjoianNvOGR5aHZVeWxVKzNVaThaRVkzcWRDYUNjZmVzRWVwcytVQVlXQStMd3RYb3BxSzZNR0Y3cEt2ekVwb3FNeiIsIm1hYyI6ImVhNGQwMGM2ODhmMzAwOGQxNmM0ODAyNjJjODRjMWVmNDc4ODBjMTc3N2E3MmVhMzM2MmI4YzI5ZGZhODhiYTkiLCJ0YWciOiIifQ%3D%3D; expires=Sat, 29 Aug 2026 04:39:45 GMT; Max-Age=31536000; path=/; httponly; samesite=lax; XSRF-TOKEN=eyJpdiI6Ik92WWJhQ2FHMGNaa3k3QUxySjJBZlE9PSIsInZhbHVlIjoiblREWm5yQjhISWlBMm13eWVLbUl6NHQ2dHBEaHh1MGVVOWRzZE5QSFVQUktnNS9KL2ZIL254aXdLeGVWV2NFUVIzSHVUeUI4dFVQQUx0RjlJQ1g4WTd3N0E4THNRcXVqa1NtQUxLaHpnRTk4L0tkMTFOMjlxN05DWjY1Uk11LzkiLCJtYWMiOiJiMGI1MGVjYTk3YTY2YjFkNWQ0ZDMzYzBjYjUzMjA1OWQ2NTAyMjYzODNkMWQ4MTQ5ZjcxNjdkNDlhZTdjMTA3IiwidGFnIjoiIn0%3D; expires=Fri, 29 Aug 2025 06:39:45 GMT; Max-Age=7200; path=/; samesite=lax; laravel_session=eyJpdiI6ImRuME1iUU1JOHdxbE9aelZ3amtPL0E9PSIsInZhbHVlIjoiR2VHWlRwam1WRFZKQVEzZjZJbU50allXWnlEeEdSVnJGRjdOVkxUcG12M3NqTk5VckJBeEsvdUhVRTlMWmV6UHRuQll3MXZQblRSNW51K1QxNDZzZEpxNHkraWJFS2x4cXU4RFdFMk52cTBJWVUrZWx6UThITG5wdm9zaHJWNVgiLCJtYWMiOiJmZDQzYWRkNGRlNGJlNmQ1ODMzOWViMDAxYzIxNDllM2ZhMTE4NDk5NTliN2E0YmQ0YmNhMDU4ZWYyMWQ0NjI5IiwidGFnIjoiIn0%3D; expires=Fri, 29 Aug 2025 06:39:45 GMT; Max-Age=7200; path=/; httponly; samesite=lax
 </code></pre></details>         <pre>
<code>Empty response</code>
 </pre>
    </span>
<span id="execution-results-GETsanctum-csrf-cookie" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETsanctum-csrf-cookie"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETsanctum-csrf-cookie"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETsanctum-csrf-cookie" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETsanctum-csrf-cookie">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETsanctum-csrf-cookie" data-method="GET"
      data-path="sanctum/csrf-cookie"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETsanctum-csrf-cookie', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETsanctum-csrf-cookie"
                    onclick="tryItOut('GETsanctum-csrf-cookie');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETsanctum-csrf-cookie"
                    onclick="cancelTryOut('GETsanctum-csrf-cookie');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETsanctum-csrf-cookie"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>sanctum/csrf-cookie</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETsanctum-csrf-cookie"
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
                              name="Accept"                data-endpoint="GETsanctum-csrf-cookie"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="endpoints-GETup">GET up</h2>

<p>
</p>



<span id="example-requests-GETup">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://127.0.0.1:8000/up" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8000/up"
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

<span id="example-responses-GETup">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
access-control-allow-origin: *
access-control-allow-methods: GET, POST, PUT, DELETE, OPTIONS
access-control-allow-headers: Content-Type, Authorization, X-Requested-With, X-XSRF-TOKEN
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">&lt;!DOCTYPE html&gt;
&lt;html lang=&quot;en&quot;&gt;
&lt;head&gt;
    &lt;meta charset=&quot;utf-8&quot;&gt;
    &lt;meta name=&quot;viewport&quot; content=&quot;width=device-width, initial-scale=1&quot;&gt;

    &lt;title&gt;Laravel&lt;/title&gt;

    &lt;!-- Fonts --&gt;
    &lt;link rel=&quot;preconnect&quot; href=&quot;https://fonts.bunny.net&quot;&gt;
    &lt;link href=&quot;https://fonts.bunny.net/css?family=figtree:400,600&amp;display=swap&quot; rel=&quot;stylesheet&quot; /&gt;

    &lt;!-- Styles --&gt;
    &lt;script src=&quot;https://cdn.tailwindcss.com&quot;&gt;&lt;/script&gt;

    &lt;script&gt;
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        sans: [&#039;Figtree&#039;, &#039;ui-sans-serif&#039;, &#039;system-ui&#039;, &#039;sans-serif&#039;, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;],
                    }
                }
            }
        }
    &lt;/script&gt;
&lt;/head&gt;
&lt;body class=&quot;antialiased&quot;&gt;
&lt;div class=&quot;relative flex justify-center items-center min-h-screen bg-gray-100 selection:bg-red-500 selection:text-white&quot;&gt;
    &lt;div class=&quot;w-full sm:w-3/4 xl:w-1/2 mx-auto p-6&quot;&gt;
        &lt;div class=&quot;px-6 py-4 bg-white from-gray-700/50 via-transparent rounded-lg shadow-2xl shadow-gray-500/20 flex items-center focus:outline focus:outline-2 focus:outline-red-500&quot;&gt;
            &lt;div class=&quot;relative flex h-3 w-3 group &quot;&gt;
                &lt;span class=&quot;animate-ping absolute inline-flex h-full w-full rounded-full bg-green-400 group-[.status-down]:bg-red-600 opacity-75&quot;&gt;&lt;/span&gt;
                &lt;span class=&quot;relative inline-flex rounded-full h-3 w-3 bg-green-400 group-[.status-down]:bg-red-600&quot;&gt;&lt;/span&gt;
            &lt;/div&gt;

            &lt;div class=&quot;ml-6&quot;&gt;
                &lt;h2 class=&quot;text-xl font-semibold text-gray-900&quot;&gt;Application up&lt;/h2&gt;

                &lt;p class=&quot;mt-2 text-gray-500 dark:text-gray-400 text-sm leading-relaxed&quot;&gt;
                    HTTP request received.

                                            Response rendered in 6137ms.
                                    &lt;/p&gt;
            &lt;/div&gt;
        &lt;/div&gt;
    &lt;/div&gt;
&lt;/div&gt;
&lt;/body&gt;
&lt;/html&gt;
</code>
 </pre>
    </span>
<span id="execution-results-GETup" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETup"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETup"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETup" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETup">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETup" data-method="GET"
      data-path="up"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETup', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETup"
                    onclick="tryItOut('GETup');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETup"
                    onclick="cancelTryOut('GETup');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETup"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>up</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETup"
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
                              name="Accept"                data-endpoint="GETup"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="endpoints-GETlanguage--locale-">Switch the application language</h2>

<p>
</p>



<span id="example-requests-GETlanguage--locale-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://127.0.0.1:8000/language/sr_BA" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8000/language/sr_BA"
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

<span id="example-responses-GETlanguage--locale-">
            <blockquote>
            <p>Example response (302):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
location: http://localhost/sanctum/csrf-cookie
content-type: text/html; charset=utf-8
access-control-allow-origin: *
access-control-allow-methods: GET, POST, PUT, DELETE, OPTIONS
access-control-allow-headers: Content-Type, Authorization, X-Requested-With, X-XSRF-TOKEN
set-cookie: app_locale=eyJpdiI6Ii82YWExb1JEMW9pU01ONDY3MnN2MXc9PSIsInZhbHVlIjoibXZNZTJrd2NrVHplMGZpbW9XQnBxdWgxR1d0dktPTUxQbG9ORENOLzFpTWQxVEhaNjI1SjRnQStZZTNYeHJKZiIsIm1hYyI6ImE1NTU1MWM5Y2Y1YzVjMjFhZTg5ZDFmZjRmNDc5NWEwOTVkNTc0YTc0MDFiMmRkZmQzMTUyNWZiYmQxMTg1OGEiLCJ0YWciOiIifQ%3D%3D; expires=Sat, 29 Aug 2026 04:39:47 GMT; Max-Age=31536000; path=/; httponly; samesite=lax; XSRF-TOKEN=eyJpdiI6IjM1OFBIeUlXdXBmdVVOdEV0Qi9pU3c9PSIsInZhbHVlIjoiL1N4RERNSGdoYWg3bU8wQUZYZTN6YmNsOU5mVjhnb21EUml4ZjJNTXNGT0Vwd211Z29lUklEc1JVamdpVzlaOGI5SDMrTG53cGR2N2FWei85MHdPckh1em56WVI2STFmTWRiUFZtZ3ppMjBjV0tYdG5oUnoyNkI0dXQvYlkxemsiLCJtYWMiOiJhMjFjNjZhNWVmNGFmN2E3YTI2ZTUyOWFiMWZkOTM1YzZkMjYxM2ViN2U0N2E4NTNlNmUyYzM4MmQyNWMwZjFhIiwidGFnIjoiIn0%3D; expires=Fri, 29 Aug 2025 06:39:47 GMT; Max-Age=7200; path=/; samesite=lax; laravel_session=eyJpdiI6InhCdkVBcE1PYkJnNGFXaXcweUZsREE9PSIsInZhbHVlIjoiRTV5R3I3U2dyMkM5eDNvWFpEZ3lSN28vRFpPakNIeDVsMnk5Si96dmJ4NkZYemZ6MENLWDhYYVo4a1hKNWU1NWNoWERYUjVERGNyWkJPUFlnZUJJZE4yeldCd3BsUTFIL2ZWVko1Q1NoOVkzalgvVG5Tb0dnM1JQUCtzNFhSVk4iLCJtYWMiOiJkZTM0Yjg2NDg1NTEyYmJlZTIxNzQ3ZWI2ODU1NzcyODJhNTdkNWM2YjY4MmJlMjNiZWQ2MjYwODE4NDYwMTlhIiwidGFnIjoiIn0%3D; expires=Fri, 29 Aug 2025 06:39:47 GMT; Max-Age=7200; path=/; httponly; samesite=lax
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">&lt;!DOCTYPE html&gt;
&lt;html&gt;
    &lt;head&gt;
        &lt;meta charset=&quot;UTF-8&quot; /&gt;
        &lt;meta http-equiv=&quot;refresh&quot; content=&quot;0;url=&#039;http://localhost/sanctum/csrf-cookie&#039;&quot; /&gt;

        &lt;title&gt;Redirecting to http://localhost/sanctum/csrf-cookie&lt;/title&gt;
    &lt;/head&gt;
    &lt;body&gt;
        Redirecting to &lt;a href=&quot;http://localhost/sanctum/csrf-cookie&quot;&gt;http://localhost/sanctum/csrf-cookie&lt;/a&gt;.
    &lt;/body&gt;
&lt;/html&gt;</code>
 </pre>
    </span>
<span id="execution-results-GETlanguage--locale-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETlanguage--locale-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETlanguage--locale-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETlanguage--locale-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETlanguage--locale-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETlanguage--locale-" data-method="GET"
      data-path="language/{locale}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETlanguage--locale-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETlanguage--locale-"
                    onclick="tryItOut('GETlanguage--locale-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETlanguage--locale-"
                    onclick="cancelTryOut('GETlanguage--locale-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETlanguage--locale-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>language/{locale}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETlanguage--locale-"
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
                              name="Accept"                data-endpoint="GETlanguage--locale-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>locale</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="locale"                data-endpoint="GETlanguage--locale-"
               value="sr_BA"
               data-component="url">
    <br>
<p>Example: <code>sr_BA</code></p>
            </div>
                    </form>

                    <h2 id="endpoints-GET-">GET /</h2>

<p>
</p>



<span id="example-requests-GET-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://127.0.0.1:8000/" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8000/"
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

<span id="example-responses-GET-">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">content-type: text/html; charset=UTF-8
cache-control: no-cache, private
access-control-allow-origin: *
access-control-allow-methods: GET, POST, PUT, DELETE, OPTIONS
access-control-allow-headers: Content-Type, Authorization, X-Requested-With, X-XSRF-TOKEN
set-cookie: app_locale=eyJpdiI6Ik9IWUZxdE1NNXR1ZG9LSXd1dUY3d2c9PSIsInZhbHVlIjoiV2dmTGs1cDdrc2JFWE9sbldrQlU1elRpbnVMZjl5SXdNRzZjNEFWT08wYkhaM3F0NURTandKSlJNUzVBSzRjZyIsIm1hYyI6ImU4Y2UwMTQ5NDA4MGJkYmFjZDQ4Njg4ZjBjY2EyNzAzYWZmNjVjYzM5Zjg0ODQ3YThhMjMzZmNlN2QzMjUxMmUiLCJ0YWciOiIifQ%3D%3D; expires=Sat, 29 Aug 2026 04:39:47 GMT; Max-Age=31536000; path=/; httponly; samesite=lax; XSRF-TOKEN=eyJpdiI6ImdJbEtsVkxtbVNnaFhwWUFZQ1JlUHc9PSIsInZhbHVlIjoiSUhhcmsyR1lURHIvK0FMU01xa1FlZ2ZTeFZyRDhERUtJS2VSRnBVaGhLcFFPQnQvUkEvNFNMN2F2ZHVNa0JoRzA5UTE4ejlMYXJtWVlOQmZuekJxM2MyVUw1c1c4amlvc05QdmFLTGQ5NkRqdHRBb3RrSXdsQngyK1pXT3NTOEkiLCJtYWMiOiIxODk2ODA5ZTg5NmQzNDk1OWM0NTlhYTM2NGM3N2JkYWQzYWI4ZDdiZWQyZmI5ZTFjNjZhNjY2MDQyMmEzYzA4IiwidGFnIjoiIn0%3D; expires=Fri, 29 Aug 2025 06:39:47 GMT; Max-Age=7200; path=/; samesite=lax; laravel_session=eyJpdiI6IlFNcDBJd2lBN0IyYVZHMFZ4YWE1OEE9PSIsInZhbHVlIjoiZGliSVB4alhTcnVpanpQU2RvcWo1N1ZuTW5iaTdrQ283S3dXeW9RSXUvVTNmUE80NVBsNWo1WXR6Uld4c3VPa1U4aEFQeTE2Q0hLanhRNWoxS3d5Y25tdFc2ZWVVZlJ5dVlmTEJvYUJ5ckdZeTJZanJTZEo4ZVl3c2JGUm9rb3IiLCJtYWMiOiJlYzk0YzU3N2Q1ZWY2ZDQwZDk0NWJmMDI1YTg5ZDA0ZWEzZThhN2NlNTZhNjY3OTAzZDIwNWE1ZTBiY2I4ZmU5IiwidGFnIjoiIn0%3D; expires=Fri, 29 Aug 2025 06:39:47 GMT; Max-Age=7200; path=/; httponly; samesite=lax
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">&lt;!DOCTYPE html&gt;
&lt;html lang=&quot;en&quot;&gt;
    &lt;head&gt;
        &lt;meta charset=&quot;utf-8&quot;&gt;
        &lt;meta name=&quot;viewport&quot; content=&quot;width=device-width, initial-scale=1&quot;&gt;

        &lt;title&gt;Laravel&lt;/title&gt;

        &lt;!-- Fonts --&gt;
        &lt;link rel=&quot;preconnect&quot; href=&quot;https://fonts.bunny.net&quot;&gt;
        &lt;link href=&quot;https://fonts.bunny.net/css?family=instrument-sans:400,500,600&quot; rel=&quot;stylesheet&quot; /&gt;

        &lt;!-- Styles / Scripts --&gt;
                    &lt;link rel=&quot;preload&quot; as=&quot;style&quot; href=&quot;http://127.0.0.1:8000/build/assets/app-GHg_Xo9N.css&quot; /&gt;&lt;link rel=&quot;modulepreload&quot; as=&quot;script&quot; href=&quot;http://127.0.0.1:8000/build/assets/app-DtCVKgHt.js&quot; /&gt;&lt;link rel=&quot;stylesheet&quot; href=&quot;http://127.0.0.1:8000/build/assets/app-GHg_Xo9N.css&quot; /&gt;&lt;script type=&quot;module&quot; src=&quot;http://127.0.0.1:8000/build/assets/app-DtCVKgHt.js&quot;&gt;&lt;/script&gt;            &lt;/head&gt;
    &lt;body class=&quot;bg-[#FDFDFC] dark:bg-[#0a0a0a] text-[#1b1b18] flex p-6 lg:p-8 items-center lg:justify-center min-h-screen flex-col&quot;&gt;
        &lt;header class=&quot;w-full lg:max-w-4xl max-w-[335px] text-sm mb-6 not-has-[nav]:hidden&quot;&gt;
                            &lt;nav class=&quot;flex items-center justify-end gap-4&quot;&gt;
                                            &lt;a
                            href=&quot;http://127.0.0.1:8000/login&quot;
                            class=&quot;inline-block px-5 py-1.5 dark:text-[#EDEDEC] text-[#1b1b18] border border-transparent hover:border-[#19140035] dark:hover:border-[#3E3E3A] rounded-sm text-sm leading-normal&quot;
                        &gt;
                            Log In
                        &lt;/a&gt;

                                                    &lt;a
                                href=&quot;http://127.0.0.1:8000/register&quot;
                                class=&quot;inline-block px-5 py-1.5 dark:text-[#EDEDEC] border-[#19140035] hover:border-[#1915014a] border text-[#1b1b18] dark:border-[#3E3E3A] dark:hover:border-[#62605b] rounded-sm text-sm leading-normal&quot;&gt;
                                Register
                            &lt;/a&gt;
                                                            &lt;/nav&gt;
                    &lt;/header&gt;
        &lt;div class=&quot;flex items-center justify-center w-full transition-opacity opacity-100 duration-750 lg:grow starting:opacity-0&quot;&gt;
            &lt;main class=&quot;flex max-w-[335px] w-full flex-col-reverse lg:max-w-4xl lg:flex-row&quot;&gt;
                &lt;div class=&quot;text-[13px] leading-[20px] flex-1 p-6 pb-12 lg:p-20 bg-white dark:bg-[#161615] dark:text-[#EDEDEC] shadow-[inset_0px_0px_0px_1px_rgba(26,26,0,0.16)] dark:shadow-[inset_0px_0px_0px_1px_#fffaed2d] rounded-bl-lg rounded-br-lg lg:rounded-tl-lg lg:rounded-br-none&quot;&gt;
                    &lt;h1 class=&quot;mb-1 font-medium&quot;&gt;Let&#039;s get started&lt;/h1&gt;
                    &lt;p class=&quot;mb-2 text-[#706f6c] dark:text-[#A1A09A]&quot;&gt;Laravel has an incredibly rich ecosystem. &lt;br&gt;We suggest starting with the following.&lt;/p&gt;
                    &lt;ul class=&quot;flex flex-col mb-4 lg:mb-6&quot;&gt;
                        &lt;li class=&quot;flex items-center gap-4 py-2 relative before:border-l before:border-[#e3e3e0] dark:before:border-[#3E3E3A] before:top-1/2 before:bottom-0 before:left-[0.4rem] before:absolute&quot;&gt;
                            &lt;span class=&quot;relative py-1 bg-white dark:bg-[#161615]&quot;&gt;
                                &lt;span class=&quot;flex items-center justify-center rounded-full bg-[#FDFDFC] dark:bg-[#161615] shadow-[0px_0px_1px_0px_rgba(0,0,0,0.03),0px_1px_2px_0px_rgba(0,0,0,0.06)] w-3.5 h-3.5 border dark:border-[#3E3E3A] border-[#e3e3e0]&quot;&gt;
                                    &lt;span class=&quot;rounded-full bg-[#dbdbd7] dark:bg-[#3E3E3A] w-1.5 h-1.5&quot;&gt;&lt;/span&gt;
                                &lt;/span&gt;
                            &lt;/span&gt;
                            &lt;span&gt;
                                Read the
                                &lt;a href=&quot;https://laravel.com/docs&quot; target=&quot;_blank&quot; class=&quot;inline-flex items-center space-x-1 font-medium underline underline-offset-4 text-[#f53003] dark:text-[#FF4433] ml-1&quot;&gt;
                                    &lt;span&gt;Documentation&lt;/span&gt;
                                    &lt;svg
                                        width=&quot;10&quot;
                                        height=&quot;11&quot;
                                        viewBox=&quot;0 0 10 11&quot;
                                        fill=&quot;none&quot;
                                        xmlns=&quot;http://www.w3.org/2000/svg&quot;
                                        class=&quot;w-2.5 h-2.5&quot;
                                    &gt;
                                        &lt;path
                                            d=&quot;M7.70833 6.95834V2.79167H3.54167M2.5 8L7.5 3.00001&quot;
                                            stroke=&quot;currentColor&quot;
                                            stroke-linecap=&quot;square&quot;
                                        /&gt;
                                    &lt;/svg&gt;
                                &lt;/a&gt;
                            &lt;/span&gt;
                        &lt;/li&gt;
                        &lt;li class=&quot;flex items-center gap-4 py-2 relative before:border-l before:border-[#e3e3e0] dark:before:border-[#3E3E3A] before:bottom-1/2 before:top-0 before:left-[0.4rem] before:absolute&quot;&gt;
                            &lt;span class=&quot;relative py-1 bg-white dark:bg-[#161615]&quot;&gt;
                                &lt;span class=&quot;flex items-center justify-center rounded-full bg-[#FDFDFC] dark:bg-[#161615] shadow-[0px_0px_1px_0px_rgba(0,0,0,0.03),0px_1px_2px_0px_rgba(0,0,0,0.06)] w-3.5 h-3.5 border dark:border-[#3E3E3A] border-[#e3e3e0]&quot;&gt;
                                    &lt;span class=&quot;rounded-full bg-[#dbdbd7] dark:bg-[#3E3E3A] w-1.5 h-1.5&quot;&gt;&lt;/span&gt;
                                &lt;/span&gt;
                            &lt;/span&gt;
                            &lt;span&gt;
                                Watch video tutorials at
                                &lt;a href=&quot;https://laracasts.com&quot; target=&quot;_blank&quot; class=&quot;inline-flex items-center space-x-1 font-medium underline underline-offset-4 text-[#f53003] dark:text-[#FF4433] ml-1&quot;&gt;
                                    &lt;span&gt;Laracasts&lt;/span&gt;
                                    &lt;svg
                                        width=&quot;10&quot;
                                        height=&quot;11&quot;
                                        viewBox=&quot;0 0 10 11&quot;
                                        fill=&quot;none&quot;
                                        xmlns=&quot;http://www.w3.org/2000/svg&quot;
                                        class=&quot;w-2.5 h-2.5&quot;
                                    &gt;
                                        &lt;path
                                            d=&quot;M7.70833 6.95834V2.79167H3.54167M2.5 8L7.5 3.00001&quot;
                                            stroke=&quot;currentColor&quot;
                                            stroke-linecap=&quot;square&quot;
                                        /&gt;
                                    &lt;/svg&gt;
                                &lt;/a&gt;
                            &lt;/span&gt;
                        &lt;/li&gt;
                    &lt;/ul&gt;
                    &lt;ul class=&quot;flex gap-3 text-sm leading-normal&quot;&gt;
                        &lt;li&gt;
                            &lt;a href=&quot;https://cloud.laravel.com&quot; target=&quot;_blank&quot; class=&quot;inline-block dark:bg-[#eeeeec] dark:border-[#eeeeec] dark:text-[#1C1C1A] dark:hover:bg-white dark:hover:border-white hover:bg-black hover:border-black px-5 py-1.5 bg-[#1b1b18] rounded-sm border border-black text-white text-sm leading-normal&quot;&gt;
                                Deploy now
                            &lt;/a&gt;
                        &lt;/li&gt;
                    &lt;/ul&gt;
                &lt;/div&gt;
                &lt;div class=&quot;bg-[#fff2f2] dark:bg-[#1D0002] relative lg:-ml-px -mb-px lg:mb-0 rounded-t-lg lg:rounded-t-none lg:rounded-r-lg aspect-[335/376] lg:aspect-auto w-full lg:w-[438px] shrink-0 overflow-hidden&quot;&gt;
                    
                    &lt;svg class=&quot;w-full text-[#F53003] dark:text-[#F61500] transition-all translate-y-0 opacity-100 max-w-none duration-750 starting:opacity-0 starting:translate-y-6&quot; viewBox=&quot;0 0 438 104&quot; fill=&quot;none&quot; xmlns=&quot;http://www.w3.org/2000/svg&quot;&gt;
                        &lt;path d=&quot;M17.2036 -3H0V102.197H49.5189V86.7187H17.2036V-3Z&quot; fill=&quot;currentColor&quot; /&gt;
                        &lt;path d=&quot;M110.256 41.6337C108.061 38.1275 104.945 35.3731 100.905 33.3681C96.8667 31.3647 92.8016 30.3618 88.7131 30.3618C83.4247 30.3618 78.5885 31.3389 74.201 33.2923C69.8111 35.2456 66.0474 37.928 62.9059 41.3333C59.7643 44.7401 57.3198 48.6726 55.5754 53.1293C53.8287 57.589 52.9572 62.274 52.9572 67.1813C52.9572 72.1925 53.8287 76.8995 55.5754 81.3069C57.3191 85.7173 59.7636 89.6241 62.9059 93.0293C66.0474 96.4361 69.8119 99.1155 74.201 101.069C78.5885 103.022 83.4247 103.999 88.7131 103.999C92.8016 103.999 96.8667 102.997 100.905 100.994C104.945 98.9911 108.061 96.2359 110.256 92.7282V102.195H126.563V32.1642H110.256V41.6337ZM108.76 75.7472C107.762 78.4531 106.366 80.8078 104.572 82.8112C102.776 84.8161 100.606 86.4183 98.0637 87.6206C95.5202 88.823 92.7004 89.4238 89.6103 89.4238C86.5178 89.4238 83.7252 88.823 81.2324 87.6206C78.7388 86.4183 76.5949 84.8161 74.7998 82.8112C73.004 80.8078 71.6319 78.4531 70.6856 75.7472C69.7356 73.0421 69.2644 70.1868 69.2644 67.1821C69.2644 64.1758 69.7356 61.3205 70.6856 58.6154C71.6319 55.9102 73.004 53.5571 74.7998 51.5522C76.5949 49.5495 78.738 47.9451 81.2324 46.7427C83.7252 45.5404 86.5178 44.9396 89.6103 44.9396C92.7012 44.9396 95.5202 45.5404 98.0637 46.7427C100.606 47.9451 102.776 49.5487 104.572 51.5522C106.367 53.5571 107.762 55.9102 108.76 58.6154C109.756 61.3205 110.256 64.1758 110.256 67.1821C110.256 70.1868 109.756 73.0421 108.76 75.7472Z&quot; fill=&quot;currentColor&quot; /&gt;
                        &lt;path d=&quot;M242.805 41.6337C240.611 38.1275 237.494 35.3731 233.455 33.3681C229.416 31.3647 225.351 30.3618 221.262 30.3618C215.974 30.3618 211.138 31.3389 206.75 33.2923C202.36 35.2456 198.597 37.928 195.455 41.3333C192.314 44.7401 189.869 48.6726 188.125 53.1293C186.378 57.589 185.507 62.274 185.507 67.1813C185.507 72.1925 186.378 76.8995 188.125 81.3069C189.868 85.7173 192.313 89.6241 195.455 93.0293C198.597 96.4361 202.361 99.1155 206.75 101.069C211.138 103.022 215.974 103.999 221.262 103.999C225.351 103.999 229.416 102.997 233.455 100.994C237.494 98.9911 240.611 96.2359 242.805 92.7282V102.195H259.112V32.1642H242.805V41.6337ZM241.31 75.7472C240.312 78.4531 238.916 80.8078 237.122 82.8112C235.326 84.8161 233.156 86.4183 230.614 87.6206C228.07 88.823 225.251 89.4238 222.16 89.4238C219.068 89.4238 216.275 88.823 213.782 87.6206C211.289 86.4183 209.145 84.8161 207.35 82.8112C205.554 80.8078 204.182 78.4531 203.236 75.7472C202.286 73.0421 201.814 70.1868 201.814 67.1821C201.814 64.1758 202.286 61.3205 203.236 58.6154C204.182 55.9102 205.554 53.5571 207.35 51.5522C209.145 49.5495 211.288 47.9451 213.782 46.7427C216.275 45.5404 219.068 44.9396 222.16 44.9396C225.251 44.9396 228.07 45.5404 230.614 46.7427C233.156 47.9451 235.326 49.5487 237.122 51.5522C238.917 53.5571 240.312 55.9102 241.31 58.6154C242.306 61.3205 242.806 64.1758 242.806 67.1821C242.805 70.1868 242.305 73.0421 241.31 75.7472Z&quot; fill=&quot;currentColor&quot; /&gt;
                        &lt;path d=&quot;M438 -3H421.694V102.197H438V-3Z&quot; fill=&quot;currentColor&quot; /&gt;
                        &lt;path d=&quot;M139.43 102.197H155.735V48.2834H183.712V32.1665H139.43V102.197Z&quot; fill=&quot;currentColor&quot; /&gt;
                        &lt;path d=&quot;M324.49 32.1665L303.995 85.794L283.498 32.1665H266.983L293.748 102.197H314.242L341.006 32.1665H324.49Z&quot; fill=&quot;currentColor&quot; /&gt;
                        &lt;path d=&quot;M376.571 30.3656C356.603 30.3656 340.797 46.8497 340.797 67.1828C340.797 89.6597 356.094 104 378.661 104C391.29 104 399.354 99.1488 409.206 88.5848L398.189 80.0226C398.183 80.031 389.874 90.9895 377.468 90.9895C363.048 90.9895 356.977 79.3111 356.977 73.269H411.075C413.917 50.1328 398.775 30.3656 376.571 30.3656ZM357.02 61.0967C357.145 59.7487 359.023 43.3761 376.442 43.3761C393.861 43.3761 395.978 59.7464 396.099 61.0967H357.02Z&quot; fill=&quot;currentColor&quot; /&gt;
                    &lt;/svg&gt;

                    
                    &lt;svg class=&quot;w-[448px] max-w-none relative -mt-[4.9rem] -ml-8 lg:ml-0 lg:-mt-[6.6rem] dark:hidden&quot; viewBox=&quot;0 0 440 376&quot; fill=&quot;none&quot; xmlns=&quot;http://www.w3.org/2000/svg&quot;&gt;
                        &lt;g class=&quot;transition-all delay-300 translate-y-0 opacity-100 duration-750 starting:opacity-0 starting:translate-y-4&quot;&gt;
                            &lt;path d=&quot;M188.263 355.73L188.595 355.73C195.441 348.845 205.766 339.761 219.569 328.477C232.93 317.193 242.978 308.205 249.714 301.511C256.34 294.626 260.867 287.358 263.296 279.708C265.725 272.058 264.565 264.121 259.816 255.896C254.516 246.716 247.062 239.352 237.454 233.805C227.957 228.067 217.908 225.198 207.307 225.198C196.927 225.197 190.136 227.97 186.934 233.516C183.621 238.872 184.726 246.331 190.247 255.894L125.647 255.891C116.371 239.825 112.395 225.481 113.72 212.858C115.265 200.235 121.559 190.481 132.602 183.596C143.754 176.52 158.607 172.982 177.159 172.983C196.594 172.984 215.863 176.523 234.968 183.6C253.961 190.486 271.299 200.241 286.98 212.864C302.661 225.488 315.14 239.833 324.416 255.899C333.03 270.817 336.841 283.918 335.847 295.203C335.075 306.487 331.376 316.336 324.75 324.751C318.346 333.167 308.408 343.494 294.936 355.734L377.094 355.737L405.917 405.656L217.087 405.649L188.263 355.73Z&quot; fill=&quot;black&quot; /&gt;
                            &lt;path d=&quot;M9.11884 226.339L-13.7396 226.338L-42.7286 176.132L43.0733 176.135L175.595 405.649L112.651 405.647L9.11884 226.339Z&quot; fill=&quot;black&quot; /&gt;
                            &lt;path d=&quot;M188.263 355.73L188.595 355.73C195.441 348.845 205.766 339.761 219.569 328.477C232.93 317.193 242.978 308.205 249.714 301.511C256.34 294.626 260.867 287.358 263.296 279.708C265.725 272.058 264.565 264.121 259.816 255.896C254.516 246.716 247.062 239.352 237.454 233.805C227.957 228.067 217.908 225.198 207.307 225.198C196.927 225.197 190.136 227.97 186.934 233.516C183.621 238.872 184.726 246.331 190.247 255.894L125.647 255.891C116.371 239.825 112.395 225.481 113.72 212.858C115.265 200.235 121.559 190.481 132.602 183.596C143.754 176.52 158.607 172.982 177.159 172.983C196.594 172.984 215.863 176.523 234.968 183.6C253.961 190.486 271.299 200.241 286.98 212.864C302.661 225.488 315.14 239.833 324.416 255.899C333.03 270.817 336.841 283.918 335.847 295.203C335.075 306.487 331.376 316.336 324.75 324.751C318.346 333.167 308.408 343.494 294.936 355.734L377.094 355.737L405.917 405.656L217.087 405.649L188.263 355.73Z&quot; stroke=&quot;#1B1B18&quot; stroke-width=&quot;1&quot; /&gt;
                            &lt;path d=&quot;M9.11884 226.339L-13.7396 226.338L-42.7286 176.132L43.0733 176.135L175.595 405.649L112.651 405.647L9.11884 226.339Z&quot; stroke=&quot;#1B1B18&quot; stroke-width=&quot;1&quot; /&gt;
                            &lt;path d=&quot;M204.592 327.449L204.923 327.449C211.769 320.564 222.094 311.479 235.897 300.196C249.258 288.912 259.306 279.923 266.042 273.23C272.668 266.345 277.195 259.077 279.624 251.427C282.053 243.777 280.893 235.839 276.145 227.615C270.844 218.435 263.39 211.071 253.782 205.524C244.285 199.786 234.236 196.917 223.635 196.916C213.255 196.916 206.464 199.689 203.262 205.235C199.949 210.59 201.054 218.049 206.575 227.612L141.975 227.61C132.699 211.544 128.723 197.2 130.048 184.577C131.593 171.954 137.887 162.2 148.93 155.315C160.083 148.239 174.935 144.701 193.487 144.702C212.922 144.703 232.192 148.242 251.296 155.319C270.289 162.205 287.627 171.96 303.308 184.583C318.989 197.207 331.468 211.552 340.745 227.618C349.358 242.536 353.169 255.637 352.175 266.921C351.403 278.205 347.704 288.055 341.078 296.47C334.674 304.885 324.736 315.213 311.264 327.453L393.422 327.456L422.246 377.375L233.415 377.368L204.592 327.449Z&quot; fill=&quot;#F8B803&quot; /&gt;
                            &lt;path d=&quot;M25.447 198.058L2.58852 198.057L-26.4005 147.851L59.4015 147.854L191.923 377.368L128.979 377.365L25.447 198.058Z&quot; fill=&quot;#F8B803&quot; /&gt;
                            &lt;path d=&quot;M204.592 327.449L204.923 327.449C211.769 320.564 222.094 311.479 235.897 300.196C249.258 288.912 259.306 279.923 266.042 273.23C272.668 266.345 277.195 259.077 279.624 251.427C282.053 243.777 280.893 235.839 276.145 227.615C270.844 218.435 263.39 211.071 253.782 205.524C244.285 199.786 234.236 196.917 223.635 196.916C213.255 196.916 206.464 199.689 203.262 205.235C199.949 210.59 201.054 218.049 206.575 227.612L141.975 227.61C132.699 211.544 128.723 197.2 130.048 184.577C131.593 171.954 137.887 162.2 148.93 155.315C160.083 148.239 174.935 144.701 193.487 144.702C212.922 144.703 232.192 148.242 251.296 155.319C270.289 162.205 287.627 171.96 303.308 184.583C318.989 197.207 331.468 211.552 340.745 227.618C349.358 242.536 353.169 255.637 352.175 266.921C351.403 278.205 347.704 288.055 341.078 296.47C334.674 304.885 324.736 315.213 311.264 327.453L393.422 327.456L422.246 377.375L233.415 377.368L204.592 327.449Z&quot; stroke=&quot;#1B1B18&quot; stroke-width=&quot;1&quot; /&gt;
                            &lt;path d=&quot;M25.447 198.058L2.58852 198.057L-26.4005 147.851L59.4015 147.854L191.923 377.368L128.979 377.365L25.447 198.058Z&quot; stroke=&quot;#1B1B18&quot; stroke-width=&quot;1&quot; /&gt;
                        &lt;/g&gt;
                        &lt;g style=&quot;mix-blend-mode: hard-light&quot; class=&quot;transition-all delay-300 translate-y-0 opacity-100 duration-750 starting:opacity-0 starting:translate-y-4&quot;&gt;
                            &lt;path d=&quot;M217.342 305.363L217.673 305.363C224.519 298.478 234.844 289.393 248.647 278.11C262.008 266.826 272.056 257.837 278.792 251.144C285.418 244.259 289.945 236.991 292.374 229.341C294.803 221.691 293.643 213.753 288.895 205.529C283.594 196.349 276.14 188.985 266.532 183.438C257.035 177.7 246.986 174.831 236.385 174.83C226.005 174.83 219.214 177.603 216.012 183.149C212.699 188.504 213.804 195.963 219.325 205.527L154.725 205.524C145.449 189.458 141.473 175.114 142.798 162.491C144.343 149.868 150.637 140.114 161.68 133.229C172.833 126.153 187.685 122.615 206.237 122.616C225.672 122.617 244.942 126.156 264.046 133.233C283.039 140.119 300.377 149.874 316.058 162.497C331.739 175.121 344.218 189.466 353.495 205.532C362.108 220.45 365.919 233.551 364.925 244.835C364.153 256.12 360.454 265.969 353.828 274.384C347.424 282.799 337.486 293.127 324.014 305.367L406.172 305.37L434.996 355.289L246.165 355.282L217.342 305.363Z&quot; fill=&quot;#F0ACB8&quot; /&gt;
                            &lt;path d=&quot;M38.197 175.972L15.3385 175.971L-13.6505 125.765L72.1515 125.768L204.673 355.282L141.729 355.279L38.197 175.972Z&quot; fill=&quot;#F0ACB8&quot; /&gt;
                            &lt;path d=&quot;M217.342 305.363L217.673 305.363C224.519 298.478 234.844 289.393 248.647 278.11C262.008 266.826 272.056 257.837 278.792 251.144C285.418 244.259 289.945 236.991 292.374 229.341C294.803 221.691 293.643 213.753 288.895 205.529C283.594 196.349 276.14 188.985 266.532 183.438C257.035 177.7 246.986 174.831 236.385 174.83C226.005 174.83 219.214 177.603 216.012 183.149C212.699 188.504 213.804 195.963 219.325 205.527L154.725 205.524C145.449 189.458 141.473 175.114 142.798 162.491C144.343 149.868 150.637 140.114 161.68 133.229C172.833 126.153 187.685 122.615 206.237 122.616C225.672 122.617 244.942 126.156 264.046 133.233C283.039 140.119 300.377 149.874 316.058 162.497C331.739 175.121 344.218 189.466 353.495 205.532C362.108 220.45 365.919 233.551 364.925 244.835C364.153 256.12 360.454 265.969 353.828 274.384C347.424 282.799 337.486 293.127 324.014 305.367L406.172 305.37L434.996 355.289L246.165 355.282L217.342 305.363Z&quot; stroke=&quot;#1B1B18&quot; stroke-width=&quot;1&quot; /&gt;
                            &lt;path d=&quot;M38.197 175.972L15.3385 175.971L-13.6505 125.765L72.1515 125.768L204.673 355.282L141.729 355.279L38.197 175.972Z&quot; stroke=&quot;#1B1B18&quot; stroke-width=&quot;1&quot; /&gt;
                        &lt;/g&gt;
                        &lt;g style=&quot;mix-blend-mode: plus-darker&quot; class=&quot;transition-all delay-300 translate-y-0 opacity-100 duration-750 starting:opacity-0 starting:translate-y-4&quot;&gt;
                            &lt;path d=&quot;M230.951 281.792L231.282 281.793C238.128 274.907 248.453 265.823 262.256 254.539C275.617 243.256 285.666 234.267 292.402 227.573C299.027 220.688 303.554 213.421 305.983 205.771C308.412 198.12 307.253 190.183 302.504 181.959C297.203 172.778 289.749 165.415 280.142 159.868C270.645 154.13 260.596 151.26 249.995 151.26C239.615 151.26 232.823 154.033 229.621 159.579C226.309 164.934 227.413 172.393 232.935 181.956L168.335 181.954C159.058 165.888 155.082 151.543 156.407 138.92C157.953 126.298 164.247 116.544 175.289 109.659C186.442 102.583 201.294 99.045 219.846 99.0457C239.281 99.0464 258.551 102.585 277.655 109.663C296.649 116.549 313.986 126.303 329.667 138.927C345.349 151.551 357.827 165.895 367.104 181.961C375.718 196.88 379.528 209.981 378.535 221.265C377.762 232.549 374.063 242.399 367.438 250.814C361.033 259.229 351.095 269.557 337.624 281.796L419.782 281.8L448.605 331.719L259.774 331.712L230.951 281.792Z&quot; fill=&quot;#F3BEC7&quot; /&gt;
                            &lt;path d=&quot;M51.8063 152.402L28.9479 152.401L-0.0411453 102.195L85.7608 102.198L218.282 331.711L155.339 331.709L51.8063 152.402Z&quot; fill=&quot;#F3BEC7&quot; /&gt;
                            &lt;path d=&quot;M230.951 281.792L231.282 281.793C238.128 274.907 248.453 265.823 262.256 254.539C275.617 243.256 285.666 234.267 292.402 227.573C299.027 220.688 303.554 213.421 305.983 205.771C308.412 198.12 307.253 190.183 302.504 181.959C297.203 172.778 289.749 165.415 280.142 159.868C270.645 154.13 260.596 151.26 249.995 151.26C239.615 151.26 232.823 154.033 229.621 159.579C226.309 164.934 227.413 172.393 232.935 181.956L168.335 181.954C159.058 165.888 155.082 151.543 156.407 138.92C157.953 126.298 164.247 116.544 175.289 109.659C186.442 102.583 201.294 99.045 219.846 99.0457C239.281 99.0464 258.551 102.585 277.655 109.663C296.649 116.549 313.986 126.303 329.667 138.927C345.349 151.551 357.827 165.895 367.104 181.961C375.718 196.88 379.528 209.981 378.535 221.265C377.762 232.549 374.063 242.399 367.438 250.814C361.033 259.229 351.095 269.557 337.624 281.796L419.782 281.8L448.605 331.719L259.774 331.712L230.951 281.792Z&quot; stroke=&quot;#1B1B18&quot; stroke-width=&quot;1&quot; /&gt;
                            &lt;path d=&quot;M51.8063 152.402L28.9479 152.401L-0.0411453 102.195L85.7608 102.198L218.282 331.711L155.339 331.709L51.8063 152.402Z&quot; stroke=&quot;#1B1B18&quot; stroke-width=&quot;1&quot; /&gt;
                        &lt;/g&gt;
                        &lt;g class=&quot;transition-all delay-300 translate-y-0 opacity-100 duration-750 starting:opacity-0 starting:translate-y-4&quot;&gt;
                            &lt;path d=&quot;M188.467 355.363L188.798 355.363C195.644 348.478 205.969 339.393 219.772 328.11C233.133 316.826 243.181 307.837 249.917 301.144C253.696 297.217 256.792 293.166 259.205 288.991C261.024 285.845 262.455 282.628 263.499 279.341C265.928 271.691 264.768 263.753 260.02 255.529C254.719 246.349 247.265 238.985 237.657 233.438C228.16 227.7 218.111 224.831 207.51 224.83C197.13 224.83 190.339 227.603 187.137 233.149C183.824 238.504 184.929 245.963 190.45 255.527L125.851 255.524C116.574 239.458 112.598 225.114 113.923 212.491C114.615 206.836 116.261 201.756 118.859 197.253C122.061 191.704 126.709 187.03 132.805 183.229C143.958 176.153 158.81 172.615 177.362 172.616C196.797 172.617 216.067 176.156 235.171 183.233C254.164 190.119 271.502 199.874 287.183 212.497C302.864 225.121 315.343 239.466 324.62 255.532C333.233 270.45 337.044 283.551 336.05 294.835C335.46 303.459 333.16 311.245 329.151 318.194C327.915 320.337 326.515 322.4 324.953 324.384C318.549 332.799 308.611 343.127 295.139 355.367L377.297 355.37L406.121 405.289L217.29 405.282L188.467 355.363Z&quot; stroke=&quot;#1B1B18&quot; stroke-width=&quot;1&quot; stroke-linejoin=&quot;bevel&quot; /&gt;
                            &lt;path d=&quot;M9.32197 225.972L-13.5365 225.971L-42.5255 175.765L43.2765 175.768L175.798 405.282L112.854 405.279L9.32197 225.972Z&quot; stroke=&quot;#1B1B18&quot; stroke-width=&quot;1&quot; stroke-linejoin=&quot;bevel&quot; /&gt;
                            &lt;path d=&quot;M345.247 111.915C329.566 99.2919 312.229 89.5371 293.235 82.6512L235.167 183.228C254.161 190.114 271.498 199.869 287.179 212.492L345.247 111.915Z&quot; stroke=&quot;#1B1B18&quot; stroke-width=&quot;1&quot; stroke-linejoin=&quot;bevel&quot; /&gt;
                            &lt;path d=&quot;M382.686 154.964C373.41 138.898 360.931 124.553 345.25 111.93L287.182 212.506C302.863 225.13 315.342 239.475 324.618 255.541L382.686 154.964Z&quot; stroke=&quot;#1B1B18&quot; stroke-width=&quot;1&quot; stroke-linejoin=&quot;bevel&quot; /&gt;
                            &lt;path d=&quot;M293.243 82.6472C274.139 75.57 254.869 72.031 235.434 72.0303L177.366 172.607C196.801 172.608 216.071 176.147 235.175 183.224L293.243 82.6472Z&quot; stroke=&quot;#1B1B18&quot; stroke-width=&quot;1&quot; stroke-linejoin=&quot;bevel&quot; /&gt;
                            &lt;path d=&quot;M394.118 194.257C395.112 182.973 391.301 169.872 382.688 154.953L324.619 255.53C333.233 270.448 337.044 283.55 336.05 294.834L394.118 194.257Z&quot; stroke=&quot;#1B1B18&quot; stroke-width=&quot;1&quot; stroke-linejoin=&quot;bevel&quot; /&gt;
                            &lt;path d=&quot;M235.432 72.0311C216.88 72.0304 202.027 75.5681 190.875 82.6442L132.806 183.221C143.959 176.145 158.812 172.607 177.363 172.608L235.432 72.0311Z&quot; stroke=&quot;#1B1B18&quot; stroke-width=&quot;1&quot; stroke-linejoin=&quot;bevel&quot; /&gt;
                            &lt;path d=&quot;M265.59 124.25C276.191 124.251 286.24 127.12 295.737 132.858L237.669 233.435C228.172 227.697 218.123 224.828 207.522 224.827L265.59 124.25Z&quot; stroke=&quot;#1B1B18&quot; stroke-width=&quot;1&quot; stroke-linejoin=&quot;bevel&quot; /&gt;
                            &lt;path d=&quot;M295.719 132.859C305.326 138.406 312.78 145.77 318.081 154.95L260.013 255.527C254.712 246.347 247.258 238.983 237.651 233.436L295.719 132.859Z&quot; stroke=&quot;#1B1B18&quot; stroke-width=&quot;1&quot; stroke-linejoin=&quot;bevel&quot; /&gt;
                            &lt;path d=&quot;M387.218 217.608C391.227 210.66 393.527 202.874 394.117 194.25L336.049 294.827C335.459 303.451 333.159 311.237 329.15 318.185L387.218 217.608Z&quot; stroke=&quot;#1B1B18&quot; stroke-width=&quot;1&quot; stroke-linejoin=&quot;bevel&quot; /&gt;
                            &lt;path d=&quot;M245.211 132.577C248.413 127.03 255.204 124.257 265.584 124.258L207.516 224.835C197.136 224.834 190.345 227.607 187.143 233.154L245.211 132.577Z&quot; stroke=&quot;#1B1B18&quot; stroke-width=&quot;1&quot; stroke-linejoin=&quot;bevel&quot; /&gt;
                            &lt;path d=&quot;M318.094 154.945C322.842 163.17 324.002 171.107 321.573 178.757L263.505 279.334C265.934 271.684 264.774 263.746 260.026 255.522L318.094 154.945Z&quot; stroke=&quot;#1B1B18&quot; stroke-width=&quot;1&quot; stroke-linejoin=&quot;bevel&quot; /&gt;
                            &lt;path d=&quot;M176.925 96.6737C180.127 91.1249 184.776 86.4503 190.871 82.6499L132.803 183.227C126.708 187.027 122.059 191.702 118.857 197.25L176.925 96.6737Z&quot; stroke=&quot;#1B1B18&quot; stroke-width=&quot;1&quot; stroke-linejoin=&quot;bevel&quot; /&gt;
                            &lt;path d=&quot;M387.226 217.606C385.989 219.749 384.59 221.813 383.028 223.797L324.96 324.373C326.522 322.39 327.921 320.326 329.157 318.183L387.226 217.606Z&quot; stroke=&quot;#1B1B18&quot; stroke-width=&quot;1&quot; stroke-linejoin=&quot;bevel&quot; /&gt;
                            &lt;path d=&quot;M317.269 188.408C319.087 185.262 320.519 182.045 321.562 178.758L263.494 279.335C262.451 282.622 261.019 285.839 259.201 288.985L317.269 188.408Z&quot; stroke=&quot;#1B1B18&quot; stroke-width=&quot;1&quot; stroke-linejoin=&quot;bevel&quot; /&gt;
                            &lt;path d=&quot;M245.208 132.573C241.895 137.928 243 145.387 248.522 154.95L190.454 255.527C184.932 245.964 183.827 238.505 187.14 233.15L245.208 132.573Z&quot; stroke=&quot;#1B1B18&quot; stroke-width=&quot;1&quot; stroke-linejoin=&quot;bevel&quot; /&gt;
                            &lt;path d=&quot;M176.93 96.6719C174.331 101.175 172.686 106.255 171.993 111.91L113.925 212.487C114.618 206.831 116.263 201.752 118.862 197.249L176.93 96.6719Z&quot; stroke=&quot;#1B1B18&quot; stroke-width=&quot;1&quot; stroke-linejoin=&quot;bevel&quot; /&gt;
                            &lt;path d=&quot;M317.266 188.413C314.853 192.589 311.757 196.64 307.978 200.566L249.91 301.143C253.689 297.216 256.785 293.166 259.198 288.99L317.266 188.413Z&quot; stroke=&quot;#1B1B18&quot; stroke-width=&quot;1&quot; stroke-linejoin=&quot;bevel&quot; /&gt;
                            &lt;path d=&quot;M464.198 304.708L435.375 254.789L377.307 355.366L406.13 405.285L464.198 304.708Z&quot; stroke=&quot;#1B1B18&quot; stroke-width=&quot;1&quot; stroke-linejoin=&quot;bevel&quot; /&gt;
                            &lt;path d=&quot;M353.209 254.787C366.68 242.548 376.618 232.22 383.023 223.805L324.955 324.382C318.55 332.797 308.612 343.124 295.141 355.364L353.209 254.787Z&quot; stroke=&quot;#1B1B18&quot; stroke-width=&quot;1&quot; stroke-linejoin=&quot;bevel&quot; /&gt;
                            &lt;path d=&quot;M435.37 254.787L353.212 254.784L295.144 355.361L377.302 355.364L435.37 254.787Z&quot; stroke=&quot;#1B1B18&quot; stroke-width=&quot;1&quot; stroke-linejoin=&quot;bevel&quot; /&gt;
                            &lt;path d=&quot;M183.921 154.947L248.521 154.95L190.453 255.527L125.853 255.524L183.921 154.947Z&quot; stroke=&quot;#1B1B18&quot; stroke-width=&quot;1&quot; stroke-linejoin=&quot;bevel&quot; /&gt;
                            &lt;path d=&quot;M171.992 111.914C170.668 124.537 174.643 138.881 183.92 154.947L125.852 255.524C116.575 239.458 112.599 225.114 113.924 212.491L171.992 111.914Z&quot; stroke=&quot;#1B1B18&quot; stroke-width=&quot;1&quot; stroke-linejoin=&quot;bevel&quot; /&gt;
                            &lt;path d=&quot;M307.987 200.562C301.251 207.256 291.203 216.244 277.842 227.528L219.774 328.105C233.135 316.821 243.183 307.832 249.919 301.139L307.987 200.562Z&quot; stroke=&quot;#1B1B18&quot; stroke-width=&quot;1&quot; stroke-linejoin=&quot;bevel&quot; /&gt;
                            &lt;path d=&quot;M15.5469 75.1797L44.5359 125.386L-13.5321 225.963L-42.5212 175.756L15.5469 75.1797Z&quot; stroke=&quot;#1B1B18&quot; stroke-width=&quot;1&quot; stroke-linejoin=&quot;bevel&quot; /&gt;
                            &lt;path d=&quot;M277.836 227.536C264.033 238.82 253.708 247.904 246.862 254.789L188.794 355.366C195.64 348.481 205.965 339.397 219.768 328.113L277.836 227.536Z&quot; stroke=&quot;#1B1B18&quot; stroke-width=&quot;1&quot; stroke-linejoin=&quot;bevel&quot; /&gt;
                            &lt;path d=&quot;M275.358 304.706L464.189 304.713L406.12 405.29L217.29 405.283L275.358 304.706Z&quot; stroke=&quot;#1B1B18&quot; stroke-width=&quot;1&quot; stroke-linejoin=&quot;bevel&quot; /&gt;
                            &lt;path d=&quot;M44.5279 125.39L67.3864 125.39L9.31834 225.967L-13.5401 225.966L44.5279 125.39Z&quot; stroke=&quot;#1B1B18&quot; stroke-width=&quot;1&quot; stroke-linejoin=&quot;bevel&quot; /&gt;
                            &lt;path d=&quot;M101.341 75.1911L233.863 304.705L175.795 405.282L43.2733 175.768L101.341 75.1911ZM15.5431 75.19L-42.525 175.767L43.277 175.77L101.345 75.1932L15.5431 75.19Z&quot; stroke=&quot;#1B1B18&quot; stroke-width=&quot;1&quot; stroke-linejoin=&quot;bevel&quot; /&gt;
                            &lt;path d=&quot;M246.866 254.784L246.534 254.784L188.466 355.361L188.798 355.361L246.866 254.784Z&quot; stroke=&quot;#1B1B18&quot; stroke-width=&quot;1&quot; stroke-linejoin=&quot;bevel&quot; /&gt;
                            &lt;path d=&quot;M246.539 254.781L275.362 304.701L217.294 405.277L188.471 355.358L246.539 254.781Z&quot; stroke=&quot;#1B1B18&quot; stroke-width=&quot;1&quot; stroke-linejoin=&quot;bevel&quot; /&gt;
                            &lt;path d=&quot;M67.3906 125.391L170.923 304.698L112.855 405.275L9.32257 225.967L67.3906 125.391Z&quot; stroke=&quot;#1B1B18&quot; stroke-width=&quot;1&quot; stroke-linejoin=&quot;bevel&quot; /&gt;
                            &lt;path d=&quot;M170.921 304.699L233.865 304.701L175.797 405.278L112.853 405.276L170.921 304.699Z&quot; stroke=&quot;#1B1B18&quot; stroke-width=&quot;1&quot; stroke-linejoin=&quot;bevel&quot; /&gt;
                        &lt;/g&gt;
                        &lt;g style=&quot;mix-blend-mode: hard-light&quot; class=&quot;transition-all delay-300 translate-y-0 opacity-100 duration-750 starting:opacity-0 starting:translate-y-4&quot;&gt;
                            &lt;path d=&quot;M246.544 254.79L246.875 254.79C253.722 247.905 264.046 238.82 277.849 227.537C291.21 216.253 301.259 207.264 307.995 200.57C314.62 193.685 319.147 186.418 321.577 178.768C324.006 171.117 322.846 163.18 318.097 154.956C312.796 145.775 305.342 138.412 295.735 132.865C286.238 127.127 276.189 124.258 265.588 124.257C255.208 124.257 248.416 127.03 245.214 132.576C241.902 137.931 243.006 145.39 248.528 154.953L183.928 154.951C174.652 138.885 170.676 124.541 172 111.918C173.546 99.2946 179.84 89.5408 190.882 82.6559C202.035 75.5798 216.887 72.0421 235.439 72.0428C254.874 72.0435 274.144 75.5825 293.248 82.6598C312.242 89.5457 329.579 99.3005 345.261 111.924C360.942 124.548 373.421 138.892 382.697 154.958C391.311 169.877 395.121 182.978 394.128 194.262C393.355 205.546 389.656 215.396 383.031 223.811C376.627 232.226 366.688 242.554 353.217 254.794L435.375 254.797L464.198 304.716L275.367 304.709L246.544 254.79Z&quot; fill=&quot;#F0ACB8&quot; /&gt;
                            &lt;path d=&quot;M246.544 254.79L246.875 254.79C253.722 247.905 264.046 238.82 277.849 227.537C291.21 216.253 301.259 207.264 307.995 200.57C314.62 193.685 319.147 186.418 321.577 178.768C324.006 171.117 322.846 163.18 318.097 154.956C312.796 145.775 305.342 138.412 295.735 132.865C286.238 127.127 276.189 124.258 265.588 124.257C255.208 124.257 248.416 127.03 245.214 132.576C241.902 137.931 243.006 145.39 248.528 154.953L183.928 154.951C174.652 138.885 170.676 124.541 172 111.918C173.546 99.2946 179.84 89.5408 190.882 82.6559C202.035 75.5798 216.887 72.0421 235.439 72.0428C254.874 72.0435 274.144 75.5825 293.248 82.6598C312.242 89.5457 329.579 99.3005 345.261 111.924C360.942 124.548 373.421 138.892 382.697 154.958C391.311 169.877 395.121 182.978 394.128 194.262C393.355 205.546 389.656 215.396 383.031 223.811C376.627 232.226 366.688 242.554 353.217 254.794L435.375 254.797L464.198 304.716L275.367 304.709L246.544 254.79Z&quot; stroke=&quot;#1B1B18&quot; stroke-width=&quot;1&quot; stroke-linejoin=&quot;round&quot; /&gt;
                        &lt;/g&gt;
                        &lt;g style=&quot;mix-blend-mode: hard-light&quot; class=&quot;transition-all delay-300 translate-y-0 opacity-100 duration-750 starting:opacity-0 starting:translate-y-4&quot;&gt;
                            &lt;path d=&quot;M67.41 125.402L44.5515 125.401L15.5625 75.1953L101.364 75.1985L233.886 304.712L170.942 304.71L67.41 125.402Z&quot; fill=&quot;#F0ACB8&quot; /&gt;
                            &lt;path d=&quot;M67.41 125.402L44.5515 125.401L15.5625 75.1953L101.364 75.1985L233.886 304.712L170.942 304.71L67.41 125.402Z&quot; stroke=&quot;#1B1B18&quot; stroke-width=&quot;1&quot; /&gt;
                        &lt;/g&gt;
                    &lt;/svg&gt;

                    
                    &lt;svg class=&quot;w-[448px] max-w-none relative -mt-[4.9rem] -ml-8 lg:ml-0 lg:-mt-[6.6rem] hidden dark:block&quot; viewBox=&quot;0 0 440 376&quot; fill=&quot;none&quot; xmlns=&quot;http://www.w3.org/2000/svg&quot;&gt;
                        &lt;g class=&quot;transition-all delay-300 translate-y-0 opacity-100 duration-750 starting:opacity-0 starting:translate-y-4&quot;&gt;
                            &lt;path d=&quot;M188.263 355.73L188.595 355.73C195.441 348.845 205.766 339.761 219.569 328.477C232.93 317.193 242.978 308.205 249.714 301.511C256.34 294.626 260.867 287.358 263.296 279.708C265.725 272.058 264.565 264.121 259.816 255.896C254.516 246.716 247.062 239.352 237.454 233.805C227.957 228.067 217.908 225.198 207.307 225.198C196.927 225.197 190.136 227.97 186.934 233.516C183.621 238.872 184.726 246.331 190.247 255.894L125.647 255.891C116.371 239.825 112.395 225.481 113.72 212.858C115.265 200.235 121.559 190.481 132.602 183.596C143.754 176.52 158.607 172.982 177.159 172.983C196.594 172.984 215.863 176.523 234.968 183.6C253.961 190.486 271.299 200.241 286.98 212.864C302.661 225.488 315.14 239.833 324.416 255.899C333.03 270.817 336.841 283.918 335.847 295.203C335.075 306.487 331.376 316.336 324.75 324.751C318.346 333.167 308.408 343.494 294.936 355.734L377.094 355.737L405.917 405.656L217.087 405.649L188.263 355.73Z&quot; fill=&quot;black&quot;/&gt;
                            &lt;path d=&quot;M9.11884 226.339L-13.7396 226.338L-42.7286 176.132L43.0733 176.135L175.595 405.649L112.651 405.647L9.11884 226.339Z&quot; fill=&quot;black&quot;/&gt;
                            &lt;path d=&quot;M188.263 355.73L188.595 355.73C195.441 348.845 205.766 339.761 219.569 328.477C232.93 317.193 242.978 308.205 249.714 301.511C256.34 294.626 260.867 287.358 263.296 279.708C265.725 272.058 264.565 264.121 259.816 255.896C254.516 246.716 247.062 239.352 237.454 233.805C227.957 228.067 217.908 225.198 207.307 225.198C196.927 225.197 190.136 227.97 186.934 233.516C183.621 238.872 184.726 246.331 190.247 255.894L125.647 255.891C116.371 239.825 112.395 225.481 113.72 212.858C115.265 200.235 121.559 190.481 132.602 183.596C143.754 176.52 158.607 172.982 177.159 172.983C196.594 172.984 215.863 176.523 234.968 183.6C253.961 190.486 271.299 200.241 286.98 212.864C302.661 225.488 315.14 239.833 324.416 255.899C333.03 270.817 336.841 283.918 335.847 295.203C335.075 306.487 331.376 316.336 324.75 324.751C318.346 333.167 308.408 343.494 294.936 355.734L377.094 355.737L405.917 405.656L217.087 405.649L188.263 355.73Z&quot; stroke=&quot;#FF750F&quot; stroke-width=&quot;1&quot;/&gt;
                            &lt;path d=&quot;M9.11884 226.339L-13.7396 226.338L-42.7286 176.132L43.0733 176.135L175.595 405.649L112.651 405.647L9.11884 226.339Z&quot; stroke=&quot;#FF750F&quot; stroke-width=&quot;1&quot;/&gt;
                            &lt;path d=&quot;M204.592 327.449L204.923 327.449C211.769 320.564 222.094 311.479 235.897 300.196C249.258 288.912 259.306 279.923 266.042 273.23C272.668 266.345 277.195 259.077 279.624 251.427C282.053 243.777 280.893 235.839 276.145 227.615C270.844 218.435 263.39 211.071 253.782 205.524C244.285 199.786 234.236 196.917 223.635 196.916C213.255 196.916 206.464 199.689 203.262 205.235C199.949 210.59 201.054 218.049 206.575 227.612L141.975 227.61C132.699 211.544 128.723 197.2 130.048 184.577C131.593 171.954 137.887 162.2 148.93 155.315C160.083 148.239 174.935 144.701 193.487 144.702C212.922 144.703 232.192 148.242 251.296 155.319C270.289 162.205 287.627 171.96 303.308 184.583C318.989 197.207 331.468 211.552 340.745 227.618C349.358 242.536 353.169 255.637 352.175 266.921C351.403 278.205 347.704 288.055 341.078 296.47C334.674 304.885 324.736 315.213 311.264 327.453L393.422 327.456L422.246 377.375L233.415 377.368L204.592 327.449Z&quot; fill=&quot;#391800&quot;/&gt;
                            &lt;path d=&quot;M25.447 198.058L2.58852 198.057L-26.4005 147.851L59.4015 147.854L191.923 377.368L128.979 377.365L25.447 198.058Z&quot; fill=&quot;#391800&quot;/&gt;
                            &lt;path d=&quot;M204.592 327.449L204.923 327.449C211.769 320.564 222.094 311.479 235.897 300.196C249.258 288.912 259.306 279.923 266.042 273.23C272.668 266.345 277.195 259.077 279.624 251.427C282.053 243.777 280.893 235.839 276.145 227.615C270.844 218.435 263.39 211.071 253.782 205.524C244.285 199.786 234.236 196.917 223.635 196.916C213.255 196.916 206.464 199.689 203.262 205.235C199.949 210.59 201.054 218.049 206.575 227.612L141.975 227.61C132.699 211.544 128.723 197.2 130.048 184.577C131.593 171.954 137.887 162.2 148.93 155.315C160.083 148.239 174.935 144.701 193.487 144.702C212.922 144.703 232.192 148.242 251.296 155.319C270.289 162.205 287.627 171.96 303.308 184.583C318.989 197.207 331.468 211.552 340.745 227.618C349.358 242.536 353.169 255.637 352.175 266.921C351.403 278.205 347.704 288.055 341.078 296.47C334.674 304.885 324.736 315.213 311.264 327.453L393.422 327.456L422.246 377.375L233.415 377.368L204.592 327.449Z&quot; stroke=&quot;#FF750F&quot; stroke-width=&quot;1&quot;/&gt;
                            &lt;path d=&quot;M25.447 198.058L2.58852 198.057L-26.4005 147.851L59.4015 147.854L191.923 377.368L128.979 377.365L25.447 198.058Z&quot; stroke=&quot;#FF750F&quot; stroke-width=&quot;1&quot;/&gt;
                        &lt;/g&gt;
                        &lt;g class=&quot;transition-all delay-300 translate-y-0 opacity-100 duration-750 starting:opacity-0 starting:translate-y-4&quot; style=&quot;mix-blend-mode:hard-light&quot;&gt;
                            &lt;path d=&quot;M217.342 305.363L217.673 305.363C224.519 298.478 234.844 289.393 248.647 278.11C262.008 266.826 272.056 257.837 278.792 251.144C285.418 244.259 289.945 236.991 292.374 229.341C294.803 221.691 293.643 213.753 288.895 205.529C283.594 196.349 276.14 188.985 266.532 183.438C257.035 177.7 246.986 174.831 236.385 174.83C226.005 174.83 219.214 177.603 216.012 183.149C212.699 188.504 213.804 195.963 219.325 205.527L154.725 205.524C145.449 189.458 141.473 175.114 142.798 162.491C144.343 149.868 150.637 140.114 161.68 133.229C172.833 126.153 187.685 122.615 206.237 122.616C225.672 122.617 244.942 126.156 264.046 133.233C283.039 140.119 300.377 149.874 316.058 162.497C331.739 175.121 344.218 189.466 353.495 205.532C362.108 220.45 365.919 233.551 364.925 244.835C364.153 256.12 360.454 265.969 353.828 274.384C347.424 282.799 337.486 293.127 324.014 305.367L406.172 305.37L434.996 355.289L246.165 355.282L217.342 305.363Z&quot; fill=&quot;#733000&quot;/&gt;
                            &lt;path d=&quot;M38.197 175.972L15.3385 175.971L-13.6505 125.765L72.1515 125.768L204.673 355.282L141.729 355.279L38.197 175.972Z&quot; fill=&quot;#733000&quot;/&gt;
                            &lt;path d=&quot;M217.342 305.363L217.673 305.363C224.519 298.478 234.844 289.393 248.647 278.11C262.008 266.826 272.056 257.837 278.792 251.144C285.418 244.259 289.945 236.991 292.374 229.341C294.803 221.691 293.643 213.753 288.895 205.529C283.594 196.349 276.14 188.985 266.532 183.438C257.035 177.7 246.986 174.831 236.385 174.83C226.005 174.83 219.214 177.603 216.012 183.149C212.699 188.504 213.804 195.963 219.325 205.527L154.725 205.524C145.449 189.458 141.473 175.114 142.798 162.491C144.343 149.868 150.637 140.114 161.68 133.229C172.833 126.153 187.685 122.615 206.237 122.616C225.672 122.617 244.942 126.156 264.046 133.233C283.039 140.119 300.377 149.874 316.058 162.497C331.739 175.121 344.218 189.466 353.495 205.532C362.108 220.45 365.919 233.551 364.925 244.835C364.153 256.12 360.454 265.969 353.828 274.384C347.424 282.799 337.486 293.127 324.014 305.367L406.172 305.37L434.996 355.289L246.165 355.282L217.342 305.363Z&quot; stroke=&quot;#FF750F&quot; stroke-width=&quot;1&quot;/&gt;
                            &lt;path d=&quot;M38.197 175.972L15.3385 175.971L-13.6505 125.765L72.1515 125.768L204.673 355.282L141.729 355.279L38.197 175.972Z&quot; stroke=&quot;#FF750F&quot; stroke-width=&quot;1&quot;/&gt;
                        &lt;/g&gt;
                        &lt;g class=&quot;transition-all delay-300 translate-y-0 opacity-100 duration-750 starting:opacity-0 starting:translate-y-4&quot;&gt;
                            &lt;path d=&quot;M217.342 305.363L217.673 305.363C224.519 298.478 234.844 289.393 248.647 278.11C262.008 266.826 272.056 257.837 278.792 251.144C285.418 244.259 289.945 236.991 292.374 229.341C294.803 221.691 293.643 213.753 288.895 205.529C283.594 196.349 276.14 188.985 266.532 183.438C257.035 177.7 246.986 174.831 236.385 174.83C226.005 174.83 219.214 177.603 216.012 183.149C212.699 188.504 213.804 195.963 219.325 205.527L154.726 205.524C145.449 189.458 141.473 175.114 142.798 162.491C144.343 149.868 150.637 140.114 161.68 133.229C172.833 126.153 187.685 122.615 206.237 122.616C225.672 122.617 244.942 126.156 264.046 133.233C283.039 140.119 300.377 149.874 316.058 162.497C331.739 175.121 344.218 189.466 353.495 205.532C362.108 220.45 365.919 233.551 364.925 244.835C364.153 256.12 360.454 265.969 353.828 274.384C347.424 282.799 337.486 293.127 324.014 305.367L406.172 305.37L434.996 355.289L246.165 355.282L217.342 305.363Z&quot; stroke=&quot;#FF750F&quot; stroke-width=&quot;1&quot;/&gt;
                            &lt;path d=&quot;M38.197 175.972L15.3385 175.971L-13.6505 125.765L72.1515 125.768L204.673 355.282L141.729 355.279L38.197 175.972Z&quot; stroke=&quot;#FF750F&quot; stroke-width=&quot;1&quot;/&gt;
                        &lt;/g&gt;
                        &lt;g class=&quot;transition-all delay-300 translate-y-0 opacity-100 duration-750 starting:opacity-0 starting:translate-y-4&quot;&gt;
                            &lt;path d=&quot;M188.467 355.363L188.798 355.363C195.644 348.478 205.969 339.393 219.772 328.11C233.133 316.826 243.181 307.837 249.917 301.144C253.696 297.217 256.792 293.166 259.205 288.991C261.024 285.845 262.455 282.628 263.499 279.341C265.928 271.691 264.768 263.753 260.02 255.529C254.719 246.349 247.265 238.985 237.657 233.438C228.16 227.7 218.111 224.831 207.51 224.83C197.13 224.83 190.339 227.603 187.137 233.149C183.824 238.504 184.929 245.963 190.45 255.527L125.851 255.524C116.574 239.458 112.598 225.114 113.923 212.491C114.615 206.836 116.261 201.756 118.859 197.253C122.061 191.704 126.709 187.03 132.805 183.229C143.958 176.153 158.81 172.615 177.362 172.616C196.797 172.617 216.067 176.156 235.171 183.233C254.164 190.119 271.502 199.874 287.183 212.497C302.864 225.121 315.343 239.466 324.62 255.532C333.233 270.45 337.044 283.551 336.05 294.835C335.46 303.459 333.16 311.245 329.151 318.194C327.915 320.337 326.515 322.4 324.953 324.384C318.549 332.799 308.611 343.127 295.139 355.367L377.297 355.37L406.121 405.289L217.29 405.282L188.467 355.363Z&quot; stroke=&quot;#FF750F&quot; stroke-width=&quot;1&quot; stroke-linejoin=&quot;bevel&quot;/&gt;
                            &lt;path d=&quot;M9.32197 225.972L-13.5365 225.971L-42.5255 175.765L43.2765 175.768L175.798 405.282L112.854 405.279L9.32197 225.972Z&quot; stroke=&quot;#FF750F&quot; stroke-width=&quot;1&quot; stroke-linejoin=&quot;bevel&quot;/&gt;
                            &lt;path d=&quot;M345.247 111.915C329.566 99.2919 312.229 89.5371 293.235 82.6512L235.167 183.228C254.161 190.114 271.498 199.869 287.179 212.492L345.247 111.915Z&quot; stroke=&quot;#FF750F&quot; stroke-width=&quot;1&quot; stroke-linejoin=&quot;bevel&quot;/&gt;
                            &lt;path d=&quot;M382.686 154.964C373.41 138.898 360.931 124.553 345.25 111.93L287.182 212.506C302.863 225.13 315.342 239.475 324.618 255.541L382.686 154.964Z&quot; stroke=&quot;#FF750F&quot; stroke-width=&quot;1&quot; stroke-linejoin=&quot;bevel&quot;/&gt;
                            &lt;path d=&quot;M293.243 82.6472C274.139 75.57 254.869 72.031 235.434 72.0303L177.366 172.607C196.801 172.608 216.071 176.147 235.175 183.224L293.243 82.6472Z&quot; stroke=&quot;#FF750F&quot; stroke-width=&quot;1&quot; stroke-linejoin=&quot;bevel&quot;/&gt;
                            &lt;path d=&quot;M394.118 194.257C395.112 182.973 391.301 169.872 382.688 154.953L324.619 255.53C333.233 270.448 337.044 283.55 336.05 294.834L394.118 194.257Z&quot; stroke=&quot;#FF750F&quot; stroke-width=&quot;1&quot; stroke-linejoin=&quot;bevel&quot;/&gt;
                            &lt;path d=&quot;M235.432 72.0311C216.88 72.0304 202.027 75.5681 190.875 82.6442L132.806 183.221C143.959 176.145 158.812 172.607 177.363 172.608L235.432 72.0311Z&quot; stroke=&quot;#FF750F&quot; stroke-width=&quot;1&quot; stroke-linejoin=&quot;bevel&quot;/&gt;
                            &lt;path d=&quot;M265.59 124.25C276.191 124.251 286.24 127.12 295.737 132.858L237.669 233.435C228.172 227.697 218.123 224.828 207.522 224.827L265.59 124.25Z&quot; stroke=&quot;#FF750F&quot; stroke-width=&quot;1&quot; stroke-linejoin=&quot;bevel&quot;/&gt;
                            &lt;path d=&quot;M295.719 132.859C305.326 138.406 312.78 145.77 318.081 154.95L260.013 255.527C254.712 246.347 247.258 238.983 237.651 233.436L295.719 132.859Z&quot; stroke=&quot;#FF750F&quot; stroke-width=&quot;1&quot; stroke-linejoin=&quot;bevel&quot;/&gt;
                            &lt;path d=&quot;M387.218 217.608C391.227 210.66 393.527 202.874 394.117 194.25L336.049 294.827C335.459 303.451 333.159 311.237 329.15 318.185L387.218 217.608Z&quot; stroke=&quot;#FF750F&quot; stroke-width=&quot;1&quot; stroke-linejoin=&quot;bevel&quot;/&gt;
                            &lt;path d=&quot;M245.211 132.577C248.413 127.03 255.204 124.257 265.584 124.258L207.516 224.835C197.136 224.834 190.345 227.607 187.143 233.154L245.211 132.577Z&quot; stroke=&quot;#FF750F&quot; stroke-width=&quot;1&quot; stroke-linejoin=&quot;bevel&quot;/&gt;
                            &lt;path d=&quot;M318.094 154.945C322.842 163.17 324.002 171.107 321.573 178.757L263.505 279.334C265.934 271.684 264.774 263.746 260.026 255.522L318.094 154.945Z&quot; stroke=&quot;#FF750F&quot; stroke-width=&quot;1&quot; stroke-linejoin=&quot;bevel&quot;/&gt;
                            &lt;path d=&quot;M176.925 96.6737C180.127 91.1249 184.776 86.4503 190.871 82.6499L132.803 183.227C126.708 187.027 122.059 191.702 118.857 197.25L176.925 96.6737Z&quot; stroke=&quot;#FF750F&quot; stroke-width=&quot;1&quot; stroke-linejoin=&quot;bevel&quot;/&gt;
                            &lt;path d=&quot;M387.226 217.606C385.989 219.749 384.59 221.813 383.028 223.797L324.96 324.373C326.522 322.39 327.921 320.326 329.157 318.183L387.226 217.606Z&quot; stroke=&quot;#FF750F&quot; stroke-width=&quot;1&quot; stroke-linejoin=&quot;bevel&quot;/&gt;
                            &lt;path d=&quot;M317.269 188.408C319.087 185.262 320.519 182.045 321.562 178.758L263.494 279.335C262.451 282.622 261.019 285.839 259.201 288.985L317.269 188.408Z&quot; stroke=&quot;#FF750F&quot; stroke-width=&quot;1&quot; stroke-linejoin=&quot;bevel&quot;/&gt;
                            &lt;path d=&quot;M245.208 132.573C241.895 137.928 243 145.387 248.522 154.95L190.454 255.527C184.932 245.964 183.827 238.505 187.14 233.15L245.208 132.573Z&quot; stroke=&quot;#FF750F&quot; stroke-width=&quot;1&quot; stroke-linejoin=&quot;bevel&quot;/&gt;
                            &lt;path d=&quot;M176.93 96.6719C174.331 101.175 172.686 106.255 171.993 111.91L113.925 212.487C114.618 206.831 116.263 201.752 118.862 197.249L176.93 96.6719Z&quot; stroke=&quot;#FF750F&quot; stroke-width=&quot;1&quot; stroke-linejoin=&quot;bevel&quot;/&gt;
                            &lt;path d=&quot;M317.266 188.413C314.853 192.589 311.757 196.64 307.978 200.566L249.91 301.143C253.689 297.216 256.785 293.166 259.198 288.99L317.266 188.413Z&quot; stroke=&quot;#FF750F&quot; stroke-width=&quot;1&quot; stroke-linejoin=&quot;bevel&quot;/&gt;
                            &lt;path d=&quot;M464.198 304.708L435.375 254.789L377.307 355.366L406.13 405.285L464.198 304.708Z&quot; stroke=&quot;#FF750F&quot; stroke-width=&quot;1&quot; stroke-linejoin=&quot;bevel&quot;/&gt;
                            &lt;path d=&quot;M353.209 254.787C366.68 242.548 376.618 232.22 383.023 223.805L324.955 324.382C318.55 332.797 308.612 343.124 295.141 355.364L353.209 254.787Z&quot; stroke=&quot;#FF750F&quot; stroke-width=&quot;1&quot; stroke-linejoin=&quot;bevel&quot;/&gt;
                            &lt;path d=&quot;M435.37 254.787L353.212 254.784L295.144 355.361L377.302 355.364L435.37 254.787Z&quot; stroke=&quot;#FF750F&quot; stroke-width=&quot;1&quot; stroke-linejoin=&quot;bevel&quot;/&gt;
                            &lt;path d=&quot;M183.921 154.947L248.521 154.95L190.453 255.527L125.853 255.524L183.921 154.947Z&quot; stroke=&quot;#FF750F&quot; stroke-width=&quot;1&quot; stroke-linejoin=&quot;bevel&quot;/&gt;
                            &lt;path d=&quot;M171.992 111.914C170.668 124.537 174.643 138.881 183.92 154.947L125.852 255.524C116.575 239.458 112.599 225.114 113.924 212.491L171.992 111.914Z&quot; stroke=&quot;#FF750F&quot; stroke-width=&quot;1&quot; stroke-linejoin=&quot;bevel&quot;/&gt;
                            &lt;path d=&quot;M307.987 200.562C301.251 207.256 291.203 216.244 277.842 227.528L219.774 328.105C233.135 316.821 243.183 307.832 249.919 301.139L307.987 200.562Z&quot; stroke=&quot;#FF750F&quot; stroke-width=&quot;1&quot; stroke-linejoin=&quot;bevel&quot;/&gt;
                            &lt;path d=&quot;M15.5469 75.1797L44.5359 125.386L-13.5321 225.963L-42.5212 175.756L15.5469 75.1797Z&quot; stroke=&quot;#FF750F&quot; stroke-width=&quot;1&quot; stroke-linejoin=&quot;bevel&quot;/&gt;
                            &lt;path d=&quot;M277.836 227.536C264.033 238.82 253.708 247.904 246.862 254.789L188.794 355.366C195.64 348.481 205.965 339.397 219.768 328.113L277.836 227.536Z&quot; stroke=&quot;#FF750F&quot; stroke-width=&quot;1&quot; stroke-linejoin=&quot;bevel&quot;/&gt;
                            &lt;path d=&quot;M275.358 304.706L464.189 304.713L406.12 405.29L217.29 405.283L275.358 304.706Z&quot; stroke=&quot;#FF750F&quot; stroke-width=&quot;1&quot; stroke-linejoin=&quot;bevel&quot;/&gt;
                            &lt;path d=&quot;M44.5279 125.39L67.3864 125.39L9.31834 225.967L-13.5401 225.966L44.5279 125.39Z&quot; stroke=&quot;#FF750F&quot; stroke-width=&quot;1&quot; stroke-linejoin=&quot;bevel&quot;/&gt;
                            &lt;path d=&quot;M101.341 75.1911L233.863 304.705L175.795 405.282L43.2733 175.768L101.341 75.1911ZM15.5431 75.19L-42.525 175.767L43.277 175.77L101.345 75.1932L15.5431 75.19Z&quot; stroke=&quot;#FF750F&quot; stroke-width=&quot;1&quot; stroke-linejoin=&quot;bevel&quot;/&gt;
                            &lt;path d=&quot;M246.866 254.784L246.534 254.784L188.466 355.361L188.798 355.361L246.866 254.784Z&quot; stroke=&quot;#FF750F&quot; stroke-width=&quot;1&quot; stroke-linejoin=&quot;bevel&quot;/&gt;
                            &lt;path d=&quot;M246.539 254.781L275.362 304.701L217.294 405.277L188.471 355.358L246.539 254.781Z&quot; stroke=&quot;#FF750F&quot; stroke-width=&quot;1&quot; stroke-linejoin=&quot;bevel&quot;/&gt;
                            &lt;path d=&quot;M67.3906 125.391L170.923 304.698L112.855 405.275L9.32257 225.967L67.3906 125.391Z&quot; stroke=&quot;#FF750F&quot; stroke-width=&quot;1&quot; stroke-linejoin=&quot;bevel&quot;/&gt;
                            &lt;path d=&quot;M170.921 304.699L233.865 304.701L175.797 405.278L112.853 405.276L170.921 304.699Z&quot; stroke=&quot;#FF750F&quot; stroke-width=&quot;1&quot; stroke-linejoin=&quot;bevel&quot;/&gt;
                        &lt;/g&gt;
                        &lt;g class=&quot;transition-all delay-300 translate-y-0 opacity-100 duration-750 starting:opacity-0 starting:translate-y-4&quot; style=&quot;mix-blend-mode:hard-light&quot;&gt;
                            &lt;path d=&quot;M246.544 254.79L246.875 254.79C253.722 247.905 264.046 238.82 277.849 227.537C291.21 216.253 301.259 207.264 307.995 200.57C314.62 193.685 319.147 186.418 321.577 178.768C324.006 171.117 322.846 163.18 318.097 154.956C312.796 145.775 305.342 138.412 295.735 132.865C286.238 127.127 276.189 124.258 265.588 124.257C255.208 124.257 248.416 127.03 245.214 132.576C241.902 137.931 243.006 145.39 248.528 154.953L183.928 154.951C174.652 138.885 170.676 124.541 172 111.918C173.546 99.2946 179.84 89.5408 190.882 82.6559C202.035 75.5798 216.887 72.0421 235.439 72.0428C254.874 72.0435 274.144 75.5825 293.248 82.6598C312.242 89.5457 329.579 99.3005 345.261 111.924C360.942 124.548 373.421 138.892 382.697 154.958C391.311 169.877 395.121 182.978 394.128 194.262C393.355 205.546 389.656 215.396 383.031 223.811C376.627 232.226 366.688 242.554 353.217 254.794L435.375 254.797L464.198 304.716L275.367 304.709L246.544 254.79Z&quot; fill=&quot;#4B0600&quot;/&gt;
                            &lt;path d=&quot;M246.544 254.79L246.875 254.79C253.722 247.905 264.046 238.82 277.849 227.537C291.21 216.253 301.259 207.264 307.995 200.57C314.62 193.685 319.147 186.418 321.577 178.768C324.006 171.117 322.846 163.18 318.097 154.956C312.796 145.775 305.342 138.412 295.735 132.865C286.238 127.127 276.189 124.258 265.588 124.257C255.208 124.257 248.416 127.03 245.214 132.576C241.902 137.931 243.006 145.39 248.528 154.953L183.928 154.951C174.652 138.885 170.676 124.541 172 111.918C173.546 99.2946 179.84 89.5408 190.882 82.6559C202.035 75.5798 216.887 72.0421 235.439 72.0428C254.874 72.0435 274.144 75.5825 293.248 82.6598C312.242 89.5457 329.579 99.3005 345.261 111.924C360.942 124.548 373.421 138.892 382.697 154.958C391.311 169.877 395.121 182.978 394.128 194.262C393.355 205.546 389.656 215.396 383.031 223.811C376.627 232.226 366.688 242.554 353.217 254.794L435.375 254.797L464.198 304.716L275.367 304.709L246.544 254.79Z&quot; stroke=&quot;#FF750F&quot; stroke-width=&quot;1&quot; stroke-linejoin=&quot;round&quot;/&gt;
                        &lt;/g&gt;
                        &lt;g class=&quot;transition-all delay-300 translate-y-0 opacity-100 duration-750 starting:opacity-0 starting:translate-y-4&quot; style=&quot;mix-blend-mode:hard-light&quot;&gt;
                            &lt;path d=&quot;M67.41 125.402L44.5515 125.401L15.5625 75.1953L101.364 75.1985L233.886 304.712L170.942 304.71L67.41 125.402Z&quot; fill=&quot;#4B0600&quot;/&gt;
                            &lt;path d=&quot;M67.41 125.402L44.5515 125.401L15.5625 75.1953L101.364 75.1985L233.886 304.712L170.942 304.71L67.41 125.402Z&quot; stroke=&quot;#FF750F&quot; stroke-width=&quot;1&quot;/&gt;
                        &lt;/g&gt;
                    &lt;/svg&gt;
                    &lt;div class=&quot;absolute inset-0 rounded-t-lg lg:rounded-t-none lg:rounded-r-lg shadow-[inset_0px_0px_0px_1px_rgba(26,26,0,0.16)] dark:shadow-[inset_0px_0px_0px_1px_#fffaed2d]&quot;&gt;&lt;/div&gt;
                &lt;/div&gt;
            &lt;/main&gt;
        &lt;/div&gt;

                    &lt;div class=&quot;h-14.5 hidden lg:block&quot;&gt;&lt;/div&gt;
            &lt;/body&gt;
&lt;/html&gt;
</code>
 </pre>
    </span>
<span id="execution-results-GET-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GET-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GET-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GET-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GET-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GET-" data-method="GET"
      data-path="/"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GET-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GET-"
                    onclick="tryItOut('GET-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GET-"
                    onclick="cancelTryOut('GET-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GET-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>/</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GET-"
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
                              name="Accept"                data-endpoint="GET-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="endpoints-GETprofile">Display the user&#039;s profile form.</h2>

<p>
</p>



<span id="example-requests-GETprofile">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://127.0.0.1:8000/profile" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8000/profile"
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

<span id="example-responses-GETprofile">
            <blockquote>
            <p>Example response (401):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
access-control-allow-origin: *
access-control-allow-methods: GET, POST, PUT, DELETE, OPTIONS
access-control-allow-headers: Content-Type, Authorization, X-Requested-With, X-XSRF-TOKEN
set-cookie: XSRF-TOKEN=eyJpdiI6IkxRV1VHY0M0ZzBLS2l2NFFVYURBUUE9PSIsInZhbHVlIjoiODBPVDgwU2p5Z2xkVTh0ak5xdS8zZmQyTXZ6eXh4OUc3c2JRUXE0RGdYaDRTQTdXVHp6eitsWEFiQ25lNWtnK0kxbTh6MG4wZXZra0d4UWFYUVJ1V2srWCttQWlobWtXRk5BbmNZN2VKTmdONjFQb2hFRGI2b25QNzdpQkttN0QiLCJtYWMiOiJjMTRiNmYwZTI4MTQzZDM5MjM1ZTQ4Mzk2MDEwMGMzYjA0Y2UxMzI4NGFjNzlmMjE1ZWEzYWQ5MDJhZTI2NGZkIiwidGFnIjoiIn0%3D; expires=Fri, 29 Aug 2025 06:39:47 GMT; Max-Age=7200; path=/; samesite=lax; laravel_session=eyJpdiI6InpTOHFvOHFwM0pXb1FJOElmc0VtMkE9PSIsInZhbHVlIjoiNlllZkJudG81eldvbUsrTUFZWnd4b0NRbUVmdGVBb3JZeWVFbzd3YlczbE1xeWpwOFZubVNjd0JSSFpMQVlhOEVtYUFNa2FVT2ZCZDVMaXBxbmpYYlc5Uk0yL2xxeFVnTFhpd0IybkhRV1lJN1YwU0phSU1BOHF0NDlmNUxFT1YiLCJtYWMiOiIzYjMwOWY5MTFlNmI4N2VkMWY0NWY2MTI0Y2Y5YTVmZDAxOTFiZWFmZGI3MmM0ZTgzZTZhZWY3ODEwNzY1M2ZlIiwidGFnIjoiIn0%3D; expires=Fri, 29 Aug 2025 06:39:47 GMT; Max-Age=7200; path=/; httponly; samesite=lax
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Unauthenticated.&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETprofile" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETprofile"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETprofile"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETprofile" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETprofile">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETprofile" data-method="GET"
      data-path="profile"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETprofile', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETprofile"
                    onclick="tryItOut('GETprofile');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETprofile"
                    onclick="cancelTryOut('GETprofile');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETprofile"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>profile</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETprofile"
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
                              name="Accept"                data-endpoint="GETprofile"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="endpoints-DELETEprofile">Delete the user&#039;s account.</h2>

<p>
</p>



<span id="example-requests-DELETEprofile">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request DELETE \
    "http://127.0.0.1:8000/profile" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"password\": \"architecto\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8000/profile"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "password": "architecto"
};

fetch(url, {
    method: "DELETE",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-DELETEprofile">
</span>
<span id="execution-results-DELETEprofile" hidden>
    <blockquote>Received response<span
                id="execution-response-status-DELETEprofile"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-DELETEprofile"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-DELETEprofile" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-DELETEprofile">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-DELETEprofile" data-method="DELETE"
      data-path="profile"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('DELETEprofile', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-DELETEprofile"
                    onclick="tryItOut('DELETEprofile');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-DELETEprofile"
                    onclick="cancelTryOut('DELETEprofile');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-DELETEprofile"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-red">DELETE</small>
            <b><code>profile</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="DELETEprofile"
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
                              name="Accept"                data-endpoint="DELETEprofile"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>password</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="password"                data-endpoint="DELETEprofile"
               value="architecto"
               data-component="body">
    <br>
<p>Example: <code>architecto</code></p>
        </div>
        </form>

                    <h2 id="endpoints-GETdashboard">GET dashboard</h2>

<p>
</p>



<span id="example-requests-GETdashboard">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://127.0.0.1:8000/dashboard" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8000/dashboard"
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

<span id="example-responses-GETdashboard">
            <blockquote>
            <p>Example response (401):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
access-control-allow-origin: *
access-control-allow-methods: GET, POST, PUT, DELETE, OPTIONS
access-control-allow-headers: Content-Type, Authorization, X-Requested-With, X-XSRF-TOKEN
set-cookie: XSRF-TOKEN=eyJpdiI6ImVrMHprU3kvTXp6Y0N2NUZLSXViQVE9PSIsInZhbHVlIjoieTFITERHZmUrUEdIY0pGM3Byb01kcnh1MURxU0RuNmRJdDFJeVdzTWFLaGZza1JMUGROQnoyZkNCU1J6a3JXclF1SXhFMi91a0VJckZmYkU3KzBtdVY2MllpbHFMR2pIRVdWVjZmUlBaSVJuQmg5KzdYbDhrSVBZKytueEZ1OSsiLCJtYWMiOiI1YWFiZGZhOGZhYzlkM2M3YmI2ZGY4MzAxMmFiNjg1ZDk3NDZlMTgwMDcwNTc1ZjkzNGVmMGMwZWVmYzkyYWMzIiwidGFnIjoiIn0%3D; expires=Fri, 29 Aug 2025 06:39:47 GMT; Max-Age=7200; path=/; samesite=lax; laravel_session=eyJpdiI6IlVHczB5aS94VlRUTjRTbE1CZTFHMXc9PSIsInZhbHVlIjoic0o5RjZtc0ZMYmpxZTdpdVozRjYyakFHUVVsaUFlb2IrMjd5eTRlR2dXZURjdjViTWFXYzRZdTgwNVErUXZqWmJXeFpIeVJVTmtBVXdYR0ZWRnJORVcxRXN5YzFhQzh3U2NMQ0VtNHZYQ253SXQvT0FlWTBTYlJMVmZhZ09rSVoiLCJtYWMiOiJhZTZmM2M5NjI0YjhmMjg5ZDE5ZmIyOWQyM2E2NzNkMmNiMWVhMTVlNjNhNWZmZjczNjRjOTdlNzg1ZDliNDkxIiwidGFnIjoiIn0%3D; expires=Fri, 29 Aug 2025 06:39:47 GMT; Max-Age=7200; path=/; httponly; samesite=lax
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Unauthenticated.&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETdashboard" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETdashboard"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETdashboard"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETdashboard" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETdashboard">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETdashboard" data-method="GET"
      data-path="dashboard"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETdashboard', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETdashboard"
                    onclick="tryItOut('GETdashboard');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETdashboard"
                    onclick="cancelTryOut('GETdashboard');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETdashboard"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>dashboard</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETdashboard"
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
                              name="Accept"                data-endpoint="GETdashboard"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="endpoints-GETadmin-dashboard">GET admin/dashboard</h2>

<p>
</p>



<span id="example-requests-GETadmin-dashboard">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://127.0.0.1:8000/admin/dashboard" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8000/admin/dashboard"
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

<span id="example-responses-GETadmin-dashboard">
            <blockquote>
            <p>Example response (401):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
access-control-allow-origin: *
access-control-allow-methods: GET, POST, PUT, DELETE, OPTIONS
access-control-allow-headers: Content-Type, Authorization, X-Requested-With, X-XSRF-TOKEN
set-cookie: XSRF-TOKEN=eyJpdiI6IlVkRm1HMmxUWDZFL2V6d2I2dGVsdWc9PSIsInZhbHVlIjoiSkorZkU4VzJaeWc2aVhocTNaenAycDdPelMzWU5qQnJ2dWU2VDJNaW9IZ2tObUxuNEFIZmp0VHhGL2puTU5FOG1hMkM4ZmdKenl2SzcyK0ZPdm41bk53cWFkZHFPSE4xT2MxYSt3UC9veGU1UTFFdS9EdWNjTG5ZT3VMd2NxZU8iLCJtYWMiOiIyNjE3Y2Y0YjIyZTM5NWRiYTgwOGIzMGE1OWI2NWUyZTM3YThmMTVhNDA5YWI3OWU1MDhhY2ZkNzEyNGRjODZkIiwidGFnIjoiIn0%3D; expires=Fri, 29 Aug 2025 06:39:47 GMT; Max-Age=7200; path=/; samesite=lax; laravel_session=eyJpdiI6InZxTitYcG5RMUxJYUNhMGZrblE4QWc9PSIsInZhbHVlIjoiTVYyOFY5cnU4aFMxUC93K0RUcVhjcldZMVB6QXd0ejUvN1ZNUW54ZEVIRHk0S01meTFPcXBGRmM4eDlkMnUvVTRCRFoySjN5VUZoaGZ1VTZudU1ETlBuR1FUai9hbWdyQnpDc1RXZ0ljdjJiT0l3bzdwS1lGblo1RlgwL3hCQWMiLCJtYWMiOiIwZWMwY2M4ODE3MDU2MTI1NGJkMWVjMzE0YTM0ZDY0YzE0NGExNjFkNjM4MDllZTUwZDY2YWZjNDg3MzMzYzFiIiwidGFnIjoiIn0%3D; expires=Fri, 29 Aug 2025 06:39:47 GMT; Max-Age=7200; path=/; httponly; samesite=lax
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Unauthenticated.&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETadmin-dashboard" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETadmin-dashboard"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETadmin-dashboard"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETadmin-dashboard" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETadmin-dashboard">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETadmin-dashboard" data-method="GET"
      data-path="admin/dashboard"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETadmin-dashboard', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETadmin-dashboard"
                    onclick="tryItOut('GETadmin-dashboard');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETadmin-dashboard"
                    onclick="cancelTryOut('GETadmin-dashboard');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETadmin-dashboard"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>admin/dashboard</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETadmin-dashboard"
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
                              name="Accept"                data-endpoint="GETadmin-dashboard"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="endpoints-GETadmin-users">GET admin/users</h2>

<p>
</p>



<span id="example-requests-GETadmin-users">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://127.0.0.1:8000/admin/users" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8000/admin/users"
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

<span id="example-responses-GETadmin-users">
            <blockquote>
            <p>Example response (401):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
access-control-allow-origin: *
access-control-allow-methods: GET, POST, PUT, DELETE, OPTIONS
access-control-allow-headers: Content-Type, Authorization, X-Requested-With, X-XSRF-TOKEN
set-cookie: XSRF-TOKEN=eyJpdiI6IjBOTUswUFltKzVlT1JoVnNDanU2cFE9PSIsInZhbHVlIjoidkRobHZRdGVkMU9UbUlLMVNIdWdEcXZVaFhxQlBCSWo3TW5rTU9FQ3pkVUdUT0N5bkR6b29Cd1ZzUDhiTnE5QWxoTTdDdzduZmxaWDRJakQ0N2pVZGV0alVoMEt3REllZ3dIQk1JWHRHeXdwc01xemNYejgxNVhYYS9XVlB3Q0siLCJtYWMiOiI1MmVjMjM3Yjk5YTljZjlmYjc3OGYyZTAwMDI4N2Y2MDFmNDZlMDE4MjQ2MzRiNTI1MzJjNzE2NWI5OTJhNjNkIiwidGFnIjoiIn0%3D; expires=Fri, 29 Aug 2025 06:39:47 GMT; Max-Age=7200; path=/; samesite=lax; laravel_session=eyJpdiI6IklTaGY2bXJ0a05FMzVGdUUza0VQVGc9PSIsInZhbHVlIjoiUDB2WkdyMXFRUmxSMExxRlNPVjFhWHZWZXloVFBtZGtsUTdUT3AzTkI2R2JZMzUvK0Y5NkhkRjV5YXJvRUhLSGYzRnZjVUwxcUNvZDU1MW9TU2FjVi94OU9iUytYTlhIdFNOVHhzVmh5djVIYWJrNmhCRGdyeWV0a0svUjJDU1QiLCJtYWMiOiJhODJmNzZiNzY1OWUyZTY2OGE5NjA2YmFhYTFhNjBkMjc3M2JlYzY0ZGYzMWZkOWM2OGE4MTU1ODdjMjYzZWZlIiwidGFnIjoiIn0%3D; expires=Fri, 29 Aug 2025 06:39:47 GMT; Max-Age=7200; path=/; httponly; samesite=lax
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Unauthenticated.&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETadmin-users" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETadmin-users"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETadmin-users"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETadmin-users" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETadmin-users">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETadmin-users" data-method="GET"
      data-path="admin/users"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETadmin-users', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETadmin-users"
                    onclick="tryItOut('GETadmin-users');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETadmin-users"
                    onclick="cancelTryOut('GETadmin-users');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETadmin-users"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>admin/users</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETadmin-users"
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
                              name="Accept"                data-endpoint="GETadmin-users"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="endpoints-GETadmin-users-create">GET admin/users/create</h2>

<p>
</p>



<span id="example-requests-GETadmin-users-create">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://127.0.0.1:8000/admin/users/create" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8000/admin/users/create"
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

<span id="example-responses-GETadmin-users-create">
            <blockquote>
            <p>Example response (401):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
access-control-allow-origin: *
access-control-allow-methods: GET, POST, PUT, DELETE, OPTIONS
access-control-allow-headers: Content-Type, Authorization, X-Requested-With, X-XSRF-TOKEN
set-cookie: XSRF-TOKEN=eyJpdiI6Im9PNzVpZ0Fib2oyZXFMNmNWNkwvdkE9PSIsInZhbHVlIjoiQnlSaUh3OUZsT1BJRG9qbk9DdExLajB6MU50M2tZY2RnNU9pY3FyYzlYRE9ETjk0VlA1YlE0OEk4UG5nUHhtYnlUKzFOSkpDYjROQ1lUZ1AralM4bjNYZWVYZnJCYUxES2JvZkZLdHQ2dnV1RHZWQ3RsdlpGVzFzdTFza2E3NlkiLCJtYWMiOiJjNDIwNTEwYzI3M2MyNGM4MTUyOGI3NzIwNGFjZjVmNjlkNDE0M2E3NmI4ZmI5OWZmMjM1NWMxNTJkNzc0MjBmIiwidGFnIjoiIn0%3D; expires=Fri, 29 Aug 2025 06:39:47 GMT; Max-Age=7200; path=/; samesite=lax; laravel_session=eyJpdiI6Imc5d1FZb2prQ1JUYy94R2pKRkRRbWc9PSIsInZhbHVlIjoiYmpYNWUrUS9JSUFjNzR4U3VmemxkTHdaRDN1bU5XckxTTjRwWm1CM2xsT0lrM0QrVGVMekZaVWFZUkZEZ1dtWnU3SVY2T0dzU1djZEFqd1dwOExlNStuQ05XbStBY3g3Tmt0OUxMOFNDc2tmVjVKK0Rkem4ra1ZRUjhGeEgranoiLCJtYWMiOiIyODkxNGNhOTM5M2MwMWI2NzcxMmRiZGFhYTY4MGZkYTAwM2I1ZWNjYmFhMjg4YmUxNDdhMGRmNDU1NjhjZTVhIiwidGFnIjoiIn0%3D; expires=Fri, 29 Aug 2025 06:39:47 GMT; Max-Age=7200; path=/; httponly; samesite=lax
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Unauthenticated.&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETadmin-users-create" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETadmin-users-create"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETadmin-users-create"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETadmin-users-create" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETadmin-users-create">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETadmin-users-create" data-method="GET"
      data-path="admin/users/create"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETadmin-users-create', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETadmin-users-create"
                    onclick="tryItOut('GETadmin-users-create');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETadmin-users-create"
                    onclick="cancelTryOut('GETadmin-users-create');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETadmin-users-create"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>admin/users/create</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETadmin-users-create"
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
                              name="Accept"                data-endpoint="GETadmin-users-create"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="endpoints-POSTadmin-users">POST admin/users</h2>

<p>
</p>



<span id="example-requests-POSTadmin-users">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://127.0.0.1:8000/admin/users" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"name\": \"b\",
    \"username\": \"n\",
    \"email\": \"ashly64@example.com\",
    \"password\": \"architecto\",
    \"first_name\": \"n\",
    \"last_name\": \"g\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8000/admin/users"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "name": "b",
    "username": "n",
    "email": "ashly64@example.com",
    "password": "architecto",
    "first_name": "n",
    "last_name": "g"
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTadmin-users">
</span>
<span id="execution-results-POSTadmin-users" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTadmin-users"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTadmin-users"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTadmin-users" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTadmin-users">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTadmin-users" data-method="POST"
      data-path="admin/users"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTadmin-users', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTadmin-users"
                    onclick="tryItOut('POSTadmin-users');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTadmin-users"
                    onclick="cancelTryOut('POSTadmin-users');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTadmin-users"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>admin/users</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTadmin-users"
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
                              name="Accept"                data-endpoint="POSTadmin-users"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>name</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="name"                data-endpoint="POSTadmin-users"
               value="b"
               data-component="body">
    <br>
<p>Must not be greater than 255 characters. Example: <code>b</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>username</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="username"                data-endpoint="POSTadmin-users"
               value="n"
               data-component="body">
    <br>
<p>Must not be greater than 255 characters. Example: <code>n</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>email</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="email"                data-endpoint="POSTadmin-users"
               value="ashly64@example.com"
               data-component="body">
    <br>
<p>Must be a valid email address. Must not be greater than 255 characters. Example: <code>ashly64@example.com</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>password</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="password"                data-endpoint="POSTadmin-users"
               value="architecto"
               data-component="body">
    <br>
<p>Example: <code>architecto</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>first_name</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="text" style="display: none"
                              name="first_name"                data-endpoint="POSTadmin-users"
               value="n"
               data-component="body">
    <br>
<p>Must not be greater than 255 characters. Example: <code>n</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>last_name</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="text" style="display: none"
                              name="last_name"                data-endpoint="POSTadmin-users"
               value="g"
               data-component="body">
    <br>
<p>Must not be greater than 255 characters. Example: <code>g</code></p>
        </div>
        </form>

                    <h2 id="endpoints-GETadmin-users--id-">GET admin/users/{id}</h2>

<p>
</p>



<span id="example-requests-GETadmin-users--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://127.0.0.1:8000/admin/users/1" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8000/admin/users/1"
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

<span id="example-responses-GETadmin-users--id-">
            <blockquote>
            <p>Example response (401):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
access-control-allow-origin: *
access-control-allow-methods: GET, POST, PUT, DELETE, OPTIONS
access-control-allow-headers: Content-Type, Authorization, X-Requested-With, X-XSRF-TOKEN
set-cookie: XSRF-TOKEN=eyJpdiI6IitMTytTTEJKL1Myb3ZZYjNzYTVQVFE9PSIsInZhbHVlIjoiQ01wT2N6UVN6YmY2OHhrWWR4Y05QdzgwMGxENE94djRVZVY0UmcxdUw5TVE0ZG5BK1ZkS0lLdVBPSjhST3FaamlNb0ZtaURIZkEzRW0wcUdHVUFjeE53VDhrdlcyaWd3VEk0WGRoOUVQajQwWDZrVDlzaTdmVWMwbUkra1Q0RmIiLCJtYWMiOiI3NWEwNzQ4OTAwNTJmYTljNzIzZDUyNjdmNTRkMGNiZmI0NDIwMWQ0ODFmNDJmNThhNDQxNWZlNDdjNWZiYmU3IiwidGFnIjoiIn0%3D; expires=Fri, 29 Aug 2025 06:39:48 GMT; Max-Age=7200; path=/; samesite=lax; laravel_session=eyJpdiI6IlJVc1FTTG9OaXFFUCtOTGR3cnpXWEE9PSIsInZhbHVlIjoiNzZGaXB0MGNPVC85U0lRU0JHN0NIS3pkbkJlR1E5T0lHN29FUW8vTG9EMDJDMFJYd3NZOTBjdFZLVkhBWlBxQndKblErOUFxR09VRGVqN0pjdFI2MkduY0VQbDFXNUpaNXptR2ZsTklucG1qOEVTUm50c0dYMUc3bTVNUnk5b08iLCJtYWMiOiJiZWJjYTAxNzVmZjZjZjBiZjQ2ZDI2OTQwYjc2ZDBmN2RkMDQyYzEwNGMyZTQ0ODE0NWZhZjI4OWE2MjdjOGYwIiwidGFnIjoiIn0%3D; expires=Fri, 29 Aug 2025 06:39:48 GMT; Max-Age=7200; path=/; httponly; samesite=lax
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Unauthenticated.&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETadmin-users--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETadmin-users--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETadmin-users--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETadmin-users--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETadmin-users--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETadmin-users--id-" data-method="GET"
      data-path="admin/users/{id}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETadmin-users--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETadmin-users--id-"
                    onclick="tryItOut('GETadmin-users--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETadmin-users--id-"
                    onclick="cancelTryOut('GETadmin-users--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETadmin-users--id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>admin/users/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETadmin-users--id-"
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
                              name="Accept"                data-endpoint="GETadmin-users--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="id"                data-endpoint="GETadmin-users--id-"
               value="1"
               data-component="url">
    <br>
<p>The ID of the user. Example: <code>1</code></p>
            </div>
                    </form>

                    <h2 id="endpoints-GETadmin-users--user_id--edit">GET admin/users/{user_id}/edit</h2>

<p>
</p>



<span id="example-requests-GETadmin-users--user_id--edit">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://127.0.0.1:8000/admin/users/1/edit" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8000/admin/users/1/edit"
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

<span id="example-responses-GETadmin-users--user_id--edit">
            <blockquote>
            <p>Example response (401):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
access-control-allow-origin: *
access-control-allow-methods: GET, POST, PUT, DELETE, OPTIONS
access-control-allow-headers: Content-Type, Authorization, X-Requested-With, X-XSRF-TOKEN
set-cookie: XSRF-TOKEN=eyJpdiI6IitvaGhDWDNPQ3EvL0RMZ1hnWGg1aWc9PSIsInZhbHVlIjoib3NzZHNIbzJGVGlpUXViNitRWGVEWFVZTkdnVTV3NWc2dittTWoycU9BQnFOdENzRkNXZUFpZVNNL3BaNGVuLzhkdktFelR4UTdMVlBmNE9GQzd2bFRMc2JUTkQ5Zm5yeUdmc2VubXN5TnhsaytONDhqaEdZZ3JSMTJ1allZOEEiLCJtYWMiOiJkYTAxNDI4Y2E0Y2ViNDY3ZGZiOTcxZjJiMTQzMzhhOTIzNmU0ZWEwMWYzOTY3NWI3NGNmNDQxOGVjMDlhNjQwIiwidGFnIjoiIn0%3D; expires=Fri, 29 Aug 2025 06:39:48 GMT; Max-Age=7200; path=/; samesite=lax; laravel_session=eyJpdiI6IlRnZzFVZ2tINDVPUm8yNngzWndYc3c9PSIsInZhbHVlIjoibEF6L2FWaC9TcFJOM25sOW1IZCs2UG1zbk9WTFkrME13QVRPSlZaVG1YSzhVaS9mbEJYcW15M25UZEg0R3d5S01YRVRjSmhPVlVvQWpLSzM2ZTF1NE8wTm9wM0g0QUFlanNhc1IyK0lycUdkejgyNkVwUU5vQ2JBYTZZUVFsSkIiLCJtYWMiOiJlOGU4OTEyMTlmNDU2MmU0NjIwNjkwMTY5ODdjNGI0YzA4MzU1YTJlNWY4MzBkYzJkMTM5MTE3N2Y3ZWZmMmU4IiwidGFnIjoiIn0%3D; expires=Fri, 29 Aug 2025 06:39:48 GMT; Max-Age=7200; path=/; httponly; samesite=lax
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Unauthenticated.&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETadmin-users--user_id--edit" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETadmin-users--user_id--edit"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETadmin-users--user_id--edit"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETadmin-users--user_id--edit" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETadmin-users--user_id--edit">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETadmin-users--user_id--edit" data-method="GET"
      data-path="admin/users/{user_id}/edit"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETadmin-users--user_id--edit', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETadmin-users--user_id--edit"
                    onclick="tryItOut('GETadmin-users--user_id--edit');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETadmin-users--user_id--edit"
                    onclick="cancelTryOut('GETadmin-users--user_id--edit');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETadmin-users--user_id--edit"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>admin/users/{user_id}/edit</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETadmin-users--user_id--edit"
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
                              name="Accept"                data-endpoint="GETadmin-users--user_id--edit"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>user_id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="user_id"                data-endpoint="GETadmin-users--user_id--edit"
               value="1"
               data-component="url">
    <br>
<p>The ID of the user. Example: <code>1</code></p>
            </div>
                    </form>

                    <h2 id="endpoints-PUTadmin-users--id-">PUT admin/users/{id}</h2>

<p>
</p>



<span id="example-requests-PUTadmin-users--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request PUT \
    "http://127.0.0.1:8000/admin/users/1" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"name\": \"b\",
    \"first_name\": \"n\",
    \"last_name\": \"g\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8000/admin/users/1"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "name": "b",
    "first_name": "n",
    "last_name": "g"
};

fetch(url, {
    method: "PUT",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-PUTadmin-users--id-">
</span>
<span id="execution-results-PUTadmin-users--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-PUTadmin-users--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-PUTadmin-users--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-PUTadmin-users--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-PUTadmin-users--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-PUTadmin-users--id-" data-method="PUT"
      data-path="admin/users/{id}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('PUTadmin-users--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-PUTadmin-users--id-"
                    onclick="tryItOut('PUTadmin-users--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-PUTadmin-users--id-"
                    onclick="cancelTryOut('PUTadmin-users--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-PUTadmin-users--id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-darkblue">PUT</small>
            <b><code>admin/users/{id}</code></b>
        </p>
            <p>
            <small class="badge badge-purple">PATCH</small>
            <b><code>admin/users/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="PUTadmin-users--id-"
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
                              name="Accept"                data-endpoint="PUTadmin-users--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="id"                data-endpoint="PUTadmin-users--id-"
               value="1"
               data-component="url">
    <br>
<p>The ID of the user. Example: <code>1</code></p>
            </div>
                            <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>name</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="name"                data-endpoint="PUTadmin-users--id-"
               value="b"
               data-component="body">
    <br>
<p>Must not be greater than 255 characters. Example: <code>b</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>password</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="text" style="display: none"
                              name="password"                data-endpoint="PUTadmin-users--id-"
               value=""
               data-component="body">
    <br>

        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>first_name</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="text" style="display: none"
                              name="first_name"                data-endpoint="PUTadmin-users--id-"
               value="n"
               data-component="body">
    <br>
<p>Must not be greater than 255 characters. Example: <code>n</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>last_name</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="text" style="display: none"
                              name="last_name"                data-endpoint="PUTadmin-users--id-"
               value="g"
               data-component="body">
    <br>
<p>Must not be greater than 255 characters. Example: <code>g</code></p>
        </div>
        </form>

                    <h2 id="endpoints-DELETEadmin-users--id-">DELETE admin/users/{id}</h2>

<p>
</p>



<span id="example-requests-DELETEadmin-users--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request DELETE \
    "http://127.0.0.1:8000/admin/users/1" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8000/admin/users/1"
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

<span id="example-responses-DELETEadmin-users--id-">
</span>
<span id="execution-results-DELETEadmin-users--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-DELETEadmin-users--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-DELETEadmin-users--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-DELETEadmin-users--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-DELETEadmin-users--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-DELETEadmin-users--id-" data-method="DELETE"
      data-path="admin/users/{id}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('DELETEadmin-users--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-DELETEadmin-users--id-"
                    onclick="tryItOut('DELETEadmin-users--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-DELETEadmin-users--id-"
                    onclick="cancelTryOut('DELETEadmin-users--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-DELETEadmin-users--id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-red">DELETE</small>
            <b><code>admin/users/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="DELETEadmin-users--id-"
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
                              name="Accept"                data-endpoint="DELETEadmin-users--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="id"                data-endpoint="DELETEadmin-users--id-"
               value="1"
               data-component="url">
    <br>
<p>The ID of the user. Example: <code>1</code></p>
            </div>
                    </form>

                    <h2 id="endpoints-GETadmin-categories-trashed">Display a listing of the trashed resource.</h2>

<p>
</p>



<span id="example-requests-GETadmin-categories-trashed">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://127.0.0.1:8000/admin/categories/trashed" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8000/admin/categories/trashed"
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

<span id="example-responses-GETadmin-categories-trashed">
            <blockquote>
            <p>Example response (401):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
access-control-allow-origin: *
access-control-allow-methods: GET, POST, PUT, DELETE, OPTIONS
access-control-allow-headers: Content-Type, Authorization, X-Requested-With, X-XSRF-TOKEN
set-cookie: XSRF-TOKEN=eyJpdiI6IkpscXd4QTNyKzBhU21RYVpEZndYR2c9PSIsInZhbHVlIjoiZWxFNnVWd2o0Nk95K2o4Q1Z2aExEZ2VBQ3hrY01jTzlJTExSZVhHamdld3FMdUtrRk9ZZ2JFelNBTUx0bkZJMHAzZXFqdnNPS2RjZGtKdDVTbkh5TUVUSkduOUJrUWxOL0wzelJYMWJTWVVUT1dTeXBaYWpNUHVSeGxFSnRpNXMiLCJtYWMiOiIwNzVjNTllMTI4Yzg1Y2UzYTE2M2M1Nzg3NjFiMTEwNmRhMmFkOGNlZjI1MDUyNjFmNmZhMjBlMDU0MmJkN2UzIiwidGFnIjoiIn0%3D; expires=Fri, 29 Aug 2025 06:39:48 GMT; Max-Age=7200; path=/; samesite=lax; laravel_session=eyJpdiI6Iktpbjd6RFVLSWxMejhqYjJZbTF6Qnc9PSIsInZhbHVlIjoiSFp0SGcwNWsxdG1hMTVJaDBuU2RvUzc3ZGxQQ3d5cndNN3AzM29hRlhrclMrVVBlY01McG82NUxsNVBWcnREOUo4UjgzYlZTR0hJY2xtZFU4OGdjOWdtN1ZpS0lHb2dHb1hSWHdRYjd2L0FkTVpWV0dIb3duRGVHY0l4VzYzcmMiLCJtYWMiOiIzZTk0MjJkY2IxMjU2MTIxMWJlMmE5ZWQ2M2ZhNjY4YTAyYWVlMDFjNTc5YjVmY2JkMTlkYzNmMjU2NGU4ZDlmIiwidGFnIjoiIn0%3D; expires=Fri, 29 Aug 2025 06:39:48 GMT; Max-Age=7200; path=/; httponly; samesite=lax
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Unauthenticated.&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETadmin-categories-trashed" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETadmin-categories-trashed"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETadmin-categories-trashed"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETadmin-categories-trashed" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETadmin-categories-trashed">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETadmin-categories-trashed" data-method="GET"
      data-path="admin/categories/trashed"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETadmin-categories-trashed', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETadmin-categories-trashed"
                    onclick="tryItOut('GETadmin-categories-trashed');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETadmin-categories-trashed"
                    onclick="cancelTryOut('GETadmin-categories-trashed');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETadmin-categories-trashed"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>admin/categories/trashed</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETadmin-categories-trashed"
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
                              name="Accept"                data-endpoint="GETadmin-categories-trashed"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="endpoints-POSTadmin-categories--category--restore">Restore the specified resource from storage.</h2>

<p>
</p>



<span id="example-requests-POSTadmin-categories--category--restore">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://127.0.0.1:8000/admin/categories/architecto/restore" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8000/admin/categories/architecto/restore"
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

<span id="example-responses-POSTadmin-categories--category--restore">
</span>
<span id="execution-results-POSTadmin-categories--category--restore" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTadmin-categories--category--restore"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTadmin-categories--category--restore"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTadmin-categories--category--restore" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTadmin-categories--category--restore">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTadmin-categories--category--restore" data-method="POST"
      data-path="admin/categories/{category}/restore"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTadmin-categories--category--restore', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTadmin-categories--category--restore"
                    onclick="tryItOut('POSTadmin-categories--category--restore');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTadmin-categories--category--restore"
                    onclick="cancelTryOut('POSTadmin-categories--category--restore');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTadmin-categories--category--restore"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>admin/categories/{category}/restore</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTadmin-categories--category--restore"
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
                              name="Accept"                data-endpoint="POSTadmin-categories--category--restore"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>category</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="category"                data-endpoint="POSTadmin-categories--category--restore"
               value="architecto"
               data-component="url">
    <br>
<p>The category. Example: <code>architecto</code></p>
            </div>
                    </form>

                    <h2 id="endpoints-GETadmin-categories">Display a listing of the resource.</h2>

<p>
</p>



<span id="example-requests-GETadmin-categories">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://127.0.0.1:8000/admin/categories" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8000/admin/categories"
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

<span id="example-responses-GETadmin-categories">
            <blockquote>
            <p>Example response (401):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
access-control-allow-origin: *
access-control-allow-methods: GET, POST, PUT, DELETE, OPTIONS
access-control-allow-headers: Content-Type, Authorization, X-Requested-With, X-XSRF-TOKEN
set-cookie: XSRF-TOKEN=eyJpdiI6Imw5cjV5RGtjMnJnZWdHVnBueTNiRGc9PSIsInZhbHVlIjoiNUptV1Z3MEEycnhIR1c1QlRqbTBDSlkwaXZnWDkwVUljYlBMWWlmTDQxVU5jdjZZL2l6clN0NS8rUGNCQVJXOFYvSDJKOHhwdHlEMU5jTFIwOXJlbkdWN2VCWDEvSVJ0cXNxR1BBYlkxT2NnZjBHbzNOa04zUVhuSllZV0VveE0iLCJtYWMiOiJkM2UyY2FjY2E4Mzg0N2NmY2U4YjZmYzE0NjI5NTZjMzY1NTk4NWVkOTI3NDcwMTc2YjgyNWNkZDdhOGFlOWRkIiwidGFnIjoiIn0%3D; expires=Fri, 29 Aug 2025 06:39:48 GMT; Max-Age=7200; path=/; samesite=lax; laravel_session=eyJpdiI6IkFNb3ZOQWZ2bUpGd281dzk3NlBzdEE9PSIsInZhbHVlIjoiVXh3SU5DVWpNTGVHdTVOWTBPcVlQUUFGT0tMbmJ4blltRGdVUTRPeUkxUlV2OE9GK1N6VGJOTGc5ZTZFRDdydUZLQmpidzFtamN0UlFwWlJlZ2c3UnNzMHhqcUhyODRhbVh4MnNTcWpzOHZPWk1tVGVob2RkZVE3d3FsekpuSFgiLCJtYWMiOiIxNjcyOTBhNDY5ZjdjNGMzNTVlMWRhZmNmMGJiODIwODhhMTgzOGU0OTE2ZTdkMDVlOGI2NmQwNWNhZjY4NDI0IiwidGFnIjoiIn0%3D; expires=Fri, 29 Aug 2025 06:39:48 GMT; Max-Age=7200; path=/; httponly; samesite=lax
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Unauthenticated.&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETadmin-categories" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETadmin-categories"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETadmin-categories"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETadmin-categories" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETadmin-categories">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETadmin-categories" data-method="GET"
      data-path="admin/categories"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETadmin-categories', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETadmin-categories"
                    onclick="tryItOut('GETadmin-categories');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETadmin-categories"
                    onclick="cancelTryOut('GETadmin-categories');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETadmin-categories"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>admin/categories</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETadmin-categories"
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
                              name="Accept"                data-endpoint="GETadmin-categories"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="endpoints-GETadmin-categories-create">Show the form for creating a new resource.</h2>

<p>
</p>



<span id="example-requests-GETadmin-categories-create">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://127.0.0.1:8000/admin/categories/create" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8000/admin/categories/create"
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

<span id="example-responses-GETadmin-categories-create">
            <blockquote>
            <p>Example response (401):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
access-control-allow-origin: *
access-control-allow-methods: GET, POST, PUT, DELETE, OPTIONS
access-control-allow-headers: Content-Type, Authorization, X-Requested-With, X-XSRF-TOKEN
set-cookie: XSRF-TOKEN=eyJpdiI6Ii8wZkVCMmFiR0NoRTFuSGNiRkRmckE9PSIsInZhbHVlIjoickZrVFE5Nm1PUXUrTHMzVGF2UlQzb0x5Z2hqa1drb0xKQUFpWVIrMnZ5N0RVUEpQcXV0WFhOVVdLTW5nSE05ZkkyQW9ZNUs3M3dTMTJ5dld1TmFMc3Y3b1B3b2ozeGRLSW9DZWxQcDFEcmlCNFduVS9yTzdqdlNvOWNIbXRVc3YiLCJtYWMiOiI1ZjUyMTZlZDhmMWQwZmUwMGE2ZTdiMWMyMTY4MDYzM2UyODY4NThhYzZjOTM0ZmI2YTZlOTliZDk1OWZjY2U5IiwidGFnIjoiIn0%3D; expires=Fri, 29 Aug 2025 06:39:48 GMT; Max-Age=7200; path=/; samesite=lax; laravel_session=eyJpdiI6InZuNmtEaUJ5MFliTjdGU2J3ZVI4VGc9PSIsInZhbHVlIjoieGM1dm4vb0hRaFBXeUk1MFdqYVlsaXEwS2RIUDZTaTBNajR2NU1nUnVUeVZvV2JQQUJvbzVmM0J2Q0pZYTBHbzFDSFZiRHZSdzNlMzdEbFhyMWdoci9jYjVBMHhqb3ZZdHB0NkdLWEYvUXF1cVVMdEpNSlFyZ1h6VGliTHFreTkiLCJtYWMiOiIyNjA0NDdkNmJjZjJlNmQ5OTYwZWM1NDYyOWY1NDg1ODVhNWY3ODYxMjMwODU4MTMzODYyNTVjNjcxOTEzMzY4IiwidGFnIjoiIn0%3D; expires=Fri, 29 Aug 2025 06:39:48 GMT; Max-Age=7200; path=/; httponly; samesite=lax
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Unauthenticated.&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETadmin-categories-create" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETadmin-categories-create"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETadmin-categories-create"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETadmin-categories-create" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETadmin-categories-create">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETadmin-categories-create" data-method="GET"
      data-path="admin/categories/create"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETadmin-categories-create', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETadmin-categories-create"
                    onclick="tryItOut('GETadmin-categories-create');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETadmin-categories-create"
                    onclick="cancelTryOut('GETadmin-categories-create');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETadmin-categories-create"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>admin/categories/create</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETadmin-categories-create"
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
                              name="Accept"                data-endpoint="GETadmin-categories-create"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="endpoints-POSTadmin-categories">Store a newly created resource in storage.</h2>

<p>
</p>



<span id="example-requests-POSTadmin-categories">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://127.0.0.1:8000/admin/categories" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"category_name\": \"b\",
    \"slug\": \"n\",
    \"sort_order\": 16,
    \"description\": \"Eius et animi quos velit et.\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8000/admin/categories"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "category_name": "b",
    "slug": "n",
    "sort_order": 16,
    "description": "Eius et animi quos velit et."
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTadmin-categories">
</span>
<span id="execution-results-POSTadmin-categories" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTadmin-categories"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTadmin-categories"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTadmin-categories" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTadmin-categories">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTadmin-categories" data-method="POST"
      data-path="admin/categories"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTadmin-categories', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTadmin-categories"
                    onclick="tryItOut('POSTadmin-categories');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTadmin-categories"
                    onclick="cancelTryOut('POSTadmin-categories');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTadmin-categories"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>admin/categories</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTadmin-categories"
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
                              name="Accept"                data-endpoint="POSTadmin-categories"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>category_name</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="category_name"                data-endpoint="POSTadmin-categories"
               value="b"
               data-component="body">
    <br>
<p>Must not be greater than 255 characters. Example: <code>b</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>slug</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="text" style="display: none"
                              name="slug"                data-endpoint="POSTadmin-categories"
               value="n"
               data-component="body">
    <br>
<p>Must not be greater than 255 characters. Example: <code>n</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>sort_order</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="sort_order"                data-endpoint="POSTadmin-categories"
               value="16"
               data-component="body">
    <br>
<p>Example: <code>16</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>description</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="text" style="display: none"
                              name="description"                data-endpoint="POSTadmin-categories"
               value="Eius et animi quos velit et."
               data-component="body">
    <br>
<p>Example: <code>Eius et animi quos velit et.</code></p>
        </div>
        </form>

                    <h2 id="endpoints-GETadmin-categories--id-">Display the specified resource.</h2>

<p>
</p>



<span id="example-requests-GETadmin-categories--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://127.0.0.1:8000/admin/categories/architecto" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8000/admin/categories/architecto"
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

<span id="example-responses-GETadmin-categories--id-">
            <blockquote>
            <p>Example response (401):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
access-control-allow-origin: *
access-control-allow-methods: GET, POST, PUT, DELETE, OPTIONS
access-control-allow-headers: Content-Type, Authorization, X-Requested-With, X-XSRF-TOKEN
set-cookie: XSRF-TOKEN=eyJpdiI6IkhEY0RJaDlZNmIxcjZYck5KdlUwOWc9PSIsInZhbHVlIjoiMkhHMmxYNU94UUg1eTlEVmxMZVdoUEE0ZmM3THlzOVNPU09XNVFnMHBoZkZlNVJyN1BNVjE2UTR3UXFBa0FpWXl4Ti9TQlhpTmlGbWtpYzFicEk1ZnFySWNicXVnMDRCTkNpZnp1aXh1bG1YczFmS2RwV2xSOGJHd2g3ZHRZNVYiLCJtYWMiOiJmMjMwMThhMjNlNWVlZmE1MzY0YTE5OGNiZDNlOGI0MTY5M2VmOTBjMWFlNWM1N2M2ODI5NGQ1MDM2ZjEwODlkIiwidGFnIjoiIn0%3D; expires=Fri, 29 Aug 2025 06:39:48 GMT; Max-Age=7200; path=/; samesite=lax; laravel_session=eyJpdiI6IkJoLzNSSFYvRkkyaEkvUVZFbkpoSkE9PSIsInZhbHVlIjoiTTAvc3Ivbnd1QTNSNVhrNTZRaTlJbEVtK3NkVUFDN1d4STBnNVg0bUlMQzZ4WTIxemJqYjU1L3lRSDBjcHFJQThmMGpJN3NzS1piRUdqclJ0Z3FMZWc5N1UvUU5Lb2FPbTZTWlZCbklvZzdjVThxeUR1di8xK05zRWZJRzB5ZDEiLCJtYWMiOiI4MDlkYTRiN2FkNDFmMzdmNjg1YjVmZTk4ZjhlMmYzMDJiMjU5NDdiNDU2ZDE4MzcxYTdhZWRiMDhhM2Y0ZjI5IiwidGFnIjoiIn0%3D; expires=Fri, 29 Aug 2025 06:39:48 GMT; Max-Age=7200; path=/; httponly; samesite=lax
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Unauthenticated.&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETadmin-categories--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETadmin-categories--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETadmin-categories--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETadmin-categories--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETadmin-categories--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETadmin-categories--id-" data-method="GET"
      data-path="admin/categories/{id}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETadmin-categories--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETadmin-categories--id-"
                    onclick="tryItOut('GETadmin-categories--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETadmin-categories--id-"
                    onclick="cancelTryOut('GETadmin-categories--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETadmin-categories--id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>admin/categories/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETadmin-categories--id-"
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
                              name="Accept"                data-endpoint="GETadmin-categories--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="id"                data-endpoint="GETadmin-categories--id-"
               value="architecto"
               data-component="url">
    <br>
<p>The ID of the category. Example: <code>architecto</code></p>
            </div>
                    </form>

                    <h2 id="endpoints-GETadmin-categories--category--edit">Show the form for editing the specified resource.</h2>

<p>
</p>



<span id="example-requests-GETadmin-categories--category--edit">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://127.0.0.1:8000/admin/categories/architecto/edit" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8000/admin/categories/architecto/edit"
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

<span id="example-responses-GETadmin-categories--category--edit">
            <blockquote>
            <p>Example response (401):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
access-control-allow-origin: *
access-control-allow-methods: GET, POST, PUT, DELETE, OPTIONS
access-control-allow-headers: Content-Type, Authorization, X-Requested-With, X-XSRF-TOKEN
set-cookie: XSRF-TOKEN=eyJpdiI6Ijd0T3NFNEMxckxGWGdNTm10VENJblE9PSIsInZhbHVlIjoicVAxR3FhLzljRjRkRHUvYWV6U25PV1ZvZ3hvOGl5bzQ5YUpYMkUwbFk5eWl1K3lIQWN0VmtpL2pjYVM4MHNRV2c1YnVEU1U5QXAycWpEYWdCeDEvcG02TlAxTlk4SlFEV3NyNFZYb3djcDNKMHVST2M0QjN6c1prR25XUEJwQk8iLCJtYWMiOiI3ODBhOWI2NzIzMWYwNGQzNTMzOWViNzE4MzEwOTcyY2M5M2RmZGU0ZGU1NWYxMWQxNTVkMDQ1MDc2MmQ2YjdlIiwidGFnIjoiIn0%3D; expires=Fri, 29 Aug 2025 06:39:48 GMT; Max-Age=7200; path=/; samesite=lax; laravel_session=eyJpdiI6ImhFdUtxYVpzTzZ4K2hCbzhnWjRFY0E9PSIsInZhbHVlIjoiWDN3WVlMUU1WbXZOdy9vandOanNzaWg4dmJUQ3NxRkxaUTZKbTh4ODFJaVZGT1c2NnJZSWZCZktsK2ZhYkJpV1doOERpVDZUbkhRS1BKajVJTjB4M2Zvb0RQYndQczlJaVo2VkxoemFmVnF5MHhpRG1iUVhmb2llK2lqU0Z6aWgiLCJtYWMiOiI2N2ViYzU4ZmNiMGJkMTFiMTcwODczNWMyMDBjYzcxNWViYmZjN2U4ODM4MzJlNTFjY2NlNDQ2MmQwODRlMjQ1IiwidGFnIjoiIn0%3D; expires=Fri, 29 Aug 2025 06:39:48 GMT; Max-Age=7200; path=/; httponly; samesite=lax
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Unauthenticated.&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETadmin-categories--category--edit" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETadmin-categories--category--edit"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETadmin-categories--category--edit"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETadmin-categories--category--edit" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETadmin-categories--category--edit">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETadmin-categories--category--edit" data-method="GET"
      data-path="admin/categories/{category}/edit"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETadmin-categories--category--edit', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETadmin-categories--category--edit"
                    onclick="tryItOut('GETadmin-categories--category--edit');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETadmin-categories--category--edit"
                    onclick="cancelTryOut('GETadmin-categories--category--edit');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETadmin-categories--category--edit"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>admin/categories/{category}/edit</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETadmin-categories--category--edit"
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
                              name="Accept"                data-endpoint="GETadmin-categories--category--edit"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>category</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="category"                data-endpoint="GETadmin-categories--category--edit"
               value="architecto"
               data-component="url">
    <br>
<p>The category. Example: <code>architecto</code></p>
            </div>
                    </form>

                    <h2 id="endpoints-PUTadmin-categories--id-">Update the specified resource in storage.</h2>

<p>
</p>



<span id="example-requests-PUTadmin-categories--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request PUT \
    "http://127.0.0.1:8000/admin/categories/architecto" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"category_name\": \"b\",
    \"slug\": \"n\",
    \"sort_order\": 16,
    \"description\": \"Eius et animi quos velit et.\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8000/admin/categories/architecto"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "category_name": "b",
    "slug": "n",
    "sort_order": 16,
    "description": "Eius et animi quos velit et."
};

fetch(url, {
    method: "PUT",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-PUTadmin-categories--id-">
</span>
<span id="execution-results-PUTadmin-categories--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-PUTadmin-categories--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-PUTadmin-categories--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-PUTadmin-categories--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-PUTadmin-categories--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-PUTadmin-categories--id-" data-method="PUT"
      data-path="admin/categories/{id}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('PUTadmin-categories--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-PUTadmin-categories--id-"
                    onclick="tryItOut('PUTadmin-categories--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-PUTadmin-categories--id-"
                    onclick="cancelTryOut('PUTadmin-categories--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-PUTadmin-categories--id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-darkblue">PUT</small>
            <b><code>admin/categories/{id}</code></b>
        </p>
            <p>
            <small class="badge badge-purple">PATCH</small>
            <b><code>admin/categories/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="PUTadmin-categories--id-"
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
                              name="Accept"                data-endpoint="PUTadmin-categories--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="id"                data-endpoint="PUTadmin-categories--id-"
               value="architecto"
               data-component="url">
    <br>
<p>The ID of the category. Example: <code>architecto</code></p>
            </div>
                            <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>category_name</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="category_name"                data-endpoint="PUTadmin-categories--id-"
               value="b"
               data-component="body">
    <br>
<p>Must not be greater than 255 characters. Example: <code>b</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>slug</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="text" style="display: none"
                              name="slug"                data-endpoint="PUTadmin-categories--id-"
               value="n"
               data-component="body">
    <br>
<p>Must not be greater than 255 characters. Example: <code>n</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>sort_order</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="sort_order"                data-endpoint="PUTadmin-categories--id-"
               value="16"
               data-component="body">
    <br>
<p>Example: <code>16</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>description</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="text" style="display: none"
                              name="description"                data-endpoint="PUTadmin-categories--id-"
               value="Eius et animi quos velit et."
               data-component="body">
    <br>
<p>Example: <code>Eius et animi quos velit et.</code></p>
        </div>
        </form>

                    <h2 id="endpoints-DELETEadmin-categories--id-">Remove the specified resource from storage.</h2>

<p>
</p>



<span id="example-requests-DELETEadmin-categories--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request DELETE \
    "http://127.0.0.1:8000/admin/categories/architecto" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8000/admin/categories/architecto"
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

<span id="example-responses-DELETEadmin-categories--id-">
</span>
<span id="execution-results-DELETEadmin-categories--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-DELETEadmin-categories--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-DELETEadmin-categories--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-DELETEadmin-categories--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-DELETEadmin-categories--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-DELETEadmin-categories--id-" data-method="DELETE"
      data-path="admin/categories/{id}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('DELETEadmin-categories--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-DELETEadmin-categories--id-"
                    onclick="tryItOut('DELETEadmin-categories--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-DELETEadmin-categories--id-"
                    onclick="cancelTryOut('DELETEadmin-categories--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-DELETEadmin-categories--id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-red">DELETE</small>
            <b><code>admin/categories/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="DELETEadmin-categories--id-"
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
                              name="Accept"                data-endpoint="DELETEadmin-categories--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="id"                data-endpoint="DELETEadmin-categories--id-"
               value="architecto"
               data-component="url">
    <br>
<p>The ID of the category. Example: <code>architecto</code></p>
            </div>
                    </form>

                    <h2 id="endpoints-GETadmin-products-trashed">GET admin/products/trashed</h2>

<p>
</p>



<span id="example-requests-GETadmin-products-trashed">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://127.0.0.1:8000/admin/products/trashed" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8000/admin/products/trashed"
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
            <p>Example response (401):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
access-control-allow-origin: *
access-control-allow-methods: GET, POST, PUT, DELETE, OPTIONS
access-control-allow-headers: Content-Type, Authorization, X-Requested-With, X-XSRF-TOKEN
set-cookie: XSRF-TOKEN=eyJpdiI6IlBKd2NoR2VDSWRoT0k0Y3NMWVpRT0E9PSIsInZhbHVlIjoibE5kVDFySDkxQWZqK3UzUzRCaEp1Q0VyMXVaa3IyRUNkMkVsMFkrWHdZQTlCUzd4a0RGU0JDRzVzeDR6SXlzaHhtVDZPdUN3UlUyK0s5ellsZ2lmeDlXZ1dMZXorTUNGcHlQMGZyOGNqRFlNRThicXRKbGgwSjFncFZ2eElhMkoiLCJtYWMiOiI5YzM0ODkyZjA4ZWM0NGI3Yjc3NmFiYmEyOWNkMGQ4NWQ3ZjZjNGUwZDU3OTc3MjYwZjAwYTU5Yzc1YTU3OWJkIiwidGFnIjoiIn0%3D; expires=Fri, 29 Aug 2025 06:39:48 GMT; Max-Age=7200; path=/; samesite=lax; laravel_session=eyJpdiI6IkVkMFNCd0FwRlBOL1JQWDNkeGtIaVE9PSIsInZhbHVlIjoib0kwN2pVTEg0ZmlsQ283dDRTMWR5cEs2VzM1NGhmL2dhcFZ3SzJBRVRBVVdUcU50TFFjTnMwNEc0S205cG1GbVB5cHlSWGJSZTB4QWM3a0xOV3NqcGdYakNYZEdaSUJXMDFZenFvY1hwcmI3Q2l1VVY1R3RmcUozUlpHTWhHNGYiLCJtYWMiOiJjYmMwNGI0NmYyZjViYTAwNWFlNzlkNzAwNGQyZmQwZThjYTFhZjU3YmQxNjg0OWNiZWFhZmQxNTllZGRkYzZiIiwidGFnIjoiIn0%3D; expires=Fri, 29 Aug 2025 06:39:48 GMT; Max-Age=7200; path=/; httponly; samesite=lax
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Unauthenticated.&quot;
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
      data-authed="0"
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

                    <h2 id="endpoints-POSTadmin-products--product_products_id--restore">POST admin/products/{product_products_id}/restore</h2>

<p>
</p>



<span id="example-requests-POSTadmin-products--product_products_id--restore">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://127.0.0.1:8000/admin/products/1/restore" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8000/admin/products/1/restore"
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
      data-authed="0"
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
                    </form>

                    <h2 id="endpoints-GETadmin-products">Display a listing of the resource.</h2>

<p>
</p>



<span id="example-requests-GETadmin-products">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://127.0.0.1:8000/admin/products" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8000/admin/products"
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

<span id="example-responses-GETadmin-products">
            <blockquote>
            <p>Example response (401):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
access-control-allow-origin: *
access-control-allow-methods: GET, POST, PUT, DELETE, OPTIONS
access-control-allow-headers: Content-Type, Authorization, X-Requested-With, X-XSRF-TOKEN
set-cookie: XSRF-TOKEN=eyJpdiI6IlFRUkc0ZGdrYm5DWjNTRHNGT2RGK0E9PSIsInZhbHVlIjoiaEk3c3l5cDBvaU5JSy9Ibkh6K3paaHNuVUQ3bkdDK091V1JNVE1LWDFwYTVmbGk1aHBrU1hsdE5sR281WHl0ZkVlWFR6T1p5cVdqNWJBYkY2K25zYzJuSnhXQmh2WWxLVTN4QWJUSDVZc3JQdVBZTUUvRUJFR3ZJSFcrb1RzU1kiLCJtYWMiOiJiNzk0NjY3Y2I1NzFkOTJlZTk2NDgzYzc1ZTcyMDUwODc4YzIwN2RlZjNiMjliZDliZGYxN2QzNTg1MzNhNzljIiwidGFnIjoiIn0%3D; expires=Fri, 29 Aug 2025 06:39:48 GMT; Max-Age=7200; path=/; samesite=lax; laravel_session=eyJpdiI6Im5XUVEzK2pQdFplcUN1elFVblVuaFE9PSIsInZhbHVlIjoiVnRSWHUva2RabmExTWx3SUE1N3JGOTY4YmJHbG1XejBEa21laElURlQ0Qjh2OWZKMW10VzJDL3dCRTZ2NTl4YWthbUdUNyszbDNUZzJ4ajZyTUdnelVQY2I0TkwvZ2pWUHA2Z2JiWWErdDZObGhObldiQlN6cnpJR1dYSkJZNGsiLCJtYWMiOiI3MDlkZjlkNzMwNzk4MjcwOTQ0YTNkNGQwMTRiNDEyZTc3YzVhYTI2MDY5NWM5NTExOGFlMTE4MzlhYmMzYWE4IiwidGFnIjoiIn0%3D; expires=Fri, 29 Aug 2025 06:39:48 GMT; Max-Age=7200; path=/; httponly; samesite=lax
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Unauthenticated.&quot;
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
      data-authed="0"
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
                        </form>

                    <h2 id="endpoints-GETadmin-products-create">Show the form for creating a new resource.</h2>

<p>
</p>



<span id="example-requests-GETadmin-products-create">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://127.0.0.1:8000/admin/products/create" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8000/admin/products/create"
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
            <blockquote>
            <p>Example response (401):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
access-control-allow-origin: *
access-control-allow-methods: GET, POST, PUT, DELETE, OPTIONS
access-control-allow-headers: Content-Type, Authorization, X-Requested-With, X-XSRF-TOKEN
set-cookie: XSRF-TOKEN=eyJpdiI6ImE2YUxwWGU0RS9KVjJDUG1rMm5BbWc9PSIsInZhbHVlIjoiUEhtbXhRK250NWphZFdmcXlwVlFxR2l5d3Rvczl5NEJUNkovbjFURXp1cENOTXpzTDgyYTBORXkyWmtzZGh4c3lRWmdRRDBxOS9HZzVFT2dMVnpua3h4Si9QWlpLeVl1dWtaUXNoTmkzWklSclVFbkxaVXVoYzBKZlNJSzFKbTkiLCJtYWMiOiJkOWIyMWViNWU3ZDE3ZWY4ZGI2MWZkNDBhZGM5ZWUwMjY3NjgwYTQxMWI3NDViNTRlZTg1NjhiMWMzYzdiZjJjIiwidGFnIjoiIn0%3D; expires=Fri, 29 Aug 2025 06:39:48 GMT; Max-Age=7200; path=/; samesite=lax; laravel_session=eyJpdiI6InB2V25DeGwvY21sMDJhWEE4aWRWT0E9PSIsInZhbHVlIjoiUnFXaWkvZ3Ayb0JwR21ySFJqNDNaYmN2R3VZNk5ZZ3BHYTc0ZGMvN3VLNnR0OE1BQTNMRDdSZlpObU5Zeldnak5GdFNPMDdyS3g3QWxSSkgwRWxSS1Vzd0NWaXh5cVJ2YW1nTFdXcFU2YzdJY004S1pyNlJhNFJneVl2aGw0Q2siLCJtYWMiOiI4YTljOWM1MGY5ZjcyZDBhYmU3OTA5YjE2ZmJkODUwODViYjI1ZjljZjBjMjJlMDI0NDQ1NmQ0YTU4MTYxNzdmIiwidGFnIjoiIn0%3D; expires=Fri, 29 Aug 2025 06:39:48 GMT; Max-Age=7200; path=/; httponly; samesite=lax
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Unauthenticated.&quot;
}</code>
 </pre>
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

                    <h2 id="endpoints-POSTadmin-products">Store a newly created resource in storage.</h2>

<p>
</p>



<span id="example-requests-POSTadmin-products">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://127.0.0.1:8000/admin/products" \
    --header "Content-Type: multipart/form-data" \
    --header "Accept: application/json" \
    --form "categories_id=16"\
    --form "product_name=n"\
    --form "slug=g"\
    --form "description=Eius et animi quos velit et."\
    --form "product_price=60"\
    --form "stock_quantity=42"\
    --form "status=0"\
    --form "spec_size[]=M"\
    --form "spec_color=l"\
    --form "spec_fit=Slim"\
    --form "spec_brand=Pamu"\
    --form "spec_material=Viscose"\
    --form "spec_care=Sấy nhẹ"\
    --form "image=@C:\Users\lecon\AppData\Local\Temp\php2A0C.tmp" \
    --form "images[]=@C:\Users\lecon\AppData\Local\Temp\php2A9A.tmp" </code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8000/admin/products"
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
body.append('status', '0');
body.append('spec_size[]', 'M');
body.append('spec_color', 'l');
body.append('spec_fit', 'Slim');
body.append('spec_brand', 'Pamu');
body.append('spec_material', 'Viscose');
body.append('spec_care', 'Sấy nhẹ');
body.append('image', document.querySelector('input[name="image"]').files[0]);
body.append('images[]', document.querySelector('input[name="images[]"]').files[0]);

fetch(url, {
    method: "POST",
    headers,
    body,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTadmin-products">
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
      data-authed="0"
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
               value="0"
               data-component="body">
    <br>
<p>Example: <code>0</code></p>
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
<p>Must be an image. Must not be greater than 2048 kilobytes. Example: <code>C:\Users\lecon\AppData\Local\Temp\php2A0C.tmp</code></p>
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
                              name="spec_brand"                data-endpoint="POSTadmin-products"
               value="Pamu"
               data-component="body">
    <br>
<p>Example: <code>Pamu</code></p>
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
        </form>

                    <h2 id="endpoints-GETadmin-products--products_id-">Display the specified resource.</h2>

<p>
</p>



<span id="example-requests-GETadmin-products--products_id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://127.0.0.1:8000/admin/products/1" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8000/admin/products/1"
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
            <p>Example response (401):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
access-control-allow-origin: *
access-control-allow-methods: GET, POST, PUT, DELETE, OPTIONS
access-control-allow-headers: Content-Type, Authorization, X-Requested-With, X-XSRF-TOKEN
set-cookie: XSRF-TOKEN=eyJpdiI6InZkQUZISitqMlhBNXRaanEveW5jVGc9PSIsInZhbHVlIjoiQ2c3R0x3RkxOajBGVnc5a1pYaHZrSXJWcWZCaFhWVkN3aXVsL1dEWElFOTNOb3o3alphMGdRL1dTUHZQZGpVQW13cU13c1RoalFZdTc3YTg4OXhHRXRteXFOMmV0REhUcG1MZUsvYWxXVGE1dnc1RVJCc1BrVVhHQTdMRnhTUHYiLCJtYWMiOiIzYjZjYjljOWU2NzhmYTJiOTRhYmVmODE0NDQ1YWZkZTBlMjFkMTk5MDJiZWMxZDhjMGRiOTFhZmUzNDQ1NmExIiwidGFnIjoiIn0%3D; expires=Fri, 29 Aug 2025 06:39:49 GMT; Max-Age=7200; path=/; samesite=lax; laravel_session=eyJpdiI6IkM3RnloREgxbVpSbjh1UVBsck1ydlE9PSIsInZhbHVlIjoiZ084VWVudWJvSTRCSEEzbHZqbUxZRWhwRWc1dE8zdEVrdnRNMm5UVXVSTU80MVdHYTRuaUYvQnBQdkdIRnM1UlY1Zms2UlZnYVFOOTdMRlllOEJFR2ExTTdWd0QzMzRWK1RlMWZiTkJhRXVYOXlNRDdLZXpPdisyZzAzQWxHRloiLCJtYWMiOiJjM2NjMTBmZjAyODkxZWJhMDBlNmZiOGMyZTY0NDk4NWZlN2IwNjMxODNiYWY3ZGQzNTRkNGViNTIyZWRhMGNmIiwidGFnIjoiIn0%3D; expires=Fri, 29 Aug 2025 06:39:49 GMT; Max-Age=7200; path=/; httponly; samesite=lax
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Unauthenticated.&quot;
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
      data-authed="0"
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
                    </form>

                    <h2 id="endpoints-GETadmin-products--product_products_id--edit">Show the form for editing the specified resource.</h2>

<p>
</p>



<span id="example-requests-GETadmin-products--product_products_id--edit">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://127.0.0.1:8000/admin/products/1/edit" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8000/admin/products/1/edit"
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
            <blockquote>
            <p>Example response (401):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
access-control-allow-origin: *
access-control-allow-methods: GET, POST, PUT, DELETE, OPTIONS
access-control-allow-headers: Content-Type, Authorization, X-Requested-With, X-XSRF-TOKEN
set-cookie: XSRF-TOKEN=eyJpdiI6ImJsdThET3llUlpweDArMWxpbmU5cWc9PSIsInZhbHVlIjoiVkpxcGRCNXo5Z05YSkN5M3A2QXNnY1JVc0pJb3Y2VG1UY2VWQUU3SFBDR0hyRHBiQzJLWExGL2ZXVldGM3FQdmhqaTJtVWlXQXcvemVtWi9jOTNZeEVCZkJGNm5zM0k2R0Q5TTFudHNkSngyRkZMUU5CTDZWeW96dDJESVhGZjEiLCJtYWMiOiJhNDE2ZWU1NTEzODIyMjE2NGRlMDUxOWVkODQ2ZDAwNTAyMDZlNDNiZmI2NjAxYWVlYzNlNjA5YjQ2MDU0MmU4IiwidGFnIjoiIn0%3D; expires=Fri, 29 Aug 2025 06:39:49 GMT; Max-Age=7200; path=/; samesite=lax; laravel_session=eyJpdiI6Im8vWXRra3R2aVh5V2RmVWh5V0hZM2c9PSIsInZhbHVlIjoiMGJBV25Lb3drVERWTmNrc1ZuWGU5cFVkVXhWVkY3TS93NFpwQVhMOGNZSG9NL1MrcWJMekxVZFBhb3NEdlBpOGpESlU0cXFwOUJkbWJHMUd6eUZRdnJtUGt0RVZHMGZ4OTVDTUJBSVB6bitjaVVUVDlBcmNWSHF6YVpFRXMrR1YiLCJtYWMiOiJmMDA0MzliNzgzYWE1ZDVlNGI4NGZjODFiMTVhYzIyZjFlYmVjY2MwOWRlMGQwMGEyYzNlMmE5OTA2YTE2MzgwIiwidGFnIjoiIn0%3D; expires=Fri, 29 Aug 2025 06:39:49 GMT; Max-Age=7200; path=/; httponly; samesite=lax
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Unauthenticated.&quot;
}</code>
 </pre>
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

                    <h2 id="endpoints-PUTadmin-products--products_id-">Update the specified resource in storage.</h2>

<p>
</p>



<span id="example-requests-PUTadmin-products--products_id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request PUT \
    "http://127.0.0.1:8000/admin/products/1" \
    --header "Content-Type: multipart/form-data" \
    --header "Accept: application/json" \
    --form "categories_id=16"\
    --form "product_name=n"\
    --form "slug=g"\
    --form "description=Eius et animi quos velit et."\
    --form "product_price=60"\
    --form "stock_quantity=42"\
    --form "status=0"\
    --form "remove_image=1"\
    --form "remove_image_ids[]=16"\
    --form "primary_image_id=16"\
    --form "spec_size[]=32"\
    --form "spec_color=n"\
    --form "spec_fit=Relaxed"\
    --form "spec_brand=Rebike"\
    --form "spec_material=Denim"\
    --form "spec_care=Ủi nhiệt độ thấp"\
    --form "image=@C:\Users\lecon\AppData\Local\Temp\php2AF8.tmp" \
    --form "images[]=@C:\Users\lecon\AppData\Local\Temp\php2AF9.tmp" </code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8000/admin/products/1"
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
body.append('status', '0');
body.append('remove_image', '1');
body.append('remove_image_ids[]', '16');
body.append('primary_image_id', '16');
body.append('spec_size[]', '32');
body.append('spec_color', 'n');
body.append('spec_fit', 'Relaxed');
body.append('spec_brand', 'Rebike');
body.append('spec_material', 'Denim');
body.append('spec_care', 'Ủi nhiệt độ thấp');
body.append('image', document.querySelector('input[name="image"]').files[0]);
body.append('images[]', document.querySelector('input[name="images[]"]').files[0]);

fetch(url, {
    method: "PUT",
    headers,
    body,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-PUTadmin-products--products_id-">
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
      data-authed="0"
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
               value="0"
               data-component="body">
    <br>
<p>Example: <code>0</code></p>
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
<p>Must be an image. Must not be greater than 2048 kilobytes. Example: <code>C:\Users\lecon\AppData\Local\Temp\php2AF8.tmp</code></p>
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
               value="Relaxed"
               data-component="body">
    <br>
<p>Example: <code>Relaxed</code></p>
Must be one of:
<ul style="list-style-type: square;"><li><code>Regular</code></li> <li><code>Slim</code></li> <li><code>Relaxed</code></li></ul>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>spec_brand</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="text" style="display: none"
                              name="spec_brand"                data-endpoint="PUTadmin-products--products_id-"
               value="Rebike"
               data-component="body">
    <br>
<p>Example: <code>Rebike</code></p>
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
        </form>

                    <h2 id="endpoints-DELETEadmin-products--products_id-">Remove the specified resource from storage.</h2>

<p>
</p>



<span id="example-requests-DELETEadmin-products--products_id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request DELETE \
    "http://127.0.0.1:8000/admin/products/1" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8000/admin/products/1"
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

                    <h2 id="endpoints-GETadmin-provinces">Display a listing of the resource.</h2>

<p>
</p>



<span id="example-requests-GETadmin-provinces">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://127.0.0.1:8000/admin/provinces" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8000/admin/provinces"
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

<span id="example-responses-GETadmin-provinces">
            <blockquote>
            <p>Example response (401):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
access-control-allow-origin: *
access-control-allow-methods: GET, POST, PUT, DELETE, OPTIONS
access-control-allow-headers: Content-Type, Authorization, X-Requested-With, X-XSRF-TOKEN
set-cookie: XSRF-TOKEN=eyJpdiI6InZuZUR1enZlNVk5MmtPNmc5OTA0WXc9PSIsInZhbHVlIjoiSnZEN1BPVDJrU1lYaTluUEtycEI1UE5hb2tDK1ZYYXlXbDJEWkVGcGY0SFlmKzRiNUx4ZzRKM0hZTFphRk51MHF6SDBCVG5xUGFkd3lhbCtOQ2thU0VvVHFvV05wVVZmK1JraFBEdGw0WmI4V0xQS2xZeERYOTRFMkVJSmFyZVkiLCJtYWMiOiJkMTkwZjc0MDcyMmMwMTVjMmNiMTBiZGI3NjE4ZjNiNDkwYTU5OGIyODgzMjliNjE2YjVkNDhmODg1NTc2Y2NmIiwidGFnIjoiIn0%3D; expires=Fri, 29 Aug 2025 06:39:49 GMT; Max-Age=7200; path=/; samesite=lax; laravel_session=eyJpdiI6IkFSdGZkdDRNVEI1U2VXNTdUNEtSZHc9PSIsInZhbHVlIjoiK295aGV0QW0vVUZqRklRL2luUXdMaW9RVDZiQ3EwcHFWVHhyQlN1cFZ4cURWcVVpUVVuYmQ1cnJqYXNrOFhRanZ2VWFndVBabVRGRDNwOEVCVkwvK2RybDhlbXBEa2FiblFHSEZVd0pjT3VVcTN4ejNIT0pHa3RmUzlyOXNpbksiLCJtYWMiOiJiNTlhOWQ2ZTg5NTY2NDFiMWU2YTJmNWY0ZTIyM2JhYjMzMTQ0NTJhMDM0ZGM5Y2U0NzM0MjRiZjY3MjRlMWE5IiwidGFnIjoiIn0%3D; expires=Fri, 29 Aug 2025 06:39:49 GMT; Max-Age=7200; path=/; httponly; samesite=lax
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Unauthenticated.&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETadmin-provinces" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETadmin-provinces"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETadmin-provinces"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETadmin-provinces" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETadmin-provinces">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETadmin-provinces" data-method="GET"
      data-path="admin/provinces"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETadmin-provinces', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETadmin-provinces"
                    onclick="tryItOut('GETadmin-provinces');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETadmin-provinces"
                    onclick="cancelTryOut('GETadmin-provinces');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETadmin-provinces"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>admin/provinces</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETadmin-provinces"
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
                              name="Accept"                data-endpoint="GETadmin-provinces"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="endpoints-GETadmin-provinces-create">Show the form for creating a new resource.</h2>

<p>
</p>



<span id="example-requests-GETadmin-provinces-create">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://127.0.0.1:8000/admin/provinces/create" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8000/admin/provinces/create"
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

<span id="example-responses-GETadmin-provinces-create">
            <blockquote>
            <p>Example response (401):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
access-control-allow-origin: *
access-control-allow-methods: GET, POST, PUT, DELETE, OPTIONS
access-control-allow-headers: Content-Type, Authorization, X-Requested-With, X-XSRF-TOKEN
set-cookie: XSRF-TOKEN=eyJpdiI6Ikk4N21MNlFBUHhKOTdaQW11U0ZIbkE9PSIsInZhbHVlIjoiU2dhWGhJbkpubWRGVHBQMiswUExTRkNuWnZQMmNJVFhIcE5wMFNlVnpGR2tOdkVWYVZ3amY0cFE2WmFhb1hSeE1FTjBDVDRQR2tWaDRwNHptZzZNejZGbm9PaEtudy9uWFltaDF6Z3U0blI3dlRjMEVnbU93TnZEYXF5RUFBT2giLCJtYWMiOiJkMDcyMTI2NzE4ZjI5MTQ0YTExYjdlYjZkOGZjN2UyOTg1ODIxMGI5ZTY1MjQ0ODhhMTFhMTEwNzkxYmM1N2I1IiwidGFnIjoiIn0%3D; expires=Fri, 29 Aug 2025 06:39:49 GMT; Max-Age=7200; path=/; samesite=lax; laravel_session=eyJpdiI6Ik9OY1p5MkNVZWNaalY0dno0VUZkY2c9PSIsInZhbHVlIjoiNTVpVUpSNkFoWFgvR0VzdTFjM3JrTUpnVktJeWJncGNRRUV1dUZVd0pDMG1qVWdTMlp1K0RQRDBwNEx3ekJoS3VKbHhaWENkc3VPcTdZMjFBSUhzdFlmL1lVSzlhS1RHQ09hY3hoYkpYVVJaWWRtd3VreElDTk9NSUtvL0xzcGEiLCJtYWMiOiIxYzY3MzY1NWIyOWNhZWI4NTU3ZTliMDRlN2RlYTI0NDA1YWU2NTA0ODEwODBkY2MyZTA5ZjFhMzExODdjNjVlIiwidGFnIjoiIn0%3D; expires=Fri, 29 Aug 2025 06:39:49 GMT; Max-Age=7200; path=/; httponly; samesite=lax
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Unauthenticated.&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETadmin-provinces-create" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETadmin-provinces-create"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETadmin-provinces-create"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETadmin-provinces-create" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETadmin-provinces-create">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETadmin-provinces-create" data-method="GET"
      data-path="admin/provinces/create"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETadmin-provinces-create', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETadmin-provinces-create"
                    onclick="tryItOut('GETadmin-provinces-create');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETadmin-provinces-create"
                    onclick="cancelTryOut('GETadmin-provinces-create');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETadmin-provinces-create"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>admin/provinces/create</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETadmin-provinces-create"
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
                              name="Accept"                data-endpoint="GETadmin-provinces-create"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="endpoints-POSTadmin-provinces">Store a newly created resource in storage.</h2>

<p>
</p>



<span id="example-requests-POSTadmin-provinces">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://127.0.0.1:8000/admin/provinces" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"name\": \"b\",
    \"shipping_fee\": 39
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8000/admin/provinces"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "name": "b",
    "shipping_fee": 39
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTadmin-provinces">
</span>
<span id="execution-results-POSTadmin-provinces" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTadmin-provinces"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTadmin-provinces"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTadmin-provinces" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTadmin-provinces">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTadmin-provinces" data-method="POST"
      data-path="admin/provinces"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTadmin-provinces', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTadmin-provinces"
                    onclick="tryItOut('POSTadmin-provinces');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTadmin-provinces"
                    onclick="cancelTryOut('POSTadmin-provinces');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTadmin-provinces"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>admin/provinces</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTadmin-provinces"
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
                              name="Accept"                data-endpoint="POSTadmin-provinces"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>name</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="name"                data-endpoint="POSTadmin-provinces"
               value="b"
               data-component="body">
    <br>
<p>Must not be greater than 255 characters. Example: <code>b</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>shipping_fee</code></b>&nbsp;&nbsp;
<small>number</small>&nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="shipping_fee"                data-endpoint="POSTadmin-provinces"
               value="39"
               data-component="body">
    <br>
<p>Must be at least 0. Example: <code>39</code></p>
        </div>
        </form>

                    <h2 id="endpoints-GETadmin-provinces--id-">Display the specified resource.</h2>

<p>
</p>



<span id="example-requests-GETadmin-provinces--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://127.0.0.1:8000/admin/provinces/1" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8000/admin/provinces/1"
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

<span id="example-responses-GETadmin-provinces--id-">
            <blockquote>
            <p>Example response (401):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
access-control-allow-origin: *
access-control-allow-methods: GET, POST, PUT, DELETE, OPTIONS
access-control-allow-headers: Content-Type, Authorization, X-Requested-With, X-XSRF-TOKEN
set-cookie: XSRF-TOKEN=eyJpdiI6IkRuNEpYb1RaT0VnMmxFaDhmb2hYSnc9PSIsInZhbHVlIjoiMktEcVFnMmQ0bzUwRnNYbGZhZHh0NGQzMjMwckhNMnp2c2lTSzFhV3RSUnBUNGtrK29mZjhUc0hyR0pKNmVmLzUzZ2RwR0dWaVA5MXR1cVQrK2RIQXFaRnh2cThXNVRoT2xOTlVNWVZKaFFTSEZKU0VMMXZkVUpqRFNwY1ZDbVkiLCJtYWMiOiI0NDBiMmYxYWJiNzAwODRjZWE4NjdmNzc4MTA4OThmOTJiODljM2IzYTcwYmM1MTQyNGQ4MDM5N2YwOWVjZDQwIiwidGFnIjoiIn0%3D; expires=Fri, 29 Aug 2025 06:39:49 GMT; Max-Age=7200; path=/; samesite=lax; laravel_session=eyJpdiI6ImtSZXcvS0xlWnI2anJrQ3NBajZpZnc9PSIsInZhbHVlIjoiajk1SkNab1FRS29jelpMKzQyUDlOVXVFMVF2ZElRRlo3NlBNaTI4bzRwZERwTDh1Y29zWGw4Vi90ck0zOEtNYWJkREx3SjJCa2lqM2xvdWVrd0FKcEQ3WFhvcXowT1JhaHdDaVk2T0ZVcENxQVBYSndpM1ZLNG43Mm4zY3AzZ3IiLCJtYWMiOiIyYTkyZDNiYjM5YTQxZjc1NzVhZjE3NjY4OWJjM2U5NjQ0MTFhOTM4OTY4MGE3YzEzZTRmMDI5NzU2MDYzZTZkIiwidGFnIjoiIn0%3D; expires=Fri, 29 Aug 2025 06:39:49 GMT; Max-Age=7200; path=/; httponly; samesite=lax
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Unauthenticated.&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETadmin-provinces--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETadmin-provinces--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETadmin-provinces--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETadmin-provinces--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETadmin-provinces--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETadmin-provinces--id-" data-method="GET"
      data-path="admin/provinces/{id}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETadmin-provinces--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETadmin-provinces--id-"
                    onclick="tryItOut('GETadmin-provinces--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETadmin-provinces--id-"
                    onclick="cancelTryOut('GETadmin-provinces--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETadmin-provinces--id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>admin/provinces/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETadmin-provinces--id-"
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
                              name="Accept"                data-endpoint="GETadmin-provinces--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="id"                data-endpoint="GETadmin-provinces--id-"
               value="1"
               data-component="url">
    <br>
<p>The ID of the province. Example: <code>1</code></p>
            </div>
                    </form>

                    <h2 id="endpoints-GETadmin-provinces--province_id--edit">Show the form for editing the specified resource.</h2>

<p>
</p>



<span id="example-requests-GETadmin-provinces--province_id--edit">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://127.0.0.1:8000/admin/provinces/1/edit" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8000/admin/provinces/1/edit"
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

<span id="example-responses-GETadmin-provinces--province_id--edit">
            <blockquote>
            <p>Example response (401):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
access-control-allow-origin: *
access-control-allow-methods: GET, POST, PUT, DELETE, OPTIONS
access-control-allow-headers: Content-Type, Authorization, X-Requested-With, X-XSRF-TOKEN
set-cookie: XSRF-TOKEN=eyJpdiI6IldwdjRnVnREVXgvOWFVY3duczVpZkE9PSIsInZhbHVlIjoiQjBTY0JMdkJTdHBmVTlYS0V2NTFpb3JHaWdpTG5ONGYyQXFzZmJOVFJYRDJVL0hTWTBFcG5XazBoM3dVTCtoenZXSGFYcG02SHJnREQ0b053eFhrbll6RDNONjhzR1NtcmJwSDRGN0l2T0VZekU0djVPVDFGYW55a052MitlOFciLCJtYWMiOiJmYThhYTIxMDFiZmE5NmE3ODhjMTBiYzEyNDlhZGMzMzM4MjQ1OGVhYzVhYWY0NzIwOTBiN2QzYTJkMTcwZmQ3IiwidGFnIjoiIn0%3D; expires=Fri, 29 Aug 2025 06:39:49 GMT; Max-Age=7200; path=/; samesite=lax; laravel_session=eyJpdiI6IjhuTXVDQUdnMW0xTEs1aGc5d1RWMnc9PSIsInZhbHVlIjoieUFWZFBnWWwxcFp6M0NObzhYQW4vUnVEUkoxSEZGQzBxcVgrdTFRK1AxSkwxd3daZWdYTmdUNzZRNmQ1YXBzc29FQ0laNk53VVRZeXVqemx3SllxTi9tNHFXTW5yUkI5RTdYcVdBYzRUaTFIdkZlMk9IZzFtWVN2QUdlVDA5WUEiLCJtYWMiOiJmMWM5N2FkMjhjNzM1OTZlMTI1MzcwNTYzZDljZTJhNzVhMTYxOTkwYjYyNjhlNTZkN2Y5OTk2Y2VlMzI3ZWUyIiwidGFnIjoiIn0%3D; expires=Fri, 29 Aug 2025 06:39:49 GMT; Max-Age=7200; path=/; httponly; samesite=lax
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Unauthenticated.&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETadmin-provinces--province_id--edit" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETadmin-provinces--province_id--edit"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETadmin-provinces--province_id--edit"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETadmin-provinces--province_id--edit" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETadmin-provinces--province_id--edit">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETadmin-provinces--province_id--edit" data-method="GET"
      data-path="admin/provinces/{province_id}/edit"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETadmin-provinces--province_id--edit', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETadmin-provinces--province_id--edit"
                    onclick="tryItOut('GETadmin-provinces--province_id--edit');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETadmin-provinces--province_id--edit"
                    onclick="cancelTryOut('GETadmin-provinces--province_id--edit');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETadmin-provinces--province_id--edit"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>admin/provinces/{province_id}/edit</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETadmin-provinces--province_id--edit"
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
                              name="Accept"                data-endpoint="GETadmin-provinces--province_id--edit"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>province_id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="province_id"                data-endpoint="GETadmin-provinces--province_id--edit"
               value="1"
               data-component="url">
    <br>
<p>The ID of the province. Example: <code>1</code></p>
            </div>
                    </form>

                    <h2 id="endpoints-PUTadmin-provinces--id-">Update the specified resource in storage.</h2>

<p>
</p>



<span id="example-requests-PUTadmin-provinces--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request PUT \
    "http://127.0.0.1:8000/admin/provinces/1" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"shipping_fee\": 27
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8000/admin/provinces/1"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "shipping_fee": 27
};

fetch(url, {
    method: "PUT",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-PUTadmin-provinces--id-">
</span>
<span id="execution-results-PUTadmin-provinces--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-PUTadmin-provinces--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-PUTadmin-provinces--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-PUTadmin-provinces--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-PUTadmin-provinces--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-PUTadmin-provinces--id-" data-method="PUT"
      data-path="admin/provinces/{id}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('PUTadmin-provinces--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-PUTadmin-provinces--id-"
                    onclick="tryItOut('PUTadmin-provinces--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-PUTadmin-provinces--id-"
                    onclick="cancelTryOut('PUTadmin-provinces--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-PUTadmin-provinces--id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-darkblue">PUT</small>
            <b><code>admin/provinces/{id}</code></b>
        </p>
            <p>
            <small class="badge badge-purple">PATCH</small>
            <b><code>admin/provinces/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="PUTadmin-provinces--id-"
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
                              name="Accept"                data-endpoint="PUTadmin-provinces--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="id"                data-endpoint="PUTadmin-provinces--id-"
               value="1"
               data-component="url">
    <br>
<p>The ID of the province. Example: <code>1</code></p>
            </div>
                            <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>name</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="text" style="display: none"
                              name="name"                data-endpoint="PUTadmin-provinces--id-"
               value=""
               data-component="body">
    <br>

        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>shipping_fee</code></b>&nbsp;&nbsp;
<small>number</small>&nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="shipping_fee"                data-endpoint="PUTadmin-provinces--id-"
               value="27"
               data-component="body">
    <br>
<p>Must be at least 0. Example: <code>27</code></p>
        </div>
        </form>

                    <h2 id="endpoints-DELETEadmin-provinces--id-">Remove the specified resource from storage.</h2>

<p>
</p>



<span id="example-requests-DELETEadmin-provinces--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request DELETE \
    "http://127.0.0.1:8000/admin/provinces/1" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8000/admin/provinces/1"
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

<span id="example-responses-DELETEadmin-provinces--id-">
</span>
<span id="execution-results-DELETEadmin-provinces--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-DELETEadmin-provinces--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-DELETEadmin-provinces--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-DELETEadmin-provinces--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-DELETEadmin-provinces--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-DELETEadmin-provinces--id-" data-method="DELETE"
      data-path="admin/provinces/{id}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('DELETEadmin-provinces--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-DELETEadmin-provinces--id-"
                    onclick="tryItOut('DELETEadmin-provinces--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-DELETEadmin-provinces--id-"
                    onclick="cancelTryOut('DELETEadmin-provinces--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-DELETEadmin-provinces--id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-red">DELETE</small>
            <b><code>admin/provinces/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="DELETEadmin-provinces--id-"
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
                              name="Accept"                data-endpoint="DELETEadmin-provinces--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="id"                data-endpoint="DELETEadmin-provinces--id-"
               value="1"
               data-component="url">
    <br>
<p>The ID of the province. Example: <code>1</code></p>
            </div>
                    </form>

                    <h2 id="endpoints-GETadmin-orders">Display a listing of the orders with search and filter functionality.</h2>

<p>
</p>



<span id="example-requests-GETadmin-orders">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://127.0.0.1:8000/admin/orders" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8000/admin/orders"
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

<span id="example-responses-GETadmin-orders">
            <blockquote>
            <p>Example response (401):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
access-control-allow-origin: *
access-control-allow-methods: GET, POST, PUT, DELETE, OPTIONS
access-control-allow-headers: Content-Type, Authorization, X-Requested-With, X-XSRF-TOKEN
set-cookie: XSRF-TOKEN=eyJpdiI6ImNreUkxV00yS015NUJHL1NaN2pvNEE9PSIsInZhbHVlIjoiOSt0MVNadU1tR2oxVlJ1QzBnd1V4NFdicnZzbEZZQy9OazVyU0tOZGExeVZnNmw1WG94anQwV3lSZjcwZGpkR2tIcTYwMzhYSkNFcTFHbFhueUR3ZjdIT1NaVnVrOTF3VjRvZmR2dXNlbytyOGRtaXNzd2piM3FhcE1zNDBKQ2oiLCJtYWMiOiJiYTdlNDUyNzNiMThiZDZjZTYzNzUzYTI2NGI3YzViMTIzNjdmYmY2YTc3ZTk4MzdiMDJkMmE3YjliMmQyYzg2IiwidGFnIjoiIn0%3D; expires=Fri, 29 Aug 2025 06:39:49 GMT; Max-Age=7200; path=/; samesite=lax; laravel_session=eyJpdiI6InhMS2NsSC9jSkhxVGxtclNrSHRvVVE9PSIsInZhbHVlIjoiOW55ajc1eVp3SzhHU3BpbFFuOUNPMUNWV2hUdzZYcXIwejhoWHJLWVdOcWlRZFhXcEVsTXpMeTdvZiszT1lwazlkUW5tZU9WNXg1QjlJZHVLVitxZm1LRk5TSnRaMWEwaE1nMGlzajlPOXhFb1JFd1haWHFKVmRSN09lVzlGbWMiLCJtYWMiOiIxNDMyOWViZTgzZTI5M2Q1ZTBmNmUzZjcxNGM1NzM0MzEzMjFmZThkMjYxYzgwYzlkMjM5YzQ5N2EzMzA4MzEyIiwidGFnIjoiIn0%3D; expires=Fri, 29 Aug 2025 06:39:49 GMT; Max-Age=7200; path=/; httponly; samesite=lax
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Unauthenticated.&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETadmin-orders" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETadmin-orders"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETadmin-orders"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETadmin-orders" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETadmin-orders">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETadmin-orders" data-method="GET"
      data-path="admin/orders"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETadmin-orders', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETadmin-orders"
                    onclick="tryItOut('GETadmin-orders');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETadmin-orders"
                    onclick="cancelTryOut('GETadmin-orders');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETadmin-orders"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>admin/orders</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETadmin-orders"
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
                              name="Accept"                data-endpoint="GETadmin-orders"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="endpoints-GETadmin-orders--orders_id-">Display the specified order with detailed information.</h2>

<p>
</p>



<span id="example-requests-GETadmin-orders--orders_id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://127.0.0.1:8000/admin/orders/1" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8000/admin/orders/1"
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

<span id="example-responses-GETadmin-orders--orders_id-">
            <blockquote>
            <p>Example response (401):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
access-control-allow-origin: *
access-control-allow-methods: GET, POST, PUT, DELETE, OPTIONS
access-control-allow-headers: Content-Type, Authorization, X-Requested-With, X-XSRF-TOKEN
set-cookie: XSRF-TOKEN=eyJpdiI6IjB0ZTg5cGlEMDUrVE1JTGo5MTN3cmc9PSIsInZhbHVlIjoiZmVYVk1ySnlmYmlkaDVWS2p4V2RSeXo5YUd0Tko4VjJIWHdQdFY3ekxEdUN3Y0ttOXhscjRyaGpPRDRtc21qdkxLb3cweHg4TmdqMVY0WjIxRXE4YjcyK3dRT21SWmN5K0h4RUFsVDdvR0dkMmdyNHJMZVpSMlRqOFpFMGdvOG8iLCJtYWMiOiJiZWMzYjE4MDRmY2JhYzE3NjVkOTFhNTEwMTFiMTU1ZGFkM2E4NDIwMTY1M2IxMGQ0NmI4YTI3MWIxNmEwOGJiIiwidGFnIjoiIn0%3D; expires=Fri, 29 Aug 2025 06:39:49 GMT; Max-Age=7200; path=/; samesite=lax; laravel_session=eyJpdiI6IjIvUEVsb1N1TFdMNXRxL21ldGNRZ3c9PSIsInZhbHVlIjoicEJYTkRVbzRRWEx3RG9JMXFGbG4rdlpoS2MyaktlZkpRY1R1ZVNMejB0Wk9ERzlkV2hhOGR3b1Q1NzQ2bUdrWnpsWXNqQnI3Skp6MTM4ZVB1RlNQbWpVeEozTFZGNE11ZEIwVFoyTGk3aE13UVZzM2xYanA3MFlvdUlHbDFZbHkiLCJtYWMiOiIzNjBmZDZkZTI2ZjBiMDEyMjFlZjIwNDVhYTMwZTBhOGZmOWVhNjc0OWQxYWU4YTFjYmU0NTAxNTdkYTRjNzhlIiwidGFnIjoiIn0%3D; expires=Fri, 29 Aug 2025 06:39:49 GMT; Max-Age=7200; path=/; httponly; samesite=lax
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Unauthenticated.&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETadmin-orders--orders_id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETadmin-orders--orders_id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETadmin-orders--orders_id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETadmin-orders--orders_id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETadmin-orders--orders_id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETadmin-orders--orders_id-" data-method="GET"
      data-path="admin/orders/{orders_id}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETadmin-orders--orders_id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETadmin-orders--orders_id-"
                    onclick="tryItOut('GETadmin-orders--orders_id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETadmin-orders--orders_id-"
                    onclick="cancelTryOut('GETadmin-orders--orders_id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETadmin-orders--orders_id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>admin/orders/{orders_id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETadmin-orders--orders_id-"
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
                              name="Accept"                data-endpoint="GETadmin-orders--orders_id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>orders_id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="orders_id"                data-endpoint="GETadmin-orders--orders_id-"
               value="1"
               data-component="url">
    <br>
<p>The ID of the orders. Example: <code>1</code></p>
            </div>
                    </form>

                    <h2 id="endpoints-PATCHadmin-orders--order_orders_id--status">Update the order status.</h2>

<p>
</p>



<span id="example-requests-PATCHadmin-orders--order_orders_id--status">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request PATCH \
    "http://127.0.0.1:8000/admin/orders/1/status" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"status\": null
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8000/admin/orders/1/status"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "status": null
};

fetch(url, {
    method: "PATCH",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-PATCHadmin-orders--order_orders_id--status">
</span>
<span id="execution-results-PATCHadmin-orders--order_orders_id--status" hidden>
    <blockquote>Received response<span
                id="execution-response-status-PATCHadmin-orders--order_orders_id--status"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-PATCHadmin-orders--order_orders_id--status"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-PATCHadmin-orders--order_orders_id--status" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-PATCHadmin-orders--order_orders_id--status">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-PATCHadmin-orders--order_orders_id--status" data-method="PATCH"
      data-path="admin/orders/{order_orders_id}/status"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('PATCHadmin-orders--order_orders_id--status', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-PATCHadmin-orders--order_orders_id--status"
                    onclick="tryItOut('PATCHadmin-orders--order_orders_id--status');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-PATCHadmin-orders--order_orders_id--status"
                    onclick="cancelTryOut('PATCHadmin-orders--order_orders_id--status');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-PATCHadmin-orders--order_orders_id--status"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-purple">PATCH</small>
            <b><code>admin/orders/{order_orders_id}/status</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="PATCHadmin-orders--order_orders_id--status"
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
                              name="Accept"                data-endpoint="PATCHadmin-orders--order_orders_id--status"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>order_orders_id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="order_orders_id"                data-endpoint="PATCHadmin-orders--order_orders_id--status"
               value="1"
               data-component="url">
    <br>
<p>The ID of the order orders. Example: <code>1</code></p>
            </div>
                            <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>status</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="status"                data-endpoint="PATCHadmin-orders--order_orders_id--status"
               value=""
               data-component="body">
    <br>

Must be one of:
<ul style="list-style-type: square;"><li><code></code></li></ul>
        </div>
        </form>

                    <h2 id="endpoints-POSTadmin-notifications-mark-as-read">Mark all unread notifications for the authenticated user as read.</h2>

<p>
</p>



<span id="example-requests-POSTadmin-notifications-mark-as-read">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://127.0.0.1:8000/admin/notifications/mark-as-read" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8000/admin/notifications/mark-as-read"
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

<span id="example-responses-POSTadmin-notifications-mark-as-read">
</span>
<span id="execution-results-POSTadmin-notifications-mark-as-read" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTadmin-notifications-mark-as-read"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTadmin-notifications-mark-as-read"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTadmin-notifications-mark-as-read" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTadmin-notifications-mark-as-read">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTadmin-notifications-mark-as-read" data-method="POST"
      data-path="admin/notifications/mark-as-read"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTadmin-notifications-mark-as-read', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTadmin-notifications-mark-as-read"
                    onclick="tryItOut('POSTadmin-notifications-mark-as-read');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTadmin-notifications-mark-as-read"
                    onclick="cancelTryOut('POSTadmin-notifications-mark-as-read');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTadmin-notifications-mark-as-read"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>admin/notifications/mark-as-read</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTadmin-notifications-mark-as-read"
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
                              name="Accept"                data-endpoint="POSTadmin-notifications-mark-as-read"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="endpoints-DELETEadmin-notifications-clear-all">Clear all notifications for the authenticated user.</h2>

<p>
</p>



<span id="example-requests-DELETEadmin-notifications-clear-all">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request DELETE \
    "http://127.0.0.1:8000/admin/notifications/clear-all" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8000/admin/notifications/clear-all"
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

<span id="example-responses-DELETEadmin-notifications-clear-all">
</span>
<span id="execution-results-DELETEadmin-notifications-clear-all" hidden>
    <blockquote>Received response<span
                id="execution-response-status-DELETEadmin-notifications-clear-all"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-DELETEadmin-notifications-clear-all"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-DELETEadmin-notifications-clear-all" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-DELETEadmin-notifications-clear-all">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-DELETEadmin-notifications-clear-all" data-method="DELETE"
      data-path="admin/notifications/clear-all"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('DELETEadmin-notifications-clear-all', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-DELETEadmin-notifications-clear-all"
                    onclick="tryItOut('DELETEadmin-notifications-clear-all');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-DELETEadmin-notifications-clear-all"
                    onclick="cancelTryOut('DELETEadmin-notifications-clear-all');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-DELETEadmin-notifications-clear-all"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-red">DELETE</small>
            <b><code>admin/notifications/clear-all</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="DELETEadmin-notifications-clear-all"
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
                              name="Accept"                data-endpoint="DELETEadmin-notifications-clear-all"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="endpoints-GETadmin-reports">GET admin/reports</h2>

<p>
</p>



<span id="example-requests-GETadmin-reports">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://127.0.0.1:8000/admin/reports" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8000/admin/reports"
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

<span id="example-responses-GETadmin-reports">
            <blockquote>
            <p>Example response (401):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
access-control-allow-origin: *
access-control-allow-methods: GET, POST, PUT, DELETE, OPTIONS
access-control-allow-headers: Content-Type, Authorization, X-Requested-With, X-XSRF-TOKEN
set-cookie: XSRF-TOKEN=eyJpdiI6IlN4dlBUY1hCOEpoNnlseGJpVEpORWc9PSIsInZhbHVlIjoiMVNkMHpwY1dvWUQwNlRGVWc2dk1HWWZBc3VtR3ZCSWRtb09haUwzVEtjOWlKTm11K0VpcWhyVWxDMzg5OEthOGZrMGIrbmswYjU1RlIxNzZLWUV6QzE3S09TTTZlZUl4SjB3VEVOWXY5KzA0d1lHVHNva2QrdURycCtiLzFia1YiLCJtYWMiOiIwOWU4MjhhNTdiMDU4MDUxZTg2ZDlkODkzZGZkZTM2NDJhZTBmNDk2M2I4M2I2MzNjMWZkMmEwMGI4Y2I0ZjAyIiwidGFnIjoiIn0%3D; expires=Fri, 29 Aug 2025 06:39:49 GMT; Max-Age=7200; path=/; samesite=lax; laravel_session=eyJpdiI6IkxFUVhVdmFBR1pia1M4UU56aHRZQ0E9PSIsInZhbHVlIjoiSHBORU1nejhrdVV6c0RadXp1SGFmc2lQK0hXYVVlbDBHbnhzOEpBUzlzNFVGdGNSM0hhSGcwQjRiK3lGamtIOTFabU9ZYzZRaWJpNEtUWUVzb2VEaXRlRjZKN2d4S2g0SkhOUWNyNGsxdmVla0ZpYmFVQVdaaSthdnVOOURZNkMiLCJtYWMiOiJjODVmOGViOTY1ZmVjMWRjYTY3OTY2MGQzYjI0NTFhYWY2MGY3OTE0OWZlY2U3NmY1MGI2NzhkYzFkODQ4YzNhIiwidGFnIjoiIn0%3D; expires=Fri, 29 Aug 2025 06:39:49 GMT; Max-Age=7200; path=/; httponly; samesite=lax
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Unauthenticated.&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETadmin-reports" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETadmin-reports"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETadmin-reports"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETadmin-reports" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETadmin-reports">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETadmin-reports" data-method="GET"
      data-path="admin/reports"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETadmin-reports', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETadmin-reports"
                    onclick="tryItOut('GETadmin-reports');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETadmin-reports"
                    onclick="cancelTryOut('GETadmin-reports');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETadmin-reports"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>admin/reports</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETadmin-reports"
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
                              name="Accept"                data-endpoint="GETadmin-reports"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="endpoints-GETadmin-reports--date-">GET admin/reports/{date}</h2>

<p>
</p>



<span id="example-requests-GETadmin-reports--date-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://127.0.0.1:8000/admin/reports/architecto" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8000/admin/reports/architecto"
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

<span id="example-responses-GETadmin-reports--date-">
            <blockquote>
            <p>Example response (401):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
access-control-allow-origin: *
access-control-allow-methods: GET, POST, PUT, DELETE, OPTIONS
access-control-allow-headers: Content-Type, Authorization, X-Requested-With, X-XSRF-TOKEN
set-cookie: XSRF-TOKEN=eyJpdiI6Ikk2aFZkZzE0dERNZjZ0bWhtZ3Q4VUE9PSIsInZhbHVlIjoiU1dXUlRTa1Y3MjU1UEJUVmNjc2ZXY256SHkybTBzOG9ybUFRelhxWFhnNEYxUlVGQUI2dFpGbnRtM0tueUtrSVN3elRJSFUzdFI2ZCs4L1RmMUoxTURkaTZCbE1XOUJSeTRMSGthdTBJZUpzR0x5MVc4aVVOb2xwZ3ZUU0V4UlgiLCJtYWMiOiI3N2RmYWYyZjY4NTI2N2NhODBjZWU4ODE0NDVkMjhhYTRkODFiYTI5OThjMWU0NzY2MjJjNGFlMTU0MzEzNWZjIiwidGFnIjoiIn0%3D; expires=Fri, 29 Aug 2025 06:39:49 GMT; Max-Age=7200; path=/; samesite=lax; laravel_session=eyJpdiI6IkJKeVM2RzhGV0t2ZEVLZXhkNDR1L0E9PSIsInZhbHVlIjoiOTB4aVRLcXAwSW1ValZMNW44MjdpR3hzSEFoVVZHYWhrbDQzbU9xMzlWRkJHMlhkNG9IMThUdkdNV3hMMEtlSm5OSkFFR3BJRXo1MVA5akZkVGcrak14SW0rUXZYMDlhZmVEN3IzREpQdC9FMURqRGpNODFmZ0FkZkkwZXlUVTMiLCJtYWMiOiI5OTQ2NzFhZDY2NTZhYmJmYmE3OTViYTAyM2IyNjgzZmEwOWFlZWIyZWYwNTNkMTVhYWFiZjI5ZTBiMjhkMDBiIiwidGFnIjoiIn0%3D; expires=Fri, 29 Aug 2025 06:39:49 GMT; Max-Age=7200; path=/; httponly; samesite=lax
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Unauthenticated.&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETadmin-reports--date-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETadmin-reports--date-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETadmin-reports--date-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETadmin-reports--date-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETadmin-reports--date-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETadmin-reports--date-" data-method="GET"
      data-path="admin/reports/{date}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETadmin-reports--date-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETadmin-reports--date-"
                    onclick="tryItOut('GETadmin-reports--date-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETadmin-reports--date-"
                    onclick="cancelTryOut('GETadmin-reports--date-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETadmin-reports--date-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>admin/reports/{date}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETadmin-reports--date-"
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
                              name="Accept"                data-endpoint="GETadmin-reports--date-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>date</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="date"                data-endpoint="GETadmin-reports--date-"
               value="architecto"
               data-component="url">
    <br>
<p>Example: <code>architecto</code></p>
            </div>
                    </form>

                    <h2 id="endpoints-GETuser-products">Display a listing of the resource.</h2>

<p>
</p>



<span id="example-requests-GETuser-products">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://127.0.0.1:8000/user/products" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8000/user/products"
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

<span id="example-responses-GETuser-products">
            <blockquote>
            <p>Example response (401):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
access-control-allow-origin: *
access-control-allow-methods: GET, POST, PUT, DELETE, OPTIONS
access-control-allow-headers: Content-Type, Authorization, X-Requested-With, X-XSRF-TOKEN
set-cookie: XSRF-TOKEN=eyJpdiI6Ijh5a2RCYjRlOVUrbTV0emRrTlVidGc9PSIsInZhbHVlIjoid0dWbW8xSXRWUmp0WDZJOHp1L2E4elFEdXloUGU1WFpLcldtSlpFcmI0SWplQm5DQ01WOGhIMUFQbzhkbmdXc2IvR2FMdlJIM0NZY3NIZDNuZkZwRm43YUNMNjZKcDBKRG1XYjc1ZnVKVnlkNEwxTVc5T0RJdTlISHBvZXZkL0EiLCJtYWMiOiI3NTZhNjEyNTkwNmE2OWRiNWJmYmMzMjM4MTJkMzdlMzRlZDRjOTNhNjY3ZGRlZDYzNWQ0N2Y1NTdjOTk2NzFmIiwidGFnIjoiIn0%3D; expires=Fri, 29 Aug 2025 06:39:49 GMT; Max-Age=7200; path=/; samesite=lax; laravel_session=eyJpdiI6InFQclpsNzBZNnQ2L2pLMUVXMlVtdkE9PSIsInZhbHVlIjoiTi9QNFhGME91dVBDbnVvZWwrN0h6OVpwZ2ZmWXoyeXpWWXZQcmI1cjZsOUo2TWRkbWJUTlBSbzRoYUJidVBCbDIvWjhhQWJLNm01azRPYnF0V09LTUJmYVZ6T25HcTN3UDgzL2luMkZXejZtZDdndnVZU0tNbnpqekVPTm9TUTAiLCJtYWMiOiIzNzc3YjM5MzZmNDI4ZWNkMmQyYjNhYTdmMTQ4MjI0MjNhNDFhMjBiMmU0YjE4ZDU1NmM2OThiMTkyMTcxYmJhIiwidGFnIjoiIn0%3D; expires=Fri, 29 Aug 2025 06:39:49 GMT; Max-Age=7200; path=/; httponly; samesite=lax
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Unauthenticated.&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETuser-products" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETuser-products"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETuser-products"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETuser-products" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETuser-products">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETuser-products" data-method="GET"
      data-path="user/products"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETuser-products', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETuser-products"
                    onclick="tryItOut('GETuser-products');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETuser-products"
                    onclick="cancelTryOut('GETuser-products');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETuser-products"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>user/products</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETuser-products"
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
                              name="Accept"                data-endpoint="GETuser-products"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="endpoints-GETuser-products--slug-">Display the specified resource.</h2>

<p>
</p>



<span id="example-requests-GETuser-products--slug-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://127.0.0.1:8000/user/products/1" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8000/user/products/1"
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

<span id="example-responses-GETuser-products--slug-">
            <blockquote>
            <p>Example response (401):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
access-control-allow-origin: *
access-control-allow-methods: GET, POST, PUT, DELETE, OPTIONS
access-control-allow-headers: Content-Type, Authorization, X-Requested-With, X-XSRF-TOKEN
set-cookie: XSRF-TOKEN=eyJpdiI6InprMzRId2EzSldQYjE3c0FWdGdHY0E9PSIsInZhbHVlIjoiTTM2L25zck9obDNlUnVzQThZNndESXF3ZEp2bmNuOURlRmgrSWZYanVxSDcrbVQxbnVZQnFJMFhQNk1UUERJK3o3Mk1uZERjaTJmdzdLRFg0bUpUNWVsWHVTU0VXbFE4WWhGWDBlZlljUzJ3NnpmUDZ2OFg0TDRYcldRaGFUSnUiLCJtYWMiOiJlY2NkNzYxNzQzYWViZDQyYjUxMWM1NjQ0M2FiZTg0NDI5YTc0NDViNjFkM2FhNTQyN2EwZWVkYWE5YzAwYzMyIiwidGFnIjoiIn0%3D; expires=Fri, 29 Aug 2025 06:39:49 GMT; Max-Age=7200; path=/; samesite=lax; laravel_session=eyJpdiI6IlpxNXhrK092QzRqdk44amlZcXBVUUE9PSIsInZhbHVlIjoiV1VBNjNWRm1TT2NoblozKzFtTU5TYWNQQkIveiswMm0rMHZkbnlscy9CUFFZRWJBc3ZyZzkzRXg1SVlxRlpNMG9pMlpPVjlEaGpaUjFteDlBeE56MStDQTNJNGtoRkMwRDRlSXRQZWN3alAyN3UwMVZxMllsSTdHN1BtdGY1cnAiLCJtYWMiOiI2OWRlMDQ5ODBlMGQ1YzNmY2Q0OGM0MmEyMDY4YmYzYjk0ZjU0YzE2NjJmMmI3OTE3N2EwZTNiZDM5OWQyNjY4IiwidGFnIjoiIn0%3D; expires=Fri, 29 Aug 2025 06:39:49 GMT; Max-Age=7200; path=/; httponly; samesite=lax
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Unauthenticated.&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETuser-products--slug-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETuser-products--slug-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETuser-products--slug-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETuser-products--slug-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETuser-products--slug-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETuser-products--slug-" data-method="GET"
      data-path="user/products/{slug}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETuser-products--slug-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETuser-products--slug-"
                    onclick="tryItOut('GETuser-products--slug-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETuser-products--slug-"
                    onclick="cancelTryOut('GETuser-products--slug-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETuser-products--slug-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>user/products/{slug}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETuser-products--slug-"
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
                              name="Accept"                data-endpoint="GETuser-products--slug-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>slug</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="slug"                data-endpoint="GETuser-products--slug-"
               value="1"
               data-component="url">
    <br>
<p>The slug of the product. Example: <code>1</code></p>
            </div>
                    </form>

                    <h2 id="endpoints-GETuser-addresses">Display a listing of the resource.</h2>

<p>
</p>



<span id="example-requests-GETuser-addresses">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://127.0.0.1:8000/user/addresses" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8000/user/addresses"
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

<span id="example-responses-GETuser-addresses">
            <blockquote>
            <p>Example response (401):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
access-control-allow-origin: *
access-control-allow-methods: GET, POST, PUT, DELETE, OPTIONS
access-control-allow-headers: Content-Type, Authorization, X-Requested-With, X-XSRF-TOKEN
set-cookie: XSRF-TOKEN=eyJpdiI6ImFtZ0RvMmNUSGJNanNwMVlEa1QrcVE9PSIsInZhbHVlIjoiSkVEVVlmS09abmFzTlVydnVaK3BSWDk4REtPclJGOWR6TTgzcG5BV0llSjUxaHFnc3ZDUUFqVWVYOWxmWE5CL2pnZWJuZHppc01RTm4rTDIvejIxS2FBQlRUWERoa1ZWL1grZ3M3NkNZL21kczlMWjRQdGZtaVVESnltSkJDYUQiLCJtYWMiOiI4NjE4MGUwM2Q2YTljYzdkM2RkOWQwNTRhNjI1MTlkZTI2NTYyZDRjMmQzZDk4ZjA5Njk1YTZlNGZiNmZhM2JkIiwidGFnIjoiIn0%3D; expires=Fri, 29 Aug 2025 06:39:49 GMT; Max-Age=7200; path=/; samesite=lax; laravel_session=eyJpdiI6Ik9aYlJTOFp0a0ljcnJvZ3pLSWxsMVE9PSIsInZhbHVlIjoiVGdrVi9QK2hJZE5MSTNPMlN4clhubXc4a0o4WUJERW42V29IUDIzTnR3eFA1L2pWenpiMjB5US9yR3BiN3Q1MkVGTjlMbjBDUncyNnR6VEpEQUdGZXMrcDFnSE1MWmEzajh3cHQxcVdYYk9mNHFMTDVIR0VEMTdUV2ZkeHF2ME8iLCJtYWMiOiI0ZTQ3ZWY4M2NlNGQ0MmMyYTA0NTMyMDMwMjUwMDExZGQ0Y2QyMTc3ODNiM2RjMzRmYmQyYTg3M2Q4N2Q4MTg2IiwidGFnIjoiIn0%3D; expires=Fri, 29 Aug 2025 06:39:49 GMT; Max-Age=7200; path=/; httponly; samesite=lax
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Unauthenticated.&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETuser-addresses" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETuser-addresses"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETuser-addresses"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETuser-addresses" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETuser-addresses">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETuser-addresses" data-method="GET"
      data-path="user/addresses"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETuser-addresses', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETuser-addresses"
                    onclick="tryItOut('GETuser-addresses');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETuser-addresses"
                    onclick="cancelTryOut('GETuser-addresses');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETuser-addresses"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>user/addresses</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETuser-addresses"
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
                              name="Accept"                data-endpoint="GETuser-addresses"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="endpoints-GETuser-addresses-create">Show the form for creating a new resource.</h2>

<p>
</p>



<span id="example-requests-GETuser-addresses-create">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://127.0.0.1:8000/user/addresses/create" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8000/user/addresses/create"
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

<span id="example-responses-GETuser-addresses-create">
            <blockquote>
            <p>Example response (401):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
access-control-allow-origin: *
access-control-allow-methods: GET, POST, PUT, DELETE, OPTIONS
access-control-allow-headers: Content-Type, Authorization, X-Requested-With, X-XSRF-TOKEN
set-cookie: XSRF-TOKEN=eyJpdiI6ImtCUlFyNW1KUzZUS3U3RVVCWkoxSlE9PSIsInZhbHVlIjoiOHB0bmoySzBNUUFpNStKL2ZPN2NaR0k3TlhydHBPOGQ4TGM5Nzd3aHFKdzQyaDRrUzFPZ1FWWDUwbWdLdDltNWZFTUtWR1hZcERlL2lCWnZjMXF5allVbjBFM0xEbDRkeHlKbVZZQTJiWDVVOHAxSUlac1FRZ0Y5ZWtzd3hHclIiLCJtYWMiOiI0ODAzYzQzYzRkYzhlNWI3YTU0OWM4YWJjMjZjNmRiMDkyNDVjMTM2OGE0ZGMyMDJlYjc4NzI4MTVlNDExNTI5IiwidGFnIjoiIn0%3D; expires=Fri, 29 Aug 2025 06:39:49 GMT; Max-Age=7200; path=/; samesite=lax; laravel_session=eyJpdiI6IlVuRFdYbW9zd2xzM3RKVFJMVjgwV3c9PSIsInZhbHVlIjoiVkl3L1Y4ZU9OUUVDWVJ1QU1wMkRvN2dXaDJOYy9nT3UzVnlKQVorOFowNjdwRjk4UlNEelVsU043Tko4Y2lBZWRmMGhZUXNBb1Zkbnh2dW9ZdDB2RFNZUm9tV3NMUUgvOHlGbEYyUlJlQXJXQUtPSFRSRGtLanRnRkt3MGRzVVgiLCJtYWMiOiI5OGVjNDBjOGQ1NGE3NTVlNWExY2MwZTc3Nzc3N2JiOGI0YWI0NTkzN2E1NDBkNDI0Y2MwMTYxZmNhNDkwY2NlIiwidGFnIjoiIn0%3D; expires=Fri, 29 Aug 2025 06:39:49 GMT; Max-Age=7200; path=/; httponly; samesite=lax
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Unauthenticated.&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETuser-addresses-create" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETuser-addresses-create"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETuser-addresses-create"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETuser-addresses-create" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETuser-addresses-create">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETuser-addresses-create" data-method="GET"
      data-path="user/addresses/create"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETuser-addresses-create', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETuser-addresses-create"
                    onclick="tryItOut('GETuser-addresses-create');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETuser-addresses-create"
                    onclick="cancelTryOut('GETuser-addresses-create');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETuser-addresses-create"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>user/addresses/create</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETuser-addresses-create"
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
                              name="Accept"                data-endpoint="GETuser-addresses-create"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="endpoints-POSTuser-addresses">Store a newly created resource in storage.</h2>

<p>
</p>



<span id="example-requests-POSTuser-addresses">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://127.0.0.1:8000/user/addresses" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"province_id\": \"architecto\",
    \"address\": \"n\",
    \"recipient_name\": \"g\",
    \"recipient_phone\": \"zmiyvdljnikhwayk\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8000/user/addresses"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "province_id": "architecto",
    "address": "n",
    "recipient_name": "g",
    "recipient_phone": "zmiyvdljnikhwayk"
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTuser-addresses">
</span>
<span id="execution-results-POSTuser-addresses" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTuser-addresses"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTuser-addresses"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTuser-addresses" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTuser-addresses">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTuser-addresses" data-method="POST"
      data-path="user/addresses"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTuser-addresses', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTuser-addresses"
                    onclick="tryItOut('POSTuser-addresses');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTuser-addresses"
                    onclick="cancelTryOut('POSTuser-addresses');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTuser-addresses"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>user/addresses</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTuser-addresses"
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
                              name="Accept"                data-endpoint="POSTuser-addresses"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>province_id</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="province_id"                data-endpoint="POSTuser-addresses"
               value="architecto"
               data-component="body">
    <br>
<p>The <code>id</code> of an existing record in the provinces table. Example: <code>architecto</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>address</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="address"                data-endpoint="POSTuser-addresses"
               value="n"
               data-component="body">
    <br>
<p>Must not be greater than 255 characters. Example: <code>n</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>recipient_name</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="recipient_name"                data-endpoint="POSTuser-addresses"
               value="g"
               data-component="body">
    <br>
<p>Must not be greater than 255 characters. Example: <code>g</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>recipient_phone</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="recipient_phone"                data-endpoint="POSTuser-addresses"
               value="zmiyvdljnikhwayk"
               data-component="body">
    <br>
<p>Must not be greater than 20 characters. Example: <code>zmiyvdljnikhwayk</code></p>
        </div>
        </form>

                    <h2 id="endpoints-GETuser-addresses--address_id--edit">Show the form for editing the specified resource.</h2>

<p>
</p>



<span id="example-requests-GETuser-addresses--address_id--edit">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://127.0.0.1:8000/user/addresses/1/edit" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8000/user/addresses/1/edit"
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

<span id="example-responses-GETuser-addresses--address_id--edit">
            <blockquote>
            <p>Example response (401):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
access-control-allow-origin: *
access-control-allow-methods: GET, POST, PUT, DELETE, OPTIONS
access-control-allow-headers: Content-Type, Authorization, X-Requested-With, X-XSRF-TOKEN
set-cookie: XSRF-TOKEN=eyJpdiI6IjV3Z0xMQUFGRU0zcGxWMk1IQUQyS0E9PSIsInZhbHVlIjoiY1ptUTdCNXZDTDM4Mm5XcHRsN0dNaUZNMHVOazNlNGpwUUsvVHFCenBlR1N2RmZsVHNBVFZ2YXVSeWhDRURCT3JobFR0MWVvRjE3MGtkNUpia1o4emtnS2NzUFN5RzFCbm1tRUh0UlNBb0dHR0JuaC9qNE1NcGdlcHA0c1hBMXgiLCJtYWMiOiJmZGIxNzk4MTIyMjVkNjA1NTJjNTA3ZTJjYzg5YjAxZGRhMGUwZjkwMTUyMWYyNGZmMjMxZDM1MjI0NDNiZDQwIiwidGFnIjoiIn0%3D; expires=Fri, 29 Aug 2025 06:39:49 GMT; Max-Age=7200; path=/; samesite=lax; laravel_session=eyJpdiI6IjYxSjlOMHdZSnRXN0E0b0ZkYW5md0E9PSIsInZhbHVlIjoiaW4wdG5yZ0tjWGREZGFwdjYyUXNrZjN1dkV4NjUxcTlZanM4UWlkRjZJbkRSei9rNEhpaEEycGt4cnUrVHlmd3FwRnlJNmlDU1ZVRUJDdEgrcDRaajFnT25wQU94SkRaeWY4QzZLcFUvMXJjNXBTMkJwbjhqakJRWmNMaHloYW8iLCJtYWMiOiJlMThlODRjNjlmY2RmOTUzYTQ4NjMwN2QwZWQ0OWJhNjUxNDMwNGEzOTlhMjRkOTQyZTdkODA5NGU1YTVjYWVkIiwidGFnIjoiIn0%3D; expires=Fri, 29 Aug 2025 06:39:49 GMT; Max-Age=7200; path=/; httponly; samesite=lax
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Unauthenticated.&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETuser-addresses--address_id--edit" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETuser-addresses--address_id--edit"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETuser-addresses--address_id--edit"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETuser-addresses--address_id--edit" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETuser-addresses--address_id--edit">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETuser-addresses--address_id--edit" data-method="GET"
      data-path="user/addresses/{address_id}/edit"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETuser-addresses--address_id--edit', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETuser-addresses--address_id--edit"
                    onclick="tryItOut('GETuser-addresses--address_id--edit');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETuser-addresses--address_id--edit"
                    onclick="cancelTryOut('GETuser-addresses--address_id--edit');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETuser-addresses--address_id--edit"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>user/addresses/{address_id}/edit</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETuser-addresses--address_id--edit"
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
                              name="Accept"                data-endpoint="GETuser-addresses--address_id--edit"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>address_id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="address_id"                data-endpoint="GETuser-addresses--address_id--edit"
               value="1"
               data-component="url">
    <br>
<p>The ID of the address. Example: <code>1</code></p>
            </div>
                    </form>

                    <h2 id="endpoints-PUTuser-addresses--id-">Update the specified resource in storage.</h2>

<p>
</p>



<span id="example-requests-PUTuser-addresses--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request PUT \
    "http://127.0.0.1:8000/user/addresses/1" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"province_id\": \"architecto\",
    \"address\": \"n\",
    \"recipient_name\": \"g\",
    \"recipient_phone\": \"zmiyvdljnikhwayk\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8000/user/addresses/1"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "province_id": "architecto",
    "address": "n",
    "recipient_name": "g",
    "recipient_phone": "zmiyvdljnikhwayk"
};

fetch(url, {
    method: "PUT",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-PUTuser-addresses--id-">
</span>
<span id="execution-results-PUTuser-addresses--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-PUTuser-addresses--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-PUTuser-addresses--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-PUTuser-addresses--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-PUTuser-addresses--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-PUTuser-addresses--id-" data-method="PUT"
      data-path="user/addresses/{id}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('PUTuser-addresses--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-PUTuser-addresses--id-"
                    onclick="tryItOut('PUTuser-addresses--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-PUTuser-addresses--id-"
                    onclick="cancelTryOut('PUTuser-addresses--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-PUTuser-addresses--id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-darkblue">PUT</small>
            <b><code>user/addresses/{id}</code></b>
        </p>
            <p>
            <small class="badge badge-purple">PATCH</small>
            <b><code>user/addresses/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="PUTuser-addresses--id-"
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
                              name="Accept"                data-endpoint="PUTuser-addresses--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="id"                data-endpoint="PUTuser-addresses--id-"
               value="1"
               data-component="url">
    <br>
<p>The ID of the address. Example: <code>1</code></p>
            </div>
                            <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>province_id</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="province_id"                data-endpoint="PUTuser-addresses--id-"
               value="architecto"
               data-component="body">
    <br>
<p>The <code>id</code> of an existing record in the provinces table. Example: <code>architecto</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>address</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="address"                data-endpoint="PUTuser-addresses--id-"
               value="n"
               data-component="body">
    <br>
<p>Must not be greater than 255 characters. Example: <code>n</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>recipient_name</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="recipient_name"                data-endpoint="PUTuser-addresses--id-"
               value="g"
               data-component="body">
    <br>
<p>Must not be greater than 255 characters. Example: <code>g</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>recipient_phone</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="recipient_phone"                data-endpoint="PUTuser-addresses--id-"
               value="zmiyvdljnikhwayk"
               data-component="body">
    <br>
<p>Must not be greater than 20 characters. Example: <code>zmiyvdljnikhwayk</code></p>
        </div>
        </form>

                    <h2 id="endpoints-DELETEuser-addresses--id-">Remove the specified resource from storage.</h2>

<p>
</p>



<span id="example-requests-DELETEuser-addresses--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request DELETE \
    "http://127.0.0.1:8000/user/addresses/1" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8000/user/addresses/1"
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

<span id="example-responses-DELETEuser-addresses--id-">
</span>
<span id="execution-results-DELETEuser-addresses--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-DELETEuser-addresses--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-DELETEuser-addresses--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-DELETEuser-addresses--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-DELETEuser-addresses--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-DELETEuser-addresses--id-" data-method="DELETE"
      data-path="user/addresses/{id}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('DELETEuser-addresses--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-DELETEuser-addresses--id-"
                    onclick="tryItOut('DELETEuser-addresses--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-DELETEuser-addresses--id-"
                    onclick="cancelTryOut('DELETEuser-addresses--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-DELETEuser-addresses--id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-red">DELETE</small>
            <b><code>user/addresses/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="DELETEuser-addresses--id-"
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
                              name="Accept"                data-endpoint="DELETEuser-addresses--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="id"                data-endpoint="DELETEuser-addresses--id-"
               value="1"
               data-component="url">
    <br>
<p>The ID of the address. Example: <code>1</code></p>
            </div>
                    </form>

                    <h2 id="endpoints-POSTuser-products--product_slug--feedbacks">POST user/products/{product_slug}/feedbacks</h2>

<p>
</p>



<span id="example-requests-POSTuser-products--product_slug--feedbacks">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://127.0.0.1:8000/user/products/1/feedbacks" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"rating\": 1,
    \"comment\": \"n\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8000/user/products/1/feedbacks"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "rating": 1,
    "comment": "n"
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTuser-products--product_slug--feedbacks">
</span>
<span id="execution-results-POSTuser-products--product_slug--feedbacks" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTuser-products--product_slug--feedbacks"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTuser-products--product_slug--feedbacks"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTuser-products--product_slug--feedbacks" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTuser-products--product_slug--feedbacks">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTuser-products--product_slug--feedbacks" data-method="POST"
      data-path="user/products/{product_slug}/feedbacks"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTuser-products--product_slug--feedbacks', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTuser-products--product_slug--feedbacks"
                    onclick="tryItOut('POSTuser-products--product_slug--feedbacks');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTuser-products--product_slug--feedbacks"
                    onclick="cancelTryOut('POSTuser-products--product_slug--feedbacks');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTuser-products--product_slug--feedbacks"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>user/products/{product_slug}/feedbacks</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTuser-products--product_slug--feedbacks"
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
                              name="Accept"                data-endpoint="POSTuser-products--product_slug--feedbacks"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>product_slug</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="product_slug"                data-endpoint="POSTuser-products--product_slug--feedbacks"
               value="1"
               data-component="url">
    <br>
<p>The slug of the product. Example: <code>1</code></p>
            </div>
                            <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>rating</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="rating"                data-endpoint="POSTuser-products--product_slug--feedbacks"
               value="1"
               data-component="body">
    <br>
<p>Must be at least 1. Must not be greater than 5. Example: <code>1</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>comment</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="text" style="display: none"
                              name="comment"                data-endpoint="POSTuser-products--product_slug--feedbacks"
               value="n"
               data-component="body">
    <br>
<p>Must not be greater than 100 characters. Example: <code>n</code></p>
        </div>
        </form>

                    <h2 id="endpoints-PUTuser-products--product_slug--feedbacks--feedback_id-">PUT user/products/{product_slug}/feedbacks/{feedback_id}</h2>

<p>
</p>



<span id="example-requests-PUTuser-products--product_slug--feedbacks--feedback_id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request PUT \
    "http://127.0.0.1:8000/user/products/1/feedbacks/1" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"rating\": 1,
    \"comment\": \"n\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8000/user/products/1/feedbacks/1"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "rating": 1,
    "comment": "n"
};

fetch(url, {
    method: "PUT",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-PUTuser-products--product_slug--feedbacks--feedback_id-">
</span>
<span id="execution-results-PUTuser-products--product_slug--feedbacks--feedback_id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-PUTuser-products--product_slug--feedbacks--feedback_id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-PUTuser-products--product_slug--feedbacks--feedback_id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-PUTuser-products--product_slug--feedbacks--feedback_id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-PUTuser-products--product_slug--feedbacks--feedback_id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-PUTuser-products--product_slug--feedbacks--feedback_id-" data-method="PUT"
      data-path="user/products/{product_slug}/feedbacks/{feedback_id}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('PUTuser-products--product_slug--feedbacks--feedback_id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-PUTuser-products--product_slug--feedbacks--feedback_id-"
                    onclick="tryItOut('PUTuser-products--product_slug--feedbacks--feedback_id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-PUTuser-products--product_slug--feedbacks--feedback_id-"
                    onclick="cancelTryOut('PUTuser-products--product_slug--feedbacks--feedback_id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-PUTuser-products--product_slug--feedbacks--feedback_id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-darkblue">PUT</small>
            <b><code>user/products/{product_slug}/feedbacks/{feedback_id}</code></b>
        </p>
            <p>
            <small class="badge badge-purple">PATCH</small>
            <b><code>user/products/{product_slug}/feedbacks/{feedback_id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="PUTuser-products--product_slug--feedbacks--feedback_id-"
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
                              name="Accept"                data-endpoint="PUTuser-products--product_slug--feedbacks--feedback_id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>product_slug</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="product_slug"                data-endpoint="PUTuser-products--product_slug--feedbacks--feedback_id-"
               value="1"
               data-component="url">
    <br>
<p>The slug of the product. Example: <code>1</code></p>
            </div>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>feedback_id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="feedback_id"                data-endpoint="PUTuser-products--product_slug--feedbacks--feedback_id-"
               value="1"
               data-component="url">
    <br>
<p>The ID of the feedback. Example: <code>1</code></p>
            </div>
                            <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>rating</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="rating"                data-endpoint="PUTuser-products--product_slug--feedbacks--feedback_id-"
               value="1"
               data-component="body">
    <br>
<p>Must be at least 1. Must not be greater than 5. Example: <code>1</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>comment</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="text" style="display: none"
                              name="comment"                data-endpoint="PUTuser-products--product_slug--feedbacks--feedback_id-"
               value="n"
               data-component="body">
    <br>
<p>Must not be greater than 100 characters. Example: <code>n</code></p>
        </div>
        </form>

                    <h2 id="endpoints-DELETEuser-products--product_slug--feedbacks--feedback_id-">DELETE user/products/{product_slug}/feedbacks/{feedback_id}</h2>

<p>
</p>



<span id="example-requests-DELETEuser-products--product_slug--feedbacks--feedback_id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request DELETE \
    "http://127.0.0.1:8000/user/products/1/feedbacks/1" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8000/user/products/1/feedbacks/1"
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

<span id="example-responses-DELETEuser-products--product_slug--feedbacks--feedback_id-">
</span>
<span id="execution-results-DELETEuser-products--product_slug--feedbacks--feedback_id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-DELETEuser-products--product_slug--feedbacks--feedback_id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-DELETEuser-products--product_slug--feedbacks--feedback_id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-DELETEuser-products--product_slug--feedbacks--feedback_id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-DELETEuser-products--product_slug--feedbacks--feedback_id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-DELETEuser-products--product_slug--feedbacks--feedback_id-" data-method="DELETE"
      data-path="user/products/{product_slug}/feedbacks/{feedback_id}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('DELETEuser-products--product_slug--feedbacks--feedback_id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-DELETEuser-products--product_slug--feedbacks--feedback_id-"
                    onclick="tryItOut('DELETEuser-products--product_slug--feedbacks--feedback_id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-DELETEuser-products--product_slug--feedbacks--feedback_id-"
                    onclick="cancelTryOut('DELETEuser-products--product_slug--feedbacks--feedback_id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-DELETEuser-products--product_slug--feedbacks--feedback_id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-red">DELETE</small>
            <b><code>user/products/{product_slug}/feedbacks/{feedback_id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="DELETEuser-products--product_slug--feedbacks--feedback_id-"
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
                              name="Accept"                data-endpoint="DELETEuser-products--product_slug--feedbacks--feedback_id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>product_slug</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="product_slug"                data-endpoint="DELETEuser-products--product_slug--feedbacks--feedback_id-"
               value="1"
               data-component="url">
    <br>
<p>The slug of the product. Example: <code>1</code></p>
            </div>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>feedback_id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="feedback_id"                data-endpoint="DELETEuser-products--product_slug--feedbacks--feedback_id-"
               value="1"
               data-component="url">
    <br>
<p>The ID of the feedback. Example: <code>1</code></p>
            </div>
                    </form>

                    <h2 id="endpoints-GETcart">GET cart</h2>

<p>
</p>



<span id="example-requests-GETcart">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://127.0.0.1:8000/cart" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8000/cart"
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

<span id="example-responses-GETcart">
            <blockquote>
            <p>Example response (401):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
access-control-allow-origin: *
access-control-allow-methods: GET, POST, PUT, DELETE, OPTIONS
access-control-allow-headers: Content-Type, Authorization, X-Requested-With, X-XSRF-TOKEN
set-cookie: XSRF-TOKEN=eyJpdiI6ImtGcGNJbDZmdkROUHF5UHZaTlZVSUE9PSIsInZhbHVlIjoiS0t0eWlKazhOT0FQWWZTNUVob3NoZ1hIb2cxQnh0WnFOd3cybTZjclNwcDFOeEFBWGdQWGNRSEJaNXZNSzJENmlCWm10NHlVWExTdUJNTW1vMFg1TEI1bW4wTlJ3MlIwWHhHSFNrZVhWNk1ORjRKSkgvcjVoYkRnN0EzT0hmRVQiLCJtYWMiOiJmN2M1OGNmMDk1NDYzNGRiYzk4Njc1MzQ1YTdhYzAxY2RhOGZlOWE1MzEyMzdiMDcyYTE0OTM3YmQ0MGNhNDg5IiwidGFnIjoiIn0%3D; expires=Fri, 29 Aug 2025 06:39:49 GMT; Max-Age=7200; path=/; samesite=lax; laravel_session=eyJpdiI6IkJrMVBCK08rMkhnNU1PWU5VVTcwTnc9PSIsInZhbHVlIjoiRHFZVWdQajQzRXZKZ1JPM3dBN2FkZG0xdVZXZnNxNEY5bW4reFBoOFhxdURJcnhzSXI1YWdwZGFYVHZzTUlWa2dsdzBBdlpCcEpvWkdPenZ3bUhzbFhMdldxVWpHT1RCUGtHVG9KMU1mUFBIYjlxc3liMVk2MHdnVU1meDV4cXciLCJtYWMiOiI2OTk1NjAzNzRjYWViOGY0NGU3OWY2YzVlYzNhNGM5MDNhZDMxZGUwYjI1MGJlOGVjNWM0ODdkNzJhNjMyMTQ4IiwidGFnIjoiIn0%3D; expires=Fri, 29 Aug 2025 06:39:49 GMT; Max-Age=7200; path=/; httponly; samesite=lax
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Unauthenticated.&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETcart" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETcart"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETcart"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETcart" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETcart">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETcart" data-method="GET"
      data-path="cart"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETcart', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETcart"
                    onclick="tryItOut('GETcart');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETcart"
                    onclick="cancelTryOut('GETcart');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETcart"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>cart</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETcart"
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
                              name="Accept"                data-endpoint="GETcart"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="endpoints-GETcart-add--id-">GET cart/add/{id}</h2>

<p>
</p>



<span id="example-requests-GETcart-add--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://127.0.0.1:8000/cart/add/architecto" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8000/cart/add/architecto"
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

<span id="example-responses-GETcart-add--id-">
            <blockquote>
            <p>Example response (401):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
access-control-allow-origin: *
access-control-allow-methods: GET, POST, PUT, DELETE, OPTIONS
access-control-allow-headers: Content-Type, Authorization, X-Requested-With, X-XSRF-TOKEN
set-cookie: XSRF-TOKEN=eyJpdiI6InQ4YVdSb0l6UTROeDJ5ZkJtWlR4R1E9PSIsInZhbHVlIjoiZEl4eU1na0ZaaFkydi85aXBJQlFvc2t4MDFVQkpxaE9uUlNRa1UwNjUrUUhlWCtoVlQrUWJRNUxKTTZTQ0wwalZidkVUYklRSUNvNVkweEUyR0k0eEJ4bnFTZUtCem96Y09yM1g0QUoxRE9UZTRwRm5rR2dxUUt0NVZnWlFzUHIiLCJtYWMiOiI2MTIzZjA4ZTc1Y2Q2M2ZjMWE5ZTNiMzU1ZDliN2UyMDJlZjc5YWYxOTYxNjQwZDkyNjEyMjI4YzNmOThkY2Q5IiwidGFnIjoiIn0%3D; expires=Fri, 29 Aug 2025 06:39:49 GMT; Max-Age=7200; path=/; samesite=lax; laravel_session=eyJpdiI6Ikt1NEZaWmdMWlJMdVF6bk9ueDdQelE9PSIsInZhbHVlIjoiaWE3bVI3blo4aWFpWXN4NTBEcXIvRm5iQm92SzlxMjNwR1pLYktrc1VrVTU4Tm40QjdFNGVpVjRTdWpOU3dzdWQ1U0lNeHNHU3ZxMHlvTjFPQlprZVZ3YWNuZWFIck5NbFo5Y3U0d2dtQWdLY3h1eHU4WEt4KzhTUnBhT1hvOHIiLCJtYWMiOiJiZmU0OGU0MTQ5YzY4ZGM3MTI5YWQwOTIwNGY3OTRkYjJjM2JlYWU4NmU4NjRjZmQ1OWNmYzVkMzVhZWMyZDU0IiwidGFnIjoiIn0%3D; expires=Fri, 29 Aug 2025 06:39:49 GMT; Max-Age=7200; path=/; httponly; samesite=lax
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Unauthenticated.&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETcart-add--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETcart-add--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETcart-add--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETcart-add--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETcart-add--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETcart-add--id-" data-method="GET"
      data-path="cart/add/{id}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETcart-add--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETcart-add--id-"
                    onclick="tryItOut('GETcart-add--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETcart-add--id-"
                    onclick="cancelTryOut('GETcart-add--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETcart-add--id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>cart/add/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETcart-add--id-"
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
                              name="Accept"                data-endpoint="GETcart-add--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="id"                data-endpoint="GETcart-add--id-"
               value="architecto"
               data-component="url">
    <br>
<p>The ID of the add. Example: <code>architecto</code></p>
            </div>
                    </form>

                    <h2 id="endpoints-POSTcart-update--id-">POST cart/update/{id}</h2>

<p>
</p>



<span id="example-requests-POSTcart-update--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://127.0.0.1:8000/cart/update/architecto" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8000/cart/update/architecto"
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

<span id="example-responses-POSTcart-update--id-">
</span>
<span id="execution-results-POSTcart-update--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTcart-update--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTcart-update--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTcart-update--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTcart-update--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTcart-update--id-" data-method="POST"
      data-path="cart/update/{id}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTcart-update--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTcart-update--id-"
                    onclick="tryItOut('POSTcart-update--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTcart-update--id-"
                    onclick="cancelTryOut('POSTcart-update--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTcart-update--id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>cart/update/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTcart-update--id-"
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
                              name="Accept"                data-endpoint="POSTcart-update--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="id"                data-endpoint="POSTcart-update--id-"
               value="architecto"
               data-component="url">
    <br>
<p>The ID of the update. Example: <code>architecto</code></p>
            </div>
                    </form>

                    <h2 id="endpoints-DELETEcart-remove--id-">DELETE cart/remove/{id}</h2>

<p>
</p>



<span id="example-requests-DELETEcart-remove--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request DELETE \
    "http://127.0.0.1:8000/cart/remove/architecto" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8000/cart/remove/architecto"
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

<span id="example-responses-DELETEcart-remove--id-">
</span>
<span id="execution-results-DELETEcart-remove--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-DELETEcart-remove--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-DELETEcart-remove--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-DELETEcart-remove--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-DELETEcart-remove--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-DELETEcart-remove--id-" data-method="DELETE"
      data-path="cart/remove/{id}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('DELETEcart-remove--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-DELETEcart-remove--id-"
                    onclick="tryItOut('DELETEcart-remove--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-DELETEcart-remove--id-"
                    onclick="cancelTryOut('DELETEcart-remove--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-DELETEcart-remove--id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-red">DELETE</small>
            <b><code>cart/remove/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="DELETEcart-remove--id-"
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
                              name="Accept"                data-endpoint="DELETEcart-remove--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="id"                data-endpoint="DELETEcart-remove--id-"
               value="architecto"
               data-component="url">
    <br>
<p>The ID of the remove. Example: <code>architecto</code></p>
            </div>
                    </form>

                    <h2 id="endpoints-GETcheckout">Hiển thị form thanh toán</h2>

<p>
</p>



<span id="example-requests-GETcheckout">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://127.0.0.1:8000/checkout" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8000/checkout"
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

<span id="example-responses-GETcheckout">
            <blockquote>
            <p>Example response (401):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
access-control-allow-origin: *
access-control-allow-methods: GET, POST, PUT, DELETE, OPTIONS
access-control-allow-headers: Content-Type, Authorization, X-Requested-With, X-XSRF-TOKEN
set-cookie: XSRF-TOKEN=eyJpdiI6ImRlcEV3dVZiMjJtZGRsL0ZGQXVSVEE9PSIsInZhbHVlIjoiVnhSWlVxSC82NVVoMXh3RFRlN21CT3hGM0hOTXAwQkt6UkVFSHk1SU0vSStjV0I1NHIySWE2bmdCN3V5d3FibGFGVDJkcmV5UzJqWURjQjJ4RHBwTzlJMmFEN1FNVzQ0NGZZMlAyWTEzeGphVUt6Lzk2amJqNkxiempzaG5aQ2UiLCJtYWMiOiJmMTU0NWI3NjJmZWVlZjJkZTAzYTk5NzRhODEyMzdmODc3YzA5NzUwZjI3YjBiZTMwNTVkMTgwYmE3Y2Y0MDcwIiwidGFnIjoiIn0%3D; expires=Fri, 29 Aug 2025 06:39:50 GMT; Max-Age=7200; path=/; samesite=lax; laravel_session=eyJpdiI6IjEyMkxDc2xPTytFVDYyZ2RwZ0JrTFE9PSIsInZhbHVlIjoiVzA2MW56N3QrRDVYZjF3cjRZL0VmclNzQ3k5OHFnbytZQXdGZnc3aXZsd3ZoUmsxUGZZTzJ4S1pISHU2VUN1T09KMFlSQUJpWVEweks2c2c4ZFNXOW42UUExeldPVmN3QjBDZ2N3eXVRcXhJbHc3M0JPVU1TdkFiY2dmc0lzVTQiLCJtYWMiOiI5MzgyNWMxNDViZDhlMGI3N2YyYjg3ZGE2NjA5N2VjZDgzMjdmNDVmNDNmYjQ0ZWYyZDNjODUxODEzYmNmOTg5IiwidGFnIjoiIn0%3D; expires=Fri, 29 Aug 2025 06:39:50 GMT; Max-Age=7200; path=/; httponly; samesite=lax
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Unauthenticated.&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETcheckout" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETcheckout"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETcheckout"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETcheckout" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETcheckout">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETcheckout" data-method="GET"
      data-path="checkout"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETcheckout', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETcheckout"
                    onclick="tryItOut('GETcheckout');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETcheckout"
                    onclick="cancelTryOut('GETcheckout');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETcheckout"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>checkout</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETcheckout"
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
                              name="Accept"                data-endpoint="GETcheckout"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="endpoints-POSTcheckout">Xử lý đặt hàng</h2>

<p>
</p>



<span id="example-requests-POSTcheckout">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://127.0.0.1:8000/checkout" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"recipient_name\": \"b\",
    \"recipient_email\": \"zbailey@example.net\",
    \"recipient_phone\": \"iyvdljnikhwaykcm\",
    \"province_id\": \"architecto\",
    \"shipping_address\": \"n\",
    \"payment_method\": \"g\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8000/checkout"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "recipient_name": "b",
    "recipient_email": "zbailey@example.net",
    "recipient_phone": "iyvdljnikhwaykcm",
    "province_id": "architecto",
    "shipping_address": "n",
    "payment_method": "g"
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTcheckout">
</span>
<span id="execution-results-POSTcheckout" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTcheckout"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTcheckout"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTcheckout" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTcheckout">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTcheckout" data-method="POST"
      data-path="checkout"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTcheckout', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTcheckout"
                    onclick="tryItOut('POSTcheckout');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTcheckout"
                    onclick="cancelTryOut('POSTcheckout');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTcheckout"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>checkout</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTcheckout"
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
                              name="Accept"                data-endpoint="POSTcheckout"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>recipient_name</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="recipient_name"                data-endpoint="POSTcheckout"
               value="b"
               data-component="body">
    <br>
<p>Must not be greater than 255 characters. Example: <code>b</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>recipient_email</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="recipient_email"                data-endpoint="POSTcheckout"
               value="zbailey@example.net"
               data-component="body">
    <br>
<p>Must be a valid email address. Must not be greater than 255 characters. Example: <code>zbailey@example.net</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>recipient_phone</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="recipient_phone"                data-endpoint="POSTcheckout"
               value="iyvdljnikhwaykcm"
               data-component="body">
    <br>
<p>Must not be greater than 20 characters. Example: <code>iyvdljnikhwaykcm</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>province_id</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="province_id"                data-endpoint="POSTcheckout"
               value="architecto"
               data-component="body">
    <br>
<p>The <code>id</code> of an existing record in the provinces table. Example: <code>architecto</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>shipping_address</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="shipping_address"                data-endpoint="POSTcheckout"
               value="n"
               data-component="body">
    <br>
<p>Must not be greater than 255 characters. Example: <code>n</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>payment_method</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="payment_method"                data-endpoint="POSTcheckout"
               value="g"
               data-component="body">
    <br>
<p>Must not be greater than 50 characters. Example: <code>g</code></p>
        </div>
        </form>

                    <h2 id="endpoints-GETorders--id-">GET orders/{id}</h2>

<p>
</p>



<span id="example-requests-GETorders--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://127.0.0.1:8000/orders/1" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8000/orders/1"
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

<span id="example-responses-GETorders--id-">
            <blockquote>
            <p>Example response (401):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
access-control-allow-origin: *
access-control-allow-methods: GET, POST, PUT, DELETE, OPTIONS
access-control-allow-headers: Content-Type, Authorization, X-Requested-With, X-XSRF-TOKEN
set-cookie: XSRF-TOKEN=eyJpdiI6IlZKMkZwQ0lqR0J0YzJPeDlnTC85ekE9PSIsInZhbHVlIjoiUWNCT04yWUxET29DMjF4czA3aUZxaGxKS0srQ25ueEovNXVKaDNVMmRFTlZJb2JNNG9nMFFIQUVTZ0xLcmoreEUydG02ZFcyeUJCK1FKa0NXb0doVnl5dm5KNGEwTVRlWE5XbjI1VGZ6R2RzQ2dBUmlibzdTMWFQc0FqMU9JdFkiLCJtYWMiOiJjYjgwNWQ3NzE0NjE1NzhjMjU1NmQzODUzOGQ1NDViMGNiODQ4MTM2NDk4YTlhMjFjMDFmNDk0Njg1MGY5ZDIzIiwidGFnIjoiIn0%3D; expires=Fri, 29 Aug 2025 06:39:50 GMT; Max-Age=7200; path=/; samesite=lax; laravel_session=eyJpdiI6InhUWnM4K1FvbUd6TWlHN2haOXRRaHc9PSIsInZhbHVlIjoicnM5Z2xnMkovaHp1Q0EyWkxvSzdUd2ZYVHFnNkZkL3ZJNWV6T2ZMcURnTjFvK0NkbG42RE5Nd0k3OTV4TUdkSHVTUEZab0FJV29ONFRtazlYMFVGU09rN2N3LzRqekFnamNSUEhwOFZCcDNGa25vR2F6Tmd5VjRnbGNuVml3QnUiLCJtYWMiOiI5NDFkZGNjN2I5OTk3ZTYzN2NkYzE4Y2M5ZDAwN2NjMTFkMWZmYmI1NjU1OGI3YTNlOWVhNjMxYmQ5MTc0MDc5IiwidGFnIjoiIn0%3D; expires=Fri, 29 Aug 2025 06:39:50 GMT; Max-Age=7200; path=/; httponly; samesite=lax
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Unauthenticated.&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETorders--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETorders--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETorders--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETorders--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETorders--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETorders--id-" data-method="GET"
      data-path="orders/{id}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETorders--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETorders--id-"
                    onclick="tryItOut('GETorders--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETorders--id-"
                    onclick="cancelTryOut('GETorders--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETorders--id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>orders/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETorders--id-"
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
                              name="Accept"                data-endpoint="GETorders--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="id"                data-endpoint="GETorders--id-"
               value="1"
               data-component="url">
    <br>
<p>The ID of the order. Example: <code>1</code></p>
            </div>
                    </form>

                    <h2 id="endpoints-GETorders">GET orders</h2>

<p>
</p>



<span id="example-requests-GETorders">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://127.0.0.1:8000/orders" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8000/orders"
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

<span id="example-responses-GETorders">
            <blockquote>
            <p>Example response (401):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
access-control-allow-origin: *
access-control-allow-methods: GET, POST, PUT, DELETE, OPTIONS
access-control-allow-headers: Content-Type, Authorization, X-Requested-With, X-XSRF-TOKEN
set-cookie: XSRF-TOKEN=eyJpdiI6IkhyZXpGcFE5OHdwdkFjRlU0d000Rnc9PSIsInZhbHVlIjoiSTVJYThWaThPQzhoYVBvaTNUaE0rSXAxWVdFbDBTbTRLaUNzd05ZcXJQeVFtRGZYanRyQ3VJbXdnQUVZN281NVIvVEtQVnlGL1ZhQUV3QkhvZWFDdU16NkphR2JPWFdPcGh2T0FLeHdHVE9saHZxTG5NOFpHZCsvNWc4ZHJRNWwiLCJtYWMiOiI5YzFiYmY1NzBlYjdjNjQ1YjE1NjlhZTdjMDlhMzA5Y2E5OTg2MmE0YWFiYmQyOWMyODYzN2U2NDkyNWI2NmEzIiwidGFnIjoiIn0%3D; expires=Fri, 29 Aug 2025 06:39:50 GMT; Max-Age=7200; path=/; samesite=lax; laravel_session=eyJpdiI6InVocVVXbjZkL2hXZGN1V0prU1VGVXc9PSIsInZhbHVlIjoiTUFhZm1LSXU0YW1VdXV6RTA0WDJPT2crUDlCR00zQ3REWDJibnRRSzRJZVRPUjhvSG9OS0tLM0pPNW84ME9nVi9vSlRqcDBpZmNzKzFFaTZwdld4Q2lMaSt3clFwemdtWUo2MWFELzF5NHI3dFAxdXpoZFEyQi84N3dITkMvTUQiLCJtYWMiOiI1N2EzY2ZlMWY2ZGY2NmZlNDY4Mjg4ZTI2ZTgxNzBkNTg0ODZlZGMyNjZhNjYxN2UyNWMzMmQzYmIzMWY0NGZkIiwidGFnIjoiIn0%3D; expires=Fri, 29 Aug 2025 06:39:50 GMT; Max-Age=7200; path=/; httponly; samesite=lax
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Unauthenticated.&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETorders" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETorders"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETorders"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETorders" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETorders">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETorders" data-method="GET"
      data-path="orders"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETorders', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETorders"
                    onclick="tryItOut('GETorders');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETorders"
                    onclick="cancelTryOut('GETorders');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETorders"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>orders</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETorders"
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
                              name="Accept"                data-endpoint="GETorders"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="endpoints-GETregister">Display the registration view.</h2>

<p>
</p>



<span id="example-requests-GETregister">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://127.0.0.1:8000/register" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8000/register"
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

<span id="example-responses-GETregister">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">content-type: text/html; charset=UTF-8
cache-control: no-cache, private
access-control-allow-origin: *
access-control-allow-methods: GET, POST, PUT, DELETE, OPTIONS
access-control-allow-headers: Content-Type, Authorization, X-Requested-With, X-XSRF-TOKEN
set-cookie: app_locale=eyJpdiI6Ik1hSnZtMDlCMllvSjFibFREVkswV0E9PSIsInZhbHVlIjoiWGxEZVJnc0xLcEVFUys4cndld2hXeFhndVVueTk4R0dPajdWMFozVGRKYWgxaG9QVEcyQjdMTTJmalB4aW5XZSIsIm1hYyI6ImM0N2FlNDEwNzMwZWFhODFmMGNiY2Y3NGJmZjZjMjY1ZTNkMzgyN2YxYzQ1ZWQ3YWRhZTNkMTZhZmQyZjA2NWUiLCJ0YWciOiIifQ%3D%3D; expires=Sat, 29 Aug 2026 04:39:52 GMT; Max-Age=31536000; path=/; httponly; samesite=lax; XSRF-TOKEN=eyJpdiI6Ink0Sk5wQVMwamhJSCswK0VKbEh0d0E9PSIsInZhbHVlIjoiVHlHNXRialJkUllWVUtMOFRJb05HSG9oVi9EWk8zV0M2aUdlMGtGSi9EdzdpSmRDWVA3MXFEVUt2L3Rkc2FwM0lxeTVWa1RGUXlab3l1QWkyWWFRRFo1RTIyOGFzTUZhMklLL3lva0VGTjFyTkFBam5zOFk2emlEdWxhbjN1STAiLCJtYWMiOiIzMzUwYzMyN2U4NDY3NDJhNzNhZWM3OWExYWYwMWNhNWQxMjRhNWIwZDUyMzBiNDdiNmFmZjIyMDBhYzU1M2EwIiwidGFnIjoiIn0%3D; expires=Fri, 29 Aug 2025 06:39:52 GMT; Max-Age=7200; path=/; samesite=lax; laravel_session=eyJpdiI6Ik41N0Z1WmppRGhHNGFjb0Q3RWRFNnc9PSIsInZhbHVlIjoiMldZSUF6Y0N1YXVYWGFDa3orcndVd2xPZ0dZQmhMUGY3Y05iNDlyTEgxcmVIKytxdWpkcEdEbmVXME5nbHlKMGsyN2NZMW9WbnNtZUtxeGQ0bUtvQVI5S0l1Q3BhUnJ6WGtlRjJrZDM5dmJBbmFJTDdINjA4OFh2SmpCUDV3QWYiLCJtYWMiOiIwZWMxODEwZDY1ZTFiNzEwOGI4Mzc5N2ZmMWJmN2QyZWE2NGY1NzU5ZTM4YzUzYzZhM2QwNDczNTJkYzVkYTE1IiwidGFnIjoiIn0%3D; expires=Fri, 29 Aug 2025 06:39:52 GMT; Max-Age=7200; path=/; httponly; samesite=lax
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">&lt;!DOCTYPE html&gt;
&lt;html lang=&quot;en&quot;&gt;
    &lt;head&gt;
        &lt;meta charset=&quot;utf-8&quot;&gt;
        &lt;meta name=&quot;viewport&quot; content=&quot;width=device-width, initial-scale=1&quot;&gt;
        &lt;meta name=&quot;csrf-token&quot; content=&quot;9JmvuZzeHMVyLnRsRrnjduBFPhjXniKDFGsDcrij&quot;&gt;

        &lt;title&gt;Laravel&lt;/title&gt;

        &lt;!-- Fonts --&gt;
        &lt;link rel=&quot;preconnect&quot; href=&quot;https://fonts.bunny.net&quot;&gt;
        &lt;link href=&quot;https://fonts.bunny.net/css?family=figtree:400,500,600&amp;display=swap&quot; rel=&quot;stylesheet&quot; /&gt;

        &lt;!-- Scripts --&gt;
        &lt;link rel=&quot;preload&quot; as=&quot;style&quot; href=&quot;http://127.0.0.1:8000/build/assets/app-GHg_Xo9N.css&quot; /&gt;&lt;link rel=&quot;modulepreload&quot; as=&quot;script&quot; href=&quot;http://127.0.0.1:8000/build/assets/app-DtCVKgHt.js&quot; /&gt;&lt;link rel=&quot;stylesheet&quot; href=&quot;http://127.0.0.1:8000/build/assets/app-GHg_Xo9N.css&quot; /&gt;&lt;script type=&quot;module&quot; src=&quot;http://127.0.0.1:8000/build/assets/app-DtCVKgHt.js&quot;&gt;&lt;/script&gt;    &lt;/head&gt;
    &lt;body class=&quot;font-sans text-gray-900 antialiased&quot;&gt;
        &lt;div class=&quot;min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100&quot;&gt;
            &lt;div&gt;
                &lt;a href=&quot;/&quot;&gt;
                    &lt;svg viewBox=&quot;0 0 316 316&quot; xmlns=&quot;http://www.w3.org/2000/svg&quot; class=&quot;w-20 h-20 fill-current text-gray-500&quot;&gt;
    &lt;path d=&quot;M305.8 81.125C305.77 80.995 305.69 80.885 305.65 80.755C305.56 80.525 305.49 80.285 305.37 80.075C305.29 79.935 305.17 79.815 305.07 79.685C304.94 79.515 304.83 79.325 304.68 79.175C304.55 79.045 304.39 78.955 304.25 78.845C304.09 78.715 303.95 78.575 303.77 78.475L251.32 48.275C249.97 47.495 248.31 47.495 246.96 48.275L194.51 78.475C194.33 78.575 194.19 78.725 194.03 78.845C193.89 78.955 193.73 79.045 193.6 79.175C193.45 79.325 193.34 79.515 193.21 79.685C193.11 79.815 192.99 79.935 192.91 80.075C192.79 80.285 192.71 80.525 192.63 80.755C192.58 80.875 192.51 80.995 192.48 81.125C192.38 81.495 192.33 81.875 192.33 82.265V139.625L148.62 164.795V52.575C148.62 52.185 148.57 51.805 148.47 51.435C148.44 51.305 148.36 51.195 148.32 51.065C148.23 50.835 148.16 50.595 148.04 50.385C147.96 50.245 147.84 50.125 147.74 49.995C147.61 49.825 147.5 49.635 147.35 49.485C147.22 49.355 147.06 49.265 146.92 49.155C146.76 49.025 146.62 48.885 146.44 48.785L93.99 18.585C92.64 17.805 90.98 17.805 89.63 18.585L37.18 48.785C37 48.885 36.86 49.035 36.7 49.155C36.56 49.265 36.4 49.355 36.27 49.485C36.12 49.635 36.01 49.825 35.88 49.995C35.78 50.125 35.66 50.245 35.58 50.385C35.46 50.595 35.38 50.835 35.3 51.065C35.25 51.185 35.18 51.305 35.15 51.435C35.05 51.805 35 52.185 35 52.575V232.235C35 233.795 35.84 235.245 37.19 236.025L142.1 296.425C142.33 296.555 142.58 296.635 142.82 296.725C142.93 296.765 143.04 296.835 143.16 296.865C143.53 296.965 143.9 297.015 144.28 297.015C144.66 297.015 145.03 296.965 145.4 296.865C145.5 296.835 145.59 296.775 145.69 296.745C145.95 296.655 146.21 296.565 146.45 296.435L251.36 236.035C252.72 235.255 253.55 233.815 253.55 232.245V174.885L303.81 145.945C305.17 145.165 306 143.725 306 142.155V82.265C305.95 81.875 305.89 81.495 305.8 81.125ZM144.2 227.205L100.57 202.515L146.39 176.135L196.66 147.195L240.33 172.335L208.29 190.625L144.2 227.205ZM244.75 114.995V164.795L226.39 154.225L201.03 139.625V89.825L219.39 100.395L244.75 114.995ZM249.12 57.105L292.81 82.265L249.12 107.425L205.43 82.265L249.12 57.105ZM114.49 184.425L96.13 194.995V85.305L121.49 70.705L139.85 60.135V169.815L114.49 184.425ZM91.76 27.425L135.45 52.585L91.76 77.745L48.07 52.585L91.76 27.425ZM43.67 60.135L62.03 70.705L87.39 85.305V202.545V202.555V202.565C87.39 202.735 87.44 202.895 87.46 203.055C87.49 203.265 87.49 203.485 87.55 203.695V203.705C87.6 203.875 87.69 204.035 87.76 204.195C87.84 204.375 87.89 204.575 87.99 204.745C87.99 204.745 87.99 204.755 88 204.755C88.09 204.905 88.22 205.035 88.33 205.175C88.45 205.335 88.55 205.495 88.69 205.635L88.7 205.645C88.82 205.765 88.98 205.855 89.12 205.965C89.28 206.085 89.42 206.225 89.59 206.325C89.6 206.325 89.6 206.325 89.61 206.335C89.62 206.335 89.62 206.345 89.63 206.345L139.87 234.775V285.065L43.67 229.705V60.135ZM244.75 229.705L148.58 285.075V234.775L219.8 194.115L244.75 179.875V229.705ZM297.2 139.625L253.49 164.795V114.995L278.85 100.395L297.21 89.825V139.625H297.2Z&quot;/&gt;
&lt;/svg&gt;
                &lt;/a&gt;
            &lt;/div&gt;

            &lt;div class=&quot;w-full sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg&quot;&gt;
                &lt;form method=&quot;POST&quot; action=&quot;http://127.0.0.1:8000/register&quot;&gt;
        &lt;input type=&quot;hidden&quot; name=&quot;_token&quot; value=&quot;9JmvuZzeHMVyLnRsRrnjduBFPhjXniKDFGsDcrij&quot; autocomplete=&quot;off&quot;&gt;
        &lt;!-- Name --&gt;
        &lt;div&gt;
            &lt;label class=&quot;block font-medium text-sm text-gray-700&quot; for=&quot;name&quot;&gt;
    Name
&lt;/label&gt;
            &lt;input  class=&quot;border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm block mt-1 w-full&quot; id=&quot;name&quot; type=&quot;text&quot; name=&quot;name&quot; required=&quot;required&quot; autofocus=&quot;autofocus&quot; autocomplete=&quot;name&quot;&gt;
                    &lt;/div&gt;

        &lt;!-- Email Address --&gt;
        &lt;div class=&quot;mt-4&quot;&gt;
            &lt;label class=&quot;block font-medium text-sm text-gray-700&quot; for=&quot;email&quot;&gt;
    Email
&lt;/label&gt;
            &lt;input  class=&quot;border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm block mt-1 w-full&quot; id=&quot;email&quot; type=&quot;email&quot; name=&quot;email&quot; required=&quot;required&quot; autocomplete=&quot;username&quot;&gt;
                    &lt;/div&gt;

        &lt;!-- Password --&gt;
        &lt;div class=&quot;mt-4&quot;&gt;
            &lt;label class=&quot;block font-medium text-sm text-gray-700&quot; for=&quot;password&quot;&gt;
    Password
&lt;/label&gt;

            &lt;input  class=&quot;border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm block mt-1 w-full&quot; id=&quot;password&quot; type=&quot;password&quot; name=&quot;password&quot; required=&quot;required&quot; autocomplete=&quot;new-password&quot;&gt;

                    &lt;/div&gt;

        &lt;!-- Confirm Password --&gt;
        &lt;div class=&quot;mt-4&quot;&gt;
            &lt;label class=&quot;block font-medium text-sm text-gray-700&quot; for=&quot;password_confirmation&quot;&gt;
    Confirm Password
&lt;/label&gt;

            &lt;input  class=&quot;border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm block mt-1 w-full&quot; id=&quot;password_confirmation&quot; type=&quot;password&quot; name=&quot;password_confirmation&quot; required=&quot;required&quot; autocomplete=&quot;new-password&quot;&gt;

                    &lt;/div&gt;

        &lt;div class=&quot;flex items-center justify-end mt-4&quot;&gt;
            &lt;a class=&quot;underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500&quot; href=&quot;http://127.0.0.1:8000/login&quot;&gt;
                Already registered?
            &lt;/a&gt;

            &lt;button type=&quot;submit&quot; class=&quot;inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150 ms-4&quot;&gt;
    Register
&lt;/button&gt;
        &lt;/div&gt;

        &lt;div style=&quot;display: flex; align-items: center; text-align: center; color: #888; margin: 20px 0;&quot;&gt;
            &lt;span style=&quot;flex: 1; border-bottom: 1px solid #ccc; margin-right: 10px;&quot;&gt;&lt;/span&gt;
            or
            &lt;span style=&quot;flex: 1; border-bottom: 1px solid #ccc; margin-left: 10px;&quot;&gt;&lt;/span&gt;
        &lt;/div&gt;

        &lt;div class=&quot;mt-6&quot;&gt;
            &lt;a href=&quot;http://127.0.0.1:8000/auth/google/redirect&quot;
               class=&quot;w-full flex justify-center items-center bg-white text-gray-800 border border-gray-300 rounded-md px-4 py-2 hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500&quot;&gt;
                Register with Google
            &lt;/a&gt;
        &lt;/div&gt;

    &lt;/form&gt;
            &lt;/div&gt;
        &lt;/div&gt;
    &lt;/body&gt;
&lt;/html&gt;
</code>
 </pre>
    </span>
<span id="execution-results-GETregister" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETregister"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETregister"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETregister" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETregister">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETregister" data-method="GET"
      data-path="register"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETregister', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETregister"
                    onclick="tryItOut('GETregister');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETregister"
                    onclick="cancelTryOut('GETregister');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETregister"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>register</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETregister"
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
                              name="Accept"                data-endpoint="GETregister"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="endpoints-POSTregister">Handle an incoming registration request.</h2>

<p>
</p>



<span id="example-requests-POSTregister">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://127.0.0.1:8000/register" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"name\": \"b\",
    \"email\": \"zbailey@example.net\",
    \"password\": \"architecto\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8000/register"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "name": "b",
    "email": "zbailey@example.net",
    "password": "architecto"
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTregister">
</span>
<span id="execution-results-POSTregister" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTregister"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTregister"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTregister" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTregister">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTregister" data-method="POST"
      data-path="register"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTregister', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTregister"
                    onclick="tryItOut('POSTregister');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTregister"
                    onclick="cancelTryOut('POSTregister');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTregister"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>register</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTregister"
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
                              name="Accept"                data-endpoint="POSTregister"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>name</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="name"                data-endpoint="POSTregister"
               value="b"
               data-component="body">
    <br>
<p>Must not be greater than 255 characters. Example: <code>b</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>email</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="email"                data-endpoint="POSTregister"
               value="zbailey@example.net"
               data-component="body">
    <br>
<p>Must be a valid email address. Must not be greater than 255 characters. Example: <code>zbailey@example.net</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>password</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="password"                data-endpoint="POSTregister"
               value="architecto"
               data-component="body">
    <br>
<p>Example: <code>architecto</code></p>
        </div>
        </form>

                    <h2 id="endpoints-GETlogin">Display the login view.</h2>

<p>
</p>



<span id="example-requests-GETlogin">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://127.0.0.1:8000/login" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8000/login"
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

<span id="example-responses-GETlogin">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">content-type: text/html; charset=UTF-8
cache-control: no-cache, private
access-control-allow-origin: *
access-control-allow-methods: GET, POST, PUT, DELETE, OPTIONS
access-control-allow-headers: Content-Type, Authorization, X-Requested-With, X-XSRF-TOKEN
set-cookie: app_locale=eyJpdiI6IlhFK1VYNmJQUDBnOTZTZVNQT05IS1E9PSIsInZhbHVlIjoiakJoQzlMNXU4d3RESmNSazBwMHB6SStlYSswcUMrZEd5MEx1MEZBSDZFbFJWMlNQMWg4NVRzVkpTb1NCcUUvaCIsIm1hYyI6IjVjYzkzNDBhNTIxZGMzMGIzZDYyNzBhY2E1ZjA0ZTFmMDI3ZmEzMzA4OGJlYWVkMDczMjIzNTFiNzA1N2NlMmIiLCJ0YWciOiIifQ%3D%3D; expires=Sat, 29 Aug 2026 04:39:53 GMT; Max-Age=31536000; path=/; httponly; samesite=lax; XSRF-TOKEN=eyJpdiI6IldaSGwrV0lEYS9mS01jY3BnekFGbXc9PSIsInZhbHVlIjoiSDYxdFJmOWVPVndjZmFsZENlUU1NNER1UGdZalBHMmFFeFBNbFM1WlRyU1hSUGxJRnVqZktwTGVDb29UL1kwWHdRNVUzN1BUYnluMUtJV3ZpMGV6NkNWYmlpOXFkRG5oVlJ2YSs0azhCaWlHWVRhNWhmUm9PZSt5OTI3MEpSeUoiLCJtYWMiOiI3MjYxZGYxNjhlNzY5NDMyZjNhMGY2OWQxNzA4ZTE2YzBlMzgyZmY4Mjc0YTYyMzM4MTlhODVjOTEzODQwMmU4IiwidGFnIjoiIn0%3D; expires=Fri, 29 Aug 2025 06:39:53 GMT; Max-Age=7200; path=/; samesite=lax; laravel_session=eyJpdiI6Ikd3RHRobHhUVFY4bmJMVWhjaFJwZnc9PSIsInZhbHVlIjoidTF2NGkrb3lZTFltZHl0U0VYVlNPTWVUUDJkcTZzdTFvUGwydExGUmk0ZVJrNEtOZ2lTbnJGMWc2amFmT3pvWEhCcS9MK0hKalRNeDhXNnZMSTA1d2RCano5WmRwOW5mVk5YT1RVZm0yNU1ITFRLOUhEcnFNeHpVQ1crc2xPZ0siLCJtYWMiOiI2YmQzOTA4MDBkOGJmOTE3Y2Y2YWEzY2UyNTExNWMxMjQ1NjllN2U5ZDM3MWZhOTk0NDZiZmU2MTc5NjUxMmQ1IiwidGFnIjoiIn0%3D; expires=Fri, 29 Aug 2025 06:39:53 GMT; Max-Age=7200; path=/; httponly; samesite=lax
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">&lt;!DOCTYPE html&gt;
&lt;html lang=&quot;en&quot;&gt;
    &lt;head&gt;
        &lt;meta charset=&quot;utf-8&quot;&gt;
        &lt;meta name=&quot;viewport&quot; content=&quot;width=device-width, initial-scale=1&quot;&gt;
        &lt;meta name=&quot;csrf-token&quot; content=&quot;9JmvuZzeHMVyLnRsRrnjduBFPhjXniKDFGsDcrij&quot;&gt;

        &lt;title&gt;Laravel&lt;/title&gt;

        &lt;!-- Fonts --&gt;
        &lt;link rel=&quot;preconnect&quot; href=&quot;https://fonts.bunny.net&quot;&gt;
        &lt;link href=&quot;https://fonts.bunny.net/css?family=figtree:400,500,600&amp;display=swap&quot; rel=&quot;stylesheet&quot; /&gt;

        &lt;!-- Scripts --&gt;
        &lt;link rel=&quot;preload&quot; as=&quot;style&quot; href=&quot;http://127.0.0.1:8000/build/assets/app-GHg_Xo9N.css&quot; /&gt;&lt;link rel=&quot;modulepreload&quot; as=&quot;script&quot; href=&quot;http://127.0.0.1:8000/build/assets/app-DtCVKgHt.js&quot; /&gt;&lt;link rel=&quot;stylesheet&quot; href=&quot;http://127.0.0.1:8000/build/assets/app-GHg_Xo9N.css&quot; /&gt;&lt;script type=&quot;module&quot; src=&quot;http://127.0.0.1:8000/build/assets/app-DtCVKgHt.js&quot;&gt;&lt;/script&gt;    &lt;/head&gt;
    &lt;body class=&quot;font-sans text-gray-900 antialiased&quot;&gt;
        &lt;div class=&quot;min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100&quot;&gt;
            &lt;div&gt;
                &lt;a href=&quot;/&quot;&gt;
                    &lt;svg viewBox=&quot;0 0 316 316&quot; xmlns=&quot;http://www.w3.org/2000/svg&quot; class=&quot;w-20 h-20 fill-current text-gray-500&quot;&gt;
    &lt;path d=&quot;M305.8 81.125C305.77 80.995 305.69 80.885 305.65 80.755C305.56 80.525 305.49 80.285 305.37 80.075C305.29 79.935 305.17 79.815 305.07 79.685C304.94 79.515 304.83 79.325 304.68 79.175C304.55 79.045 304.39 78.955 304.25 78.845C304.09 78.715 303.95 78.575 303.77 78.475L251.32 48.275C249.97 47.495 248.31 47.495 246.96 48.275L194.51 78.475C194.33 78.575 194.19 78.725 194.03 78.845C193.89 78.955 193.73 79.045 193.6 79.175C193.45 79.325 193.34 79.515 193.21 79.685C193.11 79.815 192.99 79.935 192.91 80.075C192.79 80.285 192.71 80.525 192.63 80.755C192.58 80.875 192.51 80.995 192.48 81.125C192.38 81.495 192.33 81.875 192.33 82.265V139.625L148.62 164.795V52.575C148.62 52.185 148.57 51.805 148.47 51.435C148.44 51.305 148.36 51.195 148.32 51.065C148.23 50.835 148.16 50.595 148.04 50.385C147.96 50.245 147.84 50.125 147.74 49.995C147.61 49.825 147.5 49.635 147.35 49.485C147.22 49.355 147.06 49.265 146.92 49.155C146.76 49.025 146.62 48.885 146.44 48.785L93.99 18.585C92.64 17.805 90.98 17.805 89.63 18.585L37.18 48.785C37 48.885 36.86 49.035 36.7 49.155C36.56 49.265 36.4 49.355 36.27 49.485C36.12 49.635 36.01 49.825 35.88 49.995C35.78 50.125 35.66 50.245 35.58 50.385C35.46 50.595 35.38 50.835 35.3 51.065C35.25 51.185 35.18 51.305 35.15 51.435C35.05 51.805 35 52.185 35 52.575V232.235C35 233.795 35.84 235.245 37.19 236.025L142.1 296.425C142.33 296.555 142.58 296.635 142.82 296.725C142.93 296.765 143.04 296.835 143.16 296.865C143.53 296.965 143.9 297.015 144.28 297.015C144.66 297.015 145.03 296.965 145.4 296.865C145.5 296.835 145.59 296.775 145.69 296.745C145.95 296.655 146.21 296.565 146.45 296.435L251.36 236.035C252.72 235.255 253.55 233.815 253.55 232.245V174.885L303.81 145.945C305.17 145.165 306 143.725 306 142.155V82.265C305.95 81.875 305.89 81.495 305.8 81.125ZM144.2 227.205L100.57 202.515L146.39 176.135L196.66 147.195L240.33 172.335L208.29 190.625L144.2 227.205ZM244.75 114.995V164.795L226.39 154.225L201.03 139.625V89.825L219.39 100.395L244.75 114.995ZM249.12 57.105L292.81 82.265L249.12 107.425L205.43 82.265L249.12 57.105ZM114.49 184.425L96.13 194.995V85.305L121.49 70.705L139.85 60.135V169.815L114.49 184.425ZM91.76 27.425L135.45 52.585L91.76 77.745L48.07 52.585L91.76 27.425ZM43.67 60.135L62.03 70.705L87.39 85.305V202.545V202.555V202.565C87.39 202.735 87.44 202.895 87.46 203.055C87.49 203.265 87.49 203.485 87.55 203.695V203.705C87.6 203.875 87.69 204.035 87.76 204.195C87.84 204.375 87.89 204.575 87.99 204.745C87.99 204.745 87.99 204.755 88 204.755C88.09 204.905 88.22 205.035 88.33 205.175C88.45 205.335 88.55 205.495 88.69 205.635L88.7 205.645C88.82 205.765 88.98 205.855 89.12 205.965C89.28 206.085 89.42 206.225 89.59 206.325C89.6 206.325 89.6 206.325 89.61 206.335C89.62 206.335 89.62 206.345 89.63 206.345L139.87 234.775V285.065L43.67 229.705V60.135ZM244.75 229.705L148.58 285.075V234.775L219.8 194.115L244.75 179.875V229.705ZM297.2 139.625L253.49 164.795V114.995L278.85 100.395L297.21 89.825V139.625H297.2Z&quot;/&gt;
&lt;/svg&gt;
                &lt;/a&gt;
            &lt;/div&gt;

            &lt;div class=&quot;w-full sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg&quot;&gt;
                &lt;form method=&quot;POST&quot; action=&quot;http://127.0.0.1:8000/login&quot;&gt;
        &lt;input type=&quot;hidden&quot; name=&quot;_token&quot; value=&quot;9JmvuZzeHMVyLnRsRrnjduBFPhjXniKDFGsDcrij&quot; autocomplete=&quot;off&quot;&gt;
        &lt;!-- Email --&gt;
        &lt;div&gt;
            &lt;label class=&quot;block font-medium text-sm text-gray-700&quot; for=&quot;email&quot;&gt;
    Email
&lt;/label&gt;
            &lt;input  class=&quot;border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm block mt-1 w-full&quot; id=&quot;email&quot; type=&quot;email&quot; name=&quot;email&quot; required=&quot;required&quot; autofocus=&quot;autofocus&quot; autocomplete=&quot;username&quot;&gt;
                    &lt;/div&gt;

        &lt;!-- Password --&gt;
        &lt;div class=&quot;mt-4&quot;&gt;
            &lt;label class=&quot;block font-medium text-sm text-gray-700&quot; for=&quot;password&quot;&gt;
    Password
&lt;/label&gt;
            &lt;input  class=&quot;border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm block mt-1 w-full&quot; id=&quot;password&quot; type=&quot;password&quot; name=&quot;password&quot; required=&quot;required&quot; autocomplete=&quot;current-password&quot;&gt;
                    &lt;/div&gt;

        &lt;!-- Remember &amp; Forgot --&gt;
        &lt;div class=&quot;flex items-center justify-between mt-4&quot;&gt;
            &lt;label class=&quot;inline-flex items-center&quot;&gt;
                &lt;input id=&quot;remember_me&quot; type=&quot;checkbox&quot;
                       class=&quot;rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500&quot;
                       name=&quot;remember&quot;&gt;
                &lt;span class=&quot;ml-2 text-sm text-gray-600&quot;&gt;Remember me&lt;/span&gt;
            &lt;/label&gt;

                            &lt;a href=&quot;http://127.0.0.1:8000/forgot-password&quot;
                   class=&quot;underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500&quot;&gt;
                    Forgot your password?
                &lt;/a&gt;
                    &lt;/div&gt;

        &lt;!-- Submit --&gt;
        &lt;div class=&quot;mt-6&quot;&gt;
            &lt;button type=&quot;submit&quot; class=&quot;inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150 w-full flex justify-center&quot;&gt;
    Log In
&lt;/button&gt;
        &lt;/div&gt;

        &lt;!-- Register Link --&gt;
        &lt;p class=&quot;mt-4 text-center text-sm&quot;&gt;
            Not registered?
            &lt;a href=&quot;http://127.0.0.1:8000/register&quot;
               class=&quot;underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500&quot;&gt;
                Create an account
            &lt;/a&gt;
        &lt;/p&gt;

        &lt;div style=&quot;display: flex; align-items: center; text-align: center; color: #888; margin: 20px 0;&quot;&gt;
            &lt;span style=&quot;flex: 1; border-bottom: 1px solid #ccc; margin-right: 10px;&quot;&gt;&lt;/span&gt;
            or
            &lt;span style=&quot;flex: 1; border-bottom: 1px solid #ccc; margin-left: 10px;&quot;&gt;&lt;/span&gt;
        &lt;/div&gt;


        &lt;div class=&quot;mt-6&quot;&gt;
            &lt;a href=&quot;http://127.0.0.1:8000/auth/google/redirect&quot;
               class=&quot;w-full flex justify-center items-center bg-white text-gray-800 border border-gray-300 rounded-md px-4 py-2 hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500&quot;&gt;
                Login with Google
            &lt;/a&gt;
        &lt;/div&gt;

    &lt;/form&gt;
            &lt;/div&gt;
        &lt;/div&gt;
    &lt;/body&gt;
&lt;/html&gt;
</code>
 </pre>
    </span>
<span id="execution-results-GETlogin" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETlogin"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETlogin"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETlogin" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETlogin">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETlogin" data-method="GET"
      data-path="login"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETlogin', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETlogin"
                    onclick="tryItOut('GETlogin');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETlogin"
                    onclick="cancelTryOut('GETlogin');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETlogin"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>login</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETlogin"
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
                              name="Accept"                data-endpoint="GETlogin"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="endpoints-POSTlogin">Handle an incoming authentication request.</h2>

<p>
</p>



<span id="example-requests-POSTlogin">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://127.0.0.1:8000/login" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"email\": \"gbailey@example.net\",
    \"password\": \"|]|{+-\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8000/login"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "email": "gbailey@example.net",
    "password": "|]|{+-"
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTlogin">
</span>
<span id="execution-results-POSTlogin" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTlogin"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTlogin"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTlogin" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTlogin">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTlogin" data-method="POST"
      data-path="login"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTlogin', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTlogin"
                    onclick="tryItOut('POSTlogin');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTlogin"
                    onclick="cancelTryOut('POSTlogin');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTlogin"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>login</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTlogin"
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
                              name="Accept"                data-endpoint="POSTlogin"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>email</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="email"                data-endpoint="POSTlogin"
               value="gbailey@example.net"
               data-component="body">
    <br>
<p>Must be a valid email address. Example: <code>gbailey@example.net</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>password</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="password"                data-endpoint="POSTlogin"
               value="|]|{+-"
               data-component="body">
    <br>
<p>Example: <code>|]|{+-</code></p>
        </div>
        </form>

                    <h2 id="endpoints-GETforgot-password">Display the password reset link request view.</h2>

<p>
</p>



<span id="example-requests-GETforgot-password">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://127.0.0.1:8000/forgot-password" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8000/forgot-password"
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

<span id="example-responses-GETforgot-password">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">content-type: text/html; charset=UTF-8
cache-control: no-cache, private
access-control-allow-origin: *
access-control-allow-methods: GET, POST, PUT, DELETE, OPTIONS
access-control-allow-headers: Content-Type, Authorization, X-Requested-With, X-XSRF-TOKEN
set-cookie: app_locale=eyJpdiI6ImtJRGI1czR5cFJMejZBR2VKZXB4Y2c9PSIsInZhbHVlIjoiaHMyUVlwN200UHN0VURXdWFid1dtd3lQYXBoUFNxTkhKczZJREtIQUswRExZTDR0OUhMN2h3NVc5WXVqQlh6bCIsIm1hYyI6IjcyYmMwZWRkYzcxNjA1MjliOWExNGMxYjk5ODVmNTBmZDUzYjMyMDk4OGE1MjAxOTk4YTJjMjM1YjE5YTdlNzYiLCJ0YWciOiIifQ%3D%3D; expires=Sat, 29 Aug 2026 04:39:54 GMT; Max-Age=31536000; path=/; httponly; samesite=lax; XSRF-TOKEN=eyJpdiI6InplSlJYNHBXMUdSM05vQXBiMHQ5eGc9PSIsInZhbHVlIjoiMkRYV1Y0bjNFZWFWT0tGd0FZeDdKbW5Mc2dCSkJyR3A1N3ZNaFEwZnl5bDB0ZHZ5SDNmRzQyNVZjYllDZmpJM080TDQvSXdiVVlvYWNnWjJHYVRIT0F6MTZ5c2pIZjdUQTg5emlEdFp5VFVtcXpGR3hlWDRDb2kycDd2aVZxTlkiLCJtYWMiOiIyZGM2ZDI1OGY0ZTYxNmQ2NzM0MDJhNDc0NmIwNTBjYTUxYzBkODg1ODBlMTU0OTY1ODg4NzQ5MDVkODBiODk1IiwidGFnIjoiIn0%3D; expires=Fri, 29 Aug 2025 06:39:54 GMT; Max-Age=7200; path=/; samesite=lax; laravel_session=eyJpdiI6ImgvVjZnTUZ6eEJtZEpmMmJOMy9EUnc9PSIsInZhbHVlIjoiMnNrWDJxQXlaYVpsUzlWKy9LYXJ5RVRvRHRJTCsyNm9ET1FRV2ZrYklrY0FPdDBKSEQ0eUR2bzh6bVVnK0JoMC9NWkF0Witxa3p1QnUyREJCVlFIc2s3M2RRYjNvQ3VCUnhsb0VjMCtlVUpvdDVDYWFMWnJ2U2FBTkY1M3lmMCsiLCJtYWMiOiIxM2NlY2Y2MzY4NDI0NzkwYzk3Nzg2NDM5NDA3NmNiYTMwNDg5YzRmMzgyNzM4NTk1YTRkMDFjNmViNWIxZDJjIiwidGFnIjoiIn0%3D; expires=Fri, 29 Aug 2025 06:39:54 GMT; Max-Age=7200; path=/; httponly; samesite=lax
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">&lt;!DOCTYPE html&gt;
&lt;html lang=&quot;en&quot;&gt;
    &lt;head&gt;
        &lt;meta charset=&quot;utf-8&quot;&gt;
        &lt;meta name=&quot;viewport&quot; content=&quot;width=device-width, initial-scale=1&quot;&gt;
        &lt;meta name=&quot;csrf-token&quot; content=&quot;9JmvuZzeHMVyLnRsRrnjduBFPhjXniKDFGsDcrij&quot;&gt;

        &lt;title&gt;Laravel&lt;/title&gt;

        &lt;!-- Fonts --&gt;
        &lt;link rel=&quot;preconnect&quot; href=&quot;https://fonts.bunny.net&quot;&gt;
        &lt;link href=&quot;https://fonts.bunny.net/css?family=figtree:400,500,600&amp;display=swap&quot; rel=&quot;stylesheet&quot; /&gt;

        &lt;!-- Scripts --&gt;
        &lt;link rel=&quot;preload&quot; as=&quot;style&quot; href=&quot;http://127.0.0.1:8000/build/assets/app-GHg_Xo9N.css&quot; /&gt;&lt;link rel=&quot;modulepreload&quot; as=&quot;script&quot; href=&quot;http://127.0.0.1:8000/build/assets/app-DtCVKgHt.js&quot; /&gt;&lt;link rel=&quot;stylesheet&quot; href=&quot;http://127.0.0.1:8000/build/assets/app-GHg_Xo9N.css&quot; /&gt;&lt;script type=&quot;module&quot; src=&quot;http://127.0.0.1:8000/build/assets/app-DtCVKgHt.js&quot;&gt;&lt;/script&gt;    &lt;/head&gt;
    &lt;body class=&quot;font-sans text-gray-900 antialiased&quot;&gt;
        &lt;div class=&quot;min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100&quot;&gt;
            &lt;div&gt;
                &lt;a href=&quot;/&quot;&gt;
                    &lt;svg viewBox=&quot;0 0 316 316&quot; xmlns=&quot;http://www.w3.org/2000/svg&quot; class=&quot;w-20 h-20 fill-current text-gray-500&quot;&gt;
    &lt;path d=&quot;M305.8 81.125C305.77 80.995 305.69 80.885 305.65 80.755C305.56 80.525 305.49 80.285 305.37 80.075C305.29 79.935 305.17 79.815 305.07 79.685C304.94 79.515 304.83 79.325 304.68 79.175C304.55 79.045 304.39 78.955 304.25 78.845C304.09 78.715 303.95 78.575 303.77 78.475L251.32 48.275C249.97 47.495 248.31 47.495 246.96 48.275L194.51 78.475C194.33 78.575 194.19 78.725 194.03 78.845C193.89 78.955 193.73 79.045 193.6 79.175C193.45 79.325 193.34 79.515 193.21 79.685C193.11 79.815 192.99 79.935 192.91 80.075C192.79 80.285 192.71 80.525 192.63 80.755C192.58 80.875 192.51 80.995 192.48 81.125C192.38 81.495 192.33 81.875 192.33 82.265V139.625L148.62 164.795V52.575C148.62 52.185 148.57 51.805 148.47 51.435C148.44 51.305 148.36 51.195 148.32 51.065C148.23 50.835 148.16 50.595 148.04 50.385C147.96 50.245 147.84 50.125 147.74 49.995C147.61 49.825 147.5 49.635 147.35 49.485C147.22 49.355 147.06 49.265 146.92 49.155C146.76 49.025 146.62 48.885 146.44 48.785L93.99 18.585C92.64 17.805 90.98 17.805 89.63 18.585L37.18 48.785C37 48.885 36.86 49.035 36.7 49.155C36.56 49.265 36.4 49.355 36.27 49.485C36.12 49.635 36.01 49.825 35.88 49.995C35.78 50.125 35.66 50.245 35.58 50.385C35.46 50.595 35.38 50.835 35.3 51.065C35.25 51.185 35.18 51.305 35.15 51.435C35.05 51.805 35 52.185 35 52.575V232.235C35 233.795 35.84 235.245 37.19 236.025L142.1 296.425C142.33 296.555 142.58 296.635 142.82 296.725C142.93 296.765 143.04 296.835 143.16 296.865C143.53 296.965 143.9 297.015 144.28 297.015C144.66 297.015 145.03 296.965 145.4 296.865C145.5 296.835 145.59 296.775 145.69 296.745C145.95 296.655 146.21 296.565 146.45 296.435L251.36 236.035C252.72 235.255 253.55 233.815 253.55 232.245V174.885L303.81 145.945C305.17 145.165 306 143.725 306 142.155V82.265C305.95 81.875 305.89 81.495 305.8 81.125ZM144.2 227.205L100.57 202.515L146.39 176.135L196.66 147.195L240.33 172.335L208.29 190.625L144.2 227.205ZM244.75 114.995V164.795L226.39 154.225L201.03 139.625V89.825L219.39 100.395L244.75 114.995ZM249.12 57.105L292.81 82.265L249.12 107.425L205.43 82.265L249.12 57.105ZM114.49 184.425L96.13 194.995V85.305L121.49 70.705L139.85 60.135V169.815L114.49 184.425ZM91.76 27.425L135.45 52.585L91.76 77.745L48.07 52.585L91.76 27.425ZM43.67 60.135L62.03 70.705L87.39 85.305V202.545V202.555V202.565C87.39 202.735 87.44 202.895 87.46 203.055C87.49 203.265 87.49 203.485 87.55 203.695V203.705C87.6 203.875 87.69 204.035 87.76 204.195C87.84 204.375 87.89 204.575 87.99 204.745C87.99 204.745 87.99 204.755 88 204.755C88.09 204.905 88.22 205.035 88.33 205.175C88.45 205.335 88.55 205.495 88.69 205.635L88.7 205.645C88.82 205.765 88.98 205.855 89.12 205.965C89.28 206.085 89.42 206.225 89.59 206.325C89.6 206.325 89.6 206.325 89.61 206.335C89.62 206.335 89.62 206.345 89.63 206.345L139.87 234.775V285.065L43.67 229.705V60.135ZM244.75 229.705L148.58 285.075V234.775L219.8 194.115L244.75 179.875V229.705ZM297.2 139.625L253.49 164.795V114.995L278.85 100.395L297.21 89.825V139.625H297.2Z&quot;/&gt;
&lt;/svg&gt;
                &lt;/a&gt;
            &lt;/div&gt;

            &lt;div class=&quot;w-full sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg&quot;&gt;
                &lt;div class=&quot;mb-4 text-sm text-gray-600&quot;&gt;
        Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.
    &lt;/div&gt;

    &lt;!-- Session Status --&gt;
    
    &lt;form method=&quot;POST&quot; action=&quot;http://127.0.0.1:8000/forgot-password&quot;&gt;
        &lt;input type=&quot;hidden&quot; name=&quot;_token&quot; value=&quot;9JmvuZzeHMVyLnRsRrnjduBFPhjXniKDFGsDcrij&quot; autocomplete=&quot;off&quot;&gt;
        &lt;!-- Email Address --&gt;
        &lt;div&gt;
            &lt;label class=&quot;block font-medium text-sm text-gray-700&quot; for=&quot;email&quot;&gt;
    Email
&lt;/label&gt;
            &lt;input  class=&quot;border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm block mt-1 w-full&quot; id=&quot;email&quot; type=&quot;email&quot; name=&quot;email&quot; required=&quot;required&quot; autofocus=&quot;autofocus&quot;&gt;
                    &lt;/div&gt;

        &lt;div class=&quot;flex items-center justify-end mt-4&quot;&gt;
            &lt;button type=&quot;submit&quot; class=&quot;inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150&quot;&gt;
    Email Password Reset Link
&lt;/button&gt;
        &lt;/div&gt;
    &lt;/form&gt;
            &lt;/div&gt;
        &lt;/div&gt;
    &lt;/body&gt;
&lt;/html&gt;
</code>
 </pre>
    </span>
<span id="execution-results-GETforgot-password" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETforgot-password"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETforgot-password"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETforgot-password" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETforgot-password">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETforgot-password" data-method="GET"
      data-path="forgot-password"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETforgot-password', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETforgot-password"
                    onclick="tryItOut('GETforgot-password');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETforgot-password"
                    onclick="cancelTryOut('GETforgot-password');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETforgot-password"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>forgot-password</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETforgot-password"
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
                              name="Accept"                data-endpoint="GETforgot-password"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="endpoints-POSTforgot-password">Handle an incoming password reset link request.</h2>

<p>
</p>



<span id="example-requests-POSTforgot-password">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://127.0.0.1:8000/forgot-password" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"email\": \"gbailey@example.net\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8000/forgot-password"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "email": "gbailey@example.net"
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTforgot-password">
</span>
<span id="execution-results-POSTforgot-password" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTforgot-password"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTforgot-password"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTforgot-password" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTforgot-password">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTforgot-password" data-method="POST"
      data-path="forgot-password"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTforgot-password', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTforgot-password"
                    onclick="tryItOut('POSTforgot-password');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTforgot-password"
                    onclick="cancelTryOut('POSTforgot-password');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTforgot-password"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>forgot-password</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTforgot-password"
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
                              name="Accept"                data-endpoint="POSTforgot-password"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>email</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="email"                data-endpoint="POSTforgot-password"
               value="gbailey@example.net"
               data-component="body">
    <br>
<p>Must be a valid email address. Example: <code>gbailey@example.net</code></p>
        </div>
        </form>

                    <h2 id="endpoints-GETreset-password--token-">Display the password reset view.</h2>

<p>
</p>



<span id="example-requests-GETreset-password--token-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://127.0.0.1:8000/reset-password/architecto" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8000/reset-password/architecto"
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

<span id="example-responses-GETreset-password--token-">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">content-type: text/html; charset=UTF-8
cache-control: no-cache, private
access-control-allow-origin: *
access-control-allow-methods: GET, POST, PUT, DELETE, OPTIONS
access-control-allow-headers: Content-Type, Authorization, X-Requested-With, X-XSRF-TOKEN
set-cookie: app_locale=eyJpdiI6IjZubzNuQVlOamZRTUF4bUNFT1ZySHc9PSIsInZhbHVlIjoiV1dPbDk0alVpcVg5YWFFVUtxcDJwaTI2SmZBdDdUOU5UNmVpZDBUSVpPVkV0NUlIT0djS2xNWlcvVVhkci9JSiIsIm1hYyI6ImJkM2IwMDBhYTcxNTAwZTE3OTNjZjFiNDNlMWU1YzJlNmU5YTE0NTBjN2JhODJhNDU4Y2FkMGI3MjQ4N2UwZGUiLCJ0YWciOiIifQ%3D%3D; expires=Sat, 29 Aug 2026 04:39:55 GMT; Max-Age=31536000; path=/; httponly; samesite=lax; XSRF-TOKEN=eyJpdiI6ImVqNHN6V055cWU1ZWZHeE9RcmhrU3c9PSIsInZhbHVlIjoieU5iS09nUjdxbUEwTXRTLzBBaWRVOWRBMTRqcy9UUjAzYzZoRFI0SStseXBPajdXazMwaXhxVFlhdjhjdzN4R0FIVVBYWGc1eEZOSDkxSEcrK00vaHRWUHYybmxIaVRLTGVqRTJ3MTFmRVhhNHVFSjJLNmZsTkZjQ2x1VnZqRm0iLCJtYWMiOiJiNWE3M2VkYjdhODQxYTA5MmQ0MzgxYTUyZWEyZmNkYzc0MGViNjFiOTg1ZTZiMmI3ZDc1M2Q5YTkwZjNmYTAzIiwidGFnIjoiIn0%3D; expires=Fri, 29 Aug 2025 06:39:55 GMT; Max-Age=7200; path=/; samesite=lax; laravel_session=eyJpdiI6IjJpMC9sNUtvcGZDKzZHL3lTZmk4TVE9PSIsInZhbHVlIjoiU2lhWTM5SVE2RU1qZFVLSHVxRXZzSjJTZ3pLa2xHbkJ4cnRDR0E3MWR1UXp4ZnlYZmw1MytGT2REYS81cDRiclB3bVB1S2gyVEl4citRUXg0bkhIUXJlMnd3dDhtMjJjZ0VGN1JIcE1aNUlicitVVUI0NFJPalZsZ0RKRzV5dXoiLCJtYWMiOiJkMjQwZmQ4N2U1M2Q4YTVmY2Q5ZTFkODgyZGRmOTc1YTM5MWMwZjEwZTEzN2Y5NDMwNTg0ODg1MjAyNTJkZDY4IiwidGFnIjoiIn0%3D; expires=Fri, 29 Aug 2025 06:39:55 GMT; Max-Age=7200; path=/; httponly; samesite=lax
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">&lt;!DOCTYPE html&gt;
&lt;html lang=&quot;en&quot;&gt;
    &lt;head&gt;
        &lt;meta charset=&quot;utf-8&quot;&gt;
        &lt;meta name=&quot;viewport&quot; content=&quot;width=device-width, initial-scale=1&quot;&gt;
        &lt;meta name=&quot;csrf-token&quot; content=&quot;9JmvuZzeHMVyLnRsRrnjduBFPhjXniKDFGsDcrij&quot;&gt;

        &lt;title&gt;Laravel&lt;/title&gt;

        &lt;!-- Fonts --&gt;
        &lt;link rel=&quot;preconnect&quot; href=&quot;https://fonts.bunny.net&quot;&gt;
        &lt;link href=&quot;https://fonts.bunny.net/css?family=figtree:400,500,600&amp;display=swap&quot; rel=&quot;stylesheet&quot; /&gt;

        &lt;!-- Scripts --&gt;
        &lt;link rel=&quot;preload&quot; as=&quot;style&quot; href=&quot;http://127.0.0.1:8000/build/assets/app-GHg_Xo9N.css&quot; /&gt;&lt;link rel=&quot;modulepreload&quot; as=&quot;script&quot; href=&quot;http://127.0.0.1:8000/build/assets/app-DtCVKgHt.js&quot; /&gt;&lt;link rel=&quot;stylesheet&quot; href=&quot;http://127.0.0.1:8000/build/assets/app-GHg_Xo9N.css&quot; /&gt;&lt;script type=&quot;module&quot; src=&quot;http://127.0.0.1:8000/build/assets/app-DtCVKgHt.js&quot;&gt;&lt;/script&gt;    &lt;/head&gt;
    &lt;body class=&quot;font-sans text-gray-900 antialiased&quot;&gt;
        &lt;div class=&quot;min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100&quot;&gt;
            &lt;div&gt;
                &lt;a href=&quot;/&quot;&gt;
                    &lt;svg viewBox=&quot;0 0 316 316&quot; xmlns=&quot;http://www.w3.org/2000/svg&quot; class=&quot;w-20 h-20 fill-current text-gray-500&quot;&gt;
    &lt;path d=&quot;M305.8 81.125C305.77 80.995 305.69 80.885 305.65 80.755C305.56 80.525 305.49 80.285 305.37 80.075C305.29 79.935 305.17 79.815 305.07 79.685C304.94 79.515 304.83 79.325 304.68 79.175C304.55 79.045 304.39 78.955 304.25 78.845C304.09 78.715 303.95 78.575 303.77 78.475L251.32 48.275C249.97 47.495 248.31 47.495 246.96 48.275L194.51 78.475C194.33 78.575 194.19 78.725 194.03 78.845C193.89 78.955 193.73 79.045 193.6 79.175C193.45 79.325 193.34 79.515 193.21 79.685C193.11 79.815 192.99 79.935 192.91 80.075C192.79 80.285 192.71 80.525 192.63 80.755C192.58 80.875 192.51 80.995 192.48 81.125C192.38 81.495 192.33 81.875 192.33 82.265V139.625L148.62 164.795V52.575C148.62 52.185 148.57 51.805 148.47 51.435C148.44 51.305 148.36 51.195 148.32 51.065C148.23 50.835 148.16 50.595 148.04 50.385C147.96 50.245 147.84 50.125 147.74 49.995C147.61 49.825 147.5 49.635 147.35 49.485C147.22 49.355 147.06 49.265 146.92 49.155C146.76 49.025 146.62 48.885 146.44 48.785L93.99 18.585C92.64 17.805 90.98 17.805 89.63 18.585L37.18 48.785C37 48.885 36.86 49.035 36.7 49.155C36.56 49.265 36.4 49.355 36.27 49.485C36.12 49.635 36.01 49.825 35.88 49.995C35.78 50.125 35.66 50.245 35.58 50.385C35.46 50.595 35.38 50.835 35.3 51.065C35.25 51.185 35.18 51.305 35.15 51.435C35.05 51.805 35 52.185 35 52.575V232.235C35 233.795 35.84 235.245 37.19 236.025L142.1 296.425C142.33 296.555 142.58 296.635 142.82 296.725C142.93 296.765 143.04 296.835 143.16 296.865C143.53 296.965 143.9 297.015 144.28 297.015C144.66 297.015 145.03 296.965 145.4 296.865C145.5 296.835 145.59 296.775 145.69 296.745C145.95 296.655 146.21 296.565 146.45 296.435L251.36 236.035C252.72 235.255 253.55 233.815 253.55 232.245V174.885L303.81 145.945C305.17 145.165 306 143.725 306 142.155V82.265C305.95 81.875 305.89 81.495 305.8 81.125ZM144.2 227.205L100.57 202.515L146.39 176.135L196.66 147.195L240.33 172.335L208.29 190.625L144.2 227.205ZM244.75 114.995V164.795L226.39 154.225L201.03 139.625V89.825L219.39 100.395L244.75 114.995ZM249.12 57.105L292.81 82.265L249.12 107.425L205.43 82.265L249.12 57.105ZM114.49 184.425L96.13 194.995V85.305L121.49 70.705L139.85 60.135V169.815L114.49 184.425ZM91.76 27.425L135.45 52.585L91.76 77.745L48.07 52.585L91.76 27.425ZM43.67 60.135L62.03 70.705L87.39 85.305V202.545V202.555V202.565C87.39 202.735 87.44 202.895 87.46 203.055C87.49 203.265 87.49 203.485 87.55 203.695V203.705C87.6 203.875 87.69 204.035 87.76 204.195C87.84 204.375 87.89 204.575 87.99 204.745C87.99 204.745 87.99 204.755 88 204.755C88.09 204.905 88.22 205.035 88.33 205.175C88.45 205.335 88.55 205.495 88.69 205.635L88.7 205.645C88.82 205.765 88.98 205.855 89.12 205.965C89.28 206.085 89.42 206.225 89.59 206.325C89.6 206.325 89.6 206.325 89.61 206.335C89.62 206.335 89.62 206.345 89.63 206.345L139.87 234.775V285.065L43.67 229.705V60.135ZM244.75 229.705L148.58 285.075V234.775L219.8 194.115L244.75 179.875V229.705ZM297.2 139.625L253.49 164.795V114.995L278.85 100.395L297.21 89.825V139.625H297.2Z&quot;/&gt;
&lt;/svg&gt;
                &lt;/a&gt;
            &lt;/div&gt;

            &lt;div class=&quot;w-full sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg&quot;&gt;
                &lt;form method=&quot;POST&quot; action=&quot;http://127.0.0.1:8000/reset-password&quot;&gt;
        &lt;input type=&quot;hidden&quot; name=&quot;_token&quot; value=&quot;9JmvuZzeHMVyLnRsRrnjduBFPhjXniKDFGsDcrij&quot; autocomplete=&quot;off&quot;&gt;
        &lt;!-- Password Reset Token --&gt;
        &lt;input type=&quot;hidden&quot; name=&quot;token&quot; value=&quot;architecto&quot;&gt;

        &lt;!-- Email Address --&gt;
        &lt;div&gt;
            &lt;label class=&quot;block font-medium text-sm text-gray-700&quot; for=&quot;email&quot;&gt;
    Email
&lt;/label&gt;
            &lt;input  class=&quot;border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm block mt-1 w-full&quot; id=&quot;email&quot; type=&quot;email&quot; name=&quot;email&quot; required=&quot;required&quot; autofocus=&quot;autofocus&quot; autocomplete=&quot;username&quot;&gt;
                    &lt;/div&gt;

        &lt;!-- Password --&gt;
        &lt;div class=&quot;mt-4&quot;&gt;
            &lt;label class=&quot;block font-medium text-sm text-gray-700&quot; for=&quot;password&quot;&gt;
    Password
&lt;/label&gt;
            &lt;input  class=&quot;border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm block mt-1 w-full&quot; id=&quot;password&quot; type=&quot;password&quot; name=&quot;password&quot; required=&quot;required&quot; autocomplete=&quot;new-password&quot;&gt;
                    &lt;/div&gt;

        &lt;!-- Confirm Password --&gt;
        &lt;div class=&quot;mt-4&quot;&gt;
            &lt;label class=&quot;block font-medium text-sm text-gray-700&quot; for=&quot;password_confirmation&quot;&gt;
    Confirm Password
&lt;/label&gt;

            &lt;input  class=&quot;border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm block mt-1 w-full&quot; id=&quot;password_confirmation&quot; type=&quot;password&quot; name=&quot;password_confirmation&quot; required=&quot;required&quot; autocomplete=&quot;new-password&quot;&gt;

                    &lt;/div&gt;

        &lt;div class=&quot;flex items-center justify-end mt-4&quot;&gt;
            &lt;button type=&quot;submit&quot; class=&quot;inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150&quot;&gt;
    Reset Password
&lt;/button&gt;
        &lt;/div&gt;
    &lt;/form&gt;
            &lt;/div&gt;
        &lt;/div&gt;
    &lt;/body&gt;
&lt;/html&gt;
</code>
 </pre>
    </span>
<span id="execution-results-GETreset-password--token-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETreset-password--token-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETreset-password--token-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETreset-password--token-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETreset-password--token-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETreset-password--token-" data-method="GET"
      data-path="reset-password/{token}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETreset-password--token-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETreset-password--token-"
                    onclick="tryItOut('GETreset-password--token-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETreset-password--token-"
                    onclick="cancelTryOut('GETreset-password--token-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETreset-password--token-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>reset-password/{token}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETreset-password--token-"
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
                              name="Accept"                data-endpoint="GETreset-password--token-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>token</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="token"                data-endpoint="GETreset-password--token-"
               value="architecto"
               data-component="url">
    <br>
<p>Example: <code>architecto</code></p>
            </div>
                    </form>

                    <h2 id="endpoints-POSTreset-password">Handle an incoming new password request.</h2>

<p>
</p>



<span id="example-requests-POSTreset-password">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://127.0.0.1:8000/reset-password" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"token\": \"architecto\",
    \"email\": \"zbailey@example.net\",
    \"password\": \"architecto\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8000/reset-password"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "token": "architecto",
    "email": "zbailey@example.net",
    "password": "architecto"
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTreset-password">
</span>
<span id="execution-results-POSTreset-password" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTreset-password"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTreset-password"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTreset-password" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTreset-password">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTreset-password" data-method="POST"
      data-path="reset-password"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTreset-password', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTreset-password"
                    onclick="tryItOut('POSTreset-password');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTreset-password"
                    onclick="cancelTryOut('POSTreset-password');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTreset-password"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>reset-password</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTreset-password"
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
                              name="Accept"                data-endpoint="POSTreset-password"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>token</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="token"                data-endpoint="POSTreset-password"
               value="architecto"
               data-component="body">
    <br>
<p>Example: <code>architecto</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>email</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="email"                data-endpoint="POSTreset-password"
               value="zbailey@example.net"
               data-component="body">
    <br>
<p>Must be a valid email address. Example: <code>zbailey@example.net</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>password</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="password"                data-endpoint="POSTreset-password"
               value="architecto"
               data-component="body">
    <br>
<p>Example: <code>architecto</code></p>
        </div>
        </form>

                    <h2 id="endpoints-GETverify-email">Display the email verification prompt.</h2>

<p>
</p>



<span id="example-requests-GETverify-email">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://127.0.0.1:8000/verify-email" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8000/verify-email"
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

<span id="example-responses-GETverify-email">
            <blockquote>
            <p>Example response (401):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
access-control-allow-origin: *
access-control-allow-methods: GET, POST, PUT, DELETE, OPTIONS
access-control-allow-headers: Content-Type, Authorization, X-Requested-With, X-XSRF-TOKEN
set-cookie: XSRF-TOKEN=eyJpdiI6Ink3bHFQUUZIKzJRenB5c2NhYWV3M0E9PSIsInZhbHVlIjoiYlBFeVRMY2NhOFAveVpRbW1vandQdElnTVN6VmszRmI5bUNxb3J3ZmhVYUJibW9uMWRvNy8xa3pXRHc5ZStUa05hR3dWQ05KN0tqcVRKWDM1Sk1mVWJwL2hmbzdpbWhyTFhGVzNhTzBsUVg2L0R2bGwzNEFtVmlkVHlSdWFoS1AiLCJtYWMiOiIyMjNmZDZhYzNhYTk3YWI4ZDI4YTg1MThhZmUwMjRjNmI2ZmYyZDZiYzhlM2UyZDNmZTY0Y2EyZGExZjI5OGYxIiwidGFnIjoiIn0%3D; expires=Fri, 29 Aug 2025 06:39:55 GMT; Max-Age=7200; path=/; samesite=lax; laravel_session=eyJpdiI6IkMrMTQwZTdrQmVSRVFvejgvZHRBSEE9PSIsInZhbHVlIjoiNFVLYlVtMFBEZ0ttS2o1R2ZxemIxYWhlTjNRQllGQWhlRkFhZWVwM1JJUTlEZDlsdXRBb1VvUWZNRytIRjNQc0NYVGFFV0F5eUN1VWhFa1F6eVhjV3VHZDNmZXR6My9LUWJiUHI5OGxyU1ZtUDRLelNiREZGUzJaNFlwbTNjcVgiLCJtYWMiOiIyZDZjOWJkMmQ0YjdjOTk3NWFkODJlYzhlNTI0NGExMjkwYWNmYzg1MzE4OTI3NjAwNDk5OWFkYmI2NmE5OThjIiwidGFnIjoiIn0%3D; expires=Fri, 29 Aug 2025 06:39:55 GMT; Max-Age=7200; path=/; httponly; samesite=lax
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Unauthenticated.&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETverify-email" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETverify-email"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETverify-email"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETverify-email" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETverify-email">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETverify-email" data-method="GET"
      data-path="verify-email"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETverify-email', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETverify-email"
                    onclick="tryItOut('GETverify-email');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETverify-email"
                    onclick="cancelTryOut('GETverify-email');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETverify-email"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>verify-email</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETverify-email"
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
                              name="Accept"                data-endpoint="GETverify-email"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="endpoints-GETverify-email--id---hash-">Mark the authenticated user&#039;s email address as verified.</h2>

<p>
</p>



<span id="example-requests-GETverify-email--id---hash-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://127.0.0.1:8000/verify-email/architecto/architecto" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8000/verify-email/architecto/architecto"
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

<span id="example-responses-GETverify-email--id---hash-">
            <blockquote>
            <p>Example response (401):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
access-control-allow-origin: *
access-control-allow-methods: GET, POST, PUT, DELETE, OPTIONS
access-control-allow-headers: Content-Type, Authorization, X-Requested-With, X-XSRF-TOKEN
set-cookie: XSRF-TOKEN=eyJpdiI6Im1WK1dBdTRLM29pWDViK08wdjQ3Q0E9PSIsInZhbHVlIjoiLzlhczJxTlJaSmxDdjlMaHR0RFZqc0RWQTV0aUVWNmwxS21ONUJSV0lZb3ZiaFhoa0ZPclp1TjAvSEYxcGtLMncvV0pKc2NhZzc2dEFkTlFlcUFWT3BhbkFsWHZaY1NzSGxRcGdoN3luVjIzM2lTclhzcUFjdEhKb0ZCakYrWXMiLCJtYWMiOiIxYzI3MTQzNmUyMDU3MDYxZTU0NzVkMDI5MmNlZmJmMzUwNTRlZjU2ZTU2MzAyNjYwNDYwNGNiMjc1YmU4MDE4IiwidGFnIjoiIn0%3D; expires=Fri, 29 Aug 2025 06:39:55 GMT; Max-Age=7200; path=/; samesite=lax; laravel_session=eyJpdiI6ImhKNFd0TFVkWmFVNlNqTSt0QlJmNnc9PSIsInZhbHVlIjoiWUF3VFhmNWNEcXNMRGxFQUFiMCtvRHk0VmJrVXVya0VRKytTeUtwb1hJZCtKTXl0Nmt2YStlSFdSKzV0dzJxbkN0NGtyNHI2blo1Vnp3QUVLcjJMWVRlN3B2eXo0MW5DOWpVN1dReWRaaG56OWtKcjQ3eEVZNkMrRkN4WXJnSVQiLCJtYWMiOiIwMzU5MDYwZDZjMjllYjMwNWE2MjE3YWUxNDg3NGE2NGI0ZjkyZGEyOGFlMjI5N2QyNjFmNmVmMGE4NjNkODg4IiwidGFnIjoiIn0%3D; expires=Fri, 29 Aug 2025 06:39:55 GMT; Max-Age=7200; path=/; httponly; samesite=lax
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Unauthenticated.&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETverify-email--id---hash-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETverify-email--id---hash-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETverify-email--id---hash-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETverify-email--id---hash-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETverify-email--id---hash-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETverify-email--id---hash-" data-method="GET"
      data-path="verify-email/{id}/{hash}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETverify-email--id---hash-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETverify-email--id---hash-"
                    onclick="tryItOut('GETverify-email--id---hash-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETverify-email--id---hash-"
                    onclick="cancelTryOut('GETverify-email--id---hash-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETverify-email--id---hash-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>verify-email/{id}/{hash}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETverify-email--id---hash-"
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
                              name="Accept"                data-endpoint="GETverify-email--id---hash-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="id"                data-endpoint="GETverify-email--id---hash-"
               value="architecto"
               data-component="url">
    <br>
<p>The ID of the verify email. Example: <code>architecto</code></p>
            </div>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>hash</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="hash"                data-endpoint="GETverify-email--id---hash-"
               value="architecto"
               data-component="url">
    <br>
<p>Example: <code>architecto</code></p>
            </div>
                    </form>

                    <h2 id="endpoints-POSTemail-verification-notification">Send a new email verification notification.</h2>

<p>
</p>



<span id="example-requests-POSTemail-verification-notification">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://127.0.0.1:8000/email/verification-notification" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8000/email/verification-notification"
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

<span id="example-responses-POSTemail-verification-notification">
</span>
<span id="execution-results-POSTemail-verification-notification" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTemail-verification-notification"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTemail-verification-notification"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTemail-verification-notification" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTemail-verification-notification">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTemail-verification-notification" data-method="POST"
      data-path="email/verification-notification"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTemail-verification-notification', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTemail-verification-notification"
                    onclick="tryItOut('POSTemail-verification-notification');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTemail-verification-notification"
                    onclick="cancelTryOut('POSTemail-verification-notification');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTemail-verification-notification"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>email/verification-notification</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTemail-verification-notification"
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
                              name="Accept"                data-endpoint="POSTemail-verification-notification"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="endpoints-GETconfirm-password">Show the confirm password view.</h2>

<p>
</p>



<span id="example-requests-GETconfirm-password">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://127.0.0.1:8000/confirm-password" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8000/confirm-password"
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

<span id="example-responses-GETconfirm-password">
            <blockquote>
            <p>Example response (401):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
access-control-allow-origin: *
access-control-allow-methods: GET, POST, PUT, DELETE, OPTIONS
access-control-allow-headers: Content-Type, Authorization, X-Requested-With, X-XSRF-TOKEN
set-cookie: XSRF-TOKEN=eyJpdiI6IllaVnEvQytUaEV3R0IxaHlaWi9PT0E9PSIsInZhbHVlIjoiT1RBemZwZWVBU0M2SnFlY2lXcncrNE9YaHlKU2Q3VXlydVltQ2xIQmFWV0NESmJBYXZMUVZ0MkZjT3VST0h1eitrUFA0MjVhTWJlQk9YSDVRS1IrRkFLd3o3MEpwaWNpU3BwVE9qZGp5OXV2Mnl5N05hZng4ME9uRkE3bWxZaTciLCJtYWMiOiJjYWUxZmRiOTdmNWE3MTVmODI4YWRmMGMyY2FlNDNhZGIxZTFlODk4MGQwNjdjYThmODEzMWNiOTEzMDE4NGQ0IiwidGFnIjoiIn0%3D; expires=Fri, 29 Aug 2025 06:39:55 GMT; Max-Age=7200; path=/; samesite=lax; laravel_session=eyJpdiI6InZCWHpvSVMvaWZvdVltK0Z3NDREYkE9PSIsInZhbHVlIjoiZ1dUSCtrWHFPSDlBSTFFcHpmNWZGcG1GemdhSVZOZVlGNUVFYkZBSlB5Qi9kbmdhcjUzTFBENXBhYjRnczkzeXl5Zk9WV296MUVsN3VwWS9tRGExajNrdWFLZzc5cER2emJsN2M5a3RDcUhLWXJmeXZkVG9Yck4yYzh6VXczakIiLCJtYWMiOiI3YTZjYzE5NmE3Mjk2ZDhmMDNlNDM4MDFmNmQ5ZWRkZDc3MzM2MDk2MjAyZDA2MjQ4NzdhYzQ3YWE2NmEzZGE1IiwidGFnIjoiIn0%3D; expires=Fri, 29 Aug 2025 06:39:55 GMT; Max-Age=7200; path=/; httponly; samesite=lax
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Unauthenticated.&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETconfirm-password" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETconfirm-password"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETconfirm-password"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETconfirm-password" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETconfirm-password">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETconfirm-password" data-method="GET"
      data-path="confirm-password"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETconfirm-password', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETconfirm-password"
                    onclick="tryItOut('GETconfirm-password');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETconfirm-password"
                    onclick="cancelTryOut('GETconfirm-password');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETconfirm-password"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>confirm-password</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETconfirm-password"
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
                              name="Accept"                data-endpoint="GETconfirm-password"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="endpoints-POSTconfirm-password">Confirm the user&#039;s password.</h2>

<p>
</p>



<span id="example-requests-POSTconfirm-password">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://127.0.0.1:8000/confirm-password" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8000/confirm-password"
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

<span id="example-responses-POSTconfirm-password">
</span>
<span id="execution-results-POSTconfirm-password" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTconfirm-password"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTconfirm-password"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTconfirm-password" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTconfirm-password">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTconfirm-password" data-method="POST"
      data-path="confirm-password"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTconfirm-password', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTconfirm-password"
                    onclick="tryItOut('POSTconfirm-password');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTconfirm-password"
                    onclick="cancelTryOut('POSTconfirm-password');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTconfirm-password"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>confirm-password</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTconfirm-password"
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
                              name="Accept"                data-endpoint="POSTconfirm-password"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="endpoints-PUTpassword">Update the user&#039;s password.</h2>

<p>
</p>



<span id="example-requests-PUTpassword">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request PUT \
    "http://127.0.0.1:8000/password" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"current_password\": \"architecto\",
    \"password\": \"architecto\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8000/password"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "current_password": "architecto",
    "password": "architecto"
};

fetch(url, {
    method: "PUT",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-PUTpassword">
</span>
<span id="execution-results-PUTpassword" hidden>
    <blockquote>Received response<span
                id="execution-response-status-PUTpassword"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-PUTpassword"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-PUTpassword" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-PUTpassword">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-PUTpassword" data-method="PUT"
      data-path="password"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('PUTpassword', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-PUTpassword"
                    onclick="tryItOut('PUTpassword');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-PUTpassword"
                    onclick="cancelTryOut('PUTpassword');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-PUTpassword"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-darkblue">PUT</small>
            <b><code>password</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="PUTpassword"
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
                              name="Accept"                data-endpoint="PUTpassword"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>current_password</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="current_password"                data-endpoint="PUTpassword"
               value="architecto"
               data-component="body">
    <br>
<p>Example: <code>architecto</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>password</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="password"                data-endpoint="PUTpassword"
               value="architecto"
               data-component="body">
    <br>
<p>Example: <code>architecto</code></p>
        </div>
        </form>

                    <h2 id="endpoints-POSTlogout">Destroy an authenticated session.</h2>

<p>
</p>



<span id="example-requests-POSTlogout">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://127.0.0.1:8000/logout" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8000/logout"
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

<span id="example-responses-POSTlogout">
</span>
<span id="execution-results-POSTlogout" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTlogout"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTlogout"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTlogout" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTlogout">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTlogout" data-method="POST"
      data-path="logout"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTlogout', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTlogout"
                    onclick="tryItOut('POSTlogout');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTlogout"
                    onclick="cancelTryOut('POSTlogout');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTlogout"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>logout</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTlogout"
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
                              name="Accept"                data-endpoint="POSTlogout"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="endpoints-GETauth-google-redirect">GET auth/google/redirect</h2>

<p>
</p>



<span id="example-requests-GETauth-google-redirect">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://127.0.0.1:8000/auth/google/redirect" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8000/auth/google/redirect"
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

<span id="example-responses-GETauth-google-redirect">
            <blockquote>
            <p>Example response (302):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
location: https://accounts.google.com/o/oauth2/auth?client_id=779101711005-bulf72fjcfo0lcf5sr257b46hmu6cs3i.apps.googleusercontent.com&amp;redirect_uri=http%3A%2F%2Flocalhost%3A8000%2Fauth%2Fgoogle%2Fcallback&amp;scope=openid+profile+email&amp;response_type=code&amp;state=EUZSLmNCtv9eWL9x5KrGMmjTKor8VlA6RNbkOiTN
content-type: text/html; charset=utf-8
access-control-allow-origin: *
access-control-allow-methods: GET, POST, PUT, DELETE, OPTIONS
access-control-allow-headers: Content-Type, Authorization, X-Requested-With, X-XSRF-TOKEN
set-cookie: app_locale=eyJpdiI6IlBldWNGMGE0K0tMSUx5N0oxVk1nZ1E9PSIsInZhbHVlIjoienQxMkNTUVQxNGhmYXB3aEJ3cXppQWpDd1lTTHlxNC9Sa2ZrWGNwbEc2eWc5aFVGWXVSbDI2RDgyY2gzREUyWiIsIm1hYyI6IjhiMjI3YWM1ODJkZGMyOGFiMzQ1MzVlZDIxZmEzZjk5NjhhMGMyM2E0ZjkxYTljZGE2MzU2MTJkYzQwMGJiMWYiLCJ0YWciOiIifQ%3D%3D; expires=Sat, 29 Aug 2026 04:39:56 GMT; Max-Age=31536000; path=/; httponly; samesite=lax; XSRF-TOKEN=eyJpdiI6IlNzcWVBcmZHWVYycCt1RjJ6Rk9PTUE9PSIsInZhbHVlIjoienNPQUd0NmJNTXE4WGVSTGJNQlcwWnVZSm1jUGhqT3RJNWZ2RWc0djhtYk85VTVSRkhIU1ZnMmZiOXlTWE96bzR3b0JCWlJSc0JJV3JjM0VHVGRiaU1IcG9RSnRwK0s0dUJVTUtyQk5GYy9oWUlzTUo1ODVJM2wwc1dUK3ZicFoiLCJtYWMiOiI1ZTFkZDg2ZTBiY2YyNzJlZmRjMDQ1YThjOTNmNTZhNTFkYzE4NTBjNzE4OGQwZjQyZTQyNjU0YzJkOTIyZWU5IiwidGFnIjoiIn0%3D; expires=Fri, 29 Aug 2025 06:39:56 GMT; Max-Age=7200; path=/; samesite=lax; laravel_session=eyJpdiI6Im1uNEJnTDdCZ3hFYU5BQXl6cnZVNFE9PSIsInZhbHVlIjoiOTY0TTdOS1p2WmZYaDhOSFpibC9BclRnOHFraFdqb2l0eWcwQUdPa0JsdWNOaEh6cVlXRmpDNlQvTDNIclcxcCtDZWl4TWlOcXF3a09NSWU2RXAwQThuY3ZJMmRack14b3VJcHk1QkgrZm9lMHJCUTFMb1ZDMlFxL2tsVXp6M1ciLCJtYWMiOiJiNDIwM2ExNWFjZGQ1YWM4NDYxZDZkOWJjYmQwNDE4M2EwYTIwOGYxZGI4ZDhiMGQ3OTU0MjcwNzBmMjA1MzY3IiwidGFnIjoiIn0%3D; expires=Fri, 29 Aug 2025 06:39:56 GMT; Max-Age=7200; path=/; httponly; samesite=lax
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">&lt;!DOCTYPE html&gt;
&lt;html&gt;
    &lt;head&gt;
        &lt;meta charset=&quot;UTF-8&quot; /&gt;
        &lt;meta http-equiv=&quot;refresh&quot; content=&quot;0;url=&#039;https://accounts.google.com/o/oauth2/auth?client_id=779101711005-bulf72fjcfo0lcf5sr257b46hmu6cs3i.apps.googleusercontent.com&amp;amp;redirect_uri=http%3A%2F%2Flocalhost%3A8000%2Fauth%2Fgoogle%2Fcallback&amp;amp;scope=openid+profile+email&amp;amp;response_type=code&amp;amp;state=EUZSLmNCtv9eWL9x5KrGMmjTKor8VlA6RNbkOiTN&#039;&quot; /&gt;

        &lt;title&gt;Redirecting to https://accounts.google.com/o/oauth2/auth?client_id=779101711005-bulf72fjcfo0lcf5sr257b46hmu6cs3i.apps.googleusercontent.com&amp;amp;redirect_uri=http%3A%2F%2Flocalhost%3A8000%2Fauth%2Fgoogle%2Fcallback&amp;amp;scope=openid+profile+email&amp;amp;response_type=code&amp;amp;state=EUZSLmNCtv9eWL9x5KrGMmjTKor8VlA6RNbkOiTN&lt;/title&gt;
    &lt;/head&gt;
    &lt;body&gt;
        Redirecting to &lt;a href=&quot;https://accounts.google.com/o/oauth2/auth?client_id=779101711005-bulf72fjcfo0lcf5sr257b46hmu6cs3i.apps.googleusercontent.com&amp;amp;redirect_uri=http%3A%2F%2Flocalhost%3A8000%2Fauth%2Fgoogle%2Fcallback&amp;amp;scope=openid+profile+email&amp;amp;response_type=code&amp;amp;state=EUZSLmNCtv9eWL9x5KrGMmjTKor8VlA6RNbkOiTN&quot;&gt;https://accounts.google.com/o/oauth2/auth?client_id=779101711005-bulf72fjcfo0lcf5sr257b46hmu6cs3i.apps.googleusercontent.com&amp;amp;redirect_uri=http%3A%2F%2Flocalhost%3A8000%2Fauth%2Fgoogle%2Fcallback&amp;amp;scope=openid+profile+email&amp;amp;response_type=code&amp;amp;state=EUZSLmNCtv9eWL9x5KrGMmjTKor8VlA6RNbkOiTN&lt;/a&gt;.
    &lt;/body&gt;
&lt;/html&gt;</code>
 </pre>
    </span>
<span id="execution-results-GETauth-google-redirect" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETauth-google-redirect"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETauth-google-redirect"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETauth-google-redirect" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETauth-google-redirect">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETauth-google-redirect" data-method="GET"
      data-path="auth/google/redirect"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETauth-google-redirect', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETauth-google-redirect"
                    onclick="tryItOut('GETauth-google-redirect');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETauth-google-redirect"
                    onclick="cancelTryOut('GETauth-google-redirect');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETauth-google-redirect"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>auth/google/redirect</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETauth-google-redirect"
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
                              name="Accept"                data-endpoint="GETauth-google-redirect"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="endpoints-GETauth-google-callback">GET auth/google/callback</h2>

<p>
</p>



<span id="example-requests-GETauth-google-callback">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://127.0.0.1:8000/auth/google/callback" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8000/auth/google/callback"
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

<span id="example-responses-GETauth-google-callback">
            <blockquote>
            <p>Example response (302):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
location: http://127.0.0.1:8000/login
content-type: text/html; charset=utf-8
access-control-allow-origin: *
access-control-allow-methods: GET, POST, PUT, DELETE, OPTIONS
access-control-allow-headers: Content-Type, Authorization, X-Requested-With, X-XSRF-TOKEN
set-cookie: app_locale=eyJpdiI6ImJKbWN6SDlMVHpIbWUvNVlPekZqOWc9PSIsInZhbHVlIjoiZzdQQm5pOHg1MU85MjZIZGswVlhwbUZlWVllQWtTUmU3WUFwd0tKcElmN0s5czNJS0JseTl0RjkrdVRoRUhsayIsIm1hYyI6IjRmZTJjYzgyMWFmZTY2NzgwZjNhNmUyNjA5NjcwMzE2ZWU5Yzc5ZjgwODBkYTBhYjY4ZTA1NjcwYzYzZGNkY2YiLCJ0YWciOiIifQ%3D%3D; expires=Sat, 29 Aug 2026 04:39:56 GMT; Max-Age=31536000; path=/; httponly; samesite=lax; XSRF-TOKEN=eyJpdiI6Ing5aUhNM2o1dkhoRUlCVnhDU0VWMGc9PSIsInZhbHVlIjoidmtqbEM2ZkhFNHVCSm1mRW12V2dZR1k1ZFpiK2F3ak5ZVlpVQ3dESzdnTXp5Y0tTWUFCcjNDSDByeUpUdVFoNjBuNWQraWtqeFBJcHdBMVFLWWFDNjVtRnBobVdjUXhTVDJZejQ3YVJKMzZmMUFwRHRrSG1TRnBDTzA0WUlrcUQiLCJtYWMiOiJjY2QxZTdjNmRiMzg5MmQwNjA2MDdhZDNmYmQxNTIzMzllY2E1NDIyZjU1MDU3ZWMwZWJiMmYyOGI5NjQzMmRmIiwidGFnIjoiIn0%3D; expires=Fri, 29 Aug 2025 06:39:56 GMT; Max-Age=7200; path=/; samesite=lax; laravel_session=eyJpdiI6IlFRbC9vWW9wM1VSZEZJZDhUYUxGMFE9PSIsInZhbHVlIjoicENXZllVK2xBTjMyZGcvenRsMXpCZzNObG5oQlNmYzFwOURQRGNzZlpEbGhTRWVxdklpb09LTkdvVzJ6L3FHWmZwQ2xlQjI2NmJ3QklHckNMdlV5VnNRK2plZ0xUS040bHdRbEVoSWdBbWpiYVp3L3YzendtR1VGcGtZdDYvemwiLCJtYWMiOiJmOTllNTI1M2U2YmZkOWFiZWNlMGE4YmY3ZDJkNzhmMjJlMjVkMzU3ODYwYWNjZjM4NjM5N2JhNjQ4Njk0ZGI3IiwidGFnIjoiIn0%3D; expires=Fri, 29 Aug 2025 06:39:56 GMT; Max-Age=7200; path=/; httponly; samesite=lax
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">&lt;!DOCTYPE html&gt;
&lt;html&gt;
    &lt;head&gt;
        &lt;meta charset=&quot;UTF-8&quot; /&gt;
        &lt;meta http-equiv=&quot;refresh&quot; content=&quot;0;url=&#039;http://127.0.0.1:8000/login&#039;&quot; /&gt;

        &lt;title&gt;Redirecting to http://127.0.0.1:8000/login&lt;/title&gt;
    &lt;/head&gt;
    &lt;body&gt;
        Redirecting to &lt;a href=&quot;http://127.0.0.1:8000/login&quot;&gt;http://127.0.0.1:8000/login&lt;/a&gt;.
    &lt;/body&gt;
&lt;/html&gt;</code>
 </pre>
    </span>
<span id="execution-results-GETauth-google-callback" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETauth-google-callback"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETauth-google-callback"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETauth-google-callback" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETauth-google-callback">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETauth-google-callback" data-method="GET"
      data-path="auth/google/callback"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETauth-google-callback', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETauth-google-callback"
                    onclick="tryItOut('GETauth-google-callback');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETauth-google-callback"
                    onclick="cancelTryOut('GETauth-google-callback');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETauth-google-callback"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>auth/google/callback</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETauth-google-callback"
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
                              name="Accept"                data-endpoint="GETauth-google-callback"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="endpoints-GETstorage--path-">GET storage/{path}</h2>

<p>
</p>



<span id="example-requests-GETstorage--path-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://127.0.0.1:8000/storage/|{+-0p" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8000/storage/|{+-0p"
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

<span id="example-responses-GETstorage--path-">
            <blockquote>
            <p>Example response (403):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
access-control-allow-origin: *
access-control-allow-methods: GET, POST, PUT, DELETE, OPTIONS
access-control-allow-headers: Content-Type, Authorization, X-Requested-With, X-XSRF-TOKEN
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETstorage--path-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETstorage--path-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETstorage--path-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETstorage--path-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETstorage--path-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETstorage--path-" data-method="GET"
      data-path="storage/{path}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETstorage--path-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETstorage--path-"
                    onclick="tryItOut('GETstorage--path-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETstorage--path-"
                    onclick="cancelTryOut('GETstorage--path-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETstorage--path-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>storage/{path}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETstorage--path-"
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
                              name="Accept"                data-endpoint="GETstorage--path-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>path</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="path"                data-endpoint="GETstorage--path-"
               value="|{+-0p"
               data-component="url">
    <br>
<p>Example: <code>|{+-0p</code></p>
            </div>
                    </form>

                <h1 id="product">Product</h1>

    

                                <h2 id="product-GETapi-products-search">Search products (User)</h2>

<p>
</p>



<span id="example-requests-GETapi-products-search">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://127.0.0.1:8000/api/products/search?search=%22iPhone%22&amp;category=1&amp;min_price=1000000&amp;max_price=5000000&amp;sort=price_asc" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8000/api/products/search"
);

const params = {
    "search": ""iPhone"",
    "category": "1",
    "min_price": "1000000",
    "max_price": "5000000",
    "sort": "price_asc",
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

<span id="example-responses-GETapi-products-search">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;data&quot;: [
        {
            &quot;products_id&quot;: 1,
            &quot;product_name&quot;: &quot;iPhone 13&quot;,
            &quot;product_price&quot;: 20000000,
            &quot;image_path&quot;: &quot;...&quot;
        }
    ]
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-products-search" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-products-search"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-products-search"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-products-search" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-products-search">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-products-search" data-method="GET"
      data-path="api/products/search"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-products-search', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-products-search"
                    onclick="tryItOut('GETapi-products-search');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-products-search"
                    onclick="cancelTryOut('GETapi-products-search');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-products-search"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/products/search</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-products-search"
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
                              name="Accept"                data-endpoint="GETapi-products-search"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                            <h4 class="fancy-heading-panel"><b>Query Parameters</b></h4>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>search</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="text" style="display: none"
                              name="search"                data-endpoint="GETapi-products-search"
               value=""iPhone""
               data-component="query">
    <br>
<p>Từ khóa tìm kiếm theo tên sản phẩm. Example: <code>"iPhone"</code></p>
            </div>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>category</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="number" style="display: none"
               step="any"               name="category"                data-endpoint="GETapi-products-search"
               value="1"
               data-component="query">
    <br>
<p>Lọc theo category id. Example: <code>1</code></p>
            </div>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>min_price</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="number" style="display: none"
               step="any"               name="min_price"                data-endpoint="GETapi-products-search"
               value="1000000"
               data-component="query">
    <br>
<p>Giá tối thiểu. Example: <code>1000000</code></p>
            </div>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>max_price</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="number" style="display: none"
               step="any"               name="max_price"                data-endpoint="GETapi-products-search"
               value="5000000"
               data-component="query">
    <br>
<p>Giá tối đa. Example: <code>5000000</code></p>
            </div>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>sort</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="text" style="display: none"
                              name="sort"                data-endpoint="GETapi-products-search"
               value="price_asc"
               data-component="query">
    <br>
<p>Sắp xếp (price_asc, price_desc, name_asc, name_desc, latest). Example: <code>price_asc</code></p>
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
