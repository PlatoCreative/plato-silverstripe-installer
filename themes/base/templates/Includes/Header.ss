<div class="top-bar" data-topbar>
    <header class="title-area">
        <div class="name">
            <% with SiteConfig %>
            <a class="siteName" href="$BaseDir">
                <% if Logo %>
                    <img
                    title='{$Title}'
                    data-interchange="
                        [$Logo.Fit(90, 90).URL, small],
                        [$Logo.Fit(180, 180).URL, medium],
                        [$Logo.Fit(180, 180).URL, large]"
                        />
                <% else %>
                    $Title
                <% end_if %>
            </a>
            <% end_with %>
        </h1>
    </div>
    <% include Phone Number=$SiteConfig.MainPhone %>
</header>
<% include Navigation %>
</div>
