<?php
use backend\components\MainSidebar;

/* @var $this yii\web\View */

$this->title = '前台首页设置';
?>

<div class="content-wrapper" >

    <?= MainSidebar::widget(['active_menu' => 103]); ?>

    <!-- Main content -->
    <section class="content">

        <div class="row">
            <div class="col-sm-12 col-md-7">
                <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                    <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                    <li data-target="#carousel-example-generic" data-slide-to="1" class=""></li>
                    <li data-target="#carousel-example-generic" data-slide-to="2" class=""></li>
                    </ol>
                    <div class="carousel-inner">
                    <div class="item active">
                        <img src="http://localhost/uploads/image/bootstrap.png" alt="First slide">

                        <div class="carousel-caption">
                        First Slide
                        </div>
                    </div>
                    <div class="item">
                        <img src="http://localhost/uploads/image/bootstrap2.png" alt="Second slide">

                        <div class="carousel-caption">
                        Second Slide
                        </div>
                    </div>
                    <div class="item">
                        <img src="http://localhost/uploads/image/bootstrap3.png" alt="Third slide">

                        <div class="carousel-caption">
                        Third Slide
                        </div>
                    </div>
                    </div>
                    <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
                    <span class="fa fa-angle-left"></span>
                    </a>
                    <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
                    <span class="fa fa-angle-right"></span>
                    </a>
                </div>

            </div>
            <div class="col-sm-12 col-md-5">
                <div class="box box-solid">
                    <div class="box-header with-border">
                        <h3 class="box-title">设置首页轮播图</h3>
                    </div>
                    <div class="box-body">
                        <table class="table table-bordered">
                            <tr>
                                <th style="width: 10px">#</th>
                                <th>标题</th>
                                <th>操作</th>
                            </tr>
                            <tr>
                                <td>1.</td>
                                <td>Bootstrap</td>
                                <td>
                                    <a><i class="fa fa-edit"></i></a>
                                    <a><i class="fa fa-trash"></i></a>
                                </td>
                            </tr>
                            <tr>
                                <td>2.</td>
                                <td>Bootstrap2</td>
                                <td>
                                    <a><i class="fa fa-edit"></i></a>
                                    <a><i class="fa fa-trash"></i></a>
                                </td>
                            </tr>
                            <tr>
                                <td>3.</td>
                                <td>Bootstrap3</td>
                                <td>
                                    <a><i class="fa fa-edit"></i></a>
                                    <a><i class="fa fa-trash"></i></a>
                                </td>
                            </tr>
                        </table>
                    </div>
                    <div class="box-footer">
                        <div class="form-group">
                            <button class="btn btn-default"><i class="fa fa-plus"></i> 增加</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <hr>

        <div class="row">
            <div class="col-sm-12 col-md-7">

                <div class="row">
                    <div class="col-sm-6 col-md-4">
                        <div class="product-box">
                            <img class="img-responsive" src="http://localhost/uploads/image/mi1.jpg">
                            <div class="product-bib">
                                <a class="name">小米5X 变焦双摄</a>
                                <p class="infor">变焦双摄，轻薄全金属</p>
                                <p class="price" style="color: rgb(234, 98, 91);"><sup>¥</sup><span>1299<em>起</em></span><!----></p>
                                <a class="btn" href="//item.mi.com/product/10000064.html" target="_blank" >立即购买</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-4">
                        <div class="product-box">
                            <img class="img-responsive" src="http://localhost/uploads/image/m2.jpg">
                            <div class="product-bib">
                                <a class="name">小米Note3 人脸解锁</a>
                                <p class="infor">1600万美颜自拍</p>
                                <p class="price" style="color: rgb(234, 98, 91);"><sup>¥</sup><span>1999<em>起</em></span><!----></p>
                                <a class="btn" href="//item.mi.com/product/10000064.html" target="_blank" >立即购买</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-4">
                        <div class="product-box">
                            <img class="img-responsive" src="http://localhost/uploads/image/m3.jpg">
                            <div class="product-bib">
                                <a class="name">红米Note 5A 高配版</a>
                                <p class="infor">1600万像素柔光自拍</p>
                                <p class="price" style="color: rgb(234, 98, 91);"><sup>¥</sup><span>899<em>起</em></span><!----></p>
                                <a class="btn" href="//item.mi.com/product/10000064.html" target="_blank" >立即购买</a>
                            </div>
                        </div>
                    </div>
                </div>

            </div> <!-- ./ cargos -->

            <div class="col-sm-12 col-md-5">
                <div class="box box-solid">
                    <div class="box-header with-border">
                        <h3 class="box-title">设置首页轮商品</h3>
                    </div>
                    <div class="box-body">
                        <table class="table table-bordered">
                            <tr>
                                <th style="width: 10px">#</th>
                                <th>标题</th>
                                <th>操作</th>
                            </tr>
                            <tr>
                                <td>1.</td>
                                <td>小米5X 变焦双摄</td>
                                <td>
                                    <a><i class="fa fa-edit"></i></a>
                                    <a><i class="fa fa-trash"></i></a>
                                </td>
                            </tr>
                            <tr>
                                <td>2.</td>
                                <td>小米Note3 人脸解锁</td>
                                <td>
                                    <a><i class="fa fa-edit"></i></a>
                                    <a><i class="fa fa-trash"></i></a>
                                </td>
                            </tr>
                            <tr>
                                <td>3.</td>
                                <td>红米Note 5A 高配版</td>
                                <td>
                                    <a><i class="fa fa-edit"></i></a>
                                    <a><i class="fa fa-trash"></i></a>
                                </td>
                            </tr>
                        </table>
                    </div>
                    <div class="box-footer">
                        <div class="form-group">
                            <button class="btn btn-default"><i class="fa fa-plus"></i> 增加</button>
                        </div>
                    </div>
                </div>
            </div> <!-- ./ cargos list -->
        </div>
        
        <hr>

        <div class="row">
            <div class="col-sm-12 col-md-6">
                <div class="box box-border">
                    <div class="box-header with-border">
                        <h3 class="box-title">关于我们</h3>
                    </div>
                    <div class="box-body">
                        <div class="form-group">
                            <textarea class="form-control" name="" id="" cols="30" rows="10"></textarea>
                        </div>
                    </div>
                    <div class="box-footer">
                        <button class="btn btn-default"><i class="fa fa-save"></i> 保存</button>
                    </div>
                </div>
            </div><!-- ./ about us -->

            <div class="col-sm-12 col-md-6">
                <div class="box box-border">
                    <div class="box-header with-border">
                        <h3 class="box-title">最新消息</h3>
                    </div>
                    <div class="box-body">
                        <div class="form-group">
                            <label for="">显示条数：</label>
                            <input type="number" class="form-control" value="4">
                        </div>
                    </div>
                    <div class="box-footer">
                        <button class="btn btn-default"><i class="fa fa-save"></i> 保存</button>
                    </div>
                </div>
            </div><!-- ./ home page news -->
        </div>
    </section>

</div>
