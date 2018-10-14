
<div id="rating">

  <span class="smaller">Please provide anonymous feedback for</span><br>
  <span class="larger"><?php echo $title; ?></span>

  <br><br>

  <form action="/<?php echo $id; ?>/store" method="POST">
    <table cellpadding=10 id='feedback'>

      <tr>
        <td align="right" class="larger">Slides</td>
        <td>
          <a href="#" onclick="slides_are('good'); return false;">
            <img id="slides_good" class="default" src="gfx/good.png">
            <img id="slides_good_color" class="hover" src="gfx/good_color.png">
          </a>
          <a href="#" onclick="slides_are('ok'); return false;">
            <img id="slides_ok" class="default" src="gfx/ok.png">
            <img id="slides_ok_color" class="hover" src="gfx/ok_color.png">
          </a>
          <a href="#" onclick="slides_are('bad'); return false;">
            <img id="slides_bad" class="default" src="gfx/bad.png">
            <img id="slides_bad_color" class="hover" src="gfx/bad_color.png">
          </a>
        </td>
      </tr>

      <tr>
        <td align="right" class="larger">Speaker</td>
        <td>
          <a href="#" onclick="speaker_is('good'); return false;">
            <img id="speaker_good" class="default" src="gfx/good.png">
            <img id="speaker_good_color" class="hover" src="gfx/good_color.png">
          </a>
          <a href="#" onclick="speaker_is('ok'); return false;">
            <img id="speaker_ok" class="default" src="gfx/ok.png">
            <img id="speaker_ok_color" class="hover" src="gfx/ok_color.png">
          </a>
          <a href="#" onclick="speaker_is('bad'); return false;">
            <img id="speaker_bad" class="default" src="gfx/bad.png">
            <img id="speaker_bad_color" class="hover" src="gfx/bad_color.png">
          </a>
        </td>
      </tr>

      <tr>
        <td align="right" class="larger">Comments</td>
        <td>
          <textarea id="comments" class="commentinput" name="comments" maxlength="300" type="text" placeholder="Talk slower? Less text on slides?"></textarea>
        </td>
      </tr>


    </table>

    <br>
  
    <!-- without javascript we only give bad ratings hahahaha -->
    <input id="slides_score" type="hidden" name="slides_score" value="-10">
    <input id="speaker_score" type="hidden" name="speaker_score" value="-10">
    <input type="submit" class="btn" style="float:right" value="Submit Rating!">
  </form>
  <br><br>
  <span class="muchsmaller" style="float:left"><a href="<?php echo $id; ?>/results">Skip to the results..</a></span>
</div>
