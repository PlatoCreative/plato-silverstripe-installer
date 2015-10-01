<!doctype html>
<html class="no-js" lang="en">
<head>
  <% base_tag %>
  <title><% if $MetaTitle %>$MetaTitle<% else %>$Title<% end_if %> &raquo; $SiteConfig.Title</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  $MetaTags(false)

  <link rel="shortcut icon" href="$ThemeDir/images/favicon.ico" />

  <% require themedCSS('app') %>
  <% require themedCSS('typography') %>

    <%-- FontAwesome --%>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">

  <%-- REMOVE BEFORE WEBSITE GOES LIVE --%>
  <% if not IsLive %><meta name="robots" content="noindex, nofollow"><% end_if %>

</head>
<body class="$ClassName">

  <% if SiteConfig.GoogleTagManager %>
		<!-- Google Tag Manager -->
		<noscript><iframe src="//www.googletagmanager.com/ns.html?id=$SiteConfig.GoogleTagManager"
		height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
		<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
		new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
		j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
		'//www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
		})(window,document,'script','dataLayer','$SiteConfig.GoogleTagManager');</script>
		<!-- End Google Tag Manager -->
	<% end_if %>

  <% include Header %>

  $Layout

  <% include Footer %>

</body>
</html>
