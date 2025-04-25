<x-guest-layout>
    <!--  Body Wrapper -->
    <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
        data-sidebar-position="fixed" data-header-position="fixed">
        <div
            class="overflow-hidden position-relative radial-gradient min-vh-100 d-flex align-items-center justify-content-center">
            <div class="d-flex align-items-center justify-content-center w-100">
                <div class="row justify-content-center w-100">
                    <div class="col-md-8 col-lg-6 col-xxl-3">
                        <div class="mb-0 card">
                            <div class="card-body">
                                <a href="/" class="py-3 text-center text-nowrap logo-img d-block w-100">
                                    <div class="d-flex justify-content-center">
                                        <img src="logo.png" alt="Logo" class="mx-auto">
                                    </div>
                                </a>
                                <p class="text-center"> School Van System</p>
                                <form method="POST" action="{{ route('register') }}">
                                    @csrf
                                    <div class="mb-3">
                                        <label for="name" class="form-label">Name</label>
                                        <input type="text" class="form-control" id="name" name="name"
                                            :value="old('name')" required autofocus autocomplete="name"
                                            style="border-radius: 20px;">
                                        <x-input-error :messages="$errors->get('name')" class="mt-2" />
                                    </div>

                                    <div class="mb-3">
                                        <label for="email" class="form-label">Email Address</label>
                                        <input type="email" class="form-control" id="email" name="email"
                                            :value="old('email')" required autocomplete="username"
                                            style="border-radius: 20px;">
                                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                                    </div>

                                    <div class="mb-4">
                                        <label for="password" class="form-label">Password</label>
                                        <input type="password" class="form-control" id="password" required
                                            autocomplete="new-password" name="password" style="border-radius: 20px;">
                                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                                    </div>

                                    <div class="mb-4">
                                        <label for="password_confirmation" class="form-label">Password</label>
                                        <input type="password" class="form-control" id="password_confirmation"
                                            name="password_confirmation" required autocomplete="new-password"
                                            style="border-radius: 20px;">
                                        <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                                    </div>


                                    <button type="submit" class="py-8 mb-4 btn btn-primary w-100 fs-4">Sign Up</button>
                                    <div class="d-flex align-items-center justify-content-center">
                                        <p class="mb-0 fs-4 fw-bold">Already have an Account?</p>
                                        <a class="text-primary fw-bold ms-2" href="/login">Sign In</a>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-guest-layout>
