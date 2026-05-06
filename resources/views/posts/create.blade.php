<h1>Tambah Post</h1>

<form action="/posts" method="POST">
    @csrf
    <input type="text" name="title" placeholder="Judul">
    <textarea name="content"></textarea>
    <button type="submit">Simpan</button>
</form>