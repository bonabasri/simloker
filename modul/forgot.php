        <div class="row">
            <div class="col-md-8">
                <div class="login-panel panel panel">
                    <div class="panel-heading" style="text-align: center;">
                        <h1 class="panel-title" style="padding-top:13px;">Lupa Password</h1>
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
                        <form role="form" method="post" action="#">
                            <fieldset>
                                <div class="form-group">
                                    <input class="form-control" name="uname" type="text" placeholder="Username or Email" autocomplete="off" maxlength="32" autofocus required/>
                                </div>
                                
                                <input type="submit" name="forgot" value="Submit" class="btn btn-md btn-primary btn-block">
                            </fieldset>
                        </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>