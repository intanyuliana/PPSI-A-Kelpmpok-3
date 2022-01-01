<div class="row">
            <div class="col-md">
                <div class="login-panel panel panel">
                    <div class="panel-heading" style="text-align: center;">
                        <h1 class="panel-title" style="padding-top:13px;">Sign Up</h1>
                        <br>
                        <div style="color: rgba(102,117,127,0.6);">
                            
                        </div>
                    
                    <div class="panel-body" style="height: 320px;">
                        <div class="col-md-6 col-md-offset-3">
                        <form role="form" method="post" action="?p=auth">
                            <fieldset>
                                <div class="form-group">
                                    <input class="form-control" name="uname" type="text" placeholder="Username" autocomplete="off" maxlength="32" autofocus required/>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" name="pass" type="password" placeholder="Password" autocomplete="off" maxlength="32" required/>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" name="email" type="text" placeholder="Email" autocomplete="off" maxlength="32" autofocus required/>
                                </div>
                                <input type="hidden" name="uac" value="PERUSAHAAN">
                                
                                <input type="submit" name="daftar" value="Register" class="btn btn-md btn-primary btn-block"><br/>Punya Akun?
                                <a style="text-decoration:none;" href="?p=login"> Masuk</a>
                        
                            </fieldset>
                        </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>