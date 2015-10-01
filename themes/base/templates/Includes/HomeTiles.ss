<% if HomeTiles %>
<% if HomeTilesLayout == 1 %>
<div class="home-tiles-layout-one home-tiles">
    <div class="row">
        <div class="large-12 column">
            <ul class="large-block-grid-3 medium-block-grid-3 small-block-grid-1" data-equalizer>
                <% loop HomeTiles %>
                <li class="home-tile text-center">
                    <% if LinkTo %>
                    <a href="$LinkTo.Link">
                    <% else_if ExternalLinkURL %>
                    <a href="$ExternalLinkURL" target="_blank">
                    <% end_if %>
                        <% if Image %>
                        <div class="home-tile-image" data-interchange="
                            [{$Image.CroppedImage(330, 150).URL}, (small)],
                            [{$Image.CroppedImage(330, 150).URL}, (medium)],
                            [{$Image.CroppedImage(330, 150).URL}, (large)],
                            ">
                        </div>
                        <% end_if %>
                        <% if Title %><h3 class="title">{$Title}</h3><% end_if %>
                        <% if Content %><p class="hide-for-medium" data-equalizer-watch>{$Content}</p><% end_if %>
                    <% if LinkTo || ExternalLinkURL %>
                        <% if LinkTitle %><span class="home-tile-link">{$LinkTitle}</span><% end_if %>
                    </a>
                    <% end_if %>
                </li>
                <% end_loop %>
            </ul>
        </div>
    </div>
</div>
<% else_if HomeTilesLayout == 2 %>
<div class="home-tiles-layout-two home-tiles">
    <div class="row">
        <div class="large-12 column">
            <ul class="large-block-grid-3 medium-block-grid-3 small-block-grid-1" data-equalizer>
                <% loop HomeTiles %>
                <li class="home-tile text-center">
                    <% if LinkTo %>
                    <a href="$LinkTo.Link">
                    <% else_if ExternalLinkURL %>
                    <a href="$ExternalLinkURL" target="_blank">
                    <% end_if %>
                        <% if Image %>
                        <div class="home-tile-image" data-interchange="
                            [{$Image.CroppedImage(330, 150).URL}, (small)],
                            [{$Image.CroppedImage(330, 150).URL}, (medium)],
                            [{$Image.CroppedImage(330, 150).URL}, (large)],
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
                </li>
                <% end_loop %>
            </ul>
        </div>
    </div>
</div>
<% end_if %>
<% end_if %>
