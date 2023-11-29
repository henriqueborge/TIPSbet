@extends('layouts.app')

@section('content')
<style>
    body {
  background: #101227;
  height: 100vh;
  display: flex;
  justify-content: center;
  align-items: center;
  margin: 0;
  font-size: 12px;
}

.planet {
  width: 30em;
  height: 30em;
  background: white;
  border-radius: 50%;
  box-shadow:
    0 0 5em 0 #fed84c80,
    0 0 20em 4em #e8a55233,
    0 0 55em 8em #ff4d4d1a;
  position: relative;
}

.satellite, .satellite::after {
  content: "";
  position: absolute;
  width: 5em;
  height: 5em;
  border-radius: 50%;
}

.satellite {
  background: #ffedd1;
  box-shadow: -2em 0 5em -1em white;
  overflow: hidden;
  transition: 250ms;
  left: 32em;
  transform: rotate(20deg);
  animation: round 5s infinite ease-in-out;
}

.satellite::after {
  background: #262938;
  width: 2.5em;
  left: 2.5em;
  box-shadow: 0 0 0.75em 0.95em #262938;
  animation: shadow 5s infinite ease-in-out;
}

@keyframes shadow {
  0% {
    width: 2.5em;
    left: 0;
  }

  25% {
    width: 5em;
    left: 0;
  }

  50% {
    width: 2.5em;
    left: 2.5em;
  }

  75% {
    width: 0em;
    left: 5em;
  }

  80% {
    left: 0;
    box-shadow: 0 0 0.55em 0.75em #262938;
  }

  100% {
    width: 2.5em;
    left: 0;
  }
}

@keyframes round {

  0%,
  100% {
    top: 2em;
    left: -15em;
    box-shadow: -2em 0 5em 0.5em #c6836466;
    z-index: 2;
  }

  25% {
    box-shadow: 0 0 3em 1em #412104b5;
  }

  75% {
    box-shadow: 0 0 3em 1em black;
  }

  48% {
    z-index: 2;
  }

  50% {
    left: 40em;
    top: 20em;
    z-index: -1;
    box-shadow: 2em 0 5em 0.5em #845a4682;
  }

  99% {
    z-index: -1;
  }
}
</style>
    <div class="header py-7 py-lg-8">
        <div class="container">
            <div class="header-body text-center mb-7">
                <div class="row justify-content-center">
                    <div class="col-lg-5 col-md-6">
                        <h1 class="text-white">Bem vindo ao TIPSbet!</h1>
                        <div class="planet">
  <div class="satellite"></div>
</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
