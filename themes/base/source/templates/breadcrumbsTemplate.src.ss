<% if Pages %>
<nav class="breadcrumbs" aria-label="breadcrumbs" role="navigation">
    <li class="item"><a href="/">Home</a></li>
    <%-- use css :after to add things like / or > --%>
    <% loop Pages %>
    <% if Last %>
        <li class="item last current">
            $Title.XML
    <% else %>
        <li class="item">
            <a href="$Link">
                $MenuTitle.XML
            </a>
    <% end_if %>
    </li>
    <% end_loop %>
</nav>
<% end_if %>