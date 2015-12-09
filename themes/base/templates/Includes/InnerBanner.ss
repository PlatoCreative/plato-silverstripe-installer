<% if BannerTitle && BannerImage %>
<% if BannerLayout == 1 %>
    <div class="banner-layout-one banner-wrapper">
        <div class="banner-content" data-interchange="
            [{$BannerImage.Fill(600, 400).Link}, small],
            [{$BannerImage.Fill(1000, 400).Link}, medium],
            [{$BannerImage.Fill(1400, 400).Link}, large],
            ">
            <div class="row">
                <div class="large-12 large-centered column">
                    <h1>{$BannerTitle}</h1>
                </div>
            </div>
        </div>
    </div>
<% else_if BannerLayout == 2 %>
    <div class="banner-layout-two banner-wrapper row collapse">
        <div class="large-6 medium-6 column">
            <div class="row">
                <div class="large-12  text-center column">
                    <h1>{$BannerTitle}</h1>
                </div>
            </div>
        </div>
        <div class="large-6 medium-6 column">
            <div class="banner-image" data-interchange="
                [{$BannerImage.Fill(600, 400).Link}, small],
                [{$BannerImage.Fill(1000, 400).Link}, medium],
                [{$BannerImage.Fill(1400, 400).Link}, large],
                ">
            </div>
        </div>
    </div>
<% end_if %>
<% end_if %>
