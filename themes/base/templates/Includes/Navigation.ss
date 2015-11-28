<nav id="primaryNavigation" class="top-bar-section" aria-label="navigation" role="navigation" tabindex="4">
    <ul class="menu right">
        <% loop $Menu(1) %>
        <% include NavigationListItem %>
        <% end_loop %>
    </ul>
</nav>
