<?php
include('../../MASTER/include/verifyAPP.php');
?> 
<!-- BEGIN SAMPLE TABLE PORTLET-->
<div class="portlet light bordered">
    <div class="portlet-title">
        <div class="caption font-dark">
            <i class="icon-settings font-dark"></i>
            <span class="caption-subject bold uppercase">
                Mantenedor de Menú
            </span>
        </div>
    </div>
    <div id ="vista_usuarios">
        <!-- Row Start -->
        <div class="row">

            <!-- Basic Example Start -->
            <div class="boxed no-padding col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="inner">
                    <!-- Basic Example Start -->
                    <div class="boxed no-padding col-lg-12 col-md-12 col-sm-12 col-xs-12">
                      <div class="inner">

                        <br />
                        <!-- Table Holder Start -->
                        <div class="table-holder">
                          <?php
                            echo '<table class="table table-striped table-bordered" id="sample_1">';
                                echo '<thead>';
                                    echo '<tr>';
                                        echo '<th class="head1">Men&uacute;</th>';
                                        echo '<th class="head1">Sub Men&uacute;</th>';
                                        echo '<th class="head1">Sub Sub Men&uacute;</th>';
                                    echo '</tr>';
                                echo '</thead>';
                                echo '<tbody>';
                                    echo '<tr>';
                                        echo '<td valign="top" width="25%">';
                                            echo '<div id="menu">';
                                                include ('VIEW/menu.php');
                                            echo "</div>";
                                        echo '</td>';
                                        echo '<td valign="top" width="25%"><div id="submenu"> </div></td>';
                                        echo '<td valign="top" width="25%"><div id="subsubmenu"> </div></td>';
                                    echo '</tr>';
                                echo '</tbody>';
                            echo '</table>';
                          ?>
                        </div>
                        <!-- Table Holder End -->

                      </div>
                    </div>
                    <!-- Basic Example End -->
                </div>
            </div>
        </div>
        <!-- Row End -->
    </div>
</div>