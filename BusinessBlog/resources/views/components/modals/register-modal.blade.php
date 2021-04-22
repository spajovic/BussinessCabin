<div class="modal fade" id="registerModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Register</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{route('register')}}" onsubmit="return proveraRegister()">
                    @method('POST')
                    @csrf
                    <div class="mb-3">
                        <label for="register-name" id="register-namelab" class="col-form-label">Name :</label>
                        <input type="text" class="form-control" id="register-name" name="register-name">
                    </div>
                    <div class="mb-3">
                        <label for="register-surname" id="register-snamelab" class="col-form-label">Surname :</label>
                        <input type="text" class="form-control" id="register-surname" name="register-surname">
                    </div>
                    <div class="mb-3">
                        <label for="register-email" id="register-emlab" class="col-form-label">Email :</label>
                        <input type="text" class="form-control" id="register-email" name="register-email">
                    </div>
                    <div class="mb-3">
                        <label for="register-passwd" id="register-passlab" class="col-form-label">Password :</label>
                        <input type="password" class="form-control" id="register-passwd" name="register-passwd">
                    </div>
                    <div class="mb-3">
                        <label for="register-passwd1" id="register-passlab1" class="col-form-label">Repeat Password :</label>
                        <input type="password" class="form-control" id="register-passwd1" name="register-passwd1">
                    </div>

                <div class="container-fluid">
                    <div class="row">
                        <div class="col-sm-9">
                            <p>You are already a member? <em>Go login</em></p>
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn" id="register-btn" name="register-btn">Register</button>
                </div>
                </form>
            </div>

        </div>
    </div>
</div>
