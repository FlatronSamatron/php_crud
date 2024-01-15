<div class="container">
    <div class="card">
        <div class="card-header">
            <h3><?php echo ($user['id'] ? "Update" : "Create") . " user: " ?><b><?= $user['name'] ?></b></h3>
        </div>
        <div class="card-body">
            <form method="POST" enctype="multipart/form-data" action="">
                <div class="form-group">
                    <label>Name:</label>
                    <input name="name" type="text" class="form-control <?= $errors['name'] ? 'is-invalid' : ''?>" value=<?= $user['name']?>>
                    <div class="invalid-feedback">
                        <?= $errors['name']?>
                    </div>
                </div>
                <div class="form-group">
                    <label>Username:</label>
                    <input name="username" type="text" class="form-control <?= $errors['username'] ? 'is-invalid' : ''?>" value=<?= $user['username']?>>
                    <div class="invalid-feedback">
                        <?= $errors['username']?>
                    </div>
                </div>
                <div class="form-group">
                    <label>Email:</label>
                    <input name="email" type="text" class="form-control <?= $errors['email'] ? 'is-invalid' : ''?>" value=<?= $user['email']?>>
                    <div class="invalid-feedback">
                        <?= $errors['email']?>
                    </div>
                </div>
                <div class="form-group">
                    <label>Phone:</label>
                    <input name="phone" type="text" class="form-control <?= $errors['phone'] ? 'is-invalid' : ''?>" value=<?= $user['phone']?>>
                    <div class="invalid-feedback">
                        <?= $errors['phone']?>
                    </div>
                </div>
                <div class="form-group">
                    <label>Website:</label>
                    <input name="website" type="text" class="form-control <?= $errors['website'] ? 'is-invalid' : ''?>" value=<?= $user['website']?>>
                    <div class="invalid-feedback">
                        <?= $errors['website']?>
                    </div>
                </div>
                <div class="form-group">
                    <label>Image:</label>
                    <input name="picture" type="file" class="form-control">
                </div>

                <button class="btn btn-success">Submit</button>
            </form>
        </div>
</div>