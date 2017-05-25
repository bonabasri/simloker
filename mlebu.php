        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel">
                    <div class="panel-heading" style="text-align: center;">
                        <h1 class="panel-title" style="padding-top:13px;">Sign In</h1><hr>

                        <div style="color: rgba(102,117,127,0.6);">
                            <?php
                            error_reporting(0);
                            if($_GET['action']=='error'){
                                echo "The username and password did not match.";
                            }
                            ?>
                        </div>
                    
                    <div class="panel-body">
                        <form role="form" method="post" action="login-cek.php">
                            <fieldset>
                                <div class="form-group">
                                    <input class="form-control" name="usr_username" type="text" placeholder="Username" autocomplete="off" maxlength="32" autofocus required/>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" name="usr_password" type="password" placeholder="Password" autocomplete="off" maxlength="32" required/>
                                </div>
                                <div class="checkbox" style="text-align: left;">
                                    <label>
                                    <input name="remember" type="checkbox" value="Remember Me">&nbsp;Remember Me
                                    </label>
                                </div><br/>
                                
                                <input type="submit" value="Login" class="btn btn-md btn-primary pull-right">

                        
                            </fieldset>
                        </form>
                    </div>
                    
                </div>
            </div>
        </div>
        <?php include '../sidebar.php'; ?>