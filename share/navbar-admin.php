<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title><?php echo $page_title ?></title>
    <!-- ======= Styles ====== -->
    <link rel="stylesheet" href="../assets/css/style1.css" />
    <link rel="stylesheet" href="../css/form.css">
    <link rel="stylesheet" href="../css/table.css" />
    <!-- ======= for index.php ====== -->
    <!-- <link rel="stylesheet" href="../css/loginPageAndAddadmin.css" /> -->
    
        <!-- =======icon ====== -->

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" />
    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">

            <!-- =======font ====== -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;700&display=swap" rel="stylesheet">
</head>
<div class="container">
    <nav class="navigation">
        <ul>
            <li>
                <a href="" >
                    <span class="icon">
                    <ion-icon name="globe-outline"></ion-icon>
                    </span>
                    <span class="title">Avion</span>
                </a>
            </li>

            <li>
                <a href="../later/index.php">
                    <span class="icon">
                        <ion-icon name="home-outline"></ion-icon>
                    </span>
                    <span class="title">Dashboard</span>
                </a>
            </li>

            <li>
                <a href="../admin/manage-admin.php">
                    <span class="icon">
                        <ion-icon name="people-outline"></ion-icon>
                    </span>
                    <span class="title">Admin</span>
                </a>
            </li>

            <li>
                <a href="../category/manage-category.php">
                    <span class="icon">
                        <ion-icon name="qr-code-outline"></ion-icon>
                    </span>
                    <span class="title">Category</span>
                </a>
            </li>

            <li>
                <a href="../post/manage-post.php">
                    <span class="icon">
                    <ion-icon name="newspaper-outline"></ion-icon>

                                    </span>
                    <span class="title">Post</span>
                </a>
            </li>

            <li>
                <a href="../index.php">
                    <span class="icon">
                    <ion-icon name="id-card-outline"></ion-icon>
                                                    </span>
                    <span class="title">User Page</span>
                </a>
            </li>

            <li>
                <a href="../later/logout.php">
                    <span class="icon">
                        <ion-icon name="log-out-outline"></ion-icon>
                    </span>
                    <span class="title">Logout</span>
                </a>
            </li>
        </ul>
    </nav>
    <?php

                if(file_exists("../config/constants.php"))
                    include "../config/constants.php";
                else  {
                include "config/constants.php";     
                        }    
    // throw some error message or do something else

    ?>