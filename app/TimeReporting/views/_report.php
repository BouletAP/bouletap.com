<div class="header">
    <div class="title">
        <h1>Rapport de temps - <?php echo $data['p']; ?></h1>
        <p>Liste des tâches réalisées et du temps consacré au projet</p>
    </div>
    <div class="copyright">
        <span>André-P. Boulet</span>
        <img src="/favicon.png" alt="Logo APB">
    </div>
</div>


<div class="overview">
    <div class="pastille">
        <h2><?php echo $data['total-tasks']; ?></h2>
        <p>Tâches complétées</p>
    </div>
    <div class="pastille">
        <h2><?php echo $data['time-billable']; ?> h</h2>
        <p>Temps facturable</p>
    </div>
    <div class="pastille">
        <h2><?php echo $data['date-start']; ?></h2>
        <p>Début des travaux</p>
    </div>
    <div class="pastille">
        <h2><?php echo $data['date-delivered']; ?></h2>
        <p>Livraison</p>
    </div>
</div>


<div class="tasks">
    <table>
        <thead>
            <tr>      
                <th>Description de la tâche</th>
                <th>Type</th>
                <th>Temps (h)</th>
            </tr>
        </thead>

        <tbody>

            <?php foreach($data['list-tasks'] as $day => $tasks): ?>
                <tr class="daily-header">                           
                    <td colspan="3">
                        <?php echo $day; ?>
                    </td>
                </tr>
                <?php foreach($tasks as $task): ?>
                    <tr>
                        <td><?php echo $task->task; ?></td>
                        <td><?php echo $task->billable_ratio === 1 ? "$" : "Inclus" ?></td>
                        <td><?php echo $task->getTime(); ?></td>
                    </tr>
                <?php endforeach; ?>
            <?php endforeach; ?>    
            
            <tr>                           
                <td colspan="2" align="right">
                    Total :<br>
                    <?php if(!empty($data['time-included'])): ?>
                        Inclus :<br>
                        Facturable :
                    <?php endif; ?>
                </td>
                <td>
                    <?php echo $data['time-total']; ?> h<br>
                    <?php if(!empty($data['time-included'])): ?>
                        <?php echo $data['time-included']; ?> h<br>
                        <?php echo $data['time-billable']; ?> h
                    <?php endif; ?>
                </td>
            </tr>
            
        </tbody>
    </table>
</div>