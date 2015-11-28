<li
    class="item $LinkingMode
        <% if Children && not Level(siteconfig.NavgationLevel) %> has-submenu<% end_if %>"
    >
    <a href="{$Link}" title="Go to the $Title page" class="$LinkingMode">
        $MenuTitle
    </a>
    <% if Children &&  not Level(siteconfig.NavgationLevel) %>
    <ul class="submenu menu" data-submenu>
        <% loop Children %>
        <% include NavigationListItem %>
        <% end_loop %>
    </ul>
    <% end_if %>
</li>
