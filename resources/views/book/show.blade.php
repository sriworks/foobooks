<h2>{{ $book['title'] }}</h2>
    <img src='{{ $book['cover'] }}' class='cover' alt='Cover image for {{ $book['title'] }}'>

    <p>By {{ $book['author'] }}</p>
    <p>Published in {{ $book['published'] }}</p>

    <p><a href='{{ $book['purchase_url'] }}'>Purchase this book...</a></p>

    <p>
        <a href='/book/{{ $book['id'] }}/edit'>Edit</a> |
        <a href='/foobooks/public/book/{{ $book['id'] }}/delete'>Delete</a>
    </p>