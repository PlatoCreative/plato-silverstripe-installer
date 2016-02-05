<div {$ClassAttr}{$AnchorAttr}>
	<div class="row">
		<div class="column">
			<% if Images %>
			<div class="row">
				<% loop Images %>
				<div class="gallery-item column small-6 medium-4<% if Last %> end<% end_if %>">
					<a href="{$URL}"
						title="{$Title}"
						class="fancybox"
						rel="gallery">
						<img src="{$Fill(330, 240).URL}" class="img" alt="{$Title}" />
					</a>
				</div>
				<% end_loop %>
			</div>
			<% end_if %>
		</div>
	</div>
</div>
