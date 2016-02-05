<div {$ClassAttr}{$AnchorAttr}>
	<div class="slider cycle-slideshow"
		data-cycle-fx="ease"
		data-cycle-speed="500"
		data-cycle-timeout="6000"
		data-cycle-slides=">.slide"
		data-cycle-swipe=true
		>
		<% loop Images %>
			<div class="slide"
				data-interchange="
					[{$FocusFill(600, 300).URL}, tiny],
					[{$FocusFill(1000, 300).URL}, medium],
					[{$FocusFill(1400, 300).URL}, large]"
				style="background-position: $PercentageX% $PercentageY%"
				>
			</div>
		<% end_loop %>
	</div>
</div>
