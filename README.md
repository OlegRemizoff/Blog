<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## [Перейти на сайт](https://quipo.byethost17.com/)


## API

### Получение  всех постов 
- URL: `/api/v1/posts`
- Метод: GET
- Описание: Получить список всех записей.

### Получение  поста
- URL: `/api/v1/posts/{id}`
- Метод: GET
- Описание: просмотр отдельной записи



### Создание поста
- URL: `/api/v1/posts`
- Метод: POST
- Описание: создать новую запись
- Параметры:
  - `title` (обязательный) - заголовок
  - `slug` (обязательный) - slug
  - `description` - краткое описание
  - `content`  - текст
  - `category_id`(обязательный)  - id категории
  - `thumbnail`  - изображение
  - `"user_id": 1` (обязательный)

```json
    {
        "title": "new PostResource create",
        "slug": "new-post-resource-create",
        "description": "blablabla",
        "content": "Something text",
        "category_id": 3,
        "thumbnail": "nope",
        "user_id": 1
    }

```
#### Результат
<p align="center">
        <img  src="/public/api_create.gif" title="...">
    </a>
</p>

### Обновление поста
- URL: `/api/v1/posts/{id}`
- Метод: PUT
- Описание: обновить запись
```json
    {
        "title": "update Post",
        "slug": "update-post",
        "description": "blablabla",
        "content": "Something text",
        "category_id": 3,
        "thumbnail": "nope",
        "user_id": 1
    }
```

### Удаление поста
- URL: `/api/v1/posts/{id}`
- Метод: DELETE
- Описание: удалить выбранную запись по id
```json
  Пример успешного ответа: Status: 204 No Content
```

