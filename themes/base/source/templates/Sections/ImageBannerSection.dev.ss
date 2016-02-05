<div {$ClassAttr}{$AnchorAttr}>
	<div class="slider cycle-slideshow"
		data-cycle-fx="ease"
		data-cycle-speed="500"
		data-cycle-timeout="6000"
		data-cycle-slides=">.slide"
		data-cycle-pager=">.pager-wrapper>.pager"
		data-cycle-swipe=true
		data-cycle-prev=">.prev"
		data-cycle-next=">.next"
		>
		<% loop Images %>
			<div class="slide"
				data-interchange="
					[{$FocusFill(600, 400).URL}, tiny],
					[{$FocusFill(1000, 400).URL}, medium],
					[{$FocusFill(1400, 400).URL}, large]"
				style="background-position: $PercentageX% $PercentageY%"
				>
			</div>
		<% end_loop %>
		<div class="contents">
			<div class="row">
				<div class="column">
					<% if Title %>
						<p class="title">$Title</p>
					<% end_if %>
					<% if Content %>
						<p class="content">
							$Content
						</p>
					<% end_if %>
					<% if Links %>
					<div class="buttons">
						<% loop Links %>
						<a href="$LinkURL" class="button"{$TrackingAttr}{$TargetAttr}>
							{$Icon}$Title
						</a>
						<% end_loop %>
					</div>
					<% end_if %>
				</div>
			</div>
		</div>
		<% if Images.count() >=2 %>
			<div class="prev">
				<i class="fa fa-chevron-left"></i>
			</div>
			<div class="next">
				<i class="fa fa-chevron-right"></i>
			</div>
			<div class="pager-wrapper">
				<div class="pager"></div>
			</div>
		<% end_if %>
	</div>
</div>
