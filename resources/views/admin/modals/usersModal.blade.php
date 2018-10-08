<div id="usersModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Users</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <form id="frmUsers" method="post" action="submitUser" name="frmUsers">
                    {{ csrf_field() }}
                    <input type="hidden" id="id" name="id">
                    <input type="hidden" id="operation" name="operation">
                    <div class="form-group">
                        <label for="firstname">First Name:</label>
                        <input type="text" class="form-control" id="firstname" name="firstname">
                    </div>
                    <div class="form-group">
                        <label for="lastname">Last Name:</label>
                        <input type="text" class="form-control" id="lastname" name="lastname">
                    </div>
                    <div class="form-group">
                        <label for="email">Email address:</label>
                        <input type="email" class="form-control" id="email" name="email">
                    </div>
                    <div class="form-group">
                        <label for="contact">Contact:</label>
                        <input type="text" class="form-control" id="contact" name="contact">
                    </div>
                    <div class="form-group">
                        <label for="contact">Balance:</label>
                        <input type="text" class="form-control" id="balance" name="balance">
                    </div>
                    <div class="form-group">
                        <label for="usertype">User Type:</label>
                        <select class="form-control" id="usertype" name="usertype">
                            <option selected disabled>--SELECT--</option>
                            <option value="1">Client</option>
                            <option value="2">Agent</option>
                            <option value="3">Admin</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="password">Password:</label>
                        <input type="password" class="form-control" id="password" name="password">
                    </div>
                    <div class="form-group">
                        <label for="password_confirmation">Confirm Password:</label>
                        <input type="password" class="form-control" id="password_confirmation" name="password_confirmation">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-success" id="btnSubmitUser">Submit</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>