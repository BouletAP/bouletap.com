<div class="admin-menu">
    <h3>Navigation</h3>
    <ul>
        <li><a href="/admin">Accueil admin</a></li>
        <li><a href="/admin/articles">Articles</a> <a href="/admin/articles/add">(+)</a></li>
        <li><a href="/admin/portfolio">Portfolio</a> <a href="/admin/portfolio/add">(+)</a></li>
        <li><a href="/admin/analytics">Analytics</a></li>
        <li><a href="/admin/timesheet">Rapport de temps</a></li>
        <li><a href="javascript:;" onclick="confirmBackup('/admin/backup');">Backup website</a></li>
        <li><a href="/logout">Logout</a></li>
    </ul>
</div>
<script>
    function confirmBackup(link) {
        if(confirm("Do a full backup, yes?")) {
            window.location.href = link;
        }
        return false;
    }
</script>