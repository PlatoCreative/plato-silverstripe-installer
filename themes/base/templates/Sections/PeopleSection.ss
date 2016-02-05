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
			<% if People %>
			<% loop People %>
				<div class="person column medium-6" {$AnchorAttr}>
					<div class="row">
						<% if Image %>
							<% with Image %>
								<img
									src="$FocusFill(340,340).URL"
									class="row column medium-4"
									alt="$Title"
									height="262"
									width="262"
									data-focus-x="$FocusX"
									data-focus-y="$FocusY" />
							<% end_with %>
						<% end_if %>
						<div class="column medium-8">
							<% if Name %>
								<p class='name'>
									$Name
								</p>
							<% end_if %>
							<% if Title %>
								<p class='title'>
									$Title
								</p>
							<% end_if %>
							<% if Description %>
								<div class='description'>
									$Description
								</div>
							<% end_if %>
							<% if Email %>
								<a class='email' href="mailto: $Email">
									<i class="fa fa-at"></i> $Email
								</a>
							<% end_if %>
							<% if Phone %>
								<a class='phone' href="tel: $Phone.PhoneFriendly">
									<i class="fa fa-phone"></i> $Phone
								</a>
							<% end_if %>
							<% if Mobile %>
								<a class='mobile' href="tel: $Mobile.PhoneFriendly">
									<i class="fa fa-mobile"></i> $Mobile
								</a>
							<% end_if %>
						</div>
					</div>
				</div>
			<% end_loop %>
			<% end_if %>
		</div>
	</div>
</section>
