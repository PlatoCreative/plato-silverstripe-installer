<li class="item $LinkingMode <% if Children %> has-submenu<% end_if %>">
    <a href="{$Link}" title="Go to the $Title page" class="$LinkingMode">
        $MenuTitle
    </a>
    <% if Children %>
    <ul class="submenu menu" data-submenu>
        <% loop Children %>
        <% include NavigationListItem %>
        <% end_loop %>
    </ul>
    <% end_if %>
</li>
