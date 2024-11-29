<table class="admin-listing">
    <tr>
        <th>id</th>
        <th>title</th>
        <th>actions</th>
    </tr>
    <?php if( !empty($data['items']) ): ?>
        <?php foreach($data['items'] as $item): ?>
            <tr>
                <td><?= $item->id ?></td>
                <td><?= $item->getTitle(); ?></td>
                <td>
                    <a href="/admin/timesheet/edit/<?= $item->id ?>">edit</a>
                    <a href="javascript:;" onclick="alert_confirm_delete('/admin/timesheet/delete/<?= $item->id ?>')">delete</a>
                </td>
            </tr>
        <?php endforeach; ?>
    <?php else: ?>
        <tr>
            <td colspan="3">Aucun item dans la liste</td>
        </tr>
    <?php endif; ?>

</table>
<script>
    function alert_confirm_delete(link) {
        if( confirm("Please confirm, this is final") ) {
            window.location.href = link;
        }
    }
</script>