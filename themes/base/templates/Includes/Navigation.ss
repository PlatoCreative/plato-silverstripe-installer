<nav id="primaryNavigation" aria-label="navigation" role="navigation">
    <ul class="menu vertical">
        <% loop $Menu(1) %>
        <% include NavigationListItem %>
        <% end_loop %>
    </ul>
</nav>
