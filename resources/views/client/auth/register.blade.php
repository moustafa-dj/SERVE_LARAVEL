@extends('app')
@section('content')
  <main class="mt-3">
    <div class="container">
      <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">

              <div class="d-flex justify-content-center py-4">
                <a href="index.html" class="logo d-flex align-items-center w-auto">
                  <img src="assets/img/logo.png" alt="">
                </a>
              </div><!-- End Logo -->

              <div class="card mb-3">

                <div class="card-body">

                  <div class="pt-4 pb-2">
                    <h5 class="card-title text-center pb-0 fs-4">Become a client</h5>
                  </div>

                  <form class="row g-3 needs-validation" action = "{{ route('client.register')}}" method = "POST" novalidate>

                    @csrf
                      <div class="col-12">
                          <label for="yourUsername" class="form-label">Name</label>
                          <div class="input-group has-validation">
                              <input type="name" name="name" 
                                  class="form-control @error('name') is-invalid @enderror" id="name" required>
                              @error('name')
                                  <div class="invalid-feedback">{{$message}}.</div>
                              @enderror
                          </div>
                      </div>
                      <div class="col-12">
                        <label for="yourUsername" class="form-label">Email</label>
                        <div class="input-group has-validation">
                          <span class="input-group-text" id="inputGroupPrepend">@</span>
                          <input type="email" name="email" 
                          class="form-control @error('email') is-invalid @enderror" id="email" required>
                          @error('email')
                              <div class="invalid-feedback">{{$message}}.</div>
                          @enderror
                        </div>
                      </div>
                      <div class="col-12">
                          <label for="yourUsername" class="form-label">Phone</label>
                          <div class="input-group has-validation">
                              <input type="text" name="phone" 
                                  class="form-control @error('phone') is-invalid @enderror" id="name" required>
                              @error('phone')
                                  <div class="invalid-feedback">{{$message}}.</div>
                              @enderror
                          </div>
                      </div>
                      <div class="col-12">
                          <label for="yourUsername" class="form-label">Adress</label>
                          <div class="input-group has-validation">
                              <input type="text" name="adress" 
                                  class="form-control @error('adress') is-invalid @enderror" id="adress" required>
                              @error('adress')
                                  <div class="invalid-feedback">{{$message}}.</div>
                              @enderror
                          </div>
                      </div>
                      <div class="col-12">
                        <label for="yourPassword" class="form-label">Password</label>
                        <input type="password" name="password" 
                        class="form-control @error('password') is-invalid @enderror" id="yourPassword" required>
                          @error('password')
                              <div class="invalid-feedback">{{$message}}.</div>
                          @enderror
                      </div>
                      <div class="col-12">
                        <div class="form-check">
                          <input class="form-check-input" type="checkbox" name="remember" value="true" id="rememberMe">
                          <label class="form-check-label" for="rememberMe">Remember me</label>
                        </div>
                      </div>
                      <div class="col-12">
                        <button class="btn btn-primary w-100" type="submit">Register</button>
                        <p class="small mb-0">You have account? <a href="{{route('client.login')}}">Log in</a></p>
                      </div>
                  </form>

                </div>
              </div>

              <div class="credits">
              </div>

            </div>
          </div>
        </div>

      </section>

    </div>
  </main><!-- End #main -->
@endsection
