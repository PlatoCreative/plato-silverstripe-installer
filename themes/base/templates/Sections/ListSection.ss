<%-- No point in show this section if there is no items --%>
<% if Items %>
<div {$ClassAttr}{$AnchorAttr}>
	<div class="row">
		<div class="column">
			<% loop Items %>
			<div class="item row <% if $MultipleOf(2) %> even<% end_if %>">
				<dt class="title">
					$Title
				</dt>
				<dd class="content">
					$Content
				</dd>
			</div>
			<% end_loop %>
		</div>
	</div>
</div>
<% end_if %>
