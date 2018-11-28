<?php
require_once dirname(__FILE__) . '/conn.php'; 

$fetch = $conn->prepare("SELECT * FROM prototypeshelter_JDeS ORDER BY `prototypeshelter_JDeS`.`date` DESC");
$fetch->execute();

$prototype_url = '//'.$_SERVER['HTTP_HOST'].'/prototypeshelter/';


while ($row = $fetch->fetch(PDO::FETCH_ASSOC)) {

?>
<tr>
    <?php
    if ($row["version"] == "0") {
        ?>
        <td><a href="<?php echo $prototype_url.$row['prototype']; ?>" target="_blank"><?php echo $row["prototype"]; ?></a></td>
        <td>Pilot</td>
        <?php
    } else {
        ?>
        <td><a href="<?php echo $prototype_url.$row['prototype']; ?>-v<?php echo $row["version"]; ?>" target="_blank"><?php echo $row["prototype"]; ?></a></td>
        <td><?php echo $row["version"]; ?></td>
        <?php
    }
    ?>
    <td><a href="#" id="<?php echo $row["id"]; ?>" class="deletePrototype">X</a></td>
</tr>
<?php
}