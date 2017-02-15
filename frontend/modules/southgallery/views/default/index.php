<!-- Home Page
   ==========================================-->
<div id="tf-home" class="text-center">
    <div class="overlay">
        <div class="content">
            <h1><?= Yii::t('app', 'ยินดีต้อนรับสู่') ?> <strong><span class="color"><?= Yii::$app->params['name'] ?></span></strong></h1>
            <p class="lead">สถาบันวัฒนธรรมศึกษากัลยาณิวัฒนา มหาวิทยาลัยสงขลานครินทร์</p>
            <a href="#tf-about" class="fa fa-angle-down page-scroll"></a>
        </div>
    </div>
</div>

<!-- About Us Page
==========================================-->
<div id="tf-about">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <?=
                $this->render('_article', [
                    'article_category_id' => 1,
                    //'arts'=>$arts,
                    //'asset' => $asset,
                    //'baseUrl' => $baseUrl,
                    //'basePath' => $basePath,
                ])
                ?>  
            </div>
        </div>
    </div>
</div>
<!-- About Us Page
==========================================-->
<div id="tf-about">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <?=
                $this->render('_art')
                ?>  
            </div>
        </div>
    </div>
</div>
<!-- Contact Section
==========================================-->
<!--<div id="tf-contact" class="text-center">
    <div class="container">

        <div class="row">
            <div class="col-md-8 col-md-offset-2">

                <div class="section-title center">
                    <h2>Feel free to <strong>contact us</strong></h2>
                    <div class="line">
                        <hr>
                    </div>
                    <div class="clearfix"></div>
                    <small><em>Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of "de Finibus Bonorum et Malorum" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, "Lorem ipsum dolor sit amet..", comes from a line in section 1.10.32.</em></small>            
                </div>

                <form>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Email address</label>
                                <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleInputPassword1">Password</label>
                                <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Message</label>
                        <textarea class="form-control" rows="3"></textarea>
                    </div>

                    <button type="submit" class="btn tf-btn btn-default">Submit</button>
                </form>

            </div>
        </div>

    </div>
</div>-->
