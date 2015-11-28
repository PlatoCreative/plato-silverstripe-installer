<nav id="primaryNavigation" aria-label="navigation" role="navigation" tabindex="4">
    <ul class="menu vertical medium-horizontal" data-responsive-menu="drilldown medium-dropdown">
        <% loop $Menu(1) %>
        <% include NavigationListItem %>
        <% end_loop %>
    </ul>
</nav>
