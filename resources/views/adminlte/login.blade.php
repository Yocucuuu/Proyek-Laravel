@extends('home')

@section('body')

@if (Session::has("error"))
    <script>alert("User not found") </script>
@endif

<div id="loginbox">
    <form class="form-vertical" action="/OlahLogin" method="POST">
        @csrf
         <div class="control-group normal_text"> <h3><img src="img/logo.png" alt="Logo" /></h3></div>
        <div class="control-group">
            <div class="controls">
                <div class="main_input_box">
                    <span class="add-on bg_lg"><i class="icon-user"> </i></span><input type="text" placeholder="Username" name="user" />
                    @error('user')
                        <br><span style="color: red;">{{ $message }}</span>
                    @enderror
                </div>
            </div>
        </div>
        <div class="control-group">
            <div class="controls">
                <div class="main_input_box">
                    <span class="add-on bg_ly"><i class="icon-lock"></i></span><input type="password" placeholder="Password" name="pw" />
                    @error('pw')
                        <br><span style="color: red;">{{ $message }}</span>
                    @enderror
                </div>
            </div>
        </div>
        <div class="control-group">
            <div class="controls">
                <div class="main_input_box">
                    <button type="submit" class="pull btn btn-success">Login</button>
                </div>
            </div>
        </div>
    </form>
</div>

<script src="js/jquery.min.js"></script>
<script src="js/matrix.login.js"></script>
@endsection

