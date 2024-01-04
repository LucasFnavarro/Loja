<div class="text-center m-7 text-3xl">
    <h2>Criar uma nova conta...</h2>
</div>

<div class="text-center text-red-600">
    <?php if ($_SESSION['erro']) : ?>
        <?= $_SESSION['erro'] ?>
        <?php unset($_SESSION['erro']) ?>

    <?php endif; ?>
</div>

<form action="?a=cadastro_user_submit" method="post">

    <div class="text-center m-6">
        <label for="email">E-mail <span class="text-slate-500 text-sm">(Coloque seu melhor e-mail)</span></label><br>
        <input type="text" name="text_email" class="border border-gray-500 w-3/6 rounded-2xl pl-5" required>
    </div>

    <div class="text-center m-6">
        <label for="nome">Nome Completo <span class="text-slate-500 text-sm">(Insira seu nome completo)</span></label><br>
        <input type="text" name="text_nomecompleto" class="border border-gray-500 w-3/6 rounded-2xl pl-5" required>
    </div>

    <div class="text-center m-6">
        <label for="text_senha_1">Crie uma senha <span class="text-slate-500 text-sm">(Crie uma senha forte para sua segurança)</span></label><br>
        <input type="password" name="text_senha_1" class="border border-gray-500 w-3/6 rounded-2xl pl-5" required>
    </div>

    <div class="text-center m-6">
        <label for="text_senha_2">Repita a sua senha <span class="text-slate-500 text-sm">(Crie uma senha forte para sua segurança)</span></label><br>
        <input type="password" name="text_senha_2" class="border border-gray-500 w-3/6 rounded-2xl pl-5" required>
    </div>

    <div class="text-center m-6">
        <label for="endereco">Endereço residêncial <span class="text-slate-500 text-sm">(Informe o nome da rua)</span></label><br>
        <input type="text" name="text_endereco" class="border border-gray-500 w-3/6 rounded-2xl pl-5" required>
    </div>

    <div class="text-center m-6">
        <label for="cidade">Nome da cidade <span class="text-slate-500 text-sm">(Informe o nome da Cidade)</span></label><br>
        <input type="text" name="text_cidade" class="border border-gray-500 w-3/6 rounded-2xl pl-5" required>
    </div>


    <div class="text-center m-6">
        <label for="tel">Telefone <span class="text-slate-500 text-sm">(Informe o número de telefone)</span></label><br>
        <input type="text" name="text_telefone" class="border border-gray-500 w-3/6 rounded-2xl pl-5" required>
    </div>


    <div class="m-10 mb-36 p-2 border bg-slate-600 text-white flex justify-center rounded-3xl cursor-pointer text-xl">
        <input type="submit" value="Criar uma nova conta">
    </div>

</form>