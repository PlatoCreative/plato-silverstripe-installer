<% if HomeSlides %>
<div class="home-slides-wrapper">
    <div class="home-slides cycle-slideshow"
        data-cycle-fx="{$SlideEffect}"
        data-cycle-speed="{$SlideSpeed}"
        data-cycle-timeout="{$SlideTimeout}"
        data-cycle-slides="> .home-slide"
        data-cycle-pager=".home-slides-pager"
        data-cycle-swipe=true
        data-cycle-prev="#home-slides-prev"
        data-cycle-next="#home-slides-next"
        >
    <% loop HomeSlides.Exclude("Status", "0") %>
        <div class="home-slide" data-interchange="
            [{$Image.Fill(600, 400).Link}, small],
            [{$Image.Fill(1000, 400).Link}, medium],
            [{$Image.Fill(1400, 400).Link}, large],
            ">
            <div class="home-slide-content">
                <div class="row">
                    <div class="large-12 large-centered column">
                        <h1>{$Title}</h1>
                        <p>{$Content}</p>
                        {$Link}
                    </div>
                </div>
            </div>
        </div>
    <% end_loop %>
    </div>
    <a id="home-slides-prev" href="javascript:;"><i class="fa fa-arrow-left"></i></a>
    <a id="home-slides-next" href="javascript:;"><i class="fa fa-arrow-right"></i></a>
    <div class="home-slides-pager"></div>
</div>
<% end_if %>
