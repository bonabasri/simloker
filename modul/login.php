        <div class="row">
            <div class="col-md-8">
                <div class="login-panel panel panel">
                    <div class="panel-heading" style="text-align: center;">
                        <h1 class="panel-title" style="padding-top:13px;">Login</h1>
                        <br>
                        <div style="color: rgba(102,117,127,0.6);">
                            <?php
                            error_reporting(0);
                            if($_GET['action']=='error'){
                                echo "The username and password did not match.";
                            }
                            ?>
                        </div>
                    
                    <div class="panel-body" style="height: 320px;">
                        <div class="col-md-6 col-md-offset-3">
                        <form role="form" method="post" action="?p=auth">
                            <fieldset>
                                <div class="form-group">
                                    <input class="form-control" name="uname" type="text" placeholder="Username" autocomplete="off" maxlength="32" autofocus required/>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" name="upsw" type="password" placeholder="Password" autocomplete="off" maxlength="32" required/>
                                </div>
                                <div class="checkbox" style="text-align: left;">
                                    <label>
                                    <input name="remember" type="checkbox" value="Remember Me">&nbsp;Remember Me
                                    </label>
                                </div>
                                
                                <input type="submit" name="login" value="Masuk" class="btn btn-md btn-primary btn-block"><br/>Belum Punya Akun?
                                <a style="text-decoration:none;" href="?p=register"> Daftar</a>
                        
                            </fieldset>
                        </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>