<div class="container">
    <form method="POST" enctype="multipart/form-data">
        <h1 class="mt-5 mb-5">Gerar Ingresso</h1>
        <div class="modal-body p-4 bg-light ps-5 pe-5">
            <div class="row">
                <div class="col-lg-auto">
                    <label for="titulo">Título do ingresso</label>
                    <input type="text" name="titulo" id="titulo" placeholder="Titulo do evento" class="form-control" required>
                </div>
                <div class="col-lg-auto">
                    <label for="valor">Valor Geral</label>
                    <input type="text" name="valor" id="valor" placeholder="100.00" class="form-control" required>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-primary" id="add_evento_btn">Gerar entrada</button>
                </div>
            </div>
    </form>