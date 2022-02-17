<?php
include "header.php";
?>
<br><br><br>
<center><h1 style="font-family:'Courier New', Courier, monospace;font-size: 40px; margin: auto;">TOP RANKING PLAYER</h1>
</center>
    <table class="table table-bordered table-centered" style="width: 60%; margin: auto;">
        <thead class="thead-dark">
          <tr>
          
            <th scope="col">Player Name</th>
            <th scope="col">Ranking</th>
            <th scope="col">Highest Score</th>
          </tr>
        </thead>
        <tbody>
          <?php 
            $data = file_get_contents('result.json');
            $data = json_decode($data);
            $index = 1;
            usort($data, function($a, $b) { //Sort the array using a user defined function
              return $a->score > $b->score ? -1 : 1; //Compare the scores
          });    
            foreach($data as $row){	
          ?>
          <tr>
            
            <td><?php echo $row->name?></td>
            <td>Otto</td>
            <td><?php echo $row->score?></td>
          </tr>
         <?php }?>
        </tbody>
      </table>
      <?php
include "footer.php";
?>