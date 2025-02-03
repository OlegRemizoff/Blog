
let csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
const adminIndexSearch = document.getElementById('admin-index-search');
const blogContent = document.querySelector('.index-table');

adminIndexSearch.addEventListener('input', (e) => {
    let search = e.target.value.trim();
    console.log(search);
});


adminIndexSearch.addEventListener('input', (e) => {
    let search = e.target.value.trim();

    if (search.length < 3) {
        blogContent.innerHTML = '';
        return;
    }

    fetch("/admin/search", {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'Accept': 'application/json',
            'X-CSRF-TOKEN': csrfToken  
        },
        body: JSON.stringify({ search: search })
    })
    .then(response => response.json())
    .then(data => {
        // console.log(data);
        renderPosts(data);
    })
    .catch(error => console.error('Ошибка при загрузке данных:', error));
});


// Функция для рендеринга постов
function renderPosts(posts) {
    blogContent.innerHTML = '';

    if (posts.length === 0) {
        blogContent.innerHTML = '<p>Ничего не найдено</p>';
        return;
    }

    // Добавляет все элементы за один раз (уменьшает количество перерисовок DOM)
    let fragment = document.createDocumentFragment();

    posts.forEach(post => {
        let postElement = document.createElement('div');
        postElement.classList.add('blog-post-item');

        postElement.innerHTML = `
        <div class="table-responsive">
        <table class="table table-bordered table-hover text-nowrap index-table">
            <thead>
                <tr>
                <th style="width: 30px">#</th>
                <th>Наименование</th>
                <th>Категория</th>
                <th>Теги</th>
                <th>Дата</th>
                <th>Комментарии</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                <td>${post.id}</td>
                <td><img src="${post.image}" class="img-reponsive" alt="blog-img" class="img-thumbnail mr-2" width="60"> </img><a href="/admin/posts/${post.id}/edit"</a>${post.title}</td>
                <td>${post.category}</td>
                <td>${post.tags}</td>
                <td>${post.post_date}</td>
                <td>${post.total_comments}</td>
                </tr>
            </tbody>
        </table>
        </div>
        `;

        fragment.appendChild(postElement);
    });

    blogContent.appendChild(fragment);
}