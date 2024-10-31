<?php
    //$form = $data['publication_form'];
?>
<title>Admin Articles André-Philippe Boulet</title>  
<link rel="stylesheet" href="/medias/css/admin.css" />    
<link rel="stylesheet" href="/medias/css/timereport.css" />    

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
            <div class="module-timesheet timesheet-index page-admin">
                
                
            
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
            


            </div>


        </section>
       

    </div>      


