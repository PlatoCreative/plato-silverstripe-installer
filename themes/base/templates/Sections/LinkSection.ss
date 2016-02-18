<section {$ClassAttr}{$AnchorAttr}>
	<div class="row">
		<div class="column">
			<% if Title %>
			<h2 class='title'>
				$Title
			</h2>
			<% end_if %>
			<% if ListLinks %>
			<% loop ListLinks %>
				<div class="row">
					<a class="preview<% if $MultipleOf(2) %> even<% end_if %>" href="$LinkURL" {$TargetAttr}{$TrackingAttr}>
						<% if PreviewImage %>
							<% with PreviewImage %>
								<div class="image column small-12 medium-3 large-5" data-interchange="
									[{$FocusFill(450, 315).Link}, small],
									[{$FocusFill(450, 315).Link}, medium],
									[{$FocusFill(450, 315).Link}, large],
									">
								</div>
							<% end_with %>
						<% end_if %>
						<div class="column small-12 medium-9 large-7">
							<div class="contents">
								<% if Title %>
									<p class='title'>
										$Title
									</p>
								<% end_if %>
								<% if Content %>
									<p class="content" data-equalizer-watch>
										{$Content.LimitCharacters(350)}
									</p>
									<% end_if %>
								<% if ReadMore %>
									<span class="more">
										{$Icon}{$ReadMore}
									</span>
								<% else %>
									<span class="more">
										{$Icon}Read more
									</span>
								<% end_if %>
							</div>
						</div>
					</a>
				</div>
			<% end_loop %>
			<% end_if %>
		</div>
	</div>
</section>
