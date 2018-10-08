<h1>Login</h1>
<form method="post" action="login">
    @if($errors->any())
        <div class="alert alert-danger">
            <p>
                {{ $errors->first('email') }}
                {{ $errors->first('password') }}
            </p>
        </div>
    @endif
    {!! csrf_field() !!}
    <input type="text" name="email"><br/>
    <input type="password" name="password"><br/>
    <input type="submit" value="Go">
</form>
<!-- <div>
    <form action="odbcLogin" method="post">
        {!! csrf_field() !!}
        <input type="text" name="name" id="name"><br/>
        <input type="password" name="password" id="password"><br/>
        <input type="submit" value="Submit">
    </form>
</div> -->