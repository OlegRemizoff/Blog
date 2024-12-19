<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Профиль пользователя</title>
    <link rel="stylesheet" href="{{ asset('assets/user/style.css') }}">
    <link rel="stylesheet" href="{{ asset('bootstrap.min.css') }}">

</head>

<body>

    <div class="profile-container">
        <img src="{{ auth()->user()->getImage() }}" alt="Фото профиля" class="profile-image" id="profileImage">
        <h1 class="profile-name">{{ auth()->user()->name }}</h1>
        <p class="profile-info">Город: <span id="city">Москва</span></p>
        <p class="profile-info">Возраст: <span id="age">25</span></p>
        <p class="profile-bio">Краткая биография или описание пользователя. Например, "Разработчик, любит кофе и книги".</p>
        <!-- <div class="profile-links">
            <a href="#">LinkedIn</a>
            <a href="#">GitHub</a>
            <a href="#">Twitter</a>
        </div> -->
        <form class="image-form" method="post" action="{{ route('profile.update') }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')
            <div class="form-group">
                <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
                <input type="file" class="custom-file-input" name="thumbnail" id="thumbnail">
                <button type="submit">Сменить изображение</button>
            </div>
        </form>
    </div>



</body>

</html>