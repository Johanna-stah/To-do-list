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

                    <a href="index.php" class="btn">Formulär</a>

                    <h4>lista på aktiviteter</h4>
                    <table>
                        <tr class="list">
                            <td>Aktivitet:</td>
                            <td>Beskrivning:</td>
                            <td>Datum/tid:</td>
                            <td>Ta bort:</td>
                        </tr>
                    </table>

                    <?php
                        include("includes/classes/Activity.class.php");
                        $activity = new Activity();

                        //delete
                        if(isset($_GET['index'])) {
                            $index = intval($_GET['index']);
                            $activity->deleteActivity($index);
                        }

                        $todos = $activity->getActivity();
                        $index = 0;

                        //loop
                        foreach($todos as $todo) {
                    ?>
                    <table>
                        <tr class="list">
                            <td><?= $todo->name; ?></td>
                            <td><?= $todo->description; ?></td>
                            <td><?= $todo->timestamp; ?></td>
                            <td> <a class="btn" href="print_activity.php?index=<?= $index; ?>">Radera</a> </td>
                        </tr>
                    </table>

                    <?php
                            $index++;
                        }
                    ?>

                </div><!-- /#info -->
            </div><!-- /.right -->
            <?php include("includes/footer.php"); ?>
        </div><!-- /.row -->        
    </div><!-- /.container -->    
</body>
</html>