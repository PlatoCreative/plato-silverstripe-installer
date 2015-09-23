<% include Banner %>

<div class="row">
    <div class="small-12 columns">
        $Content
    </div>
</div>

<div class="row">
    <div class="large-6 medium-6 small-12 columns">
        $Form
    </div>
    <div class="large-6 medium-6 small-12 columns">
        $ExtraContent
        <% if GoogleMap %>
            <div id="contact-map"></div>
            <% include GoogleMap %>
        <% end_if %>
    </div>
</div>
