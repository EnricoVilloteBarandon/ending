<div id="gameModal" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Game</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body">
        <form id="frmGame" enctype="multipart/form-data" method="post" action="submitGame">
            <input type="hidden" name="id" id="id">
            <input type="hidden" name="operation" id="operation" value="0">
            {{ csrf_field() }}
            <div class="form-group">
                <label><span>*</span>Title:</label>
                <input type="text" class="form-control" name="title" id="title">
            </div>
            <div class="form-group">
                <label><span>*</span>Date:</label>
                <input type="text" class="form-control" name="date" id="date">
            </div>
            <div class="form-group">
                <label><span>*</span>Amount:</label>
                <input type="text" class="form-control" name="amount" id="amount">
            </div>
            <div class="form-group">
                <label>Result:</label>
                <input type="text" class="form-control" name="result" id="result">
            </div>
            <div class="form-group">
                <label>Status:</label>
                <select name="status" id="status" class="form-control">
                  <option value="0">Open</option>
                  <option value="1">Close</option>
                </select>
            </div>
            <div class="form-group">
                <label>Pics:</label> 
                <input type="file" multiple="multiple" name="images[]">
            </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-success" id="btnSubmitGame">Submit</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>