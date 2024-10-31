<?php
    //$form = $data['publication_form'];
?>
<title>Admin Articles André-Philippe Boulet</title>  
<link rel="stylesheet" href="/medias/css/admin.css" />    

</head>

<body class="home">
    <div class="header-container">        
        <?php include(APP_PATH.'/Pages/views/_header.php'); ?>
    </div>
    <div class="page-content">     
       
        <section class="hero">

            <div class="page-header">
                <span class="subtitle">Administration</span>
                <h1>Rapport de temps</h1>       
                
            </div>

        </section>


        <section class="dashboard-content">
            <div class="sidebar">
                <?php include(APP_PATH.'/Admin/views/_menu.php'); ?>
            </div>
            <div class="module-timesheet timesheet-details page-admin">
                
                
            
                <div class="col-md-7 align-self-center text-right">
                    <div class="d-flex justify-content-end align-items-center">
                        <button onclick="apb_toggleFilters()" type="button" class="btn btn-info d-none d-lg-block m-l-15"><i class="fa a-pencil-square"></i> Edit settings</button>
                        <button type="button" onclick="window.location = '/timesheet?worksheet-refresh-data=1'" class="btn btn-warning d-none d-lg-block m-l-15"><i class="fa fa-floppy-o"></i> Refresh</button>
                    </div>
                </div>
                <div class="col-12 hidden" id="pageFilters">
                    <form name="projectfilterform" action="/admin/timesheet/details" method="get">
                        <div>
                            <label for="project">Choose project ( <a href="javascript:apb_toggleMultiSelect('project');">+</a> )</label><br>
                            <select name="p" id="project">
                                <?php foreach($data['list-projects'] as $project): ?>
                                    <option value="<?php echo $project->id; ?>"><?php echo $project->name; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div>
                            <label for="project">Choose dates</label><br>
                            <input type="text" name="ds" placeholder="Start date (dd-mm-yyyy)" value="<?php echo date("d-m-Y", time()-(3600*24*14)) ?>">
                            <input type="text" name="de"  placeholder="End date (dd-mm-yyyy)" value="<?php echo date("d-m-Y", time()) ?>">
                        </div>
                        <div>
                            <input type="submit" value="Show report">
                        </div>
                    </form>
                </div>
            

                <?php if( $data['display_tasks'] ): ?>
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">

                                    <div class="row">
                                        <div class="col-sm-8">
                                            <h4 class="card-title">Time report - <?php echo $data['report_name']; ?></h4>
                                            <h6 class="card-subtitle">List of tasks completed and time spent on the project.</h6>
                                        </div>
                                        <div class="col-sm-4" style="text-align:right">
                                            <span>
                                                Logiciels BouletAP
                                            </span> 
                                            <img width="55px" src="/Ressources/medias/imgs/logo-bouletap.png" alt="Logo de Logiciels BouletAP" class="dark-logo" />
                                        
                                        </div>
                                    </div>           
                                        
                                    <div class="row m-t-40">
                                        <!-- Column -->
                                        <div class="col-md-6 col-lg-3 col-xlg-3">
                                            <div class="card">
                                                <div class="box bg-success text-center">
                                                    <h1 class="font-light text-white"><?php echo count($data['project_data']->taskList); ?></h1>
                                                    <h6 class="text-white">Completed Tasks</h6>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Column -->
                                        <div class="col-md-6 col-lg-3 col-xlg-3">
                                            <div class="card">
                                                <div class="box bg-info text-center">
                                                    <h1 class="font-light text-white"><?php echo $data['project_data']->billable_time; ?> h</h1>
                                                    <h6 class="text-white">Billable Time</h6>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Column -->
                                        <div class="col-md-6 col-lg-3 col-xlg-3">
                                            <div class="card">
                                                <div class="box bg-primary text-center">
                                                    <h1 class="font-light text-white"><?php echo $data['project_data']->getStartDate; ?></h1>
                                                    <h6 class="text-white">Project started</h6>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Column -->
                                        <div class="col-md-6 col-lg-3 col-xlg-3">
                                            <div class="card">
                                                <div class="box bg-dark text-center">
                                                    <h1 class="font-light text-white"><?php echo $data['project_data']->getDeliveryDate; ?></h1>
                                                    <h6 class="text-white">Project Delivery</h6>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Column -->
                                    </div>
                                    
                                    <div class="list-tasks">
                                        
                                        
                                    <?php

                                        if( !isset($data['project_data']) ) {
                                            $data['project_data'] = array();
                                        }        
                                        //echo '<pre>'; print_r($data['project_data']->taskByDate); echo '</pre>'; die();
                                        ?>

                                        <div class="table-responsive">        
                                            <table id="demo-foo-addrow" class="table m-t-30 table-hover no-wrap contact-list footable footable-1 footable-paging footable-paging-center breakpoint-md">
                                                <thead>
                                                    <tr class="footable-header">      
                                                        <th>Task description</th>
                                                        <th>Status</th>
                                                        <th>Time (h)</th>
                                                    </tr>
                                                </thead>
                                                <tbody>       
                                                    <?php $t_counter = 0; ?>
                                                    <?php foreach($data['project_data']->taskByDate as $day => $daily_tasks): ?>   
                                                        <?php if($data['tasks-buffering'] && $t_counter > 24): $data['tasks-buffering'] = false;  ?>
                                                            <?php for($i=0;$i<5;$i++): ?>   
                                                                <tr class="buffer-row" ><td colspan="3" style="border:0px;" >&nbsp;</td><tr> 
                                                            <?php endfor; ?>
                                                        <?php endif; ?>
                                                        <tr class="daily-header">                           
                                                            <td colspan="3"><?php echo date('F d, Y', $day); ?> - <?php echo count($daily_tasks); ?> <?php echo count($daily_tasks) > 1 ? 'tasks' : 'task'; ?></td>
                                                        </tr>
                                                        <?php foreach($daily_tasks as $task): $t_counter++; ?>   
                                                            <tr>           
                                                                <td><?php echo $task->description; //$t_counter . " - " .  ?></td>
                                                                <td>
                                                                    <span class="label label-<?php echo $task->getBillableClass(); ?>"><?php echo $task->getBillableLabel() ?></span>
                                                                </td>
                                                                <td><?php echo $task->totalTime; ?></td>                                        
                                                            </tr> 
                                                        <?php endforeach; ?>
                                                    <?php endforeach; ?>
                                                        <tr style="font-weight:bold;">                           
                                                            <td colspan="2" style="text-align:right;">
                                                                Total time spent:<br><br>
                                                                Free time:<br>
                                                                Billable time:<br>
                                                            </td>
                                                            <td>
                                                                <?php echo $data['project_data']->total_time; ?> h<br><br>
                                                                <?php echo $data['project_data']->free_time; ?> h<br>
                                                                <?php echo $data['project_data']->billable_time; ?> h<br>                        
                                                            </td>
                                                        </tr>
                                                </tbody>
                                                
                                            </table>
                                        </div>

                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php endif; ?>


            </div>


        </section>
       

    </div>      


