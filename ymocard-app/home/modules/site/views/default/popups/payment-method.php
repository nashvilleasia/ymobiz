<!-- Button trigger modal -->
<button class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal">
  Launch demo modal
</button>

<!-- Modal -->
<div class="modal fade popup-payment" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog ymo-size">
    <div class="modal-content bs-modal-sm ymo-popup">
      <div class="modal-header popup-header">
      	<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">select payment method</h4>
      </div>
      <div class="modal-body popup-body">
		<div class="row">
			<div class="col-md-12 col-md-offset-3 ymo-radio">
				<input type="radio" name="ymo-radio" id="radio1" class="css-checkbox" checked="checked" />
				<label for="radio1" class="css-label">credit card</label>
				<input type="radio" name="ymo-radio" id="radio2" class="css-checkbox" />
				<label for="radio2" class="css-label">paypal</label>
				<input type="radio" name="ymo-radio" id="radio3" class="css-checkbox" />
				<label for="radio3" class="css-label">ymopay</label>
			</div>
		</div>
      </div>
      <div class="modal-footer popup-footer">
		<div class="row">
			<div class="col-md-6 paypal-btn">
        			<button type="button" class="btn btn-primary" data-target=".bs-modal-lg">back</button>
       				<button type="button" class="btn btn-primary" data-target=".bs-modal-lg">next</button>
        	</div>
      	</div>
      </div>
    </div>
  </div>
</div>