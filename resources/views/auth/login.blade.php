<!DOCTYPE html>
<html lang="en">

@include('layout.head')

<body>
    <main class="d-flex w-100">
        <div class="container d-flex flex-column">
            <div class="row vh-100">
                <div class="col-sm-10 col-md-8 col-lg-6 mx-auto d-table h-100">
                    <div class="d-table-cell align-middle">
                        <div class="card">
                            <div class="card-body">
                                <div class="m-sm-3">
                                    <div class="text-center">
                                        <h1 class="h2">Log In</h1>
                                    </div>
                                    <form method="POST" action="{{ url('/login') }}">
                                        @csrf
                                        <div class="mb-3">
                                            <label class="form-label">E-Mail</label>
                                            <input class="form-control form-control-lg" type="text" name="email"
                                                placeholder="Email">
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Password</label>
                                            <input class="form-control form-control-lg" type="password" name="password"
                                                placeholder="Password">
                                        </div>
                                        <div>
                                            <label class="form-check">
                                                <input class="form-check-input" type="checkbox" value="remember-me"
                                                    name="remember-me" checked="">
                                                <span class="form-check-label">Remember me</span>
                                            </label>
                                        </div>
                                        <div class="mt-3 d-grid text-center">
                                            <button type="submit" name="submit" class="btn btn-primary">Log
                                                In</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

</body>

</html>
