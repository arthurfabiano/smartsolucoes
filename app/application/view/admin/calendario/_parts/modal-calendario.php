<div class="modal inmodal" id="modal-calendario" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content animated fadeInDown">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title">Compromisso</h4>
            </div>
            <form action="" id="form-add-appointment">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="title">Titulo do Compromisso</label>
                        <input type="text" name="title" id="title" class="form-control">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-white" data-dismiss="modal">Fechar</button>
                    <button type="button" class="btn btn-primary" id="btnSubmit">Salvar</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal inmodal" id="modal-calendario-edit" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content animated fadeInDown">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title">Compromisso</h4>
            </div>
            <form action="" id="form-add-appointment">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="title">Titulo do Compromisso</label>
                        <input type="text" name="title" id="edt-title" class="form-control">
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="hidden" name="id" id="id-event">

                    <button type="button" class="btn btn-white" data-dismiss="modal">Fechar</button>
                    <button type="button" class="btn btn-primary" id="btnAtualizar">Atualizar</button>
                    <button type="button" class="btn btn-danger" id="btnDelete">Delete</button>
                </div>
            </form>
        </div>
    </div>
</div>