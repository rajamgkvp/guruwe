<?php
/**
 * Project			:		IM-CARE
 * Created by		:		Sandeep Panwar
 * Copyright 2012 IM-CARE.
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright 2012 IM-CARE.
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       Cake.View.Pages
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

    <title>iDash Fluid Admin Panel</title>
    <!-- Include CSS -->
    <link href="css/reset.css" rel="stylesheet" type="text/css" />
    <link href="css/style.css" rel="stylesheet" type="text/css" />
    <link href="css/datatables.css" rel="stylesheet" type="text/css" />
    <link href="css/buttons.css" rel="stylesheet" type="text/css" />
    <link href="css/visualize.css" rel="stylesheet" type="text/css" />
    <link href="css/jqtransform.css" rel="stylesheet" type="text/css" />
    <!-- Inculude JS -->
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.4.4/jquery.min.js"></script>
	<script type="text/javascript" src="js/jquery.easing.1.3.js"></script>
    <script type="text/javascript" src="js/jquery.datatables.js"></script>
    <script type="text/javascript" src="js/jquery.visualize.js"></script>
	<script type="text/javascript" src="js/jquery.selectskin.js"></script>
    <script type="text/javascript" src="js/notes.js"></script>
    <script type="text/javascript" src="js/custom.js"></script>

</head>

<body>

<!-- Start Container -->
<div class="container">

	<div id="header">
    
    	<div id="header-right">
        
       	  <div id="user-card">
            
            	<div id="user-meta">
                
                	Welcome Back <a href="#">Tyler</a><br />
                    <a href="#">5 New Messages</a> And <a href="#">2 Notifications</a><br>
                    <span>Last Login: 11/16/2010 at 10:53 PM</span>
                
                </div>
                
                <a href="#"><img class="avatar" src="images/avatar.png" alt="avatar" /></a>
                
            </div>
            
        </div>
        
        <p class="logo"><a href="#"><img src="images/logo.png" border="0" alt="logo" /></a></p>
        
        <br class="clear" />
        
    </div>
    
    
    <div id="cpanel">
    
    	<div id="primary">
        
            <ul>
            
                <li class="current">
                    <a href="index.html">
                    <span class="icon icon_computer_off"></span>
                    <span class="label">Dashboard</span>
                    </a>
                </li>

                <li>
                    <a href="grid.html">
                    <span class="icon icon_measures"></span>
                    <span class="label">Full Grid</span>
                    </a>
                </li>

                <li>
                    <a href="charts.html">
                    <span class="icon icon_graph_areas"></span>
                    <span class="label">Charts</span>
                    </a>
                </li>

                <li>
                    <a href="notifications.html">
                    <span class="icon icon_comment_ok"></span>
                    <span class="label">Notifications</span>
                    </a>
                </li>
                
                <li>
                    <a href="datatables.html">
                    <span class="icon icon_frame"></span>
                    <span class="label">Datatables</span>
                    </a>
                </li>
                
                <li>
                    <a href="buttons.html">
                    <span class="icon icon_disk"></span>
                    <span class="label">Buttons / Icons</span>
                    </a>
                </li>
                
                <li>
                    <a href="type.html">
                    <span class="icon icon_fonts"></span>
                    <span class="label">Type &amp; Forms</span>
                    </a>
                </li>
                                            
            </ul>
                                  
        </div>