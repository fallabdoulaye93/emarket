<?php
/**
 * Created by PhpStorm.
 * User: bayedame
 * Date: 31/08/2018
 * Time: 10:57
 */
?>

<div class="container-fluid">
    <div class="row bg-title">
        <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
            <h4 class="page-title">Informations sur Profil</h4>
        </div>
        <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
            <ol class="breadcrumb">
                <li>Gestion</li>
                <li class="active">Profil</li>
            </ol>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /row -->
    <div class="row">
        <div class="col-md-4 col-xs-12">
            <div class="white-box">
                <!--                    <div class="user-bg"> <img width="100%" alt="user" src="../plugins/images/large/img1.jpg"> </div>-->

                <div class="user-btm-box">
                    <!-- .row    -->


                    <div class="row text-center m-t-10">
                        <div class="col-md-6 b-r"><strong><?= "Prenom"; ?></strong>
                            <p><?= $user->prenom; ?></p>
                        </div>
                        <div class="col-md-6"><strong><?= "Nom" ?></strong>
                            <p><?= $user->nom; ?></p>
                        </div>
                    </div>
                    <!-- /.row -->
                    <hr>
                    <!-- .row -->
                    <div class="row text-center m-t-10">
                        <div class="col-md-6 b-r"><strong><?= "Email"; ?></strong>
                            <p><?= $user->email; ?></p>
                        </div>
                        <div class="col-md-6"><strong><?= "Telephone" ?></strong>
                            <p><?= $user->telephone; ?></p>
                        </div>
                    </div>
                    <!-- /.row -->
                    <hr>
                    <!-- .row -->
                    <div class="row text-center m-t-10">
                        <div class="col-md-6 b-r"><strong><?= "login" ?></strong>
                            <p><?= $user->login; ?></p>
                        </div>
                        <div class="col-md-6 b-r"><strong><?= "Profil" ?></strong>
                            <p><?= $user->profil; ?></p>
                        </div>

                    </div>
                    <hr>

                </div>
            </div>
        </div>
        <div class="col-md-8 col-xs-12">
            <div class="white-box">
                <!-- .tabs -->
                <ul class="nav nav-tabs tabs customtab">
                    <li class="active tab">
                        <a href="#home" data-toggle="tab" aria-expanded="false"> <span class="visible-xs"><i class="fa fa-cog"></i></span> <span class="hidden-xs"><?= "Profil"; ?></span> </a>
                    </li>
                </ul>
                <!-- /.tabs -->
                <div class="tab-content">
                    <!-- .tabs3 -->
                    <div class="tab-pane active" id="home">

                        <form class="form-horizontal form-material">

                            <div class="form-group">
                                <label class="col-md-12"><?= 'Prenom(*) :' ; ?></label>
                                <div class="col-md-12">
                                    <input type="text" required class="form-control"  id="prenom" name="prenom" value="<?= $user->prenom; ?>" disabled />
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-12"><?= 'Nom(*) :' ; ?></label>
                                <div class="col-md-12">
                                    <input type="text" required class="form-control"  id="nom" name="nom" value="<?= $user->nom; ?>" disabled />
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="example-email" class="col-md-12"><?=  'Email(*) :'; ?></label>
                                <div class="col-md-12">
                                    <input type="email" required="required" class="form-control"  id="email" name="email" value="<?= $user->email; ?>" disabled />
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-12"><?= 'Telephone(*) :' ; ?></label>
                                <div class="col-md-12">
                                    <input type="text" required class="form-control"  id="tel" name="telephone" value="<?= $user->telephone; ?>" disabled />
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>

                            <!--<div class="form-group">
                                    <label class="col-sm-12"><?/*= 'Profil(*) :' ; */?></label>
                                    <div class="col-sm-12">
                                        <select class="form-control" required="required" name="fk_profil" style="width: 100%;" id="fk_profil" disabled />
                                            <option value=""><?/*= "Profil"; */?></option>
                                            <?php /*foreach($allProfil as $cat){ */?>
                                                <option value="<?php /*echo $cat->id; */?>" <?php /*if($user->sf_profil_id === $cat->libelle) echo "selected=selected"; */?> > <?/*= $cat->libelle; */?></option>
                                            <?php /*} */?>
                                        </select>

                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>-->



                            <div class="form-group">


                                <div class="col-sm-6 col-xs-6">

                                    <a href="javascript:history.back();">
                                        <button type="button" class="btn btn-success"><?= "Retour" ; ?></button>
                                    </a>

                                </div>

                                <div class="col-sm-6 col-xs-6">

                                    <a href="<?php echo WEBROOT ?>menu/firstConnect" >
                                        <button type="button" class="btn btn-warning"><?= "Modifier mot de passe"; ?></button>
                                    </a>

                                </div>

                            </div>

                        </form>

                    </div>
                    <!-- /.tabs3 -->
                </div>
            </div>
        </div>
    </div>
    <!-- /.row -->
</div>
