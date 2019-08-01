  <?php
  $nt="<p>Not Filled</p>" ;
  $query = $link->query("SELECT COLUMN_NAME FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_SCHEMA = 'table schema' AND TABLE_NAME = 'tablename'");
  $co=$link->query("SELECT COUNT(*) AS count FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_SCHEMA = 'table schema' AND TABLE_NAME = 'tablename'");
  $row = mysqli_fetch_array($co);
  $count = $row['count'];
  while($row = $query->fetch_assoc()){
      $result[] = $row;
  }
  $sq = $link->query("SELECT * FROM `tablename` WHERE `Roll No`='$roll'");
  $user = $sq->fetch_array();
  if ($user>0) {
  $columnArr = array_column($result, 'COLUMN_NAME');
  $x=0;
  $a=0;
  $countt= $count-1;
  while ($a <= $countt ) {
    ?>
    <tr>
      <th><?php echo  $columnArr[$x] ?></th>
      <td><?php if($user[$x] != ''){
        echo "Filled";}
        else {
          echo $nt;
        } ?></td>
    </tr>
    <?php
    $a++;
    $x++;
  }
}
  ?>
