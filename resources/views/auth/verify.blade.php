@extends('layouts.app')

@section('content')

<form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">

</form>
<div class="container" dir="rtl">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('تأكيد البريد الالكتروني') }}</div>

                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('تم ارسال الرابط بنجاح') }}
                        </div>
                    @endif

                    {{ __('مرحبا بك في موقعنا . يرجى الضغط على الرابط للتأكيد ,') }} <br><br>
                    <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                        @csrf
                        <button type="submit" class="btn btn-link p-0 m-0 align-baseline">{{ __('  اضغط هنا لارسال الرابط') }}</button>.
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
