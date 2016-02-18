<%-- No point in show this section if there is no items --%>
<% if Items %>
<div {$ClassAttr}{$AnchorAttr}>
	<div class="row">
		<div class="column">
			<ul class="tabs" id="Tab{$Anchor}" data-tabs>
				<% loop Items %>
				<li class="tabs-title<% if First %> is-active<% end_if %>"><a href="#{$Anchor}"<% if First %> aria-selected="true"<% end_if %> >$Title</a></li>
				<% end_loop %>
			</ul>
			<dl class="tabs-content" data-tabs-content="Tab{$Anchor}">
				<% loop Items %>
				<div class="tabs-panel<% if First %> is-active<% end_if %>" {$AnchorAttr}>
					<dt class="title">
						$Title
					</dt>
					<dd class="content">
						$Content
					</dd>
				</div>
				<% end_loop %>
			</dl>
		</div>
	</div>
</div>
<% end_if %>
