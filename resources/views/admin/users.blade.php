<<<<<<< HEAD
<div class="wrapper">
    <div class="container">
        <div>
            <input type="button" id="btnAddUsers" class="btn btn-success" value="Add User" style="margin-bottom:10px;">
        </div>
        <div class="row">
            <div class="col-lg-12">
            @if ($errors->any())
                    <div class="alert alert-danger">
                        <p class="alertP">{{ $errors->first('firstname') }}</p>
                        <p class="alertP">{{ $errors->first('lastname') }}</p>
                        <p class="alertP">{{ $errors->first('email') }}</p>
                        <p class="alertP">{{ $errors->first('contact') }}</p>
                        <p class="alertP">{{ $errors->first('password') }}</p>
                        <p class="alertP">{{ $errors->first('balance') }}</p>
                        <p class="alertP">{{ $errors->first('usertype') }}</p>
                    </div>
            @endif
                <table class="table table-bordered" id="tblUsers">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Fullname</th>
                            <th>Email</th>
                            <th>UserType</th>
                            <th>Created_at</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                       
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@include('admin/modals/usersModal')


<script type="text/javascript">
    @if (count($errors) > 0)
        $('#usersModal').modal('show');
    @endif
=======
<div class="wrapper">
    <div class="container">
        <div>
            <input type="button" id="btnAddUsers" class="btn btn-success" value="Add User" style="margin-bottom:10px;">
        </div>
        <div class="row">
            <div class="col-lg-12">
            @if ($errors->any())
                    <div class="alert alert-danger">
                        <p class="alertP">{{ $errors->first('firstname') }}</p>
                        <p class="alertP">{{ $errors->first('lastname') }}</p>
                        <p class="alertP">{{ $errors->first('email') }}</p>
                        <p class="alertP">{{ $errors->first('contact') }}</p>
                        <p class="alertP">{{ $errors->first('password') }}</p>
                        <p class="alertP">{{ $errors->first('balance') }}</p>
                        <p class="alertP">{{ $errors->first('usertype') }}</p>
                    </div>
            @endif
                <table class="table table-bordered" id="tblUsers">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Fullname</th>
                            <th>Email</th>
                            <th>UserType</th>
                            <th>Created_at</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                       
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@include('admin/modals/usersModal')


<script type="text/javascript">
    @if (count($errors) > 0)
        $('#usersModal').modal('show');
    @endif
>>>>>>> test commit
</script>