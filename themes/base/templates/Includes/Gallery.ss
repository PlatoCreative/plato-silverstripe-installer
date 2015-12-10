<% if GalleryItems %>

<% require css("thirdparty/fancybox/source/jquery.fancybox.css") %>
<% require css("thirdparty/fancybox/source/helpers/jquery.fancybox-buttons.css") %>

<div class="gallery-block">
    <div class="row">
        <div class="large-12 medium-12 small-12 columns">
            <ul class="large-block-grid-5 medium-block-grid-3 small-block-grid-2">
                <% loop GalleryItems %>
                <li>
                    <% if VideoURL %>
                    <a href="{$VideoURL}" title="<% if Title %>{$Title}<% else %>{$Image.Title}<% end_if %>" class="fancybox-media" rel="gallery">
                        <img src="{$Image.CroppedImage(200, 200).URL}" class="th video-thumb" alt="<% if Title %>{$Title}<% else %>{$Image.Title}<% end_if %>" />
                    </a>
                    <% else %>
                    <a href="{$Image.URL}" title="<% if Title %>{$Title}<% else %>{$Image.Title}<% end_if %>" class="fancybox" rel="gallery">
                        <img src="{$Image.CroppedImage(200, 200).URL}" class="th" alt="<% if Title %>{$Title}<% else %>{$Image.Title}<% end_if %>" />
                    </a>
                    <% end_if %>
                </li>
                <% end_loop %>
            </ul>
        </div>
    </div>
</div>
<% end_if %>
