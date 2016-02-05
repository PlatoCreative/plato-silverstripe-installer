<section {$ClassAttr}{$AnchorAttr}>
	<div class="row">
		<div class="column large-6 large-centered large-text-center">
			<% if Title %>
			<h2 class='title'>
				$Title
			</h2>
			<% end_if %>
			<% if Content %>
			<div class='content'>
				$Content
			</div>
			<% end_if %>
		</div>
	</div>
	<div class="row">
		<div class="column large-4 large-centered large-text-center">
			<% if Form %>
			<div class="form">
				$Form
			</div>
			<% end_if %>
		</div>
	</div>
</section>
