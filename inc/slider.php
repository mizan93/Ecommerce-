<div class="header_bottom">
    <div class="header_bottom_left">
        <div class="section group">
            <?php
            $getiphone = $product->getLatestIphone();
            if ($getiphone) {
                while ($data = $getiphone->fetch_assoc()) {
            ?>
                    <div class="listview_1_of_2 images_1_of_2">
                        <div class="listimg listimg_2_of_1">
                            <a href="details.php?pro_id=<?php echo $data['productId']; ?>"> <img src="admin/<?php echo $data['image']; ?>" alt="" /></a>
                        </div>
                        <div class="text list_2_of_1">
                            <h2>Iphone</h2>
                            <p><?php echo $data['productName']; ?></p>
                            <div class="button"><span><a href="details.php?pro_id=<?php echo $data['productId']; ?>">Add to cart</a></span></div>
                        </div>
                    </div>
            <?php }
            } ?>
            <?php
            $getsumsang = $product->getLatestSumsang();
            if ($getsumsang) {
                while ($data = $getsumsang->fetch_assoc()) {
            ?>
                    <div class="listview_1_of_2 images_1_of_2">
                        <div class="listimg listimg_2_of_1">
                            <a href="details.php?pro_id=<?php echo $data['productId']; ?>"> <img src="admin/<?php echo $data['image']; ?>" alt="" /></a>
                        </div>
                        <div class="text list_2_of_1">
                            <h2>Sumsang</h2>
                            <p><?php echo $data['productName']; ?></p>
                            <div class="button"><span><a href="details.php?pro_id=<?php echo $data['productId']; ?>">Add to cart</a></span></div>
                        </div>
                    </div>
            <?php }
            } ?>
        </div>
        <div class="section group">

            <?php
            $getasus = $product->getLatestAsus();
            if ($getasus) {
                while ($data = $getasus->fetch_assoc()) {
            ?>
                    <div class="listview_1_of_2 images_1_of_2">
                        <div class="listimg listimg_2_of_1">
                            <a href="details.php?pro_id=<?php echo $data['productId']; ?>"> <img src="admin/<?php echo $data['image']; ?>" alt="" /></a>
                        </div>
                        <div class="text list_2_of_1">
                            <h2>Asus</h2>
                            <p><?php echo $data['productName']; ?></p>
                            <div class="button"><span><a href="details.php?pro_id=<?php echo $data['productId']; ?>">Add to cart</a></span></div>
                        </div>
                    </div>
            <?php }
            } ?>

            <?php
            $gethp = $product->getLatestHp();
            if ($gethp) {
                while ($data = $gethp->fetch_assoc()) {
            ?>
                    <div class="listview_1_of_2 images_1_of_2">
                        <div class="listimg listimg_2_of_1">
                            <a href="details.php?pro_id=<?php echo $data['productId']; ?>"> <img src="admin/<?php echo $data['image']; ?>" alt="" /></a>
                        </div>
                        <div class="text list_2_of_1">
                            <h2>Hp</h2>
                            <p><?php echo $data['productName']; ?></p>
                            <div class="button"><span><a href="details.php?pro_id=<?php echo $data['productId']; ?>">Add to cart</a></span></div>
                        </div>
                    </div>
            <?php }
            } ?>
        </div>
        <div class="clear"></div>
    </div>
    <div class="header_bottom_right_images">
        <!-- FlexSlider -->

        <section class="slider">
            <div class="flexslider">
                <ul class="slides">
                    <?php
                   
                    $getslider = $product->GetSliderToShow();
                    if ($getslider) {

                        while ($data = $getslider->fetch_assoc()) {

                    ?>
                            <li><a href="details.php?pro_id=<?php echo $data['id']; ?>">
                                    <img src="admin/<?php echo $data['image']; ?>" title="<?php echo $data['title']; ?>" alt="slide 1" /></a></li>
                    <?php  }
                    } ?>
                </ul>
            </div>
        </section>
        <!-- FlexSlider -->
    </div>
    <div class="clear"></div>
</div>