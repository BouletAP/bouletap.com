<div class="report-commands">

    <div class="section-upload">
        <form action="/admin/timesheet/upload" method="post" enctype="multipart/form-data">
            <?php echo $data['upload_form']->getField('report')->display(); ?>
            <button type="submit" class="btn-cta"><i class="fa fa-cloud-upload"></i> Upload new file</button>
        </form>
    </div>

    <div class="col-12" id="pageFilters">
        <form name="projectfilterform" action="/admin/timesheet/details" method="get">
            <div>
                <label for="project">Project <a href="javascript:apb_toggleMultiSelect('project');">(*)</a></label><br>
                <select name="p" id="project">
                    <option value="*">Tous les projets</option>
                    <?php foreach($data['list-projects'] as $project): ?>
                        <option value="<?php echo $project; ?>" <?php echo $data['p'] == $project ? 'selected="selected"' : ''; ?>><?php echo $project; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div>
                <label for="project">Choose dates</label><br>
                <input type="text" name="ds" placeholder="Start date (YYYY-mm-dd)" value="<?php echo $data['ds']; ?>">
                <input type="text" name="de"  placeholder="End date (YYYY-mm-dd)" value="<?php echo $data['de']; ?>">
            </div>
            <div>
                <input type="submit" value="Show report">
            </div>
        </form>
    </div>

</div>