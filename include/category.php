<?php

  $cats = $db->exeQuery("select * from phanloai ");
  $pubs = $db->exeQuery("select * from xuatxu ");

  foreach ($cats as $r) {
  ?>
    <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
        <?php echo $r["tenloai"]; ?>
      </a>
      <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
        <?php foreach ($pubs as $x) {
          if ($x["maloai"] == $r["maloai"]) {
        ?>
            <li><a class="dropdown-item" href="index.php?mod=sanpham&ac=list&maxx=<?php echo $x["maxx"]; ?> "><?php echo $x["nuocxx"]; ?></a></li>

        <?php
          }
        }
        ?>
      </ul>
    </li>


  <?php
  }
  ?>