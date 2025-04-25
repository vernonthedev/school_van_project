<x-guest-layout>

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <!--  Body Wrapper -->
    <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
        data-sidebar-position="fixed" data-header-position="fixed">
        <div
            class="position-relative overflow-hidden radial-gradient min-vh-100 d-flex align-items-center justify-content-center">
            <div class="d-flex align-items-center justify-content-center w-100">
                <div class="row justify-content-center w-100">
                    <div class="col-md-8 col-lg-6 col-xxl-3">
                        <div class="card mb-0">
                            <div class="card-body">

                                <a href="/" class="text-nowrap logo-img text-center d-block py-3 w-100">
                                    <div class="d-flex justify-content-center">
                                        <img src="logo.png" alt="Logo" class="mx-auto">
                                    </div>
                                </a>
                                <p class="text-center"> School Van System</p>

                                <form method="POST" action="{{ route('login') }}">
                                    @csrf
                                    <div class="mb-3">
                                        <label for="email" class="form-label">Email</label>
                                        <input id="email" type="email" class="form-control" name="email"
                                            style="border-radius: 20px;" :value="old('email')" required autofocus
                                            autocomplete="username">
                                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                                    </div>
                                    <div class="mb-4">
                                        <label for="password" class="form-label">Password</label>
                                        <input type="password" class="form-control" id="password" name="password"
                                            style="border-radius: 20px;">
                                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                                    </div>

                                    <button type="submit" class="btn btn-primary w-100 py-8 fs-4 mb-4">Sign
                                        In</button>
                                    <div class="d-flex align-items-center justify-content-center">
                                        <p class="fs-4 mb-0 fw-bold">New?</p>
                                        <a class="text-primary fw-bold ms-2" href="{{ route('register') }}">Create
                                            an
                                            account</a>
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
