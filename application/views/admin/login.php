<!DOCTYPE html>
<html>
    <title>W3.CSS</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <body>

        <div class="w3-container" style="margin-top: 100px" >
            <div class="w3-row">
                <div class="w3-col m2 l3">
                    <p></p>
                </div>
                <div class="w3-col m8 l6">
                    <div class="w3-card-4">
                        <div class="w3-container w3-blue">
                            <h2>Login</h2>
                        </div>
                        <!--mensaje-->
                        
                        <?php // if ($this->session->flashdata("error")): ?>
                            <!--<div class="w3-panel w3-red" >-->
                                <?php // echo $this->session->flashdata("error") ?>
                            <!--</div>-->
                        <?php // endif; ?>
                        
                        
                        <!--fin mensaje-->
                        <form class="w3-container" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST" >
                            <p>      
                                <label class="w3-text-blue"><b>Email</b></label>
                                <input class="w3-input w3-border w3-sand" name="email" required="" type="email"></p>
                            <p>      
                                <label class="w3-text-blue"><b>Password</b></label>
                                <input class="w3-input w3-border w3-sand" name="password" required="" type="password"></p>
                            <p>
                                <button type="submit" class="w3-btn w3-blue">Ingresar</button></p>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </body>
</html> 