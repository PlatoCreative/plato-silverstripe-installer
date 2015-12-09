<% if GalleryItems %>
<div class="gallery-block">
    <div class="row large-up-5 medium-up-3 small-up-2">
        <% loop GalleryItems %>
        <div class="column">
            <% if VideoURL %>
            <a href="{$VideoURL}" title="<% if Title %>{$Title}<% else %>{$Image.Title}<% end_if %>" class="fancybox-media" rel="gallery">
                <img src="{$Image.CroppedImage(200, 200).URL}" class="th video-thumb" alt="<% if Title %>{$Title}<% else %>{$Image.Title}<% end_if %>" />
            </a>
            <% else %>
            <a href="{$Image.URL}" title="<% if Title %>{$Title}<% else %>{$Image.Title}<% end_if %>" class="fancybox" rel="gallery">
                <img src="{$Image.CroppedImage(200, 200).URL}" class="th" alt="<% if Title %>{$Title}<% else %>{$Image.Title}<% end_if %>" />
            </a>
            <% end_if %>
        </div>
        <% end_loop %>
    </div>
</div>
<% end_if %>
