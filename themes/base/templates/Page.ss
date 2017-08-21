<!doctype html>
<html class="no-js" lang="en">
<head>
	<% if SiteConfig.GoogleTagManager %>
		<!-- Google Tag Manager -->
		<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
		new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
		j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
		'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
		})(window,document,'script','dataLayer','$SiteConfig.GoogleTagManager');</script>
		<!-- End Google Tag Manager -->
	<% end_if %>
    <% base_tag %>
    <title><% if $MetaTitle %>$MetaTitle<% else %>$Title<% end_if %> &raquo; $SiteConfig.Title</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<meta name="csrf-token" content="{$SecurityID}">
    $MetaTags(false)

    <%-- FontAwesome --%>
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css"> -->

    <% if SiteConfig.TypeKitID %>{$TypeKit}<% end_if %>

    <%-- REMOVE BEFORE WEBSITE GOES LIVE --%>
    <% if not IsLive %><meta name="robots" content="noindex, nofollow"><% end_if %>
    <% include GoogleAnalytics trackingId=$SiteConfig.GoogleAnaltyicsID %>
</head>
<body class="$ClassName">
    <% include GoogleTagManager %>
    <% include Header %>
    $Layout
    <% include Footer %>
    <% include CrazyEgg trackingId=$SiteConfig.CrazyEgg %>
</body>
</html>
