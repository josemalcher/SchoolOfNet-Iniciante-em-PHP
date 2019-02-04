<h3 class="mb-5">Página Adminitração</h3>

<form action="" method="post">

    <div class="form-group">
        <label for="pagesTitle">Título</label>
        <input type="text" name="title" id="pagesTitle" class="form-control" placeholder="Título da Página...">
    </div>
    <div class="form-group">
        <label for="pagesUrl">URL</label>
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text">/</span>
            </div>
            <input type="text" name="url" id="pagesUrl" class="form-control" placeholder="URL Amigável...">
        </div>
    </div>
    <div class="form-group">
        // editor de texto
    </div>
    <button type="submit" class="btn btn-primary">Salvar</button>
</form>
<hr>
<a href="/admin/pages" class="btn btn-secondary">Voltar</a>