@extends('Layout.app')
@section('content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
<style>
    .hero-bg {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        min-height: 80vh;
        border-radius: 20px;
    }
    .floating {
        animation: floating 3s ease-in-out infinite;
    }
    @keyframes floating {
        0% { transform: translate(0,  0px); }
        50%  { transform: translate(0, 15px); }
        100%   { transform: translate(0, -0px); }
    }
</style>

<div class="container mx-auto py-12 px-4">
    <div class="hero-bg flex flex-col items-center justify-center text-white shadow-2xl animate__animated animate__zoomIn">
        <div class="floating mb-8 text-8xl">
            <i class="fas fa-address-book"></i>
        </div>
        <h1 class="text-5xl font-extrabold mb-4 animate__animated animate__fadeInDown animate__delay-1s">
            Address Book Pro
        </h1>
        <p class="text-xl mb-8 opacity-90 animate__animated animate__fadeInUp animate__delay-1s text-center max-w-md">
            نظم جهات اتصالك بأسلوب عصري، سريع، وآمن. الحل الأمثل لإدارة أرقامك.
        </p>
        <a href="{{ route('contacts.index') }}"
           class="bg-white text-indigo-700 font-bold px-8 py-4 rounded-full shadow-lg hover:bg-indigo-100 hover:scale-110 transition-all duration-300 animate__animated animate__pulse animate__infinite">
            ابدأ الآن <i class="fas fa-arrow-right ml-2"></i>
        </a>
    </div>
</div>
@endsection
