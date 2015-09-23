<div class="contain-to-grid">
    <div class="top-bar" data-topbar>
        <header class="title-area">
            <div class="name">
                <h1><a class="siteName" href="">$SiteConfig.Title</a></h1>
            </div>
            <div class="toggle-topbar menu-icon"><a href="#"><span>Menu</span></a></div>
        </header>
        <nav id="primaryNavigation" class="top-bar-section" aria-label="navigation" role="navigation" tabindex="4">
            <ul class="menu right">
                <% loop $Menu(1) %>
                <% include NavigationListItem %>
                <% end_loop %>
            </ul>
        </nav>
    </div>
</div>
