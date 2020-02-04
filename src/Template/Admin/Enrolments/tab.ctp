<?php foreach ($dataArray as $data): ?>
    <table class="table-bordered table-responsive m">
        <?php foreach ($data['termData'] as $key => $term) { ?>
            <tr>
                <th class="tb-small" scope="col"><?php echo $key ?></th>
                <td class="tb-small"><?php echo $term ?></td>
            </tr>
        <?php } ?>
    </table>
    <table class="table table-bordered table-responsive">
        <tr>
            <thead>
            <tr>
                <?php foreach ($data['header'] as $header) { ?>
                    <th><?php echo $header; ?></th>
                <?php } ?>
            </tr>
            </thead>
        </tr>
        <tbody>
        <?php foreach ($data['enrolment'] as $enrollment){
        $lengthforspace = count($data['header']) - count($staticHeader);
        ?>
        <tr>
            <td><?php echo $enrollment['child']['first_name'] . ' ' . $enrollment['last_name']; ?></td>
            <td><?php echo $enrollment['user']['f_name'] . ' ' . $enrollment['l_name']; ?></td>
            <td><?php echo date('Y-m-d', strtotime($enrollment['child']['dob'])); ?></td>
            <td><?php echo $enrollment['user']['phone']; ?></td>
            <?php for ($i = 0; $i < $lengthforspace; $i++) { ?>
                <td></td>
            <?php } ?>
            <?php } ?>
        </tr>
        </tbody>
    </table>
<?php endforeach; ?>

<style type="text/css">
    .tb-small{
        min-width: 150px;
        max-width: 150px;
        padding: 2%;
        background-color: white;
    }
    .m{
        margin-bottom: 1rem;
    }
    .table{
        margin-bottom: 5rem;
    }
</style>

