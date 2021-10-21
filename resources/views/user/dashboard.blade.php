<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    @include('flash-message')
    <div class="row g-3 mt-3">
        <div class="col-md-12 col-lg-12">
            <h4 class="mb-3">User Detail</h4>
            <form class="needs-validation" action="{{ route('user.update') }}" method="POST" novalidate>
                @csrf
                <div class="row g-3">
                    <div class="col-sm-12">
                        <label for="firstName" class="form-label">Name</label>
                        <input type="text" name="name" class="form-control" value="{{ Auth::user()->name }}" required>
                        <div class="invalid-feedback">
                            Valid name is required.
                        </div>
                    </div>

                    <div class="col-12">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" name="email" class="form-control" id="email"
                            value="{{ Auth::user()->email }}" required>
                        <div class="invalid-feedback">
                            Please enter a valid email.
                        </div>
                    </div>
                </div>
                <hr class="my-4">

                <button class="btn btn-primary" type="submit">Update</button>
            </form>
        </div>
    </div>

    <hr class="my-4">

    <div class="row g-3 mt-3">
        <div class="col-md-12 col-lg-12">
            <h4 class="mb-3">Update Password</h4>
            <form class="needs-validation" action="{{ route('user.update.password') }}" method="POST" novalidate>
                @csrf
                <div class="row g-3">
                    <div class="col-sm-12">
                        <label for="firstName" class="form-label">Old Password</label>
                        <input type="password" name="password" class="form-control" required>
                        <div class="invalid-feedback">
                            Old password required.
                        </div>
                    </div>

                    <div class="col-12">
                        <label for="password" class="form-label">New Password</label>
                        <input type="password" name="new_password" class="form-control" id="txtNewPassword" required>
                        <div class="invalid-feedback">
                            New password required.
                        </div>
                    </div>

                    <div class="col-12">
                        <label for="password" class="form-label">Repeat New Password</label>
                        <input type="password" name="repeat_password" class="form-control" id="txtConfirmPassword" required>
                        <div class="invalid-feedback">
                            Repeat new password required.
                        </div>
                        <div class="registrationFormAlert" style="color:green;" id="CheckPasswordMatch">
                    </div>
                </div>

                <hr class="my-4">
                
                <button class="btn btn-primary" type="submit">Update</button>
            </form>
        </div>
    </div>
</main>