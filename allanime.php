<?php
require 'admin/crud/config.php';
include 'tamplate/header.php';

$current = $_GET['current'];
$pages = 1;
if (isset($_GET['pages'])) {
  $pages = $_GET['pages'];
}

$key = "1,2,3,4,5,6,7,8,9,A,B,C,D,E,F,G,H,I,J,K,L,M,N,O,P,Q,R,S,T,U,V,W,X,Y,Z";

$sql = mysqli_query($con, 'SELECT * FROM `movies` ORDER BY `judul`');
$result = allanime(explode(',', $key), $sql);

$arr = selectPage($pages, $lenght, 18);
?>

<body>
  <?php include 'tamplate/navbar.php' ?>
  <!-- Product Section Begin -->
  <section class="product-page spad">
    <div class="container">
      <div class="row">
        <div class="col-lg-8">
          <div class="product__page__content">
            <div class="product__page__title">
              <div class="row">
                <div class="col-lg-8 col-md-8 col-sm-6">
                  <div class="section-title">
                    <h4>All anime</h4>
                  </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-6"></div>
              </div>
            </div>
            <div style="margin-bottom: 50px;">
              <?php
              $key = explode(",", $key);
              foreach ($key as $a) {
              ?>
                <a href="#<?php echo $a ?>" class="btn btn-dark" style=" margin-bottom: 5px; text-align: left;"><?php echo $a ?></li></a>
              <?php
              }
              ?>
            </div>
            <?php
            foreach ($result as $b) {
            ?>
              <div class="trending__product">
                <div class="row">
                  <div class="col-lg-8 col-md-8 col-sm-8">
                    <div class="section-title">
                      <h4 id="<?php echo $b[0] ?>"><?php echo $b[0]; ?></h4>
                    </div>
                  </div>
                  <div class="col-lg-4 col-md-4 col-sm-4">
                    <div class="btn__all">
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="genre" style="width: 100%;">
                    <?php
                    foreach ($b as $c) {
                      if (count($c) != 1) {
                    ?>
                        <div style="width: 49%; display: inline-block; padding-left: 25px;">
                          <ul>
                            <li style="color: white;">
                              <a href="anime-details.php?id=<?php echo $c['id']; ?>" class="btn" style="font-size: 15px; color: white; margin-bottom: 5px; text-align: left; width: 100%; padding-top: 0px; vertical-align: top;"><?php echo $c['judul'] ?></a>
                            </li>
                          </ul>
                        </div>
                    <?php
                      }
                    }
                    ?>
                  </div>
                </div>
              </div>
            <?php
            } ?>
          </div>
          <div class="product__pagination pages">
          </div>
        </div>
        <?php include "tamplate/sidebar.php" ?>
      </div>
    </div>
  </section>
  <?php include "tamplate/footer.php" ?>
  <!-- Search model Begin -->
  <div class="search-model">
    <div class="h-100 d-flex align-items-center justify-content-center">
      <div class="search-close-switch"><i class="icon_close"></i></div>
      <form class="search-model-form">
        <input type="text" id="search-input" placeholder="Search here.....">
      </form>
    </div>
  </div>
  <!-- Search model end -->
  <!-- Js Plugins -->
  <script src="js/jquery-3.3.1.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/player.js"></script>
  <script src="js/jquery.nice-select.min.js"></script>
  <script src="js/mixitup.min.js"></script>
  <script src="js/jquery.slicknav.js"></script>
  <script src="js/owl.carousel.min.js"></script>
  <script src="js/main.js"></script>
</body>

</html>

<script type="text/javascript">
  $(document).ready(function() {
    var count = <?php echo $lenght; ?>;
    if (count > 18) {
      $('.pages').append("<a current=<?php echo $_GET['current'] ?>&pages=<?php echo limitPage($pages, $lenght, 18, 'left') ?>'><i class='fa fa-angle-double-left'></i></a>");
      $('.pages').append("<a class='<?php echo openPage($pages, $arr[0], "current-page") ?>' href='?current=<?php echo $_GET['current'] ?>&pages=<?php echo $arr[0] ?>'><?php echo $arr[0] ?></a>");
      $('.pages').append("<a class='<?php echo openPage($pages, $arr[1], "current-page") ?>' href='?current=<?php echo $_GET['current'] ?>&pages=<?php echo $arr[1] ?>'><?php echo $arr[1] ?></a>");
      if (count > 36) {
        $('.pages').append("<a class='<?php echo openPage($pages, $arr[2], "current-page") ?>' href='?current=<?php echo $_GET['current'] ?>&pages=<?php echo $arr[2] ?>'><?php echo $arr[2] ?></a>");
      }
      $('.pages').append("<a href='?current=<?php echo $_GET['current'] ?>&pages=<?php echo limitPage($pages, $lenght, 18, "right") ?>'><i class='fa fa-angle-double-right'></i></a>");
    }
  })
</script>