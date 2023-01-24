<!-- ============================================================== -->
<!-- Wrapper -->
<!-- ============================================================== -->
<div id="wrapper">
    <!-- ============================================================== -->
    <!-- Topbar header - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <nav class="navbar navbar-default navbar-static-top m-b-0">
        <div class="navbar-header">

            <!-- /Logo -->
            <!-- Search input and Toggle icon -->

            <ul class="nav navbar-top-links navbar-right pull-right">

                <li class="dropdown">
                    <a class="dropdown-toggle profile-pic" data-toggle="dropdown" href="#">
                        <span>Bienvenue dans votre espace de travail,  </span><b class="hidden-xs"><?= $this->_USER->prenom;?> <?= $this->_USER->nom;?></b><span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu dropdown-user animated flipInY">
                        <li>
                            <div class="dw-user-box">
                                <div class="u-text">
                                    <h4><?= $this->_USER->prenom;?> <?= $this->_USER->nom;?></h4>
                                    <p class="text-muted"><?= $this->_USER->email;?></p>
                                </div>
                            </div>
                        </li>
                        <li role="separator" class="divider"></li>
                        <li><a href="<?= WEBROOT ?>utilisateur/profilUser"><i class="ti-user"></i>&nbsp;&nbsp;<?= $this->lang['mon_profil']; ?></a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="<?= WEBROOT ?>home/logout"><i class="fa fa-power-off"></i>&nbsp;&nbsp;<?= $this->lang['se_deconnecter']; ?></a></li>
                        <!--<li role="separator" class="divider"></li>
                        <li><a href="<?/*= WEBROOT */?>config"><i class="fa fa-cogs"></i>&nbsp;&nbsp;<?/*= $this->lang['configuration']; */?></a></li>-->
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
        </div>
        <!-- /.navbar-header -->
        <!-- /.navbar-top-links -->
        <!-- /.navbar-static-side -->
    </nav>
    <!-- ============================================================== -->
    <!-- Left Sidebar - style you can find in sidebar.scss  -->
    <!-- ============================================================== -->
    <div class="navbar-default sidebar" role="navigation">
        <div class="sidebar-nav slimscrollsidebar">
            <div class="sidebar-head">
                <br />
                <span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
                <span class="hidden-xs">
                        <img src="<?php echo ASSETS; ?>plugins/iconcafecacao.png" width="60px" height="50px" alt="home" class="light-logo">
                </span>
            </div>
            <!--<div class="user-profile">
                <div class="dropdown user-pro-body">
                    <a href="#" class="dropdown-toggle u-dropdown" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><?/*= $this->_USER->prenom;*/?> <?/*= $this->_USER->nom;*/?><span class="caret"></span></a>
                    <ul class="dropdown-menu animated flipInY">
                        <li><a href="<?/*= WEBROOT */?>utilisateur/profil"><i class="ti-user"></i>&nbsp;&nbsp;<?/*= $this->lang['mon_profil']; */?></a></li>
                        <li><a href="<?/*= WEBROOT */?>home/logout"><i class="fa fa-power-off"></i>&nbsp;&nbsp;<?/*= $this->lang['se_deconnecter']; */?></a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="<?/*= WEBROOT */?>config"><i class="fa fa-cogs"></i>&nbsp;&nbsp;<?/*= $this->lang['configuration']; */?></a></li>
                    </ul>
                </div>
            </div>-->
            <br /><br />
            <ul class="nav" id="side-menu">
                <li>
                    <a href="<?= WEBROOT; ?>tableaudebord/list">
                        <i class="fa-fw fa fa-dashboard"></i>
                        <span class="hide-menu"><?= "Tableau de bord" ?></span>
                    </a>
                </li>
                <li>
                    <a href="<?= WEBROOT; ?>tableaudebord/index">
                        <i class="fa-fw fa fa-dashboard"></i>
                        <span class="hide-menu"><?= "Tableau de bord" ?></span>
                    </a>
                </li>
                <li>
                    <a href="<?= WEBROOT; ?>campagne/list">
                        <i class="fa-fw fa fa-home"></i>
                        <span class="hide-menu"><?= "Campagne" ?></span>
                    </a>
                </li>
                <li>
                    <a href="<?= WEBROOT; ?>tracking/index">
                        <i class="fa-fw fa fa-location-arrow"></i>
                        <span class="hide-menu"><?= "Tracking" ?></span>
                    </a>
                </li>
                <li>
                    <a href="<?= WEBROOT; ?>incidents/list">
                        <i class="fa-fw fa fa-hand-stop-o"></i>
                        <span class="hide-menu"><?= "Gestion des Incidents" ?></span>
                    </a>
                </li>
                <li>
                    <a href="#" class="waves-effect">
                        <i class="mdi mdi-sync fa-fw"></i>
                        <span class="hide-menu"><?= "Imports / Exports" ?><span class="fa arrow"></span></span>
                    </a>
                    <ul class="nav nav-second-level">
                        <li>
                            <a href="<?= WEBROOT; ?>villagecooptous/list">
                                <i class="fa-fw fa fa-arrow-circle-right"></i>
                                <span class="hide-menu"><?= "Villages vers coop" ?></span>
                            </a>
                        </li>
                        <li>
                            <a href="<?= WEBROOT; ?>coopversusinetous/list">
                                <i class="fa-fw fa fa-arrow-circle-left"></i>
                                <span class="hide-menu"><?= "Coop vers usines" ?></span>
                            </a>
                        </li>

                    </ul>
                </li>

                <li>
                    <a href="#" class="waves-effect">
                        <i class="mdi mdi-bus fa-fw"></i>
                        <span class="hide-menu"><?= "Gestion des transports" ?><span class="fa arrow"></span></span>
                    </a>
                    <ul class="nav nav-second-level">
                        <li>
                            <a href="<?= WEBROOT; ?>transporteur/list">
                                <i class="fa-fw fa fa-user"></i>
                                <span class="hide-menu"><?= "Transporteurs" ?></span>
                            </a>
                        </li>
                        <li>
                            <a href="<?= WEBROOT; ?>chauffeur/list">
                                <i class="fa-fw fa fa-user"></i>
                                <span class="hide-menu"><?= "chauffeurs" ?></span>
                            </a>
                        </li>
                        <li>
                            <a href="<?= WEBROOT; ?>camions/list">
                                <i class="fa-fw fa fa-truck"></i>
                                <span class="hide-menu"><?= "Camions" ?></span>
                            </a>
                        </li>
                        <li>
                            <a href="<?= WEBROOT; ?>village/list">
                                <i class="fa-fw fa fa-location-arrow"></i>
                                <span class="hide-menu"><?= "Villages" ?></span>
                            </a>
                        </li>
                        <li>
                            <a href="<?= WEBROOT; ?>zone/list">
                                <i class="fa-fw fa fa-location-arrow"></i>
                                <span class="hide-menu"><?= "Zones" ?></span>
                            </a>
                        </li>
                        <!--<li>
                            <a href="<?/*= WEBROOT; */?>affectationcamions/list">
                                <i class="fa-fw fa fa-truck"></i>
                                <span class="hide-menu"><?/*= "Affectations camion" */?></span>
                            </a>
                        </li>-->
                    </ul>
                </li>

                <li>
                    <a href="#" class="waves-effect">
                        <i class="mdi mdi-cellphone-android fa-fw"></i>
                        <span class="hide-menu"><?= "Gestion des appareils" ?><span class="fa arrow"></span></span>
                    </a>
                    <ul class="nav nav-second-level">
                        <li>
                            <a href="<?= WEBROOT; ?>allappareils/list">
                                <i class="fa-fw fa fa-circle"></i>
                                <span class="hide-menu"><?= "Tous les appareils" ?></span>
                            </a>
                        </li>
                        <li>
                            <a href="<?= WEBROOT; ?>appareilsaffectes/list">
                                <i class="fa-fw fa fa-check"></i>
                                <span class="hide-menu"><?= "Appareils affectes" ?></span>
                            </a>
                        </li>
                        <li>
                            <a href="<?= WEBROOT; ?>appareilsnonaffectes/list">
                                <i class="fa-fw fa fa-arrow-circle-o-left"></i>
                                <span class="hide-menu"><?= "Appareils non affectes" ?></span>
                            </a>
                        </li>
                        <li>
                            <a href="<?= WEBROOT; ?>affectationmateriels/list">
                                <i class="mdi mdi-cellphone-basic fa-fw"></i>
                                <span class="hide-menu"><?= "Affectations materiels" ?></span>
                            </a>
                        </li>

                    </ul>
                </li>
                <li>
                    <a href="#" class="waves-effect">
                        <i class="fa-fw fa fa-home"></i>
                        <span class="hide-menu"><?= "Gestion des entités" ?><span class="fa arrow"></span></span>
                    </a>
                    <ul class="nav nav-second-level">
                        <li>
                            <a href="<?= WEBROOT; ?>entitecooperative/list">
                                <i class="fa-fw fa fa-home"></i>
                                <span class="hide-menu"><?= "Coopératives" ?></span>
                            </a>
                        </li>
                        <li>
                            <a href="<?= WEBROOT; ?>entitegrosprod/list">
                                <i class="fa-fw fa fa-users"></i>
                                <span class="hide-menu"><?= "Gros producteurs" ?></span>
                            </a>
                        </li>
                        <li>
                            <a href="<?= WEBROOT; ?>entitegrosachete/list">
                                <i class="fa-fw fa fa-users"></i>
                                <span class="hide-menu"><?= "Gros acheteurs" ?></span>
                            </a>
                        </li>
                        <li>
                            <a href="<?= WEBROOT; ?>entiteantenne/list">
                                <i class="fa-fw fa fa-home"></i>
                                <span class="hide-menu"><?= "Antennes régionales" ?></span>
                            </a>
                        </li>

                    </ul>
                </li>
                <li>
                    <a href="#" class="waves-effect">
                        <i class="mdi mdi-cellphone-android fa-fw"></i>
                        <span class="hide-menu"><?= "Gestion des sacs" ?><span class="fa arrow"></span></span>
                    </a>
                    <ul class="nav nav-second-level">
                        <li>
                            <a href="<?= WEBROOT; ?>commandes/list">
                                <i class="fa-fw fa fa-circle"></i>
                                <span class="hide-menu"><?= "Historique des commandes" ?></span>
                            </a>
                        </li>
                        <li>
                            <a href="<?= WEBROOT; ?>commandesstock/list">
                                <i class="fa-fw fa fa-check"></i>
                                <span class="hide-menu"><?= "Suivi Stock Sacs" ?></span>
                            </a>
                        </li>
                        <li>
                            <a href="<?= WEBROOT; ?>commandesdistribution/list">
                                <i class="fa-fw fa fa-arrow-circle-o-left"></i>
                                <span class="hide-menu"><?= "Distribution sacs" ?></span>
                            </a>
                        </li>


                    </ul>
                </li>
                <!--<li>
                    <a href="#" class="waves-effect">
                        <i class="mdi mdi-cellphone-android fa-fw"></i>
                        <span class="hide-menu"><?/*= "Gestion des entites" */?><span class="fa arrow"></span></span>
                    </a>
                    <ul class="nav nav-second-level">
                        <li>
                            <a href="<?/*= WEBROOT; */?>module/list">
                                <i class="fa-fw fa fa-check"></i>
                                <span class="hide-menu"><?/*= "Appareils affectes" */?></span>
                            </a>
                        </li>
                        <li>
                            <a href="<?/*= WEBROOT; */?>sousmodule/list">
                                <i class="fa-fw fa fa-stop"></i>
                                <span class="hide-menu"><?/*= "Appareils non affectes" */?></span>
                            </a>
                        </li>
                        <li>
                            <a href="<?/*= WEBROOT; */?>sousmodule/list">
                                <i class="mdi mdi-cellphone-basic fa-fw"></i>
                                <span class="hide-menu"><?/*= "Affectations materiels" */?></span>
                            </a>
                        </li>
                    </ul>
                </li>-->

                <?php if(\app\core\Utils::authorized(null, null, 'parametrage')){ ?>
                    <li>
                        <a href="#" class="waves-effect">
                            <i class="mdi mdi-wrench fa-fw"></i>
                            <span class="hide-menu"><?= $this->lang['parametrage']; ?><span class="fa arrow"></span></span>
                        </a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="<?= WEBROOT; ?>typemateriel/list">
                                    <i class="fa-fw fa fa-cog"></i>
                                    <span class="hide-menu"><?= "Type d'appareils" ?></span>
                                </a>
                            </li>
                            <li>
                                <a href="<?= WEBROOT; ?>typeentite/list">
                                    <i class="fa-fw fa fa-cog"></i>
                                    <span class="hide-menu"><?= "Type d'entité" ?></span>
                                </a>
                            </li>
                            <?php if(\app\core\Utils::authorized(null, null, null, 'module')){ ?>
                                <li>
                                    <a href="<?= WEBROOT; ?>module/list">
                                        <i class="fa-fw fa fa-cog"></i>
                                        <span class="hide-menu"><?= $this->lang['modules']; ?></span>
                                    </a>
                                </li>
                            <?php } if(\app\core\Utils::authorized(null, null, null, 'sousModule')){ ?>
                                <li>
                                    <a href="<?= WEBROOT; ?>sousmodule/list">
                                        <i class="fa-fw fa fa-cog"></i>
                                        <span class="hide-menu"><?= $this->lang['sousmodules']; ?></span>
                                    </a>
                                </li>
                            <?php } if(\app\core\Utils::authorized(null, null, null, 'droit')){ ?>
                                <li>
                                    <a href="<?= WEBROOT; ?>droit/list">
                                        <i class="fa-fw fa fa-cog"></i>
                                        <span class="hide-menu"><?= $this->lang['droit']; ?></span>
                                    </a>
                                </li>
                            <?php } if(\app\core\Utils::authorized(null, null, null, 'profil')){ ?>
                                <li>
                                    <a href="<?= WEBROOT; ?>profil/list">
                                        <i class="fa-fw fa fa-cog"></i>
                                        <span class="hide-menu"><?= $this->lang['profil']; ?></span>
                                    </a>
                                </li>
                            <?php } if(\app\core\Utils::authorized(null, null, null, 'utilisateur')){ ?>
                                <li>
                                    <a href="<?= WEBROOT; ?>utilisateur/list">
                                        <i class="fa-fw fa fa-cog"></i>
                                        <span class="hide-menu"><?= $this->lang['utilisateur']; ?></span>
                                    </a>
                                </li>
                            <?php } ?>
                        </ul>
                    </li>
                <?php } ?>
            </ul>
        </div>
    </div>

    <div id="page-wrapper">
