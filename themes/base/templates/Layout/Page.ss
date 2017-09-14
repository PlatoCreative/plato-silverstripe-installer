{$Content}
{$Form}

<button type="button" class="button" data-toggle="offCanvasLeftSplit1">Open Left</button>
<button type="button" class="button" data-toggle="offCanvasRightSplit2">Open Right</button>

<div class="row">
  <div class="small-6 columns">
    <div class="off-canvas-wrapper">
      <div class="off-canvas-absolute position-left" id="offCanvasLeftSplit1" data-off-canvas>
        <!-- Your menu or Off-canvas content goes here -->
      </div>
      <div class="off-canvas-content" style="min-height: 300px;" data-off-canvas-content>
        <p>I have nothing to do with the off-canvas on the right!</p>
      </div>
    </div>
  </div>
  <div class="small-6 columns">
    <div class="off-canvas-wrapper">
      <div class="off-canvas-absolute position-right" id="offCanvasRightSplit2" data-off-canvas>
        <!-- Your menu or Off-canvas content goes here -->
      </div>
      <div class="off-canvas-content" style="min-height: 300px;" data-off-canvas-content>
        <p>Im a unique off-canvas container all on my own!</p>
      </div>
    </div>
  </div>
</div>
