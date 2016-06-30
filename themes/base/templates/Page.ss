<!doctype html>
<html class="no-js" lang="en">
<head>
    <% base_tag %>
    <title><% if $MetaTitle %>$MetaTitle<% else %>$Title<% end_if %> &raquo; $SiteConfig.Title</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    $MetaTags(false)

    <% require themedCSS('app') %>

    <%-- FontAwesome --%>
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css"> -->

    <% if SiteConfig.TypeKitID %>{$TypeKit}<% end_if %>

    <%-- REMOVE BEFORE WEBSITE GOES LIVE --%>
    <% if not IsLive %><meta name="robots" content="noindex, nofollow"><% end_if %>
    <% include GoogleAnalytics trackingId=$SiteConfig.GoogleAnaltyicsID %>
</head>
<body class="$ClassName">
    <% include GoogleTagManager trackingId=$SiteConfig.GoogleTagManager %>
    <% include Header %>
    $Layout
    <% include Footer %>
    <% include CrazyEgg trackingId=$SiteConfig.CrazyEgg %>
</body>
</html>
