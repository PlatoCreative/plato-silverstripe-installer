<footer class="footer">
    <div class="row">
        <div class="large-4 medium-6 column">
            <% include Phone Numbers=$SiteConfig.Phones %>
            <ul>                
                <% with SiteConfig %>
                <% if PhysicalAddress %><li><a href="map:{$PhysicalAddress}"><i class="fa fa-map-marker fa-fw"></i> {$PhysicalAddress}</a></li><% end_if %>
                <% if PostalAddress %><li><a href="javascript:;"><i class="fa fa-envelope fa-fw"></i> {$PostalAddress}</a></li><% end_if %>
                <% end_with %>
            </ul>
        </div>
        <div class="large-4 medium-6 column">
            <ul class="text-center medium-only-text-right small-only-text-left">
                <% with SiteConfig %>
                <% if FacebookURL %><li><a href="{$SiteConfig.FacebookURL}" target="_blank"><i class="fa fa-facebook fa-fw"></i> Facebook</a></li><% end_if %>
                <% if TwitterURL %><li><a href="{$SiteConfig.TwitterURL}" target="_blank"><i class="fa fa-twitter fa-fw"></i> Twitter</a></li><% end_if %>
                <% if InstagramURL %><li><a href="{$SiteConfig.InstagramURL}" target="_blank"><i class="fa fa-instagram fa-fw"></i> Instagram</a></li><% end_if %>
                <% if PinterestURL %><li><a href="{$SiteConfig.PinterestURL}" target="_blank"><i class="fa fa-pinterest-p fa-fw"></i> Pinterest</a></li><% end_if %>
                <% if LinkedInURL %><li><a href="{$SiteConfig.LinkedInURL}" target="_blank"><i class="fa fa-linkedin fa-fw"></i> LinkedIn</a></li><% end_if %>
                <% if YoutubeURL %><li><a href="{$SiteConfig.YoutubeURL}" target="_blank"><i class="fa fa-youtube fa-fw"></i> Youtube</a></li><% end_if %>
                <% end_with %>
            </ul>
        </div>
    </div>
</footer>
<footer class="footer contentInfo" role="contentInfo">
    <div class="row">
        <div class="text-center column">
            <small class="copyright" rel="license">&copy; Copyright $SiteConfig.Title $Now.Year</small>
            <small class="createdBy">Website design by <a href="http://platocreative.co.nz" target="_blank">Plato Creative</a></small>
        </div>
    </div>
</footer>
