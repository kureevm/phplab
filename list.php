<?php

$buffer_KMS=fopen("data.csv", "r");
while (($data_KMS = fgetcsv($buffer_KMS, 0, ";")) !== FALSE) {
    $list_KMS[] = $data_KMS;
}
foreach ($list_KMS as $row) {
    foreach ($row as $key => $i){
        if ($key==0 or $key== 3){
            $list1[]=$i;
        }
        if ($key==0 or $key==4){
            $list2[]=$i;
        }
        if ($key==0 or $key==1 or $key==2){
            $list3[]=$i;
        }
    }
    $table1[]=$list1;
    $table2[]=$list2;
    $table3[]=$list3;
    $list1=[];
    $list2=[];
    $list3=[];
}
?>
    <title>tabs</title>
    <html>
    <div>
        <?php if (isset($_GET["list1"]) && $_GET["list1"] == "1") { ?>
            <form method="POST" name="list1" action="list.php?list1=0&list2=<?php echo (isset($_GET['list2']) ? $_GET['list2'] : ''); ?>&list3=<?php echo (isset($_GET['list3']) ? $_GET['list3'] : ''); ?>">
                <button style="width: 500px; height: 30px;"> TAB 1 </button>
            </form>
        <?php } else { ?>
            <form method="POST" name="list1" action="list.php?list1=1&list2=<?php echo (isset($_GET['list2']) ? $_GET['list2'] : ''); ?>&list3=<?php echo (isset($_GET['list3']) ? $_GET['list3'] : ''); ?>">
                <button style="width: 500px; height: 30px;"> TAB 1 </button>
            </form>
        <?php } ?>

        <?php if (isset($_GET["list2"]) && $_GET["list2"] == "1") { ?>
            <form method="POST" name="list2" action="list.php?list1=<?php echo (isset($_GET['list1']) ? $_GET['list1'] : ''); ?>&list2=0&list3=<?php echo (isset($_GET['list3']) ? $_GET['list3'] : ''); ?>">
                <button style="width: 500px; height: 30px;"> TAB 2 </button>
            </form>
        <?php } else { ?>
            <form method="POST" name="list2" action="list.php?list1=<?php echo (isset($_GET['list1']) ? $_GET['list1'] : ''); ?>&list2=1&list3=<?php echo (isset($_GET['list3']) ? $_GET['list3'] : ''); ?>">
                <button style="width: 500px; height: 30px;"> TAB 2 </button>
            </form>
        <?php } ?>

        <?php if (isset($_GET["list3"]) && $_GET["list3"] == "1") { ?>
            <form method="POST" name="list3" action="list.php?list1=<?php echo (isset($_GET['list1']) ? $_GET['list1'] : ''); ?>&list2=<?php echo (isset($_GET['list2']) ? $_GET['list2'] : ''); ?>&list3=0">
                <button style="width: 500px; height: 30px;"> TAB 3 </button>
            </form>
        <?php } else { ?>
            <form method="POST" name="list3" action="list.php?list1=<?php echo (isset($_GET['list1']) ? $_GET['list1'] : ''); ?>&list2=<?php echo (isset($_GET['list2']) ? $_GET['list2'] : ''); ?>&list3=1">
                <button style="width: 500px; height: 30px;"> TAB 3 </button>
            </form>
        <?php } ?>

        <form method="POST" action="form.php?action=addData">
            <button style="width: 500px; height: 30px;"> ADD </button>
        </form>
    </div>
    </html>

<?php
if (isset($_GET['list1']) && $_GET['list1'] == "1") {
    require 'list1.html';
}
if (isset($_GET['list2']) && $_GET['list2'] == "1") {
    require 'list2.html';
}
if (isset($_GET['list3']) && $_GET['list3'] == "1") {
    require 'list3.html';
}
?>