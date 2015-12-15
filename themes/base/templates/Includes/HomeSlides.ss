<% if HomeSlides %>
<div class="banner-wrapper">
    <div class="banner cycle-slideshow"
        data-cycle-fx="{$SlideEffect}"
        data-cycle-speed="{$SlideSpeed}"
        data-cycle-timeout="{$SlideTimeout}"
        data-cycle-slides="> .slide"
        data-cycle-pager="> .pager"
        data-cycle-swipe=true
        data-cycle-prev="> .prev"
        data-cycle-next="> .next"
        >
    <% loop HomeSlides.Exclude("Status", "0") %>
        <div class="slide" data-interchange="
            [{$Image.Fill(600, 400).Link}, small],
            [{$Image.Fill(1000, 400).Link}, medium],
            [{$Image.Fill(1400, 400).Link}, large],
            ">
            <div class="home-slide-content">
                <div class="row">
                    <div class="large-12 large-centered column">
                        <p class='title'>{$Title}</p>
                        <p class='content'>{$Content}</p>
                        {$Link}
                    </div>
                </div>
            </div>
        </div>
    <% end_loop %>
    <% if HomeSlides.Exclude("Status", "0").Count > 1 %>
    <div class="prev"><i class="fa fa-chevron-left"></i></div>
    <div class="next"><i class="fa fa-chevron-right"></i></div>
    <div class="pager"></div>
    <% end_if %>
    </div>
</div>
<% end_if %>
