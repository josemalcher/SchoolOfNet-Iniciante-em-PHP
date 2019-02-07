<h3 class="mb-5">Edição da Página</h3>

<form action="" method="post">

    <div class="form-group">
        <label for="pagesTitle">Título</label>
        <input type="text" name="title" id="pagesTitle" class="form-control" placeholder="Título da Página..." required value="Página inicial"> 
    </div>
    <div class="form-group">
        <label for="pagesUrl">URL</label>
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text">/</span>
            </div>
            <input type="text" name="url" id="pagesUrl" class="form-control" placeholder="URL Amigável..." required>
        </div>
    </div>
    <div class="form-group">
    <input type="hidden" name="body" id="pagesBody" value=" <h3>Página inicial</h3>
        <p>Está é a página inicilal do site</p>">
        <trix-editor input="pagesBody"></trix-editor>
    </div>
    <button type="submit" class="btn btn-primary">Salvar</button>
</form>
<hr>
<a href="/admin/pages/1" class="btn btn-secondary">Voltar</a>