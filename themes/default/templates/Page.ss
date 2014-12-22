<!doctype html>
<html class="no-js" lang="en">
<head>
  <% base_tag %>
  <title><% if $MetaTitle %>$MetaTitle<% else %>$Title<% end_if %> &raquo; $SiteConfig.Title</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0" />
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  $MetaTags(false)
      
  <link rel="shortcut icon" href="$ThemeDir/images/favicon.ico" />
  
  <% require themedCSS('app') %>
  <% require themedCSS('typography') %>
  
  <!-- REMOVE BEFORE WEBSITE GOES LIVE -->
  <meta name="robots" content="nofollow" />
  
</head>
<body class="$ClassName">
  
  <header>
    <nav>
    <!-- menu -->
    </nav>
  </header>
  
  $Layout
  
  <footer>
    <p>
      Website design by <a href="http://platocreative.co.nz">Plato Creative</a>
    </p>
  </footer>
    
</body>
</html>
