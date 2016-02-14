<div {$ClassAttr}{$AnchorAttr}>
	<div class="row">
		<div class="column">
			<% loop Items %>
				<div class="item row <% if $MultipleOf(2) %> even<% end_if %>">
					<% if Title %>
						<p class="title">$Title</p>
					<% end_if %>
					<% if Image %>
					<% with Image %>
					<img class="slide"
						data-interchange="
							[{$FocusFill(400, 400).URL}, tiny],
							[{$FocusFill(400, 400).URL}, medium],
							[{$FocusFill(400, 400).URL}, large]"
						/>
					<% end_with %>
					<% end_if %>
					<% if Content %>
						<p class="content">
							$Content
						</p>
					<% end_if %>
					<% if Links %>
					<div class="buttons">
						<% loop Links %>
						<a href="$LinkURL" class="button"{$TrackingAttr}{$TargetAttr}>
							{$Icon}$Title
						</a>
						<% end_loop %>
					</div>
					<% end_if %>
				</div>
			<% end_loop %>
		</div>
	</div>
</div>
