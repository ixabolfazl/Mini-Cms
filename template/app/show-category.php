<?php


$cat_id = $category['id'];
$cat_name = $category['name'];
$title = $cat_name;
$mainTitle = $this->setting['title'];
$about = $this->setting['about'];
$logo = $this->setting['logo'];
$url = url("home");
$logoUrl = url($logo);
$icon = $this->setting['icon'];
$iconUrl = url($icon);
$this->view("app.layouts.header", compact("title", "mainTitle", "about", "logo", "url", "logoUrl", "iconUrl"));


?>

    <div class="page-header">
        <div class="page-header-bg" style="background-image: url('./img/header-2.jpg');"
             data-stellar-background-ratio="0.5"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-offset-1 col-md-10 text-center">
                    <h1 class="text-uppercase"><? echo $cat_name ?></h1>
                </div>
            </div>
        </div>
    </div>
    <!-- /PAGE HEADER -->
    </header>
    <!-- /HEADER -->

    <!-- SECTION -->
    <div class="section">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">
                <div class="col-md-8">

                    <?
                    $i = 1;
                    foreach ($categoryArticles as $categoryArticle) {

                        $id = $categoryArticle['id'];
                        $title = $categoryArticle['title'];
                        $summary = substr($categoryArticle['summary'], 0, 250) . "...";
                        $view = $categoryArticle['view'];
                        $comment_count = $categoryArticle['comment_count'];
                        $created_at = date('d M Y', (strtotime($categoryArticle['created_at'])));
                        $user_id = $categoryArticle['user_id'];

                        $author = $categoryArticle['author'];
                        $image = $categoryArticle['image'];
                        $showArticle = url("show-article/" . $id);
                        $showUser = url("show-user/" . $user_id);
                        $showCat = url("show-category/" . $cat_id);
                        $imageUrl = url($image);
                        ?>

                        <!-- post -->
                        <div class="post post-row">
                            <a class="post-img" href="<? echo $showArticle ?>"><img
                                        src="<? echo $imageUrl ?>" alt="<? echo $title ?>"></a>
                            <div class="post-body">
                                <div class="post-category">
                                    <a href="<? echo $showCat ?>"><? echo $cat_name ?></a>
                                </div>
                                <h3 class="post-title"><a href="<? echo $showArticle ?>"><? echo $title ?></a></h3>
                                <ul class="post-meta">
                                    <li><a href="<? echo $showUser ?>"><? echo $author ?></a></li>
                                    <li> <? echo $created_at ?></li>
                                    <li><i class="fa fa-comments"></i> <? echo $comment_count ?></li>
                                    <li><i class="fa fa-eye"></i> <? echo $view ?></li>
                                </ul>
                                <p><? echo $summary ?></p>
                            </div>
                        </div>
                        <!-- /post -->


                        <?
                        if ($i == 5) {
                            break;
                        }
                    }
                    ?>


                </div>


                <?php

                $this->view("app.layouts.sidebar");

                ?>


            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>
    <!-- /SECTION -->
<?php


$this->view("app.layouts.footer", compact("title", "about", "url", "logoUrl"));

?>