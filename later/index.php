<?php
    include  "../share/navbar-admin.php";
    include  "../share/checklogin.php";

    ?>

      <!-- ========================= Main ==================== -->
      <div class="main">
        <div class="topbar">
          <div class="toggle">
            <ion-icon name="menu-outline"></ion-icon>
          </div>
          <div class="user">
            <img src="../assets/imgs/customer01.jpg" alt="" />
          </div>
        </div>

        <!-- ======================= Cards ================== -->
        <div class="cardBox">

        <div class="card">
            <div>
            <?php
                    $res=mysqli_query($conn, " select count(*) as count from admins");
                    $count=$res->fetch_assoc();
                    ?>
              <div class="numbers"><?php echo $count['count']?></div>
              <div class="cardName">Admins</div>
            </div>

            <div class="iconBx">
            <ion-icon name="people-outline"></ion-icon>
            </div>
          </div>

          <div class="card">
            <div>
            <?php
                    $res=mysqli_query($conn, " select count(*) as count from category");
                    $count=$res->fetch_assoc();
                    ?>

              <div class="numbers"><?php echo $count['count']?></div>
              <div class="cardName">Categorys</div>
            </div>

            <div class="iconBx">
                <ion-icon name="qr-code-outline"></ion-icon>            </div>
          </div>

          <div class="card">
            <div>
            <?php
                    $res=mysqli_query($conn, " select count(*) as count from post");
                    $count=$res->fetch_assoc();
                    ?>

              <div class="numbers"><?php echo $count['count']?></div>
              <div class="cardName">Posts</div>
            </div>

            <div class="iconBx">
            <ion-icon name="newspaper-outline"></ion-icon>
                </div>
          </div>

     

          <!-- <div class="card">
            <div>
              <div class="numbers">$764</div>
              <div class="cardName">Earning</div>
            </div> -->

            <!-- <div class="iconBx">
              <ion-icon name="cash-outline"></ion-icon>
            </div>
          </div>
        </div>

       -->


    <!-- =========== Scripts =========  -->
    <?php
    include  "../share/script.php";
    ?>
