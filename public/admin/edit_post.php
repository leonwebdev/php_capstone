<?php

require __DIR__ . '/config/config.php';
// ----- SET PAGE TITLE ------------------------
$title = 'Posts | Administration';

/*--------------------------------------------------------------------------*/

/*-----------             ACTUAL CODE IN THIS PAGE              ------------*/

/*--------------------------------------------------------------------------*/

$user_dtls = $user->getAll();
$cat_dtls = $cat->getAll();
$post_dtl = $posts->getOne($_GET['id']);

if ('POST' === $_SERVER['REQUEST_METHOD']) {

    if ($_POST['csrf_token'] !== $_SESSION['csrf_token']) {
        die('CSRF token mismatch');
    }

    /* STEP 1 - VALIDATE ALL FIELDS
   ---------------------------------------------------- */

    require __DIR__ . '/modules/validate_post_edit.php';

    /* STEP 2 -- IF NO ERRORS, REDIRECTE TO PROCESS_LOGIN
    -------------------------------------------------------- */

    if (count($errors) == 0) {

        require __DIR__ . '/modules/process_post_edit.php';
    }
}

include __DIR__ . '/inc/header.inc.php';

?><div class="content container mt-5 mb-5">

    <?php if (!empty($flash['success'])) : ?>
    <div class="alert alert-success">
        <?= esc($flash['success']) ?>
    </div>
    <?php endif; ?>

    <?php if (!empty($flash['error'])) : ?>
    <div class="alert alert-danger">
        <?= esc($flash['error']) ?>
    </div>
    <?php endif; ?>

    <h1 class="mb-5">Edit Post</h1>
    <div class="container">
        <div class="row">
            <div class="col-2"> </div>
            <div class="col-8">
                <form method="post" enctype="multipart/form-data" novalidate>
                    <input type="hidden" name="csrf_token" value="<?= csrf() ?>" />
                    <div class="mb-3">
                        <label for="title" class="form-label fw-bold">Title</label>
                        <input type="text" class="form-control" id="title" name="title"
                            value="<?= esc($_POST['title'] ?? $post_dtl['title']) ?>">
                        <span class="form_validate_error my-3"><?= esc($errors['title'][0] ?? '') ?></span>
                    </div>
                    <div class="mb-3">
                        <label for="summary" class="form-label fw-bold">Summary</label>
                        <textarea class="form-control" id="summary" name="summary" rows="3"
                            placeholder="Add a summary on this post..."><?= esc($_POST['summary'] ?? $post_dtl['summary']); ?></textarea>
                        <span class="form_validate_error my-3"><?= esc($errors['summary'][0] ?? '') ?></span>
                    </div>
                    <div class="mb-3">
                        <label for="content" class="form-label fw-bold">Content</label>
                        <textarea class="form-control editor" id="content" name="content"
                            rows="3"><?= esc($_POST['content'] ?? $post_dtl['content']); ?></textarea>
                        <span class="form_validate_error my-3"><?= esc($errors['content'][0] ?? '') ?></span>
                    </div>

                    <div class="row mb-3">
                        <div class="col">
                            <label for="authorid" class="form-label fw-bold">Author</label>
                            <select class="form-select" id="authorid" name="authorid">
                                <option value="0">Select your author</option>
                                <?php foreach ($user_dtls as $key => $user_dtl) : ?>
                                <option value="<?= esc_attr($user_dtl['id']) ?>"
                                    <?= (!isset($_POST['authorid']) && $user_dtl['id'] == $post_dtl['authorid']) ? "selected" : "" ?>
                                    <?= (isset($_POST['authorid']) && $user_dtl['id'] == $_POST['authorid']) ? "selected" : "" ?>>
                                    <?= esc($user_dtl['first_name'] . ' ' . $user_dtl['last_name']) ?></option>
                                <?php endforeach; ?>
                            </select>
                            <span class="form_validate_error my-3"><?= esc($errors['authorid'][0] ?? '') ?></span>
                        </div>
                        <div class="col">
                            <label for="categoryid" class="form-label fw-bold">Category</label>
                            <select class="form-select" id="categoryid" name="categoryid">
                                <option value="0">Select category</option>
                                <?php foreach ($cat_dtls as $key => $cat_dtl) : ?>
                                <option value="<?= esc_attr($cat_dtl['id']) ?>"
                                    <?= (!isset($_POST['categoryid']) && $cat_dtl['id'] == $post_dtl['categoryid']) ? "selected" : "" ?>
                                    <?= (isset($_POST['categoryid']) && $cat_dtl['id'] == $_POST['categoryid']) ? "selected" : "" ?>>
                                    <?= esc($cat_dtl['title']) ?></option>
                                <?php endforeach; ?>
                            </select>
                            <span class="form_validate_error my-3"><?= esc($errors['categoryid'][0] ?? '') ?></span>
                        </div>
                        <div class="col">
                            <label for="status" class="form-label fw-bold">Status</label>
                            <select class="form-select" id="status" name="status">
                                <option value="0">Select status</option>
                                <option value="draft"
                                    <?= (!isset($_POST['status']) && "draft" == $post_dtl['status']) ? "selected" : "" ?>
                                    <?= (isset($_POST['status']) && "draft" == $_POST['status']) ? "selected" : "" ?>>
                                    draft
                                </option>
                                <option value="hidden"
                                    <?= (!isset($_POST['status']) && "hidden" == $post_dtl['status']) ? "selected" : "" ?>
                                    <?= (isset($_POST['status']) && "hidden" == $_POST['status']) ? "selected" : "" ?>>
                                    hidden
                                </option>
                                <option value="post"
                                    <?= (!isset($_POST['status']) && "post" == $post_dtl['status']) ? "selected" : "" ?>
                                    <?= (isset($_POST['status']) && "post" == $_POST['status']) ? "selected" : "" ?>>
                                    post</option>
                            </select>
                            <span class="form_validate_error my-3"><?= esc($errors['status'][0] ?? '') ?></span>
                        </div>
                        <div class="col">
                            <label for="allow_comment" class="form-label fw-bold">Allow Comment</label>
                            <select class="form-select" id="allow_comment" name="allow_comment">
                                <option value="1"
                                    <?= (!isset($_POST['allow_comment']) && 1 == $post_dtl['allow_comment']) ? "selected" : "" ?>
                                    <?= (isset($_POST['allow_comment']) && 1 == $_POST['allow_comment']) ? "selected" : "" ?>>
                                    Yes</option>
                                <option value="0"
                                    <?= (!isset($_POST['allow_comment']) && 0 == $post_dtl['allow_comment']) ? "selected" : "" ?>
                                    <?= (isset($_POST['allow_comment']) && 0 == $_POST['allow_comment']) ? "selected" : "" ?>>
                                    No</option>
                            </select>
                            <span class="form_validate_error my-3"><?= esc($errors['allow_comment'][0] ?? '') ?></span>
                        </div>


                    </div>

                    <div class="mb-3">
                        <div style="width: 200px;">
                            <img src="./../images/posts/<?= esc_attr($post_dtl['image']) ?>"
                                style="width: 100%;height:auto;">
                        </div>
                        <label for="image" class="form-label fw-bold">Upload a picture</label>
                        <input class="form-control" type="file" id="image" name="image">
                        <span class="form_validate_error my-3"><?= esc($errors['image'][0] ?? '') ?></span>
                    </div>
                    <div class="mt-3">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>

            </div>
            <div class="col-2"> </div>

        </div>
    </div>
</div>

<?php include __DIR__ . '/inc/footer.inc.php'; ?>

<script src="./js/ckeditor.js"></script>
<script>
ClassicEditor
    .create(document.querySelector('.editor'), {

        licenseKey: '',



    })
    .then(editor => {
        window.editor = editor;




    })
    .catch(error => {
        console.error('Oops, something went wrong!');
        console.error(
            'Please, report the following error on https://github.com/ckeditor/ckeditor5/issues with the build id and the error stack trace:'
        );
        console.warn('Build id: org5kicul2kg-rzn5b6r6hoyd');
        console.error(error);
    });
</script>

</body>

</html>