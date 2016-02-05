<div {$ClassAttr}{$AnchorAttr}>
	<div class="row">
		<div class="column medium-centered medium-8 large-6">
			<blockquote class='blockquote'>
				<% if Quote %>
				<p>
					$Quote
				</p>
				<% end_if %>
				<% if Citation %>
				<footer>
					<cite class='cite'>
						$Citation
					</cite>
				</footer>
				<% end_if %>
			</blockquote>
		</div>
	</div>
</div>
