<% if Number %>
<% with Number %>
<a href="tel:{$Number.PhoneFriendly}">
    <i class="fa fa-{$Icon} fa-fw"></i> {$Title}
</a>
<% end_with %>
<% end_if %>

<% if Numbers %>
<ul class='numbers'>
    <% loop Numbers.sort('Sort ASC') %>
    <li>
        <a href="tel:{$Number.PhoneFriendly}">
            <i class="fa fa-{$Icon} fa-fw"></i> {$Title}
        </a>
    </li>
    <% end_loop %>
</ul>
<% end_if %>
