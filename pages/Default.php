<?php

use Classes\Link;

$link = new Link();

$links = $link->showLinks();


?>
<div class="row">
    <div class="col-12">
        <h2>Links</h2>
        <a href="<?php echo htmlspecialchars($_SERVER['PHP_SELF']).'?page=new'; ?>">
            <button class="btn btn-primary">Create New Link</button>
        </a>
        <hr>
        <table class="table table-stripped table-hover">
            <thead>
            <tr>
                <th>title</th>
                <th>UUID</th>
                <th>View</th>
                <th>Operations</th>
            </tr>
            </thead>
            <tbody>
           <?php 
            foreach($links as $link):
           ?>
            <tr>
                <td><?php echo $link['title']; ?></td>
                <td><?php echo $link['uuid']; ?></td>
                <td><?php echo $link['counter']; ?></td>
                <td>Edit</td>
            </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>

</div>