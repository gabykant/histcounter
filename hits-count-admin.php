<div class="wrap">
    <?php
    /**
     * Get all entries ffrom the table
     */
        $getAll = $wpdb->get_results("SELECT COUNT(*) as C, url as U FROM ".$wpdb->prefix."hitscounter GROUP BY url ORDER BY C DESC LIMIT 10");
    ?>

    <div class="row detail-content">
        <div class="col-md-3">
            <img src="<?php echo plugins_url('assets/images/logo.png', __FILE__);?>" />
        </div>
        <div class="col-md-9">
            <h1>Hits Counter</h1>
            <p>
                Get statistics of all visited links
            </p>
            <p>
                Why is this interesting ?
                <ul>
                    <li>Know which post category is mostly visited</li>
                </ul>
            </p>
        </div>
    </div>
    
    <div class="row surround-border">

        <h3>All statistics</h3>
        <table class="table table-responsive table-hover">
            <tr>
                <th class='first-item'>Visited links</th>
                <th class='first-item' style='text-align:center'>Number of hits</th>
            </tr>
        <?php
        foreach ($getAll as $val) {
            echo "<tr>
            <td >" . $val->U. "</td>
            <td style='text-align:center'>" . $val->C ."</td></tr>";
        }
        ?>
        </table>
    </div>

</div>