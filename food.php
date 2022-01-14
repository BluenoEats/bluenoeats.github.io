<?php
include "config/setup.php";
include "functions/get_page.php";
include "functions/get_data.php";
# Retrieve food page
$page = get_dish_page($dbc, $_GET['dish']);
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title> Blueno Eats Website </title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <script src="https://kit.fontawesome.com/fa6b154dde.js" crossorigin="anonymous"></script>
        <link href="styles/main.css" rel="stylesheet" type="text/css">
        <link href="styles/navigation.css" rel="stylesheet" type="text/css">
        <link href="styles/slideshow.css" rel="stylesheet" type="text/css">
        <link href="styles/food.css" rel="stylesheet" type="text/css">
        <link href="styles/modal.css" rel="stylesheet" type="text/css">
        <link href="styles/form.css" rel="stylesheet" type="text/css">

        <script src="scripts/manual-slide.js" type="text/javascript"></script>
        <script src="scripts/modal.js" type="text/javascript"></script>
    </head>

    <body>
      <?php include D_TEMPLATE."navigation.php" ?>

      <div class="food">
          <div class="food-item food-left">
              <h1 id="food-name"><?php echo $page['name']; ?></h1>
          </div>
          <?php include D_TEMPLATE."dish_slideshow.php"; ?>
      </div>

      <p class="food-intro"><?php echo $page['content']; ?></p>

      <?php include D_TEMPLATE."review_preview.php"; ?>

      <!-- Trigger/Open The Modal -->
      <button id="wr-btn" onclick="openModal('wr-modal')">Write a Review...</button>
      <div id="wr-modal" class="modal">
        <div class="modal-content">
          <div class="modal-header">
            <span class="close" onclick="closeModal('wr-modal')">&times;</span>
            <h2> <?php echo $page['name']; ?> </h2>
          </div>
          <div class="modal-body">
            <p>Some text in the Modal..</p>
        <!-- TODO: Hover effect -->
            <div class="user-rate">
              <i class="rating__star far fa-star"></i>
              <i class="rating__star far fa-star"></i>
              <i class="rating__star far fa-star"></i>
              <i class="rating__star far fa-star"></i>
              <i class="rating__star far fa-star"></i>
            </div>
            <script src="scripts/rate.js" type="text/javascript"></script>
            <div class="user-form">
              <form>
                  <label for="review-msg">Add a written review</label>
                  <input type="text" id="review-msg" name="review-msg" placeholder="What did you like or dislike about this dish?">

                  <label for="review-img">Add a photo</label>
                  <input type="file" id="review-img" name="review-img" accept="image/*" multiple>

                  <input type="submit" value="Submit">
              </form>
            </div>
          </div>  
       </div>
      </div>


      <div class="food-imgs">
          <div class="food-imgs-row">
              <div class="food-imgs-col">
                <img src="img/place4.jpeg" style="width:100%" onclick="openModal('food-pic-modal');currentSlide(1)" class="hover-shadow cursor">
              </div>
              <div class="food-imgs-col">
                <img src="img/place3.jpeg" style="width:100%" onclick="openModal('food-pic-modal');currentSlide(2)" class="hover-shadow cursor">
              </div>
              <div class="food-imgs-col">
                <img src="img/place2.jpeg" style="width:100%" onclick="openModal('food-pic-modal');currentSlide(3)" class="hover-shadow cursor">
              </div>
              <div class="food-imgs-col">
                <img src="img/placeholding.png" style="width:100%" onclick="openModal('food-pic-modal');currentSlide(4)" class="hover-shadow cursor">
              </div>
          </div>

          <div id="food-pic-modal" class="modal">
            <span class="close" onclick="closeModal('food-pic-modal')">&times;</span>
            <div class=" modal-content">
                <div class="food-imgs-slide">
                  <div class="food-imgs-numtext">1 / 4</div>
                  <img src="img/place4.jpeg" style="width:100%">
                </div>
                <div class="food-imgs-slide">
                  <div class="food-imgs-numtext">2 / 4</div>
                  <img src="img/place3.jpeg" style="width:100%">
                </div>
                <div class="food-imgs-slide">
                  <div class="food-imgs-numtext">3 / 4</div>
                  <img src="img/place2.jpeg" style="width:100%">
                </div>
                <div class="food-imgs-slide">
                  <div class="food-imgs-numtext">4 / 4</div>
                  <img src="img/placeholding.png" style="width:100%">
                </div>
                <a class="food-imgs-prev" onclick="plusSlides(-1)">&#10094;</a>
                <a class="food-imgs-next" onclick="plusSlides(1)">&#10095;</a>
                <div class="food-imgs-caption-container">
                  <p id="caption"></p>
                </div>

                <div class="food-imgs-col">
                  <img class="food-imgs-cur cursor" src="img/place4.jpeg" style="width:100%" onclick="currentSlide(1)" alt="Nature and sunrise">
                </div>
                <div class="food-imgs-col">
                  <img class="food-imgs-cur cursor" src="img/place3.jpeg" style="width:100%" onclick="currentSlide(2)" alt="Snow">
                </div>
                <div class="food-imgs-col">
                  <img class="food-imgs-cur cursor" src="img/place2.jpeg" style="width:100%" onclick="currentSlide(3)" alt="Mountains and fjords">
                </div>
                <div class="food-imgs-col">
                  <img class="food-imgs-cur cursor" src="img/placeholding.png" style="width:100%" onclick="currentSlide(4)" alt="Northern Lights">
                </div>
            </div>
          </div>
      </div>
      <p> See all images </p>
      <div class="user-comment">
        <p> User Name </p>
          <div class="user-rate">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
          </div>
        <img src="img/place4.jpeg">
        <p class="comment"> Very Good! </p>

        <button class="vote" id="upvote"><i class="fas fa-caret-up"></i></button>
        <button class="vote" id="downvote"><i class="fas fa-caret-down"></i></button>
        <span id="votenum"> 0 </span>
        <script src="scripts/vote.js" type="text/javascript"></script>

        <br>
        <button onclick="openModal('report-modal')" class="report"> Report </button>
        <div id="report-modal" class="modal">
          <div class="modal-content">
            <div class="modal-header">
              <span class="close" onclick="closeModal('report-modal')">&times;</span>
              <h2> Report an issue</h2>
            </div>
            <div class="modal-body">
                <p> If you find this content inappropriate and think it should be removed from the BluenoEats site, please help us to understand the problem. What is going on with this post? </p>
                <form>
                  <input type="checkbox" name="report" value="Spam"> It's suspicious or spam <br>
                  <input type="checkbox" name="report" value="Abuse"> It's abusive or harmful<br>
                  <input type="checkbox" name="report" value="Mislead"> It's misleading<br>
                  <input type="checkbox" name="report" value="Suicide"> It expresses intentions of self-harm or suicide<br>
                  <input type="checkbox" name="report" value="Other"> Other<br>
                  <input type="submit" value="Submit">
                </form>
            </div>
                  <!-- TODO: Show success after submit -->
          </div>
        </div>
      </div>

    <script src="scripts/modal.js" type="text/javascript"></script>
    <?php include D_TEMPLATE."footer.php"; ?>
  </body>

</html>
