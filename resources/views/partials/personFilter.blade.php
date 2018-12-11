<div class=>
    <div >
        <form method="get" style="display:inline-block;" action="">
            <div class="input-group">
                <input type="text" name="q" value="{!!$q!!}" class="form-control input pull-right" placeholder="Buscar por Nome, Id Funcional, RG, CPF ou E-mail">

                <div class="input-group-btn">
                    <button title="Aplicar Filtro" type="submit" class="btn  btn-default"><i class="fa fa-search"></i></button>
                    <a title="Limpar Filtro" class="btn btn-danger" href="{!! route(Route::currentRouteName()) !!}" ><i  class="fa fa-eraser"></i></a>
                </div>
            </div>
        </form>
    </div>
</div>



