<?php
if (!isset($_SESSION)) session_start();


$ad = new Admin();
$profile =  $ad->getProfile();
?>
<div class="row">
    <div class="col-sm-3">
    
    </div>
    <div class="col-sm-9">
        <br>
    <h3> Welcome: <?php echo $profile['username'] ?> </h3>
    <p>Tên: <?= $profile['ten']; ?></p>
    <p>Địa chỉ email: <?= $profile['email']; ?></p>
    <p>SDT: <?= $profile['sdt']; ?></p>

    </div>
</div>

