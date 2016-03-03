<div id="main" class="main-section" role="main" tabindex="3">
	<div class="row">
		<div class="column medium-9">
			<% if HeadShot %>
				<div class="column medium-4">
					<% with HeadShot %>
						<img data-interchange="[{$Fill(300,300).URL}, small]" alt="{$Title}" />
					<% end_with %>
				</div>
			<% end_if %>
			<main class="column medium-8">
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
			</main>
			<div class="row">
				<div class="column medium-4">
					<h2>
						Date of birth
					</h2>
					<% if Dob %>
						<p>
							$Dob.format("d M o")
						</p>
					<% end_if %>
				</div>
				<div class="column medium-4">
					<h2>
						Home town
					</h2>
					<% if Hometown %>
						<p>
							$Hometown
						</p>
					<% end_if %>
				</div>
				<div class="column medium-4">
					<h2>
						Competitions
					</h2>
					<% if Competitions %>
						<p>
							$Competitions
						</p>
					<% end_if %>
				</div>
				<div class="column medium-4">
					<h2>
						Sponsors
					</h2>
					<% if Sponsors %>
						<p>
							$Sponsors
						</p>
					<% end_if %>
				</div>
				<div class="column medium-4">
					<h2>
						Major teams
					</h2>
					<% if Teams %>
						<p>
							$Teams
						</p>
					<% end_if %>
				</div>
				<div class="column medium-4">
					<h2>
						Bike number
					</h2>
					<% if BikeNumber %>
						<p>
							$BikeNumber
						</p>
					<% end_if %>
				</div>
			</div>
		</div>
		<div class="column medium-3">
			<% include Aside %>
		</div>
	</div>
</div>
