<section {$ClassAttr}{$AnchorAttr}>
	<div class="row">
		<div class="column">
			<% if Title %>
			<h2 class='title'>
				$Title
			</h2>
			<% end_if %>
			<% if ListLinks %>
			<div class="row" data-equalizer>
				<% loop ListLinks %>
					<div class="column medium-6 large-4<% if Last %> end<% end_if %>">
						<a class="preview" href="$LinkURL" {$TargetAttr}{$TrackingAttr}>
							<% if PreviewImage %>
								<% with PreviewImage %>
									<div class="image" data-interchange="
										[{$FocusFill(330, 150).Link}, small],
										[{$FocusFill(330, 150).Link}, medium],
										[{$FocusFill(330, 150).Link}, large],
										">
									</div>
								<% end_with %>
							<% end_if %>
							<div class="contents">
								<% if Title %>
									<p class='title'>
										$Title
									</p>
								<% end_if %>
								<% if Content %>
									<p class="content" data-equalizer-watch>
										{$Content}
									</p>
									<% end_if %>
								<% if ReadMore %>
									<span class="more">
										{$Icon}{$ReadMore}
									</span>
								<% end_if %>
							</div>
						</a>
					</div>
				<% end_loop %>
			</div>
			<% end_if %>
		</div>
	</div>
</section>
