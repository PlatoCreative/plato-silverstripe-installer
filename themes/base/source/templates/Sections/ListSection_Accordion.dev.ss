<div {$ClassAttr}{$AnchorAttr}>
	<div class="row">
		<div class="column">
			<% if Items %>
				<ul class="accordion" data-accordion>
					<% loop Items %>
						<li class="item accordion-item<% if First %> is-active<% end_if %>" data-accordion-item>
							<a class="accordion-title">$Title</a>
							<div class="accordion-content" data-tab-content>
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
						</li>
					<% end_loop %>
				</ul>
			<% end_if %>
		</div>
	</div>
</div>
