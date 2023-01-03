<table class="table " id="tableService">
    <thead>
        <tr>
            <th scope="col">SERVICE</th>
            <th scope="col">EDITER</th>
            <th scope="col">SUPPRIMER</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($selectService as $nameService) : ?>
            <tr>
                <td><?= $nameService['nameService'] ?></td>
                <td>
                    <button type="button" class="btn btn-warning">MODIFIER</button>
                </td>
                <td>
                    <button type="button" class="btn btn-danger">SUPPRIMER</button>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>