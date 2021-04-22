<!-- LOGIN modal -->
<div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">LogIn</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{route('login')}}" onsubmit="return proveraLogin()">
                    @csrf
                    <div class="mb-3">
                        <label for="login-email" id="login-emlab" class="col-form-label">Email :</label>
                        <input type="text" class="form-control" id="login-email" name="login-email">
                    </div>
                    <div class="mb-3">
                        <label for="login-passwd" id="login-passlab" class="col-form-label">Password :</label>
                        <input type="password" class="form-control" id="login-passwd" name="login-passwd">
                    </div>

                <div class="container-fluid">
                    <div class="row">
                        <div class="col-sm-9">
                            <p>You don't have an account? <em>Go register</em></p>
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn" id="login-btn" name="login-btn">Login</button>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>
{{--<!-- Kraj LOGIN ----}}
