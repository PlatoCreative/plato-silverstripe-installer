<%-- No point in show this section if there is no items --%>
<% if Items %>
<div {$ClassAttr}{$AnchorAttr}>
	<div class="row">
		<div class="column">
			<dl class="accordion" data-accordion>
				<% loop Items %>
				<div class="item accordion-item<% if First %> is-active<% end_if %>" data-accordion-item>
					<dt class="accordion-title">
						$Title
					</dt>
					<dd class="accordion-content" data-tab-content>
						$Content
					</dd>
				</div>
				<% end_loop %>
			</dl>
		</div>
	</div>
</div>
<% end_if %>
