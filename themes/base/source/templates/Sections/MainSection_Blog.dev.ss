<main id="main" class="main-section" role="main" tabindex="3">
	<div class="row">
		<div class="column large-8">
			<article class="article">

			</article>
			<header class="header" >
				<h1>
					<% if $ArchiveYear %>
						Archive:
						<% if $ArchiveDay %>
							$ArchiveDate.Nice
						<% else_if $ArchiveMonth %>
							$ArchiveDate.format('F, Y')
						<% else %>
							$ArchiveDate.format('Y')
						<% end_if %>
					<% else_if $CurrentTag %>
						Tag: $CurrentTag.Title
					<% else_if $CurrentCategory %>
						Category: $CurrentCategory.Title
					<% else %>
						$Title
					<% end_if %>
				</h1>
			</header>
			<% if Content %>
			<div class='content'>
				$Content
			</div>
			<% end_if %>
			<% if AllChildren %>
				<% loop AllChildren %>
					<% include PostSummary %>
				<% end_loop %>
			<% else %>
				<p>There are no posts</p>
			<% end_if %>
			<% with $PaginatedList %>
				<% include Pagination %>
			<% end_with %>
		</div>
		<div class="column large-4">
			<% include BlogSideBar %>
		</div>
	</div>
</main>
