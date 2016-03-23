<section {$ClassAttr}{$AnchorAttr}>
	<div class="row">
		<div class="column">
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
			<% if ContactForm %>
			<div class="form">
				$ContactForm
			</div>
			<% end_if %>
		</div>
	</div>
</section>
