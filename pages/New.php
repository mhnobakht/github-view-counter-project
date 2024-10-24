<?php

use Classes\Link;

if($_SERVER['REQUEST_METHOD'] === 'POST') {
    if(isset($_POST['title'])) {
        $link = new Link();
        $link->addLink($_POST['title']);
    }
}

?>
<div class="row">
    <div class="col-12">
        <h1>Add new Link</h1>
        <hr>
        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']).'?page=new'; ?>" method="post">
            <div class="form-group">
                <label for="tilte">Title</label>
                <input name="title" type="text" placeholder="link title" required class="form-control">
            </div>
            <div class="form-group">
                <input type="submit" value="Create" class="form-control btn btn-primary">
            </div>
        </form>
    </div>
</div>