<html>
<head>
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
</head>

<body>
    <?php foreach ($dataArray as $data): ?>
        <table class="table-bordered table-responsive m">
            <?php foreach ($data['termData'] as $key => $term) { ?>
                <tr>
                    <th class="tb-small" scope="col"><?php echo $key ?></th>
                    <td class="tb-small"><?php echo $term ?></td>
                </tr>
            <?php } ?>
        </table>
        <table class="table table-bordered table-responsive enrol_table">
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
            <?php foreach ($data['enrolData'] as $enrolment){
            $lengthforspace = count($data['header']) - count($staticHeader);
            ?>
            <tr>
                <td><?php echo $enrolment['child']['first_name'] . ' ' . $enrolment['child']['last_name']; ?></td>
                <td><?php echo $enrolment['user']['f_name'] . ' ' . $enrolment['user']['l_name']; ?></td>
                <td><?php echo date('d-m-Y', strtotime($enrolment['child']['dob'])); ?></td>
                <td><?php echo $enrolment['user']['phone']; ?></td>
                <td><?php echo $enrolment['comment'] ?></td>
                <td><?php echo $enrolment['payment_method'] ?></td>
                <?php for ($i = 0; $i < $lengthforspace; $i++) { ?>
                    <td ondblclick="makeInput(this)"></td>
                <?php } ?>
                <?php } ?>

            </tr>
            </tbody>
        </table>
    <?php endforeach; ?>

    <script>
        //put every class in one big array
        let tb = document.getElementsByClassName('enrol_table');
        let
        for(let i=0; i<tb.length; i++){
            loop_table(tb.item(i));
        }
        function loop_table(table){
            $(table).find('tr').each(function(){
                $(this).find('td').each(function(){
                    let th = $(this).parents('table').find('th').eq($(this).index());
                    //console.log(th.text());
                    if(th.text())
                });
            });
        }
    </script>
</body>
</html>
