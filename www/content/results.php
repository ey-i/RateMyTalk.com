<div id="results">

  <span class="smaller">Feedback for</span><br>
  <span class="larger"><?php echo $title; ?></span>

  <br><br>

<?php

  if ($number_of_ratings == 0) {

?>

  <center>
    <span class="smaller">No ratings yet.</span><br><br>
    <img src="/gfx/sad.png"><br><br>


  </center>

<?php

  } else {

?>
  <table cellpadding=10 id="feedback" class="">

    <tr>
      <td align="right" class="larger" style="vertical-align:top;">Slides</td>
      <td class="fixed_td">
        <?php

          foreach ($slides_scores as &$slides_score) {

            if ($slides_score == 10) {

              $image = "good";

            } else if ($slides_score == 0) {

              $image = "ok";

            } else {

              // if there are hacks, they will always be negative
              $image = "bad";

            }

            echo "<img src=\"/gfx/".$image."_color.png\" width=30>";

          }

        ?>
      </td>
    </tr>

    <tr>
      <td align="right" class="larger" style="vertical-align:top;">Speaker</td>
      <td class="fixed_td">
        <?php

          foreach ($speaker_scores as &$speaker_score) {

            if ($speaker_score == 10) {

              $image = "good";

            } else if ($speaker_score == 0) {

              $image = "ok";

            } else {

              // if there are hacks, they will always be negative
              $image = "bad";

            }

            echo "<img src=\"/gfx/".$image."_color.png\" width=30>";

          }

        ?>
      </td>
    </tr>

    <tr>
      <td align="right" class="larger" style="vertical-align:top;">Comments</td>
      <td class="fixed_td">
        <table cellpadding=10>

        <?php

          foreach ($comments as &$comment) {

            if ($comment == "") {
              continue;
            }

            echo "<tr><td>".$comment."</td></tr>";

          }


        ?>
        </table>
      </td>
    </tr>


  </table>

</div>

<?php

  }

?>

  </body>
</html>