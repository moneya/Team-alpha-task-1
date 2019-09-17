<div class="container">
        
        <form method="post" action="">
            <div id="div_login">
                <h1>Login</h1>
                <?php
                if (isset($_POST['username']) and isset($_POST['password'])){
                if($failmsg){
                    echo "$failmsg";
                }
            }
                
                ?>
                <div>
                    <input type="text" class="textbox" id="txt_uname" name="username" placeholder="Username" />
                </div>
                <div>
                    <input type="password" class="textbox" id="txt_uname" name="password" placeholder="Password"/>
                </div>
                <div>
                    <input type="submit" value="Submit" name="but_submit" id="but_submit" />
                </div>
            </div>
        </form>
    </div>