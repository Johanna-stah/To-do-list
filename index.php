<?php include("includes/head.php"); ?>
<body>
    <?php include("includes/header.php"); ?>
    <div class="container">
        <h2>Lösningar</h2>

        <div class="row">
            <div class="right">
                <div id="info">        
                    <h3>Moment 2 - Objektorienterad PHP</h3>
                    <br>

                    <a href="print_activity.php" class="btn">Lista</a>

                    <?php

                        $name = "";
                        $description = "";
                        $errors = [];

                        //get activity
                        
                        if(isset($_POST['name'])){
                            include("includes/classes/Activity.class.php");
                            $activity = new Activity();

                            //get data
                            $name = $_POST['name'];
                            $description = $_POST['description'];

                            //check name
                            if(!$activity->setName($name)) {
                                array_push($errors, "Du måste ange rätt namn.");
                            }
                            //check description
                            if(!$activity->setDescription($description)) {
                                array_push($errors, "Du måste ange rätt beskrivning.");
                            }
                            //store if no error
                            if(sizeof($errors) == 0){
                                if($activity->saveActivity()){
                                    echo "Du har lagt till aktivitet!";
                                    $name = "";
                                    $description = "";
                                } else{
                                    echo "Fel!";
                                }
                            }
                        }
                    ?>

                    <h4>Lägg till i lista</h4>
                    <br>
                    <form method="post" action="index.php">
                    <?php
                        if(sizeof($errors) > 0){
                            echo "<tr></tr>\n";
                            //loop error
                            foreach($errors as $error) {
                                echo "<td>$error</td>\n";
                            }
                            echo "<tr>\n";
                        }
                    ?>
                    <label form="/print_activity.php" for="name">Aktivitet:</label>
                    <input type="text" name="name" id="name" value="<?php echo $name;?>" ></input>
                    <br>
                    <br>
                    <label for="name">Beskrivning:</label>
                    <input type="text" name="description" id="description" value="<?php echo $description;?>" ></input>

                    <input type="submit" value="Lägg till" class="btn" ></input>

                    </form>

                </div><!-- /#info -->
            </div><!-- /.right -->
            <?php include("includes/footer.php"); ?>
        </div><!-- /.row -->        
    </div><!-- /.container -->    
</body>
</html>