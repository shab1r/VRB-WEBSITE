<?php
include_once 'header.php'
?>
    <div class = "wrapper">    
        <section class="form container_login">
            
            <div>
            <?php if (isset($_SESSION["useruid"])): header("location: /index.php");?>
            <?php else : ?>
                <h1>Log in</h1>
                <form action="/includes/login.inc.php" method="post">
                    <input class="login_flied" type="text" name="uid" placeholder="Username...">
                    <input class="login_flied" type="password" name="pwd" placeholder="Password...">
                    <button class="button"  type="submit" name="submit">Log In</button>
                </form>
            <?php endif; ?>

            </div>


            <?php
                if(isset($_GET["error"]))
                {
                    if($_GET["error"] == "emptyinput" ){
                        echo "<p>Please fill in all the fields</p>";
                    }else if($_GET["error"] == "wronglogin"){
                        echo "<p>username not exist</p>";
                    }elseif($_GET["error"] == "wrongpass"){
                        echo "<p>Wrong password</p>";
                    }
                }
            ?>
        </section>
    </div>

<?php
    include_once 'footer.php'
?>