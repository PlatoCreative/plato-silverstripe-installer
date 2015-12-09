<% if HomeTiles %>
<% if HomeTilesLayout == 1 %>
<div class="home-tiles-layout-one home-tiles">
    <div class="row large-up-3 medium-up-3 small-up-1" data-equalizer>
        <% loop HomeTiles %>
        <div class="home-tile text-center column">
            <% if LinkTo %>
            <a href="$LinkTo.Link">
            <% else_if ExternalLinkURL %>
            <a href="$ExternalLinkURL" target="_blank">
            <% end_if %>
                <% if Image %>
                <div class="home-tile-image" data-interchange="
                    [{$Image.Fill(330, 150).Link}, small],
                    [{$Image.Fill(330, 150).Link}, medium],
                    [{$Image.Fill(330, 150).Link}, large],
                    ">
                </div>
                <% end_if %>
                <% if Title %><h3 class="title">{$Title}</h3><% end_if %>
                <% if Content %><p class="hide-for-medium" data-equalizer-watch>{$Content}</p><% end_if %>
            <% if LinkTo || ExternalLinkURL %>
                <% if LinkTitle %><span class="home-tile-link">{$LinkTitle}</span><% end_if %>
            </a>
            <% end_if %>
        </div>
        <% end_loop %>
    </div>
</div>
<% else_if HomeTilesLayout == 2 %>
<div class="home-tiles-layout-two home-tiles">
    <div class="row large-up-3 medium-up-3 small-up-1" data-equalizer>
        <% loop HomeTiles %>
        <div class="home-tile text-center column">
            <% if LinkTo %>
            <a href="$LinkTo.Link">
            <% else_if ExternalLinkURL %>
            <a href="$ExternalLinkURL" target="_blank">
            <% end_if %>
                <% if Image %>
                <div class="home-tile-image" data-interchange="
                    [{$Image.Fill(330, 150).Link}, small],
                    [{$Image.Fill(330, 150).Link}, medium],
                    [{$Image.Fill(330, 150).Link}, large],
                    ">
                    <div class="home-tile-content">
                    <% if Title %><h3 class="title">{$Title}</h3><% end_if %>
                    <% if Content %><p class="hide-for-medium" data-equalizer-watch>{$Content}</p><% end_if %>
                    <% if LinkTo || ExternalLinkURL %><% if LinkTitle %><span class="home-tile-link">{$LinkTitle}</span><% end_if %><% end_if %>
                    </div>
                </div>
                <% end_if %>

            <% if LinkTo || ExternalLinkURL %>
            </a>
            <% end_if %>
        </div>
        <% end_loop %>
    </div>
</div>
<% end_if %>
<% end_if %>
