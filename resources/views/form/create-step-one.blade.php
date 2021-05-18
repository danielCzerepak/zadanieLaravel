@extends('layout.default')
@section('content')
<style>
.video-container {
    position: relative;
    width: 100%;
    padding-bottom: 56.25%;

}

.video {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    border: 0;
}
</style>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="video-container">

                <iframe class='video' src="https://www.youtube.com/embed/fG5ktdCndpU" allowfullscreen></iframe>
            </div>
            <form action="{{ route('forms.create.step.one.post') }}" method="POST">
                @csrf

                <div class="card">
                    <div class="card-header">Krok pierwszy</div>

                    <div class="card-body">

                        @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif

                        <div class="form-group">
                            <label for="title">Imię:</label>
                            <input required type="text" value="{{ $form->name ?? '' }}" class="form-control" id="taskTitle"
                                name="name">
                        </div>
                        <div class="form-group">
                            <label for="description">Nazwisko:</label>
                            <input required type="text" value="{{{ $form->surname ?? '' }}}" class="form-control" id="surname"
                                name="surname" />
                        </div>

                        <div class="form-group">
                            <label for="description">Email:</label>
                            <input required type="email" value="{{{ $form->email ?? '' }}}" class="form-control" id="email"
                                name="email" />
                        </div>
                        <div class="form-group">
                            <label for="description">Numer Telefonu:</label>
                            <input required type="phone" value="{{{ $form->phone ?? '' }}}" class="form-control" id="phone"
                                name="phone" />
                        </div>

                        <div class="form-check">
                            <input required class="form-check-input" value="1" type="checkbox" name="zgoda" id="zgoda">

                            <label class="form-check-label" for="checkbox" >
                                Zgoda na przetwarzanie danych
                            </label>

                        </div>
                    </div>

                    <div class="card-footer text-right">
                        <button type="submit" class="btn btn-primary">Next</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<script>

$("input").intlTelInput({
  utilsScript: "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/8.4.6/js/utils.js"
});
</script>
@endsection
