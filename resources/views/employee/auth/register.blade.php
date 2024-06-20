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
                    <h5 class="card-title text-center pb-0 fs-4">Become an Employee</h5>
                  </div>

                  <form class="row g-3 needs-validation" action = "{{route('employee.register')}}" method = "POST" novalidate id="employee-register">

                    @csrf
                    <div class="" id="step1">
                        <div class="col-12 mb-3">
                            <label for="yourUsername" class="form-label">Name</label>
                            <div class="input-group has-validation">
                                <input type="name" name="name" 
                                    class="form-control @error('name') is-invalid @enderror" id="name" required>
                                @error('name')
                                    <div class="invalid-feedback">{{$message}}.</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-12 mb-3">
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
                        <div class="col-12 mb-3">
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
                            <button class="btn btn-primary w-100 next-btn" id="next"  type="button" >Next</button> 
                        </div>
                    </div>

                    <div class="" id="step2" style="display:none;">
                        <div class="col-12 mb-3">
                            <label for="yourUsername" class="form-label">Adress</label>
                            <div class="input-group has-validation">
                                <input type="text" name="adress" 
                                    class="form-control @error('adress') is-invalid @enderror" id="adress" required>
                                @error('adress')
                                    <div class="invalid-feedback">{{$message}}.</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-12 mb-3">
                            <label class="form-label">Resume</label>
                            <input type="file" step="0.01" class="form-control @error('resume') is-invalid @enderror" id="inputText" name="resume">
                            @error('resume')
                                <span class="invalid-feedback">
                                    {{$message}}
                                </span>
                            @enderror
                        </div>
                        <div class="col-12 mb-3">
                            <label for="yourPassword" class="form-label">Password</label>
                            <input type="password" name="password" 
                            class="form-control @error('password') is-invalid @enderror" id="yourPassword" required>
                                @error('password')
                                    <div class="invalid-feedback">{{$message}}.</div>
                                @enderror
                        </div>
                        <div class="col-12 mb-3">
                            <div class="d-flex justify-content-between">
                                <button class="btn btn-primary prev-btn" type="button" id="pre">Previos</button>
                                <button class="btn btn-primary next-btn" type="button" id="next">Next</button>
                            </div>
                            <p class="small mb-0 mt-2">You have account? <a href="{{route('client.login')}}">Log in</a></p>
                        </div>
                    </div>

                    <div class="" id="step3" style="display:none;">
                        <div class="col-12 mb-3">
                            <label class="form-label">Select</label>
                            <div class="input-group has-validation">
                                <select class="form-select @error('domain_id') is-invalid @enderror" aria-label="Default select example">
                                    <option selected>Select a domain</option>
                                    @foreach($domains as $domain)
                                        <option value="{{$domain->id}}">{{$domain->name}}</option>
                                    @endforeach
                                </select>
                                @error('domain_id')
                                    <div class="invalid-feedback">{{$message}}.</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-12 mb-3">
                            <div class="d-flex justify-content-between">
                                <button class="btn btn-primary prev-btn" type="button" id="pre">Previos</button>
                                <button class="btn btn-primary " type="submit" id="submit">Register</button>
                            </div>
                            <p class="small mb-0 mt-2">You have account? <a href="{{route('client.login')}}">Log in</a></p>
                        </div>
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
<script>
    var index = 1;
    displayStep(index);

    function validateForm(id){
        var valid = true;
        var formContainer = document.getElementById(id);
        var inputs = formContainer.getElementsByTagName('input');
        for(var i = 0; i< inputs.length; i++){
            if( inputs[i].value === ""){
                inputs[i].className+='is-invalid';
                valid = false;
            }
        }
        if (valid) {
            formContainer.className += " finish";
        }
        return valid; // return the valid status
    }
    function displayStep(index){
        var steps = document.querySelectorAll("[id^='step']");
        steps.forEach(function(e){
            if(e.getAttribute('id') === 'step'+index){
                e.style.display='block';
            }else{
                e.style.display='none';
            }
        });
    }
    document.addEventListener('DOMContentLoaded', function() {
        var nexts = document.querySelectorAll('.next-btn');
        nexts.forEach(function(btn){
            btn.addEventListener('click',function(){
                if(validateForm('step'+index)){
                    index += 1;
                    
                    displayStep(index);
                }
            });
        });

        var prevs = document.querySelectorAll('.prev-btn');
        prevs.forEach(function(btn) {
            btn.addEventListener('click', function() {
                index -= 1;
                displayStep(index);
            });
        });

        document.getElementById('submit').addEventListener('click',function(){
            var valid = validateForm('step'+index);
        });
    });
</script>
