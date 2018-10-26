<div id="prizesModal" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Prizes</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body">
        <form id="frmPrize" action="submitPrizes" method="post" enctype="multipart/form-data" >
            <input type="hidden" name="id" id="id">
            <input type="hidden" name="operationPrizes" id="operationPrizes">
            {{ csrf_field() }}
            <div class="form-group">
                <label>GameID:</label>
                <input type="text" class="form-control" name="gameid" id="gameid" readonly>
            </div>
            <div class="form-group">
                <label>firstQ:</label>
                <input type="text" class="form-control" name="firstQuarter" id="firstQuarter">
            </div>
            <div class="form-group">
                <label>secondQ:</label>
                <input type="text" class="form-control" name="secondQuarter" id="secondQuarter">
            </div>
            <div class="form-group">
                <label>thirdQ:</label>
                <input type="text" class="form-control" name="thirdQuarter" id="thirdQuarter">
            </div>
            <div class="form-group">
                <label>FourthQ:</label>
                <input type="text" class="form-control" name="fourthQuarter" id="fourthQuarter">
            </div>
            <div class="form-group">
                <label><span>*</span>GrandPrize:</label>
                <input type="text" class="form-control" name="grandPrize" id="grandPrize">
            </div>
            <div class="form-group">
                <label>Pics:</label> 
                <input type="file" multiple="multiple" name="images[]">
            </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-success" id="btnSubmitPrice">Submit</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>