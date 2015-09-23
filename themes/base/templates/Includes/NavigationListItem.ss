<li class="item $LinkingMode <% if Children %>has-submenu has-dropdown<% end_if %>">
    <a href="{$Link}" title="Go to the $Title page" class="$LinkingMode">$MenuTitle</a>
    <% if Children %>
    <ul class="child dropdown">
        <% loop Children %>
        <% include NavigationListItem %>
        <% end_loop %>
    </ul>
    <% end_if %>
</li>
