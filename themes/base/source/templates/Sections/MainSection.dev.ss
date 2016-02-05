<main id="main" class="main-section" role="main" tabindex="3">
	<div class="row">
		<div class="column">
			<% if Title %>
			<header class="header" >
				<h1 class='title'>
					$Title
				</h1>
			</header>
			<% end_if %>
			<% if Content %>
			<div class='content'>
				$Content
			</div>
			<% end_if %>
			<% if Form %>
			<div class="form">
				$Form
			</div>
			<% end_if %>
		</div>
	</div>
</main>
