<?php 
    $render('header',[
                        'titulo' => $titulo,
                        'user'   => $user
                     ]); 
?>

<div class="section">
    
    <div class="card text-center">

        <div class="card-header">
            Dados Pessoais
        </div>

        <form action="<?= $base;?>/pessoa" method="POST">

            <div class="card-body">
                        
                <div class="row mb-3">
                    <div class="col-sm-2">
                        <input placeholder="ID" type="text" class="form-control" id="id" name="id" disabled>
                    </div>

                    <div class="col-sm-2">
                        <input placeholder="ID USER" type="text" class="form-control" id="id_user" name="id_user" disabled>
                    </div>
                </div>
                        
                <div class="row mb-3">
                    <div class="col-sm-12">
                        <input placeholder="Nome Completo" type="text" class="form-control" id="nome" name="nome" required maxlength="200">
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-sm-6">
                        <input placeholder="Data Nascimento" type="text" class="form-control" id="data_nasc" name="data_nasc" required>
                    </div>

                    <div class="col-sm-6">
                        <input placeholder="Telefone" type="text" class="form-control" id="telefone" name="telefone" required maxlength="15">
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-sm-12">
                        <input placeholder="Rua" type="text" class="form-control" id="rua" name="rua" required maxlength="200">
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-sm-6">
                        <input placeholder="CEP" type="text" class="form-control" id="cep" name="cep" required maxlength="10">
                    </div>

                    <div class="col-sm-2">
                        <input placeholder="Quadra" type="text" class="form-control" id="qd" name="qd" required maxlength="5">
                    </div>

                    <div class="col-sm-2">
                        <input placeholder="Lote" type="text" class="form-control" id="lt" name="lt" required maxlength="5">
                    </div>

                    <div class="col-sm-2">
                        <input placeholder="Nº" type="text" class="form-control" id="num" name="num" required maxlength="5">
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-sm-6">
                        <input placeholder="Bairro" type="text" class="form-control" id="bairro" name="bairro" required maxlength="200">
                    </div>

                    <div class="col-sm-4">
                        <input placeholder="Cidade" type="text" class="form-control" id="cidade" name="cidade" required maxlength="200">
                    </div>

                    <div class="col-sm-2">
                        <select class="form-select" aria-label="Default select example">
                            <option selected>Estado</option>
                            <option value="AC">Acre</option>
                            <option value="AL">Alagoas</option>
                            <option value="AP">Amapa</option>
                            <option value="AM">Amazonas</option>
                            <option value="BA">Bahia</option>
                            <option value="DF">Distrito Federal</option>
                            <option value="ES">Espirito Santo</option>
                            <option value="GO">Goias</option>
                            <option value="MA">Maranhão</option>
                            <option value="MT">Mato Grosso</option>
                            <option value="MS">Mato Grosso do Sul</option>
                            <option value="MG">Minas Gerais</option>
                            <option value="PA">Pará</option>
                            <option value="PB">Pernambuco</option>
                            <option value="PR">Parana</option>
                            <option value="PI">Piaui</option>
                            <option value="RJ">Rio de Janeiro</option>
                            <option value="RN">Rio Grande do Norte</option>
                            <option value="RS">Rio Grande do Sul</option>
                            <option value="RO">Rondonia</option>
                            <option value="RR">Roraima</option>
                            <option value="SC">Santa Catarina</option>
                            <option value="SP">São Paulo</option>
                            <option value="SE">Sergipe</option>
                            <option value="TO">Tocantins</option>
                        </select>
                    </div>
                </div>

            </div>

            <div class="card-footer text-muted">
                <input id="btn-login" class="btn btn-outline-success" type="submit" value="Salvar">
            </div>

        </form>

    </div>

</div>

<?php $render('footer');?>