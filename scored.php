<?php 
$scored = "false";
$score_file = "../scored.txt";

if ($_POST["pw"] == "supersecretpassword") {
    if (file_exists($score_file)) {
        $handle = fopen($score_file, "r");
        $scored = fread($handle, filesize($score_file));
        fclose($handle);
    }
    
    $scored = $_POST["scored"];

    $fp = fopen($score_file, 'w');
    fwrite($fp, $scored);
    fclose($fp);

    header('Location: /');
} else { ?>
    <form action="scored.php" method="post">
        <select name="scored">
            <option value="true">yes</option>
            <option value="false">no</option>
            <option value="shootout">shootout</option>
            <option value="shutout">shutout</option>
        </select>
        confirm that he scored: <input type="password" name="pw" />
    </form>
<?php } ?>
