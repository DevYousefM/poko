<?php
require_once '../config.php';
require_once '../app/includes/constant.php';
require_once '../app/includes/app_start.php';

$s = $_POST['query'] ?? '';
$limit = 20;
// $row = ($page - 1) * $limit;

// $query = "SELECT * from zon_games WHERE game_name LIKE '%$s%' limit $row,$limit";
// $run = mysqli_query($con, $query);
echo '<section id="games">';
if (num_rows(T_ZON_GAMES, " game_name LIKE '%$s%' ") > 0) {
    foreach (getGamesByQuery($s, $limit) as $game) { ?>
            <article class="games">
              <div class="thumb">
                <a href="<?= $site_url ?>g/<?= makeSlug($game['game_name']) ?>" title="<?= $game['game_name'] ?>">
                  <div class="thumbcover"></div>
                  <div class="thumb">
                    <img width="130" height="130" alt="<?= $game['game_name'] ?>" title="<?= $game['game_name'] ?>" src="<?= $game['game_image_url'] ?>">
                    <div class="gametitle"><?= $game['game_name'] ?></div>
                  </div>
                </a>
              </div>
              <div class="new-badge">
                <img width="100%" height="100%" alt="New-Label" title="New-Label" class="new-badge" src="https://www.al3abe.online/wp-content/themes/al3abe.online/images/new.svg">
              </div>
            </article>
    <?php }
} else {
    echo 0;
} ?>
</section>
