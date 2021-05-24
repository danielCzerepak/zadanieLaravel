@extends('layout.default')
@section('content')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script>
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
                    <div class="alert alert-danger print-error-msg" style="display:none">
                        <ul></ul>
                    </div>
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
                        <button class="btn btn-success btn-submit">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<script type="text/javascript">

    $(document).ready(function() {
        $(".btn-submit").click(function(e){
            e.preventDefault();

            var _token = $("input[name='_token']").val();
            var first_name = $("input[name='name']").val();
            var last_name = $("input[name='surname']").val();
            var email = $("input[name='email']").val();
            var address = $("textarea[name='description']").val();
            var phone = $("input[name='phone']").val();

            $.ajax({
                url: "{{ route('forms.create.step.one.post') }}",
                type:'POST',
                data: {_token:_token, first_name:first_name, last_name:last_name, email:email, address:address, phone:phone},
                success: function(data) {
                    if($.isEmptyObject(data.error)){
                        alert(data.success);
                    }else{
                        printErrorMsg(data.error);
                    }
                }
            });

        });

        function printErrorMsg (msg) {
            $(".print-error-msg").find("ul").html('');
            $(".print-error-msg").css('display','block');
            $.each( msg, function( key, value ) {
                $(".print-error-msg").find("ul").append('<li>'+value+'</li>');
            });
        }
    });


</script>
@endsection
