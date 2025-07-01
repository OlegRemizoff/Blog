@extends('blog.layouts.base')

@section('title')@parent Home @endsection

@include('blog.layouts.navbar')

@section('content')
<body>
    <div class="app-container">
        <!-- Блок 1: Темы -->
        <div class="block">
            <div class="block-header">Темы</div>
            <div id="theme-list">
                <div class="item theme-item" data-theme="1">Тема 1</div>
                <div class="item theme-item" data-theme="2">Тема 2</div>
            </div>
        </div>
        
        <!-- Блок 2: Подтемы -->
        <div class="block">
            <div class="block-header">Подтемы</div>
            <div id="subtheme-list">
                <div class="placeholder">Выберите тему для просмотра подтем</div>
            </div>
        </div>
        
        <!-- Блок 3: Содержание -->
        <div class="block">
            <div class="block-header">Содержание</div>
            <div id="content-area" class="content-area">
                <div class="placeholder">Выберите подтему для просмотра содержимого</div>
            </div>
        </div>
    </div>




    <script src="{{ asset('assets/blog/js/test.js') }}"></script>
</body>
@endsection
</html>