<main id="main" class="main-section" role="main" tabindex="3">
	<div class="row">
		<div class="column large-8">
			<% include MemberDetails %>
			<% if $PaginatedList.Exists %>
				<h2>Posts by $CurrentProfile.FirstName $CurrentProfile.Surname for $Title:</h2>
				<% loop $PaginatedList %>
					<% include PostSummary %>
				<% end_loop %>
			<% end_if %>
			<% with $PaginatedList %>
				<% include Pagination %>
			<% end_with %>

			<% if Form %>
			<div class="form">
				$Form
			</div>
			<% end_if %>
			<% if CommentsForm %>
			<div class="form">
				$CommentsForm
			</div>
			<% end_if %>
		</div>
		<div class="column large-4">
			<% include BlogSideBar %>
		</div>
	</div>
</main>
